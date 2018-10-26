<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Gtype;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodspicture;
use App\Model\Admin\orders;
use App\Model\Admin\ord_goods;
use App\Model\Home\Cart;
use DB;
class GoodsController extends Controller
{
	
    // 商品详情
    public function goods($id)
    {
        $res = Goods::find($id);

        $re = Goods::where('tid',$res->tid)->get();
        $gimg = Goodspicture::where('gid',$id)->pluck('pic_name');
        
    	return view('home.goods.goods',['title'=>'商品详情','res'=>$res,'gimg'=>$gimg,'re'=>$re]);
    }


    // 把数据添加到cart购物车表
    public function carts(Request $request, $id)
    {

        $colors = $request->input('color');
        foreach ($colors as $k => $v){
            $re['c_color'] = $v;
        }
                 
        $sizes = $request->input('size');
        foreach ($sizes as $k => $v){
            $re['c_size'] = $v;
        }

        $re['gmsl'] = $request->input('gmsl');

        $re['gid'] = $id;

        $gid = Goods::where('gid',$id)->get();
        foreach ($gid as $k => $v){
            $re['c_gname'] = $v->gname;
            $re['c_price'] = $v->price;
        }
        $gimgs = Goodspicture::where('gid',$id)->pluck('pic_name');
        $re['gpsrc'] = $gimgs[0];

        $re['xiaoji'] = $re['c_price'] * $re['gmsl'];

        $re['uid'] = session('uid');
        // dd($re);
        
        try{
            $info =  Cart::create($re);

            if($info){

                return back()->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('success','添加失败');

        }
        
    }


    // 在购物车遍历出来
    public function cart()
    {
        $re = session('uid');
        $cart = Cart::where('uid',$re)->get();
        // dd($cart);
        return view('home.goods.cart',['title'=>'购物车','cart'=>$cart]);
    }


    // 移出购物车
    public function remove(Request $request)
    {
        $cid = $request->cid;
        // dd($cid);
        $data = Cart::where('id',$cid)->delete();
        // $data = 1;
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }

    //商品页
    public function shops(Request $request)
    {
        $res = Goods::where('gname','like','%'.$request->input('gname').'%')->orderBy('gid','asc')->get();
       

            // dd($res);

        return view('home.goods.shops',['title'=>'商品页','res'=>$res,'request'=>$request]);
    }
   

    // 通过分类查找商品
    public function gtods($id)
    {

            $gtype = Gtype::where('pid',$id)->pluck('tid');
        
            if(!($gtype->isEmpty()))
            {
                // $a =[]; 

               foreach ($gtype as $k=>$v)
                {
                    $goods = Goods::where('tid',$v)->paginate(8);
                    
                    // dump($goods);
                    
                    $a[$k] = $goods;
                    // $goods = $goods->toArray();

                    // $gods = array_merge($goods);

                     // dump($a);
                }
                // $goods = $a;
                // dump($a);
                   

                // $goods = $array;
                return view('home.goods.gtods',['title'=>'商品页','a'=>$a,'goods'=>$goods]);


            }else
            {
                $goods = Goods::where('tid',$id)->paginate(8);
                $a = [];
                $a[0] = $goods;
                // dd($a);
                
                return view('home.goods.gtods',['title'=>'商品页','a'=>$a,'goods'=>$goods]);
            }
      

    }


    // 结算页
    public function jiesuan(Request $request)
    {
            $ids = $request->input('ids');
            $zj =$request->input('zongjia');
            $id = session('uid');
            $shou = DB::table('addr_message')->where(['user_id'=>$id,'moren'=>'1'])->get();
            $ds = [];
            foreach($shou as $k=>$v){
                $ds[] = $v->moren;
            }
            
            if( !empty($ds)){
                if($ids&&$zj){
                    
                    
                    
                    // dd($ids,$zj,$shou,$id);

                    $shang =[];
                    foreach ($ids as  $k =>$v){
                        $shang[] = Cart::where('id',$v)->get();
                    }  
                    return view('home.goods.jiesuan',['title'=>'结算页','shou'=>$shou,'shang'=>$shang,'zj'=>$zj]);
                }else{

                return back()->with('success','请选中商品后再进行结算');

                }
            }else{
                 return back()->with('success','请去添加收货人');

            }
    }

    // ajax传参小计到数据库
    public function gmsl(Request $request)
    {
        $jia = $request->gg;
        $shu = $request->gv;
        $did = $request->did;
        $data = Cart::where('id',$did)->update(['gmsl'=>$shu,'xiaoji'=>$jia]);
         if($data){
            echo 1;
        }else{
            echo 0;
        }

    }
    // 生成订单
    public function xiangqing(Request $request)
    {
        $res = [];
        $res['uid'] = session('uid');
        $res['ord'] = '2018'.random_int(1111, 9999).time().$res['uid'];
        $res['addtime'] = time();
        $res['snum'] = $request->zongjia;

        $info = Orders::create($res);
        $oid = $info->oid;
        // dd($oid);
        // $gid = $request->gid;
        // dd($gid);
        $arr = [];
        $id = $request->id;
        // dd($id);
        foreach($id as $k=>$v){
            $arr[] = Cart::where('id',$v)->get();
        } 
        // dd($arr);
        $res_guanxi= [];
        // dd($arr);
        foreach ($arr as $key => $v) {
            // dd($v[0]->c_price);
            $res_guanxi[] = ['oid'=>$oid,'o_price'=>$v[0]->c_price,'o_gname'=>$v[0]->c_gname,'o_color'=>$v[0]->c_color,'o_size'=>$v[0]->c_size,'o_gpsrc'=>$v[0]->gpsrc,'o_gmsl'=>$v[0]->gmsl,'o_xiaoji'=>$v[0]->xiaoji];
        }
        // dd($res_guanxi);
       
               
        // dd($re);
       try{
            // $uid = session('uid');
            // $cart = Cart::where('uid',$uid)->->delete();
            $re= ord_goods::insert($res_guanxi);
            foreach($id as $k=>$v){
                $cart = Cart::where('id',$v)->delete();
            } 
            if($re&&$cart){


                return redirect('/home/orders')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
    }


    // 订单详情
    public function orders(Request $request)
    {
        $res= session('uid');
        $ord_gods = Orders::orderBy('addtime','desc')->where('uid',$res)->get();
        return view('home.goods.xiangqing',['title'=>'我的订单','ord_gods'=>$ord_gods]);
    }
    // 热销商品
    public function rexiao()
    {
        $re = Goods::where('status','2')->paginate(8);
        // dd($re);
        return view('home.goods.rexiao',['title'=>'热销商品','re'=>$re]);
    }
}

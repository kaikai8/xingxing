<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Gtype;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodspicture;
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

                return redirect('/home/cart')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
        
    }


    // 在购物车遍历出来
    public function cart()
    {
        $cart = Cart::where('uid',session('uid'))->get();
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


    // 通过分类查找商品
    public function gtods($id)
    {
        

        $goods = Goods::where('tid',$id)->get();
        return view('home.goods.gtods',['title'=>'商品','goods'=>$goods]);
    }


    // 结算页
    public function jiesuan(Request $request)
    {
            $ids = $request->input('ids');

            if($ids){
                $id = session('uid');
                $shou = DB::table('addr_message')->where(['user_id'=>$id,'moren'=>'1'])->get();
                $zj =$request->input('zongjia');
                // dd($ids,$zj,$shou,$id);

                $shang =[];
                foreach ($ids as  $k =>$v){
                    $shang[] = Cart::where('id',$v)->get();
                }  
                return view('home.goods.jiesuan',['title'=>'结算页','shou'=>$shou,'shang'=>$shang,'zj'=>$zj]);
            }else{

            return back()->with('success','请选中商品后再进行结算');

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
}
// $uid = session('uid');
// $uname = DB::table('user')->where('uid',$uid)->pluck('uname');
//         dd($uname);
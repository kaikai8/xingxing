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
    public function cart()
    {
        $cart = Cart::get();
        // dd($cart);
        return view('home.goods.cart',['title'=>'购物车','cart'=>$cart]);
    }
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
    public function gtods($id)
    {
        return view('home.goods.gtods',['title'=>'商品']);
    }
}

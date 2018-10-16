<?php

namespace App\Http\Controllers\Home;
use App\Model\Admin\Goodspicture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Gtype;
use App\Model\Admin\Goods;
use DB;
class GoodsController extends Controller
{
	
    // 商品详情
    public function goods($id)
    {
        $res = Goods::find($id);
        $gimg = Goodspicture::where('gid',$id)->pluck('pic_name');
        dd($res,$gimg);
    	return view('home.goods.goods',['title'=>'商品详情','res'=>$res,'gimg'=>$gimg]);
    }
}

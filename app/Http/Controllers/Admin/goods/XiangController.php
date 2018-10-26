<?php

namespace App\Http\Controllers\admin\goods;
use App\Model\Admin\ord_goods;
use Illuminate\Http\Request;
use App\Model\Admin\orders;
use App\Http\Controllers\Controller;

class XiangController extends Controller
{
	// 订单详情
    public function xiang(Request $request, $id)
    {
    	// $oid = $id;
    	// dd($oid);
    	$res = Ord_goods::orderBy('id','asc')->where('oid',$id)->paginate($request->input('num', 10));
    	return view('admin.orders.xiang',['title'=>'订单详情','res'=>$res,'request'=>$request,'id'=>$id]);
    }

    // ajax改变订单状态
    public function status(Request $request)
    {
    	$oid = $request->oid;
    	$data = Orders::where('oid',$oid)->update(['ostatus'=>'1']);
    	if($data){
    		echo 1;
    	}else{
    		echo 2;
    	}
    }
	// ajax改变状态
	public function queren(Request $request)
    {
    	$oid = $request->oid;
    	// dd($request->parent);
    	$res = Orders::where('oid',$oid)->update(['ostatus'=>'2']);
    	$data = [];
    	$data['oid'] = $oid;
    	if($res){
    		$data['status']= 1;
    	}else{
    		$data['status']= 0;
    	}
    	return response()->json($data);
    }
    // 删除订单
    public function removes(Request $request)
    {
    	$oid = $request->oid;
    	$res = Orders::where('oid',$oid)->delete();
        $re = Ord_goods::where('oid',$oid)->delete();
    	$data = [];
    	$data['oid'] = $oid;
    	if($res && $re){
    		$data['status']= 1;
    	}else{
    		$data['status']= 0;
    	}
    	return response()->json($data);
    }

}

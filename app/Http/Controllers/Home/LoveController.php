<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\love;
use App\Model\Home\User;
use App\Model\Admin\Goods;



class LoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = love::where('user_id',session('uid'))->get();
       
        
        return view('home.love.love',['title'=>'商品收藏页','res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *  add a listing of the resource. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function addlove($id)
    {
        $res = Goods::where('gid',$id)->get();
        // dd($res);
        foreach($res as $k=>$v)
        {
            $re = $v->only('gid','gname','price','color','size','gnum');
        }
        $re['user_id'] = session('uid');
        // dd($re);
         

        try{

           $rs = love::create($re);

            return redirect('home/love')->with('success','添加成功');
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
        // dd($rs); 
        
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uplove($id)
    {
        try{
           
            $res = love::where('oid',$id)->delete();


            return redirect('/home/love')->with('success','删除成功');
            
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }
}

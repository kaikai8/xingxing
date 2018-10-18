<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Model\Home\User;
use App\Model\Home\muser;
use App\Model\Home\addr_message;

class homeUserController extends Controller
{
    /**
     * 前台用户列表显示.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $res = muser::orderBy('user_id','asc')
       
        ->paginate($request->input('num',5));

        
        
        //多条件查询
        $rs = User::orderBy('uid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $uname = $request->input('uname');

                //如果用户名不为空
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
               
            })
            ->paginate($request->input('num', 5));

            

           /* $num = $request->num;
            $*/


        return view('admin.homeUser.index',[
            'title'=>'前台用户名列表页',
            'rs'=>$rs,
            'res'=>$res,
            'request'=>$request

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

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
    public function show(Request $request)
    {
        
        /*$rs = User::orderBy('uid','asc')
        ->paginate($request->input('num', 5));*/


        $res = addr_message::orderBy('user_id','asc')
        ->where(function($query) use($request){
                //检测关键字
                $uid = $request->input('uid');

                //如果用户名不为空
                if(!empty($uid)) {
                    $query->where('user_id','like',$uid);
                }
               
            })
        ->paginate($request->input('num',5)); 
        
       

            

           /* $num = $request->num;
            $*/


        return view('admin.homeUser.message',[
            'title'=>'前台收货信息列表页',
            // 'rs'=>$rs,
            'res'=>$res,
            'request'=>$request

        ]);
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
}

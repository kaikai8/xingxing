<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Model\Admin\homeUser;
class homeUserController extends Controller
{
    /**
     * 前台用户列表显示.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //多条件查询
        $rs = homeUser::orderBy('uid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $uname = $request->input('uname');
                $sex = $request->input('sex');
                //如果用户名不为空
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
                //如果性别不为空
                if(!empty($sex)) {
                    $query->where('sex','like','%'.$sex.'%');
                }
            })
            ->paginate($request->input('num', 5));

           /* $num = $request->num;
            $*/


        return view('admin.homeUser.index',[
            'title'=>'后台用户名列表页',
            'rs'=>$rs,
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
}

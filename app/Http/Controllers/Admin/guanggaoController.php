<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\guanggao;

class guanggaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //多条件查询
         $rs = guanggao::orderBy('aid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $auth = $request->input('auth');
               

                //如果状态不为空
                 if(!empty($auth)) {
                     if($auth == '启用')
                    {
                        $auth = '1';
                    }else if($auth == '禁用')
                    {
                        $auth = '0';
                    }

                    $query->where('auth','like','%'.$auth.'%');
                }
            })
            ->paginate($request->input('num', 5));

           /* $num = $request->num;
            $*/


        return view('admin.guanggao.guanggao',[
            'title'=>'广告浏览页',
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
        return view('admin.guanggao.addguang',['title'=>'添加广告']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $res = $request->except('_token','a_profile');



        //文件上传
        if($request->hasFile('a_profile')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('a_profile')->getClientOriginalExtension(); 

            //移动
            $request->file('a_profile')->move('uploads',$name.'.'.$suffix);
        }

        $res['a_profile'] = '/uploads/'.$name.'.'.$suffix;
        $rs = guanggao::create($res);

        try{
           
           


        

            return redirect('admin/guanggao')->with('success','添加成功');
            
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
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
        $res = guanggao::find($id);

        return view('admin.guanggao.upguang',[
            'title'=>'广告的修改页面',
            'res'=>$res
        ]);
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
        $res = $request->except('_token','_method','a_profile');

         //文件上传
        if($request->hasFile('a_profile')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('a_profile')->getClientOriginalExtension(); 

            //移动
            $request->file('a_profile')->move('uploads',$name.'.'.$suffix);

            $res['a_profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        try{
           
            $rs = guanggao::where('aid',$id)->update($res);


            

            return redirect('/admin/guanggao')->with('success','修改成功');
           
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         try{
           
            $res = guanggao::where('aid',$id)->delete();

            
            return redirect('/admin/guanggao')->with('success','删除成功');
            
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }
}

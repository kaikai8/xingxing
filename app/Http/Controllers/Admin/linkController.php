<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\link;

class linkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //多条件查询
         $rs = link::orderBy('link_id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $link_auth = $request->input('link_auth');
               

                //如果状态不为空
                 if(!empty($link_auth)) {
                     if($link_auth == '启用')
                    {
                        $link_auth = '1';
                    }else if($link_auth == '禁用')
                    {
                        $link_auth = '0';
                    }

                    $query->where('link_auth','like','%'.$link_auth.'%');
                }
            })
            ->paginate($request->input('num', 5));

           /* $num = $request->num;
            $*/


        return view('admin.link.link',[
            'title'=>'友情链接浏览页',
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
        return view('admin.link.addlink',['title'=>'添加链接']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $res = $request->except('_token');


        try{
           
            $rs = link::create($res);


        

            return redirect('admin/link')->with('success','添加成功');
            
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
        $res = link::find($id);

        return view('admin.link.uplink',[
            'title'=>'链接的修改页面',
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
         $res = $request->except('_token','_method');


        try{
           
            $rs = link::where('link_id',$id)->update($res);


            

            return redirect('/admin/link')->with('success','修改成功');
           
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
           
            $res = link::where('link_id',$id)->delete();

            
            return redirect('/admin/link')->with('success','删除成功');
            
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }
}

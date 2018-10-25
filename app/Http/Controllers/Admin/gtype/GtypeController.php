<?php

namespace App\Http\Controllers\Admin\gtype;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Gtype;
use DB;

class GtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $res = Gtype::select(DB::raw('*,concat(path,tid) as paths'))->where('tname','like','%'.$request->input('tname').'%')->orderBy('paths')->paginate($request->input('num',10));
       foreach($res as $k => $v){
            $n = substr_count($v -> path, ',') - 1;
            if($n<=0) $n=0;
            $v->tname = str_repeat('&nbsp;', $n * 8).'|--'.$v -> tname;
        }
        return view('admin.gtype.gtype',[
            'title'=>'分类列表',
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
        $res = Gtype::select(DB::raw('*,concat(path,tid) as paths'))->
            orderBy('paths')->get();

        foreach($res as $k => $v){
            $n = substr_count($v -> path, ',') - 1;
            if($n<=0) $n=0;
            $v->tname = str_repeat('&nbsp;', $n * 8).'|--'.$v -> tname;
        }

        return view('admin.gtype.addgtype',['title'=>'分类添加','res'=>$res]);
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
        if($res['pid'] == '0'){
            $res['path'] = '0,';
        } else{
            $data = Gtype::where('tid',$res['pid'])->first();
            $res['path'] = $data->path.$data->tid.',';
        }
        try{
            $info =  Gtype::create($res);
            if($info){
                return redirect('/admin/gtype')->with('success','添加成功');
            }
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
        $re = Gtype::find($id);
        $res = Gtype::select(DB::raw('*,concat(path,tid) as pa'))->
            orderBy('pa')->get();

        foreach($res as $k => $v){
            $n = substr_count($v -> path, ',') - 1;
            if($n<=0) $n=0;
            $v->tname = str_repeat('&nbsp;', $n * 8).'|--'.$v -> tname;
        }
        return view('admin.gtype.editgtype',['title'=>'分类修改','re'=>$re,'res'=>$res]);
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
        // echo $id;
        $re = $request->only('tname');
        // dd($re);
        try{
            $data = Gtype::where('tid',$id)->update($re);
            if($data){
                return redirect('/admin/gtype')->with('success','修改成功');
            }
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
            $re = Gtype::find($id);
            $res = DB::table('gtype')->where('path', 'like',"%$re->tid%")->delete();
            $tp = Gtype::find($id)->delete();
            if($tp){
                return redirect('/admin/gtype')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }
        
    }

    // 子分类添加页面
    public function add($id)
    {
           $res = Gtype::where('tid',$id)->pluck('tname');
           

        return view('admin.gtype.addzigtype',['title'=>'添加子分类','res'=>$res,'id'=>$id]);
    }

    // 存到数据表
    public function zilei(Request $request)
    {
        $res = $request->except('_token');
        if($res['pid'] == '0'){
            $res['path'] = '0,';
        } else{
            $data = Gtype::where('tid',$res['pid'])->first();
            $res['path'] = $data->path.$data->tid.',';
        }
        try{
            $info =  Gtype::create($res);
            if($info){
                return redirect('/admin/gtype')->with('success','添加成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加失败');
        }
    }
}




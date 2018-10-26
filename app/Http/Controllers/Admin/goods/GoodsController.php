<?php

namespace App\Http\Controllers\Admin\goods;
use App\Model\Admin\Gtype;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodspicture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Goods::orderBy('gid','asc')->where(function($query) use($request){
                
                $gname = $request->input('gname');
                $price = $request->input('price');
                
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
                
                if(!empty($price)) {
                    $query->where('price','like','%'.$price.'%');
                }
            })
            ->paginate($request->input('num', 10));

        return view('admin.goods.goods',['title'=>'商品列表页','res'=>$res,'request'=>$request]);
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
        return view('admin.goods.addgoods',['title'=>'添加商品','res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $request->except('_token','pic_name');

        if($request->gname == ''){
            return back()->with('success','商品名不能为空');
        }
        if($request->price == ''){
            return back()->with('success','商品价格不能为空');
        }
        if($request->size == ''){
            return back()->with('success','商品规格不能为空');
        }
        if($request->color == ''){
            return back()->with('success','商品颜色不能为空');
        }
        if($request->gnum == ''){
            return back()->with('success','商品库存不能为空');
        }
        if($request->pic_name== ''){
            return back()->with('success','商品图片不能为空');
        }
        if($request->descr == ''){
            return back()->with('success','商品描述不能为空');
        }
        if($request->status == ''){
            return back()->with('success','商品状态不能为空');
        }

        $re = Goods::create($res);
        
        $id = $re->gid;

        $gd = $re::find($id);

        //处理图片
        if($request->hasFile('pic_name')){

            $files = $request->file('pic_name');

            //
            $gimg = [];
            foreach($files as $k => $v){

                $pic = [];

                $gname = time().rand(1111,9999);

                $houz = $v->getClientOriginalExtension();

                $v->move('./admin/Goodspicture/', $gname.'.'.$houz);

                $pic['pic_name'] = '/admin/Goodspicture/'.$gname.'.'.$houz;

                $gimg[] = $pic;

            }
        }
        

        //添加数据
        try{
            //关联模型
            $gop = $gd->goodspic()->createMany($gimg);
       
            if($gop){

                return redirect('/admin/goods')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('success','添加失败');

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
       // dd($id);
        $info = Goodspicture::where('pid',$id)->first();
        // dd($info);
        $path = $info->pic_name;

        $data = unlink('.'.$path);

        if(!$data){

            return back()->with('success','删除图片失败');

        }

        $rs = Goodspicture::where('pid',$id)->delete();

        if(!$rs){

            return back()->with('success','删除数据失败');
        }

        echo 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $re = Gtype::select(DB::raw('*,concat(path,tid) as paths'))->
        orderBy('paths')->get();
        

         foreach($re as $k => $v){

            $n = substr_count($v -> path, ',') - 1;
            if($n<=0) $n=0;
            $v->tname = str_repeat('&nbsp;', $n * 8).'|--'.$v -> tname;

        }

        $res = Goods::find($id);

        //根据id查询相关的商品图片信息
        $gimg = Goodspicture::where('gid',$id)->get();


        return view('admin.goods.editgoods',[
            'title'=>'商品修改页面',
            're'=>$re,
            'res'=>$res,
            'gimg'=>$gimg

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

        $res = $request->except('_token','_method','pic_name');


        //处理图片
        if($request->hasFile('pic_name')){

            $files = $request->file('pic_name');

            $gpic = [];
            foreach($files as $k => $v){

                $info = [];

                $gname = time().rand(1111,9999);

                $suffix = $v->getClientOriginalExtension();

                $v->move('./admin/Goodspicture/', $gname.'.'.$suffix);

                $info['gid'] = $id;

                $info['pic_name'] = '/admin/Goodspicture/'.$gname.'.'.$suffix;

                $gpic[] = $info;

            }
            

         //文件上传   商品详情的图片
        DB::table('goodspicture')->insert($gpic);

        }
        
        
          //添加数据
        // try{
            //关联模型
            
           $data = Goods::where('gid',$id)->update($res);
            
            if($data){

                return redirect('/admin/goods')->with('success','修改成功');
            }else{
                return back()->with('success','修改失败');
            }
        // } catch(\Exception $e){

            

        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //根据id获取图片的路径 unlink
        $res = Goodspicture::where('gid',$id)->get();

        // dd($res);

        foreach($res as $k=>$v){

            $path = $v->pic_name;
            $info = unlink('.'.$path);
        }
      

        //判断
        // if()

        //关联删除   删除商品的信息  goods 
        $goods = Goods::find($id);

        $goods->delete();
        //删除商品的图片的信息  Goodspicture
        try{
            //关联模型
            $rs = $goods->goodspic()->delete();

            if($rs){

                return redirect('/admin/goods')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('success','删除失败');

        }
    }
}

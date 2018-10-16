<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use APP\Http\Requests\adminUserRequest;
use Hash;
use App\Model\Admin\adminUser;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //多条件查询
         $rs = adminUser::orderBy('guid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $guname = $request->input('guname');
                $gsex = $request->input('gsex');
                //如果用户名不为空
                if(!empty($guname)) {
                    $query->where('guname','like','%'.$guname.'%');
                }
                //如果性别不为空
                if(!empty($gsex)) {
                    $query->where('gsex','like','%'.$gsex.'%');
                }
            })
            ->paginate($request->input('num', 5));

           /* $num = $request->num;
            $*/


        return view('admin.adminUser.index',[
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
        return view('admin.adminUser.add',['title'=>'用户的添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'guname' => 'unique:guser,guname|required|regex:/^\w{6,12}$/',
            'gpwd' => 'required|regex:/^\S{6,12}$/',
            'repass' =>'same:gpwd',
            'gphone' =>'regex:/^1[3456789]\d{9}$/',

        ],[
            'guname.unique'=>'用户名已存在',
            'guname.required'=>'用户名不能为空!!',
            'gpwd.required'=>'密码不能为空',
            'guname.regex'=>'用户名格式不正确',
            'gpwd.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'gphone.regex'=>'手机号码格式不正确',
        ]


        );

        $res = $request->except('_token','profile','repass');

        //文件上传
	   	if($request->hasFile('profile')){

	    	//自定义名字
	        $name = time().rand(1111,9999);

	        //获取后缀
	        $suffix = $request->file('profile')->getClientOriginalExtension(); 

	        //移动
	        $request->file('profile')->move('uploads',$name.'.'.$suffix);
	    }

        $res['profile'] = '/uploads/'.$name.'.'.$suffix;

      
        //hash加密
        //$res['password'] = Hash::make($request->input('password'));
        //加密解密
        $res['gpwd'] = encrypt($request->input('gpwd'));

        // dump($res);


        try{
           
            $rs = adminUser::create($res);


        

            return redirect('admin/adminUser')->with('success','添加成功');
            
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
    public function edit($guid)
    {
        //
        $res = adminUser::find($guid);

        return view('admin.adminUser.edit',[
            'title'=>'用户的修改页面',
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
    public function update(Request $request, $guid)
    {
        //
        $res = $request->except('_token','_method','profile');

         //文件上传
        if($request->hasFile('profile')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension(); 

            //移动
            $request->file('profile')->move('uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        try{
           
            $rs = adminUser::where('guid',$guid)->update($res);


            

            return redirect('/admin/adminUser')->with('success','修改成功');
           
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
    public function destroy($guid)
    {
        //
          try{
           
            $res = adminUser::where('guid',$guid)->delete();

            if($guid == session('guid'))
            {
                session(['guid'=>'']);
            }

            return redirect('/admin/adminUser')->with('success','删除成功');
            
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }
}

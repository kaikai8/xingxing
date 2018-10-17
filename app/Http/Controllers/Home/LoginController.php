<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use Config;
use Hash;
use App\Model\Home\User;
use App\Model\Home\muser;
use App\Model\Home\addr_message;


class LoginController extends Controller
{
    /**
     *  前台登陆页面. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function login()
    {

    	return view('home.login.login',['title'=>'星星商城-用户登录']);
    }

     /**
     *  表单验证. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function dologin(Request $request)
    {
    	if($request->uname == '')
    	{
    		return back()->with('error','请输入用户名!');
    	}

    	if($request->password == '')
    	{
    		return back()->with('error','请输入密码!');
    	}

    	if($request->code == '')
    	{
    		return back()->with('error','请输入验证码!');
    	}
    	//检测验证码
        $code = session('code');

        if($code != $request->code){

            return back()->with('error','验证码错误!');
        }

    	//检测用户名
        $users = User::where('uname',$request->uname)->first();

        if(!$users){

            return back()->with('error','用户名或密码错误!');
        }


        //检测密码   加密解密
        if (decrypt($users->password) != $request->password) {
            
            return back()->with('error','用户名或密码错误!');

        }

        //存储用户id
        session(['uid'=>$users->uid]);
        // dd(session('uid'));

    	//提示信息
        return redirect('/')->with('success','登录成功');
    }

    /**
     *  用户注册页面. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function zhuce()
    {
    	return view('home.login.zhuce',['title'=>'星星商城-用户注册']);
    }

    /**
     *  注册验证. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function dozhuce(Request $request)
    {
    	//表单验证
        $this->validate($request, [
            'uname' => 'unique:user,uname|required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass' =>'same:password',
            'email' =>'email:email',

        ],[
            'uname.unique'=>'用户名已存在',
            'uname.required'=>'用户名不能为空!!',
            'password.required'=>'密码不能为空',
            'uname.regex'=>'用户名格式不正确',
            'passwoed.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'email.email'=>'邮箱格式不正确',
        ]);


        

        $res = $request->except('_token','repass');

        

      
        //hash加密
        //$res['password'] = Hash::make($request->input('password'));
        //加密解密
        $res['password'] = encrypt($request->input('password'));

        // dump($res);


        try{
           
            $id = User::insertGetId($res);
            // dd($id);
            $rs = muser::create(['user_id'=>$id]);


           

            return redirect('home/login')->with('success','添加成功');
            
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
    }

    /**
     *  退出登陆. 
     *
     *   @return \Illuminate\Http\Response 
     */
    
    public function logout()
    {
        //清空session uid
        session(['uid'=>'']);

        return redirect('/home/login');    
    }

    /**
     *  用户个人中心. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function centre()
    {
        $res =User::where('uid',session('uid'))->first();
        $rs =muser::where('user_id',session('uid'))->first();

        return view('home.centre.centre',['title'=>'用户个人中心','res'=>$res]);
    }

    /**
     *  用户个人资料. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function message()
    {

        $res =User::where('uid',session('uid'))->first();
        $rs =muser::where('user_id',session('uid'))->first();

        

        return view('home.centre.message',['title'=>'用户信息','res'=>$res,'rs'=>$rs]);
    }

    /**
     *  用户个人资料修改. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function upmess(Request $request)
    {
        // dd($request);
        $res = $request->only('mphone','sex');
        
        $data = $request->only('email');
        
        $this->validate($request, [
            'uname' => 'required|regex:/^\w{6,12}$/',
            'email' =>'email:email',
            'mphone' =>'regex:/^1[3456789]\d{9}$/',

        ],[
            'uname.required'=>'用户名不能为空!!',
            'uname.regex'=>'用户名格式不正确',
            'email.email'=>'邮箱格式不正确',
            'mphone.regex'=>'手机号码格式不正确',
            


        ]);
         //文件上传
        if($request->hasFile('prefile')){

            //自定义名字
            $name= time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('prefile')->getClientOriginalExtension(); 

            //移动
            $request->file('prefile')->move('uploads',$name.'.'.$suffix);

            $res['prefile'] = '/uploads/'.$name.'.'.$suffix;
        }

        // dd($request->hasFile('prefile'));
       

       /* $d = array('email'=>$res['email']);
        $s = array('sex'=>$res['sex'],'prefile'=>$res['prefile'],'mphone'=>$res['mphone']);
*/
        

        try{
            $rs =User::where('uid',session('uid'))->update($data);
            $re =muser::where('user_id',session('uid'))->update($res);
            // dd($rs);
            // dd($re);

            return redirect('/home/centre');
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }
    }   
    /**
     *  密码修改. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function pass()
    {
        return view('home.centre.pass',['title'=>'密码修改']);
    }

     /**
     *  密码修改. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function dopass(Request $request)
    {
        //获取数据库密码
        $pass = User::where('uid',session('uid'))->first();

        //获取旧密码
        $oldpass = $request->oldpass;

        

        if(!$oldpass)
        {
            $oldpass = decrypt($pass->password);
        }elseif($oldpass)
        {
            if(decrypt($pass->password) != $oldpass){

                return back()->with('error','原密码错误');
            }
        }

        if(!($request->password))
        {
            $request->repass = $request->password = decrypt($pass->password);
        }

        

         //表单验证
        $this->validate($request, [
            
            'repass' =>'same:password',
        ],[
            'repass.same'=>'两次密码不一致',

        ]);
        
        $rs['password'] = encrypt($request->password);

         

        try{
           
            $data = User::where('uid',session('uid'))->update($rs);
            //清空session uid
             session(['uid'=>'']);

            return redirect('/home/login');
            
        }catch(\Exception $e){

            return back()->with('error','修改密码失败');
        }
    
    }

    /**
     *  收货信息浏览. 
     *
     *   @return \Illuminate\Http\Response 
     */
    
    public function addr()
    {
        $res = addr_message::where('user_id',session('uid'))->get();
        // dd($res[0]['did']);
        return view('home.centre.addr',['title'=>'收货信息','res'=>$res]);
    }

    /**
     *  添加页面 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function doaddr()
    {
        return view('home.centre.doaddr',['title'=>'添加收获信息']);
    }

     /**
     *  添加收获信息 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function add_addr(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'dname' => 'required',
            'dphone' =>'regex:/^1[3456789]\d{9}$/',
            'addr' =>'required',

        ],[
            'dname.required'=>'用户名不能为空!!',
            'dphone.regex'=>'手机号码格式不正确',
            'addr.required'=>'收货地址不能为空',

        ]);


        
        $id = session('uid');
        $res = $request->except('_token','billing_country','save_address');
        $res['user_id'] = $id;
        
        


        try{
           
            $rs = addr_message::create($res);


        

            return redirect('home/addr')->with('success','添加成功');
            
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
    }

    /**
     *  修改用户收货信息. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function upaddr($id)
    {
        $res = addr_message::find($id);
        return view('home.centre.upaddr',['title'=>'编辑收获信息','res'=>$res]);
    }

    /**
     *  验证用户信息. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function doupaddr(Request $request,$id)
    {
        //表单验证
        $this->validate($request, [
            'dname' => 'required',
            'dphone' =>'regex:/^1[3456789]\d{9}$/',
            'addr' =>'required',

        ],[
            'dname.required'=>'用户名不能为空!!',
            'dphone.regex'=>'手机号码格式不正确',
            'addr.required'=>'收货地址不能为空',

        ]);
        $res = $request->only('dname','dphone','addr');

        try{
           
            $rs = addr_message::where('did',$id)->update($res);


            

            return redirect('/home/addr')->with('success','修改成功');
           
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }
    }

    /**
     *  设置默认地址. 
     *
     *   @return \Illuminate\Http\Response 
     */
    
    public function moren($id)
    {
        $res = addr_message::where('user_id',session('uid'))->where('moren','1')->get();
        /*foreach ($res as $k=>$v)
        {
            $rs = $res[$k]->only('moren');
            dump($rs);
        }*/
        $did = $res[0]['did'];
        $rs['moren'] = '0';
        $re['moren'] = '1';
        


        try{
           
            $a = addr_message::where('did',$did)->update($rs);
            $b = addr_message::where('did',$id)->update($re);

            return redirect('/home/addr')->with('success','修改成功');
           
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }  
       
        
        // dd($moren);
    }

    /**
     *  删除收货信息. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function deladdr($id)
    {
         try{
           
            $res = addr_message::where('did',$id)->delete();

           
            return redirect('/home/addr')->with('success','删除成功');
            
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use Config;
use Hash;
use App\Model\Home\User;

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
        ]


        );

        $res = $request->except('_token','repass');

        

      
        //hash加密
        //$res['password'] = Hash::make($request->input('password'));
        //加密解密
        $res['password'] = encrypt($request->input('password'));

        // dump($res);


        try{
           
            $rs = User::create($res);


            if($rs){

                return redirect('home/login')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
    }
}

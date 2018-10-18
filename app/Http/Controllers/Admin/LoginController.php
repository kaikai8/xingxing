<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 

use App\Model\Admin\adminUser;
use Hash;
use Config;

class LoginController extends Controller
{
	/**
	 *  登陆页面. 
	 *
	 *   @return \Illuminate\Http\Response 
	 */
    public function login()
    {
    	return view('admin.login.login');
    }

    /**
     *  表单验证. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function dologin(Request $request)
    {
        
    	//检测验证码
        $code = session('code');

        if($code != $request->code){

            return back()->with('error','验证码错误!');
        }

    	//检测用户名
        $users = adminUser::where('guname',$request->guname)->first();

        if(!$users){

            return back()->with('error','用户名或密码错误!');
        }


    	

        //检测密码   加密解密
        if (decrypt($users->gpwd) != $request->gpwd) {
            
            return back()->with('error','用户名或密码错误!');

        }

        //存储用户id
        session(['guid'=>$users->guid]);

    	//提示信息
        return redirect('/admin/adminUser')->with('success','登录成功');
    }

    /**
     *  生成验证码方法. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function captcha()
    {
    	$phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
      
        session(['code'=>$phrase]);

        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    /**
     *  修改头像. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function profile()
    {
    	$rs = adminUser::where('guid',session('guid'))->first();

    	return view('admin.login.profile',['title'=>'修改头像信息','rs'=>$rs]);
    }

    /**
     *  头像验证. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function doprofile(Request $request)
    {
    	//获取上传的文件对象  $_FILES
        $file = $request->file('profile');
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //设置名字  32948324324832894.jpg
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;

            $path = $file->move(Config::get('app.uploads'),$newName);

            $filepath = '/uploads/'.$newName;

            $res['profile'] = $filepath;

            adminUser::where('guid',session('guid'))->update($res);

            //返回文件的路径
            return  $filepath;
        }
    }


    /**
     *  修改密码. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function pass()
    {
    	return view('admin.login.pass',['title'=>'修改密码']);
    }

    /**
     *  密码修改验证. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function dopass(Request $request)
    {
    	/* //获取数据库密码
        $pass = adminUser::where('guid',session('guid'))->first();

        //获取旧密码
        $oldpass = $request->oldpass;

        if(decrypt($pass->gpwd) != $oldpass){

            return back()->with('error','原密码错误');
        }

        $rs['gpwd'] = encrypt($request->gpwd);

        try{
           
            $data = adminUser::where('guid',session('guid'))->update($rs);
            

            return redirect('/admin/login')->with('success','添加成功');
            
        }catch(\Exception $e){

            return back()->with('error','修改密码失败');
        }*/
          //获取数据库密码
        $pass = adminUser::where('guid',session('guid'))->first();

        //获取旧密码
        $oldpass = $request->oldpass;

        

        if(!($request->oldpass))
        {
            $request->oldpass = decrypt($pass->gpwd);
        }else
        {
            if(decrypt($pass->gpwd) != $oldpass){

            return back()->with('error','原密码错误');
            }
        }

        if(!($request->gpwd))
        {
            $request->repass = $request->gpwd = decrypt($pass->gpwd);
        }

        

         //表单验证
        $this->validate($request, [
            
            'repass' =>'same:gpwd',
        ],[
            'repass.same'=>'两次密码不一致',

        ]);
        
        $rs['gpwd'] = encrypt($request->gpwd);

         

        try{
           
            $data = adminUser::where('guid',session('guid'))->update($rs);
            //清空session uid
             session(['guid'=>'']);

            return redirect('/admin/login');
            
        }catch(\Exception $e){

            return back()->with('error','修改密码失败');
        }
    }

    /**
     *  退出登陆. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function logout()
    {
    	//清空session guid
    	session(['guid'=>'']);

    	return redirect('/admin/login');	
    }

    
}

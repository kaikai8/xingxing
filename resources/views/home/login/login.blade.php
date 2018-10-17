<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/homes/css/base.css"/>
    <link rel="stylesheet" href="/homes/css/login.css"/>
     <link rel="stylesheet" type="text/css" href="/homes/css/form.css">
    <script src="/homes/js/jquery/jquery.min.js"></script>

	
	<style>

	.mws-login-username{
		width: 180px;
	    height: 32px;
	    outline: none;
	    border-radius: 3px;
	    border: 1px solid #ccc;
	    padding-left: 10px;
	    box-sizing: border-box;
		}		

	</style>
</head>
<body>
<div id="main">
    <div id="header">
    </div>
    <div class="container">
        <div class="bgPic"><img src="/homes/images/b3_1.jpg" alt=""/></div>
        <div class="register">
            <div class="title">
                <span>登录</span>
                <a href="/home/zhuce">去注册</a>
            </div>
			
             @if(session('error'))  
            <div class="mws-form-message warning">
                {{session('error')}}  

            </div>
            @endif
            <form class="mws-form" action="/home/dologin" method="post">
                <div class="default">
                    <p>请输入用户名或手机号码</p>
                    <input id="uname" name="uname" data-form="uname" type="text" placeholder="用户名"/>
                    <label for="uname"></label>
                </div>
                <div class="default">
                    <p>请输入账号密码</p>
                    <input id="password" name="password" data-form="password" type="password" placeholder="密码"/>
                    <label for="password"></label>
                </div>
                 <div class="default">
                        <div class="mws-form-item">
                            <input type="text" name="code" class="mws-login-username required" placeholder="请输入验证码">
                            <img src="/admin/cap" alt="" onclick='this.src = this.src +="?1"'>
                        </div>
                    </div>
                <div class="submit">
                        <span class="notice">
                            <a href="#">忘记密码</a>
                        </span>
                        {{csrf_field()}}
                    <button class="s_hover" data-form="submit">登录</button>
                </div>
            </form>
            <!-- <div class="other_login">
                <div class="log">
                    <span>社交账号登录</span>
                </div>
                <div class="icon">
                    <ul>
                        <li data-log="icon" class="i_hover">
                            <img data-icon="wx" src="img/register/wx.png" alt=""/>
                            <span class="prompt" >微信登录</span>
                        </li>
                        <li data-log="icon" class="i_hover">
                            <img data-icon="qq" src="img/register/qq.png" alt=""/>
                            <span class="prompt" >QQ登录</span>
                        </li>
                        <li data-log="icon" class="i_hover">
                            <img data-icon="wb" src="img/register/wb.png" alt=""/>
                            <span class="prompt" >微博登录</span>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <div id="footer">
    </div>
</div>

</body>
<script>
    /*setTimeout(function(){

        $('.mws-form-message').fadeOut(2000);

    },5000)*/

    $('.mws-form-message').delay(3000).fadeOut(2000);
</script>
</html>
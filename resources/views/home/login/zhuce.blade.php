<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/homes/css/base.css"/>
    <link rel="stylesheet" href="/homes/css/register.css"/>
    <link rel="stylesheet" type="text/css" href="/homes/css/form.css">
    <script src="/homes/js/jquery/jquery.min.js"></script>


    
</head>
<body>
   
    
    <div id="main">
        <div id="header">
        </div>
        <div class="container">
            <div class="bgPic"><img src="/homes/images/b2_1.jpg" alt=""/></div>
            <div class="register">
                <div class="title">
                    <span>注册</span>
                    <a href="/home/login">去登录</a>
                </div>
               <!--  <div class="alert alert-danger" role="alert">
                      @if (count($errors) > 0)
                        <div class="mws-form-message error">
                            错误信息
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div> -->
                <div class="mws-panel-body no-padding">

                    @if (count($errors) > 0)
                        <div class="mws-form-message error">
                            错误信息
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="/home/dozhuce" method='post' enctype='multipart/form-data' class="mws-form">
                    <div class="default">
                        <p>用户名由6~12个数字和英文字符组成</p>
                        <input id="uname" name="uname" data-form="uname" type="text"  placeholder="用户名由6~12个数字和英文字符组成" />
                        <label for="uname"></label>
                    </div>
                    <div class="default">
                        <p>密码由6~12个数字和英文字符组成</p>
                        <input id="password" name="password" data-form="password" type="password" placeholder="密码6~12位组成"/>
                        <label for="password"></label>
                    </div>
                    <div class="default">
                        <p>请确认两次输入密码一致</p>
                        <input id="repass" data-form="repass" type="password"/ placeholder="输入确认密码">
                        <label for="repass"></label>
                    </div>
                    <div class="default">
                        <p>请输入邮箱</p>
                        <input id="" name="email" data-form="email" type="text"/ placeholder="请输入正确邮箱">
                        <label for="email"></label>
                    </div>
                    <div class="submit">
                        <span class="notice">点击"注册"代表您同意遵守
                            <a href="#">用户协议</a>
                            和
                            <a href="#">隐私条款</a>
                        </span>
                        {{csrf_field()}}
                        <button class="s_hover" data-form="submit">注册</button>
                    </div>
                </form>
               <!--  <div class="other_login">
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
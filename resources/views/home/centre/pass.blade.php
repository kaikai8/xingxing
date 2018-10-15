@extends('layout.homes')


@section('title',$title)


@section('content')
<div class="container">
    <div class="row">
        <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="post-6 page type-page status-publish hentry">
                <div class="entry-content">
                    <header>
                        <h2 class="entry-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">我的帐户</font></font></h2>
                    </header>
                    
                    <div class="entry-content">
                        <div class="woocommerce">
                            <nav class="woocommerce-MyAccount-navigation">
                                <ul>
                                    <li class="is-active">
                                        <a href="/home/message"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">个人资料</font></font></a>
                                    </li>
                                    
                                    <li>
                                       <a href="/home/pass"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名密码修改</font></font></a>
                                    </li>
                                    
                                    <li>
                                        <a href="http://demo.smartaddons.com/templates/html/etrostore/addresses.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></a>
                                    </li>
                                    
                                    <li>
                                        <a href="/home/logout"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退出登陆</font></font></a>
                                    </li>
                                </ul>
                            </nav>
                          
                            <div class="woocommerce-MyAccount-content">
                                <form class="edit-account" action="/home/dopass" method="post">
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
                                    <fieldset>
                                        <legend><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">密码更改</font></font></legend>
                                        <p class="form-row form-row-wide">
                                            <label for="password_current"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">当前密码（留空以保持不变）</font></font></label>
                                            <input type="password" class="input-text" name="oldpass" id="password_current">
                                        </p>
                                        
                                        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                            <label for="password_1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新密码（留空以保持不变）</font></font></label>
                                            <input type="password" class="input-text" name="password" id="password_1">
                                        </p>
                                        
                                        <p class="form-row form-row-wide">
                                            <label for="password_2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认新密码</font></font></label>
                                            <input type="password" class="input-text" name="repass" id="password_2">
                                        </p>
                                    </fieldset>
                                    
                                    <div class="clear"></div>
                                    <p>
                                        {{csrf_field()}}

                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" class="button" name="save_account_details" value="保存更改"></font></font>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
    $(function(){
        $('body').removeClass('page-id-6');
        $('body').removeClass('home-style1');
        $('body').addClass('woocommerce-account');
        $('body').addClass('woocommerce-page');
        $('.mws-form-message').delay(3000).fadeOut(2000);

    })
</script>
@stop
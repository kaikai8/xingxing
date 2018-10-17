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
                                    <li>
                                        <a href="/home/message"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">个人资料</font></font></a>
                                    </li>
                                    
                                    <li>
                                       <a href="/home/pass"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户密码修改</font></font></a>
                                    </li>
                                    
                                    <li>
                                        <a href="/home/addr"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></a>
                                    </li>
                                    
                                    <li>
                                        <a href="/home/logout"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退出登陆</font></font></a>
                                    </li>
                                </ul>
                            </nav>
                          	<div class="woocommerce-MyAccount-content">
                                <form method="post" action="/home/doupaddr/{{$res->did}}">
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
                                    <h3>修改收货信息</h3>
                                    <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                        <label for="billing_first_name">
                                            收货人 
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input type="text" class="input-text " name="dname" id="billing_first_name" placeholder="" autocomplete="given-name" value="{{$res->dname}}">
                                    </p>
                                    
                                    <p class="form-row form-row form-row-last validate-required" id="billing_last_name_field">
                                        <label for="billing_last_name">
                                            电话 
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input type="text" class="input-text " name="dphone" id="billing_last_name" placeholder="" autocomplete="family-name" value="{{$res->dphone}}">
                                    </p>
                                    
                                    <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                       <label for="billing_address_1">
                                           详细地址
                                           <abbr class="required" title="required">*</abbr>
                                       </label>
                                       
                                       <input type="text" class="input-text " name="addr" id="billing_address_1" placeholder="填入详细地址" autocomplete="address-line1" value="{{$res->addr}}">
                                   </p>
                                    
                                    <div class="clear"></div>
                                    
                                    <p>
                                    {{csrf_field()}}
                                        <input type="submit" class="button" name="save_address" value="修改">
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
        $('body').addClass('woocommerce-edit-address');
        $('.mws-form-message').delay(3000).fadeOut(2000);
        
       

    });
</script>
@stop
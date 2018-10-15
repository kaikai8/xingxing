@extends('layout.homes')

@section('title',$title)

@section('content')


<div class="container">
	<div class="row">
		<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="post-6 page type-page status-publish hentry">
				<div class="entry-content">
					<header>
						<h2 class="entry-title">我的账户</h2>
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
							
								<form class="edit-account" action="/home/upmess" method="post" enctype='multipart/form-data'>
								
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
									
									<p class="form-row form-row-last">
										<label for="account_last_name">
											用户名 
											<span class="required">*</span>
										</label>
										<input type="text"  name="uname" id="account_last_name" value="{{$res->uname}}">
										
									</p>

									<p class="form-row form-row-last">
										<label for="account_last_name">
											性别 
											<span class="required">*</span>
										</label>
										<input type="radio"  name="sex" id="account_last_name" value="男" @if($rs->sex == '男') checked='checked' @endif> 男
										<input type="radio"  name="sex" id="account_last_name" value="女" @if($rs->sex == '女') checked='checked' @endif> 女
									</p>
									
								  
								  
									<p class="form-row form-row-wide">
										<label for="account_email">
											邮箱
											<span class="required">*</span>
										</label>
										
										<input type="email" class="input-text" name="email" id="account_email" value="{{$res->email}}">
									</p>

									<p class="form-row form-row-wide">
										<label for="account_email">
											手机号
											<span class="required">*</span>
										</label>
										
										<input type="text" class="input-text" name="mphone" id="account_email" value="{{$rs->mphone}}">
									</p>

									<p class="form-row form-row-wide">
										<label for="account_email">
											头像
											<span class="required">*</span>
										</label>
										
										<div class="mws-form-item">
					                		<img src="{{$rs->prefile}}" alt="" width='100px'>
					                    	<div style="position: relative;" class="fileinput-holder"><input type="file" name='prefile'>
					                    </div>
                
									</p>
								  
									
									
									<div class="clear"></div>
									<p>
										{{csrf_field()}}
										<input type="submit" class="button" name="save_account_details" value="完成">
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
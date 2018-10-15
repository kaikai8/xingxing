@extends('layout.homes')

@section('title',$title)

@section('content')


	

	<div class="container">
		<div class="row">
			<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="post-6 page type-page status-publish hentry">
					<div class="entry">
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
												<a href="create_account.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退出登陆</font></font></a>
											</li>
										</ul>
									</nav>
								  
									<div class="woocommerce-MyAccount-content">
										<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
											Hello </font></font><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$res->uname}}</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										</font></font></p>
										<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
											在您的帐户信息中心，您可以查看 
											 </font></font><a href="http://demo.smartaddons.com/templates/html/etrostore/order.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">最近的订单</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">，管理您的</font></font><a href="http://demo.smartaddons.com/templates/html/etrostore/addresses.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">送货和帐单地址，</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">  
											以及</font></font><a href="http://demo.smartaddons.com/templates/html/etrostore/account_details.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改密码和帐户详细信息</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">。
										</font></font></p>
									</div>
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
	})
</script>
@stop
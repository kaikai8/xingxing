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
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
									默认情况下，将在结帐页面上使用以下地址。
								</font></font></p>
								
								<div class="u-column1 col-1 woocommerce-Address addresses">
									<header class="woocommerce-Address-title title">
										<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">帐单地址</font></font></h3>
										<a href="address_billing_details.html" class="edit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑</font></font></a>
									</header>
									
									<address><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										永久地址</font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										Thomas Nolan Kaszas II </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										5322 Otter Lane </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										Middleberge FL 32068</font></font><br>
									</address>
								</div>
								
								<div class="u-column1 col-1 woocommerce-Address addresses">
									<header class="woocommerce-Address-title title">
										<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收件地址</font></font></h3>
										<a href="address_shipping_details.html" class="edit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑</font></font></a>
									</header>
									
									<address><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										永久地址</font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										Thomas Nolan Kaszas II </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										5322 Otter Lane </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										Middleberge FL 32068</font></font><br>
									</address>
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
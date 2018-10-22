<!DOCTYPE html>
<html lang="en">
<head>	
	<title>@yield('title')</title>
	<meta charset="utf-8" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- GOOGLE WEB FONTS -->
	<link rel="stylesheet" href="/homes/css/font-awesome.min.css">
	
	<!-- BOOTSTRAP 3.3.7 CSS -->
	<link rel="stylesheet" href="/homes/css/bootstrap.min.css" />
	
	<!-- SLICK v1.6.0 CSS -->
	<link rel="stylesheet" href="/homes/css/slick-1.6.0/slick.css" />
	
	<link rel="stylesheet" href="/homes/css/jquery.fancybox.css" />
	<link rel="stylesheet" href="/homes/css/yith-woocommerce-compare/colorbox.css" />
	<link rel="stylesheet" href="/homes/css/owl-carousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="/homes/css/owl-carousel/owl.theme.default.min.css" />
	<link rel="stylesheet" href="/homes/css/js_composer/js_composer.min.css" />
	<link rel="stylesheet" href="/homes/css/woocommerce/woocommerce.css" />
	<link rel="stylesheet" href="/homes/css/yith-woocommerce-wishlist/style.css" />

	<link rel="stylesheet" href="/homes/css/form.css" />
	
	

	
	
	<link rel="stylesheet" href="/homes/css/yith-woocommerce-wishlist/style.css" />
	<link rel="stylesheet" href="/homes/css/custom.css" />
	<link rel="stylesheet" href="/homes/css/app-orange.css" id="theme_color" />
	<link rel="stylesheet" href="" id="rtl" />
	<link rel="stylesheet" href="/homes/css/app-responsive.css" /> 
</head>

<body class="page page-id-6 home-style1">

     
		@php
		if(session('uid')){
			$res = DB::table('user')->where('uid',session('uid'))->first();
		}

        @endphp
	
	<div class="body-wrapper theme-clearfix">
		<header id="header" class="header header-style1">
			<div class="header-top clearfix">
				<div class="container">
					<div class="rows">
						<!-- SIDEBAR TOP MENU -->
						<div class="pull-left top1">
							<div class="widget text-2 widget_text pull-left">
								<div class="widget-inner">
									<div class="textwidget">
										<div class="call-us"><span>联系我们: </span>0123-444-666654123</div>
									</div>
								</div>
							</div>
							
							<!-- <div class="widget text-3 widget_text pull-left">
								<div class="widget-inner">
									<div class="textwidget">
										<div id="lang_sel">
											<ul class="nav">
												<li>
													<a class="lang_sel_sel icl-en">
														<img class="iclflag" title="English" alt="en" src="/homes/images/icons/en.png" width="18" height="12" /> English
													</a>
													<ul>
														<li class="icl-en">
															<a href="#">
																<img class="iclflag" title="English" alt="en" src="/homes/images/icons/en.png" width="18" height="12" /> English
															</a>
														</li>
														
														<li class="icl-ar">
															<a href="#">
																<img class="iclflag" title="Arabic" alt="ar" src="/homes/images/icons/ar.png" width="18" height="12" /> Arabic
															</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							<div class="widget woocommerce_currency_converter-2 widget_currency_converter pull-left">
								<div class="widget-inner">
									<form method="post" class="currency_converter" action="">
										<ul class="currency_w">
											<li>
												<a href="#" class="">USD</a>
												<ul class="currency_switcher">
													<li><a href="#" class="reset default active" data-currencycode="USD">USD</a></li>
													<li><a href="#" class="" data-currencycode="EUR">EUR</a></li>
												</ul>
											</li>
										</ul>
									</form>
								</div>
							</div> -->
						</div>
						
						<div class="wrap-myacc pull-right">
							<div class="sidebar-account pull-left">
								@if(empty($res->uname)) 

									<a href="/home/login" target="_top" class="h" style = "color:red">亲，请登录 | </a> 							
									<a href="/home/zhuce" target="_top" style = "color:red"> 免费注册</a>
								@else
									<span><a href = "/home/centre" style = "color:#ffaa00">您好! {{$res->uname}} |</a></span>
									<a href="/home/logout" target="_top" style = "color:#ffaa00">退出</a>

								@endif
								
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="header-mid clearfix">
				<div class="container">
					<div class="rows">
						<!-- LOGO -->
						<div class="etrostore-logo pull-left">
							<a href="#">
								<img src="/homes/images/icons/logo-orange.png" alt="Shoopy">
							</a>
						</div>
						
						<div class="mid-header pull-right">
							<div class="widget-1 widget-first widget sw_top-2 sw_top">
								<div class="widget-inner">
									<div class="top-form top-search">
										<div class="topsearch-entry">
											<form method="get" action="">
												<div>
												   <input type="text" value="" name="s" placeholder="Enter your keyword...">	
													<div class="cat-wrapper">
														<label class="label-search">
															<select name="search_category" class="s1_option">
															
																<option value="">所有类别</option>
																<option value="8">电脑 & Laptops</option>
																<option value="13">Computers & Networking</option>
																<option value="14">Smartphones & Tablet</option>
																<option value="15">Home Furniture</option>
																<option value="16">Home Appliances</option>
																<option value="17">Electronic Component</option>
																<option value="18">Household Goods</option>
																<option value="32">Appliances</option>
																<option value="49">Accessories</option>
																<option value="51">Electronics</option>
																<option value="78">Televisions</option>
																<option value="80">Cameras & Accessories</option>
															</select>
														</label>
													</div>
													
													<button type="submit" title="Search" class="fa fa-search button-search-pro form-button"></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							
							<div class="widget sw_top-3 sw_top pull-left">
								<div class="widget-inner">
									<div class="top-form top-form-minicart etrostore-minicart pull-right">
										<div class="top-minicart-icon pull-right">
											<i class="fa fa-shopping-cart"></i>
									
										</div>
										
										<div class="wrapp-minicart">
											<div class="minicart-padding">
												<div class="number-item">
													购物车
												</div>
												
												<ul class="minicart-content">
													<li>
														<a href="simple_product.html" class="product-image">
															<img 	width="100" height="100" src="/homes/images/1903/45-150x150.jpg" class="attachment-100x100 size-100x100 wp-post-image" alt="" 
																	srcset="/homes/images/1903/45-150x150.jpg 150w, /homes/images/1903/45-300x300.jpg 300w, images/1903/45-180x180.jpg 180w, /homes/images/1903/45.jpg 600w" 
																	sizes="(max-width: 100px) 100vw, 100px" />
														</a>
														
														<div class="detail-item">
															<div class="product-details">
																<h4>
																	<a class="title-item" href="simple_product.html">Veniam Dolore</a>
																</h4>
																
																<div class="product-price">
																	<span class="price">
																		<span class="woocommerce-Price-amount amount">
																			<span class="woocommerce-Price-currencySymbol">$</span>190.00
																		</span>
																	</span>
																	
																	<div class="qty">
																		<span class="qty-number">1</span>									
																	</div>
																</div>
																
																<div class="product-action clearfix">
																	<a href="#" class="btn-remove" title="Remove this item">
																		<span class="fa fa-trash-o"></span>
																	</a>
																	
																	<a class="btn-edit" href="cart.html" title="View your shopping cart">
																		<span class="fa fa-pencil"></span>
																	</a>    
																</div>
															</div>
														</div>
													</li>
													
													<li>
														<a href="simple_product.html" class="product-image">
															<img 	width="100" height="100" src="/homes/images/1903/22-150x150.jpg" class="attachment-100x100 size-100x100 wp-post-image" alt="" 
																	srcset="/homes/images/1903/22-150x150.jpg 150w, /homes/images/1903/22-300x300.jpg 300w, /homes/images/1903/22-180x180.jpg 180w, /homes/images/1903/22.jpg 600w" 
																	sizes="(max-width: 100px) 100vw, 100px" />
														</a>
														
														<div class="detail-item">
															<div class="product-details">
																<h4>
																	<a class="title-item" href="simple_product.html">Cleaner with bag</a>
																</h4>
																
																<div class="product-price">
																	<span class="price">
																		<span class="woocommerce-Price-amount amount">
																			<span class="woocommerce-Price-currencySymbol">$</span>350.00
																		</span>
																	</span>
																	
																	<div class="qty">
																		<span class="qty-number">1</span>									
																	</div>
																</div>
																
																<div class="product-action clearfix">
																	<a href="#" class="btn-remove" title="Remove this item">
																		<span class="fa fa-trash-o"></span>
																	</a>
																	
																	<a class="btn-edit" href="cart.html" title="View your shopping cart">
																		<span class="fa fa-pencil"></span>
																	</a>
																</div>
															</div>
														</div>
													</li>
												</ul>
												
												<div class="cart-checkout">
													<div class="price-total">
														<span class="label-price-total">Total</span>
														
														<span class="price-total-w">
															<span class="price">
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">$</span>540.00
																</span>
															</span>
														</span>			
													</div>
													
													<div class="cart-links clearfix">
														<div class="cart-link">
															<a href="cart.html" title="Cart">View Cart</a>
														</div>
														
														<div class="checkout-link">
															<a href="checkout.html" title="Check Out">Check Out</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="widget nav_menu-3 widget_nav_menu pull-left">
								<div class="widget-inner">
									<ul id="menu-wishlist" class="menu">
										<li class="menu-wishlist">
											<a class="item-link" href="#">
												<span class="menu-title">Wishlist</span>
											</a>
										</li>
										
										<li class="yith-woocompare-open menu-compare">
											<a class="item-link compare" href="#">
												<span class="menu-title">Compare</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="header-bottom clearfix">
				<div class="container">
					<div class="rows">
						<!-- Primary navbar -->
						<div id="main-menu" class="main-menu">
							<nav id="primary-menu" class="primary-menu">
								<div class="navbar-inner navbar-inverse">
									<div class="resmenu-container">
										<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenuprimary_menu">
											<span class="sr-only">分类</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
										
										<div id="ResMenuprimary_menu" class="collapse menu-responsive-wrapper">
											<ul id="menu-primary-menu" class="etrostore_resmenu">
												<li><a href="/">首页</a></li>
												<li><a href="/home/cart">购物车</a></li>
												<li><a href="/home/centre">个人中心</a></li>
												<!-- <li><a href="my_account.html">个人中心</a></li> -->
												<li><a href="#">店铺</a></li>
												<li><a href="#">简单的商品</a></li>
												<li><a href="#">关于我们</a></li>
												<li><a href="#">联系我们</a></li>
											</ul>
										</div>
									</div>
									
									<ul id="menu-primary-menu-1" class="nav nav-pills nav-mega etrostore-mega etrostore-menures">
										<li><a href="/">首页</a></li>
										<li><a href="/home/cart">购物车</a></li>
										<li><a href="/home/centre">个人中心</a></li>
										<!-- <li><a href="my_account.html">个人中心</a></li> -->
										<li><a href="#">店铺</a></li>
										<li><a href="#">简单的商品</a></li>
										<li><a href="#">关于我们</a></li>
										<li><a href="#">联系我们</a></li>
									</ul>
								</div>
							</nav>
						</div>
						<!-- /Primary navbar -->
				  
						<div class="top-form top-form-minicart etrostore-minicart pull-right">
							<div class="top-minicart-icon pull-right">
								<i class="fa fa-shopping-cart"></i>
								<a class="cart-contents" href="cart.html" title="View your shopping cart">
									<span class="minicart-number">2</span>
								</a>
							</div>
						 
							<div class="wrapp-minicart">
								<div class="minicart-padding">
									<div class="number-item">
										There are <span>items</span> in your cart
									</div>
									
									<ul class="minicart-content">
										<li>
											<a href="simple_product.html" class="product-image">
												<img 	width="100" height="100" src="/homes/images/1903/45-150x150.jpg" class="attachment-100x100 size-100x100 wp-post-image" alt="" 
														srcset="/homes/images/1903/45-150x150.jpg 150w, /homes/images/1903/45-300x300.jpg 300w, /homes/images/1903/45-180x180.jpg 180w, /homes/images/1903/45.jpg 600w" 
														sizes="(max-width: 100px) 100vw, 100px" />
											</a>
											
											<div class="detail-item">
												<div class="product-details">
													<h4>
														<a class="title-item" href="simple_product.html">Veniam Dolore</a>
													</h4>
													
													<div class="product-price">
														<span class="price">														
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>190.00
															</span>
														</span>	      
														
														<div class="qty">
															<span class="qty-number">1</span>									
														</div>
													</div>
													
													<div class="product-action clearfix">
														<a href="#" class="btn-remove" title="Remove this item">
															<span class="fa fa-trash-o"></span>
														</a>
														
														<a class="btn-edit" href="cart.html" title="View your shopping cart">
															<span class="fa fa-pencil"></span>
														</a>    
													</div>
												</div>
											</div>
										</li>
									  
										<li>
											<a href="simple_product.html" class="product-image">
												<img	 width="100" height="100" src="/homes/images/1903/22-150x150.jpg" class="attachment-100x100 size-100x100 wp-post-image" alt="" 
														srcset="/homes/images/1903/22-150x150.jpg 150w, /homes/images/1903/22-300x300.jpg 300w, /homes/images/1903/22-180x180.jpg 180w, /homes/images/1903/22.jpg 600w" 
														sizes="(max-width: 100px) 100vw, 100px" />
											</a>
											
											<div class="detail-item">
												<div class="product-details">
													<h4>
														<a class="title-item" href="simple_product.html">Cleaner with bag</a>
													</h4>
													
													<div class="product-price">
														<span class="price">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>350.00
															</span>
														</span>
														
														<div class="qty">
															<span class="qty-number">1</span>									
														</div>
													</div>
													
													<div class="product-action clearfix">
														<a href="#" class="btn-remove" title="Remove this item">
															<span class="fa fa-trash-o"></span>
														</a>           
														
														<a class="btn-edit" href="cart.html" title="View your shopping cart">
															<span class="fa fa-pencil"></span>
														</a>
													</div>
												</div>
											</div>
										</li>
									</ul>
									
									<div class="cart-checkout">
										<div class="price-total">
											<span class="label-price-total">Total</span>
											
											<span class="price-total-w">
												<span class="price">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">$</span>540.00
													</span>
												</span>
											</span>			
										</div>
										
										<div class="cart-links clearfix">
											<div class="cart-link">
												<a href="cart.html" title="Cart">View Cart</a>
											</div>
											
											<div class="checkout-link">
												<a href="checkout.html" title="Check Out">Check Out</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				  
						<div class="mid-header pull-right">
							<div class="widget sw_top">
								<span class="stick-sr">
									<i class="fa fa-search" aria-hidden="true"></i>
								</span>
								
								<div class="top-form top-search">
									<div class="topsearch-entry">
										<form role="search" method="get" class="form-search searchform" action="">
											<label class="hide"></label>
											<input type="text" value="" name="s" class="search-query" placeholder="Keyword here..." />
											<button type="submit" class="button-search-pro form-button">Search</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<!--<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>Home</h1>
					
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="#">Home</a>
										<span class="go-page"></span>
									</li>
									
									<li class="active">
										<span>Home</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		
		<div class="container">
			 @section('content')


            @show
		</div>
		
		<footer id="footer" class="footer default theme-clearfix">
			<!-- Content footer -->
			<div class="container">
				<div class="vc_row wpb_row vc_row-fluid">
					<div class="wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper">
								<div id="sw_testimonial01" class="testimonial-slider client-wrapper-b carousel slide " data-interval="0">
									<div class="carousel-cl nav-custom">
										<a class="prev-test fa fa-angle-left" href="#sw_testimonial01" role="button" data-slide="prev"><span></span></a>
										<a class="next-test fa fa-angle-right" href="#sw_testimonial01" role="button" data-slide="next"><span></span></a>
									</div>
									
									<div class="carousel-inner">
										<div class="item active">
											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="/homes/images/1903/tm3.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>
												
												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....						
													</div>
													
													<div class="name-client">
														<h2><a href="#" title="">Jerry</a></h2>
														<p>Web Developer</p>
													</div>
												</div>
											</div>
											
											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="/homes/images/1903/tm1.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>
											
												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....						
													</div>
													
													<div class="name-client">
														<h2>
															<a href="#" title="">David Gand</a>
														</h2>
														
														<p>Designer</p>
													</div>
												</div>
											</div>
										</div>
										
										<div class="item ">
											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="/homes/images/1903/tm2.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>
												
												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....						
													</div>
													
													<div class="name-client">
														<h2>
															<a href="#" title="">Taylor Hill</a>
														</h2>
														
														<p>Developer</p>
													</div>
												</div>
											</div>
											
											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="/homes/images/1903/tm3.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>
												
												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....						
													</div>
													
													<div class="name-client">
														<h2>
															<a href="#" title="">JOHN DOE</a>
														</h2>
														
														<p>Designer</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid footer-style1 vc_row-no-padding">
					<div class="container float wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper">
								<div class="vc_row wpb_row vc_inner vc_row-fluid footer-top">
									<div class="wpb_column vc_column_container vc_col-sm-8">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_text_column wpb_content_element ">
													<div class="wpb_wrapper">
														<div class="wrap-newletter">
															<h3>NEWSLETTER SIGNUP</h3>
															
															<form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-275" method="post" data-id="275" data-name="">
																<div class="mc4wp-form-fields">
																	<div class="newsletter-content">
																		<input type="email" class="newsletter-email" name="EMAIL" placeholder="Your email" required="" />
																		<input class="newsletter-submit" type="submit" value="Subscribe" />
																	</div>
																</div>
																<div class="mc4wp-response"></div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="wpb_column vc_column_container vc_col-sm-4">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="shop-social">
															<ul>
																<li>
																	<a href="#">
																		<i class="fa fa-facebook"></i>
																	</a>
																</li>
																
																<li>
																	<a href="#">
																		<i class="fa fa-twitter"></i>
																	</a>
																</li>
																
																<li>
																	<a href="#">
																		<i class="fa fa-google-plus"></i>
																	</a>
																</li>
																
																<li>
																	<a href="#">
																		<i class="fa fa-linkedin"></i>
																	</a>
																</li>
																
																<li>
																	<a href="#">
																		<i class="fa fa-pinterest-p"></i>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="vc_row wpb_row vc_inner vc_row-fluid footer-bottom">
									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_text_column wpb_content_element ">
													<div class="wpb_wrapper">
														<div class="ya-logo">
															<a href="#">
																<img src="/homes/images/icons/logo-footer.png" alt="logo" />
															</a>
														</div>
													</div>
												</div>
												
												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="infomation">
															<p>
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
															</p>
															
															<div class="info-support">
																<ul>
																   <li>No 1123, Marmora Road, Glasgow, D04 89GR.</li>
																   <li>(801) 2345 - 6788 / (801) 2345 - 6789</li>
																   <li><a href="mailto:contact@etrostore.com">support@etrostore.com</a></li>
																</ul>
															</div>
															
															<div class="store">
																<a href="#">
																	<img src="/homes/images/1903/app-store.png" alt="store" title="store" />
																</a>
																
																<a href="#">
																	<img src="/homes/images/1903/google-store.png" alt="store" title="store" />
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								 
									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-2 vc_col-md-2 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_wp_custommenu wpb_content_element">
													<div class="widget widget_nav_menu">
														<h2 class="widgettitle">Support</h2>
														
														<ul id="menu-support" class="menu">
															<li class="menu-product-support">
																<a class="item-link" href="#">
																	<span class="menu-title">Product Support</span>
																</a>
															</li>
															
															<li class="menu-pc-setup-support-services">
																<a class="item-link" href="#">
																	<span class="menu-title">PC Setup & Support Services</span>
																</a>
															</li>
															
															<li class="menu-extended-service-plans">
																<a class="item-link" href="#">
																	<span class="menu-title">Extended Service Plans</span>
																</a>
															</li>
															
															<li class="menu-community">
																<a class="item-link" href="#">
																	<span class="menu-title">Community</span>
																</a>
															</li>
															
															<li class="menu-product-manuals">
																<a class="item-link" href="#">
																	<span class="menu-title">Product Manuals</span>
																</a>
															</li>
															
															<li class="menu-product-registration">
																<a class="item-link" href="#">
																	<span class="menu-title">Product Registration</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								  
									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-2 vc_col-md-2 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_wp_custommenu wpb_content_element">
													<div class="widget widget_nav_menu">
														<h2 class="widgettitle">Your Links</h2>
														
														<ul id="menu-your-links" class="menu">
															<li class="menu-my-account">
																<a class="item-link" href="my_account.html">
																	<span class="menu-title">My Account</span>
																</a>
															</li>
															
															<li class="menu-order-tracking">
																<a class="item-link" href="#">
																	<span class="menu-title">Order Tracking</span>
																</a>
															</li>
															
															<li class="menu-watch-list">
																<a class="item-link" href="#">
																	<span class="menu-title">Watch List</span>
																</a>
															</li>
															
															<li class="menu-customer-service">
																<a class="item-link" href="#">
																	<span class="menu-title">Customer Service</span>
																</a>
															</li>
															
															<li class="menu-returns-exchanges">
																<a class="item-link" href="#">
																	<span class="menu-title">Returns / Exchanges</span>
																</a>
															</li>
															
															<li class="menu-faqs">
																<a class="item-link" href="#">
																	<span class="menu-title">FAQs</span>
																</a>
															</li>
															
															<li class="menu-financing">
																<a class="item-link" href="#">
																	<span class="menu-title">Financing</span>
																</a>
															</li>
															
															<li class="menu-card">
																<a class="item-link" href="#">
																	<span class="menu-title">Card</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								   
									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="sp-map">
															<div class="title">
																<h2>find a store</h2>
															</div>
															
															<img src="/homes/images/1903/map.jpg" alt="map" title="map" />
															
															<a href="#" class="link-map">Store locator</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						
								<div class="vc_wp_custommenu wpb_content_element wrap-cus">
									<div class="widget widget_nav_menu">
										<ul id="menu-infomation" class="menu">
											<li class="menu-about-us">
												<a class="item-link" href="about_us.html">
													<span class="menu-title">About Us</span>
												</a>
											</li>
											
											<li class="menu-customer-service">
												<a class="item-link" href="#">
													<span class="menu-title">Customer Service</span>
												</a>
											</li>
											
											<li class="menu-privacy-policy">
												<a class="item-link" href="#">
													<span class="menu-title">Privacy Policy</span>
												</a>
											</li>
											
											<li class="menu-site-map">
												<a class="item-link" href="#">
													<span class="menu-title">Site Map</span>
												</a>
											</li>
											
											<li class="menu-orders-and-returns">
												<a class="item-link" href="#">
													<span class="menu-title">Orders and Returns</span>
												</a>
											</li>
											
											<li class="menu-contact-us">
												<a class="item-link" href="contact_us.html">
													<span class="menu-title">Contact Us</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="vc_row-full-width vc_clearfix"></div>
			</div>
			
			<div class="footer-copyright style1">
				<div class="container">
					<!-- Copyright text -->
					<div class="copyright-text pull-left">
						<p>Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
					</div>
					
					<div class="sidebar-copyright pull-right">
						<div class="widget-1 widget-first widget text-4 widget_text">
							<div class="widget-inner">
								<div class="textwidget">
									<div class="payment">
										<a href="#">
											<img src="/homes/images/1903/paypal.png" alt="payment" title="payment" />
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
   
	<!-- DIALOGS -->
	<div class="modal fade" id="search_form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog block-popup-search-form">
			<form role="search" method="get" class="form-search searchform" action="">
				<input type="text" value="" name="s" class="search-query" placeholder="Enter your keyword..." />
				
				<button type="submit" class="fa fa-search button-search-pro form-button"></button>
				
				<a href="javascript:void(0)" title="Close" class="close close-search" data-dismiss="modal">X</a>
			</form>
		</div>
	</div>
	
   <div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog block-popup-login">
			<a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal">Close</a>
         
			<div class="tt_popup_login">
				<strong>Sign in Or Register</strong>
			</div>
         
			<form action="" method="post" class="login">
				<div class="block-content">
					<div class="col-reg registered-account">
						<div class="email-input">
							<input type="text" class="form-control input-text username" name="username" id="username" placeholder="Username" />
						</div>
						
						<div class="pass-input">
							<input class="form-control input-text password" type="password" placeholder="Password" name="password" id="password" />
						</div>
						
						<div class="ft-link-p">
							<a href="#" title="Forgot your password">Forgot your password?</a>
						</div>
						
						<div class="actions">
							<div class="submit-login">
								<input type="submit" class="button btn-submit-login" name="login" value="Login" />
							</div>
						</div>
					</div>
					
					<div class="col-reg login-customer">
						<h2>NEW HERE?</h2>
						
						<p class="note-reg">Registration is free and easy!</p>
						
						<ul class="list-log">
							<li>Faster checkout</li>
							
							<li>Save multiple shipping addresses</li>
							
							<li>View and track orders and more</li>
						</ul>
						
						<a href="create_account.html" title="Register" class="btn-reg-popup">Create an account</a>
					</div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
	</div>
	
	<a id="etrostore-totop" href="#"></a>	
	
	<div id="subscribe_popup" class="subscribe-popup" style="background: url(/homes/images/icons/bg_newsletter.jpg)">
		<div class="subscribe-popup-container">
			<h2>Join our newsletter</h2>
			<div class="description">Subscribe now to get 40% of on any product!</div>
			<div class="subscribe-form">
				<form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-275" method="post" data-id="275" data-name="">
					<div class="mc4wp-form-fields">
						<div class="newsletter-content">
							<input type="email" class="newsletter-email" name="EMAIL" placeholder="Your email" required="" />
							<input class="newsletter-submit" type="submit" value="Subscribe" />
						</div>
					</div>
					<div class="mc4wp-response"></div>
				</form>		
			</div>
			
			<div class="subscribe-checkbox">
				<label for="popup_check">
					<input id="popup_check" name="popup_check" type="checkbox" />
					<span>Don't show this popup again!</span>
				</label>
			</div>
			
			<div class="subscribe-social">
				<div class="subscribe-social-inner">
					<a href="#" class="social-fb">
						<span class="fa fa-facebook"></span>
					</a>
					
					<a href="#" class="social-tw">
						<span class="fa fa-twitter"></span>
					</a>
					
					<a href="#" class="social-gplus">
						<span class="fa fa-google-plus"></span>
					</a>
					
					<a href="#" class="social-pin">
						<span class="fa fa-instagram"></span>
					</a>
					
					<a href="#" class="social-linkedin">
						<span class="fa fa-pinterest-p"></span>
					</a>				
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/homes/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="/homes/js/jquery/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/homes/js/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="/homes/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/homes/js/jquery/js.cookie.min.js"></script>
	
	<!-- OPEN LIBS JS -->
	<script type="text/javascript" src="/homes/js/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/homes/js/slick-1.6.0/slick.min.js"></script>
	
	<script type="text/javascript" src="/homes/js/yith-woocommerce-compare/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="/homes/js/sw_core/isotope.js"></script>
	<script type="text/javascript" src="/homes/js/sw_core/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="/homes/js/sw_woocommerce/category-ajax.js"></script>
	<script type="text/javascript" src="/homes/js/sw_woocommerce/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="/homes/js/js_composer/js_composer_front.min.js"></script>
	
	<script type="text/javascript" src="/homes/js/plugins.js"></script>
	<script type="text/javascript" src="/homes/js/megamenu.min.js"></script>
	<script type="text/javascript" src="/homes/js/main.min.js"></script>
   
	<script type="text/javascript">
		var sticky_navigation_offset_top = $("#header .header-bottom").offset().top;
		var sticky_navigation = function(){
									var scroll_top = $(window).scrollTop();
									if (scroll_top > sticky_navigation_offset_top) {
										$("#header .header-bottom").addClass("sticky-menu");
										$("#header .header-bottom").css({ "top":0, "left":0, "right" : 0 });
									} else {
										$("#header .header-bottom").removeClass("sticky-menu");
									}
								};
		sticky_navigation();
		$(window).scroll(function() {
			sticky_navigation();
		});
		
		$(document).ready (function () {
			$( ".show-dropdown" ).each(function(){
				$(this).on("click", function(){
					$(this).toggleClass("show");
					var $element = $(this).parent().find( "> ul" );
					$element.toggle( 300 );
				});
			});
		});
   </script>
   
   <!--[if gte IE 9]><!-->
   <script type="text/javascript">
		var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');
		request = true;
      
      	b[c] = b[c].replace( rcs, ' ' );
      	// The customizer requires postMessage and CORS (if the site is cross domain)
      	b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
   </script>
   	@section('js')
	@show
   <!--<![endif]-->
   </body>
</html>


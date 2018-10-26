@extends('layout.homes')

@section('title',$title)

@section('content')

<div class="row">
	<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="post-6 page type-page status-publish hentry">
			<div class="entry-content">
				<div class="entry-summary">
					<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid bg-wrap vc_custom_1487642348040 vc_row-no-padding">
						<div class="container float wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1481518924466">
										<div class="wrap-vertical wpb_column vc_column_container vc_col-sm-2">
											<div class="vc_column-inner vc_custom_1481518234612">
												<div class="wpb_wrapper">
													<div class="vc_wp_custommenu wpb_content_element wrap-title">
														<div class="mega-left-title">
															<strong>分类</strong>
														</div>
														
														<div class="wrapper_vertical_menu vertical_megamenu">
															<div class="resmenu-container">
																<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenuvertical_menu">
																	<span class="sr-only">全部</span>
																	<span class="icon-bar"></span>
																	<span class="icon-bar"></span>
																	<span class="icon-bar"></span>
																</button>
															</div>

															<ul id="menu-vertical-menu-1" class="nav vertical-megamenu etrostore-mega etrostore-menures" >
																@foreach ($res as $f)
																<li class="fix-menu dropdown menu-smartphones-tablet etrostore-mega-menu level1">
																	<a class="item-link dropdown-toggle" href="/home/shops?gname=@php echo "{$f->tname}" @endphp">
																		<span class="have-title">
																			<span class="menu-color" data-color="#efc73a"></span>
																			
																			<span class="menu-title">{{$f->tname}}</span>
																		</span>
																	</a>
																	@php
																	$ref = DB::table('gtype')->where('pid',$f->tid)->get();
																	@endphp
																	<ul class="dropdown-menu nav-level1 column-3" style="height: 460px">
																		@foreach ($ref as $fe)
																		<li class="dropdown-submenu column-3 menu-electronics">
																			<a href="/homes/goods/{{$fe->tid}}">
																				<span class="have-title">
																					<span class="menu-title">{{$fe->tname}}</span>
																				</span>
																			</a>
																			@php
																			$sf = DB::table('gtype')->where('pid',$fe->tid)->get();
																			@endphp
																			<ul class="dropdown-sub nav-level2">
																				@foreach ($sf as $s)
																				<li class="menu-laptop-desktop-accessories">
																					<a href="/homes/goods/{{$s->tid}}">
																						<span class="have-title">
																							<span class="menu-title">{{$s->tname}}</span>
																						</span>
																					</a>
																				</li>
																				@endforeach
																			</ul>
																		</li>
																		@endforeach
																		<li class="fix-position dropdown-submenu column-3 menu-image">
																			<ul class="dropdown-sub nav-level2">
																				<li class="menu-image-1 etrostore-menu-img">
																					<a >
																						<span class="">
																							<span class="menu-img">
																								<img src="/homes/images/1903/menu-bn7.jpg" alt="Menu Image" /></span>
																						</span>
																					</a>
																				</li>
																				
																				<li class="menu-image-2 etrostore-menu-img">
																					<a >
																						<span class="">
																							<span class="menu-img">
																								<img src="/homes/images/1903/menu-bn8.jpg" alt="Menu Image" /></span>
																						</span>
																					</a>
																				</li>
																				
																				<li class="menu-image-3 etrostore-menu-img">
																					<a>
																						<span class="">
																							<span class="menu-img">
																								<img src="/homes/images/1903/menu-bn9.jpg" alt="Menu Image" /></span>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</li>
																	</ul>
																</li>
																@endforeach
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="wrap-slider wpb_column vc_column_container vc_col-sm-8">
											<div class="vc_column-inner vc_custom_1483000674370">
												<div class="wpb_wrapper">
													<!-- OWL SLIDER -->
													<div class="wpb_revslider_element wpb_content_element no-margin">
														<div class="vc_column-inner ">
															<div class="wpb_wrapper">
																<div class="wpb_revslider_element wpb_content_element">
																	<div id="main-slider" class="fullwidthbanner-container" style="position:relative; width:100%; height:auto; margin-top:0px; margin-bottom:0px">
																		<div class="module slideshow no-margin">
																		@php
																			$res = DB::table('lunbo')->where('auth','1')->get();
																		@endphp
																		@foreach($res as $k=>$v)
																			<div class="item" style="width:780px;height:352px">
																				<a href="{{$v->src}}"><img src="{{$v->profile}}" alt="slider1" class="img-responsive"></a>
																			</div>
																		@endforeach
																		</div>
																		<div class="loadeding"></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!-- OWL LIGHT SLIDER -->
													
													<div class="wpb_raw_code wpb_content_element wpb_raw_html">
														<div class="wpb_wrapper">
															<div class="banner">
																<a href="#" class="banner1">
																	<img src="/homes/images/1903/banner3.jpg" alt="banner" title="banner" />
																</a>
																
																<a href="#" class="banner2">
																	<img src="/homes/images/1903/banner4.jpg" alt="banner" title="banner" />
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="wrap-banner wpb_column vc_column_container vc_col-sm-2">
											<div class="vc_column-inner vc_custom_1483000922579">
												<div class="wpb_wrapper">
													<div class="wpb_single_image wpb_content_element vc_align_center vc_custom_1481518385054">
														<figure class="wpb_wrapper vc_figure">
															
																<img class="vc_single_image-img" src="/homes/images/1903/banner1.jpg" width="193" height="352" alt="banner1" title="banner1" />
															
														</figure>
													</div>
													
													<div class="wpb_single_image wpb_content_element vc_align_center">
														<figure class="wpb_wrapper vc_figure">
															<a href="#" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
																<img class="vc_single_image-img" src="/homes/images/1903/banner2.jpg" width="193" height="175" alt="banner2" title="banner2" />
															</a>
														</figure>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<!-- <div class="wpb_raw_code wpb_content_element wpb_raw_html">
										<div class="wpb_wrapper">
											<div class="wrap-transport">
												<div class="row">
													<div class="item item-1 col-lg-3 col-md-3 col-sm-6">
														<a href="#" class="wrap">
															<div class="icon">
																<i class="fa fa-paper-plane"></i>
															</div>
															
															<div class="content">
																<h3>Money Back Guarantee</h3>
																<p>30 Days Money Back</p>
															</div>
														</a>
													</div>
													
													<div class="item item-2 col-lg-3 col-md-3 col-sm-6">
														<a href="#" class="wrap">
															<div class="icon">
																<i class="fa fa-map-marker"></i>
															</div>
															
															<div class="content">
																<h3>Free Worldwide Shipping</h3>
																<p>On Order Over $100</p>
															</div>
														</a>
													</div>
													
													<div class="item item-3 col-lg-3 col-md-3 col-sm-6">
														<a href="#" class="wrap">
															<div class="icon">
																<i class="fa fa-tag"></i>
															</div>
															
															<div class="content">
																<h3>Member Discount</h3>
																<p>Upto 70 % Discount</p>
															</div>
														</a>
													</div>
													
													<div class="item item-4 col-lg-3 col-md-3 col-sm-6">
														<a href="#" class="wrap">
															<div class="icon">
																<i class="fa fa-life-ring"></i>
															</div>
															
															<div class="content">
																<h3>24/7 Online Support</h3>
																<p>Technical Support 24/7</p>
															</div>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
					
					<div class="vc_row-full-width vc_clearfix"></div>
					
					<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div id="_sw_countdown_01" class="sw-woo-container-slider responsive-slider countdown-slider" data-lg="5" data-md="4" data-sm="2" data-xs="1" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false" data-circle="false">
										<div class="resp-slider-container">
											<div class="box-title clearfix">
												<h3>热销商品</h3>
												<a href="/home/rexiao">查看全部</a>
											</div>
											
											
											<div class="banner-content clearfix">
												<img 	width="195" height="354" src="/homes/images/1903/image-cd.jpg" class="attachment-larges size-larges" alt="" 
														srcset="homes/images/1903/image-cd.jpeg 195w, images/1903/image-cd-165x300.jpg 165w" 
														sizes="(max-width: 195px) 100vw, 195px" />
											</div>
											@php
											$rx = DB::table('goods')->where('status','2')->get();
											
											@endphp
											
							  				
											<div class="slider responsive">
												@foreach ($rx as $v)
												@php
												$gpic = DB::table('goodspicture')->where('gid',$v->gid)->pluck('pic_name');

												$fff = DB::table('gtype')->where('tid',$v->tid)->pluck('tname');
												@endphp
												
												<div class="item-countdown product " id="product_sw_countdown_02" >
													<div class="item-wrap">
														@foreach ($fff as $f)
														<div class="item-detail" title="{{$f}}">
															<a href="home/goods/{{$v->gid}}" >
															<div class="item-content">
																<!-- rating  -->
																<div class="reviews-content">
																	<div class="" height='20px'>

																		<span style="width:35px"></span>
																	</div>
																	
																	
																</div>
																<!-- end rating  -->
																@php
																$ff = DB::table('gtype')->where('tid',$v->tid)->get();
																
																@endphp
																@foreach ($ff as $f)
																<h4>
																	{{$v->gname}}
																</h4>
																@endforeach
																<!-- Price -->
																<div class="item-price">
																	<span>
																		<ins>
																			<span class="woocommerce-Price-amount amount">
																				<span class="woocommerce-Price-currencySymbol">¥</span>
																			</span>{{$v->price}}
																		</ins>
																	</span>
																</div>
																
																<div class="" style="height:59px"></div>
																
																<div class="product-countdown" data-date="1519776000" data-price="$250" data-starttime="1483747200" data-cdtime="1519776000" data-id="product_sw_countdown_02"></div>
															</div>
															</a>
															<div class="item-image-countdown">
																<span class="onsale"></span>
																
																<a href="/home/goods/{{$v->gid}}">
																	<div  class="product-thumb-hover">
																		<img 	width="300" height="300" src="{{$gpic[0]}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" 
																				
																				sizes="(max-width: 300px) 100vw, 300px" />
																	</div>
																</a>
																
																<!-- 加入购物车, wishlist, compare -->
																<div class="item-bottom clearfix" style="padding-left: 35px; ">
																	<a rel="nofollow" href="/home/goods/{{$v->gid}}" class="button product_type_simple " title="加入购物车">加入购物车</a>

																	<div class="yith-wcwl-add-to-wishlist ">
																		<div class="show">
																			<a style="display:block" href="/home/love" title="心愿单" >心愿单</a>
																		</div>
																	</div>
																</div>
															</div>
															
														</div>
														@endforeach
													</div>
												</div>
											
											@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
						@foreach($re as $v)
						<div class="wpb_column vc_column_container vc_col-sm-6">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_single_image wpb_content_element vc_align_center">
										<figure class="wpb_wrapper vc_figure">
											<a  href="{{$v->src}}" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
												<img class="vc_single_image-img" src="{{$v->a_profile}}" width="570" height="220" alt="{{$v->aname}}" title="{{$v->aname}}" />
											</a>
										</figure>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					
					<!-- <div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
						
						<div class="wpb_column vc_column_container vc_col-sm-6">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_single_image wpb_content_element vc_align_center">
										<figure class="wpb_wrapper vc_figure">

												<img  width="570" height="220" style="display: block; width: 570px height:220px" class="vc_single_image-img" src="{{$v->a_profile}}" alt="banner6" title="banner6" />

										</figure>
									</div>
								</div>
							</div>
						</div>
					</div>
 -->
				</div>
			</div>
			
			<div  class="clearfix"></div>
		</div>
	</div>
</div>
@stop
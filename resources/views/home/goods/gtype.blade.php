@extends('layout.homes')

@section('title',$title)

@section('content')


<div class="row">
				<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="post-6 page type-page status-publish hentry">
						<div class="entry-content">
							<div class="entry-summary">
								<div class="vc_row wpb_row vc_row-fluid bg-wrap vc_custom_1487642348040 vc_row-no-padding">
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
																		
										  								@foreach ($res as $v)
																		<ul id="menu-vertical-menu-1" class="nav vertical-megamenu etrostore-mega etrostore-menures">
																			
																			
																			<li class="fix-menu dropdown menu-smartphones-tablet etrostore-mega-menu level1">
																				<a href="simple_product.html" class="item-link dropdown-toggle">
																					<span class="have-title">
																						<span class="menu-color" data-color="#efc73a"></span>
																						
																						<span class="menu-title">{{$v->tname}}</span>
																					</span>
																				</a>
																				@php
																				$arr = DB::table('gtype')->where('pid',$v->tid)->get();

																				@endphp
																				
																				

																				<ul class="dropdown-menu nav-level1 column-3">
																					@foreach ($arr as $c)
																					<li class="dropdown-submenu column-3 menu-electronics">
																						<a href="#">
																							<span class="have-title">
																								<span class="menu-title">{{$c->tname}}</span>
																							</span>
																						</a>
																						@php
																						$re = DB::table('gtype')->where('pid',$c->tid)->get();
																						
																						@endphp
																						
																						<ul class="dropdown-sub nav-level2">
																							@foreach ($re as $ce)
																							<li class="menu-laptop-desktop-accessories">
																								<a href="#">
																									<span class="have-title">
																										<span class="menu-title">{{$ce->tname}}</span>
																									</span>
																								</a>
																							</li>
																							@endforeach
																						</ul>
																						
																					</li>
																					
																					@endforeach
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
																						<div class="item">
																							<a href="simple_product.html"><img src="/homes/images/1903/slider2.jpg" alt="slider1" class="img-responsive" height="559"></a>
																						</div>
																						<div class="item">
																							<a href="simple_product.html"><img src="/homes/images/1903/01_index_v1.jpg" alt="slider2" class="img-responsive" height="559"></a>
																						</div>
																						<div class="item">
																							<a href="simple_product.html"><img src="/homes/images/1903/slider3.jpg" alt="slider3" class="img-responsive" height="559"></a>
																						</div>
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
																		<a href="#" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
																			<img class="vc_single_image-img" src="/homes/images/1903/banner1.jpg" width="193" height="352" alt="banner1" title="banner1" />
																		</a>
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
												
												
											</div>
										</div>
									</div>
								</div>
								
								
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
@stop

@section('js')
<script>
	
</script>

@stop
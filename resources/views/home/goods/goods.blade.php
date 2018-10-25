
@extends('layout.homes')

@section('title',$title)

@section('content')
<div style="height: 36px"></div>
@if (!empty(session('success')))
						    <div class="mws-form-message error">
						    	
						        <ul>
						        	
						                <li>{{session('success')}}</li>
						            
						        </ul>
						    </div>
						@endif
<div class="row">
	<div id="contents-detail" class="content col-lg-12 col-md-12 col-sm-12" role="main">
		<div id="container">
			<form action="/home/cart/{{$res->gid}}" method="post">
				<div id="content" role="main">
					<div class="single-product clearfix">
						<div id="product-01" class="product type-product status-publish has-post-thumbnail product_cat-accessories product_brand-global-voices first outofstock featured shipping-taxable purchasable product-type-simple">
							<div style="width: 400px height:400px" class="product_detail row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
									<div class="slider_img_productd">
										<!-- woocommerce_show_product_images -->
										<div id="product_img_01" class="product-images loading" data-rtl="false">
											<div class="product-images-container clearfix thumbnail-bottom">
												<!-- Image Slider -->
												<div class="slider product-responsive">
													<div class="item-img-slider">
														
														<div class="images">					
															
																
																<img id="imgs1" width="300" src="{{$gimg[0]}}"  class="attachment-shop_single size-shop_single" alt="" sizes="(max-width: 500px) 100vw, 500px">
															
														</div>
														
													</div>
												</div>
												
												<!-- Thumbnail Slider -->
												
												<div  class="slider product-responsive-thumbnail" id="product_thumbnail_247">@foreach ($gimg as $v)
													<div class="item-thumbnail-product">
														<div class="thumbnail-wrapper">
															<img width="300" src="{{$v}}" class="attachment-shop_thumbnail size-shop_thumbnail imgs2" alt="" sizes="(max-width: 180px) 100vw, 180px">
														</div>
													</div>@endforeach
												</div>
												
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
									<div  class="content_product_detail">
										<h1><h3><b>{{$res->gname}}</b></h3></h1>
										
										
										
										<div>
											<span style="font-size: 20px" class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">价格: </span>&nbsp&nbsp {{$res->price}} 元</span> 
										</div><br>
										
										<div >
											<span style="font-size: 20px">颜色: </span>
											@php
											$colors = explode(",",$res->color);
											@endphp
											<ul style="list-style: none; display: inline;">
											@foreach ($colors as $k => $v)
											<li style="display: inline;" ><input name="color[]" @if($k==0) checked @endif type="radio" value="{{$v}}" > {{$v}}  &nbsp &nbsp &nbsp </li>
											
											@endforeach
											</ul>

										</div><br>

										<div >
											<span style="font-size: 20px">规格: </span>
											@php
											$sizes = explode(",",$res->size);
											@endphp
											<ul style="list-style: none; display: inline;">
											@foreach ($sizes as $k => $v)
											<li style="display: inline;" ><input name="size[]" type="radio" @if($k==0) checked @endif value="{{$v}}" > {{$v}}  &nbsp &nbsp &nbsp </li>
											
											@endforeach
											</ul>
										</div><br>

										<div >
											<span style="font-size: 20px">库存: </span>&nbsp &nbsp &nbsp<span style="font-size: 14px">{{$res->gnum}} 件</span>
										</div><br>

										<div >
											<span style="font-size: 20px">购买数量: </span>&nbsp &nbsp &nbsp
											<span style="font-size: 14px; "> 
												<button id="jian" style="background: gray;width: 30px;height: 30px; text-align:center;" type="button">-</button>
												<input name="gmsl" id="gow" style="width:50px;" value="1" type="number" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" max = "{{$res->gnum}}"> 
												<button id="jia"  style="background: gray;width: 30px;height: 30px; text-align:center;" type="button" >+</button>
											件</span>
										</div>

										<div >
											<span style="font-size: 20px">
												状态: 
											</span>&nbsp &nbsp &nbsp
											<span style="font-size: 14px">@if($res->status=='0') 上架 
														  @elseif($res->status=='1') 下架
														  @elseif($res->status=='2') 热销 
														  @endif </span>
										</div><br>

										<div >
											<span style="font-size: 18px">上架时间: </span>&nbsp &nbsp &nbsp<span style="font-size: 14px">{{date('Y年m月d日', $res->addtime)}}</span>
										</div><br>
										
										
										<div class="description" itemprop="description">
											<span><h3></h3></span>
										</div>


										<div>
											<button type="submit" class="btn btn-danger btn-small">加入购物车</button>
											{{csrf_field()}}
										</div>
											
											
											<!-- <div   title="加入购物车" style=" border-radius: 50px; margin-left:9px;  width:52px; height:52px; background-image: url('/homes/images/colorbox/1.png');background-position: -231px -210px; "></div>
												<font style="vertical-align: inherit;">
													<font style="vertical-align: inherit;">
													<div style="color:;margin-left:6px;"></div>
													</font>
												</font> -->
											
										

										

										<div class="social-share">
											<div class="title-share"></div>
											<div class="wrap-content">
												
												<!-- <a href="#" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
												<a href="http://twitter.com/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
												<a href="#" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
												<a href="#"><i class="fa fa-dribbble"></i></a>
												<a href="#"><i class="fa fa-instagram"></i></a> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tabs clearfix">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="description_tab active">
										<a href="#tab-description" data-toggle="tab"><h3>描述</h3></a>
									</li>
									
									<li class="reviews_tab ">
										<!-- 评论 <a href="#tab-reviews" data-toggle="tab"></a> -->
									</li>
								</ul>
								
								<div class="clear"></div>
								
								<div class=" tab-content">
									<div class="tab-pane active" id="tab-description">
										<p>{!!$res->descr!!}</p>
									</div>
									
									<!-- <div class="tab-pane " id="tab-reviews">
										<div id="reviews">
											<div id="comments">
												<h2>Reviews</h2>
												<p class="woocommerce-noreviews">There are no reviews yet.</p>
											</div>
											
											<div id="review_form_wrapper">
												<div id="review_form">
													<div id="respond" class="comment-respond">
														<h3 id="reply-title" class="comment-reply-title">
															Be the first to review "turkey qui" 
															<small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a></small>
														</h3>
														
														<form action="" method="post" id="commentform" class="comment-form">
															<p class="comment-form-rating">
																<label for="rating">Your Rating</label>
																<select name="rating" id="rating">
																	<option value="">Rate ...</option>
																	<option value="5">Perfect</option>
																	<option value="4">Good</option>
																	<option value="3">Average</option>
																	<option value="2">Not that bad</option>
																	<option value="1">Very Poor</option>
																</select>
															</p>
															
															<p class="comment-form-comment">
																<label for="comment">Your Review</label>
																<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
															</p>
															
															<p class="form-submit">
																<input name="submit" type="submit" id="submit" class="submit" value="Submit">
															</p>
														</form>
													</div>
												</div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
						
						<div class="bottom-single-product theme-clearfix">
							<div class="widget-1 widget-first widget sw_related_upsell_widget-2 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
								<div class="widget-inner">
									<div id="slider_sw_related_upsell_widget-2" class="sw-woo-container-slider related-products responsive-slider clearfix loading" data-lg="4" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
										<div class="resp-slider-container">
											<div class="box-slider-title">
												<h2><span>相关产品</span></h2>
											</div>
											<div class="slider responsive">
												@foreach ($re as $v)
												@php
												$img1 = DB::table('goodspicture')->where('gid',$v->gid)->pluck('pic_name');
												
												@endphp
												<div   class="item ">
													<div class="item-wrap">
														<div class="item-detail">
															
															<div class="item-img products-thumb">
																<a href="/home/goods/{{$v->gid}}">
																	<div class="product-thumb-hover">
																		<img width="200" height="200" src="{{$img1[0]}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" sizes="(max-width: 300px) 100vw, 300px">
																	</div>
																</a>																
																		
																<!-- 加入购物车, wishlist, compare -->
																<div class="item-bottom clearfix" style="padding-left: 35px; ">
																		<a rel="nofollow" href="/home/goods/{{$v->gid}}" class="button product_type_simple " title="加入购物车">加入购物车</a>

																		<div class="yith-wcwl-add-to-wishlist ">
																			<div class="show"  >
																				<a style="display:block" href="#" title="心愿单" >心愿单</a>
																			</div>
																		</div>
																	</div>
															</div>
															
															<div class="item-content">
																<!-- rating  -->
																<div class="reviews-content">
																	
																</div>
																<!-- end rating  -->
																
																<h4><a href="/home/goods/{{$v->gid}}" title="turkey qui">{{$v->gname}}</a></h4>
																
																<!-- price -->
																<div class="item-price">
																	<span>
																		<span class="woocommerce-Price-amount amount">
																			<span class="woocommerce-Price-currencySymbol"></span>{{$v->price}} 元
																		</span>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
						   
							<div class="widget-2 widget-last widget sw_related_upsell_widget-3 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
								<div class="widget-inner"></div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


@stop

@section('js')
<script>
	$('.imgs2').each(function(){
		var src = $(this).attr('src');
		var sr = $('#imgs1').attr('src');
		$(this).mouseover(function(){
			$('#imgs1').attr('src',src);
			
		});
		$(this).mouseout(function(){
			$('#imgs1').attr('src',sr);
		});
	});
	
	
	$('#jian').click(function(){
		var j = $('#gow').val();
		var j = parseInt(j) - 1;
		if( j <= 1 ){ j = 1;}
		$('#gow').attr('value',j);
	});
	$('#jia').click(function(){
		var j = $('#gow').val();
		var j = parseInt(j) + 1;
		if( j > 200 ){ j = 200; alert('亲 最多只能添加200件哦！！！')}
		$('#gow').attr('value',j);
	});

	$('.mws-form-message').fadeOut(5000);
	
</script>

@stop
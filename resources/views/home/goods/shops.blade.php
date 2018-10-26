@extends('layout.homes')
@section('title',$title)
@section('content')
<!-- <div class="row">
	<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="post-6 page type-page status-publish hentry">
			<div class="entry-content">
				<div class="entry-summary">
					<div class="vc_row wpb_row vc_row-fluid">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_raw_code wpb_content_element wpb_raw_html wrap-map2">
										<div class="wpb_wrapper">
											<div class="show-map">
												<div class="responsive-container">
													<div class="row">
														
														@foreach ($res as $k=>$v)
														@php
															$gpic = DB::table('goodspicture')->where('gid',$v->gid)->pluck('pic_name');
														@endphp
														<div class="item col-lg3 col-md-3 col-sm-6">
															<a href="/home/goods/{{$v->gid}}">
																<div class="image">
																	<img width="200" src="{{$gpic[0]}}" alt="map1" title="{{$v->gname}}">
																	
																</div>
																
																<div class="des"><h5><b>{{$v->gname}}</b></h5><b>{{$v->price}} 元</b></div>

															</a>
														</div>
														@endforeach
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
		</div>
	</div>
</div> -->
<head>
	
	<!-- Font ================================================== -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700"> 
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,500,600,700">
	<!-- Helpers ================================================== -->
	<meta property="og:type" content="website">
	<meta property="og:title" content="Home Market - Responsive HTML5 theme">
	<meta property="og:url" content="#">
	<meta property="og:site_name" content="Home Market Red">
	<meta name="twitter:site" content="@">
	<meta name="twitter:card" content="summary">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- CSS ================================================== -->
	<link href="/homes/assets/css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="/homes/assets/css/font-awesome.min.css">
	<link href="/homes/assets/css/animate.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/swatch.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/flexslider.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/timber.scss.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/home_market.global.scss.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/home_market.style.scss.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/tada.css" rel="stylesheet" type="text/css" media="all">
	<link href="/homes/assets/css/spr.css" rel="stylesheet" type="text/css" media="all">
	<!-- JS ================================================== -->
	<script src="/homes/assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="/homes/assets/js/jquery.fancybox.min.js" type="text/javascript"></script>
	<script src="/homes/assets/js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="/homes/assets/js/jquery.tweet.min.js" type="text/javascript"></script>
	<script src="/homes/assets/js/jquery.optionSelect.js" type="text/javascript"></script>
	<script src="/homes/assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
</head>
<main class="main-content">
			<!-- <div class="breadcrumb-wrapper">
				<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
					<a href="index.html" title="回到首页"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">主页</font></font></a>
					<span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&gt; </font></font></span>
					<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收藏页面</font></font></span>
				</nav>
				<h1 class="section-header__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收藏页面</font></font></h1>
			</div> -->
			<div class="wrapper">
				<div id="filter-loading" style="display:none">
					<img src="/homes/assets/images/gears.svg" alt="filter loading">
				</div>
				<div class="grid--rev" id="collection">
					<div class="grid__item large--three-quarters">
						<header class="section-header section-grid">
							<div class="section-header__right section-sorting">
								<div class="form-horizontal">
									<label for="SortBy"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">排序方式</font></font></label>
									<select name="SortBy" id="SortBy">
										<!-- <option value="manual"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">精选</font></font></option>
										<option value="best-selling"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">最畅销</font></font></option>
										<option value="title-ascending"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">按字母顺序排列，AZ</font></font></option>
										<option value="title-descending"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">按字母顺序排列，ZA</font></font></option> -->
										<option value="price-asc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">价格从低到高</font></font></option>
										<option value="price-desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">价格从高到低</font></font></option>
										<option value="addtime-desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">日期从新到旧</font></font></option>
										<option value="addtime-asc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">日期从旧到新</font></font></option>
									</select>
								</div>
								<!-- <div class="collection-view">
									<button type="button" title="网格视图" class="grid-button change-view change-view--active" data-view="grid">
									<span class="icon-fallback-text">
									<span class="icon icon-grid-view" aria-hidden="true"></span>
									<span class="fallback-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网格视图</font></font></span>
									</span>
									</button>
									<button type="button" title="列表显示" class="list-button change-view " data-view="list">
									<span class="icon-fallback-text">
									<span class="icon icon-list-view" aria-hidden="true"></span>
									<span class="fallback-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">列表显示</font></font></span>
									</span>
									</button>
								</div> -->
							</div>
						</header>
						<div class="grid-uniform grid-uniform-category " id="goods_biao">

							@foreach ($res as $k=>$v)
							@php
								$gpic = DB::table('goodspicture')->where('gid',$v->gid)->pluck('pic_name');
							@endphp
							<div class="grid__item large--one-quarter medium--one-half">
								<div class="grid__item_wrapper">
									<div class="grid__image product-image">
										<a href="/home/goods/{{$v->gid}}">
											<img src="{{$gpic[0]}}" alt="{{$v->gname}}">
										</a>
										<div class="quickview">
											<div class="product-ajax-cart hidden-xs hidden-sm">
												<div data-handle="consequuntur-magni-dolores" class="quick_shop-div">
													<a href="/home/goods/{{$v->gid}}" class="btn quick_shop">
														<i class="fa fa-eye" title="快速浏览"></i>																
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="rating-star">
										<span class="spr-badge" id="spr_badge_3008529987" data-rating="0.0">
											<span class="spr-starrating spr-badge-starrating">
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
											</span>
											<span class="spr-badge-caption">No reviews </span>
										</span>
									</div>
									<p class="h6 product-title">
										<a href="/home/goods/{{$v->gid}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->gname}}</font></font></a>
									</p>
									<p class="product-price">
										<strong>On Sale</strong>
										<span class="money" data-currency-usd="{{$v->price}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">￥ {{$v->price}} </font></font></span>
										<!-- <span class="visually-hidden"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">正价</font></font></span> -->
										<!-- <s><span class="money" data-currency-usd="$24.99"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24.99美元</font></font></span></s> -->
									</p>
									<div class="list-mode-description">
										Quisque vel enim quis purus ultrices consequat, sed tincidunt massa blandit ipsum interdum tristique cras dictum, lacus eu molestie elementum nulla est auctor. Etiam dan lorem quis ligula elementum porttitor quisem. Duis eget purus urna fusce sed scelerisque ante. Lorem ipsum dolor sit amet consectetur...
									</div>
									<ul class="action-button">
										<li class="add-to-cart-form">
											<!-- <form action="#" method="post" enctype="multipart/form-data" id="AddToCartForm" class="form-vertical">					 -->
											<a href="/home/goods/{{$v->gid}}">
												<div class="effect-ajax-cart">
													<input type="hidden" name="quantity" value="1">
													<button type="submit" name="add" id="AddToCart" class="btn btn-1 add-to-cart" title="立即购买">
														<span id="AddToCartText"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 立即购买</font></font></span>
													</button>
												</div>
											</a>
												
											<!-- </form> -->
										</li>
										<li class="wishlist">
											<a class="wish-list btn" href="/home/love"><i class="fa fa-heart" title="收藏"></i></a>
										</li>
										<!-- <li class="email">
											<a target="_blank" class="btn email-to-friend" href="#"><i class="fa fa-envelope" title="发邮件给朋友"></i></a>
										</li> -->
									</ul>
								</div>
							</div> 
											
							@endforeach		
								
						</div>
						{!!$res->appends($request->all())->render()!!}	
					</div>
					<div class="grid__item large--one-quarter">
						<div class="group_sidebar">
							<div class="sb-wrapper all-collections-wrapper clearfix" data-animate="" data-delay="0">
								<h6 class="sb-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所有类别</font></font></h6>
								@php
									$res = DB::table('gtype')->where('pid','0')->get();
								@endphp
								@foreach($res as $k=>$v)
								<ul class="list-unstyled sb-content all-collections list-styled">

									<li>
									<a href="/homes/goods/{{$v->tid}}"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->tname}}</font></font></span><span class="collection-count"><font style="vertical-align: inherit;"></font></span></a> &nbsp; &nbsp; <span class="qb"><i class="fa fa-angle-right"></i></span>
										@php
											$rs = DB::table('gtype')->where('pid',$v->tid)->get();
										@endphp
										
										<ul class="qd" style="display:none">
										@foreach($rs as $kk=>$vv)
											<li>
												<a href="/homes/goods/{{$vv->tid}}"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$vv->tname}}</font></font></span><span class="collection-count"><font style="vertical-align: inherit;"></font></span></a>
											</li>
										@endforeach
										</ul>
										
									</li>
								</ul>
								@endforeach
							</div>
							<script>
								$('.qb').each(function()
								{
									$(this).click(function()
									{
										
										if($(this).parent().children('.qd').attr('style') == "display:none")
									 	{
									 		$(this).parent().children('.qd').attr('style','');
									 	}else if($(this).parent().children('.qd').attr('style') == '')
									 	{
									 		$(this).parent().children('.qd').attr('style','display:none');
									 	}
									 
									});
								});
								
							</script>
							<div class="sb-wrapper featured-product-wrapper clearfix" data-animate="" data-delay="0">
								<div class="featured-product">
									<h6 class="sb-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">每周畅销</font></font></h6>
									@php
										$goods = DB::table('goods')->inRandomOrder()->take(5)->get();
									@endphp
									<div class="sb-content featured-product-content">
									@foreach($goods as $k=>$v)
									@php
										$gpic = DB::table('goodspicture')->where('gid',$v->gid)->pluck('pic_name');
									@endphp
										<div class="element full_width" data-animate="fadeInUp" data-delay="0">

											<div class="grid__item large--one-quarter medium--one-half">
												<div class="grid__item_wrapper">
													<div class="grid__image product-image">
														<a href="/home/goods/{{$v->gid}}" class="grid__image product-image">
														<img src="{{$gpic[0]}}" alt="Consequuntur magni dolores">
														</a>
														<div class="quickview">
															<div class="product-ajax-cart hidden-xs hidden-sm">
																<div data-handle="consequuntur-magni-dolores" class="quick_shop-div">
																	<a href="/home/goods/{{$v->gid}}" class="btn quick_shop">
																	<i class="fa fa-eye" title="快速浏览"></i>																	
																	</a>
																</div>
															</div>
														</div>
													</div>
													<div class="rating-star">
														<span class="spr-badge" id="spr_badge_3008529987" data-rating="4.0">
														<span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span>
														<span class="spr-badge-caption">
														1 review </span>
														</span>
													</div>
													<p class="h6 product-title">
														<a href="product.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->gname}}</font></font></a>
													</p>
													<p class="product-price">
														<strong>On Sale</strong>
														<span class="money" data-currency-usd="$19.99"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ {{$v->price}} </font></font></span>
														<!-- <span class="visually-hidden"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">正价</font></font></span>
														<s><span class="money" data-currency-usd="$24.99"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24.99美元</font></font></span></s> -->
													</p>
													<div class="list-mode-description">
														 Quisque vel enim quis purus ultrices consequat, sed tincidunt massa blandit ipsum interdum tristique cras dictum, lacus eu molestie elementum nulla est auctor. Etiam dan lorem quis ligula elementum porttitor quisem. Duis eget purus urna fusce sed scelerisque ante. Lorem ipsum dolor sit amet consectetur...
													</div>
													<ul class="action-button">
														<li class="add-to-cart-form">
														<form action="#" method="post" enctype="multipart/form-data" id="AddToCartForm" class="form-vertical">			
															<div class="effect-ajax-cart">
																<input type="hidden" name="quantity" value="1">
																<button type="submit" name="add" id="AddToCart" class="btn btn-1 add-to-cart" title="Buy Now"><span id="AddToCartText"><i class="fa fa-shopping-cart"></i> Buy Now</span></button>
															</div>
														</form>
														</li>
														<li class="wishlist">
														<a class="wish-list btn" href="wishlist.html"><i class="fa fa-heart" title="Wishlist"></i></a>
														</li>
														<li class="email">
														<a target="_blank" class="btn email-to-friend" href="#"><i class="fa fa-envelope" title="Email to friend"></i></a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									@endforeach
									</div>
								</div>
							</div>
							<div class="sb-wrapper slider-banner-wrapper clearfix" data-animate="" data-delay="0">
								<img src="/homes/assets/images/sb-banner.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
@stop
@section('js')
<script>
	$(function(){
        $('body').removeClass('page-id-6');
        $('body').removeClass('home-style1');
        $('body').removeClass('page');

        $('body').addClass('template-collection');
        $('body').attr('id','products');
	    $("#SortBy").change(function(){
		    var val = $(this).val();
			$.ajax({
				url: '/home/shops',
				method: 'GET',
				type: 'json',
				data:{'val':val,'gname':$('#sousuo').val()},
				success:function(data){
					if(data.status=='1'){
						$('#goods_biao').html('');
						$('.pagination').html('');
						for(var i = 0;i<data.res.length;i++){
							var div = '<div class="grid__item large--one-quarter medium--one-half"><div class="grid__item_wrapper"><div class="grid__image product-image"><a href="/home/goods/'+data.res[i].gid+'"><img src="'+data.pics[data.res[i].gid]+'" alt="'+data.res[i].gname+'"></a><div class="quickview"><div class="product-ajax-cart hidden-xs hidden-sm"><div data-handle="consequuntur-magni-dolores" class="quick_shop-div"><a href="/home/goods/'+data.res[i].gid+'" class="btn quick_shop"><i class="fa fa-eye" title="快速浏览"></i></a></div></div></div></div><div class="rating-star"><span class="spr-badge" id="spr_badge_3008529987" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews </span></span></div><p class="h6 product-title"><a href="/home/goods/'+data.res[i].gid+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+data.res[i].gname+'</font></font></a></p><p class="product-price"><strong>On Sale</strong><span class="money" data-currency-usd="'+data.res[i].price+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">￥ '+data.res[i].price+' </font></font></span></p><div class="list-mode-description">Quisque vel enim quis purus ultrices consequat, sed tincidunt massa blandit ipsum interdum tristique cras dictum, lacus eu molestie elementum nulla est auctor. Etiam dan lorem quis ligula elementum porttitor quisem. Duis eget purus urna fusce sed scelerisque ante. Lorem ipsum dolor sit amet consectetur...</div><ul class="action-button"><li class="add-to-cart-form"><a href="/home/goods/'+data.res[i].gid+'"><div class="effect-ajax-cart"><input type="hidden" name="quantity" value="1"><button type="submit" name="add" id="AddToCart" class="btn btn-1 add-to-cart" title="立即购买"><span id="AddToCartText"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 立即购买</font></font></span></button></div></a></li><li class="wishlist"><a class="wish-list btn" href="/home/love"><i class="fa fa-heart" title="收藏"></i></a></li></ul></div></div>';
							$('#goods_biao').append(div);
						}
						var ul_first = '<li class="disabled"><a href="javascript:;" rel="prev">«</a></li>';
						$('.pagination').append(ul_first);
						for(var j = 0;j<Math.ceil(data.total/16);j++){
							if(j == '0'){
								var ul = '<li class="active"><a href="javascript:;">'+(j+1)+'</a></li>';
							}else{
								var ul = '<li><a href="javascript:;" class="noactive">'+(j+1)+'</a></li>';
							}
							$('.pagination').append(ul);
						}
						if(Math.ceil(data.total/16) == 1){
							var ul_last = '<li class="disabled"><a href="javascript:;" rel="next">»</a></li>';
						}else{
							var ul_last = '<li><a href="javascript:;" rel="next" id="next">»</a></li>';
						}
						
						$('.pagination').append(ul_last);
					}
				}
			});
		});
		$(document).on('click','.noactive',function(){
			var val = $('#SortBy').val();
			$.ajax({
				url: '/home/shops',
				method: 'GET',
				type: 'json',
				data:{'val':val,'gname':$('#sousuo').val(),page:$(this).html()},
				success:function(data){
					if(data.status=='1'){
						$('#goods_biao').html('');
						$('.pagination').html('');
						for(var i = 0;i<data.res.length;i++){
							var div = '<div class="grid__item large--one-quarter medium--one-half"><div class="grid__item_wrapper"><div class="grid__image product-image"><a href="/home/goods/'+data.res[i].gid+'"><img src="'+data.pics[data.res[i].gid]+'" alt="'+data.res[i].gname+'"></a><div class="quickview"><div class="product-ajax-cart hidden-xs hidden-sm"><div data-handle="consequuntur-magni-dolores" class="quick_shop-div"><a href="/home/goods/'+data.res[i].gid+'" class="btn quick_shop"><i class="fa fa-eye" title="快速浏览"></i></a></div></div></div></div><div class="rating-star"><span class="spr-badge" id="spr_badge_3008529987" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews </span></span></div><p class="h6 product-title"><a href="/home/goods/'+data.res[i].gid+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+data.res[i].gname+'</font></font></a></p><p class="product-price"><strong>On Sale</strong><span class="money" data-currency-usd="'+data.res[i].price+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">￥ '+data.res[i].price+' </font></font></span></p><div class="list-mode-description">Quisque vel enim quis purus ultrices consequat, sed tincidunt massa blandit ipsum interdum tristique cras dictum, lacus eu molestie elementum nulla est auctor. Etiam dan lorem quis ligula elementum porttitor quisem. Duis eget purus urna fusce sed scelerisque ante. Lorem ipsum dolor sit amet consectetur...</div><ul class="action-button"><li class="add-to-cart-form"><a href="/home/goods/'+data.res[i].gid+'"><input type="hidden" name="quantity" value="1"><button type="submit" name="add" id="AddToCart" class="btn btn-1 add-to-cart" title="立即购买"><span id="AddToCartText"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 立即购买</font></font></span></button></div></a></li><li class="wishlist"><a class="wish-list btn" href="/home/love"><i class="fa fa-heart" title="收藏"></i></a></li></ul></div></div>';
							$('#goods_biao').append(div);
						}
						var ul_first = '<li><a href="javascript:;" rel="prev" id="prev">«</a></li>';
						$('.pagination').append(ul_first);
						for(var j = 0;j<Math.ceil(data.total/16);j++){
							if(j == data.page-1){
								var ul = '<li class="active"><a href="javascript:;">'+(j+1)+'</a></li>';
							}else{
								var ul = '<li><a href="javascript:;" class="noactive">'+(j+1)+'</a></li>';
							}
							$('.pagination').append(ul);
						}
						var ul_last = '<li><a href="javascript:;" rel="next" id="next">»</a></li>';
						$('.pagination').append(ul_last);
						if($('.active a').html() == '1'){
							$('#prev').parent().addClass('disabled');
							$('#prev').attr('id','');
						}
						if($('.active a').html() == Math.ceil(data.total/16)){
							$('#next').parent().addClass('disabled');
							$('#next').attr('id','');
						}
					}
				}
			});
		});
		$(document).on('click','#next',function(){
			var val = $('#SortBy').val();
			$.ajax({
				url: '/home/shops',
				method: 'GET',
				type: 'json',
				data:{'val':val,'gname':$('#sousuo').val(),page:Number($('.active a').html())+1},
				success:function(data){
					if(data.status=='1'){
						$('#goods_biao').html('');
						$('.pagination').html('');
						for(var i = 0;i<data.res.length;i++){
							var div = '<div class="grid__item large--one-quarter medium--one-half"><div class="grid__item_wrapper"><div class="grid__image product-image"><a href="/home/goods/'+data.res[i].gid+'"><img src="'+data.pics[data.res[i].gid]+'" alt="'+data.res[i].gname+'"></a><div class="quickview"><div class="product-ajax-cart hidden-xs hidden-sm"><div data-handle="consequuntur-magni-dolores" class="quick_shop-div"><a href="/home/goods/'+data.res[i].gid+'" class="btn quick_shop"><i class="fa fa-eye" title="快速浏览"></i></a></div></div></div></div><div class="rating-star"><span class="spr-badge" id="spr_badge_3008529987" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews </span></span></div><p class="h6 product-title"><a href="/home/goods/'+data.res[i].gid+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+data.res[i].gname+'</font></font></a></p><p class="product-price"><strong>On Sale</strong><span class="money" data-currency-usd="'+data.res[i].price+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">￥ '+data.res[i].price+' </font></font></span></p><div class="list-mode-description">Quisque vel enim quis purus ultrices consequat, sed tincidunt massa blandit ipsum interdum tristique cras dictum, lacus eu molestie elementum nulla est auctor. Etiam dan lorem quis ligula elementum porttitor quisem. Duis eget purus urna fusce sed scelerisque ante. Lorem ipsum dolor sit amet consectetur...</div><ul class="action-button"><li class="add-to-cart-form"><a href="/home/goods/'+data.res[i].gid+'"><input type="hidden" name="quantity" value="1"><button type="submit" name="add" id="AddToCart" class="btn btn-1 add-to-cart" title="立即购买"><span id="AddToCartText"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 立即购买</font></font></span></button></div></a></li><li class="wishlist"><a class="wish-list btn" href="/home/love"><i class="fa fa-heart" title="收藏"></i></a></li></ul></div></div>';
							$('#goods_biao').append(div);
						}
						var ul_first = '<li><a href="javascript:;" rel="prev" id="prev">«</a></li>';
						$('.pagination').append(ul_first);
						for(var j = 0;j<Math.ceil(data.total/16);j++){
							if(j == data.page-1){
								var ul = '<li class="active"><a href="javascript:;">'+(j+1)+'</a></li>';
							}else{
								var ul = '<li><a href="javascript:;" class="noactive">'+(j+1)+'</a></li>';
							}
							$('.pagination').append(ul);
						}
						var ul_last = '<li><a href="javascript:;" rel="next" id="next">»</a></li>';
						$('.pagination').append(ul_last);
						if($('.active a').html() == '1'){
							$('#prev').parent().addClass('disabled');
							$('#prev').attr('id','');
						}
						if($('.active a').html() == Math.ceil(data.total/16)){
							$('#next').parent().addClass('disabled');
							$('#next').attr('id','');
						}
					}
				}
			});
		});
		$(document).on('click','#prev',function(){
			var val = $('#SortBy').val();
			$.ajax({
				url: '/home/shops',
				method: 'GET',
				type: 'json',
				data:{'val':val,'gname':$('#sousuo').val(),page:Number($('.active a').html())-1},
				success:function(data){
					if(data.status=='1'){
						$('#goods_biao').html('');
						$('.pagination').html('');
						for(var i = 0;i<data.res.length;i++){
							var div = '<div class="grid__item large--one-quarter medium--one-half"><div class="grid__item_wrapper"><div class="grid__image product-image"><a href="/home/goods/'+data.res[i].gid+'"><img src="'+data.pics[data.res[i].gid]+'" alt="'+data.res[i].gname+'"></a><div class="quickview"><div class="product-ajax-cart hidden-xs hidden-sm"><div data-handle="consequuntur-magni-dolores" class="quick_shop-div"><a href="/home/goods/'+data.res[i].gid+'" class="btn quick_shop"><i class="fa fa-eye" title="快速浏览"></i></a></div></div></div></div><div class="rating-star"><span class="spr-badge" id="spr_badge_3008529987" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews </span></span></div><p class="h6 product-title"><a href="/home/goods/'+data.res[i].gid+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+data.res[i].gname+'</font></font></a></p><p class="product-price"><strong>On Sale</strong><span class="money" data-currency-usd="'+data.res[i].price+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">￥ '+data.res[i].price+' </font></font></span></p><div class="list-mode-description">Quisque vel enim quis purus ultrices consequat, sed tincidunt massa blandit ipsum interdum tristique cras dictum, lacus eu molestie elementum nulla est auctor. Etiam dan lorem quis ligula elementum porttitor quisem. Duis eget purus urna fusce sed scelerisque ante. Lorem ipsum dolor sit amet consectetur...</div><ul class="action-button"><li class="add-to-cart-form"><a href="/home/goods/'+data.res[i].gid+'"><div class="effect-ajax-cart"><input type="hidden" name="quantity" value="1"><button type="submit" name="add" id="AddToCart" class="btn btn-1 add-to-cart" title="立即购买"><span id="AddToCartText"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 立即购买</font></font></span></button></div></a></li><li class="wishlist"><a class="wish-list btn" href="/home/love"><i class="fa fa-heart" title="收藏"></i></a></li></ul></div></div>';
							$('#goods_biao').append(div);
						}
						var ul_first = '<li><a href="javascript:;" rel="prev" id="prev">«</a></li>';
						$('.pagination').append(ul_first);
						for(var j = 0;j<Math.ceil(data.total/16);j++){
							if(j == data.page-1){
								var ul = '<li class="active"><a href="javascript:;">'+(j+1)+'</a></li>';
							}else{
								var ul = '<li><a href="javascript:;" class="noactive">'+(j+1)+'</a></li>';
							}
							$('.pagination').append(ul);
						}
						var ul_last = '<li><a href="javascript:;" rel="next" id="next">»</a></li>';
						$('.pagination').append(ul_last);
						if($('.active a').html() == '1'){
							$('#prev').parent().addClass('disabled');
							$('#prev').attr('id','');
						}
						if($('.active a').html() == Math.ceil(data.total/16)){
							$('#next').parent().addClass('disabled');
							$('#next').attr('id','');
						}
					}
				}
			});
		});
	});
</script>
@stop

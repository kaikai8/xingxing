@extends('layout.homes')

@section('title',$title)

@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">
<div style="height: 36px"></div>

<div class="row">
	<div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="page type-page status-publish hentry">
			<div class="entry-content">
				<div class="entry-summary">
					<div class="woocommerce">
						<form action="/home/jiesuan" method="post">
							
						@if (!empty(session('success')))
						    <div class="mws-form-message error">
						    	
						        <ul>
						        	
						                <li>{{session('success')}}</li>
						            
						        </ul>
						    </div>
						@endif
							{{ csrf_field() }}
							<table class="shop_table shop_table_responsive cart" cellspacing="0">
								<thead>
									<tr>
										<th style="width: 100px" ><input id = "all" class="quan" type="checkbox" name='ids[]'/> &nbsp 全选</th>
										<th style="text-align: center;" class="product-thumbnail">商品图片</th>
										<th style="text-align: center;" class="product-name">商品名</th>
										<th style="text-align: center;" class="product-price">单价</th>
										<th style="text-align: center;" class="product-color">颜色</th>
										<th style="text-align: center;" class="product-size">规格</th>
										<th style="text-align: center;" style="width: 150px" class="product-quantity">数量</th>
										<th style="text-align: center;" style="width: 120px" class="product-subtotal">小计</th>
										<th style="text-align: center;"  style="width: 220px"  class="product-remove">删除</th>
									</tr>
								</thead>
								
								<tbody>
									@foreach ($cart as $v)
									<tr  class="cart_item">
										<td  ><input class="xiao" type="checkbox" name='ids[]' value="{{$v->id}}"></td>
										<td  class="product-thumbnail">
												<img width="180" height="180" src="{{$v->gpsrc}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" sizes="(max-width: 180px) 100vw, 180px">
										</td>
										
										<td  class="product-name" data-title="Product">
											<a name="c_gname" href="/home/goods/{{$v->gid}}">{{$v->c_gname}}</a>					
										</td>
										<td  class="product-price" data-title="Price">
											<span name="c_price" class="c_price" >{{$v->c_price}} 元</span>	
										</td>

										<td  class="" data-title="Product">
											<span name="c_color">{{$v->c_color}}</span>					
										</td>

										<td  class="" data-title="Product">
											<span name="c_size" >{{$v->c_size}}</span>					
										</td>
										
										<td  class="product-quantity" data-title="Quantity">
											<div class="quantity buttons_added">
												<input did="{{$v->id}}" type="button" value="-" class="minus">
												<input  type="number" step="1" min="0" max="" name="" value="{{$v->gmsl}}" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
												<input did="{{$v->id}}" type="button" value="+" class="plus">
											</div>
										</td>
										@php $zj = ($v->c_price * $v->gmsl)  @endphp
										<td  class="product-subtotal" data-title="Total">
											<span class="zji" style="text-align: center;"  >{{$zj}}</span> 元			

										</td>

										<td  class="product-remove">
											<a class="remove" cid="{{$v->id}}" style="width: 30px;height: 30px;line-height: 20px;" title="Remove this item"><i class="fa fa-times" aria-hidden="true"></i></a>					
										</td>

										
									</tr>
									@endforeach 
									<tr>
										

										<td colspan="5" class="actions">

											<span class="">总金额: &nbsp </span>		
											<strong><span name='jine' class="zongjia">0 元</span></strong>
										</td>
										<input class="zj" type="hidden" name="zongjia" value="">
										<td colspan="2" class="actions"></td>
											
										<td colspan="5" >

										<div class="wc-proceed-to-checkout">
										<a class="checkout-button button alt wc-forward" href="/">继续购买</a> &nbsp; &nbsp; &nbsp; 
										<input type="submit" class="checkout-button button alt wc-forward" value="去结算">	
										</div>
				
										</td>
										
									</tr>
								</tbody>
							</table>
						</form>
					
						<div class="cart-collaterals">
							<div class="products-wrapper">
								<div class="cart_totals ">
									<!-- <h2>总金额</h2> -->
									
									<!-- <table cellspacing="0" class="shop_table shop_table_responsive">
										<tbody>
											<tr class="cart-subtotal">
												<th>小计</th>
												<td data-title="Subtotal">
													<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$ </span>0</span>
												</td>
											</tr>
											<tr class="order-total">
												<th>总</th>
												<td data-title="Total">
													<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">0</span> 元</span></strong> 
												</td>
											</tr>
										</tbody>
									</table> -->
									
									
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
	$.ajaxSetup({
    	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
	});
	
	//购物车商品数量减
	$('.minus').each(function(){
		$(this).click(function(){
			var gv = $(this).next().val();
			var gv = parseInt(gv) - 1;
			if(gv <= 1){  gv = 1};
			$(this).next().attr('value',gv);
			var g = $(this).next().val();
			var c_price = $(this).parents('td').siblings().find('.c_price').html();
			var gg = parseInt(c_price) * g;
			gg = gg.toFixed(2);
			// console.log(gg);
			$(this).parents('td').siblings().find('.zji').html(gg) ;
			var did = $(this).attr('did');
			$.post('/home/gmsl',{gv:gv,gg:gg,did:did},function(data){

	            if(data == '1'){

	            }else{
	            	alert('已经减到底了,不能再减了');
	            }
	        })

		});
	});
	//购物车商品数量加
	$('.plus').each(function(){
		$(this).click(function(){
			var gv = $(this).prev().val();
			var gv = parseInt(gv) + 1;
			if(gv > 200){  gv = 200};
			$(this).prev().attr('value',gv);
			var g = $(this).prev().val();
			var c_price = $(this).parents('td').siblings().find('.c_price').html();
			var gg = parseFloat(c_price) * g;
			gg = gg.toFixed(2);
			// console.log(gg);
			$(this).parents('td').siblings().find('.zji').html(gg) ;
			var did = $(this).attr('did');
			$.post('/home/gmsl',{gv:gv,gg:gg,did:did},function(data){

	            if(data == '1'){

	            }else{
	            	alert('不能再加了');
	            }
	        })
		});
	});

	//商品价格总计
	$('.xiao').click(function()
	{
		var n = 0;

		$('.xiao').each(function()
		{
			var a = $(this).attr('checked');
			// console.log(a);
			if(a){
				
				var c = $(this).parents('td').siblings().find('.zji').html();
				n += Number(c);
			}
		})
		$('.zongjia').text(n + ' 元');
		$('.zj').val(n);
		
	})
	//商品价格总计
	$('.quan').click(function()
	{
		var a = $(this).attr('checked');
		var n = 0;

		$('.xiao').each(function()
		{
			
			// console.log(a);
			if(a){
				
				var c = $(this).parents('td').siblings().find('.zji').html();
				n += Number(c);
			}
		})
		$('.zongjia').text(n + ' 元');
		$('.zj').val(n);
	})
		
	// 移出购物车
	$('.remove').click(function(){
		var che = $(this).parents('tr').find(':checkbox')[0].checked;
		// console.log(che);
		if(che){
			var id = $(this).attr('cid');
			var remove =$(this).parents('tr');
			$.post('/home/remove',{cid:id},function(data){

	            if(data == '1'){
	                remove.remove();
	            }
	        })
		}else
		{
			alert('请选中后删除');
		}
	})
	// 全选
	$('#all').click(function()
	{
		var $class = $(this).attr('class');
		if($class == "quan")
		{
			$('.xiao').attr('checked',true);
			$(this).removeClass('quan');
			$(this).addClass('buxuan');
		}else if($class == "buxuan")
		{
			$('.xiao').attr('checked',false);
			$(this).removeClass('buxuan');
			$(this).addClass('quan');
		}
	})

	
$('.mws-form-message').fadeOut(5000);
		
</script>
@stop

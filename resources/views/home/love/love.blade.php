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
						
							<table class="shop_table shop_table_responsive cart" cellspacing="0">
								<thead>
									<tr>
										<th style="width: 52px; text-align:center" class="product-remove">删除</th>
										<!-- <th  class="product-thumbnail">商品图片</th> -->
										<th style="width: 100px; text-align:center" class="product-name">商品名</th>
										<th style = "text-align:center" class="product-price">单价</th>
										<th style = "text-align:center" class="product-color">颜色</th>
										<th style = "text-align:center" class="product-size">规格</th>
										<th style = "text-align:center" class="product-quantity">数量</th>
										<th style = "text-align:center" class="product-subtotal">操作</th>
									</tr>
								</thead>
								
								<tbody>
									@foreach ($res as $k=>$v)
									<tr class="cart_item">
										<td class="product-remove">
											<a class="remove" href="/home/uplove/{{$v->oid}}" style="width: 30px;height: 30px;line-height: 20px;" title="Remove this item"><i class="fa fa-times" aria-hidden="true"></i></a>					
										</td>
										
										
										<!-- <td class="product-thumbnail">
												<img width="180" height="180" src="{{$v->gpsrc}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" sizes="(max-width: 180px) 100vw, 180px">
										</td> -->
										
										<td class="product-name" data-title="Product">
											<a href="/home/goods/{{$v->gid}}">{{$v->gname}}</a>					
										</td>
										
										<td class="product-price" data-title="Price">
											<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{$v->price}}</span> 元	
										</td>

										<td class="" data-title="Product">
											<span>{{$v->color}}</span>					
										</td>

										<td class="" data-title="Product">
											<span>{{$v->size}}</span>					
										</td>
										
										<td class="" data-title="Product">
											<span>{{$v->gnum}}</span>					
										</td>


										<td colspan="6" class="actions">
											 {{csrf_field()}}
											
											<a href="/home/goods/{{$v->oid}}"><input type="submit" class="button" name="update_cart" value="查看详情">		</a>
										</td>
									
										<!-- <td class="product-quantity" data-title="Quantity">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus">
												<input  type="number" step="1" min="0" max="" name="" value="{{$v->gmsl}}" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
												<input type="button" value="+" class="plus">
											</div>
										</td> -->
										
										<!-- <td class="product-subtotal" data-title="Total">
											<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>300.00 元</span>					
										</td> -->
									</tr>
									@endforeach 
									
								</tbody>
							</table>
						
					
						<!-- <div class="cart-collaterals">
							<div class="products-wrapper">
								<div class="cart_totals ">
									<h2>Cart Totals</h2>
									
									<table cellspacing="0" class="shop_table shop_table_responsive">
										<tbody>
											<tr class="cart-subtotal">
												<th>Subtotal</th>
												<td data-title="Subtotal">
													<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>300.00</span>
												</td>
											</tr>
											<tr class="order-total">
												<th>Total</th>
												<td data-title="Total">
													<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>300.00</span></strong> 
												</td>
											</tr>
										</tbody>
									</table>
									
									<div class="wc-proceed-to-checkout">
										<a href="checkout.html" class="checkout-button button alt wc-forward">Proceed to Checkout</a>
									</div>
								</div>
							</div>
						</div> -->
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
/*	$.ajaxSetup({
    	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
	});
	
	
	$('.minus').each(function(){
		$(this).click(function(){
			var gv = $(this).next().val();
			var gv = parseInt(gv) - 1;
			if(gv <= 1){  gv = 1};
			$(this).next().attr('value',gv);
		});
	});

	$('.plus').each(function(){
		$(this).click(function(){
			var gv = $(this).prev().val();
			var gv = parseInt(gv) + 1;
			if(gv >= 200){  gv = 200};
			$(this).prev().attr('value',gv);
		});
	});
	
	$('.remove').click(function(){
		var id = $(this).attr('cid');
		var remove =$(this).parents('tr');
		$.post('/home/remove',{cid:id},function(data){

            if(data == '1'){
                remove.remove();
            }
        })
	})*/
</script>
@stop

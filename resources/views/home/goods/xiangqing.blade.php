@extends('layout.homes')
@section('title',$title)
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div style="height: 30px" ></div>
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
<div id="checkoutGoodsList" class="checkout-goods-box">
	@foreach($ord_gods as $v)
	@php
    $uid = DB::table('addr_message')->where('user_id',$v->uid)->where('moren','1')->pluck('dname'); 
    @endphp
<div class="quanbu">
    <div class="xm-box">
        <div class="box-hd">
        	<h5></h5>
            <h5> &nbsp; &nbsp; 订单号 : {{$v->ord}}</h5>
            <h5 >  &nbsp; &nbsp; 下单时间 : {{date('Y年m月d日', $v->addtime)}}</h5>
            <h5 >  &nbsp; &nbsp; 订单状态 :
            	<span> 
            		@if($v->ostatus == '0')
            		已下单,未发货 
            		@elseif($v->ostatus == '1')
            		已发货,待收货  &nbsp; &nbsp;  
            		<button  style="margin-left:600px" oid="{{$v->oid}}" class="btn-danger btn-small queren">
            		确认收货
            		</button> 
            	
            		@elseif($v->ostatus == '2') 
            		交易完成  &nbsp; &nbsp; 
            		<button oid="{{$v->oid}}" style="margin-left:600px" class="btn-danger btn-small removes">删除订单</button>
            		@endif
            	</span>
            </h5>
            <h5>  &nbsp; &nbsp; 收货人 : {{$uid[0]}}</h5>
        </div><br><div class="box-hd">
            
        </div>
        <div class="box-bd">
            <dl class="checkout-goods-list">
                <dt class="clearfix">
                    <span class="col col-1">商品信息</span>
                    <span class="col col-2">购买价格</span>
                    <span class="col col-3">购买数量</span>
                    <span class="col col-4">小计（元）</span>
                </dt>
                @php
                $xq = DB::table('ord_goods')->where('oid',$v->oid)->get();
                @endphp
                @foreach($xq as $vv)
                <dd class="item clearfix">
                    <div class="item-row">
                        <div class="col col-1">
                            <div class="g-pic">
                                <img src="{{$vv->o_gpsrc}}"  width="40" height="40" />
                            </div>
                            <div class="g-info">
                          	<a href="#">
                          	 {{$vv->o_gname}} {{$vv->o_size}} {{$vv->o_color}}
                           	</a>         
                           </div>
                        </div>
    
                        <div class="col col-2">{{$vv->o_price}} 元</div>
                        <div class="col col-3">{{$vv->o_gmsl}}</div>
                        <div class="col col-4">{{$vv->o_xiaoji}}</div>
                    </div>
                </dd>
                @endforeach
                <dd>
                	<div class="col col-1"> &nbsp; &nbsp; 订单总额：{{$v->snum}}  元</div>
                </dd>
            </dl>
                
                </div>
        </div>
        <hr>
</div>
    
	@endforeach
	</div>
                    <!-- 商品清单 END -->
					<div class="checkout-confirm">
					     <a href="/" class="btn btn-lineDakeLight btn-back-cart">继续购买</a>
					</div>

    <script src="/js/js/base.min.js"></script>
    <script type="text/javascript" src="/js/js/address_all.js"></script>
    <script type="text/javascript" src="/js/js/checkout.min.js"></script>
    <link href="/js/css/public.css" type="text/css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="/js/css/base.css"/>
    <script type="text/javascript" src="/js/js/jquery_cart.js"></script>  
    <link rel="stylesheet" type="text/css" href="/js/css/checkOut.css" />
    <script src="/js/js/base.min.js"></script>
    <script type="text/javascript" src="/js/js/address_all.js"></script>
    <script type="text/javascript" src="/js/js/checkout.min.js"></script>  
</div>


@stop
@section('js')
<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

		$('.queren').click(function(){
			// var parent = $(this);
			var oid = $(this).attr('oid');
			$.post('/admin/queren',{'oid':oid},function(data){
				// console.log(parent);
				if(data.status){
					$('button[oid='+data.oid+']').parent().html('交易完成   &nbsp; &nbsp; <button oid="{{$v->oid}}" style="margin-left:600px" class="btn-danger btn-small removes">删除订单</button>');
				}else{

				}
	            
	        });
		});

		$('.removes').click(function(){
			var oid = $(this).attr('oid');
			var parentss = $(this).parents('.quanbu');
			$.post('/admin/removes',{oid:oid},function(data){
				if(data.status){
					parentss.remove();
				}else{

				}
	            
	        })

			
		})
		
</script>
@stop

@extends('layout.homes')

@section('title',$title)

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="checkout-box">
            <form  id="checkoutForm" action="/home/xiangqing" method="post">
            	{{ csrf_field() }}
                <div class="checkout-box-bd">
                        <!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
                    <input type="hidden" name="Checkout[addressState]" id="addrState"   value="0">
                    <!-- 收货地址 -->
                    <div class="xm-box">
                        <div class="box-hd ">
        <h2 class="title">收货地址</h2>
        <!---->
    </div>
    <div class="box-bd">
        <div class="clearfix xm-address-list" id="checkoutAddrList">
			@foreach ($shou as $v)
            <dl class="item" >
                <dt>
                    <strong class="itemConsignee">{{$v->dname}}</strong>
                    <span class="itemTag tag">收货人</span>
                </dt>
                <dd>
                    <p class="tel itemTel">手机号:  {{$v->dphone}}</p>
                    <p class="itemStreet">收货地址:  {{$v->addr}}</p>
		            
		        </dd>
                <dd style="display:none">
                    <input type="radio" name="Checkout[address]" class="addressId"  value="10140916720030323">
                </dd>
            </dl>
			@endforeach
                <div class="item use-new-addr"  id="J_useNewAddr" data-state="off">
             <span class="iconfont icon-add"><img src="/js/images/add_cart.png" /></span> 
            使用新地址
        </div>
        </div>
        <input type="hidden" name="newAddress[type]" id="newType" value="common">
        <input type="hidden" name="newAddress[consignee]" id="newConsignee">
        <input type="hidden" name="newAddress[province]" id="newProvince">
        <input type="hidden" name="newAddress[city]" id="newCity">
        <input type="hidden" name="newAddress[district]" id="newCounty">
        <input type="hidden" name="newAddress[address]" id="newStreet">
        <input type="hidden" name="newAddress[zipcode]" id="newZipcode">
        <input type="hidden" name="newAddress[tel]" id="newTel">
        <input type="hidden" name="newAddress[tag_name]" id="newTag">
    
        <div class="xm-edit-addr-backdrop" id="J_editAddrBackdrop"></div>
    </div>
                     <!-- 商品清单 -->
<div id="checkoutGoodsList" class="checkout-goods-box">
    <div class="xm-box">
                        <div class="box-hd">
                            <h2 class="title">确认订单信息</h2>
                        </div>
                        <div class="box-bd">
                            <dl class="checkout-goods-list">
                                <dt class="clearfix">
                                    <span class="col col-1">商品信息</span>
                                    <span class="col col-2">购买价格</span>
                                    <span class="col col-3">购买数量</span>
                                    <span class="col col-4">小计（元）</span>
                                </dt>
                                @foreach ($shang as $v)
                                @foreach ($v as $vv)
                                @php $picname = DB::table('goodspicture')->where('gid',$vv->gid)->pluck('pic_name'); @endphp
                         		<input type="hidden" name="gid[]" value="{{$vv->gid}}" >

                                <dd class="item clearfix">
                                    <div class="item-row">
                                        <div class="col col-1">
                                            <div class="g-pic">
                                                <img src="{{$picname[0]}}"  width="40" height="40" />
                                            </div>
                                            <div class="g-info">
                                          	<a href="#">
                                          	{{$vv->c_gname}} {{$vv->c_color}} {{$vv->c_size}}
                                           	</a>
                                        </div>
                    
                                        <div class="col col-2">{{$vv->c_price}} 元</div>
                                        <div class="col col-3">{{$vv->gmsl}}</div>
                                        <div class="col col-4">{{$vv->xiaoji}}</div>
                                    </div>
                                </dd>
                                @endforeach
                                @endforeach
                            <div class="checkout-count clearfix">
                                <div class="checkout-price">
                                    <ul>

                                        <li>
                                           订单总额：<span>{{$zj}}  元</span>
                                        </li>
										<input class="zj" type="hidden" name="zongjia" value="{{$zj}}">
                                        <li>
                                            活动优惠：<span>-0元</span>
                                            <script type="text/javascript">
                                                checkoutConfig.activityDiscountMoney=0;
                                                checkoutConfig.totalPrice=244.00;
                                            </script>
                                        </li>
                                        <li>
                                            优惠券抵扣：<span id="couponDesc">-0元</span>
                                        </li>
                                        <li>
                                            运费：<span id="postageDesc">0元</span>
                                        </li>
                                    </ul>
                                    <p class="checkout-total">应付总额：<span><strong id="totalPrice">{{$zj}}</strong>元</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <!-- 商品清单 END -->

                    <div class="checkout-confirm">
                        
                         <a href="/home/cart" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
                         <input type="submit" class="btn btn-primary" value="立即下单" id="checkoutToPay" />
                                         </div>
                </div>
            </div>

        </form>

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

</script>
@stop

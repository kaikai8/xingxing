@extends('layout.homes')
@section('title',$title)
@section('content')
<div style="height: 30px" ></div>
<div id="checkoutGoodsList" class="checkout-goods-box">
    <div class="xm-box">
                        <div class="box-hd">
                            <h4 class="title ">订单号 :</h4>
                        </div><div class="box-hd">
                            <h4 class="title ">订单状态 :</h4>
                        </div><div class="box-hd">
                            <h4 class="title ">收货人 :</h4>
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
                         		<input type="hidden" name="id[]" value="{{$vv->id}}" >

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
                                        </div>
                    
                                        <div class="col col-2">{{$vv->c_price}} 元</div>
                                        <div class="col col-3">{{$vv->gmsl}}</div>
                                        <div class="col col-4">{{$vv->xiaoji}}</div>
                                    </div>
                                </dd>
                                
                                @endforeach
                                @endforeach
                                <dd>
                                	<div class="col col-1">订单总额：{{$zj}}  元</div>
                                </dd>
                            </dl>
                                <div  class="checkout-price">
                                    
                                           
                                        
                                </div>
                        </div>
                    </div>

                    </div>
                    <!-- 商品清单 END -->
                    <div class="checkout-confirm">
                        
                         <a href="/" class="btn btn-lineDakeLight btn-back-cart">继续购买</a>
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

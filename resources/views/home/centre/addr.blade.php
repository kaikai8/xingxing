@extends('layout.homes')


@section('title',$title)


@section('content')
<style>
	#contents address .btn-danger {
	   
        margin-top: 21px;
        margin-right: -55px;

	}
    #contents address .btn {
       
        float: right;

    }
</style>
<div class="container">
    <div class="row">
        <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="post-6 page type-page status-publish hentry">
                <div class="entry-content">
                    <header>
                        <h2 class="entry-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">我的帐户</font></font></h2>
                    </header>
                    
                    <div class="entry-content">
                        <div class="woocommerce">
                            <nav class="woocommerce-MyAccount-navigation">
                                <ul>
                                    <li>
                                        <a href="/home/message"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">个人资料</font></font></a>
                                    </li>
                                    
                                    <li>
                                       <a href="/home/pass"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户密码修改</font></font></a>
                                    </li>
                                    
                                    <li>
                                        <a href="/home/addr"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></a>
                                    </li>
                                    
                                    <li>
                                        <a href="/home/logout"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退出登陆</font></font></a>
                                    </li>
                                </ul>
                            </nav>
                          	<div class="woocommerce-MyAccount-content">
								
								<div class="u-column1 col-1 woocommerce-Address addresses">
									<header class="woocommerce-Address-title title">
										<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收件人信息</font></font></h3>
										<a href="/home/doaddr" class="edit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><button class="btn btn-success">添加</button></font></font></a>
									</header>
									@foreach($res as $k=>$v)

									<address><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->dname}} 
										</font>@if(($v->moren) == 1) <span style="background:#ffaa00;color:#fff">默认地址</span> @elseif(($v->moren) != 1) <a style="color:#fff" href="/home/moren/{{$v->did}}"><span style="background:#ffcc00">设为默认地址</span></a> @endif</font><br><a href="/home/{{$v->did}}/upaddr"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><button  class="btn btn-warning">修改</button>
										</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										{{$v->dphone}}</font></font><br><form action="/home/deladdr/{{$v->did}}" method = "post"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                         {{csrf_field()}}
                                        <button  class="btn btn-danger">删除</button>
										</font></font></form><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
										{{$v->addr}}</font></font><br>
									</address>
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

@stop

@section('js')
<script>
    $(function(){
        $('body').removeClass('page-id-6');
        $('body').removeClass('home-style1');
        $('body').addClass('woocommerce-account');
        $('body').addClass('woocommerce-page');

       
    })
	

</script>
@stop
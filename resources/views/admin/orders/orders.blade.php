@extends('layout.admins')

@section('title',$title)

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="/admin/css/fenye.css" media="screen">
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

            <form action="/admin/orders" method='get'>
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                        <option value="10" @if($request->num == 10)  selected="selected"  @endif >
                            10
                        </option>
                        <option value="20" @if($request->num == 20)  selected="selected"  @endif>
                            20
                        </option>
                        <option value="30" @if($request->num == 30)  selected="selected"  @endif>
                            30
                        </option>
                       
                    </select>
                    条数据
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    订单号:
                    <input type="text" name='ord' value='{{$request->ord}}' aria-controls="DataTables_Table_1">
                    
                </label>

                <!-- <label>
                    :
                    <input type="text" name='price' value='{{$request->price}}' aria-controls="DataTables_Table_1">
                    
                </label> -->

                <button class='btn btn-info'>搜索</button>
            </div>

            </form>


            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Browser: activate to sort column ascending">
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 90px;" aria-label="Platform(s): activate to sort column ascending">
                            下单时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="Engine version: activate to sort column ascending">
                            收货人
                        </th>
                         
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="Engine version: activate to sort column ascending">
                            总数量
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 35px;" aria-label="Engine version: activate to sort column ascending">
                            总金额
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                            订单状态
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 130px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    
                    @foreach($res as $k => $v)
                    <tr class="@if($k % 2 == 0)odd @else even @endif">
                        <td class="">
                            {{$v->ord}}
                        </td>
                        <td class=" ">
                            {{date('Y年m月d日', $v->addtime)}}
                        </td>
                        @php
                        $re = DB::table('addr_message')->where('user_id',$v->uid)->where('moren','1')->get();
                        
                        @endphp
						@foreach ($re as $vs)
                        <td class=" ">
                            {{$vs->dname}}
                        </td>
                        
                        @endforeach
                        @php
                        $zong = DB::table('ord_goods')->where('oid',$v->oid)->pluck('o_gmsl');
                        $a = 0;
                        foreach($zong as $k=>$vs){
							$a +=$vs;
                    	}
                        @endphp
                        <td class=" ">
                            {{$a}}
                        </td>
                        
                        <td class=" ">
                            {{$v->snum}} 元
                        </td>
                        <td class="statu" oid="{{$v->oid}}" status='{{$v->ostatus}}'>
                        	@if($v->ostatus == '0') 待发货
                        	@elseif($v->ostatus == '1') 已发货
                        	@elseif($v->ostatus == '2') 交易完成
                        	@endif
                        </td>
                         <td class=" ">
                            <a class='btn btn-primary' href="/admin/xiangqing/{{$v->oid}}">订单详情</a>
                            @if($v->ostatus==0)
                            <button  class='btn btn-danger fahuo'>发货</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                  
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                分页
            </div>

            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                
                {{$res->appends($request->all())->links()}}
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
	// console.log('liziyuedashuaige');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	
	$('.fahuo').click(function(){
		var sta = $(this).parents('tr').find('.statu').attr('status');
		var oid = $(this).parents('tr').find('.statu').attr('oid');
		if(sta == '0'){
			var status = $(this).parents('tr').find('.statu');
			status.html('已发货');
			$(this).remove();

			$.post('/admin/status',{oid:oid},function(data){
				
	            
	        })
		}
	})
</script>

@stop
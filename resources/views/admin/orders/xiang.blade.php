@extends('layout.admins')

@section('title',$title)

@section('content')
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

            

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="Browser: activate to sort column ascending">
                            商品名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">
                            价格
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">
                            颜色
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            规格
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            购买数量
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            小计
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    
                    @foreach($res as $k => $v)
                    <tr class="@if($k % 2 == 0)odd @else even @endif">
                        <td valign="middle" align='center' class="">
                            {{$v->o_gname}}
                        </td>
                        
                        <td valign="middle" align='center' class=" ">
                            {{$v->o_price}}
                        </td>
                        <td valign="middle" align='center' class=" ">
                            {{$v->o_color}}
                        </td>
                        <td valign="middle" align='center' class=" ">
                            {{$v->o_size}}
                        </td>
                        <td valign="middle" align='center' class=" ">
                            {{$v->o_gmsl}}
                        </td>
                        <td valign="middle" align='center' class=" ">
                        	{{$v->o_xiaoji}}
                        </td>
                    </tr>
                    @endforeach

                  
                </tbody>

            </table><button style="margin:20px;"  class='btn btn-danger' onclick="history.go(-1)">返回</button>
            

            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                
                {{$res->appends($request->all())->links()}}
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
	
</script>

@stop
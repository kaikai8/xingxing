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

            <form action="/admin/goods" method='get'>
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
                    商品名:
                    <input type="text" name='gname' value='{{$request->gname}}' aria-controls="DataTables_Table_1">
                    
                </label>

                <label>
                    价格:
                    <input type="text" name='price' value='{{$request->price}}' aria-controls="DataTables_Table_1">
                    
                </label>

                <button class='btn btn-info'>搜索</button>
            </div>

            </form>


            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 30px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
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
                        rowspan="1" colspan="1" style="width: 35px;" aria-label="Engine version: activate to sort column ascending">
                            库存
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 35px;" aria-label="CSS grade: activate to sort column ascending">
                            状态
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
                            {{$v->gid}}
                        </td>
                        <td class=" ">
                            {{$v->gname}}
                        </td>
                        <td class=" ">
                            {{$v->price}}
                        </td>
                        <td class=" ">
                            {{$v->color}}
                        </td>
                        <td class=" ">
                            {{$v->size}}
                        </td>
                        <td class=" ">
                            {{$v->gnum}}
                        </td>
                        <td class=" ">
                           
                            @if($v->status == 0)
                                上架
                            @elseif($v->status == 1)
                                下架
                            @else
                                热销
                            @endif
                        </td>
                         <td class=" ">
                            <a class='btn btn-primary' href="/admin/goods/{{$v->gid}}/edit">修改</a>

                            <form action="/admin/goods/{{$v->gid}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                                <button class='btn btn-danger'>删除</button>

                            </form>

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
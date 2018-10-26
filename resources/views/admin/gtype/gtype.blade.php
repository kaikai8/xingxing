@extends('layout.admins')


@section('title',$title)

@section('content')
@if (!empty(session('success')))
    <div class="mws-form-message error">
        <ul>
            <li>{{session('success')}}</li>
        </ul>
    </div>
@endif
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

        	<form action="/admin/gtype" method='get'>
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                        <option value="10" @if($request->num == 10)  selected="selected"  @endif >
                            10
                        </option>
                        <option value="25" @if($request->num == 25)  selected="selected"  @endif>
                            25
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
                    分类名:
                    <input type="text" name='tname' value='{{$request->tname}}' aria-controls="DataTables_Table_1">
                    
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
                            tid
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 160px;" aria-label="Browser: activate to sort column ascending">
                            分类名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="Browser: activate to sort column ascending">
                            pid
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 130px;" aria-label="Browser: activate to sort column ascending">
                            path
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 197px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					
					@foreach($res as $k => $v)
                    <tr class="@if($k % 2 == 0)odd @else even @endif">
                        <td class="">
                            {{$v->tid}}
                        </td>
                        <td class="">
                            {{$v->tname}}
                        </td>
                        <td class="">
                            {{$v->pid}}
                        </td>
                        <td class="">
                            {{$v->path}}
                        </td>
                       
                     
                         <td class=" ">
                            <a class='btn btn-primary' href="/admin/gtype/{{$v->tid}}/edit">修改</a>
                            <a class='btn btn-primary' href="/admin/add/{{$v->tid}}">添加子分类</a>

                            <form action="/admin/gtype/{{$v->tid}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                                <button class='btn btn-danger'onclick="return confirm('确认要删除吗?');" >删除</button>

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

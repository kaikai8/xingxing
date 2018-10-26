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

            <form action="/admin/guanggao" method='get'>
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                        <option value="5" @if($request->num == 5)  selected="selected"  @endif >
                            5
                        </option>
                        <option value="10" @if($request->num == 10)  selected="selected"  @endif>
                            10
                        </option>
                        <option value="15" @if($request->num == 15)  selected="selected"  @endif>
                            15
                        </option>
                       
                    </select>
                    条数据
                </label>
            </div>
           <div class="dataTables_filter" id="DataTables_Table_1_filter">
               <label>
                   状态:
                   <input type="text" name='auth' value='{{$request->auth}}' aria-controls="DataTables_Table_1">
                   
               </label>
           
               <button class='btn btn-info'>搜索</button>
           </div>

            </form>


            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>

                         <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            广告名
                        </th>

                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            链接
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Browser: activate to sort column ascending">
                            广告图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
                            操作
                        </th>
                       
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($rs as $k => $v)
                    <tr class="@if($k % 2 == 0)odd @else even @endif">
                        <td class="" style = "text-align:center">
                            {{$v->aid}}
                        </td>

                        <td class="" style = "text-align:center">
                            {{$v->aname}}
                        </td>

                        <td class="" style = "text-align:center">
                            {{$v->src}}
                        </td>

                        <td class=" " style = "text-align:center">
                           
                            <img src="{{$v->a_profile}}" alt="" width="100" height="50">
                        </td>

                        <td class=" " style = "text-align:center">
                            
                            @if($v->auth == 1)
                                启用
                            @elseif($v->auth == 0)
                                禁用
                            
                            @endif

                        </td>
                         <td class=" " style = "text-align:center">
                            <a class='btn btn-primary' href="/admin/guanggao/{{$v->aid}}/edit">修改</a>

                            <form action="/admin/guanggao/{{$v->aid}}" method='post' style='display:inline'>
                                
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
                
                {{$rs->appends($request->all())->links()}}
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
$('.mws-form-message').delay(3000).fadeOut(2000);
</script>
@stop
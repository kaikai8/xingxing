@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
     <div class="mws-panel-header">
     <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
     <form action="/admin/gtype/{{$re->tid}}" method='post' class="mws-form">
          <div class="mws-form-inline">
               <div class="mws-form-row">
                    <label class="mws-form-label">分类名</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name='tname' value="{{$re->tname}}">
                    </div>
               </div>
               
               <div class="mws-form-row">
                    <label class="mws-form-label">父级分类</label>
                    <div class="mws-form-item">
                         <select class="small" name='pid'>
                              <option value='0'>请选择</option>
                              @foreach($res as $k => $v)
                              @if($v->tid == $re->pid)
                              <option value='{{$v->tid}}'>{{$v->tname}}</option>
                              @endif
                              @endforeach
                              
                         </select>
                    </div>
               </div>
               
          </div>
          
            {{csrf_field()}}
            {{method_field('PUT')}}
            <button class='btn btn-danger'>修改</button>
     </form>
    </div>     
</div>
@stop
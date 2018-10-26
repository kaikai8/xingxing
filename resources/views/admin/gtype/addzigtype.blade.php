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
<div class="mws-panel grid_8">
     <div class="mws-panel-header">
     <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
     <form action="/admin/gtypezi" method='post' class="mws-form">
          <div class="mws-form-inline">
               <div class="mws-form-row">
                    
                    <label class="mws-form-label">父级分类</label>
                    <input type="hidden" class="small" name='pid' value='{{$id}}'>
                    <div class="mws-form-item">
                         {{$res[0]}}
                    </div>
               </div>
               
               <div class="mws-form-row">
                    <label class="mws-form-label">子分类</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name='tname'>
                    </div>
               </div>
               
          </div>
          <div class="mws-button-row">

               {{csrf_field()}}
               <input type="submit" class="btn btn-info" value="添加">
               
          </div>
     </form>
    </div>     
</div>
@stop
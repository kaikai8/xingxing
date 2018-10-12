@extends('layout.admins')

@section('title', $title)

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

		@if (count($errors) > 0)
		    <div class="mws-form-message error">
	        	错误信息
	            <ul>
	            	@foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
	            </ul>
	        </div>
		@endif


    	<form action="/admin/adminUser/{{$res->guid}}" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='guname' value='{{$res->guname}}'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">性别</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><label><input type="radio" name='gsex' value='1'  @if($res->gsex == 1) checked='checked' @endif> 男</label></li>
    						<li><label><input type="radio" name='gsex' value='2'  @if($res->gsex == 2) checked='checked' @endif>女</label></li>
    						
    					</ul>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='gphone' value='{{$res->gphone}}'>
    				</div>
    			</div>

    			

    			<div class="mws-form-row">
                	<label class="mws-form-label">头像</label>
                	<div class="mws-form-item">
                		<img src="{{$res->profile}}" alt="" width='100px'>
                    	<div style="position: relative;" class="fileinput-holder"><input type="file" name='profile' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;"></div>
                    </div>
                </div>
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">权限</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><label><input type="radio" name='auth' value='1'  @if($res->auth == 1) checked='checked' @endif> 超级管理员</label></li>
    						<li><label><input type="radio" name='auth' value='2'  @if($res->auth == 2) checked='checked' @endif> 高级管理员</label></li>
    						<li><label><input type="radio" name='auth' value='3'  @if($res->auth == 3) checked='checked' @endif> 普通管理员</label></li>
    					
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			{{csrf_field()}}
    			{{method_field('PUT')}}
    			<input type="submit" class="btn btn-primary" value="修改">
    			
    			
    		</div>
    	</form>
    </div>    	
</div>
@stop

@section('js')
<script>
	/*setTimeout(function(){

		$('.mws-form-message').fadeOut(2000);

	},5000)*/

	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>

@stop

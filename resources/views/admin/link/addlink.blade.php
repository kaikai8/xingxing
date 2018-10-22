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


    	<form action="/admin/link" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label">链接名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='link_name'>
                    </div>
                </div>
    			
    			
                <div class="mws-form-row">
                    <label class="mws-form-label">链接</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='link_src'>
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">权限</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><label><input type="radio" name='link_auth' value='1' checked='checked'>启用</label></li>
    						<li><label><input type="radio" name='link_auth' value='0'>禁用</label></li>
    						
    					
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			{{csrf_field()}}
    			<input type="submit" class="btn btn-primary" value="添加">
    			
    			
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

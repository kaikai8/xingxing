@extends('layout.admins')

@section('title', $title)

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


    	<form action="/admin/goods" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名</label>
                    <div class="mws-form-item">
                        <select class="small" name='tid'>
                            <option value='0'>请选择</option>

                            @foreach($res as $k => $v)
                            <option value='{{$v->tid}}'>{{$v->tname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">商品名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='gname'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">价格</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='price'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">规格</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='size'>
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">颜色</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='color'>
                    </div>
                </div>

    			<div class="mws-form-row">
                    <label class="mws-form-label">库存</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='gnum'>
                    </div>
                </div>
    				
    			<div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                        <div style="position: relative;" class="fileinput-holder">

                            <input type="file" name='pic_name[]' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                        </div>
                    </div>
                </div>
    			
                <div class="mws-form-row">
                    <label class="mws-form-label">描述</label>
                    <div class="mws-form-item">
                        <script name="descr" id="editor" type="text/plain" style="width:650px;height:400px;"></script>
                    </div>
                </div>


    			<div class="mws-form-row">
    				<label class="mws-form-label">商品状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><label><input type="radio" name='status' value='0' checked='checked'> 上架</label></li>
    						<li><label><input type="radio" name='status' value='1'> 下架</label></li>
                            <li><label><input type="radio" name='status' value='2'> 热销</label></li>
        					
    					</ul>
    				</div>
    			</div>
    		</div>
            <input hidden type="text" class="small" name='addtime' value="{{time()}}">
    		<div class="mws-button-row">
    			{{csrf_field()}}
    			<input type="submit" class="btn btn-primary" value="添加">
    		</div>
    	</form>
    </div>    	
</div>
@stop

@section('js')

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    $('.mws-form-message').fadeOut(5000);
</script>
@stop

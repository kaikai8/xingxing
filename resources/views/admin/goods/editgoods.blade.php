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

        <form action="/admin/goods/{{$res->gid}}" method='post' enctype='multipart/form-data' class="mws-form">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名</label>
                    <div class="mws-form-item">
                        <select class="small" name='tid' readonly>
                            @foreach($re as $k => $v)

                            @if($v->tid == $res->tid)

                            <option value='{{$v->tid}}' selected >{{$v->tname}}</option>

                            @endif

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='gname' value="{{$res->gname}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">价格</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='price' value='{{$res->price}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">颜色</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='color' value="{{$res->color}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">尺码</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='size' value='{{$res->size}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">库存</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='gnum' value="{{$res->gnum}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                        <div style="position: relative;" class="fileinput-holder">
                            <!-- 商品图片 -->
                            @foreach($gimg as $k=>$v)
                            <img src="{{$v->pic_name}}" alt="" class='gmg' width='150px' gid='{{$v->pid}}'>
                            @endforeach

                            <input type="file" name='pic_name[]' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                        </div>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品详情</label>
                    <div class="mws-form-item">
                        <script id="editor" name='descr' type="text/plain" style="width:800px;height:400px;">{!!$res->descr!!}</script>
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">商品状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><label><input type="radio" name='status' value='1' @if($res->status=='1') checked='checked' @endif> 上架</label></li>
                            <li><label><input type="radio" name='status' value='0' @if($res->status=='0') checked='checked' @endif> 下架</label></li>
                        
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

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

   
    $('.mws-form-message').delay(3000).fadeOut(2000);


    //删除图片
    $('.gmg').each(function(){
        $(this).click(function(){
            var gid = $(this).attr('gid');

            var imgs = $(this);

            $.get('/admin/goods/'+gid,{},function(data){
               
                if(data == '1'){

                    imgs.remove();
                }
            })
        })
    });
</script>

@stop

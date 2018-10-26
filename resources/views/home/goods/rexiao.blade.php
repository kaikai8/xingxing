@extends('layout.homes')
@section('title',$title)
@section('content')
<div class="row">
	@if (!empty(session('success')))
	    <div class="mws-form-message error">
	    	
	        <ul>
	        	
	                <li>{{session('success')}}</li>
	            
	        </ul>
	    </div>
	@endif
	<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="post-6 page type-page status-publish hentry">
			<div class="entry-content">
				<div class="entry-summary">
					<div class="vc_row wpb_row vc_row-fluid">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_raw_code wpb_content_element wpb_raw_html wrap-map2">
										<div class="wpb_wrapper">
											<div class="show-map">
												<div class="responsive-container">
													<div class="row">
														
														
														@foreach($re as $v)
														@php
														$gpic = DB::table('goodspicture')->where('gid',$v->gid)->pluck('pic_name');
														@endphp
														
														<div class="item col-lg3 col-md-3 col-sm-6">
															<a href="/home/goods/{{$v->gid}}">
																<div class="image">
																	<img width="200" src="{{$gpic[0]}}" alt="map1" title="{{$v->gname}}">
																	
																</div>
																
																<div class="des"><h5><b>{{$v->gname}}</b></h5><b>{{$v->price}} 元</b></div>

															</a>
														</div>
														@endforeach
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					 	</div>
				  	</div>
			   </div>
			</div>
		</div>
	</div>
	<div style="margin-left: 444px" class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                
                {!! $re->render() !!}
            </div>
</div>
@stop
@section('js')
<script>
	$('.mws-form-message').fadeOut(5000);
</script>
@stop

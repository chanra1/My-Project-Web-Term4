@extends('backend.master')
@section('contain')
<div class="container-fluid">
	<div class="row">
		@if ( Session::has('message'))
		<div class="alert alert-success alert-dismissable fade in">
			<a href="#" class="close" data-dismiss= "alert">&times;</a>
			{{ Session('message') }}
		</div>
		@endif
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Add New Page</h1>
		</div>
		<div class="col-ms-12">
		</div>
		<div class="col-sm-12">
			<div class="row">
				<form method="post" action="{{ asset('/admin/pages/update') }}/{{ $pages->pageid }}" enctype="multipart/form-data" >
					@csrf
					<input type="hidden" name="tbl" value="{{ encrypt('posts') }}">
					<input type="hidden" name="pageid" value="{{ $pages->pageid }}">
					<div class="col-sm-9">
						<div class="form-group">
							<input type="text" name="title" id="post_title" class="form-control" placeholder="Enter title here" value="{{ $pages->title }}">
            			</div>
            			<div class="form-group">
							<input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug here" value="{{ $pages->slug }}">
						</div>
						<div class="form-group">
							<textarea class="form-control" name="description" rows="15" >{!! $pages->description !!}</textarea>
							<div class="col-sm-12 word-count">Word count: 0</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="content publish-box">
							<h4>Publish  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>
							<div class="form-group">
								<button class="btn btn-default" name="status" value="draft">Save Draft</button>
							</div>
							<p>Status: Draft <a href="#">Edit</a></p>
							<p>Visibility: Public <a href="#">Edit</a></p>
							<p>Publish: Immediately <a href="#">Edit</a></p>
							<div class="row">
								<div class="col-sm-12 main-button">
									<button class="btn btn-primary pull-right" name="status" value="publish">Update page</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@stop

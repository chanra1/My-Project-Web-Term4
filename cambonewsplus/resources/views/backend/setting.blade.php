@extends('backend.master')
@section('contain')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Setting</h1>
		</div>
		<div class="col-sm-4 cat-form">
			@if ( Session::has('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss= "alert">&times;</a>
				{{ Session('message') }}
			</div>
			@endif
			<h3>Website Setting</h3>
			@if (!$data)
				<form method="post" action="{{ asset('/admin/setting/store') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="tbl" value="{{ encrypt('settings') }}">
					<div class="form-group">
						<label>Logo</label>
						<p><img id="output" /></p>
						<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
						<p><label for="file" style="cursor: pointer;"  class="btn btn-warning">Upload Image</label></p>
					</div>
					<div class="form-group">
						<label> About Us</label>
						<textarea name="about" class="form-control" rows="6"></textarea>
					</div>
					<div id="socialFieldGroup">
						<div class="form-group">
							<label>Social</label>
							<input type="url" name="social[]"  class="form-control" >
							<p>Example: https://www.facebook.com/</p>
						</div>
					</div>
					<div class="text-right form-group">
						<span class="btn btn-warning" id="addSocialField"><i class="fas fa-plus"></i></span>
					</div>
					<div class="from-group">
						<div class="alert alert-danger alert-dismissable noshow" id="socailAlert">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Sorry !</strong> You're reached social fields limit.
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Add Setting</button>
					</div>
				</form>
				<script>
					var socialCounter = 1;
						$('#addSocialField').click(function() {
							socialCounter++;
							if (socialCounter > 5) {
								$('#socailAlert').removeClass('noshow');
								return;
							}
							newDiv = $(document.createElement('div')).attr('class','from-group');
							newDiv.after().html('<div class="form-group"> <input type="url" name="social[]"  class="form-control"> </div>');
							newDiv.appendTo("#socialFieldGroup");
						})
				</script>
			@else
				<form method="post" action="{{ asset('/admin/setting/update') }}/{{ $data->sid }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="tbl" value="{{ encrypt('settings') }}">
					<input type="hidden" name="sid" value="{{ $data->sid }}">
					<div class="form-group">
						<label>Logo</label>
						@if (!empty($data->image))
							<p><img id="output" src="{{asset('images/'.$data->image)}}" alt="Image" class="img-responsive" width="100"></p>
							<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
							<p><label class="btn btn-warning" for="file" style="cursor: pointer;">Replace Image</label></p>
						@else
							<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
							<p><label for="file" style="cursor: pointer;">Upload Image</label></p>
							<p><img id="output" width="200" /></p>
						@endif
					</div>
					<div class="form-group">
						<label> About Us</label>
						<textarea name="about" class="form-control" rows="6">{{ $data->about }}</textarea>
					</div>
					<div id="socialFieldGroup">
						<div class="form-group">
							<label>Social</label>
							@foreach ($data->social as $social)
							<div class="form-group">
								<input type="url" name="social[]"  class="form-control socialCount" value="{{ $social }}">
							</div>
							@endforeach
							<p>Example: https://www.facebook.com/</p>
						</div>
					</div>
					<div class="text-right form-group">
						<span class="btn btn-warning" id="addSocialField"><i class="fas fa-plus"></i></span>
					</div>
					<div class="from-group">
						<div class="alert alert-danger alert-dismissable noshow" id="socailAlert">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Sorry !</strong> You're reached social fields limit.
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Update Setting</button>
					</div>
				</form>
				<script>
					socialCounter = $('.socialCount').length;
						$('#addSocialField').click(function() {
							socialCounter++;
							if (socialCounter > 5) {
								$('#socailAlert').removeClass('noshow');
								return;
							}
							newDiv = $(document.createElement('div')).attr('class','from-group');
							newDiv.after().html('<div class="form-group"> <input type="url" name="social[]"  class="form-control"> </div>');
							newDiv.appendTo("#socialFieldGroup");
						})
				</script>
			@endif
		</div>
	</div>
</div>
<style>
	.noshow {
		display: none;
	}
</style>
<script>
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection

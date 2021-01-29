@extends('frontend.master')
@section('title')
<title>{{ $data->title }} |CAMBO NEWS</title>
@endsection
@section('container')
	<div class="wrapper">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8" style="border:1px solid #ccc;" style="padding:15px 15px 30px 0px;">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;" >
					<div class="col-md-12">
						<h1 class="text-uppercase">{{ $data->title }}</h1>
						<p style="font-size: 20px;">{!! $data->description !!}</p>
					</div>
				</div>
			</div>

<!-- right section -->
			<div class="col-md-4" ">
				<div class="col-md-12" style="padding:15px;" >
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">LASTES NEWS</span></h3>
					@foreach ($lastes->take(6) as $l)
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<a href="{{ asset('article') }}/{{ $l->slug }}"><img src="{{ asset('images/'.$l->image) }}" width="100%" height="120px" style="margin-left:-15px;" /></a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4><a href="{{ asset('article') }}/{{ $l->slug }}">{{ $l->title }}</a></h4>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	@endsection

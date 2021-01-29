@extends('frontend.master')
@section('title')
	<title>{{ $cat->title }} |CAMBO NEWS</title>
@endsection
@section('container')
	<div class="wrapper">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="border:1px solid #ccc;" style="padding:15px 15px 30px 0px;" >
					<div class="col-md-12">
						<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;  text-transform: uppercase;">{{ $cat->title }}</span></h3>
					</div>
					@if (count($posts) > 0)
					<div class="col-md-12">
						@foreach ($posts as $key=>$post)
						@if ($key == 0)
						<a href="{{ asset('article') }}/{{ $post->slug }}"><img src="{{ asset('images/'.$post->image) }}" width="100%" height="500px" style="margin-bottom:15px;" /></a>
						<h3><a href="{{ asset('article') }}/{{ $post->slug }}">{{ $post->title }} &raquo;</a></h3>
						<p>{!! substr($post->description,0,300) !!}</p>
						<a href="{{ asset('article') }}/{{ $post->slug }}">Read more &raquo;</a>
						@endif
						@endforeach
					</div>
					<div class="row">
						@foreach ($posts as $key=>$post)
						@if ($key > 0 && $key <3)
						<div class="col-md-6">
							<a href="{{ asset('article') }}/{{ $post->slug }}"><img src="{{ asset('images/'.$post->image) }}" width="100%" height="250px" style="margin-bottom:15px;" /></a>
							<h3><a href="{{ asset('article') }}/{{ $post->slug }}">{!! substr($post->title,0,100) !!}</a></h3>
							<p>{!! substr($post->description,0,200) !!}</p>
							<a href="{{ asset('article') }}/{{ $post->slug }}">Read more </a>
						</div>
						@endif
						@endforeach
					</div>
                        <div class="row">
                            @foreach ($posts as $key=>$post)
                                @if ($key > 2 && $key <5)
                                    <div class="col-md-6">
                                        <a href="{{ asset('article') }}/{{ $post->slug }}"><img src="{{ asset('images/'.$post->image) }}" width="100%" height="250px" style="margin-bottom:15px;" /></a>
                                        <h3><a href="{{ asset('article') }}/{{ $post->slug }}">{!! substr($post->title,0,100) !!}</a></h3>
                                        <p>{!! substr($post->description,0,200) !!}</p>
                                        <a href="{{ asset('article') }}/{{ $post->slug }}">Read more </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
					@endif
				</div>
			</div>

<!-- right section -->
            <div class="col-md-4">
                <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 7px 15px; margin-top:30px;">
                    <div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
                        <div class="col-ms-12">
                            <h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">LAST NEWS</span></h3>
                        </div>
                        @foreach ($lastes as $key=>$l)
                            @if ($key == 0)
                            <a href="{{ asset('article') }}/{{ $l->slug }}"><img src="{{ asset('images/'.$l->image) }}" width="100%" height="300px" style="margin-bottom:15px;" /></a>
                                <h3><a href="{{ asset('article') }}/{{ $l->slug }}">{{ $l->title }}</a></h3>
                                <p > {!! substr($l->description,0,300 ) !!}</p> <a href="{{ asset('article') }}/{{ $l->slug }}">Read more &raquo;</a>
                            @endif
                        @endforeach
                    </div>
                    @foreach ($lastes as $key=>$l)
                    @if ($key >0 && $key <7)
                        <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                            <div class="col-md-4">
                                <div class="row">
                                    <a href="{{ asset('article') }}/{{ $l->slug }}"><img src="{{ asset('images/'.$l->image) }}" width="100%" height="120px" style="margin-left:-15px;" /></a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row" style="padding-left:0px;">
                                    <h4><a href="{{ asset('article') }}/{{ $l->slug }}">{{ $l->title }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
	@endsection

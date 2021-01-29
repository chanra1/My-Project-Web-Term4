@extends('frontend.master')
@section('container')

<div class="wrapper">
	@if (count($featured) > 0)
	<div class="row">
		@foreach ($featured as $key=>$f)
		@if ($key == 0)
		<div class="col-md-6">
			<div class="relative">
				<a href="{{ asset('article') }}/{{ $f->slug }}"><img src="{{ asset('images/'.$f->image) }}" alt="{{ $f->image}}" width="100%" height="700px" />
				<h2><span class="caption">{!! substr($f->title,0,150) !!} </span></h2></a>
			</div>
		</div>
		@endif
		@endforeach
    	<div class="col-md-6">
    		<div class="row">
				@foreach ($featured as $key=>$f)
				@if ($key > 0 && $key <3)
        		<div class="col-md-6">
        	    	<div class="relative">
						<a href="{{ asset('article') }}/{{ $f->slug }}"><img src="{{ asset('images/'.$f->image) }}"  width="100%" height="328px" />
						<h3><span class="caption">{!! substr($f->title,0,140) !!} </span></h3></a>
                    </div>
				</div>
				@endif
				@endforeach
        	</div>
			<div class="row" style="margin-top:30px;">
				@foreach ($featured as $key=>$f)
				@if ($key > 2 && $key <5)
        		<div class="col-md-6">
        	    	<div class="relative">
						<a href="{{ asset('article') }}/{{ $f->slug }}"><img src="{{ asset('images/'.$f->image) }}" alt="{{ $f->image}}" width="100%" height="328px" />
						<h3><span class="caption">{!! substr($f->title,0,120) !!}</span></h3></a>
                    </div>
				</div>
				@endif
				@endforeach
        	</div>
    	</div>
	</div>
    <div class="row" style="margin-top:30px;">
    	<div class="col-md-8">
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
				<div class="col-md-12">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">NEWS</span></h3>
				</div>
				<div class="col-md-6">
					@foreach ($general as $key=>$g)
					@if ($key == 0)
					<a href="{{ asset('article') }}/{{ $g->slug }}"><img src="{{ asset('images/'.$g->image) }}" width="100%" style="margin-bottom:15px;" /></a>
						<h3><a href="{{ asset('article') }}/{{ $g->slug }}">{{ $g->title }}</a></h3>
						<p > {!! substr($g->description,0,500 ) !!}</p> <a href="{{ asset('article') }}/{{ $g->slug }}">Read more &raquo;</a>
					@endif
					@endforeach
					</div>
				<div class="col-md-6">
					@foreach ($general as $key=>$g)
					@if ($key >0 && $key < 5)
					<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<a href="{{ asset('article') }}/{{ $g->slug }}"><img src="{{ asset('images/'.$g->image) }}" width="100%" height="120px" /></a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<h4> <a href="{{ asset('article') }}/{{ $g->slug }}">{{ $g->title }} </a></h4>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
	        <div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">BUSINESS</span></h3>
				<div class="flex">
				@foreach ($business->take(5) as $b)
					<div> <a href="{{ asset('article') }}/{{ $b->slug }}"> <img src="{{ asset('images/'.$b->image) }}"width="100%" height="150px" /> </a></div>
				@endforeach
				</div>
	        </div>
        <div class="row">
        	<div class="col-md-6">
				<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
					<h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">SPORTS</span></h3>
					@foreach ($sports as $key=>$s)
					@if ($key == 0)
					<a href="{{ asset('article') }}/{{ $s->slug }}"><img src="{{ asset('images/'.$s->image) }}" width="100%" height="200px" style="margin-bottom:15px;" /></a>
						<h3><a href="{{ asset('article') }}/{{ $s->slug }}">{{ $s->title }}</a></h3>
						<p > {!! substr($s->description,0,300 ) !!}</p> <a href="{{ asset('article') }}/{{ $s->slug }}">Read more &raquo;</a>
					@endif
					@endforeach
				</div>
				@foreach ($sports as $key=>$s)
				@if ($key > 0 && $key < 5)
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row fashion">
								<a href="{{ asset('article') }}/{{ $s->slug }}"><img src="{{ asset('images/'.$s->image) }}" width="100%" height="115px" /></a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<h4><a href="{{ asset('article') }}/{{ $s->slug }}">{{ $s->title }} </a></h4>
							</div>
						</div>
					</div>
				@endif
				@endforeach
				</div>
			</div>
        	<div class="col-md-6">
				<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
						<h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">TECHNOLOGY</span></h3>
						@foreach ($technology as $key=>$t)
						@if ($key == 0)
						<a href="{{ asset('article') }}/{{ $t->slug }}"><img src="{{ asset('images/'.$t->image) }}" width="100%" height="200px" style="margin-bottom:15px;" /></a>
							<h3><a href="{{ asset('article') }}/{{ $t->slug }}">{{ $g->title }}</a></h3>
							<p > {!! substr($t->description,0,200 ) !!}</p> <a href="{{ asset('article') }}/{{ $g->slug }}">Read more &raquo;</a>
					</div>
					@endif
					@endforeach

                    @foreach ($technology as $key=>$t)
                    @if ($key >0 && $key < 5)
                        <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                            <div class="col-md-4">
                                <div class="row fashion">
                                    <a href="{{ asset('article') }}/{{ $t->slug }}"><img src="{{ asset('images/'.$t->image) }}" width="100%" height="120px"/></a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row" style="padding-left:0px;">
                                    <h4><a href="{{ asset('article') }}/{{ $t->slug }}">{{ $t->title }} </a></h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
			<div class="col-md-12">
				<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
				<div class="col-md-12">
					<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
				</div>
				<div class="col-md-6">
					@foreach ($health as $key=>$h)
					@if ($key == 0)
					<a href="{{ asset('article') }}/{{ $h->slug }}"><img src="{{ asset('images/'.$h->image) }}" width="100%" height="250px" style="margin-bottom:15px;" /></a>
						<h3><a href="{{ asset('article') }}/{{ $h->slug }}">{{ $h->title }}</a></h3>
						<p > {!! substr($h->description,0,500 ) !!}</p> <a href="{{ asset('article') }}/{{ $g->slug }}">Read more &raquo;</a>
					@endif
					@endforeach
				</div>
				<div class="col-md-6">
					@foreach ($health as $key=>$h)
					@if ($key >0 && $key < 5)
					<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
								<a href="{{ asset('article') }}/{{ $h->slug }}"><img src="{{ asset('images/'.$h->image) }}" width="100%" height="120px" /></a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<h4> <a href="{{ asset('article') }}/{{ $h->slug }}">{{ $h->title }} </a></h4>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
            <div class="col-md-12">
                <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
                    <div class="col-md-12">
                    <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">ENTERTAINMENT</span></h3>
                    </div>
                    <div class="col-md-6">
                        @foreach ($entertainment as $key=>$e)
                        @if ($key == 0)
                        <a href="{{ asset('article') }}/{{ $e->slug }}"><img src="{{ asset('images/'.$e->image) }}" width="100%" height="250px" style="margin-bottom:15px;" /></a>
                            <h3><a href="{{ asset('article') }}/{{ $e->slug }}">{{ $e->title }}</a></h3>
                            <p > {!! substr($e->description,0,500 ) !!}</p> <a href="{{ asset('article') }}/{{ $e->slug }}">Read more &raquo;</a>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        @foreach ($entertainment as $key=>$e)
                        @if ($key >0 && $key < 5)
                        <div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                            <div class="col-md-4">
                                <div class="row">
                                    <img src="{{ asset('images/'.$e->image) }}" width="100%" height="120px" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <h4> <a href="{{ asset('article') }}/{{ $e->slug }}">{{ $e->title }} </a></h4>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
	    </div>
	</div>
	{{-- right ====================================================================== --}}
    <div class="col-md-4">
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 7px 15px; margin-top:30px;">
			<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
				<div class="col-ms-12">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">POLITICS</span></h3>
				</div>
				@foreach ($politics as $key=>$p)
					@if ($key == 0)
					<a href="{{ asset('article') }}/{{ $p->slug }}"><img src="{{ asset('images/'.$p->image) }}" width="100%" height="200px" style="margin-bottom:15px;" /></a>
						<h3><a href="{{ asset('article') }}/{{ $p->slug }}">{{ $p->title }}</a></h3>
						<p > {!! substr($p->description,0,300 ) !!}</p> <a href="{{ asset('article') }}/{{ $p->slug }}">Read more &raquo;</a>
					@endif
				@endforeach
			</div>
			@foreach ($politics as $key=>$p)
			@if ($key >0 && $key <6)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<a href="{{ asset('article') }}/{{ $p->slug }}"><img src="{{ asset('images/'.$p->image) }}" width="100%" height="105px" style="margin-left:-15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4><a href="{{ asset('article') }}/{{ $p->slug }}">{{ $p->title }}</a></h4>
                		</div>
                    </div>
				</div>
				@endif
				@endforeach
          </div>
         <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 7px 15px; margin-top:30px;">
			<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
				<div class="col-ms-12">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">TRAVEL</span></h3>
				</div>
				@foreach ($travel as $key=>$tra)
					@if ($key == 0)
					<a href="{{ asset('article') }}/{{ $tra->slug }}"><img src="{{ asset('images/'.$tra->image) }}" width="100%" height="200px" style="margin-bottom:15px;" /></a>
						<h3><a href="{{ asset('article') }}/{{ $tra->slug }}">{{ $tra->title }}</a></h3>
						<p > {!! substr($tra->description,0,300 ) !!}</p> <a href="{{ asset('article') }}/{{ $tra->slug }}">Read more &raquo;</a>
					@endif
				@endforeach
			</div>
			@foreach ($travel as $key=>$tra)
			@if ($key >0 && $key <6)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<a href="{{ asset('article') }}/{{ $tra->slug }}"><img src="{{ asset('images/'.$tra->image) }}" width="100%" height="105px" style="margin-left:-15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4><a href="{{ asset('article') }}/{{ $tra->slug }}">{{ $tra->title }}</a></h4>
                		</div>
                    </div>
				</div>
				@endif
				@endforeach
		</div>
		<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 7px 15px; margin-top:30px;">
			<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
				<div class="col-ms-12">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">STYLE</span></h3>
				</div>
				@foreach ($style as $key=>$st)
					@if ($key == 0)
					<a href="{{ asset('article') }}/{{ $st->slug }}"><img src="{{ asset('images/'.$st->image) }}" width="100%" height="200px" style="margin-bottom:15px;" /></a>
						<h3><a href="{{ asset('article') }}/{{ $st->slug }}">{{ $st->title }}</a></h3>
						<p > {!! substr($st->description,0,300 ) !!}</p> <a href="{{ asset('article') }}/{{ $st->slug }}">Read more &raquo;</a>
					@endif
				@endforeach
			</div>
			@foreach ($style as $key=>$st)
			@if ($key >0 && $key <6)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<a href="{{ asset('article') }}/{{ $st->slug }}"><img src="{{ asset('images/'.$st->image) }}" width="100%" height="105px" style="margin-left:-15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<h4><a href="{{ asset('article') }}/{{ $st->slug }}">{{ $st->title }}</a></h4>
                		</div>
                    </div>
				</div>
				@endif
				@endforeach
          </div>
        </div>
	</div>
	@endif
</div>
@endsection


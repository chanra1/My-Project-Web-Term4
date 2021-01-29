@extends('backend.master')
@section('contain')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i>Advertisings</h1>
        </div>

        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

		<div class="col-sm-4 cat-form">
			@if ( Session::has('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss= "alert">&times;</a>
				{{ Session('message') }}
			</div>
			@endif
			<h3>Edit Advertising</h3>
			<form method="post" action="{{ asset('/admin/advertising/update') }}/{{ $singledata->aid }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="tbl" value="{{ encrypt('advertisings') }}">
                <input type="hidden" name="aid" value="{{ $singledata->aid }}">

				<div class="form-group">
					<label>Company Name</label>
					<input type="text" name="company name" id="" class="form-control" value="{{ $singledata->company_name }}">
					<p>The name is how it appears on your site.</p>
                </div>

                <div class="content featured-image">
                    <h4>Featured Image <span class="pull-right"><i class="fas fa-chevron-down"></i></span></h4><hr>
                    @if ($singledata->image != '')
                        <p><img id="output" style="max-width: 100%" src="{{ asset('images/'.$singledata->image) }}" /></p>
                        <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                        <p><label for="file" style="cursor: pointer;"  class="btn btn-warning">Set Featured Image</label></p>
                    @else
                    <h4>Featured Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>
                    <p><img id="output" style="max-width: 100%" /></p>
                    <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    @endif
                </div>



				<div class="form-group">
					<button class="btn btn-primary">Update Advertising</button>
				</div>
			</form>
		</div>
		<div class="col-sm-8 cat-view">
			<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-3 col-sm-offset-4">
						<input type="text" id="search" class="form-control" placeholder="Search Category">
					</div>
			</div>
			<div class="content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th> Company Name</th>
							<th></th>
                            <th width="15%" class="text-right"> Action</th>
						</tr>
					</thead>
					<tbody>
						@if (count($data) > 0)
							@foreach ($data as $advertising)
								<tr>
                                    <td> {{ $advertising->company_name}}</td>
                                    <td> <img src="{{ asset('images/'.$advertising->image) }}" alt="" width="100"></td>

                                    <td width="15%">
                                        <td class="text-right">
                                            <form action="/admin/advertising/destroy/{{ $advertising->aid}}" method="post">
                                               <a class="btn btn-primary" href="{{ asset('/admin/advertising/edit') }}/{{ $advertising->aid }}"><i class="fas fa-edit"></i></a>
                                              @csrf
                                              <button class="btn btn-primary"  type="submit"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                       </td>
                                    </td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3">No data found</td>
							</tr>
						@endif
					</tbody>
				</table>
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
@endsection

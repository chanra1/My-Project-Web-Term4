@extends('backend.master')
@section('contain')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div>

		<div class="col-sm-4 cat-form">
			@if ( Session::has('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss= "alert">&times;</a>
				{{ Session('message') }}
			</div>
			@endif
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
			<h3>Add New Category</h3>
			<form method="post" action="{{ asset('/admin/category/store') }}">
				{{ csrf_field() }}
				<input type="hidden" name="tbl" value="{{ encrypt('categories') }}">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="title" id="category_name" class="form-control">
					<p>The name is how it appears on your site.</p>
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" id="slug" class="form-control" readonly="">
					<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
				</div>
				<div class="form-group">
					<label> Status</label>
					<select name="status" id ="status" class="form-control"  >
						<option >on</option>
						<option >off</option>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Add New Category</button>
				</div>
			</form>
		</div>
		<div class="col-sm-8 cat-view">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-3 col-sm-offset-4">
					<input type="text" id="search" name="search" class="form-control" placeholder="Search Category">
				</div>
			</div>
			<div class="content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th> Name</th>
							<th>Slug</th>
							<th>Status</th>
                            <th class="text-right">Action</th>
						</tr>
					</thead>
					<tbody>
						@if (count($data) > 0)
							@foreach ($data as $category)
								<tr>
									<td>{{ $category->title }}</td>
									<td>{{ $category->slug }}</td>
									<td>{{ $category->status }}</td>
                                    <td>
                                    <td>
                                        <form action="/admin/category/destroy/{{ $category->cid}}" method="post">
                                            <a class="btn btn-primary" href="{{ asset('/admin/category/edit') }}/{{ $category->cid }}"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            <button class="btn btn-primary"  type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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
@endsection

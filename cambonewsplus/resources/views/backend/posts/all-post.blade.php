@extends('backend.master')
@section('contain')
<div class="container-fluid">
  <div class="row">
    <div class="col-ms-12">
      @if ( Session::has('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss= "alert">&times;</a>
				{{ Session('message') }}
			</div>
      @endif
    </div>
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> All Posts <a href="{{ asset('/admin/posts/create') }}"> <button class="btn btn-sm btn-default">Add New</button></a> </h1>
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All({{ $allpost }}) | <a href="#">Published ({{ $publish }})</a>
      </div>
      <div class="col-sm-3">
        <input type="text" id="search" class="form-control" placeholder="Search Posts">
      </div>
    </div>
      <div class="clearfix"></div>
      <div class="filter-div">
          <div class="col-sm-12 text-right">
              {{ $posts->links() }}
          </div>
      </div>
    <div class="col-sm-12">
        <div class="content">
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th width="25%">Title</th>
                <th width="25%">Image</th>
                <th width="15%">category_id</th>
                <th width="15%">Status</th>
                <th width="10%">Date</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @if (count($posts) >0 )
                @foreach ($posts as $post)
                  <tr>
                    <td>{{$post->title}}</td>
                    <td> <p><img id="output" src="{{asset('images/'.$post->image)}}" alt="Image" class="img-responsive" width="75" height="50"></p></td>
                    <td>{{ $post->category_id }}</td>
                    <td>{{ $post->status }}</td>
                    <td>{{ $post->created_at }}</td>
                      <td>
                          <form action="/admin/posts/destroy/{{ $post->pid}}" method="post">
                              <a class="btn btn-primary" href="{{ asset('/admin/posts/edit') }}/{{ $post->pid }}"><i class="fas fa-edit"></i></a>
                              @csrf
                              <button class="btn btn-primary"  type="submit"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4"> No Posts Found</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    <div class="clearfix"></div>
      <div class="filter-div">
        <div class="col-sm-12 text-right">
          {{ $posts->links() }}
        </div>
      </div>
  </div>
</div>
@stop

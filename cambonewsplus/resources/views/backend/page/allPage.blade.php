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
      <h1><i class="fa fa-bars"></i> All Pages <a href="{{ asset('/admin/pages/create') }}"> <button class="btn btn-sm btn-default">Add New</button></a> </h1>
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All({{ $allpages }}) | <a href="#">Published ({{ $publish }})</a>
      </div>
      <div class="col-sm-3">
        <input type="text" id="search" class="form-control" placeholder="Search Posts">
      </div>
    </div>
      <div class="col-sm-12">
        <div class="content">
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th width="50%"> Title</th>
                <th width="15%">Status</th>
                <th width="10%">Date</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @if (count($pages) >0 )
                @foreach ($pages as $page)
                  <tr>
                    <td>
                      {{ $page->title }}
                    </td>
                    <td>{{ $page->status }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                          <a class="btn btn-primary" href="{{ asset('/admin/pages/edit') }}/{{ $page->pageid }}"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-primary" href="{{ asset('/admin/pages/destroy') }}/{{ $page->pageid }}"><i class="fas fa-trash-alt"></i></a>
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
    </form>
    <div class="clearfix"></div>
      <div class="filter-div">
        <div class="col-sm-12 text-right">
{{--          {{ $pages->links() }}--}}
        </div>
      </div>
  </div>
</div>
@stop

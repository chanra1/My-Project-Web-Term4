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
      <h1><i class="fa fa-bars"></i> All Messages</h1>
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All({{ count($messages) }}) |
      </div>
      <div class="col-sm-3">
        <input type="text" id="search" class="form-control" placeholder="Search Posts">
      </div>
    </div>
    <div class="clearfix"></div>
        <div class="col-sm-3 text-right">
          {{ $messages->links() }}
      </div>
      <div class="col-sm-12">
        <div class="content">
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>Sender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Messages</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if (count($messages) >0 )
                @foreach ($messages as $message)
                  <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email}}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{{ substr($message->message,0,100) }} <a href="#expand{{ $message->mid }}" data-toggle="modal">Expand</a> </td>
                    <td>{{ $message->created_at }}</td>
                    <td>
                        <form action="/admin/message/destroy/{{ $message->mid}}" method="post">
                            @csrf
                            <button class="btn btn-primary"  type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>

                      <div class="modal" id="expand{{ $message->mid }}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal">&times; </a>
                                <h4 class="modal-title">Send by: {{ $message->name }} on {{ $message->created_at }}</h4>
                              </div>
                              <div class="modal-body">
                                {{ $message->message }}
                              </div>
                              <div class="modal-footer">
                                <p>Send on : {{ $message->created_at }}</p>
                                <p>Phone : {{ $message->phone }}</p>
                                <p>Email : {{ $message->email }}</p>
                              </div>
                            </div>
                          </div>
                    </div>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center"> No message Found</td>
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
          {{ $messages->links() }}
        </div>
      </div>
  </div>
</div>
@stop

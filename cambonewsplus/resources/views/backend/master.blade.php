<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>CAMBO NEWS PLUS</title>
    <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/ionicons.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/adminstyle.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/app.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/script.js')}}"></script>
</head>
<body>

<div class="sidebar">
	<ul class="sidebar-menu">
		<li><a href="{{ asset('/backend/admin') }}" class="dashboard"><i class="fas fa-digital-tachograph"></i><span>Dashboard</span></a></li>
		<li class="treeview">
            <a href="#">
                <i class="fas fa-bookmark"></i> <span>Posts</span>
              <span class="pull-right-container">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ asset('/admin/posts/index') }}"><i class="fas fa-eye"></i>All Posts</a></li>
              <li><a href="{{ asset('/admin/posts/create') }}"><i class="fas fa-plus-circle"></i>Add Posts</a></li>
              <li><a href="{{ asset('/admin/category/index') }}"><i class="fas fa-plus-circle"></i>Categories</a></li>
              <li><a href="{{ asset('/admin/advertising/index') }}"><i class="fas fa-plus-circle"></i>Advertising</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fas fa-pager"></i> <span>Pages</span>
              <span class="pull-right-container">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ asset('/admin/pages/index') }}"><i class="fas fa-eye"></i>All Pages</a></li>
              <li><a href="{{ asset('/admin/pages/create') }}"><i class="fas fa-plus-circle"></i>Add Pages</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="{{ asset('/admin/message/index') }}">
              <i class="fas fa-bar-chart"></i> <span>Reports</span>
              <span class="pull-right-container">
               <i class="fas fa-angle-right"></i>
              </span>
            </a>
        </li>
        <li class="treeview">
          <a href="{{ asset('/admin/setting/index') }}">
              <i class="fas fa-user-cog"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
      </li>
        <li class="treeview">
            <a href="#">
              <i class="fas fa-address-book"></i> <span>Active User</span>
              <span class="pull-right-container">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ asset('/auth/register') }}"><i class="fas fa-plus-circle"></i>Add Users</a></li>
                <li><a href="/auth/logout"><i class="fas fa-power-off"></i>Log Out</a></li>
            </ul>
        </li>
	</ul>
</div>
{{-- End header --}}

@yield('contain')

{{-- Start footer --}}
<footer>
	<div class="col-sm-6">
		Copyright &copy; 2018 <a href="http://www.webtrickshome.com">Cambo News Plus</a> All rights reserved.
	</div>
	<div class="col-sm-6">
		<span class="pull-right"> new news</span>
	</div>
</footer>
</body>
</html>

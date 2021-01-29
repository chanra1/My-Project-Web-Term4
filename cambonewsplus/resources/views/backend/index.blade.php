@extends('backend.master')
@section('contain')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fas fa-bar"></i> DASHBOARD</h1>
		</div>

		<div class="col-sm-12">
			<div class="content">
				<h2>Welcome to Cambo News Plus</h2>
				<p class="welcome-text">You can get start for admin</p>
				<div class="row">
					<div class="col-sm-4">
						<h4>Get Started</h4><br>
						<button type="button" class="btn btn-lg btn-primary">Documentation</button>
					</div>
					<div class="col-sm-4 quick-links">
						<h4>View Records</h4>
						<p><a href="{{ asset('/admin/posts/index') }}"><i class="fas fa-eye"></i> View All Posts</a></p>
						<p><a href="{{ asset('/admin/pages/index') }}"><i class="fas fa-file"></i> View All Pages</a></p>
                        <p><a href="{{ asset('/admin/advertising/index') }}"><i class="fas fa-file"></i> View All Advertising</a></p>
						<p><a href="{{ asset('/admin/message/index') }}"><i class="fas fa-bar-chart"></i> View All Reports</a></p>
					</div>
					<div class="col-sm-4 quick-links">
						<h4>Add Records</h4>
						<p><a href="{{ asset('/admin/posts/create') }}"><i class="fas fa-bookmark"></i> Add Posts</a></p>
						<p><a href="{{ asset('/admin/pages/create') }}"><i class="fas fa-file"> </i> Add Pages</a></p>
                        <p><a href="{{ asset('/admin/advertising/index') }}"><i class="fas fa-file"> </i> Add Advertising</a></p>
						<p><a href="{{ asset('/auth/register') }}"><i class="fas fa-users"></i> Add Users</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@extends("layouts.master")

@section('content')
	<span class="bg-danger" id="failedLogin">@if(Session::has('failedLogin')) {{{ Session::get('failedLogin') }}} @endif</span>
	<span id="loginForm">
		{{ Form::open(array('action' => 'HomeController@doLogin')) }}	
			<div class="modal-dialog">
			<div class="modal-content">
			  	<div class="modal-header">
				  	<h1 class="text-center">Login Here</h1>
			 	</div>
			  	<div class="modal-body">
				  	<form class="form col-md-12 center-block">
						<div class="form-group">
						  	<input type="text" name="username" class="form-control focusedInput" placeholder="Username">
						</div>
						<div class="form-group">
						  	<input type="password" name="password" class="form-control focusedInput" placeholder="Password">
						</div>
						<div class="form-group">
						  	<button class="btn btn-primary btn-lg btn-block">Sign In</button>
						  	<span class="pull-right"><a href="#">Register</a></span><span><a href="http://blog.dev/posts">Need help?</a></span>
						</div>
				 	</form>
			  	</div>
		  	</div>
		  </div>
		{{ Form::close() }}
	</span>
@stop

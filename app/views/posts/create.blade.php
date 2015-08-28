@extends("layouts.master")

@section('content')
	<h2 class="form-signin-heading">Enter Your Post</h2>
	{{ Form::open(array('action' => 'PostsController@store' , 'method' => 'POST' , 
		'enctype' => 'multipart/form-data')) }}		
		{{ Form::token() }}
		@include('posts.create-edit-form')
	{{ Form::close() }}
@stop
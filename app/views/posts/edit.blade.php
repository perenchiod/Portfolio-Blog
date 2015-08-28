@extends("layouts.master")

@section('content')
	<h1>{{{ $post->title }}}</h1>
	
	{{ Form::model($post , array('action' => array('PostsController@update', $post->id) , 
		'enctype' => 'multipart/form-data' ,'method' => 'PUT')) }}
		@include('posts.create-edit-form')
	{{ Form::close() }}
@stop
@extends("layouts.master")

@section('content')
	<p>Created on {{ $post->created_at->format('l, F jS Y @ h:i:s A') }}
	<h1>{{{$post->title}}}</h1>
	<h3>{{{$post->body}}}</h3>
	@if(Auth::user()->username  == $post->user->username)
		<a href="{{{ action('PostsController@edit' , $post->id)}}}">Edit post</a>
		<button id="deleteButton">Delete post</button>
	@endif
	
	{{ Form::open(array('action' =>array('PostsController@destroy', $post->id), 'method' => 'DELETE' , 'id' => 'formDelete')) }}
	{{ Form::close() }}
@stop

@section('script')
<script>
	(function(){
		"use strict";
		$("#deleteButton").on("click" , function(){
			var deleteMessage = confirm("Are you sure about that?");

			if(deleteMessage) {
				$("#formDelete").submit();
			}
		});
	})();
</script>
@stop
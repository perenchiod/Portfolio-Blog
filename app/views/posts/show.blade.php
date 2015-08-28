@extends("layouts.master")

@section('content')
	<div class="showDiv">
		<p class="glyphicon glyphicon-time">Created {{ $post->created_at->format('l, F jS Y @ h:i:s A') }}
		<h1>{{{$post->title}}}</h1>
		<h2>{{{$post->body}}}</h2>
		@if(Auth::check())
			@if(Auth::user()->username  == $post->user->username)
				<a href="{{{ action('PostsController@edit' , $post->id)}}}">Edit post</a>
				{{ Form::open(array('action' =>array('PostsController@destroy', $post->id), 'method' => 'DELETE' , 'id' => 'formDelete')) }}
					<button id="deleteButton">Delete post</button>
				{{ Form::close() }}
			@endif
		@endif
		@if(Storage::exists("$post->picture"))
   			<img src="/files/{{ "$post->picture"}}" alt="" height="214" width="500">
		@endif
	</div>

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
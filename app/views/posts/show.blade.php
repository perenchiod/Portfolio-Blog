@extends("layouts.master")

@section('content')
	<div class="showDiv">
		<p class="glyphicon glyphicon-time">Created {{ $post->created_at->format('l, F jS Y @ h:i:s A') }} </p> <br>
				<?php $changedURL = str_replace("," , "" , $post->tags); $changedURL = str_replace(" " , "+" , $changedURL);     ?>
			@if(strstr($post->tags, ","))
				<a href="{{{ action('HomeController@displayTag' , $changedURL)  }}}"> {{{ str_replace("," , " " , $post->tags) }}} </a> </h4>
			@else 
				<h4> Tags: <a href= "{{{ action('HomeController@displayTag' , $post->tags) }}}">{{{$post->tags}}} </a> </h4>
			@endif
			
		<h1>{{{$post->title}}}</h1>
		<h2>{{{$post->body}}}</h2>
			@if(Auth::check())
				@if(Auth::user()->user_role == 'admin')
					<div class="showButtons">
					{{ Form::open(array('action' =>array('PostsController@destroy', $post->id), 'method' => 'DELETE' , 'id' => 'formDelete')) }}
						<button class="deleteButton col-md-4">Delete post</button>
					{{ Form::close() }}
					@if((Auth::user()->username  == $post->user->username))
						<button class="editID col-md-4" id="edit" href="{{{ action('PostsController@edit' , $post->id)}}}">Edit post</button>
					</div>
					@endif
				@endif
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
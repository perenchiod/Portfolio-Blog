@extends("layouts.master")

@section('content')
	<div id="myEditor"># Test</div>
	<div class="showDiv">
		<p class="glyphicon glyphicon-time">Created {{ $post->created_at->format('l, F jS Y @ h:i:s A') }} </p> <br>
				<?php $changedURL = str_replace("," , "" , $post->tags); $changedURL = str_replace(" " , "+" , $changedURL);     ?>
			@if(strstr($post->tags, ","))
				Tags: <a href="{{{ action('HomeController@displayTag' , $changedURL)  }}}"> {{{ str_replace("," , " " , $post->tags) }}} </a> </h4>
			@else 
				<h4> Tag: <a href= "{{{ action('HomeController@displayTag' , $post->tags) }}}">{{{$post->tags}}} </a> </h4>
			@endif
			
		<h1>{{{$post->title}}}</h1>
		<h2>{{{$post->body}}}</h2>
			@if(Auth::check())
				@if(Auth::user()->user_role == 'admin')
					<div class="showButtons">
						<button id="delete" class="deleteButton col-md-4">Delete post</button>
						{{ Form::open(array('action' =>array('PostsController@destroy', $post->id), 'method' => 'DELETE' , 'id' => 'formDelete')) }}
						{{ Form::close() }}
						@if((Auth::user()->username  == $post->user->username))
							<a class="editID col-md-4" id="edit" href="{{{ action('PostsController@edit' , $post->id)}}}">Edit post</a>
						@endif
					</div>
				@endif
			@endif
	</div>

@stop

@section('script')
	<script type="text/javascript">
		(function (){
			"use strict";
			
			$('#delete').on('click', function(){
				var onConfirm = confirm('Are you sure you want to delete this post?');
				if (onConfirm) {
					$('#formDelete').submit();
				}
			});
			$('#myEditor').markdownEditor();
		})();
	</script>
@stop
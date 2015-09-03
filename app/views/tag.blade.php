@extends('layouts.master')

@section('content')
	
	{{ Form::open(array('action' => 'PostsController@index' , 'method' => 'GET')) }}		
	    <span class="input-append">
	        <input name="search" type="text" class="search-query mac-style col-md-6" placeholder="Search title or name">
	        <button type="submit" class="btn btn-info glyphicon glyphicon-search"></button>
	    </span>         
	{{ Form::close() }}
	

	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title (Links)</th>
				<th>Body</th>
				<th>Tag</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
			<tr>
				<td><a href="{{{ action('PostsController@show' , $tag->id)}}}">{{{ $tag->title }}}</a></td>
				<td>{{{ Str::words($tag->body , 20) }}}</td>
				<td>{{{ $tag->tags}}}</td>
				<td>{{ $tag->user->first_name }} {{ $tag->user->last_name }}</td>
			</tr>
			@endforeach	
		</tbody>
	</table>
</div>

<div id="pagination"> {{ $tags->appends(array('search' => Input::get('search')))->links() }} </div>

@stop
@extends('layouts.master')

@section('content')
	
	<h1>Tag-  </h1>
	

	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title (Links)</th>
				<th>Body</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
			<tr>
				<td><a href="{{{ action('PostsController@show' , $tag->id)}}}">{{{ $tag->title }}}</a></td>
				<td>{{{ Str::words($tag->body , 20) }}}</td>
				<td>{{ $tag->user->first_name }} {{ $tag->user->last_name }}</td>
			</tr>
			@endforeach	
		</tbody>
	</table>
</div>

<div id="pagination"> {{ $tags->appends(array('search' => Input::get('search')))->links() }} </div>

@stop
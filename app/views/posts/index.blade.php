@extends("layouts.master")

@section('content')
<h1>Blog posts</h1>
<p class="bg-success">@if(Session::has('goodMessage')) {{{ Session::get('goodMessage') }}} @endif</p>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Body</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
				@foreach ($posts as $post)
				<tr>
					<td><a href="{{{ action('PostsController@show' , $post->id)}}}">{{{ $post->title }}}</a></td>
					<td>{{{ Str::words($post->body , 20) }}}</td>
					<td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>

				</tr>
				@endforeach
		</tbody>
	</table>
</div>
	{{ $posts->links() }}


@stop
@extends("layouts.master")

@section('content')

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Body</th>
			</tr>
		</thead>
		<tbody>
				@foreach ($posts as $post)
				<tr>
					<td><a href="{{{ action('PostsController@show' , $post->id)}}}">{{{ $post->title }}}</a></td>
					<td>{{{ $post->body }}}</td>
				</tr>
				@endforeach

		</tbody>
	</table>
</div>
	{{ $posts->links() }}


@stop
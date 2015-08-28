@extends("layouts.master")

@section('content')

<section id="main-slider" class="carousel">
        <div class="item active">
        	<img src="/img/nice-image.jpg" alt="http://placehold.it/1200x480" />
            <div class="container">
                <div class="carousel-content">
                    <h1>You can do posts here and well that's about it!</h1>
                    <p class="lead">But hey, if you like blogs then you're in luck!</p>
                </div>
            </div>
    </div><!--/.carousel-inner--> 
</section>
{{ Form::open(array('action' => 'PostsController@index' , 'method' => 'GET')) }}		
    <span class="input-append">
        <input name="search" type="text" class="search-query mac-style col-md-6" placeholder="Search title or name">
        <button type="submit" class="btn btn-info glyphicon glyphicon-search"></button>
    </span>         
{{ Form::close() }}
<div id="pagination"> {{ $posts->appends(array('search' => Input::get('search')))->links() }} </div>
<p class="bg-success">@if(Session::has('goodMessage')) {{{ Session::get('goodMessage') }}} @endif</p>
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
@stop
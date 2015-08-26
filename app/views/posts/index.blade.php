@extends("layouts.master")

@section('content')

<h1 class="blogH1">Blog posts</h1>
<section id="main-slider" class="carousel">
        <div class="carousel-inner">
            <div class="item">
            	<img src="/img/nice-image.jpg" alt="http://placehold.it/1200x480" />
                <div class="container">
                    <div class="carousel-content">
                        <h1>Welcome to the Blog!</h1>
                        <p class="lead">Hope you enjoy your stay ...<br>Kappa</p>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item active">
            	<img src="/img/nice-image.jpg" alt="http://placehold.it/1200x480" />
                <div class="container">
                    <div class="carousel-content">
                        <h1>You can do posts here and well that's about it!</h1>
                        <p class="lead">But hey, if you like blogs then you're in luck!</p>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
        <a class="left glyphicon glyphicon-chevron-left" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
        <a class="right glyphicon glyphicon-chevron-right" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
</section>

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
<div class="pagination"> {{ $posts->appends(array('search' => Input::get('search')))->links() }} </div>

@stop
@extends("layouts.master")

@section('content')
<p>Created on {{ $post->created_at->format('l, F jS Y @ h:i:s A') }}
<h1>{{{$post->title}}}</h1>
<h3>{{{$post->body}}}</h3>
<a href="{{{ action('PostsController@edit' , $post->id)}}}">Edit post</a>
@stop
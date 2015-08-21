@extends("layouts.master")

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
	<div class="container">
		<h2 class="form-signin-heading">Enter Your Post</h2>
		{{ Form::open(array('action' => 'PostsController@store')) }}
			<div class="form-group has-error">
				@if($errors->has('title')) <div class="alert alert-danger">Enter a title please</div> @endif
				<input type="text" class="control-label @if($errors->has('title')) has-error @endif" name="title" placeholder="Enter title here" value="{{{ Input::old('title') }}}">
			</div>
			<div class="form-group has-error">
				@if($errors->has('body')) <div class="alert alert-danger">Enter body text</div> @endif
				<textarea name="body" class="form-control @if($errors->has('body')) has-error @endif" placeholder="Enter body here">{{{ Input::old('body') }}}</textarea>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
		{{ Form::close() }}			{{ Form::token(); }}
	</div>

@stop
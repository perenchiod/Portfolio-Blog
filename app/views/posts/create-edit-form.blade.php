<div class="container">
	@if($errors->has('title')) <div class="alert alert-danger">Enter a title please</div> @else <h4>Title</h4> @endif
	<input class="form-control @if($errors->has('title')) has-error @endif" id="focusedInput" type="text" name="title" placeholder="Enter title here" value="@if(isset($post->title)) {{{$post->title}}} @else {{{Input::old('title')}}} @endif">
	@if($errors->has('body')) <div class="alert alert-danger">Enter body text</div> @else <h4>Body</h4> @endif
	<textarea name="body" class="form-control @if($errors->has('body')) has-error @endif" placeholder="Enter body">@if(isset($post->body)) {{$post->body}} @else {{{ Input::old('body') }}} @endif</textarea>
	 @if($errors->has('picture')) {{ $errors->first('picture') }} @endif
	<input name="picture" id="focusedInput glyphicon glyphicon-picture" type="file" name="pictureUpload" placeholder="Upload photo" value="@if(isset($post->body)) {{$post->body}} @else {{{ Input::old('body') }}} @endif">
	<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
</div>
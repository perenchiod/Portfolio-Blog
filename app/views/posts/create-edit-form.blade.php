<div class="container">
	@if($errors->has('title')) <div class="alert alert-danger">Enter a title please</div> @else <h4>Title</h4> @endif
	<input class="form-control @if($errors->has('title')) has-error @endif" id="focusedInput" type="text" name="title" placeholder="Enter title here" value="@if(isset($post->title)){{{$post->title}}}@else{{{Input::old('title')}}}@endif">
	@if($errors->has('body')) <div class="alert alert-danger">Enter body text</div> @else <h4>Body</h4> @endif
	<textarea name="body" class="form-control @if($errors->has('body')) has-error @endif" placeholder="Enter body">@if(isset($post->body)){{$post->body}}@else{{{ Input::old('body')}}}@endif</textarea>
	 @if($errors->has('picture')) {{ $errors->first('picture') }} @endif
	<input name="picture" id="focusedInput glyphicon glyphicon-picture" type="file" name="pictureUpload" placeholder="Upload photo" value="@if(isset($post->body)) {{$post->body}} @else {{{ Input::old('body') }}} @endif">
	<h3>Tags <small>(limit 3)</small></h3>
	<select name="tags" id="tagSelect" multiple="multiple">     	
		<option value="funny">Funny</option>
	    <option value="troll">Troll</option>
	    <option value="sad">Sad</option>
	    <option value="current">Current News</option>
	    <option value="serious">Serious</option>
	    <option value="music">Music</option>
	    <option value="gaming">Gaming</option>
	    <option value="technology">Technology</option>
	    <option value="business">Business</option>
	</select>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tagSelect').multiselect({
        	nonSelectedText: 'Use tags!',
        	maxHeight: 230,
        	 onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = $('#tagSelect option:selected');
 
                if (selectedOptions.length >= 3) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = $('#tagSelect option').filter(function() {
                        return !$(this).is(':selected');
                    });
 
                    var dropdown = $('#tagSelect').siblings('.multiselect-container');
                    nonSelectedOptions.each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });
                }
                else {
                    // Enable all checkboxes.
                    var dropdown = $('#tagSelect').siblings('.multiselect-container');
                    $('#tagSelect option').each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }
        });
    });
</script>


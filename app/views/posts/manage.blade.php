@extends('layouts.master')

@section('content')
<script type="text/javascript" src="/js/blog.js"></script>
<div ng-app="blog">
	<div ng-controller="ManageController as MC">		
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Title (Links)</th>
						@if(Auth::user()->user_role == 'admin')
							<th>Body</th>
							<th>Tags</th>
						@endif
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="post in posts">
						<td><a href="/posts/@{{ post.id }}">@{{ post.title }}</a></td>
						<td>@{{ post.body  }}</td>
						@if(Auth::user()->user_role == 'admin')
							<td><button ng-click="deletePost($index)">Delete post</button></td>
							<td><button ng-click="modal($index)">Edit post</button></td>
						@endif
					</tr>
				</tbody>
			</table>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Modal title</h4>
					</div>
					<div class="modal-body">
						<input class="form-control" id="focusedInput" type="text" name="title" placeholder="Enter title here" value="@{{post.title}}">
						<textarea name="body" rows="5" class="form-control" placeholder="Enter body">@{{post.body}}</textarea>
						<select name="tags[]" id="tagSelect" multiple="multiple">     	
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
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" ng-click="editPost($index)">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')

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
@stop
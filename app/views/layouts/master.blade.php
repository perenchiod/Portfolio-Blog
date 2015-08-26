<html lang='en'>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link media="all" type="text/css" rel="stylesheet" href="http://blog.dev/css/master.css">
	
	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>
	
	<title>Laravel Blog</title>
</head>

<body>
	<span class="bg-danger" id="loggedOut">@if(Session::has('loggedOut')) {{{ Session::get('loggedOut') }}} @endif</span>
	<div id = "body" class="shia-video">
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      	<a class="glyphicon glyphicon-list-alt col-md-4" href="http://blog.dev/posts">Home</a>
    	<a class="glyphicon glyphicon-education col-md-4" href="http://blog.dev/portfolio">Portfolio</a>
      	@if(Auth::check())
      		<a class="glyphicon glyphicon-knight col-md-4" href="http://blog.dev/logout">Logout</a class="glyphicon glyphicon-king">
      	@else
      		<a class="glyphicon glyphicon-king col-md-4" href="http://blog.dev/login">Login</a class="glyphicon glyphicon-king">
      	@endif

      	@if(Request::url() === 'http://blog.dev/posts')
	      	{{ Form::open(array('action' => 'PostsController@index' , 'method' => 'GET')) }}		
			    <div class="input-append">
			        <input name="search" type="text" class="search-query mac-style col-md-9" placeholder="Search title or name">
			        <button type="submit" class="btn btn-info glyphicon glyphicon-search"></button>
			    </div>         
			{{ Form::close() }}
		@endif
    </div>
  </div>
	
	@yield('header')
	@yield('content')
	<script type="text/javascript">
	var konamiArray = [38,38,40,40,37,39,37,39,66,65,13];
	var incKonami = 0;
	//This reads for the user to enter the konami code if entered plays shia labeouf song on loop forever
			$(document).keyup(function(event){
				var konamiValue = event.keyCode;
				if (konamiValue == konamiArray[incKonami++]) {
					if(incKonami == konamiArray.length) {
						$(".shia-video").append("<iframe width='1' height='1' src='https://www.youtube.com/embed/o0u4M6vppCI?rel=0&autoplay=1&amp;loop=1&amp;' frameborder='0' allowfullscreen></iframe>");
					}
				} else {
					incKonami = 0;
				}
			});
	
	</script>
</body>
</html>
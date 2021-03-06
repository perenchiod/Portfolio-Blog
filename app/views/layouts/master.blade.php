<html lang='en'>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <!-- Add CSRF Token as a meta tag in your head -->
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	{{ HTML::script('js/bootstrap-multiselect.js') }}
	
	<script src="/bower_components/angular/angular.min.js"></script>
	
	<!-- Including bower markdown info here -->
	<script src="/bower_components/ace-builds/src-min/ace.js"></script>
	<script src="/bootstrap-markdown-editor.js"></script>

	<link media="all" type="text/css" rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css"/>
	
	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>

	
	<title>Laravel Blog</title>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-67058701-1', 'auto');
		ga('send', 'pageview');	
	</script>
</head>

<body>
	<span class="bg-danger" id="loggedOut">@if(Session::has('loggedOut')) {{{ Session::get('loggedOut') }}} @endif</span>
	<div id = "body" class="shia-video">
		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    			<div class="navbar-header">
			      	<a class="glyphicon glyphicon-list-alt col-md-4" href="/posts">Home</a>
			    	<a class="glyphicon glyphicon-education col-md-4" href="/portfolio">Portfolio</a>
			      	@if(Auth::check())
				      	<a class="glyphicon glyphicon-upload col-md-4" href="/posts/create">Create</a>
			      		<a class="glyphicon glyphicon-knight" href="/logout">Logout</a class="glyphicon glyphicon-king">
			      	@else
			      		<a class="glyphicon glyphicon-king col-md-4" href="/login">Login</a class="glyphicon glyphicon-king">
			      	@endif
			    </div>
			</div>
		</nav>
	</div>
	
	@yield('header')
	@yield('content')
	@yield('script')
	<script type="text/javascript">
		var konamiArray = [38,38,40,40,37,39,37,39,66,65,13];
		var incKonami = 0;
		//This reads for the user to enter the konami code if entered plays shia labeouf song on loop forever
				$(document).keyup(function(event){
					var konamiValue = event.keyCode;
					if (konamiValue == konamiArray[incKonami++]) {
						if(incKonami == konamiArray.length) {
							$(".shia-video").append("<iframe width='1' height='1' src='https://www.youtube.com/embed/o0u4M6vppCI?rel=0&autoplay=1&amp;loop=1&amp;' frameborder='0' allowfullscreen></iframe>");
							$('body').css("cursor" , "url(/img/shia-cursor.png), auto")
						}
					} else {
						incKonami = 0;
					}
				});
	</script>
</body>
</html>
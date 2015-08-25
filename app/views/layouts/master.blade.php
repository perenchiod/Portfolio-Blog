
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<html lang='en'>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link media="all" type="text/css" rel="stylesheet" href="http://blog.dev/css/master.css">
	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>

	<title>Laravel Blog</title>
</head>
<body>
	<div id = "body" class="shia-video">
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="glyphicon glyphicon-list-alt" href="http://blog.dev/posts">
      </a>
    </div>
  </div>
</nav>
	
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
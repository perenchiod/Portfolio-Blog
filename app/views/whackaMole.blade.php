<html>
<head>
	<title>Whack-A-Mole</title>
	<link rel="stylesheet" href="http://blog.dev/css/whack-a-mole.css" type="text/css"/>
</head>
<body>
	<span class="bg-danger" id="loggedOut">@if(Session::has('loggedOut')) {{{ Session::get('loggedOut') }}} @endif</span>
	<div id = "body2" class="shia-video">
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

	<button id = "startGame" type="button" class="btn btn-primary btn-lg btn-block">Start Game</button>
	<h1>Whack-A-<strong>Shia Labeouf</strong></h1>
	<h3 class="timer">Timer: </h3>
	<h3 class="highScore"></h3>
	<div id = "body" class="shia-video">
		<div class="squares" id="0"></div>
		<div class="squares" id="1"></div>
		<div class="squares" id="2"></div>
		<div class="squares" id="3"></div>
		<div class="squares" id="4"></div>
		<div class="squares" id="5"></div>
		<div class="squares" id="6"></div>
		<div class="squares" id="7"></div>
		<div class="squares" id="8"></div>
	</div>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script>
	"use strict";
		var holes = [0,1,2,3,4,5,6,7,8];
		var randomSquare;
		var score = 0;
		var konamiArray = [38,38,40,40,37,39,37,39,66,65,13];
		var incKonami = 0;
		var highScore = 0;
		var time = 0;

		$("#startGame").one("click" , function () {
			//Gets a random box to use with my shia
			function pickRandomSquare () {
				randomSquare = Math.floor(Math.random() * holes.length);
				randomSquare = "#" + randomSquare;
				console.log(randomSquare);
			}

			//Animate shia to pop up with the picked random square
			function animateGuy () {
				pickRandomSquare();
				$(randomSquare).addClass("mole");
				$(".mole").css("visibility" , "visible");
				logClick();
	
				setTimeout(function () { 	//Timeout function to disapear shia after a set amount of time
					$(".mole").off('click');
					$(randomSquare).removeClass("mole");
				}, 610);
			}

			//changeHoles() will display another shia after a set amount of time
			function changeHoles() {
				setInterval(function () {
					animateGuy();
				}, 650);			
			}

			//logClick() is my click listener on my shia object 
			function logClick () {
				$(".mole").click(function () {
					var test = score;
					score++;
					if(score < 0) {
						score = 0;
					}
					$("#startGame").text("Score: " + score);
					if(test != score) {
						$(".mole").off('click');
					}
					$(randomSquare).removeClass("mole");
				});
			}	

			//resets the game after 30 sec
			function resetGame () {
				$("#startGame").text("New game");
				score = 0;
				time = 0;	
			}

			function interval () {
				time++;
				//When time hits 30 seconds 
				$(".timer").html("Timer: " + time);
				if(time == 30){
					if(score > highScore) {
						highScore = score;
					}
					alert("Game over score of: " + score);
					$(".highScore").html("Highscore: " + highScore)
					resetGame();
				}
			}
			//Calls interval function which gives the page a timer
			setInterval(interval,1000);
			
			changeHoles();
			
			
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
		});

	</script>
</body>
</html>

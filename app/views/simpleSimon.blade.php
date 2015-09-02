@extends("layouts.master")

@section("content")

<html>
<head>
	<title>Simon Game</title>
	<link media="all" type="text/css" rel="stylesheet" href="http://blog.dev/css/simon.css">
</head>
<body>

	<h1>Hard Simple Simon</h1>
	<h4>(Only the latest square added to the game will be shown)</h4>
	<div id="squareBody">
		<div class="square" id="square0" value="0"></div>
		<div class="square" id="square1" value="1"></div>
		<div class="square" id="square2" value="2"></div>
		<div class="square" id="square3" value="3"></div>
	</div>
	<button id="startGame">Start the game!</button>
	
<script>
	"use strict";
	var square0 = $("#square0");
	var square1 = $("#square1");
	var square2 = $("#square2");
	var square3 = $("#square3");
	var squaresArray = [square0, square1, square2, square3];
	var randomBox;
	var randomArray = [];
	var userArray = [];
	var i = 0;

	//On click listener runs when start game button is pressed
	$("#startGame").click(function () {
		$("#startGame").text("Restart the game");

		//Function that grabs a box randomly
		function randomize () {
			var tempSquare = $(".square");
			randomBox = Math.floor(Math.random() * squaresArray.length);
			randomArray.push(randomBox);
			var selectedSquare = tempSquare[randomBox];
			selectedSquare = selectedSquare.getAttribute("value");
			animateSquare();
		}
		
		//Function for reciving info on which square user clicked on
		function userInput() {
			$(".square").on("click", function(event) {
				userArray.push((this).getAttribute("value"));
				if (userArray.length == randomArray.length) {
					compareArrays();
				}
			});
		}

		//Animates the square selected
		function animateSquare () {	
			$(squaresArray[randomArray[i]]).fadeTo(700, 1);
			$(squaresArray[randomArray[i]]).fadeTo(700, .5);
			timerFunction();
		}

		//This timer function currently is incrementing i
		function timerFunction () {
			var timeout = setTimeout(function () { 
				i++; 
			}, 1000);
			if(i == randomArray.length) {
				i = 0;
 				clearTimeout(timeout);
			} 
		}

		//Compares randomArray and userArray, if they're the same you continue with randomize function
		function compareArrays () {
			var rounds
			if (userArray.toString() == randomArray.toString()) {
				randomize();
				userArray = [];
			}
			else {
				alert("Game over");
				randomArray = [];
				userArray = [];
			}
		}
		randomize();
		userInput();

	});

	square0.click(function() {
		$(this).css("opacity" , "1");
		$(this).fadeTo(500, .5);
	});
	square1.click(function() {
		$(this).css("opacity" , "1");
		$(this).fadeTo(500, .5);
	});
	square2.click(function() {
		$(this).css("opacity" , "1");
		$(this).fadeTo(500, .5);
	});
	square3.click(function() {
		$(this).css("opacity" , "1");
		$(this).fadeTo(500, .5);
	});
</script>
</body>
</html>

@stop
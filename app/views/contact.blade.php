@extends('layouts.master')
<html>
<head>
	<title></title>
</head>
<body>
	@section('header')
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="portfolio">Portfolio</a></li>
            <li><a href="resume">Resume</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
    </div>
    @stop
    @section('content')
	<address>
        <strong>Dylan Perenchio</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
    </address>
    @stop
</body>
</html>
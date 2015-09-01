<!-- Still a work in progress, will be adding styles and project info when accquired -->
@extends('layouts.master')

<html>
<head>
    <title>Dylan's resume</title>
</head>
<body>
	@section('header')
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{{ action('HomeController@linkPortfolio') }}}">Portfolio</a></li>
            <li><a href="{{{ action('HomeController@linkResume') }}}">Resume</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
    </div>
    @stop
    @section('content')
    <!--Into para-->
    <div class="bs-callout bs-callout-danger">
        <ul class="list-group">
            <a class="list-group-item inactive-link" href="#">
                <h3 class="list-group-item-heading">About me</h3>
            </a>
            <p class="container">
                I'm currently a student of <a href="http://codeup.com" target="_blank">CodeUp</a> going through their 
                Full-Stack Bootcamp. I'm interested in learning as much as I can about web development to be a proficient 
                coder in both front and backend developing.
            </p>
            <a class="list-group-item inactive-link" href="#">
                <h3 class="list-group-item-heading">What I've learned</h3>
            </a>
            <ul>
                <li>PHP</li>
                <li>JavaScript</li>
                <li>Laravel</li>  
                <li>jquery</li>
            </ul>
        </ul>
    </div>
    @stop
</body>
</html>
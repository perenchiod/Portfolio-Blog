<!-- Still a work in progress, will be adding styles and project info when accquired -->
@extends('layouts.master')

<html>
<head>

    <title>Dylan's Portfolio</title>
</head>

<body>

    @section('content')
    <!--Junmbotron heading-->
    <section id="one" class="portfolio">
        <div class="jumbotron">
            <div class="container">
                <h1>Dylan Perenchio's Portfolio!</h1>
                <p>This is my own portfolio for all the work I have completed.</p>
            </div>
            <a class="btn btn-primary btn-lg" href="#" role="button">Herey</a>
        </div>

        <!--Horizontal paragraph-->

        <div class="bs-example container" data-example-id="horizontal-dl">
            <dl class="dl-horizontal">  
                <dt>Projects completed: </dt>
               <dd>My project comleted are listed here with links to their <a href="https://github.com/perenchiod" target="_blank">Github</a></dd>
                <dt>Learned:</dt>
                <dd>Html, CSS, Javascript, PHP, MySQL</dd>
                <dd>- I will continue to update this page as projects get completed</dd>  
            </dl>
        </div>

        <!-- Thumbnails, portfolio projects-->
        <div class="bs-example" data-example-id="thumbnails-with-custom-content">
            <div class="row">

                <!-- Project 1-->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="" src="">
                        <div class="caption">
                            <h3 id="thumbnail-label">Project 1<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
                            <p>Github: <a href="http://github.com/" target="_blank">Github link to project 1</a> </p>
                        </div>
                    </div>
                </div>
          
                <!-- Project 2-->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="" src="">
                        <div class="caption">
                            <h3 id="thumbnail-label">Project 2<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
                            <p>Github: <a href="http://github.com/" target="_blank">Github link to project 2</a> </p>
                        </div>
                    </div>
                </div>
          
                <!-- Project 3-->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="" src="">
                        <div class="caption">
                            <h3 id="thumbnail-label">Project 3<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3> 
                            <p>Github: <a href="http://github.com/" target="_blank">Github link to project 3</a> </p>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>

    <section id="second" class="resume">
        <a class="anchor" id="row2"></a>
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
            
            
    </section>
    @stop

</body>
</html>
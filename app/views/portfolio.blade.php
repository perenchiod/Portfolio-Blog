<!-- Still a work in progress, will be adding styles and project info when accquired -->
@extends('layouts.master')
<html>
<head>
    <title>Dylan's Portfolio</title>
</head>
<body>
@section('content')
<div ng-app="portfolio">
    <!--Junmbotron heading-->
    <section id="portfolioHeader" class="portfolio">
        
        <div class="container">
            <h1>Dylan Perenchio's Portfolio!</h1>
            <!--Horizontal paragraph-->

            <div class="bs-example container" data-example-id="horizontal-dl">
                <dl class="dl-horizontal">  
                    <dt>Learned:</dt>
                    <dd>Html, CSS, Javascript, PHP, MySQL</dd>
                    <dd>- I will continue to update this page as projects get completed</dd>  
                </dl>
            </div>
        </div>
        <!-- Thumbnails, portfolio projects-->
        <div class="projects" data-example-id="thumbnails-with-custom-content">
            <h2>Projects</h2>
            <div class="row">

                <!-- Project 1-->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="" src="">
                        <div class="caption">
                            <a href="/simplesimon" target="_blank" id="thumbnail-label">Simple Simon game<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></a> <small>(link)</small>
                            <p>
                                This game was created using Javascript and JQuery. It plays like the original simple simon game, only it's a better more fun version (＾ω＾)
                            </p>
                            <p>Github: <a href="https://github.com/perenchiod/Simple-Simon" target="_blank">Github link to Simple Simon</a> </p>
                        </div>
                    </div>
                </div>
          
                <!-- Project 2-->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="" src="">
                        <div class="caption">
                            <a href="/whackamole" target="_blank" id="thumbnail-label">Whack-A-Mole<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></a>  <small>(link)</small>
                            <p> 
                                This whack-a-mole was created with Javascript and JQuery. This is an intresting game because you're actually whacking Shia Labeouf!
                            </p>
                            <p>Github: <a href="https://github.com/perenchiod/Whack-a-Mole" target="_blank">Github link to Whack-A-Mole</a> </p>
                        </div>
                    </div>
                </div>

                <!-- Project 3-->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="" src="">
                        <div class="caption">
                            <a href="http://resumesolutions.us" target="_blank" id="thumbnail-label">Resume Solutions<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></a>  <small>(link)</small>
                             <p>
                                Resume Solutions offers an easy effective way to create an eye catching HTML/CSS resume. Using the laravel framework we have implemented dynamic code that can be unique to each user. Sign up now to get your free resume!
                            </p>
                            <p>Github: <a href="https://github.com/resumeproductions/Resume-Solutions" target="_blank">Github link to Resume Solutions</a> </p>
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
                <a class="list-group-item inactive-link">
                    <h3 class="list-group-item-heading">About me</h3>
                </a>
                <p class="container" id="aboutMePortfolio">
                     I'm a graduated student of <a href="http://codeup.com" target="_blank">CodeUp</a> going through their 
                    Full-Stack Bootcamp. I'm interested in learning as much as I can about web development to be a proficient 
                    coder in both front and backend developing. I've come a far way but I still have much to learn, if you have
                    any tips or want to contact me feel free to do so in the section below.
                </p>
                <a class="list-group-item inactive-link">
                    <h3 class="list-group-item-heading">Skilled at</h3>
                </a>
                <ul class="items">
                    <li>HTML5</li>
                    <li>CSS3</li>
                    <li class="indent">SASS</li>
                    <li>JavaScript</li>
                    <li class="indent">JQuery</li>
                    <li>PHP</li>
                    <li>Laravel Framework</li>  
                </ul>
            </ul>
        </div>  
    </section>

    <section id="contact" class="portfolio">
        <a class="list-group-item inactive-link">
            Contact Me
        </a>
        
        <div class="col-md-9" id="contactMe">
            {{ Form::open(array('action' => 'HomeController@sendEmail')) }}
                <fieldset>
                    <!-- Name input-->
                    <div class="form-group">
                        <div class="col-md-7">
                            <label id="formText" for="name">Name</label>
                            <input id="name" name="name" type="text" placeholder="Name" ng-model="contact.name" class="form-control" maxlength="100" required>
                        </div>
                    
            
                    <!-- Email input-->
          
                        <div class="col-md-7">
                            <label id="formText" for="email">E-mail</label>
                            <input id="email" name="email" type="email" placeholder="Your email" ng-model="contact.email" class="form-control" maxlength="100" required>
                        </div>
                    

                    <!-- Subject -->
                   
                        <div class="col-md-7">
                            <label id="formText" for="email">Subject</label>
                            <input id="subject" name="subject" type="text" placeholder="Email subject" ng-model="contact.subject" class="form-control" maxlength="100" required>
                        </div>
                  
            
                    <!-- Message body -->
               
                        <div class="col-md-7">
                            <label id="formText" for="message">Your message</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." ng-model="contact.message" rows="5"></textarea>
                        </div>
                    </div>
            
                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-sm-7 text-right">
                          <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                        </div>
                    </div>
                </fieldset>
            {{Form::close()}}
        </div>
    </section>
    @stop
</body>
</html>
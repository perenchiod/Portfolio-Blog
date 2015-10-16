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
        </div>

        <!--Horizontal paragraph-->

        <div class="bs-example container" data-example-id="horizontal-dl">
            <dl class="dl-horizontal">  
                <dt>Projects:</dt>
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
                            <a href="/simplesimon" target="_blank" id="thumbnail-label">Simple Simon game<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></a> <small>(link)</small>
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
                                Resume Solutions offers an easy effective way to create an eye catching HTML/CSS resume. Using the laravel framework we have implemented dynamic code that can be unique to each user. As we grow we continue to implement more templates as well as a create your own option. So take one of ours or build your own and let the interviews begin! Sign up now to get your free resume.
                            </p>
                            <p>Github: <a href="https://github.com/resumeproductions/Resume-Solutions" target="_blank">Github link to Whack-A-Mole</a> </p>
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
                    coder in both front and backend developing. I have come a far way but I still have much to learn, if you have
                    any tips or want to <a href="#contact" class="cd-btn secondary">contact</a>
                </p>
                <a class="list-group-item inactive-link">
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

    <main id="contact" class="resume">
        <a class="list-group-item inactive-link">
            Contact Me
        </a>
        
        <div class="col-md-9">
            {{ Form::open(array('action' => 'HomeController@sendEmail')) }}
                <fieldset>
                    <!-- Name input-->
                    <div class="form-group">
                        <div class="col-md-9">
                            <label id="formText" for="name">Name</label>
                            <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                        </div>
                    
            
                    <!-- Email input-->
          
                        <div class="col-md-9">
                            <label id="formText" for="email">E-mail</label>
                            <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                        </div>
                    

                    <!-- Subject -->
                   
                        <div class="col-md-9">
                            <label id="formText" for="email">Subject</label>
                            <input id="subject" name="subject" type="text" placeholder="Email subject" class="form-control">
                        </div>
                  
            
                    <!-- Message body -->
               
                        <div class="col-md-9">
                            <label id="formText" for="message">Your message</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                        </div>
                    </div>
            
                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-sm-9 text-right">
                          <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                        </div>
                    </div>
                </fieldset>
            {{Form::close()}}
        </div>
    </main>
    @stop


    @section('script')
        <script type="text/javascript">
            $("#contact").click(function(){
                var offset = $(this).offset();
                offset.left -= 20;
                offset.top -= 20;
            });
            $('html, body').animate({
                scrollTop: offset.top,
                scrollLeft: offset.left
            });
        </script>
    @stop
</body>
</html>
<?php
    $this->layout = false;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elevate Bootstrap 4.0 Theme</title>
<!--
Elevate
http://www.templatemo.com/tm-481-elevate
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400">   <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/magnific-popup.css">                                     <!-- Magnific pop up style -->
    <link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
      </head>

      <body>
          <div class="navbar-main">
              
              <div class="container">
                  
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                          
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          
                      </button>
                      <a class="navbar-brand" href="index.html"><img src="/Users/Majed/Downloads/NEW Downloads/templatemo_481_elevate/img/logo.png" alt=""></a>
                      </div>
<div class="navbar-brand"> <li><?php if (is_null($this->request->session()->read('Auth.User.First_Name'))){
    echo $this->Html->link('Log in', ['controller'=>'Users','action' => 'login']);
} ?></li> </div>
            <div class="tm-sidebar">
                <img src="img/menu-top.jpg" alt="Menu top image" class="img-fluid tm-sidebar-image">
                <nav class="tm-main-nav">
                    <ul>
                        <li class="tm-nav-item"><a href="#home" class="tm-nav-item-link">Home</a></li>
                        <li class="tm-nav-item"><a href="#about" class="tm-nav-item-link">About</a></li>
<div> <li class="tm-nav-item"><?php if (is_null($this->request->session()->read('Auth.User.First_Name'))){
    echo $this->Html->link('Log in', ['controller'=>'Users','action' => 'login']);
} ?></li> </div>
                <li class="tm-nav-item"><a href="#contact" class="tm-nav-item-link">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div> <!-- /#navbar -->

                  </div> <!-- /.container -->
            
            <div class="tm-main-content">
                
                <section id="home" class="tm-content-box tm-banner margin-b-10">
                    <div class="tm-banner-inner">
                       
                        <p class="tm-banner-text">من نحن؟ </p>
                        <iframe width="660" height="315" src="https://www.youtube.com/embed/hTn4BnH_fjo" frameborder="0" allowfullscreen></iframe>
                    </div>                    
                </section>

                <section>
                    <div class="tm-content-box flex-2-col">
                        
                        <div class="pad flex-item tm-team-description-container">
                            <h2 class="tm-section-title">Our Team</h2>
                            <p class="tm-section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel nisi pharetra nibh varius pharetra ac sagittis nisi. Etiam pharetra vestibulum hendrerit.</p>
                            <p class="tm-section-description">Donec ex libero, fringilla vitae purus sit amet, rhoncus pharetra lorem. Pellentesque id sem id lacus ultricies vehicula. Aliquam rutrum mi non.</p>    
                        </div>
                        <div class="flex-item">
                            <img src="img/about.jpg" alt="">    
                        </div>                       
                        

                    </div>
                    <div id="about" class="tm-content-box">
                        
                        <ul class="boxes gallery-container">
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Creative</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                            <li class="box">
                                <a href="img/idea-large-01.jpg"><img src="img/idea-01.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Develop</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                            <li class="box">
                                <a href="img/idea-large-02.jpg"><img src="img/idea-02.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Design</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                            <li class="box">
                                <a href="img/idea-large-03.jpg"><img src="img/idea-03.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Support</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                            <li class="box">
                                <a href="img/idea-large-04.jpg"><img src="img/idea-04.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Think</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                        </ul>

                    </div>
                    
                </section>



                <!-- slider -->
                <section id="ideas">
                    <div id="tmCarousel" class="carousel slide tm-content-box" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#tmCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#tmCarousel" data-slide-to="1" class=""></li>
                            <li data-target="#tmCarousel" data-slide-to="2" class=""></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">

                            <div class="carousel-item active">
                                <div class="carousel-content">
                                    <div class="flex-item">
                                        <h2 class="tm-section-title">Our Ideas</h2>
                                        <p class="tm-section-description carousel-description">Suspendisse fermentum auctor turpis quis volutpat. Ut sed nibh non purus porta lacinia. Donec et euismod elit. Aenean vitae quam leo. Pellentesque interdum metus sed massa rutrum.</p>
                                    </div>
                                </div>                               
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-content">
                                    <div class="flex-item">
                                        <h2 class="tm-section-title">Our Clients</h2>
                                        <p class="tm-section-description carousel-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel nisi pharetra nibh varius pharetra ac sagittis nisi. Etiam pharetra vestibulum hendrerit. Pellentesque interdum metus sed massa rutrum.</p>
                                    </div>
                                </div>                                
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-content">
                                    <div class="flex-item">
                                        <h2 class="tm-section-title">Our Projects</h2>
                                        <p class="tm-section-description carousel-description">Donec ex libero, fringilla vitae purus sit amet, rhoncus pharetra lorem. Pellentesque id sem id lacus ultricies vehicula. Aliquam rutrum mi non. Pellentesque interdum metus sed massa rutrum.</p>
                                    </div>
                                </div>                                
                            </div>

                        </div>
                        
                    </div>                    
                    <section id="contact" class="tm-content-box">
                        <img src="img/contact.jpg" alt="Contact image" class="img-fluid">

                        <div id="contact" class="pad">
                        <h2 class="tm-section-title">Contact Us</h2>
                        <form method="post" class="contact-form">

                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group-2-col-left">
                        <input type="text" id="fname" name="name" class="form-control" placeholder="Name"  required/>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group-2-col-right">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email"  required/>
                        </div>
                        <div class="form-group">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject"  required/>
                        </div>
                        <div class="form-group">
                        <textarea id="message" name="message" class="form-control" rows="9" placeholder="Message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>

                        </form>
                        </div>

                    </section>

                <footer class="tm-footer">
                    <p class="text-xs-center">Copyright &copy; 2016 Company Name

                    - Design: <a rel="nofollow" href="http://www.templatemo.com/tm-481-elevate" target="_parent">Elevate</a></p>
                </footer>

            </div>

        </div>

        <!-- load JS files -->

        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/getting-started/download/) -->
        <script src="js/jquery.magnific-popup.min.js"></script>     <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="js/jquery.touchSwipe.min.js"></script>         <!-- https://github.com/mattbryson/TouchSwipe-Jquery-Plugin -->
        
        <!-- Templatemo scripts -->
        <script>                      
    
        $(document).ready(function(){

            // Single page nav
            if($(window).width() <= 1139) {
                $('.tm-main-nav').singlePageNav({
                    'currentClass' : "active",
                    offset : 100
                });
            } else {
                $('.tm-main-nav').singlePageNav({
                    'currentClass' : "active",
                    offset : 80
                });
            }

            // Handle nav offset upon window resize
            $(window).resize(function(){
                if($(window).width() <= 1139) {
                    $('.tm-main-nav').singlePageNav({
                        'currentClass' : "active",
                        offset : 100
                    });
                } else {
                    $('.tm-main-nav').singlePageNav({
                        'currentClass' : "active",
                        offset : 80
                    });
                }
            });

            // Magnific pop up
            $('.gallery-container').magnificPopup({
              delegate: 'a', // child items selector, by clicking on it popup will open
              type: 'image',
              gallery: {enabled:true}
              // other options
            });

            $('.carousel').carousel({
              interval: 3000
            })

            // Enable carousel swiping (http://lazcreative.com/blog/adding-swipe-support-to-bootstrap-carousel-3-0/)
            $(".carousel-inner").swipe( {
                //Generic swipe handler for all directions
                swipeLeft:function(event, direction, distance, duration, fingerCount) {
                    $(this).parent().carousel('next'); 
                },
                swipeRight: function() {
                    $(this).parent().carousel('prev'); 
                }
            });

        });
    
        </script>             

    </body>
    </html>
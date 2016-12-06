<?php
$this->layout = false;
?>

<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html dir="auto">
<head>
   

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>كورة تايم Football</title>

	<!-- Load fonts -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>

	<!-- Load css styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap1.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome1.css" />
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
    <link rel="stylesheet" type="text/css" href="css/notiny.min.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="jumbotron home home-fullscreen" id="home">
		<div class="mask"></div>
		<a href="" class="logo">
			<img src="img/logoo.png" alt="Majed Almutairi">
		</a>
<a href="home-en" class="En">En</a>

		<a href="" class="menu-toggle" id="nav-expander"><i class="fa fa-bars"></i></a>
		<!-- Offsite navigation -->
        
		<nav class="menu">
<div class="mask"></div>
<a href="" class="logo">
<img src="img/logoo.png" alt="Majed Almutairi">
</a>


<a href="#" class="close"><i class="fa fa-close"></i></a>

			<h3>Menu</h3>

			<ul class="nav">
				<li><a data-scroll href="#home">الصفحة الرئيسية</a></li>
				<li><a data-scroll href="#services">خدماتنا</a></li>
				<li><a data-scroll href="#portfolio">من نحن</a></li>
				<li><a data-scroll href="#contact">إتصل بنا</a></li>
                <li><a href="home-en">English</a></li>
			</ul>


			<ul class="social-icons fix-ul">
				<li><a href=""><i class="fa fa-facebook"></i></a></li>
				<li><a href=""><i class="fa fa-twitter"></i></a></li>
				<li><a href=""><i class="fa fa-dribbble"></i></a></li>
				<li><a href=""><i class="fa fa-behance"></i></a></li>
				<li><a href=""><i class="fa fa-pinterest"></i></a></li>
			</ul>
		</nav>
		<div class="container">
			<div class="header-info">
				<h1>Football Training</h1>
				<p>Simply, you an attend any training you want by sign up
				</p>
                <!--<button type="button" class="btn btn-info btn-lg btn-login" data-toggle="modal" data-target="#myModal"> حضر نفسك من هنا</button>-->
                
                <?= $this->Form->create(null,['url' => ['controller' => 'Users', 'action' => 'login']]) ?>
                <div class="form-boder">
                    <div class="row">
                        
                            
                            <div class="col-md-4 col-sm-1 col-xs-0"></div>
                            <div class="form-group col-md-4 col-sm-10 col-xs-12 home-fix-col">
                                <i class="fa fa-user " aria-hidden="true"></i><?= $this->Form->input('email', ['type' => 'text', 'label'=>'','id'=>'email_log','class' => 'form-control','placeholder' => 'Enter Email or Phone number']) ?>
                                <i class="fa fa-lock " aria-hidden="true"></i><?= $this->Form->input('password', ['type' => 'password', 'label'=>'','id'=>'pass_log','class' => 'form-control','placeholder' => 'Enter Password']) ?>
                                <?= $this->Form->submit(__('Log In'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                                <p class="small">
                                <?php echo $this->Html->link('Forgot Password', ['controller'=>'Users','action' => 'resetPassword']);
?>
                                                  
                            </p>
                            <p class="small">
                           
                                <?php echo $this->Html->link('Register', ['controller'=>'Users','action' => 'register']);
?>
                            </p>
                            </div>
                            <div class="col-md-4 col-sm-1 col-xs-0"></div>
                    </div>
                    
                </div>
                       
                        
                     <?= $this->Form->end() ?>
                    
                
                                                 
				
			</div>
		</div>
	</div>
	<!-- Services section start -->
	<section id="services">
		<div class="container">                      
			<div class="row">
				<div class="col-md-4">
					<div class="service-item">
						<div class="icon"><i class="fa fa-diamond"></i></div>
						<h3>How it works</h3>
						<p>Basically, this website allow any club to regiester by Free and make its players attending online before the training
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service-item">
						<div class="icon"><i class="fa fa-gear"></i></div>
						<h3>How to sign-up</h3>
<p>If you are a club you have to contact us on this email: MAjed054000@gmail.com or from the form box down this page
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service-item">
						<div class="icon"><i class="fa fa-life-ring"></i></div>
						<h3>Free sign up</h3>
						<p>Any clubs or players can sign up and using this website by Free
						</p>
					</div>
				</div>
			</div>
		</div>
          
	</section>
	<!-- Services section end -->
	<!-- Portfolio section start -->
	<section id="portfolio"  class="darker">
            <div class="tt">
		<div class="transbox col-md-4 col-sm-6">
			<header>
				<h2>What is the purpose of this site?</h2>
				<p>It allows any amauter clubs or Gym clubs provide attendance sheet to there players/customers in professional way.
                </p>
                <p>
                that by adding there club into our website so players can find it and use the attendance sheet for that club				</p>
			</header>
                    </div>
			<div id="single-project"></div>
			<div class="row" style="margin-right: 0px; margin-left: 0px;">
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/1.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
						<a href="projects/project-1.html">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/2.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
						<a href="projects/project-1.html">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/3.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
						<a href="projects/project-1.html">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/4.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
						<a href="projects/project-1.html">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/5.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
						<a href="projects/project-1.html">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/6.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
						<a href="projects/project-1.html">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
			</div>
		</div>
	</section>
	<!-- Portfolio section end -->
	<!-- Contact section start -->
	<section id="contact">
		<div class="container">
			<header>
				<h2>Contact us</h2>
				<p>We going to reply t you within 48 hours
				</p>
			</header>
			

			<div class="row">
				<div class="col-md-8">
					<form class="row" method="post">
						<div class="form-group col-md-6">
                            <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            						</div>
                            <div class="form-group col-md-6">
                            <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                            						<div class="form-group col-md-6">
                            <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            						</div>
                            <div class="form-group col-md-6">
                            <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                            						<div class="form-group col-md-12">
                            <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control">
                            						</div>
                            						<div class="form-group col-md-12">
                            <textarea class="form-control" id="message" name="message" placeholder="Enter your message here" rows="7"></textarea>
                            						</div>
                            						<div class="form-group sub-res col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</div>
					</form>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<address>
						<span>For suggestion or issues</span>
						<p>
							Please contact us on the email below or by using the contact form in the left side
						</p>
					</address>
					<address>
						<span>Email</span>
						<p>majed05400@gmail.com</p>
					</address>
					<address>
						<span>Phone</span>
						<p><a href="tel:0459909544">Click Here To Call Support 0459909544</a></p>
					</address>
				</div>
			</div>
		</div>
        
          
	</section>
	<!-- Contact section end -->
	<!-- Footer start -->
	<footer>
		<div class="container">
			<div class="row footer-res">
                <p>&copy; 2016 by <a  target="_blank">Majed Almutairi</a></p>
				<span>تواصل معنا</span>
				
			</div>
            <div class="row footer-res">
                
                
                <ul class="social-icons">
                        
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/Ass3bGr7" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-dribbble"></i></a></li>
						<li><a href=""><i class="fa fa-behance"></i></a></li>
			     </ul>
                 
            </div>
		</div>
        
	</footer>
	<!-- Footer end  -->

	<!-- Load jQuery -->
	<!--<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>-->

	<!-- Load Booststrap -->
	<!--<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="js/smooth-scroll.js"></script>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>-->

	<!-- Load custom js for theme -->
	<script type="text/javascript" src="js/app.js"></script>
    
    
</body>
</html>
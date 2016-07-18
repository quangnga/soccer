<?php
$this->layout = false;
?>
<!DOCTYPE html>
<!--[if lte IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>Katsnap Photography</title>


	<meta name="author" content="Technical Knockouts">
	<meta name="description" content="Katsnap Photography">
	<meta name="keywords" content="katsnap, photography, childcare, photoshoot, headshots, kids, grownups, commercial, photos">


	<!-- Favicon
	<link rel="shortcut icon" href="favicon.png" type="image/png">-->
    <?php
echo $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));
?>



	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Cardo:400,400italic|Montserrat:700,400' rel='stylesheet' type='text/css'>

 <?php

     echo $this->Html->css('maven/loader.css');
     echo $this->Html->css('maven/framework.css');
     echo $this->Html->css('maven/style.css');
     echo $this->Html->css('maven/custom.css');
    echo $this->Html->css('custom.css');
?>
	<!-- Colors
	<link rel="stylesheet" type="text/css" href="css/maven/colors/blue.css" media="screen"> -->
    <?php echo $this->Html->css('maven/colors/blue.css'); ?>
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/red.css" media="screen"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/green.css" media="screen"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/yellow.css" media="screen"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/pink.css" media="screen"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/orange.css" media="screen"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/gray.css" media="screen"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/purple.css" media="screen"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/colors/steel.css" media="screen"> -->


	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css" />
	<![endif]-->


	<!-- Javascript -->
<?php echo $this->Html->script('jquery.js');
    echo $this->Html->script('modernizr.js');?>
</head>
<body>
	<!-- Loader -->
	<div class="loader center dark">
		<div class="loader-content">
			<img src="<?php echo $this->request->webroot; ?>images/logo.png" width="300" height="50" alt="logo"><br>
			<span class="progress-container"><span class="progress"></span></span>
		</div>
		<script type="text/javascript">
			$(window).load(function(){
				$('.loader').delay(1000).fadeOut('slow');
			});
		</script>
	</div><!-- END LOADER -->

	<!-- Header -->
	<header>
		<!-- Logo -->
		<div class="header-inner">
			<a class="logo" href="#"><img src="<?php echo $this->request->webroot; ?>images/logo.png" alt="logo" width="300" height="50"></a>
		</div>

		<!-- Menu Button -->
		<div class="menu-button">
			<span class="before"></span>
			<span class="main"></span>
			<span class="after"></span>
		</div>
	</header><!-- END Header -->

	<!-- Navigation -->
	<nav class="push-nav push-right" style="background-image: url('<?php echo $this->request->webroot; ?>img/index/Preview/<?= h($landing->first()->navbar_picture)?>');">
		<!-- Logo -->
		<div class="logo-nav"><a href="#"><img src="<?php echo $this->request->webroot; ?>images/logo.png" alt="logo" width="300" height="50"></a></div>
		<div class="footer-nav">
			<!-- Social -->
			<ul class="social">
				<li><a href="#" onClick="window.open('https://www.facebook.com/KatsnapMelbourne', '_blank')"><i class="social-icon-facebook" style="font-size:40px;"></i></a></li>
						<li><a href="#" onClick="window.open('http://instagram.com/katsnaptagram?ref=badge', '_blank')"><i class="social-icon-instagram" style="font-size:40px;"></i></a></li>
			</ul>

			<!-- Copyright -->
			<h6>Copyright © <?php echo date("Y") ?>  Katsnap Photography</h6>
		</div>

		<!-- Links -->
		<ul class="navigation">
			<li><a class="scroll-to" href="#section1">Welcome</a></li>
			<li><a class="scroll-to" href="#section2">What I Do</a></li>
			<li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "childcare_gallery_preview"])?>">Childcare</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "kids_grownups_gallery_preview"])?>">Kids &amp; Grown Ups</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "headshots_gallery_preview"])?>">Headshots</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "commercial_gallery_preview"])?>">Commercial</a></li>
            <li><a class="scroll-to" href="#section5">Portfolio</a></li>
			<li><a class="scroll-to" href="#section6">About</a></li>
			<li><a class="scroll-to" href="#section9">Contact Us</a></li>
		</ul>
	</nav><!-- END Navigation -->

	<!-- Main Wrap -->
	<div class="navigation-overlay"></div>
	<div id="wrap">

		<!-- Hero -->
		<section id="section1" class="hero video-background dark center nav-trigger">
			<!-- Video Container -->
			<div id="bgVideo" data-0="transform: translate3d(0px, 0px, 0px);" data-top-bottom="transform: translate3d(0px, 300%, 0px);"></div>

			<!-- Hero Content -->
			<div class="container hero-content">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1" data-0="opacity: 1;" data-top-bottom="opacity: 0;">
					<h1><?= $landing->first()->title ?></h1>
					<span class="separator"></span>
					<p style="font-size:27px;"><?= nl2br(h($landing->first()->text)) ?></p>
					<h5><?php $temp = $landing->toArray(); echo $temp['0']['signature'];
					//debug($landing->toArray()); ?></h5>
				</div>
			</div>

			<!-- Scroll Icon -->
			<a class="icon-scroll" href="#section2"  data-0="opacity: 1;" data-100="opacity: 0;">
				<i class="icon-basic-magic-mouse"></i>
		   	</a>
		</section><!-- END Hero -->

		<!-- Feature boxes -->
		<section id="section2" class="container center padded">
			<!-- Title -->
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<h4>What I Do.</h4>
					<p class="sub-heading"><?= h($gallery->first()->intro) ?></p>
				</div>
			</div>

			<!-- Boxes -->
			<div class="row">
				<!-- 1 -->
				<div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="0.5s">
					<i class="icon-medium icon-basic-laptop"></i>
					<span class="separator-small"></span>
					<h5><?= $gallery->first()->title?></h5>
					<p><?= $gallery->first()->text?></p>

                    <div class="row">
				<div class="col-xs-12 wow fadeInUp call-to-action" data-wow-delay="0.5s">
					<a href="#section5" class="button">More Info</a>
				</div>
			</div>
				</div>
				<!-- 2 -->
				<div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="0.8s">
					<i class="icon-medium icon-basic-laptop"></i>
					<span class="separator-small"></span>
					<h5><?= $gallery->first()->title_1?></h5>
					<p><?= $gallery->first()->text_1?></p>

                    <div class="row">
				<div class="col-xs-12 wow fadeInUp call-to-action" data-wow-delay="0.8s">
					<a href="#section5" class="button">More Info</a>
				</div>
			</div>
				</div>
				<!-- 3 -->
				<div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="1.1s">
					<i class="icon-medium icon-basic-keyboard"></i>
					<span class="separator-small"></span>
					<h5><?= $gallery->first()->title_2?></h5>
					<p><?= $gallery->first()->text_2?></p>

                    <div class="row">
				<div class="col-xs-12 wow fadeInUp call-to-action" data-wow-delay="1.1s">
					<a href="#section5" class="button">More Info</a>
				</div>
			</div>
				</div>
                <!-- 5 -->
				<div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="1.4s">
					<i class="icon-medium icon-basic-keyboard"></i>
					<span class="separator-small"></span>
					<h5><?= $gallery->first()->title_3?></h5>
					<p><?= $gallery->first()->text_3?></p>
                    <div class="row">
				<div class="col-xs-12 wow fadeInUp call-to-action" data-wow-delay="1.4s">
					<a href="#section5" class="button">More Info</a>
				</div>
			</div>
				</div>


			</div>

		</section><!-- END Feature Boxes -->

		<!-- Text Slider -->
		<section id="section3" class="poster center padded dark" style="background-image: url('<?php echo $this->request->webroot; ?>img/capabilities/Preview/<?= h($capability->first()->photo)?>');">
			<div class="container">
				<!-- Background Border -->
				<div class="border-shape"></div>

				<!-- Title -->
				<div class="row">
					<div class="col-xs-12 wow fadeInUp" data-wow-delay="0.5s">
						<p class="sub-heading">Katsnap Capabilities</p>
					</div>
				</div>

				<!-- Slider -->
				<div class="row">
					<div class="royalSlider rsDefault wow fadeInUp" data-wow-delay="0.8s">

						<!-- Slide 1 -->
						<div class="rsContent">
							<div class="rsABlock">
								<h2 class="col-xs-12"><?= $capability->first()->title_1?></h2>
								<p class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><?= $capability->first()->text_1?></p>
							</div>
						</div>

						<!-- Slide 2 -->
						<div class="rsContent">
							<div class="rsABlock">
								<h2 class="col-xs-12"><?= $capability->first()->title_2?></h2>
								<p class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><?= $capability->first()->text_2?></p>
							</div>
						</div>

						<!-- Slide 3 -->
						<div class="rsContent">
							<div class="rsABlock">
								<h2 class="col-xs-12"><?= $capability->first()->title_3?></h2>
								<p class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><?= $capability->first()->text_3?></p>
							</div>
						</div>

						<!-- Slide 4 -->
						<div class="rsContent">
							<div class="rsABlock">
								<h2 class="col-xs-12"><?= $capability->first()->title_4?></h2>
								<p class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><?= $capability->first()->text_4?></p>
							</div>
						</div>

						<!-- Slide 5 -->
						<div class="rsContent">
							<div class="rsABlock">
								<h2 class="col-xs-12"><?= $capability->first()->title_5?></h2>
								<p class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><?= $capability->first()->text_5?></p>
							</div>
						</div>

					</div>
				</div><!-- END SLIDER -->

			</div><!-- END Container -->
		</section><!-- END Text Slider -->

		<!-- Begin Progress Slider -->
		<section id="section4" class="center padded black">
			<!-- Title -->
			<div><p class="sub-heading wow fadeInRight" data-wow-delay="0.5s">The process.</p></div>

			<!-- Slider -->
			<div class="royalSlider rsProgress">
				<!-- Slide 1 -->
				<div class="rsContent wow fadeInRight" data-wow-delay="0.8s">
					<!-- Progress Bar -->
					<span class="progress-bar start"></span>

					<div class="container">
						<!-- Icon -->
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 icon">
								<i class="icon-large icon-basic-book-pencil"></i>
							</div>
						</div>

						<!-- Heading -->
						<div class="row">
							<div class="col-xs-12">
								<h2><?= $process->first()->title_1?></h2>
							</div>
						</div>

						<!-- Text -->
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<p><?= $process->first()->text_1?></p>
							</div>
						</div>
					</div>

					<!-- Tab Control -->
					<span class="rsTmb">01</span>
				</div><!-- END Slide -->

				<!-- Slide 2 -->
				<div class="rsContent">
					<!-- Progress Bar -->
					<span class="progress-bar"></span>

					<div class="container">
						<!-- Icon -->
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 icon">
								<i class="icon-large icon-basic-display"></i>
							</div>
						</div>

						<!-- Heading -->
						<div class="row">
							<div class="col-xs-12">
								<h2><?= $process->first()->title_2?></h2>
							</div>
						</div>

						<!-- Text -->
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<p><?= $process->first()->text_2?></p>
							</div>
						</div>
					</div>

					<!-- Tab Control -->
					<span class="rsTmb">02</span>
				</div><!-- END Slide -->

				<!-- Slide 3 -->
				<div class="rsContent">
					<!-- Progress Bar -->
					<span class="progress-bar finish"></span>

					<div class="container">
						<!-- Icon -->
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 icon">
								<i class="icon-large icon-basic-flag1"></i>
							</div>
						</div>

						<!-- Heading -->
						<div class="row">
							<div class="col-xs-12">
								<h2><?= $process->first()->title_3?></h2>
							</div>
						</div>

						<!-- Text -->
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 ">
								<p><?= $process->first()->text_3?></p>
							</div>
						</div>
					</div>

					<!-- Tab Control -->
					<span class="rsTmb">03</span>
				</div>
			</div><!-- END Slider -->
		</section><!-- END Progress Slider -->

		<!-- Begin Portfolio -->
		<section id="section5" class="center padded nb">
			<div class="container">
				<!-- Title -->
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 wow fadeInUp" data-wow-delay="0.3s">
						<h4>Portfolio</h4>
					</div>
				</div>

				<!-- Filters -->
				<div class="row">
					<ul class="col-xs-12 filters">
						<li data-filter="*" class="is-checked wow fadeInUp" data-wow-delay="0.5s">All</li>
						<li data-filter=".portfolio" class="wow fadeInUp" data-wow-delay="0.8s">Portfolio</li>
						<li data-filter=".childcare" class="wow fadeInUp" data-wow-delay="1s">Childcare</li>
                        <li data-filter=".kidsgrownups" class="wow fadeInUp" data-wow-delay="1.2s">Kids &amp; Grown Ups</li>
						<li data-filter=".headshots" class="wow fadeInUp" data-wow-delay="1.2s">Headshots</li>
                        <li data-filter=".commercial" class="wow fadeInUp" data-wow-delay="1.2s">Commercial</li>
					</ul>
				</div>
			</div><!-- END Container -->

			<div class="thumbnails dark">
				<div class="thumbnail childcare">
					<div class="overlay"></div>
					<div class="project-info">
						<div class="picInfo"><?= $port->first()->tag?></div>
					</div>
					<?php echo $this->Html->image('portfolio/Preview/'.$port->first()->photo,['alt'=>'thumbnail']); ?>
				</div>
				<div class="thumbnail childcare">
					<div class="overlay"></div>
					<div class="project-info">
						<div class="picInfo"><?= $port->first()->tag_1?></div>
					</div>
					<?php echo $this->Html->image('portfolio/Preview/'.$port->first()->photo_1,['alt'=>'thumbnail']); ?>
				</div>
				<div class="thumbnail portfolio">
					<div class="overlay"></div>
					<div class="project-info">
						<div class="picInfo"><?= $port->first()->tag_2?></div>
					</div>
					<?php echo $this->Html->image('portfolio/Preview/'.$port->first()->photo_2,['alt'=>'thumbnail']); ?>
				</div>
				<div class="thumbnail kidsgrownups">
					<div class="overlay"></div>
					<div class="project-info">
						<div class="picInfo"><?= $port->first()->tag_3?></div>
					</div>
					<?php echo $this->Html->image('portfolio/Preview/'.$port->first()->photo_3,['alt'=>'thumbnail']); ?>
				</div>
				<div class="thumbnail headshots">
					<div class="overlay"></div>
					<div class="project-info">
						<div class="picInfo"><?= $port->first()->tag_4?></div>
					</div>
					<?php echo $this->Html->image('portfolio/Preview/'.$port->first()->photo_4,['alt'=>'thumbnail']); ?>
				</div>
				<div class="thumbnail commercial">
					<div class="overlay"></div>
					<div class="project-info">
						<div class="picInfo"><?= $port->first()->tag_5?></div>
					</div>
					<?php echo $this->Html->image('portfolio/Preview/'.$port->first()->photo_5,['alt'=>'thumbnail']); ?>
				</div>
				<div class="thumbnail commercial">
					<div class="overlay"></div>
					<div class="project-info">
						<div class="picInfo"><?= $port->first()->tag_6?></div>
					</div>
					<?php echo $this->Html->image('portfolio/Preview/'.$port->first()->photo_6,['alt'=>'thumbnail']); ?>
				</div>
			</div><!-- END Thumbnails -->
		</section><!-- END Portfolio -->

		<!-- Begin Team Block -->
		<section id="section6" class="container center padded" style="padding-bottom:50px;">
			<!-- Title -->
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<h4><?= h($abouttext->first()->header)?></h4>
					<p class="sub-heading">A little bit about me.</p>
				</div>
			</div>

			<!-- Photos -->
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<!-- Photo -->
                    <div  class="wow fadeInLeft" data-wow-delay="0.5s" align="right">
					<p><?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[0])?>
</p>
                    </div>
                    <div  class="wow fadeInLeft" data-wow-delay="2.5s" align="right">
                    <?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[1])?></div>
                    <div  class="wow fadeInLeft" data-wow-delay="5.5s" align="right"><?=h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[2])?></div>

                    <div  class="wow fadeInLeft" data-wow-delay="8.5s" align="right">
                    <p><?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[3])?></p>
                    </div>
                    <div  class="wow fadeInLeft" data-wow-delay="11.5s" align="right">
                    <p><?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[4])?></p>
                    </div>
				</div>

				<div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-delay="0.0s">
					<!-- Photo -->
					<?php echo $this->Html->image('About/Preview/'.$abouttext->first()->photo,['class'=>'img-rounded','width'=>'304','height'=>'236']) ?>

					<!-- Team Info
					<div class="team-info clearfix">
						<span class="contact-information">
							<p>Dick Grayson</p>
							<h6>Ceo</h6>
						</span>
						<div class="mail"><a href="#"><i class="icon-basic-mail"></i></a></div>
					</div> -->
				</div>

				<div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-delay="1.0s">
					<div  class="wow fadeInRight" data-wow-delay="15.5s" align="left">
					<p> <?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[5])?></p>
                    </div>
                    <div  class="wow fadeInRight" data-wow-delay="18.5s" align="left">
                    <p><?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[6])?></p>
                    </div>
                    <div  class="wow fadeInRight" data-wow-delay="22.0s" align="left">
                    <p><?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[7])?></p>
                    </div>
                    <div  class="wow fadeInRight" data-wow-delay="24.5s" align="left">
                    <p><?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[8])?></p>
                    </div>
                    <div  class="wow fadeInRight" data-wow-delay="27.5s" align="left">
                    <p><?= h(preg_split("/((\r?\n)|(\r\n?))/",$abouttext->first()->paragraph)[9])?></p>
                    </div>
				</div>
			</div>
            <br>
			<div class="row">
				<div class="col-xs-12">
					<div  class="wow fadeInUp" data-wow-delay="29.5s">
						<?= h($abouttext->first()->end_greeting) ?>
                    </div>
                    <div  class="wow fadeInUp" data-wow-delay="30.5s">
                    Katrin
                    </div>
				</div>
                <div class="row" style="margin-top:100px;">

						<a href="#" onClick="window.open('https://www.facebook.com/KatsnapMelbourne', '_blank')"><i class="social-icon-facebook wow fadeInUp" data-wow-delay="0.5s" style="font-size:50px;color:#0C7883;"></i></a>
						<a href="#" onClick="window.open('http://instagram.com/katsnaptagram?ref=badge', '_blank')"><i class="social-icon-instagram wow fadeInUp" data-wow-delay="0.5s" style="font-size:50px;color:#0C7883;"></i></a>
                </div>
                 <div class="row">
				<div class="col-xs-12 wow fadeInUp call-to-action" data-wow-delay="0.8s">
					<a href="#section9" class="button">Contact Us</a>
				</div>
			</div>



<!--
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 twitter call-to-action">
					<h5>latest <i class="social-icon-twitter"></i> tweet</h5>
					<span class="separator-small"></span>
					<div id="twit-feed"></div>
					<a class="button" href="#section9">get in touch</a>
				</div>
			</div>

-->		</section>
<!--

		<section id="section7" class="poster accent center padded" style="background-image: url(images/parallax2.jpg);">
			<div class="container">

				<div class="row">
					<div class="col-xs-12">
						<h4>The pricing.</h4>
					</div>
				</div>


				<div class="row">

					<div class="col-xs-12 col-sm-4">

						<div class="pricing-title">
							<div class="pricing-head wow fadeInUp" data-wow-delay="0.8s"></div>
							<h5 class="wow fadeInUp" data-wow-delay="0.6s">Web Page</h5>
							<h2 class="dollar-sign wow fadeInUp" data-wow-delay="0.7s">2000</h2>
						</div>


						<ul class="pricing-list">
							<li>Website Graphic Design</li>
							<li>Technical Implementation</li>
							<li>Google AdWords Campaign</li>
							<li>SEO Optimization</li>
						</ul>
					</div>


					<div class="col-xs-12 col-sm-4">

						<div class="pricing-title">
							<div class="pricing-head wow fadeInUp" data-wow-delay="1.1s"></div>
							<h5 class="wow fadeInUp" data-wow-delay="0.9s">CMS Site</h5>
							<h2 class="dollar-sign wow fadeInUp" data-wow-delay="1s">3500</h2>
						</div>


						<ul class="pricing-list">
							<li class="uppercase">Web page</li>
							<li class="uppercase">+</li>
							<li>CMS Admin Panel</li>
							<li>Free Hosting &amp; Domain</li>
						</ul>
					</div>


					<div class="col-xs-12 col-sm-4">

						<div class="pricing-title">
							<div class="pricing-head wow fadeInUp" data-wow-delay="1.3s"></div>
							<h5 class="wow fadeInUp" data-wow-delay="1.1s">Full service</h5>
							<h2 class="dollar-sign wow fadeInUp" data-wow-delay="1.2s">5000</h2>
						</div>


						<ul class="pricing-list">
							<li class="uppercase">CMS Site</li>
							<li class="uppercase">+</li>
							<li>Full Branding Service</li>
							<li>Social Media Integration</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

-->
		<section id="section8" class="center padded container" style="padding-top:50px;">
			<!-- Title --><hr><br><br>
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<h4>Gossip</h4>
                    <span class="separator"></span>
					<p class="sub-heading wow fadeInUp" data-wow-delay="0.5s">I’ve had the pleasure to work together with some remarkable people.</p>
				</div>
			</div>

			<!-- Client List -->

<section class="bg-primary" id="Gossip" data-type="background" style="background-position: 50% -73.1667px;">
    <div class="container">
        <div class="row">

            <div class="col-md-12 wow fadeIn" data-wow-delay="1.0s">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
						<li data-target="#quote-carousel" data-slide-to="0" class="active">
						</li>
						<li data-target="#quote-carousel" data-slide-to="1">
						</li>
						<li data-target="#quote-carousel" data-slide-to="2">
						<li data-target="#quote-carousel" data-slide-to="3">
						</li>
						<li data-target="#quote-carousel" data-slide-to="4">
						</li>
						<li data-target="#quote-carousel" data-slide-to="5">
						</li>
                    </ol>

                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner text-center">

                        <!-- Quote 1 -->
                        <div class="item active">
                            <blockquote style="background:#fff;">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

										<p><?= $gossip->first()->comment ?></p>
										<p><?= $gossip->first()->author ?></p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 2 -->
                        <div class="item">
                            <blockquote style="background:#fff;">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

										<p><?= $gossip->first()->comment_1 ?></p>
										<p><?= $gossip->first()->author_1 ?></p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 3 -->
                        <div class="item">
                            <blockquote style="background:#fff;">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

										<p><?= $gossip->first()->comment_2 ?></p>
										<p><?= $gossip->first()->author_2 ?></p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote style="background:#fff;">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

										<p><?= $gossip->first()->comment_3 ?></p>
										<p><?= $gossip->first()->author_3?></p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote style="background:#fff;">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

										<p><?= $gossip->first()->comment_4 ?></p>
										<p><?= $gossip->first()->author_4 ?></p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote style="background:#fff;">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

										<p><?= $gossip->first()->comment_5 ?></p>
										<p><?= $gossip->first()->author_5 ?></p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

		</section><!-- END Clients -->

		<!-- Begin Contact -->
		<section id="section9" class="contact center">
			<!-- Switch -->
			<div class="switch dark">
				<button class="radio">
					<span class="elipse"></span>
				</button>
				<h5>Map</h5>
			</div>

			<!-- Contact Form -->
			<div class="map-overlay padded dark " style="background-image: url('<?php echo $this->request->webroot; ?>img/ContactForm/Preview/<?= h($info->first()->photo)?>');">
				<div class="container">
					<!-- Title -->
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
							<h4>Contact Us</h4>
                                                        <p class="sub-heading"><i class="fa fa-phone fa-fw"></i> <?=  h($info->first()->phone )?></p>
                            <p class="sub-heading"><i class="fa fa-envelope fa-fw"></i> <?=  h($info->first()->mail )?></p>
							<p class="sub-heading"><?=  h($info->first()->message )?></p>
						</div>
					</div>

					<!-- Form -->
					<div class="row">
						<div class="col-xs-12 col-lg-10 col-lg-offset-1">
							<?= $this->Form->create($contactForm) ?>
								<fieldset style="border:0px;">
									<div class="float-left">
										<div class="form-field name wow fadeInUp" data-wow-delay="0.5s">
											<label for="name">First Name</label>
											<span><?php echo $this->Form->input('first_name',array('class' => 'form-control','placeholder' => 'Your Name','label'=>false));?></span>
										</div>
										<div class="form-field email wow fadeInUp" data-wow-delay="1.0s">
											<label for="email">Email</label>
											<span><?php echo $this->Form->input('email',array('class' => 'form-control','placeholder' => 'E-mail Address','label'=>false)); ?></span>
										</div>


									</div>

									<div class="float-right">
										<div class="form-field email wow fadeInUp" data-wow-delay="0.5s">
											<label for="email">Last Name</label>
											<span><?php echo $this->Form->input('last_name',array('class' => 'form-control','placeholder' => 'Last Name','label'=>false)); ?></span>
										</div>
                                        <div class="form-field email wow fadeInUp" data-wow-delay="1.0s">
											<label for="email">Phone Number</label>
											<span><?php echo $this->Form->input('phone_number',array('class' => 'form-control','placeholder' => 'Phone Number','label'=>false)); ?></span>
										</div>

									</div>
                                    <div class="form-field email wow fadeInUp" data-wow-delay="1.5s">
											<label for="email">Subject</label>
											<span><?php echo $this->Form->input('subject',array('class' => 'form-control','placeholder' => 'What it is about?','label'=>false)); ?></span>
										</div>
                                    <div class="form-field message wow fadeInUp" data-wow-delay="2.0s">
											<label for="message">Message</label>
											<span><?php echo $this->Form->input('content',array('class' => 'form-control','placeholder' => 'Let me now wht on your mind!','label'=>false,'rows'=>'7')); ?></span>
										</div>
								</fieldset>
								<div class="form-click wow fadeInUp" data-wow-delay="2.5s">
									<button  class = 'btn btn-primary btn-lg'   >Send message</button>
									<!--<?= $this->Form->button(__('Send message'), ['class' => 'btn btn-primary btn-lg','formnovalidate' => true]) ?>-->								</div>
							<?= $this->Form->end() ?>
						</div>
					</div>
				</div><!-- END Container -->
			</div><!-- END Contact Form -->

			<!-- Map -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
			<script type="text/javascript">
		            function initialize() {
					  var myLatlng = new google.maps.LatLng(-37.87584,145.04365);
					  var mapOptions = {
					    zoom: 20,
					    scrollwheel: false,
					    center: myLatlng,
					    mapTypeId: google.maps.MapTypeId.HYBRID
					  }
					  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

					  var marker = new google.maps.Marker({
					      position: myLatlng,
					      map: map,
					      title: 'Form'
					  });
					}

					google.maps.event.addDomListener(window, 'load', initialize);
					google.maps.event.addDomListener(window, 'resize', initialize);
			</script>
			<div id="map" class="clearfix"></div>

		</section><!-- END Contact -->

		<!-- Begin Footer -->
		<footer class="center black">
			<div class="container">
				<!-- Social -->
				<div class="row">
					<ul class="social col-xs-12">
						<li><a href="#" onClick="window.open('https://www.facebook.com/KatsnapMelbourne', '_blank')"><i class="social-icon-facebook" style="font-size:40px;"></i></a></li>
						<li><a href="#" onClick="window.open('http://instagram.com/katsnaptagram?ref=badge', '_blank')"><i class="social-icon-instagram" style="font-size:40px;"></i></a></li>
					</ul>
				</div>

				<!-- Copyright -->
				<div class="row">
					<div class="col-xs-12"><h6>copyright © <?php echo date("Y") ?> Katsnap Photography</h6></div>
				</div>
			</div><!-- END Container -->
		</footer><!-- END Footer -->

	</div><!-- END Main Wrap -->


	<!-- IE 8 PAGE -->
	<div class="modern-browser">
		<div class="modern-container center dark">
			<img src="<?php echo $this->request->webroot; ?>images/logo.png" alt="logo">
			<h1>Welcome to Katsnap Photography.</h1>
			<span class="separator"></span>
			<p>Sorry, our website doesn't support your web-browser.<br>Maybe something more modern would do the trick.</p>
			<a href="http://www.google.com/chrome/" target="_blank" class="button">download chrome</a>
		</div>
	</div><!-- END IE 8 PAGE -->

    <?php echo $this->Html->script('retina.js');
    echo $this->Html->script('navigation.js');
    echo $this->Html->script('plugins.js');
    echo $this->Html->script('main.js');
    echo $this->Html->script('jquery.js');
    echo $this->Html->script('jquery.fittext.js');
    echo $this->Html->script('bootstrap.min.js');
    echo $this->Html->script('wow.min.js');
    echo $this->Html->script('creative.js');
    echo $this->Html->script('jquery.easing.min.js');?>

</body>
<script>
	window.onload = function() {
		if(!window.location.hash) {
			window.location = window.location + '#loaded';
			window.location.reload();
		}
if(window.location.hash=='#section1'){
			window.location = window.location + 'loaded';
			window.location.reload();
		}
        if(window.location.hash=='#section2'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
        if(window.location.hash=='#section3'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
        if(window.location.hash=='#section4'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
        if(window.location.hash=='#section5'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
        if(window.location.hash=='#section6'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
        if(window.location.hash=='#section7'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
        if(window.location.hash=='#section8'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
        if(window.location.hash=='#section9'){
            window.location = window.location + 'loaded';
            window.location.reload();
        }
	}
</script>
</html>
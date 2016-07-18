<?php
$this->layout = false;
?>
<!DOCTYPE html>
<!--[if lte IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Katsnap Commercial</title>

    <!-- Core Meta Data -->
	<meta name="author" content="Technical Knockouts">
	<meta name="description" content="Katsnap Photography">
	<meta name="keywords" content="katsnap, photography, photoshoot, commercial, photos">

    <!-- Favicon -->
    <?php
echo $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));
?>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Cardo:400,400italic|Montserrat:700,400' rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <?php

    echo $this->Html->css('maven/loader.css');
    echo $this->Html->css('maven/framework.css');
    echo $this->Html->css('maven/style.css');
    echo $this->Html->css('maven/custom.css');
echo $this->Html->css('/font-awesome/css/font-awesome.min.css');
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
        <img src="../images/logo.png" width="300" height="50" alt="logo"><br>
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
        <a class="logo" href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index"])?>"><img src="../images/logo.png" alt="logo" width="300" height="50" ></a>
    </div>

    <!-- Menu Button -->
    <div class="menu-button">
        <span class="before"></span>
        <span class="main"></span>
        <span class="after"></span>
    </div>
</header><!-- END Header -->

<!-- Navigation -->
<nav class="push-nav push-right" style="background-image: url('<?php echo $this->request->webroot; ?>img/gallery/Preview/<?=h($gallery->first()->commercial_navbar) ?>');">
    <!-- Logo -->
    <div class="logo-nav"><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index"])?>"><img src="../images/logo.png" alt="logo" width="300" height="50" ></a></div>
    <div class="footer-nav">
        <!-- Social -->
        <ul class="social">
				<li><a href="#" onClick="window.open('https://www.facebook.com/KatsnapMelbourne', '_blank')"><i class="social-icon-facebook" style="font-size:40px;"></i></a></li>
						<li><a href="#" onClick="window.open('http://instagram.com/katsnaptagram?ref=badge', '_blank')"><i class="social-icon-instagram" style="font-size:40px;"></i></a></li>
			</ul>

        <!-- Copyright -->
        <h6>Copyright © <?php echo date("Y") ?> Katsnap Photography</h6>
    </div>

    <!-- Links -->
    <ul class="navigation">
        <li><a class="scroll-to" href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index_preview"])?>">Welcome</a></li>
			<li><a class="scroll-to" href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index_preview"])?>">What I Do</a></li>
			<li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "childcare_gallery_preview"])?>">Childcare</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "kids_grownups_gallery_preview"])?>">Kids &amp; Grown Ups</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "headshots_gallery_preview"])?>">Headshots</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "commercial_gallery_preview"])?>">Commercial</a></li>
            <li><a class="scroll-to" href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index_preview"])?>">Portfolio</a></li>
			<li><a class="scroll-to" href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index_preview"])?>">About</a></li>
			<li><a class="scroll-to" href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index_preview"])?>">Contact</a></li>
    </ul>
</nav><!-- END Navigation -->

<!-- Main Wrap -->
<div class="navigation-overlay"></div>
<div id="wrap">

    <!-- Hero -->
    <section class="poster dark center padded-xl nav-trigger" style="background-image: url('<?php echo $this->request->webroot; ?>img/gallery/Preview/<?=h($gallery->first()->commercial_header) ?>');" data-0="background-position: 0px 0px;" data-top-bottom="background-position: 0px 100px">

        <!-- Hero Content -->
        <div class="container">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1" data-0="opacity: 1;" data-top-bottom="opacity: 0;">
                <h2>Commercial</h2>
                <span class="separator"></span>
                <h5><?= h($gallery->first()->commercial_header_description) ?></h5>
                <div class="row">
				<div class="col-xs-12 wow fadeInUp call-to-action" data-wow-delay="0.8s">
					<a href="#section5" class="button">Commercial Gallery</a>
				</div>
			</div>
            </div>
        </div>
    </section><!-- END Hero -->

    <!-- Feature boxes -->
    <section id="section2" class="container center padded" style="padding-bottom:0px;padding-top:0px;">
        <!-- Title -->
        <div class="row wow fadeIn" data-wow-delay="1.0s">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <h4>PHOTO SHOOTS</h4>
                <p class="sub-heading"> <?=  h($gallery->first()->commercial_text)?><p>
            </div>
        </div>

        <!-- Boxes -->
        <div class="row">
            <!-- 1 -->
            <div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="0.5s">
                <i class="fa fa-star fa-fw fa-3x" style="padding:5px;margin-bottom:15px;"></i>
                <span class="separator-small"></span>
                <h5>Special Event</h5>

            </div>
            <div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="0.8s">
                <i class="fa fa-building fa-fw fa-3x" style="padding:5px;margin-bottom:15px;"></i>
                <span class="separator-small"></span>
                <h5>Commerical Shoot</h5>


            </div>
            <!-- 3 -->
            <div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="1.1s">
                <i class="fa fa-bullhorn fa-fw fa-3x" style="padding:5px;margin-bottom:15px;"></i>
                <span class="separator-small"></span>
                <h5>Product/Foods</h5>

            </div>
            <!-- 5 -->
            <div class="feature-box col-sm-3 wow fadeInUp" data-wow-delay="1.4s">
                <i class="fa fa-users fa-fw fa-3x" style="padding:5px;margin-bottom:15px;"></i>
                <span class="separator-small"></span>
                <h5>Bulk Company Headshots</h5>

            </div>

        </div>
        <br><br>

        <row class="col-lg-10 col-lg-offset-1">
            <ul align="center" class="sub-heading" style="font-size:21px;">
                <?php foreach(preg_split("/((\r?\n)|(\r\n?))/",$gallery->first()->commercial_points) as $point):?>
                    <li class="pageInfo wow fadeInUp" data-wow-delay="1.5s"><?php echo $point?></li>
                <?php endforeach; ?>
            </ul>
            <br><br><hr>
        </row>


    </section><!-- END Feature Boxes -->
    <!-- End Blog Block -->

    <!-- Begin Portfolio -->
    <section id="section5" class="center padded nb" style="margin-top:0px;padding-top:30px;margin-bottom:50px;">
<h4 class="wow fadeInUp">Commercial Gallery</h4>
        <span class="separator-small"></span>
        <div class="thumbnails dark">
            <div class="thumbnails dark">
                <div class="thumbnail childcare">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_1) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_1,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail childcare">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_2) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_2,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail portfolio">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_3) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_3,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail kidsgrownups">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_4) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_4,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail headshots">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_5) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_5,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail commercial">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_6) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_6,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail commercial">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_7) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_7,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail commercial">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_8) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_8,['class'=>'img-responsive','alt'=>''])?>
                </div>
                <div class="thumbnail commercial">
                    <div class="overlay"></div>
                    <div class="project-info">
                        <div class="picInfo"><?=h($gallery->first()->commercial_tag_9) ?></div>
                    </div>
                    <?php echo $this->Html->image('gallery/Preview/'.$gallery->first()->commercial_9,['class'=>'img-responsive','alt'=>''])?>
                </div>
            </div><!-- END Thumbnails -->
    </section><!-- END Portfolio -->

    <!-- Begin Footer -->
    <footer class="center black">
        <div class="container">
            <!-- Social -->
            <div class="row">
                <ul class="social">
				<li><a href="#" onClick="window.open('https://www.facebook.com/KatsnapMelbourne', '_blank')"><i class="social-icon-facebook" style="font-size:40px;"></i></a></li>
						<li><a href="#" onClick="window.open('http://instagram.com/katsnaptagram?ref=badge', '_blank')"><i class="social-icon-instagram" style="font-size:40px;"></i></a></li>
			</ul>
            </div>

            <!-- Copyright -->
            <div class="row">
                <div class="col-xs-12"><h6>Copyright © <?php echo date("Y") ?> Katsnap Photography</h6></div>
            </div>
        </div><!-- END Container -->
    </footer><!-- END Footer -->

</div><!-- END Main Wrap -->

<!-- IE 8 PAGE -->
<div class="modern-browser">
    <div class="modern-container center dark">
        <img src="../images/logo.png" alt="logo">
        <h1>Welcome to Maven.</h1>
        <span class="separator"></span>
        <p>Sorry, our website doesn't support your web-browser.<br>Maybe something more modern would do the trick.</p>
        <a href="http://www.google.com/chrome/" target="_blank" class="button">download chrome</a>
    </div>
</div><!-- END IE 8 PAGE -->


<!-- Javascript -->
<?php echo $this->Html->script('retina.js');
echo $this->Html->script('navigation.js');
echo $this->Html->script('plugins.js');
echo $this->Html->script('main.js');
echo $this->Html->script('styleswitch.js');?>

</body>
<script>
    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
</script>
</html>
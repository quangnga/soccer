<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>


        <?php echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('animate.min.css');
            echo $this->Html->css('creative.css');
            echo $this->Html->css('/font-awesome/css/font-awesome.min.css');
        ?>

            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</head>
<body>
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a <?= $this->Html->link(__('Katsnap Photography'), ['action' => 'Index'], ['class' => 'navbar-brand page-scroll']) ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a <?= $this->Html->link(__('About'), ['controller' => 'Pages','action' => 'About']) ?></a>
                        </li>
                        <li>
                            <a <?= $this->Html->link(__('Galleries'), ['controller' => 'Pages','action' => 'Galleries']) ?></a>
                        </li>
                        <li>
                            <a <?= $this->Html->link(__('Gossip'), ['controller' => 'Pages','action' => 'Gossip']) ?></a>
                        </li>
                        <li>
                            <a <?= $this->Html->link(__('Info'), ['controller' => 'Pages','action' => 'Info']) ?></a>
                        </li>
                        <li>
                            <a <?= $this->Html->link(__('Portfolio'), ['controller' => 'Pages','action' => 'Portfolio']) ?></a>
                        </li>
                        <li>
                            <a <?= $this->Html->link(__('Contact Us'),[ 'action' => 'add']) ?></a>
                        </li>

                    </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<section id="contact">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Contact Us</h2>
                <hr class="primary">
                <p><?= h($info->first()->message )?></p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x wow bounceIn"></i>
                <p><?= h($info->first()->phone )?></p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                <p><?= h($info->first()->mail )?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post">
                            <br>
                            <fieldset>
                                <br>
                                <legend class="header1">Contact Form</legend>
                                <?= $this->Form->create($contactForm) ?>
                                <fieldset>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-1 text-center"><i                                            class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->input('first_name',array('class' => 'form-control','placeholder' => 'First Name','label'=>false)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-1 text-center"><i                                            class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->input('last_name',array('class' => 'form-control','placeholder' => 'Last Name','label'=>false)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-1 text-center"><i                                             class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->input('email',array('class' => 'form-control','placeholder' => 'Email Address','label'=>false)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->input('phone_number',array('class' => 'form-control','placeholder' => 'Phone Number','label'=>false)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->input('subject',array('class' => 'form-control','placeholder' => 'Subject','label'=>false)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-1 text-center"></span>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->input('content',array('class' => 'form-control','placeholder' => 'Enter Your Message Here!','label'=>false,'rows'=>'7')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    </fieldset>
                                    <div class="col-md-12 text-center">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-lg']) ?>
                                    </div>
    <?= $this->Form->end() ?>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .header1 {
                color: #f05f40;
                font-size: 27px;
                padding: 10px;
                margin-left: 100px;
            }

            .bigicon {
                font-size: 35px;
                color: #f05f40;
            }
        </style>
    </div>


</section>

<section id="Thanks" class="section_wrapper" data-type="background" style="background-position: 50% -288px;">
    <div class="slider_overlay">
        <div class="header">
            <br>
            <br>
            <h2 align="center">Thank you for visiting.</h2>
            <hr class="primary">
            <p>
                <a href="http://www.katsnap.com.au/wp-content/uploads/2014/02/katsnapPaw1.png"> </a>
                <img src="http://www.katsnap.com.au/wp-content/uploads/2014/02/katsnapPaw1.png" style="margin:auto; display:block">
            </p>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center" style="margin-top: 115px; color: white;">
                    <h4>Copyright © 2015  :: Katsnap Photography - Melbourne</h4>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/creative.js"></script>
<script>
    src = "js/bootstrap-lightbox.js"
</script>
</body>
</html>
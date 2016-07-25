<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Football Time</title>
        <?php
        echo $this->Html->meta('favicon.ico', 'img/favicon.ico', array('type' => 'icon'));
        ?>
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <!-- Icons Library-->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <!-- GLOBAL STYLES - Include these on every page. -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
        <!-- Bootstrap core CSS
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> -->
        <?php
        echo $this->Html->css('bootstrap.css');
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('custom.css');
        echo $this->Html->css('style.css');
        echo $this->Html->css('/font-awesome/css/font-awesome.min.css');
        echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
        ?>

    </head>

    <body>
        <!-- Fixed navbar -->

        <div id="wrapper">

            <!-- begin TOP NAVIGATION -->
            <nav class="navbar-top" role="navigation">

                <!-- begin BRAND HEADING -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                        <i class="fa fa-bars"></i> Menu
                    </button>
                    <div>
                        <a <?= $this->Html->link(__('كورة تايم'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'navbar-brand page-scroll']) ?></a>
                        <!--<img src="<?php echo $this->request->webroot; ?>img/logoo.png" class="img-responsive" alt="">-->
                        </a>
                    </div>
                </div>
                <!-- end BRAND HEADING -->

                <div class="nav-top">

                    <!-- begin LEFT SIDE WIDGETS -->
                    <ul class="nav navbar-left">
                        <li class="tooltip-sidebar-toggle">
                            <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Sidebar Toggle">

                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                        </li>
                        <!-- You may add more widgets here using <li> -->
                    </ul>
                    <!-- end LEFT SIDE WIDGETS -->

                    <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
                    <ul class="nav navbar-right">

                        <!-- begin USER ACTIONS DROPDOWN -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'index']) ?>" target="_blank">
                                        <i class="fa fa-globe"></i> Visit Website
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'changepassword']) ?>">
                                        <i class="fa fa-gear"></i> Reset Password
                                    </a>
                                </li>

                                <li>
                                    <a class="logout_open" href="#logout">
                                        <i class="fa fa-sign-out"></i> Logout
                                        <strong><?= ($first_name) ?> <?= ($last_name) ?></strong>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-menu -->
                        </li>
                        <!-- /.dropdown -->
                        <!-- end USER ACTIONS DROPDOWN -->
                    </ul>
                    <!-- /.nav -->
                    <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

                </div>
                <!-- /.nav-top -->
            </nav>
            <!-- /.navbar-top -->
            <!-- end TOP NAVIGATION -->

            <!-- begin SIDE NAVIGATION -->
            <nav class="navbar-side animated slideInLeft" role="navigation">
                <div class="navbar-collapse sidebar-collapse collapse">
                    <ul id="side" class="nav navbar-nav side-nav">
                        <!-- begin SIDE NAV USER PANEL -->
                        <li class="side-user hidden-xs">
                            <img class="img-circle" src="<?php echo $this->request->webroot; ?>img/logoo.png" alt="">
                            <p class="welcome">
                                <i class="fa fa-key"></i> Logged in as
                            </p>
                            <p class="name tooltip-sidebar-logout">
<?= ($first_name) ?>
                                <span class="last-name"><?= ($last_name) ?></span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
                            </p>
                            <div class="clearfix"></div>
                        </li>
                        <!-- begin DASHBOARD LINK -->
                        <li>
                            <a href="<?php echo $this->Url->build(['controller' => 'dashboard', 'action' => 'index']) ?>">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'index']) ?>" target="_blank">
                                <i class="fa fa-globe"></i> Visit Website
                            </a>

                        </li>

                        <li>
                            <a class="logout_open" href="#logout">
                                <i class="fa fa-sign-out logout_open"></i> Logout
                            </a>
                        </li>
                        <!-- end PAGES DROPDOWN -->
                    </ul>
                    <!-- /.side-nav -->
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- /.navbar-side -->
            <!-- end SIDE NAVIGATION -->

            <!-- begin MAIN PAGE CONTENT -->
            <div id="page-wrapper">

                <p>&nbsp;</p>
                <div class="page-content">
                    <!-- HTML to write -->
                    <div class="page-header">
                        <!--<h1><?= $this->fetch('title') ?></h1></div> -->

<?= $this->Flash->render() ?>


                        <div class="row">
<?= $this->fetch('content') ?>
                        </div>
                    </div>
                </div>
                <!-- /#page-wrapper -->
                <!-- end MAIN PAGE CONTENT -->
            </div>
            <!-- /#wrapper -->

            <div id="logout" class="logout-loggout">
                <div class="logout-message">
                    <img class="img-circle img-logout" src="<?php echo $this->request->webroot; ?>img/logoo.png" alt="">
                    <h3>
                        <i class="fa fa-sign-out text-red" ></i> 
                        هل تريد فعلاً الخروج؟
                    </h3>
                    <p>فضلاً أكد الخروج من خلال الضغط على "خروج"</p>
                    <ul class="list-inline">
                        <li>
                            <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" class="btn btn-green">
                                <strong>Logout</strong>
                            </a>
                        </li>
                        <li>
                            <button class="logout_close btn btn-green">Cancel</button>
                        </li>
                    </ul>
                </div>
            </div>



<?php
echo $this->Html->script('pace.js');
//<!-- GLOBAL SCRIPTS -->

echo $this->Html->script('bootstrap.min.js');
echo $this->Html->script('jquery.slimscroll.min.js');
echo $this->Html->script('jquery.popupoverlay.js');
echo $this->Html->script('defaults.js');
echo $this->Html->script('logout.js');
echo $this->Html->script('hisrc.js');
echo $this->Html->script('flex.js');
echo $this->Html->script('messenger.min.js');
echo $this->Html->script('messenger-theme-flat.js');
echo $this->Html->script('wow.min.js');
echo $this->Html->script('jquery.easing.min.js');
echo $this->Html->script('modernizr.custom.js');
echo $this->Html->script('bootstrap-datepicker.js');
echo $this->Html->script('classie.js');
echo $this->Html->script('notificationFx.js');
?>


            <script>
                $(function () {
                    $('[data-toggle="popover"]').popover()
                })
            </script>

            <script>
                $(document).ready(function () {
                    $("#MyModal").modal();
                });
            </script>


    </body>

</html>
<?php
$this->layout = false;
?>

<title>Katsnap Dashboard</title>
<?php
echo $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));
?>

    <head>

        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <?php
    echo $this->Html->css('bootstrap.min.css');
    echo $this->Html->css('plugins.css');
    echo $this->Html->css('style.css');
    echo $this->Html->css('/font-awesome/css/font-awesome.min.css');
    
    echo $this->Html->css('animate.css');
    echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
   ?>
    </head>

    <body class="login">
     <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
               <?= $this->Flash->render(); ?>
    <?= $this->Form->create(null, []) ?>
                <div class="login-banner text-center">
                    <h1><i class="fa fa-gears"></i> User Login</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Login to Katsnap Dashboard!</strong>
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                    <?= $this->Form->input('username',array('class' => 'form-control','placeholder' => 'Enter Username')) ?>
                                </div>
                                <div class="form-group">
                    <?= $this->Form->input('password', ['type' => 'password','class' => 'form-control','placeholder' => 'Enter Password']) ?>
                                </div>
                                <div class="form-group">
                    <?= $this->Form->submit(__('Log In'), ['class' => 'btn btn-lg btn-primary btn-block']) ?></div>
                    <?= $this->Form->end() ?>
                            </fieldset>

                            <p class="small">
                                <a <?php echo $this->Html->link('Forgot Password', ['controller'=>'Users','action' => 'resetPassword']);
?></a>  
                                                  
                            </p>
                            <p class="small">
                                  
                               <a <?php echo $this->Html->link('Register', ['controller'=>'Users','action' => 'register']);
?></a>                     
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

           <?php

    echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    echo $this->Html->script('bootstrap.min.js');
    echo $this->Html->script('jquery.slimscroll.min.js');
    echo $this->Html->script('hisrc.js');
    echo $this->Html->script('flex.js');
?>
 </body>
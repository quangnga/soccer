


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
   ?>
    </head>

    <body class="login">
     <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
               <?= $this->Flash->render(); ?>
                    <?php
                    echo $this->Form->create('User', array(
                    'url'   => array('controller'=>'users', 'action' => 'sendCodeActive/' ))); ?>
                        <?php $field=''; ?>
                <div class="login-banner text-center">
                    <h1><i class="fa fa-gears"></i> Confirm account </h1>
                </div>
                <div class="portlet portlet-green">
                        <div class="portlet-heading login-heading">
                            <div class="portlet-title">
                                <h4><strong>Complete Confirm!</strong>
                                </h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portlet-body">
                            <p>Please check your email and enter code active form below.</p>
                            <form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                     <?php echo $this->Form->input('code',array('class' => 'form-control','placeholder' => 'Enter code', 'label' => 'Code'));?>
                                </div>
                                <div class="form-group">
                                     <?= $this->Form->button(__('Send'), ['class' => 'btn btn-lg btn-green btn-block']) ?>
                                    <?php echo $this->Form->end();?>
                            </fieldset>
                                        <br>
                             </form>
                                </div>
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

<style>
   h4 a{
        color: yellow;
    }
    h4 a:hover{
       color: yellow;
       text-decoration: chocolate; 
    }
</style>

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
        <div class="row" style="text-align: center;">
            <?php echo $this->html->image('logoo.png',['width'=>'250px','height'=>'250px']);?>
            <br />
            <h3 style="color: #fff;">Your account actived! Register completed.</h3>
            <h4 style="color: #fff;">Login Click <?php echo $this->Html->link(
                'here',
                ['controller' => 'Users', 'action' => 'login',]
            );?>
            </h4>
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
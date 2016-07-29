
<!-- -set the title page  -->
<?php $this->set('title', 'Change Password');
$id = $this->request->session()->read('Auth.User.id');?>

<!-- show the current locaiton -->             
 <ol class="breadcrumb">
<li><?php echo $this->Html->link( 'Home', '/', ['class' => 'button']);?></li>
  <li ><?php echo $this->Html->link('My account',['controller'=> 'pages', 'action' =>  'Myaccount']); ?></li>
  <li class="active"><?php echo $this->Html->link('Change my password',['controller'=> 'Users', 'action' =>  'changepassword']); ?></li>

</ol>

<!-- side bar-->
<ul class="nav nav-pills nav-stacked col-sm-2">
  <li role="presentation"  ><?php echo $this->Html->link('My home',['controller'=> 'pages', 'action' =>  'Myaccount']); ?></li>
  <li role="presentation"  ><?php echo $this->Html->link('My profile', ['controller'=> 'Users','action' => 'edit',$id]); ?></li>
  <li role="presentation" class="active"><?php echo $this->Html->link('Change my password', ['controller'=> 'Users','action' => 'changepassword']); ?></li>

<li role="presentation">
    <?php if ( $this->request->session()->read('Auth.User.email')==="majed054000@gmail.com") {
      echo $this->Html->link('Add new product', ['controller'=> 'products','action' => 'add']);
    } 
    ?>   </li>
  <li role="presentation">
    <?php if ( $this->request->session()->read('Auth.User.email')==="majed054000@gmail.com") {
      echo $this->Html->link('View all customers', ['controller'=> 'Users','action' => 'index']);
    } 
    ?>   </li>
     <li role="presentation">
    <?php if ( $this->request->session()->read('Auth.User.email')==="majed054000@gmail.com") {
      echo $this->Html->link('Edit page contents', ['controller'=> 'contents','action' => 'edit',$id=2]);
    }    
    ?>   
    
  </li>
  <li role="presentation">
    <?php if ( $this->request->session()->read('Auth.User.email')==="majed054000@gmail.com") {
      echo $this->Html->link('Add new customer', ['controller'=> 'Users','action' => 'add']);
    }    
    ?>   
    
  </li>

  <li role="presentation">
    <?php  if ( $this->request->session()->read('Auth.User.email')==="majed054000@gmail.com") {
      echo $this->Html->link('Manage sales', ['controller'=> 'Orders','action' => 'index']); }else{
      echo $this->Html->link('Orders', ['controller'=> 'Orders','action' => 'index']);    }  
    ?>   
  </li>
  <li role="presentation">
    <?php if ( $this->request->session()->read('Auth.User.email')==="majed054000@gmail.com") {
      echo $this->Html->link('Manage shippingcost', ['controller'=> 'Shippingcosts','action' => 'index']);
    }    
    ?>   
    
  </li>
  <li role="presentation">
    <?php if ( $this->request->session()->read('Auth.User.email')==="majed054000@gmail.com") {
      echo $this->Html->link('Manage Products', ['controller'=> 'Products','action' => 'index']);
    }    
    ?>   
    
  </li>

</ul>

<div class="col-sm-7 col-sm-offset-2 basic-login form">
    <?= $this->Form->create($user, array('novalidate', true)) ?>
    <fieldset>

           
            <div class="form-group">
            <?= $this->Form->input('old_password', ['placeholder' => 'Please enter your old password','class'=>'form-control','type'=>'password',array('maxLength'=>'6')]);?>
            <!--'type'=>'password' so this filed will be hashed-->
            </div>
            <div class="form-group">
            <?= $this->Form->input('New_password', ['placeholder' => 'Please enter your new password (8-16 digits)','class'=>'form-control','type'=>'password',array('maxLength'=>'6')]);?>
            <!--'type'=>'password' so this filed will be hashed-->
            </div>
            <div class="form-group">
            <?= $this->Form->input('Confirm_your_new_password',['class'=>'form-control','placeholder' => 'Please type your new password again','type'=>'password']);?>
            </div>
            
            <div class="clearfix"></div>
     </fieldset>
    
     <?=  $this->Html->link( 'Go back', '/pages/Myaccount',['class' => 'btn btn-default']); ?>
    <?= $this->Form->button('Make Change',['class'=>'btn btn-default']) ?>
    


    <?= $this->Form->end() ?>
    </div>



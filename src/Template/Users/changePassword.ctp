
<!-- -set the title page  -->
<?php $this->set('title', 'Change Password');
$id = $this->request->session()->read('Auth.User.id');?>

<!-- show the current locaiton -->             


<!-- side bar-->
<ul class="nav nav-pills nav-stacked col-sm-2">
  <li role="presentation"  ><?php echo $this->Html->link('الصفحة الرئيسية',['controller'=> 'dashboard', 'action' =>  'index']); ?></li>
  <li role="presentation"  ><?php echo $this->Html->link('بياناتي الشخصية', ['controller'=> 'Users','action' => 'edit',$id]); ?></li>
  <li role="presentation" class="active"><?php echo $this->Html->link('تغيير كلمة المرور', ['controller'=> 'Users','action' => 'changepassword']); ?></li>

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
            <?= $this->Form->input('كلمة المرور القديمة', ['placeholder' => 'من فضلك أدخل كلمة المرور القديمة لك','class'=>'form-control','type'=>'password',array('maxLength'=>'6')]);?>
            <!--'type'=>'password' so this filed will be hashed-->
            </div>
            <div class="form-group">
            <?= $this->Form->input('كلمة المرور الجديدة', ['placeholder' => 'من فضلك, ادخل كلمة المرور الجديدة (يجب ان تحتوي على حرف واحد وارقام على الاقل)','class'=>'form-control','type'=>'password',array('maxLength'=>'6')]);?>
            <!--'type'=>'password' so this filed will be hashed-->
            </div>
            <div class="form-group">
            <?= $this->Form->input('أعد كتابة كلمة المرور الجديدة',['class'=>'form-control','placeholder' => 'فضلاً أعد كاتبة كلمة المرور الجديدة هنا','type'=>'password']);?>
            </div>
            
            <div class="clearfix"></div>
     </fieldset>
    
     <?=  $this->Html->link( 'الرجوع', '/pages/Myaccount',['class' => 'btn btn-default']); ?>
    <?= $this->Form->button('تأكيد التغيير',['class'=>'btn btn-default']) ?>
    


    <?= $this->Form->end() ?>
    </div>



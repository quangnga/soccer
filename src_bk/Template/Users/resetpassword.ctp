


<div class="col-md-9">
    <?php echo $this->Form->create('User', array('controller'=>'Users', 'action' => 'resetPassword')); ?>
    <div class="form-group">
        <?php echo $this->Form->input('email',array('class' => 'form-control','placeholder' => 'Please Enter Your Email'));?>
    </div>
    <?= $this->Form->button(__('Reset Password')) ?>
    <?php echo $this->Form->end();?>
</div>



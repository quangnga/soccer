<style>
.edit-users{
text-align: center;
}
</style>
<?php
if(($is_admin == 0 && $user->id == $id ) || $is_admin == 1|| ($is_admin == 2 && $user->club_id == $club_id )){
?>
</style><div class="page-title">
    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
    </li>
    <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> Users</a></li>
    <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> Edit <?= h($user->first_name) ?> <?= h($user->last_name) ?></li>
</ol>
</div>
<div class="col-md-12 col-lg-6 col-lg-offset-3">
<div class="portlet portlet-default">
    <div class="portlet-heading">
        <div class="portlet-title">
            <h4><strong><?= h($user->first_name) ?> <?= h($user->last_name) ?></strong> Edit Form</h4>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="basicFormExample" class="panel-collapse collapse in">
        <div class="portlet-body">
            <li><?= $this->Html->link(__('العودة للقائمة الرئيسية'), ["controller" => "dashboard", "action" => "index"]) ?></li>
        </ul>
    </nav>
    <div class="users form large-9 medium-8 columns content">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Edit User') ?></legend>
            <?php
            if($is_admin == 1){
            ?>
            <div class="form-group col-md-6">
                
                <div class="form-group">
                    <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => 'Enter First name', 'maxlength' => '20', 'label' => ' First name *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'أدخل إسمك الأحير', 'maxlength' => '20', 'label' => ' Last name *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Enter Email', 'maxlength' => '20', 'label' => ' Email *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Enter Username', 'maxlength' => '20', 'label' => ' Username *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('phone_number', array('class' => 'form-control', 'placeholder' => 'Enter phone number', 'maxlength' => '20', 'label' => ' Phone number *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                
                    <select name="club_id">
                        <option value="<?php echo $user->club['id']?>">
                            <?php echo $user->club['club_name']?>
                        </option>
                        
                    </select>
                    
                </div>
            </div>
            <?php } else{?>
            <div class="form-group col-md-6">
                
                <div class="form-group">
                    <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => 'Enter First name', 'maxlength' => '20', 'label' => ' First name *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'أدخل إسمك الأحير', 'maxlength' => '20', 'label' => ' Last name *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Enter Email', 'maxlength' => '20', 'label' => ' Email *')); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('phone_number', array('class' => 'form-control', 'placeholder' => 'Enter phone number', 'maxlength' => '20', 'label' => ' Phone number *')); ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('position ', array('options' => array('Keeper' => 'Keeper','Deffender' => 'دفاع','Deffender-left' => ' دفاع - أيسر','Deffender-right' => ' دفاع - أيمن','center' => 'محور','middle' => 'وسط', 'Forward' => 'هجوم'))); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('age', array('class' => 'form-control', 'placeholder' => 'Enter age', 'maxlength' => '3', 'label' => ' Age *')); ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-default', 'formnovalidate' => true)) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
}else{

?>
<div class="edit-users">
    <h1>
    Data not found!
    </h1>
    <?php echo $this->Html->link('Back >>', ['controller'=>'Users','action' => 'index']);?>
</div>

<?php
}
?>
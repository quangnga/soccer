<div class="page-title">
    <h1><?= h($user->first_name) ?> <?= h($user->last_name) ?> Permissions</h1>

    <ol class="breadcrumb">
      
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""])?>"><i class="fa fa-users"></i> Users</a></li>
        <li class="active animated slideInRight"><i class="fa fa-users animated slideInRight"></i> Change User Permissions</li>
    </ol>
</div>



<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""])?>">
        <button type="button" class="btn btn-default animated fadeInDown"><i class="fa fa-building-o"></i> List Users</button>
    </a>
</div>
<br>


<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong><?= h($user->first_name) ?> <?= h($user->last_name) ?></strong> Permissions </h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

    <?= $this->Form->create($acl) ?>
        <fieldset style="border:0px;">
           <div class="row">
            <div  class="form-group col-xs-6">
            <?php echo $this->Form->label('Clubs');?>

            <div class="form-group">
                <?php  echo $this->Form->input('clubs',array('class' => 'checkbox','type'=>'checkbox', 'label'=>false)); ?>
            </div>
            </div>






                <div  class="form-group col-xs-6">
                            <?php echo $this->Form->label('Users');?>
            <div class="form-group">
                <?php  echo $this->Form->input('users',array('class' => 'checkbox','type'=>'checkbox', 'label'=>false)); ?>
            </div>
            </div>

            <br>


                           </fieldset>
                        <div align="center">
                    <div class="form-group">
                        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-default')) ?>
                            <?= $this->Form->end() ?>
                    </div>
                    </div>
                </div>
            </div>
  </div>
</div>

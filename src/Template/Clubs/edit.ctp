<?php
    if( $is_admin == 1|| ($is_admin == 2 && $club_id == $club->id )){
?>
<style>
    #page-wrapper {

        min-height: 900px;

    }
</style><div class="page-title">
    <h1>View <?= h($club->club_name) ?> <?= h($club->city) ?></h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> clubs</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> View <?= h($club->club_name) ?> </li>
    </ol>
</div>
<!-- left col -->


<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default animated slideInLeft"><i class="fa fa-Clubs"></i> List Clubs</button></a>

    <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "View", $club->id]) ?>"><button type="button" class="btn btn-orange animated fadeInDown"><i class="fa fa-pencil"></i> View <strong><?= h($club->club_name) ?> <?= h($club->city) ?></strong></button></a>
    <?php if($is_admin==1) {?>
    <a href="#logout">
        <button type="button" class="btn btn-red animated slideInRight" data-toggle="modal" data-target="#standardModal"><i class="fa fa-remove"></i> Delete <strong><?= h($club->club_name) ?> <?= h($club->city) ?></strong></div></button>

    </a>
    <?php }?>
</div>
<br>


<div class="col-md-12 col-lg-8 col-lg-offset-2">
    <div class="portlet portlet-blue">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong><?= h($club->club_name) ?> <?= h($club->city) ?></strong> Edit Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <?= $this->Form->create($club) ?>
                <fieldset style="border:0px;">

                    <div class="form-group">
                        <div class="indicatorBlue">
                            * Indicates required field
                        </div>
                    </div>

                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('club_name', array('class' => 'form-control', 'placeholder' => 'Enter Club Name', 'maxlength' => '45', 'label' => 'Club Name *')); ?>
                        </div>
                    </div>


                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('club_email', array('class' => 'form-control', 'placeholder' => 'Enter Club Email', 'maxlength' => '45', 'label' => 'Club email *')); ?>
                        </div>
                    </div>

                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('phone1', array('class' => 'form-control', 'placeholder' => 'Enter phone 1', 'maxlength' => '45', 'label' => 'Club phone 1 *')); ?>
                        </div>
                    </div>


                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('phone2', array('class' => 'form-control', 'placeholder' => 'Enter phone number 2', 'maxlength' => '45', 'label' => 'club phone number 2 *')); ?>
                        </div>
                    </div>

                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => 'Enter city', 'maxlength' => '45', 'label' => 'club city *')); ?>
                        </div>
                    </div>


                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('address', array('class' => 'form-control', 'placeholder' => 'Enter address', 'maxlength' => '45', 'label' => 'Club address *')); ?>
                        </div>
                    </div>


                    <table class="table table-bordered table-blue">
                        <thead>
                            <tr>
                                <th>الأثنين</th>
                                <th>الثلاثاء</th>
                                <th>الأربعاء</th>
                                <th>الخميس</th>
                                <th>الجمعة</th>
                                <th>السبت</th>
                                <th>الأحد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>
                                    <div style="margin-left:40%;"><?php echo $this->Form->input('monday', array('class' => 'checkbox', 'type' => 'checkbox', 'label' => false)); ?></div></td>
                                <td><div style="margin-left:40%;"><?php echo $this->Form->input('tuesday', array('class' => 'checkbox', 'type' => 'checkbox', 'label' => false)); ?></div></td>
                                <td><div style="margin-left:40%;"><?php echo $this->Form->input('wednesday', array('class' => 'checkbox', 'type' => 'checkbox', 'label' => false)); ?></div></td>
                                <td><div style="margin-left:40%;"><?php echo $this->Form->input('thursday', array('class' => 'checkbox', 'type' => 'checkbox', 'label' => false)); ?></div></td>
                                <td><div style="margin-left:40%;"><?php echo $this->Form->input('friday', array('class' => 'checkbox', 'type' => 'checkbox', 'label' => false)); ?></div></td>
                                <td><div style="margin-left:40%;"><?php echo $this->Form->input('saturday', array('class' => 'checkbox', 'type' => 'checkbox', 'label' => false)); ?></div></td>
                                <td><div style="margin-left:40%;"><?php echo $this->Form->input('sunday', array('class' => 'checkbox', 'type' => 'checkbox', 'label' => false)); ?></div></td>
                            </tr>
                        </tbody>
                    </table>



                </fieldset>

                <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-blue', 'formnovalidate' => true)) ?>
                <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="logout-message">
            <img class="img-circle img-logout" src="<?php echo $this->request->webroot; ?>img/rm.png" alt="">

            <h3>
                </i> Are you sure?
            </h3>
            <p>Select "Delete" below if you are sure
                <br> you want to delete  <strong><?= h($club->club_name) ?> <?= h($club->city) ?></strong>.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "Delete", $club->id]) ?>" class="btn btn-red">
                        <strong>Delete</strong>
                    </a>
                </li>
                <li>
                    <button type="button" class="btn btn-red" data-dismiss="modal">Cancel</button>
                </li>
            </ul>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
    }else{
        
?>

   <h3>
        Data not found!
   </h3> 
<?php
    }
?>
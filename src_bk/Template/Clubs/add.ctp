<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">
    <h1>Add club</h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> Club</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> Add Club</li>
    </ol>
</div>

<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Add club Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <?= $this->Form->create($club) ?>
                <fieldset style="border:0px;">
                    <div class="form-group">
                        <div class="indicatorDefault">
                            * Indicates required field
                        </div>
                    </div>

                    <div class="row">
                        <div  class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('training_id', ['options' => $trainings, array('type' => 'options', 'class' => 'form-control')]); ?>
                            </div>
                        </div>

                    </div>

                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('club_name', array('class' => 'form-control', 'placeholder' => 'Enter First club name', 'maxlength' => '45', 'label' => ' Club Name *')); ?>
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('club_email', array('class' => 'form-control', 'placeholder' => 'Enter club email', 'maxlength' => '50', 'label' => ' Email *')); ?>
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('phone1', array('class' => 'form-control', 'placeholder' => 'Enter Phone number1', 'maxlength' => '10', 'label' => 'Phone number *')); ?>
                        </div>
                    </div>



                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('phone2', array('class' => 'form-control', 'placeholder' => 'Enter Phone Number 2', 'maxlength' => '20')); ?>
                        </div>
                    </div>

                    <div  class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => 'Enter city', 'maxlength' => '20')); ?>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('address', array('class' => 'form-control', 'placeholder' => 'Enter Address', 'maxlength' => '10', 'label' => 'Address *')); ?>
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
                <div class="row" align="center">
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
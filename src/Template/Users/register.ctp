<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">
    <h1>Add User</h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> clubs</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> Users</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> Add User</li>
    </ol>
</div>



<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>">
        <button type="button" class="btn btn-default animated fadeInDown"><i class="fa fa-users"></i> List Users</button>
    </a>
</div>
<br />


<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Add User Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create($user) ?>
                <fieldset style="border:0px;">
                    <div class="form-group">
                        <div class="indicatorDefault">
                            * Indicates required field
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => 'Enter first name', 'maxlength' => '20', 'label' => ' First name', 'autocapitalize' => 'words')); ?>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('lasst_name', array('class' => 'form-control', 'placeholder' => 'Enter last Name', 'maxlength' => '45', 'label' => 'last Name', 'autocapitalize' => 'words')); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('email', array('class' => 'form-control', 'type'=>'email', 'placeholder' => 'Enter email ', 'maxlength' => '45', 'label' => 'email')); ?>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Enter username', 'maxlength' => '20')); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('phone_number', array('class' => 'form-control', 'placeholder' => 'Enter Phone number', 'maxlength' => '50', 'label' => ' phone number')); ?>
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Enter Password', 'maxlength' => '20', 'label' => ' Password')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->password('confirm_password', array('class' => 'form-control', 'placeholder' => 'Confirm Password', 'maxlength' => '20', 'label' => 'Confirm Password')); ?>
                    </div>

                    <div  class="form-group col-md-6">

                        <div class="form-group">
                            <?php echo $this->Form->input('coming', array('class' => 'form-control', 'type' => 'checkbox', 'placeholder' => 'are you coming? enter 1 for coming.', 'maxlength' => '20', 'label' => 'coming')); ?>
                        </div>

                        <div class="form-group">
                            
                            <select name="city" onchange="getclubs($(this))" class="showcity">
                                <option>---select city---</option>
                                <?php foreach($cities as $city){ ?>
                                    
                                    <option  value="<?php echo $city['id'] ?>"><?php echo $city['city_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group showresultclubs">
                            
                        </div>
                        
                    </div>
                </fieldset>
                <div class="row" align="center">

                    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default">Cancel</button></a>


                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-default', 'formnovalidate' => true)) ?>
                    <?= $this->Form->end() ?>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
function getclubs(o){
    var city = o.val();
        $.ajax({
        url:'<?php echo $this->Url->build(["controller" => "Users", "action" => "getclubs", ""]);?>',
        data: { city_id: city},
        type:'POST',
        dataType:'json',
        success: function(data){
            $(".showresultclubs").html(data);
        }
    });
}
</script>
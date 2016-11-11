
<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">
    <h1>Register</h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> clubs</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> Users</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> Register</li>
    </ol>
</div>
<br />


<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Register Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
            <?= $this->Form->create($user) ?>
                <fieldset style="border:0px; ">
                
                    <div class=" row form-group "  align="center">
                        <div class="indicatorDefault">
                            * Indicates required field
                        </div>
                    </div>
                        <div class="box-ajax" style="border-bottom: 2px solid #dcdcdc; margin-bottom:5px;">
                            <div  class="form-group row" style="margin-top: 30px;" >
                                
                                
                                <div class="showhide1">  
                    
                                    <div class="form-group col-md-6">
                                            
                                            <div class="form-group showregion " style="margin-bottom: 10px!important;">
                                                
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <select name="" onchange="getregion($(this))" class="showcity form-group col-md-9">
                                        <option value="0">---select city---</option>
                                        <?php foreach($cities as $city){ ?>
                                            
                                            <option  value="<?php echo $city['id'] ?>"><?php echo $city['city_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                
                                
                            </div>
                            <?= $this->Form->create($user) ?>
                            <div class="showhide2 row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group showclub ">
                                        
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                         
                            
                            
                    
                    
                
                
                <div class="showhide3">
                    <div class="row">
                        <div class="form-group  col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => 'Enter first name', 'maxlength' => '20', 'label' => ' First name *', 'autocapitalize' => 'words')); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('lasst_name', array('class' => 'form-control', 'placeholder' => 'Enter last Name', 'maxlength' => '45', 'label' => 'last Name *', 'autocapitalize' => 'words')); ?>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                       <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('age', array('class' => 'form-control', 'placeholder' => 'Enter age', 'maxlength' => '3', 'label' => 'Age *', 'autocapitalize' => 'words')); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('position', array('options' => array('Keeper' => 'Keeper','Deffender' => 'دفاع','Deffender-left' => ' دفاع - أيسر','Deffender-right' => ' دفاع - أيمن','center' => 'محور','middle' => 'وسط', 'Forward' => 'هجوم'))); ?>
                            </div>
                        </div>
                        
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('email', array('class' => 'form-control', 'type'=>'email', 'placeholder' => 'Enter email ', 'maxlength' => '45', 'label' => 'Email *')); ?>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('phone_number', array('class' => 'form-control', 'placeholder' => 'Enter Phone number', 'maxlength' => '50', 'label' => ' phone number *')); ?>
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Enter Password', 'maxlength' => '20', 'label' => ' Password *')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->password('confirm_password', array('class' => 'form-control', 'placeholder' => 'Confirm Password', 'maxlength' => '20', 'label' => 'Confirm Password')); ?>
                    </div>
                    <div class="row" align="center">
        
                            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default">Cancel</button></a>
        
        
                            <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-default', 'formnovalidate' => true)) ?>
                            

                    </div>
                </div>
                    
                   
                </fieldset>
                 
                <?= $this->Form->end() ?>

            
            
        </div>
    </div>
</div>
</div>
<style>
.showhide, .showhide2,.showhide3{
    display: none;
}

</style>
<script type="text/javascript">
function getregion(o){
    var city = o.val();
    
    $(".test ").css('display','none');
        
    if(city == 0){
        
        $(".showhide1 ").css('display','none');
        
        $(".showregion").html('');
    }else{
        $.ajax({
            url:'<?php echo $this->Url->build(["controller" => "Users", "action" => "getregions", ""]);?>',
            data: {city_id: city},
            type:'POST',
            dataType:'json',
            
            success: function(data){
                $(".showregion").html(data);
                
                
            }
        });
        $(".showhide1").css('display','block');
        $(".test ").css('display','block');
       
    }
}
function getclub(o){
    var region = o.val();
   if(region == 0){
        
        $(".showclub").html('');
    }else{
        
        $.ajax({
            url:'<?php echo $this->Url->build(["controller" => "Users", "action" => "getclubs", ""]);?>',
            data: { region_id: region},
            type:'POST',
            dataType:'json',
            success: function(data){
                $(".showclub").html(data);
                
            }
        });
        $(".showhide2").css('display','block');
        
   }    
}
function showinput(o){
    $(".showhide3").css('display','block');
}
    
</script>

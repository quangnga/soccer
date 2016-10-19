
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
                <fieldset style="border:0px; ">
                
                    <div class=" row form-group "  align="center">
                        <div class="indicatorDefault">
                            * Indicates required field
                        </div>
                    </div>
                        
                         <div  class="form-group row" style="margin-top: 30px;" >
                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <select name="city" onchange="getregion($(this))" class="showcity form-group col-md-9">
                                        <option value="0">---select city---</option>
                                        <?php foreach($cities as $city){ ?>
                                            
                                            <option  value="<?php echo $city['id'] ?>"><?php echo $city['city_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3"></div>
                                
                                
                                
                            </div>
                    
                    
                <div class="showhide">  
                    
                    
                   <!-- <div class="row">
                        <div class="form-group col-md-6">
                            <label class="test" >Region</label> 
                            <div class="form-group showresultclubs ">
                                
                            </div>
                        </div>
                        
                        

                    </div>-->
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
                        <div class="form-group showclubname col-md-6" style="margin-top: 35px;"  id="club">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('مركز اللاعب *', array('options' => array('Keeper' => 'Keeper','Deffender' => 'دفاع','Deffender-left' => ' دفاع - أيسر','Deffender-right' => ' دفاع - أيمن','center' => 'محور','middle' => 'وسط', 'Forward' => 'هجوم'))); ?>
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
                   
                </fieldset>
                 
                <?= $this->Form->end() ?>

            </div>
            
        </div>
    </div>
</div>
</div>
<style>
.showhide{
    display: none;
}
</style>
<script type="text/javascript">
function getregion(o){
    var city = o.val();
    
    $(".test ").css('display','none');
        
    if(city == 0){
        
        $(".showhide ").css('display','none');
        
        $(".showclubname").html('');
    }else{
        $.ajax({
            url:'<?php echo $this->Url->build(["controller" => "Users", "action" => "getclubs", ""]);?>',
            data: {city_id: city},
            type:'POST',
            dataType:'json',
            success: function(data){
                $(".showclubname").html(data);
                
                
            }
        });
        $(".showhide").css('display','block');
        $(".test ").css('display','block');
       
    }
}
/*function getclub(o){
    var region = o.val();
   if(region == 0){
        
        $(".showclubname").html('');
    }else{
        
        $.ajax({
            url:'<?php echo $this->Url->build(["controller" => "Users", "action" => "getclubs", ""]);?>',
            data: { region_id: region},
            type:'POST',
            dataType:'json',
            success: function(data){
                $(".showclubname").html(data);
                
            }
        });
        
   }    
}*/
    
</script>

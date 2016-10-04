<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Add City Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                
                <fieldset style="border:0px;">
                <?= $this->Form->create($city) ?>
                    <div class="form-group">
                        <div class="indicatorDefault">
                            * Indicates required field
                        </div>
                    </div> 
                        
                    <div  class="form-group col-md-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('city_name', array('class' => 'form-control', 'placeholder' => 'Enter City name', 'maxlength' => '45', 'label' => ' City Name *')); ?>
                        </div>
                    </div>
                    <div  class="form-group col-md-12">
                        
                        <select name="region_id">
                                <option value="0"> ---Select Region---</option>
                                <?php foreach($regions as $region){?>
                                    <option value="<?php echo ($region->id) ?>"> <?php echo ($region->name) ?></option>
                                <?php        
                                    }
                                ?>
                        </select>
                        
                    </div>
                        
                    <div class="row" align="center">
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>    
    
    
    
    
                        
    
                    </fieldset>
                    
                
            </div>
        </div>
        </div>
        </div>


<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Edit Region Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <fieldset style="border:0px;">
                <?= $this->Form->create($region) ?>    
                    <div  class="form-group col-md-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Enter Region name', 'maxlength' => '45', 'label' => ' Region Name *')); ?>
                        </div>
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





<div class="cities form large-9 medium-8 columns content">
    
</div>

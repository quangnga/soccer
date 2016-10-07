<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">




<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Add Region Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create($region) ?>
                <fieldset style="border:0px;">
                    <div class="form-group">
                        <div class="indicatorDefault">
                            * Indicates required field
                        </div>
                    </div>
                    

                    

                    

                   
                    <div class="form-group">
                        <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Enter name', 'maxlength' => '20', 'label' => ' Name*')); ?>
                    </div>

                    <div class="form-group">
                        <span style="color: #ccc;">Hold the CTRL key and click the items in a list to choose multiple values</span>
                       <?php echo $this->Form->input('cities._ids', ['options' => $cities]);?>
                    </div>

                    
                </fieldset>
                <div class="row" align="center">

                    <a href="<?php echo $this->Url->build(["controller" => "Regions", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default">Cancel</button></a>

                         <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-default', 'formnovalidate' => true)) ?>
                    
                    
                    
                    <?= $this->Form->end() ?>

                </div>

            </div>
        </div>
    </div>
</div>
</div>



<style>
    #page-wrapper {

        min-height: 800px;

    }
    select, option{
        width: 100%;
    }
</style>
<div class="page-title">




<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Add a news reports</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create() ?>
                <fieldset style="border:0px;">
                    
                    
                   <div  class="form-group row">
                        
                        <div class="form-group col-md-9">
                            
                            <?php echo $this->Form->textarea('title', ['rows' => '1', 'cols' => '40']); ?>
                        </div>
                        <div class="col-md-3 form-group">
                            <strong>Subject: </strong>
                        </div>
                    </div>
                    <div  class="form-group row">
                        
                        <div class="form-group col-md-9">
                            
                             <?php echo $this->Form->textarea('content', ['rows' => '10', 'cols' => '40']); ?>
                        </div>
                        <div class="col-md-3 form-group ">
                            <strong>Report: </strong>
                        </div>
                    </div>
                    
                    

                    

                    
                </fieldset>
                <div class="row" align="center">

                    <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "reports"]) ?>"><button type="button" class="btn btn-default">Cancel</button></a>

                    <a href=""><?= $this->Form->button(__('Post'), array('class' => 'btn btn-primary','type'=>'submit', 'formnovalidate' => true)) ?></a>
                    
                    
                    
                    <?= $this->Form->end() ?>

                </div>

            </div>
        </div>
    </div>
</div>
</div>



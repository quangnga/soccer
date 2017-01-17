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
                <h4>Add a news payment list</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create($payments) ?>
                <fieldset style="border:0px;">
                    
                    <?php 
                        $options = [
                                '01' => 'January',
                                '02' => 'February',
                                '03' => 'March',
                                '04' => 'April',
                                '05' => 'May',
                                '06' => 'June',
                                '07' => 'July',
                                '08' => 'August',
                                '09' => 'September',
                                '10' => 'October',
                                '11' => 'November',
                                '12' => 'December'
                                
                            ];
                    ?>
                    
                   <div class="row">
                        <div class="col-md-2"></div>
                        <div class="form-group col-md-5">
                            <select name="month">
                                <option value="<?php echo date('m');?>">
                                    <?php echo $options[date('m')];?>
                                </option>
                            </select>
                            
                        </div>
                        <div class="form-group col-md-3">
                            Month:
                        </div>
                        <input type="hidden" name="key_random"/>

                        <div class="col-md-2"></div>
                        
                   </div>
                    

                    

                    
                </fieldset>
                <div class="row" align="center">

                    <a href="<?php echo $this->Url->build(["controller" => "Payments", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default">Cancel</button></a>

                    <a href=""><?= $this->Form->button(__('Create list'), array('class' => 'btn btn-primary','type'=>'submit', 'formnovalidate' => true)) ?></a>
                    
                    
                    
                    <?= $this->Form->end() ?>

                </div>

            </div>
        </div>
    </div>
</div>
</div>



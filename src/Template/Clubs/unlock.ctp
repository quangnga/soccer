 
 <div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Blocked Users</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in" >
            <div class="portlet-body">
                <table class="table table-hover table-striped" >
                    <thead>
                        <th style="text-align: center;">Full name</th>
                        <th style="text-align: center;">Action</th>
                    </thead>
                    <tbody>
                       
                            <?php foreach($data_block as $db){?>
                            
                                
                                    <?= $this->Form->create() ?>
                                    <tr>
                                        <input type="hidden" value="<?php echo $db['id']?>" name="id" />
                                        <td style="text-align: center;">
                                            <?php echo $db['first_name'].' '. $db['last_name'] ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?= $this->Form->button(__('Unlock'),['class'=>'btn btn-success']) ?>
                                        </td>
                                
                                    </tr>
                                    <?= $this->form->end()?>
                                 
                            <?php }?>
                            
                            
                            
                       
                    </tbody>

                </table>


            </div>
        </div>
    </div>
 
                   
                    
                    
                    
                        
                        
                            

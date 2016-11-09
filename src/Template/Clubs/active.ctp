 
 <div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>New users want to register for your Clubs</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in" >
            <div class="portlet-body">
                <table class="table table-hover table-striped" >
                    <thead>
                        <th style="text-align: center;">Full name</th>
                        <th>Position</th>
                        <th>Player info</th>
                        <th style="text-align: center;">Action</th>
                    </thead>
                    <tbody>
                       
                            <?php foreach($data_users as $db){?>
                            
                                <?= $this->Form->create() ?>
                                    
                                    <tr>
                                        <input type="hidden" value="<?php echo  $db['id']?>" name="id" />
                                        <input type="hidden" value="<?php echo  $db['email']?>" name="email" />
                                        <input type="hidden" value="<?php echo  $db['username']?>" name="username" />
                                        <td style="text-align: center;">
                                            <?php echo $db['first_name'].' '. $db['last_name'] ?>
                                        </td>
                                        <td>
                                            keeper
                                        </td>
                                        <td>
                                        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "View", $db['id']]) ?>">
                                            <button type="button" class="btn btn-orange animated fadeInDown">
                                                Info
                                            </button>
                                        </a>
                                            
                                        </td>
                                        <td>
                                            <?= $this->Form->button(__('Send code active'),['class'=>'btn btn-green animated fadeInDown']) ?>
                                            
                                        </td>
                                        
                                
                                    </tr>
                                    <?= $this->form->end()?>
                                 
                            <?php }?>
                            
                            
                            
                       
                    </tbody>

                </table>


            </div>
        </div>
    </div>
 
                   
                    
                    
                    
                        
                        
                            

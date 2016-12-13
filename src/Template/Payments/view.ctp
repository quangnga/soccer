
<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">
    

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Payments", "action" => "index"]) ?>"><i class="fa fa-users"></i> Payments</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> View <?= h($payment->month) ?></li>
    </ol>
</div>
<!-- left col -->




<div class="col-md-12 col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>View month: <?= h($payment->month) ?></h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('Name') ?></th>
                            <th><?= $this->Paginator->sort('Amount') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                           
                            <?php foreach($data_users as $data){?>
                                <tr>
                                    <?php echo $this->Form->create(null, array('url' => array('controller' => 'Users', 'action' => 'Pay',$data->user_id)));?>
                                    
                                    <td><?= h($data->name) ?></td>


                                    <td>
                                        <div class="" style="width: 50%; margin: -20px auto;">
                                        
                                            <?php echo $this->Form->input('paid_money', array('class' => 'form-control','value'=>'$'.$data->paid_money, 'type'=>'text',  'label' => '')); ?>
                                        </div>
                                                    
                                    </td>

                                    <td class="actions user_action">
                                        
                                        <?php if($data->paid_stt == 0){?>
                                            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "Pay", $data->user_id]) ?>">
                                                <button type="submit" class="btn btn-warning"> Paid <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button>
                                            </a>
                                        <?php }else{?>
                                            
                                                <button type="button" class="btn btn-success"> Been Paid <i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                           
                                        <?php }?>            
                                                
                                            
                                    </td>
                                    
                                    
                                    <?php echo $this->Form->end(); ?>
                                </tr>
                              <?php }?>  
                                
                    </tbody>
                </table>
                 
                             
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev(('previous').' >') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('< '.__('next') ) ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>


                </div>
                
                
            </div>
        </div>
    </div>
</div>

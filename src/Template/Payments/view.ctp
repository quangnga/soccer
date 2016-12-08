
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
                           <th class="actions"><?= __('Actions') ?></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                           
                            <?php foreach($data_users as $data){?>
                                <tr>
                                    
                                    
                                    <td><?= h($data->name) ?></td>


                                    

                                    <td class="actions user_action">
                                        <?php if($data->paid_stt == 0){?>
                                            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "Pay", $data->user_id]) ?>">
                                                <button type="button" class="btn btn-warning"> Paid <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "Pay", $data->user_id]) ?>">
                                                <button type="button" class="btn btn-success"> Been Paid <i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                            </a>
                                        <?php }?>    
                                            
                                            
                                    </td>
                                </tr>
                              <?php }?>  
                                
                    </tbody>
                </table>
                 
                <!--               
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev(('previous').' >') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('< '.__('next') ) ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>


                </div>-->
                
                
            </div>
        </div>
    </div>
</div>

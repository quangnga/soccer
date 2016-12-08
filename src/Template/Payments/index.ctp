<div class="page-title">


    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-dashboard animated slideInRight"></i> Users</li>
    </ol>
</div>
<div class="col-md-12 col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>List payment</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('Order') ?></th>
                            
                            <th><?= $this->Paginator->sort('Month') ?></th>
                            <th class="coming-res"><?= $this->Paginator->sort('Date of Post') ?></th>
                           
                           <th class="actions"><?= __('Actions') ?></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                            <?php $k = 1;?>
                            <?php $i = $this->Paginator->params()['page'];?>
                            <?php foreach($payments as $data){?>
                                <tr>
                                    <td>
                                         <?php $result = ($i-1)*10 + $k;
                                                        echo $result; ?>
                                    </td>
                                    <td class="coming-res"><?= h($data->month) ?></td>
                                    <?php $time = date('Y-m-d',strtotime($data->created))?>
                                    <td><?= h($time) ?></td>


                                    
                                    
                                    <td class="actions user_action">
                                
                                            <a href="<?php echo $this->Url->build(["controller" => "Payments", "action" => "View",$data->id]) ?>">
                                                <button type="button" class="btn btn-primary"> View <i class="fa fa-search"></i></button>
                                            </a>
                                            
                                            <button class="btn btn-brow"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> <i class="fa fa-minus-circle" aria-hidden="true"></i> </button>
                                            
                                    </td>
                                </tr>
                              <?php $k= $k+1; }?>  
                                
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
                <div style="text-align: center;">
                    <a href="<?php echo $this->Url->build(["controller" => "Payments", "action" => "add"]) ?>">
                        <button type="button" class="btn btn-success"> Add a new payments list <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                   </a>
                </div>
                
            </div>
        </div>
    </div>
</div>




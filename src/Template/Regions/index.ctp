</style><div class="page-title">


    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-dashboard animated slideInRight"></i> Users</li>
    </ol>
</div>
<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Regions Table</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <h3><?= __('Regions') ?></h3>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('name') ?></th>  
                            
                            <th></th>
                           <th class="actions"><?= __('Actions') ?></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($region as $data){                       
                                 
                        ?>
                                <tr>
                                    <td><?= h($data->name) ?></td>
                                    <td></td>
                                    
                                    <td class="actions">
                                
                                            <a href="<?php echo $this->Url->build(["controller" => "Regions", "action" => "View", $data->id]) ?>">
                                                <button type="button" class="btn btn-success">view<i class="fa fa-search"></i></button>
                                            </a>
                                
                                
                                            <a href="<?php echo $this->Url->build(["controller" => "Regions", "action" => "Edit", $data->id]) ?>">
                                                <button type="button" class="btn btn-orange">edit <i class="fa fa-pencil"></i></button>
                                            </a>
                                
                                
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?>
                                
                                    </td>

                                </tr>
                        <?php }  ?>

                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


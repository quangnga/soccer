<div class="page-title">


    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-dashboard animated slideInRight"></i> Matches report </li>
    </ol>
</div>
<div class="col-md-12 col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>List reports</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= ('Order') ?></th>
                            
                            <th><?= ('Subject') ?></th>
                            <th class="coming-res"><?= ('Date') ?></th>
                           
                           <th class="actions"><?= __('Actions') ?></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                            <?php $k = 1;?>
                            
                            <?php foreach($data_rep as $data){?>
                                <tr>
                                    <td>
                                         <?php $result = $k;
                                         echo $result; ?>
                                    </td>
                                    <td class="coming-res"><?= h($data->title) ?></td>
                                    <?php $time = date('Y-m-d',strtotime($data->created))?>
                                    <td><?= h($time) ?></td>


                                    
                                    
                                    <td class="actions user_action">
                                
                                            <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "reportsView",$data->id]) ?>">
                                                <button type="button" class="btn btn-primary"> View <i class="fa fa-search"></i></button>
                                            </a>
                                            
                                            <button class="btn btn-brow"><?= $this->Form->postLink(__('Delete'), ['action' => 'reportsDelete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> <i class="fa fa-minus-circle" aria-hidden="true"></i> </button>
                                            
                                    </td>
                                </tr>
                              <?php $k= $k+1; }?>  
                                
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
                <?php if($is_admin==2){?>
                <div style="text-align: center;">
                    <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "reportsAdd"]) ?>">
                        <button type="button" class="btn btn-success"> Add a new reports <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                   </a>
                </div>
                <?php }?>
                
            </div>
        </div>
    </div>
</div>




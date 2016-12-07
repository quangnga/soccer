<div class="page-title">


    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index"]) ?>"><i class="fa fa-users"></i> Clubs</a></li>

    </ol>
</div>


<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Clubs Table</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in" >
            <div class="portlet-body">
                
                <table class="table table-hover table-striped" >
                    <thead>
                        <tr>

                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('club_name') ?></th>
                            

                            <?php
                            if ($is_admin >= 0) {
                            ?>
                            <th class="actions"><?= __('Actions') ?></th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        foreach ($clubs as $club):
                        //var_dump($club);exit;
                            if ($club->id == $club_id || $is_admin == 1) {
                                ?>
                                <tr>
                                    <td><?= $this->Number->format($club->id) ?></td>
                                    <td><?= h($club -> club_name) ?></td>
                                    


                                    <td class="actions">
                                        <div class="btn-group btn-group-sm">
                                                <?php 
                                                    $today = strtolower(date("l")); //var_dump($club[$today]);exit; 
                                                ?>
                                                <?php if($club[$today] == 1){?>
                                                <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "detail", $club->id]) ?>">
                                                        <button type="button" class="btn btn-success btn-res">Detail <i class="fa fa-info-circle" aria-hidden="true"></i></i></button>
                                                </a>
                                                        
                                                <?php }else{?>
                                                <a onclick="alert('no training today');return false;" href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "detail", $club->id]) ?>">
                                                        <button type="button" class="btn btn-success btn-res">Detail <i class="fa fa-info-circle" aria-hidden="true"></i></i></button>
                                                </a>
                                                <?php }?> 
        
                                                
                                                    
                                                <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "View", $club->id]) ?>">
                                                    <button type="button" class="btn btn-primary btn-res">View <i class="fa fa-search"></i></button>
                                                </a>
                                                 <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "advanced", $club->id]) ?>">
                                                    <button type="button" class="btn btn-brown btn-res">Advanced <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                </a>
                                                <?php
                                                if ($is_admin == 1||$is_admin == 2) {
                                                ?>
                                                <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "Edit", $club->id]) ?>">
                                                    <button type="button" class="btn btn-orange btn-res">Edit <i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "trainingCounts", $club->id]) ?>">
                                                        <button type="button" class="btn btn-info btn-res">Counts Training <i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                                                </a>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($is_admin == 2) {
                                                ?>
                                                <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "active", $club->id]) ?>">
                                                    <button type="button" class="btn btn-primary btn-res"> Send Code <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                </a>
                                                    
                                                <?php
                                                }
                                                ?>
                                        </div>

                                    </td>

                                </tr>
                    <?php } endforeach; ?>

                    </tbody>

                </table>


            </div>
        </div>
    </div>
    <?php if($is_admin != 0){ ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?php }?>

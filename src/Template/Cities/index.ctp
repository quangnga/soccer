
<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>City Table</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <h3><?= __('City') ?></h3>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('City name') ?></th>
                            
                           
                           <th class="actions"><?= __('Actions') ?></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($cities as $city){                       
                            if ( $is_admin == 1 || $is_admin == 2) {     
                        ?>
                                <tr>
                                    <td><?= h($city->city_name) ?></td>
                                    

                                    <td class="actions">
                                <?php
                                    if ($is_admin >= 0) {
                                 ?>
                                            <a href="<?php echo $this->Url->build(["controller" => "cities", "action" => "View", $city->id]) ?>">
                                                <button type="button" class="btn btn-success">view<i class="fa fa-search"></i></button>
                                            </a>
                                <?php
                                    }
                                ?>
                                <?php
                                    if ($is_admin == 1||$user->id == $id) {
                                ?>
                                            <a href="<?php echo $this->Url->build(["controller" => "cities", "action" => "Edit", $city->id]) ?>">
                                                <button type="button" class="btn btn-orange">edit <i class="fa fa-pencil"></i></button>
                                            </a>
                                <?php
                                    }
                                ?>
                                <?php
                                    if ($is_admin == 1) {
                                ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?>
                                <?php
                                    }
                                ?>
                                    </td>

                                </tr>
                        <?php } } ?>

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





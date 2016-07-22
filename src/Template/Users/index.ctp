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
                <h4>Users Table</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <h3><?= __('Users') ?></h3>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('first_name') ?></th>
                            <th><?= $this->Paginator->sort('last_name') ?></th>
                            <th><?= $this->Paginator->sort('club') ?></th>
                            <th><?= $this->Paginator->sort('coming') ?></th>
                           
                           <th class="actions"><?= __('Actions') ?></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($users as $user){                       
                            if ($user->id == $id || $is_admin == 1 || $is_admin == 2) {     
                        ?>
                                <tr>
                                    <td><?= h($user->first_name) ?></td>
                                    <td><?= h($user->last_name) ?></td>
                                    <td><?= h($user->club->club_name) ?></td>


                                    <td><?= $this->Number->format($user->coming) ?></td>

                                    <td class="actions">
                                <?php
                                    if ($is_admin >= 0) {
                                 ?>
                                            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "View", $user->id]) ?>">
                                                <button type="button" class="btn btn-success">view<i class="fa fa-search"></i></button>
                                            </a>
                                <?php
                                    }
                                ?>
                                <?php
                                    if ($is_admin == 1||$user->id == $id) {
                                ?>
                                            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "Edit", $user->id]) ?>">
                                                <button type="button" class="btn btn-orange">edit <i class="fa fa-pencil"></i></button>
                                            </a>
                                <?php
                                    }
                                ?>
                                <?php
                                    if ($is_admin == 1) {
                                ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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


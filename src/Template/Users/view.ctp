<style>
    .view-user{
        text-align: center;
    }
</style>

<?php
    if(($is_admin == 0 && $user->id == $id ) || $is_admin == 1|| ($is_admin == 2 && $user->club_id == $club_id )){
?>
<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">
    <h1>View <?= h($user->first_name) ?> <?= h($user->last_name) ?></h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> Users</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> View <?= h($user->first_name) ?><?= h($user->last_name) ?> </li>
    </ol>
</div>
<!-- left col -->




<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default animated slideInLeft"><i class="fa fa-user"></i> List Users</button></a>
    <?php
    if ($is_admin == 1) {
        ?>
        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "edit", $user->id]) ?>"><button type="button" class="btn btn-orange animated fadeInDown"><i class="fa fa-pencil"></i> Edit <strong><?= h($user->first_name) ?> <?= h($user->last_name) ?></strong></button></a>

        <a href="#logout">
            <button type="button" class="btn btn-red animated slideInRight" data-toggle="modal" data-target="#standardModal"><i class="fa fa-remove"></i> Delete <strong><?= h($user->first_name) ?> <?= h($user->last_name) ?></strong></div></button>

        </a>
        <?php
    }
    ?>
</div>
<br>




<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-blue">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong><?= h($user->first_name) ?> <?= h($user->last_name) ?></strong> Details</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('First Name') ?>
                            </td>
                            <td>
                                <?= h($user->first_name) ?>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Last Name') ?>
                            </td>
                            <td>
                                <?= h($user->last_name) ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Email') ?>
                            </td>
                            <td>
                                <?= h($user->email) ?>
                            </td>
                        </tr>


                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Username') ?>
                            </td>
                            <td>
                                <?= h($user->username) ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Club belong to') ?>
                            </td>
                            <td>
                                <?= h($user->club_id) ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Phone Number') ?>
                            </td>
                            <td>
                                <?= h($user->phone_number) ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Created') ?>
                            </td>
                            <td>
                                <?= h($user->created) ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Modified') ?>
                            </td>
                            <td>
                                <?= h($user->modified) ?>
                            </td>
                        </tr>





                    </tbody>
                </table>
            </div><!-- /.right col -->
        </div>
    </div>
</div>
<div class="modal fade" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="logout-message">
            <img class="img-circle img-logout" src="<?php echo $this->request->webroot; ?>img/rm.png" alt="">

            <h3>
                </i> Are you sure?
            </h3>
            <p>Select "Delete" below if you are sure
                <br> you want to delete  <strong><?= h($user->first_name) ?> <?= h($user->last_name) ?></strong>.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "Delete", $user->id]) ?>" class="btn btn-red">
                        <strong>Delete</strong>
                    </a>
                </li>
                <li>
                    <button type="button" class="btn btn-red" data-dismiss="modal">Cancel</button>
                </li>
            </ul>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
    }else{
        
?>

   <div class="view-user">
        <h1>Data not found!</h1>
        <?php echo $this->Html->link('Back >>', ['controller'=>'Users','action' => 'index']);?>
   </div> 
<?php
    }
?>
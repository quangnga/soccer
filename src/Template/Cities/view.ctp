<style>
    .view-user{
        text-align: center;
    }
</style>


<style>
    #page-wrapper {

        min-height: 800px;

    }
</style>

<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "cities", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default animated slideInLeft"><i class="fa fa-user"></i> List Cities</button></a>
    <?php
    if ($is_admin == 1) {
        ?>
        <a href="<?php echo $this->Url->build(["controller" => "cities", "action" => "edit", $city->id]) ?>"><button type="button" class="btn btn-orange animated fadeInDown"><i class="fa fa-pencil"></i> Edit <strong><?= h($city->city_name) ?></strong></button></a>

        <a href="#logout">
            <button type="button" class="btn btn-red animated slideInRight" data-toggle="modal" data-target="#standardModal"><i class="fa fa-remove"></i> Delete <strong><?= h($city->city_name) ?></strong></div></button>

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
                <h4><strong><?= h($city->city_name) ?> </strong> Details</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Id') ?>
                            </td>
                            <td>
                                <?= h($city->id) ?>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('City name') ?>
                            </td>
                            <td>
                                <?= h($city->city_name) ?>
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
                <br> you want to delete  <strong> <?= h($city->city_name) ?></strong>.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo $this->Url->build(["controller" => "Cities", "action" => "Delete", $city->id]) ?>" class="btn btn-red">
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





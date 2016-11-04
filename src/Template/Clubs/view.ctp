<style>
    .view404{
        text-align: center;
    }
</style>
<?php
    if($view == 1){
?>
<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">
    <h1>View <?= h($club->club_name) ?> <?= h($club->city['city_name']) ?></h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> clubs</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> View <?= h($club->club_name) ?> </li>
    </ol>
</div>
<!-- left col -->




<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index", ""]) ?>"><button type="button" class="btn btn-default animated slideInLeft"><i class="fa fa-Clubs"></i> List Clubs</button></a>
    <?php
    if ($is_admin == 1) {
        ?>
        <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "edit", $club->id]) ?>"><button type="button" class="btn btn-orange animated fadeInDown"><i class="fa fa-pencil"></i> Edit <strong><?= h($club['name']) ?> <?= h($club['city']) ?></strong></button></a>

        <a href="#logout">
            <button type="button" class="btn btn-red animated slideInRight" data-toggle="modal" data-target="#standardModal"><i class="fa fa-remove"></i> Delete <strong><?= h($club->club_name) ?> <?= h($club->city) ?></strong></div></button>

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
                <h4><strong><?= h($club->club_name) ?> <?= h($club->city['city_name']) ?></strong> Details</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Club Name') ?>
                            </td>
                            <td>
                                <?= h($club->club_name) ?>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Club Email') ?>
                            </td>
                            <td>
                                <?= h($club->club_email) ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Address') ?>
                            </td>
                            <td>
                                <?= h($club->address) ?>
                            </td>
                        </tr>


                        <tr>
                            <td style="font-weight:bold">
                                <?= __('City') ?>
                            </td>
                            <td>
                                <?= h($club->city['city_name']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Id') ?>
                            </td>
                            <td>
                                <?= h($club->id) ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Phone1') ?>
                            </td>
                            <td>
                                <?= h($club->phone1) ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold">
                                <?= __('Phone2') ?>
                            </td>
                            <td>
                                <?= h($club->Phone2) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-weight:bold">
                                <?= __('Days Of The Week Available') ?>
                                <br><br>
                                <?php
                                if ($club->monday == 0) {
                                    echo '<button type="button" class="weeksOff"></i> Mon</button>';
                                } else {
                                    echo '<button type="button" class="weeksOn"><strong>Mon</strong></button>';
                                }
                                ?>
                                <?php
                                if ($club->tuesday == 0) {
                                    echo '<button type="button" class="weeksOff"></i> Tue</button>';
                                } else {
                                    echo '<button type="button" class="weeksOn"><strong>Tue</strong></button>';
                                }
                                ?>
                                <?php
                                if ($club->wednesday == 0) {
                                    echo '<button type="button" class="weeksOff"></i> Wed</button>';
                                } else {
                                    echo '<button type="button" class="weeksOn"><strong>Wed</strong></button>';
                                }
                                ?>
                                <?php
                                if ($club->thursday == 0) {
                                    echo '<button type="button" class="weeksOff"></i> Thu</button>';
                                } else {
                                    echo '<button type="button" class="weeksOn"><strong>Thu</strong></button>';
                                }
                                ?>
                                <?php
                                if ($club->friday == 0) {
                                    echo '<button type="button" class="weeksOff"></i> Fri</button>';
                                } else {
                                    echo '<button type="button" class="weeksOn"><strong>Fri</strong></button>';
                                }
                                ?>
                                <?php
                                if ($club->saturday == 0) {
                                    echo '<button type="button" class="weeksOff"></i> Sat</button>';
                                } else {
                                    echo '<button type="button" class="weeksOn"><strong>Sat</strong></button>';
                                }
                                ?>
<?php
if ($club->sunday == 0) {
    echo '<button type="button" class="weeksOff"></i> Sun</button>';
} else {
    echo '<button type="button" class="weeksOn"><strong>Sun</strong></button>';
}
?>


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
                <br> you want to delete  <strong><?= h($club->club_name) ?> <?= h($club->city) ?></strong>.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "Delete", $club->id]) ?>" class="btn btn-red">
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
    <div class="view404">
        <h1>DATA NOT FOUND!</h1>
        <?php echo $this->Html->link('Back', ['controller'=>'Clubs','action' => 'index']);?>
    </div>
    
    
<?php
    }
?>
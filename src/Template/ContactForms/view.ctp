
<style>
#page-wrapper {

    min-height: 800px;

}
    </style><div class="page-title">
    <h1>View <?= h($contactForm->first_name) ?> <?= h($contactForm->last_name) ?> Message</h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "contactForms", "action" => "index"])?>"><i class="fa fa-envelope"></i> Messages</li></a>
        <li class="active animated slideInRight"><i class="fa fa-envelope animated slideInRight"></i> View <?= h($contactForm->first_name) ?> <?= h($contactForm->last_name) ?> Message</li>
    </ol>
</div>

<div align="center">
                <a href="<?php echo $this->Url->build(["controller" => "contactForms", "action" => "index"])?>"><button type="button" class="btn btn-red animated slideInLeft"><i class="fa fa-envelope"></i> List Messages</button></a>

            <a href="<?php echo $this->Url->build(["controller" => "contactForms", "action" => "delete", $contactForm->id])?>"><button type="button" class="btn btn-red animated slideInRight"><i class="fa fa-remove"></i> Delete This Message</button></a>
</div>
<br>



<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-red">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong><?= h($contactForm->first_name) ?> <?= h($contactForm->last_name) ?></strong> Message Details</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

    <table class="table table-hover table-striped">
    <tbody>

    <tr>
        <td style="font-weight:bold"><?= __('First Name') ?></td>
        <td><?= h($contactForm->first_name) ?></td>
    </tr>
    <tr>
        <td style="font-weight:bold"><?= __('Last Name') ?></td>
        <td><?= h($contactForm->last_name) ?></td>
    </tr>
    <tr>
        <td style="font-weight:bold"><?= __('Phone') ?></td>
        <td><?= h($contactForm->phone_number) ?></td>
    </tr>
    <tr>
        <td style="font-weight:bold"><?= __('Email') ?></td>
        <td><?= h($contactForm->email) ?></td>
    </tr>

         <tr>
        <td style="font-weight:bold"><?= __('Date') ?></td>
        <td><?= date('l d/m/Y H:i',strtotime(h($contactForm->created))) ?><br><br></td>
    </tr>
    <tr>
        <td style="font-weight:bold"><?= __('Subject') ?></td>
        <td><div class="animated flash"><?= h($contactForm->subject) ?></div></td>
    </tr>
    <tr>
        <td style="font-weight:bold"><?= __('Content') ?></td>
        <td><div class="animated flash"><?= h($contactForm->content) ?></div></td>
    </tr>

    </tbody>
  </table>
</div><!-- /.right col -->
</div>
</div>
</div>
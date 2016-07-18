<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>
                                Messages
                                <small>Dashboard</small>
                            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
                <li class="active animated slideInRight"><i class="fa fa-envelope animated slideInRight"></i> Messages</li>
            </ol>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="col-lg-12">
    <div class="portlet portlet-red">
        <div class="portlet-body">

            <nav class="navbar mailbox-topnav" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <i class="fa fa-inbox fa-fw fa-3x" style="color:#E74C3C;"></i> <h1 style="margin: -1.33em 0;margin-left: 60px;">Inbox</h1>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling
                <div class="mailbox-nav">
                    <ul class="nav navbar-nav button-tooltips">
                        <li class="checkall">
                            <input type="checkbox" id="selectall" data-toggle="tooltip" data-placement="bottom" title="Select All">
                        </li>
                        <li class="message-actions">
                            <div class="btn-group navbar-btn">
                                <button type="button" class="btn btn-white" data-toggle="tooltip" data-placement="bottom" title="Trash"><i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>-->
            </nav>

            <div id="mailbox">




                    <div class="table-responsive mailbox-messages">
                        <table class="table table-bordered  table-hover table-green">
<thead>
                                            <tr>

                                                <th>
                                                    <?= __('Name') ?>                                                </th>
                                                <th>
                                                    <?= __('Subject') ?>                                                </th>
                                                <th>
                                                    <?= $this->Paginator->sort('created','Date') ?>
                                                </th>
                                                <th class="actions">
                                                    <?= __('Actions') ?>
                                                </th>
                                            </tr>

                                        </thead>
                            <tbody>
                                <?php foreach ($contactForms as $contactForm): ?>
                                    <tr class="unread-message clickableRow" <?php if($contactForm->new==1){echo 'style="background:rgba(231, 76, 60, 0.31);"';}  else{ echo "";} ?>>

                                        <td class="from-col">
                                            <?= h($contactForm->first_name) ?>
                                            <?= h($contactForm->last_name) ?>
                                        </td>
                                        <td class="msg-col">
                                            <span class="text-muted"><?= h($contactForm->subject) ?></span>
                                        </td>
                                        <td class="date-col"><i class="fa fa-calendar"></i> <?=  date('l d/m/Y H:i',strtotime(h($contactForm->created)))?></td>
                                        <td class="date-col">
                                            <div class="btn-group btn-group-sm">
                        <a href="<?php echo $this->Url->build(["controller" => "contactForms", "action" => "View", $contactForm->id])?>">
                            <button type="button" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </a>
                        <a href="<?php echo $this->Url->build(["controller" => "contactForms", "action" => "Delete", $contactForm->id])?>">
                            <button type="button" class="btn btn-red"><i class="fa fa-remove"></i></button>
                        </a>

                    </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                        <p>
                            <?= $this->Paginator->counter() ?>
                        </p>
                    </div>

            </div>

        </div>
    </div>
</div>
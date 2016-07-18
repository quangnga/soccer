</style><div class="page-title">
    <h1>Edit <?= h($user->first_name) ?> <?= h($user->last_name) ?></h1>

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""]) ?>"><i class="fa fa-users"></i> Users</a></li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> Edit <?= h($user->first_name) ?> <?= h($user->last_name) ?></li>
    </ol>
</div>


<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong><?= h($user->first_name) ?> <?= h($user->last_name) ?></strong> Edit Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">



                <li><?= $this->Html->link(__('العودة للقائمة الرئيسية'), ["controller" => "dashboard", "action" => "index"]) ?></li>
                </ul>
                </nav>
                <div class="users form large-9 medium-8 columns content">
                    <?= $this->Form->create($user) ?>
                    <fieldset>
                        <legend><?= __('Edit User') ?></legend>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => 'Enter First name', 'maxlength' => '20', 'label' => ' First name *')); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'أدخل إسمك الأحير', 'maxlength' => '20', 'label' => ' Last name *')); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Enter Email', 'maxlength' => '20', 'label' => ' Email *')); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Enter Username', 'maxlength' => '20', 'label' => ' Username *')); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('phone_number', array('class' => 'form-control', 'placeholder' => 'Enter phone number', 'maxlength' => '20', 'label' => ' Phone number *')); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('club_id', ['options' => $clubs, array('class' => 'form-control')]); ?>
                            </div>
                        </div>
                </div>




                </fieldset>
                <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-default', 'formnovalidate' => true)) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
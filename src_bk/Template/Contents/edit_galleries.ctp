<style>
#page-wrapper {

    min-height: 800px;

}
    </style><div class="page-title">
    <h1>Edit Galleries: Main</h1>

    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><i class="fa fa-pencil-square-o"></i> Website Content Manager</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-info animated slideInRight"></i> Edit Galleries: Main</li>
    </ol>
</div>


<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><button type="button" class="btn btn-purple"><i class="fa fa-pencil-square-o"></i> Website Content Manager</button></a>

</div>
<br>

<div class="col-md-10 col-md-offset-1">
    <div class="portlet portlet-purple">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong>Galleries: Main</strong> Edit Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <?= $this->Form->create($gallery) ?>
                <fieldset style="border:0px;">
                    <div class="row">
                        <div class="form-group">
                            <?php  echo $this->Form->input('intro',array('class' => 'form-control', 'rows' => '5')); ?>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <?php  echo $this->Form->input('title',array('class' => 'form-control', 'rows' => '1','label'=>'Title 1')); ?>
                            </div>

                            <div class="form-group " >
                                <?php echo $this->Form->input('text',array('class' => 'form-control', 'rows' => '3','label'=>'Text 1')); ?>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">

                                <?php  echo $this->Form->input('title_1',array('class' => 'form-control', 'rows' => '1','label'=>'Title 2')); ?>
                            </div>

                            <div class="form-group" >
                                <?php echo $this->Form->input('text_1',array('class' => 'form-control', 'rows' => '3','label'=>'Text 2')); ?>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">

                                <?php  echo $this->Form->input('title_2',array('class' => 'form-control', 'rows' => '1','label'=>'Title 3')); ?>
                            </div>

                            <div class="form-group" >
                                <?php echo $this->Form->input('text_2',array('class' => 'form-control', 'rows' => '3','label'=>'Text 3')); ?>
                            </div></div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">

                                <?php  echo $this->Form->input('title_3',array('class' => 'form-control', 'rows' => '1','label'=>'Title 4')); ?>
                            </div>

                            <div class="form-group" >
                                <?php echo $this->Form->input('text_3',array('class' => 'form-control', 'rows' => '3','label'=>'Text 4')); ?>
                            </div>
                        </div>
                    </div>
<br>
                </fieldset>
                <div align="center">
                    <a href="#logout">
                            <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#standardModal">Publish</strong></button>

                        </a>
                    <button type="submit" class = 'btn btn-purple' name="Preview" onclick="window.open('index_preview#section2','_blank')"; formnovalidate>Preview</button>

                </div>
            </div>

             <div class="modal fade" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                     <div class="logout-message">
                  <!--  <img class="img-circle img-logout" src="<?php echo $this->request->webroot; ?>img/rm.png" alt=""> -->
                         <img class="img-logout" style="margin-bottom:10px;margin-top: -97px;" src="<?php echo $this->request->webroot; ?>img/publish.png" alt="">
                    <h3>
                </i> Are you sure?
            </h3>
                    <p>Select "Publish" below if you are sure
                        <br> you want to publish changes to the <strong>Galleries: Main Section</strong>.</p>
                    <ul class="list-inline">
                        <li>
                             <?= $this->Form->button(__('Publish'), array('class' => 'btn btn-purple','formnovalidate' => true)) ?>
                        </li>
                        <li>
                            <button type="button" class="btn btn-purple" data-dismiss="modal">Cancel</button>
                        </li>
                    </ul>
                </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        <?= $this->Form->end() ?>
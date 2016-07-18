<style>
#page-wrapper {

    min-height: 800px;

}
    </style><div class="page-title">
    <h1>Edit Edit Contact Us</h1>

    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><i class="fa fa-pencil-square-o"></i> Website Content Manager</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-envelope animated slideInRight"></i> Edit Contact Us</li>
    </ol>
</div>


<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><button type="button" class="btn btn-purple"><i class="fa fa-pencil-square-o"></i> Website Content Manager</button></a>

</div>
<br>

<div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-purple">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong>Contact Us</strong> Edit Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create($contactinfo,['enctype'=>'multipart/form-data']) ?>
                <fieldset style="border: 0px;">
                    <div class="form-group">
                        <?php  echo $this->Form->input('phone',array('class' => 'form-control','label'=>'Phone Number')); ?>
                    </div>
                    <div class="form-group " >
                        <?php echo $this->Form->input('message',array('class' => 'form-control')); ?>
                    </div>
                    <div class="form-group " >
                        <?php echo $this->Form->input('mail',array('class' => 'form-control', 'rows' => '2','label'=>'Message 2')); ?>
                    </div>
                    <?php echo $this->Form->label('Photo: 1920x1400');?>
                    <div class="form-group " >
                        <?php echo $this->Form->file('photo'); ?>
                    </div>
                    <?php if(isset($page->photo))
                    {
                        echo '<strong>File Name:</strong> ' . $page->photo."<br /><br />";
                        echo $this->Html->image('ContactForm/'.$page->photo,['class'=>'img-rounded','width'=>'455','height'=>'520']);
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>
                </fieldset>
                <div align="center">
                <a href="#logout">
                            <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#standardModal">Publish</strong></button>

                        </a>
                    <button type="submit" class = 'btn btn-purple' name="Preview" onclick="window.open('index_preview#section9','_blank')"; formnovalidate>Preview</button>


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
                        <br> you want to publish changes to the <strong>Contact Us Section</strong>.</p>
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

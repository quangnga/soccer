
<div class="page-title">
    <h1>Edit About</h1>

    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><i class="fa fa-pencil-square-o"></i> Website Content Manager</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-heart animated slideInRight"></i> Edit About</li>
    </ol>
</div>


<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><button type="button" class="btn btn-purple"><i class="fa fa-pencil-square-o"></i> Website Content Manager</button></a>

</div>
<br>

<div class="col-lg-10 col-lg-offset-1">
    <div class="portlet portlet-purple">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong>About</strong> Edit Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create($about,['enctype'=>'multipart/form-data']) ?>
                <fieldset style="border:0px;">
                    <div class="row">
                        <div class="col-lg-4">
                    <?php echo $this->Form->label('Photo: 264x419');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('photo') ?>
                    </div>
                    <?php if(isset($about->photo))
                    {
                        echo '<strong>File Name:</strong> ' . $about->photo."<br /><br />";
                        echo $this->Html->image('About/'.$about->photo,['class'=>'img-rounded','width'=>'264','height'=>'419']);
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>
                            </div>
                    <br>
                    <br>
                        <div class="col-lg-8">
                    <div class="row">

                        <div class="col-lg-12">
                    <div class="form-group " >
                            <?php echo $this->Form->input('paragraph',array('class' => 'form-control', 'rows' =>'15')); ?>
                    </div>
                            </div>
                  <div class="col-lg-12">

                        </div></div></div>
                        </div>
                    <br>
                    <div class="form-group ">
                        <?php echo $this->Form->input('end_greeting',array('class' => 'form-control', 'rows' =>'2')); ?>
                    </div>
                </fieldset>
                <div align="center">
               <!-- <?php $this->Html->link( "<?= $this->Form->submit('Preview',['name'=>'Preview','class' => 'btn btn-purple']) ?>",["controller" => "contents", "action" => "about_preview",'target'=>"_blank"])
                ?>-->
              <!--  <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "about_preview"])?>"
                   target="_blank" ><?= $this->Form->submit('Preview',['name'=>'Preview','class' => 'btn btn-purple']) ?></a>-->

                <a href="#logout">
                            <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#standardModal">Publish</strong></button>

                        </a>
                <button type="submit" class = 'btn btn-purple' name="Preview" onclick="window.open('index_preview#section6','_blank')"; formnovalidate>Preview</button>

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
                        <br> you want to publish changes to the <strong>About Section</strong>.</p>
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
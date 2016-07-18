<div class="page-title">
    <h1>Edit Portfolio</h1>

    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><i class="fa fa-pencil-square-o"></i> Website Content Manager</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-camera-retro animated slideInRight"></i> Edit Portfolio</li>
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
                <h4><strong>Portfolio</strong> Edit Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create($portfolio,['enctype'=>'multipart/form-data']) ?>
                <fieldset style="border:0px;">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">

                    <?php echo $this->Form->label('Photo 1: 804x453');?>


                    <div class="form-group">
                        <?php echo $this->Form->file('photo') ?>
                    </div>

                            <div class="form-group " >
                        <?php echo $this->Form->input('tag',array('class' => 'form-control', 'style' => 'width:455px;')); ?>
                    </div>
                    <?php if(isset($portfolio->photo))
                    {

                        echo '<strong>File Name:</strong> ' . $portfolio->photo."<br /><br />";
                        echo $this->Html->image('portfolio/'.$portfolio->photo,['class'=>'img-rounded','width'=>'455','height'=>'280']);
    echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>




</div>
                        <div class="col-lg-6 col-md-12">
                    <?php echo $this->Form->label('Photo 2: 804x906');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('photo_1') ?>
                    </div>

                            <div class="form-group " >
                        <?php echo $this->Form->input('tag_1',array('class' => 'form-control', 'style' => 'width:455px;')); ?>
                    </div>
                    <?php if(isset($portfolio->photo_1))
                    {
                        echo '<strong>File Name:</strong> ' . $portfolio->photo_1."<br /><br />";
                        echo $this->Html->image('portfolio/'.$portfolio->photo_1,['class'=>'img-rounded','width'=>'455','height'=>'520']);
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>
                    </div>


                        <div class="col-lg-6 col-md-12">
                    <?php echo $this->Form->label('Photo 3: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('photo_2') ?>
                    </div>
                            <div class="form-group " >
                        <?php echo $this->Form->input('tag_2',array('class' => 'form-control', 'style' => 'width:455px;')); ?>
                    </div>
                    <?php if(isset($portfolio->photo_2))
                    {
                        echo '<strong>File Name:</strong> ' . $portfolio->photo_2."<br /><br />";
                        echo $this->Html->image('portfolio/'.$portfolio->photo_2,['class'=>'img-rounded','width'=>'455','height'=>'280']);
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                                </div>

                        <div class="col-lg-6 col-md-12">
                    <?php echo $this->Form->label('Photo 4: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('photo_3') ?>
                    </div>
                            <div class="form-group " >
                        <?php echo $this->Form->input('tag_3',array('class' => 'form-control', 'style' => 'width:455px;')); ?>
                    </div>
                    <?php if(isset($portfolio->photo_3))
                    {
                        echo '<strong>File Name:</strong> ' . $portfolio->photo_3."<br /><br />";
                        echo $this->Html->image('portfolio/'.$portfolio->photo_3,['class'=>'img-rounded','width'=>'455','height'=>'280']);
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                        </div>

                        <div class="col-lg-6 col-md-12">
                    <?php echo $this->Form->label('Photo 5: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('photo_4') ?>
                    </div>
                            <div class="form-group " >
                        <?php echo $this->Form->input('tag_4',array('class' => 'form-control', 'style' => 'width:455px;')); ?>
                    </div>
                    <?php if(isset($portfolio->photo_4))
                    {
                        echo '<strong>File Name:</strong> ' . $portfolio->photo_4."<br /><br />";
                        echo $this->Html->image('portfolio/'.$portfolio->photo_4,['class'=>'img-rounded','width'=>'455','height'=>'280']);

                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                        </div>

                        <div class="col-lg-6 col-md-12">
                    <?php echo $this->Form->label('Photo 6: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('photo_5') ?>
                    </div>
                            <div class="form-group " >
                        <?php echo $this->Form->input('tag_5',array('class' => 'form-control', 'style' => 'width:455px;')); ?>
                    </div>
                    <?php if(isset($portfolio->photo_5))
                    {
                        echo '<strong>File Name:</strong> ' . $portfolio->photo_5."<br /><br />";
                        echo $this->Html->image('portfolio/'.$portfolio->photo_5,['class'=>'img-rounded','width'=>'455','height'=>'280']);
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                                </div>

                        <div class="col-lg-6 col-md-12">
                            <?php echo $this->Form->label('Photo 7: 804x453');?>
                            <div class="form-group">
                                <?php echo $this->Form->file('photo_6') ?>
                            </div>
                            <div class="form-group " >
                                <?php echo $this->Form->input('tag_6',array('class' => 'form-control', 'style' => 'width:455px;')); ?>
                            </div>
                            <?php if(isset($portfolio->photo_6))
                            {
                                echo '<strong>File Name:</strong> ' . $portfolio->photo_6."<br /><br />";
                                echo $this->Html->image('portfolio/'.$portfolio->photo_6,['class'=>'img-rounded','width'=>'455','height'=>'280']);

                        echo "<br><br><br>";
                            }
                            else
                            {
                                echo "no image available";
                            }
                            ?>


                        </div>
                    </div>

                    <br>

                </fieldset>
                <div align="center">
                 <a href="#logout">
                            <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#standardModal">Publish</strong></button>

                        </a>
                <button type="submit" class = 'btn btn-purple' name="Preview" onclick="window.open('index_preview#section5','_blank')"; formnovalidate>Preview</button>

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
                        <br> you want to publish changes to the <strong>Portfolio Section</strong>.</p>
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
<div class="page-title">
    <h1>Edit Headshots Page</h1>

    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
                <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><i class="fa fa-pencil-square-o"></i> Website Content Manager</a>
        </li>
        <li class="active animated slideInRight"><i class="fa fa-user animated slideInRight"></i> Edit Headshots Page</li>
    </ol>
</div>
<!-- left col -->

<div align="center">
    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "content_manager"])?>"><button type="button" class="btn btn-purple"><i class="fa fa-pencil-square-o"></i> Website Content Manager</button></a>

</div>
<br>

<div class="col-md-10 col-md-offset-1">
    <div class="portlet portlet-purple">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4><strong>Headshots</strong> Page Edit Form</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">

                <?= $this->Form->create($gallery,['enctype'=>'multipart/form-data']) ?>
                <fieldset style="border:0px;">
  <div class="row">
    <div class="col-lg-12">
                            <div class="form-group" >
                                <?php echo $this->Form->input('headshots_header_description',array('class' => 'form-control', 'rows' => '1')); ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <?php echo $this->Form->label('Header: 1920x740');?>
                            <div class="form-group" >
                                <?php echo $this->Form->file('headshots_header'); ?>
                            </div>
                            <?php if(isset($gallery->headshots_header))
                            {
                                echo '<strong>File Name:</strong> ' . $gallery->headshots_header."<br /><br />";
                                echo '<img class="img-rounded" style="width:600px;height:300px;"  src='.$this->request->webroot.'images/headshots/'.$gallery->headshots_header.'>';
                            }
                            else
                            {
                                echo "no image available";
                            }
                            ?></div>
                            <div class="col-lg-5">
                                <?php echo $this->Form->label('Navbar Image: 960x987');?>
                                <div class="form-group" >
                                    <?php echo $this->Form->file('headshots_navbar'); ?>
                                </div>
                                <?php if(isset($gallery->headshots_navbar))
                                {
                                    echo '<strong>File Name:</strong> ' . $gallery->headshots_navbar."<br /><br />";
                                    echo '<img class="img-rounded" style="width:455px;height:520px;"  src='.$this->request->webroot.'images/headshots/'.$gallery->headshots_navbar.'>';
                                }
                                else
                                {
                                    echo "no image available";
                                }
                                ?></div>


                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group" >
                                <?php echo $this->Form->input('headshot_text',array('class' => 'form-control', 'rows' => '9')); ?>
                            </div></div>

                        <div class="col-lg-7">
                            <div class="form-group" >
                                <?php echo $this->Form->input('headshot_points',array('class' => 'form-control', 'rows' => '9')); ?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- 1 -->
                    <div class="row">
                        <div class="col-lg-6">
                                <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 1: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_1') ?>
                    </div>
                                    <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_1',array('class' => 'form-control','label'=>'Tag', 'style' => 'width:455px;')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_1))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_1."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_1.'>';
                                    echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>
                    </div>

                     <!-- 2 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 2: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_2') ?>
                    </div>
                                <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_2',array('class' => 'form-control','label'=>'Tag', 'style' => 'width:455px;')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_2))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_2."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_2.'>';
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>
                        </div>

                     <!-- 3 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 3: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_3') ?>
                    </div>
                                <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_3',array('class' => 'form-control','label'=>'Tag', 'style' => 'width:455px;')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_3))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_3."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_3.'>';
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>

                        </div>

                     <!-- 4 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 4: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_4') ?>
                    </div>
                                 <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_4',array('class' => 'form-control','label'=>'Tag', 'style' => 'width:455px;')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_4))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_4."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_4.'>';
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>
                        </div>

                     <!-- 5 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 5: 804x906');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_5') ?>
                    </div>
                                <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_5',array('class' => 'form-control','label'=>'Tag', 'style' => 'width:455px;')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_5))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_5."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:520px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_5.'>';
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>
                        </div>

                     <!-- 6 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 6: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_6') ?>
                    </div>
                                <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_6',array('class' => 'form-control','label'=>'Tag', 'style' => 'width:455px;')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_6))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_6."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_6.'>';
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>
                        </div>

                     <!-- 7 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 7: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_7') ?>
                    </div>
                                <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_7',array('class' => 'form-control','label'=>'Description')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_7))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_7."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_7.'>';
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>
                        </div>


                     <!-- 8 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 8: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_8') ?>
                    </div>
                                <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_8',array('class' => 'form-control','label'=>'Description')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_8))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_8."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_8.'>';
                        echo "<br><br><br>";
                    }
                    else
                    {
                        echo "no image available";
                    }
                    ?>


                    </div>
                        </div>

                     <!-- 9 -->
                        <div class="col-lg-6">
                            <div class="col-lg-7 col-sm-6">
                    <?php echo $this->Form->label('Photo 9: 804x453');?>
                    <div class="form-group">
                        <?php echo $this->Form->file('headshot_9') ?>
                    </div>
                                <div class="form-group" >
                                <?php echo $this->Form->input('headshot_tag_9',array('class' => 'form-control','label'=>'Description')); ?>
                            </div>
                    <?php if(isset($gallery->headshot_9))
                    {
                        echo '<strong>File Name:</strong> ' . $gallery->headshot_9."<br /><br />";
                        echo '<img class="img-rounded" style="width:455px;height:280px;" src='.$this->request->webroot.'images/headshots/'.$gallery->headshot_9.'>';
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
                </div>
                    <br>
                </fieldset>
                <div align="center">
                <a href="#logout">
                            <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#standardModal">Publish</strong></button>

                        </a>
                <button type="submit" class = 'btn btn-purple' name="Preview" onclick="window.open('headshots_gallery_preview','_blank')"; formnovalidate>Preview</button>

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
                        <br> you want to publish changes to the <strong>Headshots Page</strong>.</p>
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
<style>
#page-wrapper {

    min-height: 900px;

}
    </style>
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>Website Content Manager</h1>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
                <li class="active"><i class="fa fa-edit"></i> Website Content Mananger</a>
        </li>
            </ol>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">

    <div class="col-lg-12">
        <div class="circle-tile animated">
            <a href="#">
                <div class="circle-tile-heading purple">
                    <i class="fa fa-copy fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content purple">
                <div class="circle-tile-description text-faded">
                </div>
                <div class="circle-tile-number text-faded">
                    Pages
                    <span id="sparklineB"></span>
                </div>

            </div>

        </div>
    </div>
 </div>
<div class="row">
    <div class="col-lg-3 col-md-4">
       <div class="circle-tile animated fadeIn">
                <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "index"])?>" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-plane fa-fw fa-3x"></i>
                    </div>
              </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Landing Page Header
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_index"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="circle-tile animated fadeIn">
                <a href="..#section2" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-info fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Galleries: Main
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_galleries"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="circle-tile animated fadeIn">
                <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "Childcare_Gallery"])?>" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-child fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                       Childcare Page
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_childcare_gallery"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="circle-tile animated fadeIn">
                <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "Kids_Grownups_Gallery"])?>" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-male fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Kids &amp; Grown Ups Page
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_kids_grownups_gallery"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="circle-tile animated fadeIn">
                <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "Headshots_Gallery"])?>" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-user fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Headshots Page
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_headshot_gallery"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="circle-tile animated fadeIn">
                <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "Commercial_Gallery"])?>" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-building-o fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Commercial Page
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_commercial_gallery"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

    <div class="col-lg-3 col-md-4">
       <div class="circle-tile animated fadeIn">
                <a href="..#section3" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-star fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Katsnap Capabilities
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_capabilities"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

    <div class="col-lg-3 col-md-4">
       <div class="circle-tile animated fadeIn">
                <a href="..#section4" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-arrows-h fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Timeline Process
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_process"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>



    <div class="col-lg-3 col-md-4">
       <div class="circle-tile animated fadeIn">
                <a href="..#section5" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-camera-retro fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Portfolio
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_portfolio"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>


    <div class="col-lg-3 col-md-4">
       <div class="circle-tile animated fadeIn">
                <a href="..#section6" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-heart fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        About
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_about"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>



    <div class="col-lg-3 col-md-4">
       <div class="circle-tile animated fadeIn">
                <a href="..#section8" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-comment fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Gossip
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_gossip"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>


     <div class="col-lg-3 col-md-4">
        <div class="circle-tile animated fadeIn">
                <a href="..#section9" target="_blank">
                    <div class="circle-tile-heading purple">
                        <i class="fa fa-envelope fa-fw fa-3x"></i>
                    </div>
                </a>
                <div class="circle-tile-content purple">
                    <div class="circle-tile-description text-faded">


                </div>
                    <div class="circle-tile-number text-faded">
                        Contact Us
                            <span id="sparklineB"></span>
                    </div>
                    <a href="<?php echo $this->Url->build(["controller" => "contents", "action" => "edit_contact_form_info"])?>">
                            <button type="button" class="btn btn-orange"><i class="fa fa-pencil"></i></button>
                        </a>
                </div>
            </div>
    </div>

</div>
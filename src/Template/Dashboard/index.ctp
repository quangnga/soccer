<style>
    #page-wrapper {

        min-height: 800px;

    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">

            <ol class="breadcrumb">
                <li class="active animated slideInRight"><i class="fa fa-dashboard animated slideInRight"></i> الصفحة الرئيسية</li>
            </ol>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>




<div class="col-lg-4 col-md-6">
    <div class="classWithPad">
        <div class="circle-tile animated fadeIn">
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""])?>">
                <div class="circle-tile-heading dark-blue"> 
                    <i class="fa fa-users fa-fw fa-3x animated zoomIn"></i>
                </div>
            </a>
                        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index", ""])?>">

            <div class="circle-tile-content blue">
                <div class="circle-tile-description text-faded">
                    <i class="fa fa-long-arrow-right animated slideInLeft"></i> <?php  if($is_admin == 1)  echo $countusers ?> <i class="fa fa-long-arrow-left animated slideInRight"></i>
                </div>
                <div class="circle-tile-number text-faded">
                    اللاعبين
                    <span id="sparklineA"></span>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="classWithPad">
        <div class="circle-tile animated fadeIn">
            <?php 
                $today = strtolower(date("l")); //var_dump($club[$today]);exit; 
            ?>
            <?php if($is_block){?>
                <a onclick="block()" href="javascript:void(0)">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-futbol-o fa-fw fa-3x animated zoomIn"></i> 
                        </div>
                </a>
                    
                   <a onclick="block()" href="javascript:void(0)">
        
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">
                                <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                            </div>
                            <div class="circle-tile-number text-faded">
                                ورقة التحضير
                                <span id="sparklineC"></span>
                            </div>
                            <br>
                        </div>
                    </a>
            <?php }else{?>
            <?php if($is_closed){            
                
            ?>
                <a onclick="close()" href="javascript:void(0)">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-futbol-o fa-fw fa-3x animated zoomIn"></i> 
                        </div>
                </a>
                    
                   <a onclick="close()" href="javascript:void(0)">
        
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">
                                <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                            </div>
                            <div class="circle-tile-number text-faded">
                                ورقة التحضير
                                <span id="sparklineC"></span>
                            </div>
                            <br>
                        </div>
                    </a>
            <?php }else{?>
            <?php if($is_traning){            
                
            ?>
                    
                    <?php
                        if($is_admin != 0){
                    ?>
                    <a    href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "detail",$clubByuser=>$club_id])?>">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-futbol-o fa-fw fa-3x animated zoomIn"></i> 
                        </div>
                    </a>
                    
                   <a href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "detail",$clubByuser=>$club_id])?>">
        
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">
                                <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                            </div>
                            <div class="circle-tile-number text-faded">
                                ورقة التحضير
                                <span id="sparklineC"></span>
                            </div>
                            <br>
                        </div>
                    </a>
                    <?php
                        }elseif($is_full==true && $coming_user == 0){
                    ?> 
                    <a onclick="full()" href="javascript:void(0)">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-futbol-o fa-fw fa-3x animated zoomIn"></i> 
                        </div>
                    </a>
                    
                   <a onclick="full()" href="javascript:void(0)">
        
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">
                                <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                            </div>
                            <div class="circle-tile-number text-faded">
                                ورقة التحضير
                                <span id="sparklineC"></span>
                            </div>
                            <br>
                        </div>
                    </a>
                             
                  <?php
                    }else{
                  ?>  
                    <a    href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "detail",$clubByuser=>$club_id])?>">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-futbol-o fa-fw fa-3x animated zoomIn"></i> 
                        </div>
                    </a>
                    
                   <a href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "detail",$clubByuser=>$club_id])?>">
        
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">
                                <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                            </div>
                            <div class="circle-tile-number text-faded">
                                ورقة التحضير
                                <span id="sparklineC"></span>
                            </div>
                            <br>
                        </div>
                    </a>
                        
                    <?php        
                        }
                    ?>      
                    
            <?php }else {?>
            
                <a onclick="notraining()" href="javascript:void(0)">
                    <div class="circle-tile-heading dark-blue">
                        <i class="fa fa-futbol-o fa-fw fa-3x animated zoomIn"></i> 
                    </div>
                 </a>
                 <a onclick="notraining()" href="javascript:void(0)">

            <div class="circle-tile-content green">
                <div class="circle-tile-description text-faded">
                    <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                </div>
                <div class="circle-tile-number text-faded">
                    ورقة التحضير
                    <span id="sparklineC"></span>
                </div>
                <br>
            </div>
            </a>
            <?php
            }}}
            ?>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="classWithPad">
        <div class="circle-tile animated fadeIn">
            <a href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "index"])?>">
                <div class="circle-tile-heading dark-blue">
                    <i class="fa fa-pencil-square-o fa-fw fa-3x animated zoomIn"></i>
                </div>
            </a>
                        <a href="<?php echo $this->Url->build(["controller" => "clubs", "action" => "index"])?>">

            <div class="circle-tile-content blue">
                
                <div class="circle-tile-description text-faded">
                    <?php  if($is_admin == 1)  echo $countclubs ?>
                    <br>
                </div>
                <div class="circle-tile-number text-faded">
                    إدارة النادي
                </div>
                <br>
                <!--<a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a> -->
            </div>
            </a>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="classWithPad">
        <div class="circle-tile animated fadeIn">
            <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "reports"])?>">
                <div class="circle-tile-heading red">
                    <i class="fa fa-flag fa-fw fa-3x animated zoomIn" aria-hidden="true"></i>
                </div>
            </a>
            
            <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "reports"])?>">
            <div class="circle-tile-content red">
                <div class="circle-tile-description text-faded">
                    <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                </div>
                <div class="circle-tile-number text-faded">
                    Matches report
                    <span id="sparklineC"></span>
                </div>
                <br>
            </div>
            </a>
        </div>
    </div>
</div>


<?php
if($is_admin == 1||$is_admin == 2)
{
?>

<!--
<div class="col-lg-4 col-md-6">
    <div class="classWithPad">
        <div class="circle-tile animated fadeIn">
            <a href="<?php echo $this->Url->build(["controller" => "ContactForms", "action" => "index"])?>">
                <div class="circle-tile-heading red">
                    <i class="fa fa-envelope fa-fw fa-3x animated zoomIn"></i>
                </div>
            </a>
            <div class="circle-tile-content red">
                <div class="circle-tile-description text-faded">
                    <i class="fa fa-long-arrow-right animated slideInLeft"></i> <?php  if($is_admin == 1) echo $countmessages_unread ?>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                </div>
                <div class="circle-tile-number text-faded">
                    Messages
                    <span id="sparklineC"></span>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
-->
<div class="col-lg-4 col-md-6">
    <div class="classWithPad">
        <div class="circle-tile animated fadeIn">
            <a href="<?php echo $this->Url->build(["controller" => "Payments", "action" => "index"])?>">
                <div class="circle-tile-heading red">
                    <i class="fa fa-money fa-fw fa-3x animated zoomIn" aria-hidden="true"></i>
                </div>
            </a>
            
            <a href="<?php echo $this->Url->build(["controller" => "Payments", "action" => "index"])?>">
            <div class="circle-tile-content red">
                <div class="circle-tile-description text-faded">
                    <i class="fa fa-long-arrow-right animated slideInLeft"></i>   <i class="fa fa-long-arrow-left animated slideInRight"></i>
                </div>
                <div class="circle-tile-number text-faded">
                    Payment
                    <span id="sparklineC"></span>
                </div>
                <br>
            </div>
            </a>
        </div>
    </div>
</div>
<?php
}
?>

</div>



<?php echo $this->Html->css('notiny.min.css');?>
<?php 
    
    echo $this->Html->script('https://code.jquery.com/jquery-2.1.3.min.js');
    echo $this->Html->script('notiny.min.js');
?>

<script>

    
    function block(){
        
        $.notiny({ text: 'You cannot enter because you blocked from Dashboard!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
            return false;
        
    }
    function full(){
        
        $.notiny({ text: 'Training Full!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
            return false;
        
    }
    function notraining(){
        
        $.notiny({ text: 'No training to day!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
            return false;
        
    }
     function close(){
        
        $.notiny({ text: 'Training Closed, Try attend for tomorrow!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
            return false;
        
    }
    
  

</script>

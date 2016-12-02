<style>
        .text-res2{
                display: none;
            }
        table {
          border: 1px solid #ccc;
          border-collapse: collapse;
          margin: 0;
          padding: 0;
          width: 100%;
          table-layout: fixed;
        }
        table caption {
          font-size: 1.5em;
          margin: .5em 0 .75em;
        }
        table tr {
          background: #f8f8f8;
          border: 1px solid #ddd;
          padding: .35em;
        }
        table th,
        table td {
          padding: .625em;
          text-align: center;
        }
        table th {
          font-size: .85em;
          letter-spacing: .1em;
          text-transform: uppercase;
        }
        @media 
        
        @media (max-width: 1024px) and (min-width: 800px){
            .no-coming button {
                padding: 3px 5px!important;
            }
            .coming button {
                
                padding: 3px 5px!important;
                
            }
            
        }
        @media (min-width : 1024px){
            .text-res2{
                display: none;
            }
            .text-res1{
                display: block;
            }
        }
        @media (min-width : 800px) and (max-width : 1024px){
            .text-res1{
                display: none;
            }
            .text-res2{
                display: block;
            }
        }
        @media (min-width: 601px) and (max-width: 800px){
            
            .no-coming button {
                boder-radius: 0px !important;
                padding: 3px 5px!important;
                
            }
            .coming button {
                
                padding: 3px 5px!important;
                boder-radius: 0!important;
            }
            table th {
                font-size: .70em;
                
            }
            .text-res1{
                display: none;
            }
            .text-res2{
                display: block;
            }
            
            
            
            
        }
        
        @media screen and (max-width: 600px) {
            
            .text-res2{
                display: none;
            }
            .text-res1{
                display: block;
            }
            
          table {
            border: 0;
          }
          table caption {
            font-size: 1.3em;
          }
          .de-res{
            display: none;
          }
          table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
          }
          table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
          }
          table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
          }
          table td:before {
            /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
          }
          table td:last-child {
            border-bottom: 0;
          }
        }
</style>
<?php echo $this->Html->css('detail')?>
<?php

if($is_admin == 1 || ($is_admin == 2 && $club_id == $club->id)||($is_admin == 0 && $club_id == $club->id)){
?>
<!--<meta http-equiv="refresh" content="2" >-->
<div class="page-title">
    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index"])?>"><i class="fa fa-building-o"></i> My Club</a></li>
        
        <li class="active animated slideInRight"><i class="fa fa-list-alt animated slideInRight"></i>  <?= h($club->club_name) ?>  attendance sheet</a></li>
    </ol>
</div>
<div class="col-lg-12 col-md-12" >
    <div class="portlet portlet-green">
        <div class="portlet-heading">
            <div class="portlet-title">
            </div>
            <h4><?= h($club->club_name) ?> <?= h($time)?> daily training</h4>
            <h4><?php
            $today = strtolower(date("l"));
            ?>

            <?php if($club[$today] == 0){
            echo 'no training today';}
            else {echo 'There will be a training today';}
            
            ?>  - Training Time: <?= h($time2->format('H:i:s')) ?>
            </h4>
            <h4>Training days</h4>
            <td>
                <?php if($club->monday==0){
                
                echo '<button type="button" class="weeksOff"></i> الأثنين</button>';}
                
                else {echo '<button type="button" class="weeksOn"><strong>الأثنين</strong></button>';}
                
                
                
                ?>
                <?php if($club->tuesday==0){
                
                echo '<button type="button" class="weeksOff"></i>الثلاثاء</button>';}
                
                
                
                else {echo '<button type="button" class="weeksOn"><strong>الثلاثاء</strong></button>';}
                
                
                
                ?>
                <?php if($club->wednesday==0){
                
                echo '<button type="button" class="weeksOff"></i> الأربعاء </button>';}
                
                
                
                else {echo '<button type="button" class="weeksOn"><strong> الأربعاء </strong></button>';}
                
                
                
                ?>
                <?php if($club->thursday==0){
                
                echo '<button type="button" class="weeksOff"></i> الخميس</button>';}
                
                
                
                else {echo '<button type="button" class="weeksOn"><strong>الخميس</strong></button>';}
                
                
                
                ?>
                <?php if($club->friday==0){
                
                echo '<button type="button" class="weeksOff"></i> الجمعة</button>';}
                
                
                
                else {echo '<button type="button" class="weeksOn"><strong>الجمعة</strong></button>';}
                
                
                
                ?>
                <?php if($club->saturday==0){
                
                echo '<button type="button" class="weeksOff"></i> السبت</button>';}
                
                
                
                else {echo '<button type="button" class="weeksOn"><strong>السبت</strong></button>';}
                
                
                
                ?>
                <?php if($club->sunday==0){
                
                echo '<button type="button" color="fff" class="weeksOff"></i> الاحد</button>';}
                
                
                
                else {echo '<button type="button" class="weeksOn"><strong>الاحد</strong></button>';}
                
                
                
                ?>

            </td>
            <div class="clearfix"></div>
        </div>
        
        <!---table-->
        <table>
          <caption>My Club</caption>
          <thead>
            <tr>
                <?php
                    if($is_admin==1||$is_admin == 2){
                ?>
              <th scope="col"><?= __('Order') ?></th>
                <?php }?>
              <th scope="col"><?= __('Full name') ?></th>
              <th scope="col"><?= __('Coming') ?></th>
              <th scope="col"><?= __('Comments') ?></th>
              <th scope="col"><?= __('Status') ?></th>
               <?php
                if($is_admin==1||$is_admin == 2){
               ?>
               <th scope="col"><?= __('Block') ?></th>
                
               <th scope="col"><?= __('Action') ?></th>            
                <?php
                    }
                ?>
            
            </tr>
          </thead>
          
          <?php if(($is_admin == 2)||$is_admin == 1){?>
						
            <tr>
                <td colspan="2"><h4 style="color: #16A085;"> Playing Users</h4></td>
               
                    <td  class="de-res"></td>
                    <td  class="de-res"></td>
                    <td  class="de-res"></td>
                    <td  class="de-res"></td>
                    <td  class="de-res"></td>
                
                
            </tr>
          <tbody>
          
            <?php    foreach($data_playing  as $key => $users){?>
                        
            <?php
                echo $this->Form->create();
            ?>
            
              <tr>
              
                <td scope="row" data-label="<?= __('Order') ?>"> <?= h($key+1)?> </td>
                <td data-label = "<?= __('Full name') ?>"> <?= h($users['first_name'])  ?> <?= h($users['last_name'])  ?></td>
                            
                <td></td>
                        
                <?php
                    if(empty($users['comment'])){
                ?>
                <td data-label = "<?= __('Comments') ?>" style="color: #ccc;">
                    <?= h(__('...No comment'))  ?>
                    
                </td>
                <?php
                    }else{
                ?>
                     <td data-label = "<?= __('Comments') ?>">
                        <?= h($users['comment'])  ?>
                     </td>
                <?php }?>
                            
                <?php
                if(($key+1 <= $number_playing)){
                ?>
                <td data-label = "<?= __('Status') ?>"> <?= __('Playing')?> </td>
                
                <?php
                }else{
                ?>
                <td data-label = "<?= __('Status') ?>">
                    <?= __('Waiting')?>
                </td>
                <?php
                }
                ?>
                <td data-label = "<?= __('Block') ?>" style="overflow: hidden;">
                    
                    <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                    <span style="float: right;"><?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox','label' => false)); ?></span>
                </td>
                <td data-label = "<?= __('Action') ?>">
                    <?= $this->Form->button(__('Block')) ?>
                    
                </td>
                      
                            
                      
            </tr>
                         
            <?php echo $this->form->end()?>
            </tbody>
            <?php } ?> 
            
            <!-- section for waiting players-->
             <tr> 
                
                <td colspan='2'><h4 style="color: #cf850f;">Waiting Users</h4> </td>
                <td  class="de-res"></td>
                <td  class="de-res"></td>
                <td  class="de-res"></td>
                <td  class="de-res"></td>
                <td  class="de-res"></td>
                
              
                
             </tr>  
             
             <tbody>
                 <?php if(!empty($data_waiting)){?>
                 <?php foreach($data_waiting  as $num=> $users){?>
                 
                 <?php
                    echo $this->Form->create();
                 ?>
                 <tr >
                    <?php if($total == $max_users){?>
                    <td data-label = "<?= __('Order') ?>"> <?= h($total+ $num )?> </td>
                    <?php }else{?>
                        <td data-label = "<?= __('Order') ?>"> <?= h($total+ $num +1 )?> </td>
                    <?php }?>
                    
                    <td data-label = "<?= __('Full name') ?>"> <?= h($users['first_name'])  ?> <?= h($users['last_name'])  ?></td>
                    
                    <td></td>
                    
                    
                    <?php
                        if(empty($users['comment'])){
                    ?>
                    <td data-label = "<?= __('Comments') ?>" style="color: #ccc;">
                        <?= h(__('...No comment'))  ?>
                        
                    </td>
                    <?php
                        }else{
                    ?>
                         <td data-label = "<?= __('Comment') ?>">
                            <?= h($users['comment'])  ?>
                         </td>
                    <?php }?>
                    
                    <td data-label = "<?= __('Status') ?>">
                        <?= __('Waiting')?>
                    </td>
                    <td data-label = "<?= __('Block') ?>"  style="overflow: hidden;">
                        
                        <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                        <span style="float: right;"><?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox','label' => false)); ?></span>
                    </td>
                    <td data-label = "<?= __('Action') ?>">
                        <?= $this->Form->button(__('Block')) ?>
                        
                    </td>
                    
                    
                   <?php echo $this->form->end()?> 
                    
                </tr>
                 <?php }}} ?>
                </tbody>
                
                <!--  session users...-->
                <?php
                foreach ($club->users as $users ){
                
                    
                if($users['id']==$id){
                ?>
                <tr >
                    <?php if(!empty($is_admin)){?>
                    <td></td>
                    <?php }else{?>
                    
                    <?php }?>
                    <td data-label = "<?= __('Fullname') ?>"> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
  
                        <?= $this->Form->create($users) ?>
                           
                           
                        <?php
                            if($block==0){
                        ?>
                        <td style="display: none;" class="btn-coming">
							
                           <div class="checkboxThree">
								
                                <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                                <?php if($users['coming']==1){?>
                                
                                    <?php echo $this->Form->input('coming',array('class' => 'checkbox','value'=>0,'name'=>'coming', 'type'=>'hidden','label' => false)); ?>
                                
                                <?php }else{?>
                                
                                    <?php echo $this->Form->input('coming',array('class' => 'checkbox','value'=>1,'name'=>'coming', 'type'=>'hidden','label' => false)); ?>
                                
                                <?php }?>
                            </div> 
                            
                            
                        </td>
                            
                        <?php
                        } else{
                        ?>
                        
                        <td data-label = "<?= __('Block') ?>">user blocked</td>
                        <?php
                        }
                        ?>
                            
                            
                        <td data-label = "<?= __('Comming') ?>">
                            
                            <?php if($is_admin == 0 || ($is_admin == 2 && $users['id'] == $id)|| ($is_admin == 1 && $users['id'] == $id)){?>
                            
                            
                            <?php
                            //var_dump($is_full);exit;
                            if($users['block']==1){
                            
                            ?>
                                <a ><?= $this->Form->button(__('Submit'),['id'=>'block'])  ?></a>
                            <?php
                            }else{
                            ?>
                                
                                <?php if($is_closed){?>
                                     <a onclick="close()"><?= $this->Form->button(__('Submit'))  ?></a>
                                <?php }else{ ?>
                                    <?php if($is_full){?>
                                        <a onclick="full()"><?= $this->Form->button(__('Submit'))  ?></a>
                                    <?php }else{ ?>
                                        <?php if($users['coming'] == 0){?>
                                            <div class="coming">
                                                 <?= $this->Form->button(__('Coming'),['title'=>'Action']) ?>
                                            </div>
                                           
                                        <?php }else{?>
                                        
                                           <div class="no-coming">
                                                 <?= $this->Form->button(__('No coming' ),['title'=>'Action']) ?>
                                            </div>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                            
                            <?php
                            }
                            ?>
                            <?php
                            }
                            ?>
                            
                        </td>
                            
                        <td data-label = "<?= __('Comment') ?>">
                        <div class="text-res1">
                             <?php
                                echo $this->Form->textarea('comment', ['rows' => '1', 'cols' => '20']);
                           ?>
                        </div>
                        <div class="text-res2">
                             <?php
                                echo $this->Form->textarea('comment', ['rows' => '3', 'cols' => '5']);
                           ?>
                        </div>
                          
                            
                        </td>
                         <?php if($users->coming){ ?>
                               <?php if(in_array($users->id, $db_wting)){?>
                                    
                                 <td data-label = "<?= __('Status') ?>"> Waiting</td>
                                
                               <?php }?>
                               <?php if(in_array($users->id, $db_play)){?>
                                    
                                 <td data-label = "<?= __('Status') ?>"> Playing</td>
                                
                               <?php }?>
                        <?php }else{?>
                            <td data-label = "<?= __('Status') ?>"></td>
                        <?php }?>
                            
                            
                            <?= $this->Form->end() ?>
                            
                        </tr>
                        <?php
                        }
                        //}
                        }
                        ?>
             
            
          </tbody>
        </table>
        
        <!---end table--->
        
        
</div>
</div>
</div>
</div>
</div>
</div>
<?php
}else{
?>
<h1>
Data not found!
</h1>
<?php
}
?>

<style>
.bold{
font-weight: bold;
}
th {
text-align: right;
}
td {
padding: 0;
}
.counter2{
float: right;
font-size: 25px;
margin-right: 17px;
font-weight: 600;
color: #ff0000;
border: #ff0000;
border-width: thick;
border-style: solid;
border-radius: 22px;
padding-left: 10px;
padding-right: 9px;
position: relative;
bottom: -20px;
margin-top: -12px;
margin-bottom: 24px;
}
.hrss{
margin-top: -10px;
height: 1px;
background: rgba(22, 160, 133, 0.31);
}
</style>
<script type="text/javascript">
    $('.btn-coming label').on('click', function() {
        $('.btn-coming label').css({left:0;});
        $(this).css({color:"#dcdcdc"});
        
        
    });
</script>
<?php 

    echo $this->Html->script('https://code.jquery.com/jquery-2.1.3.min.js');
    echo $this->Html->script('notiny.min.js');
?>

<script>
$(document).ready( function() {
    //$("#block").click(function(){
    $.notiny({ text: 'Your username or password is incorrect!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
  //});
    
  
}
    //function close(){
//       $(document).ready( function() {
//                                var i = 0;
//                              
//                                $.notiny({ text: 'Your username or password is incorrect!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
//                                i++;
//                              })
//    }
//    function full(){
//       $(document).ready( function() {
//                                var i = 0;
//                              
//                                $.notiny({ text: 'Your username or password is incorrect!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
//                                i++;
//                              })
//    }
</script>

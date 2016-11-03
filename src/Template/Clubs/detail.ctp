
<?php echo $this->Html->css('detail')?>
<?php

if($is_admin == 1 || ($is_admin == 2 && $club_id == $club->id)||($is_admin == 0 && $club_id == $club->id)){
?>
<!--<meta http-equiv="refresh" content="2" >-->
<div class="page-title">
    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index"])?>"><i class="fa fa-building-o"></i> My Club</a></li>
        <?php //var_dump($club->Clubs);exit;?>
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
            $today = strtolower(date("l")); //var_dump($club[$today]);exit;
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
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table">
                    <!-- Table Headers -->
                    
                    <tr '.$color.'>
                        <?php
                        if($is_admin==1||$is_admin == 2){
                        
                        ?>
                            <th><?= __('Order') ?></th>
                        
                        
                        <?php
                        }
                        
                        ?>
                        
                        <th><?= __('Full name') ?></th>
                        
                        
                        
                        
                        <th><?= __('Coming ?') ?></th>
                        
                    
                        <th><?= __('Comments') ?></th>
                        
                        <th><?= __('Status') ?></th>
                        <?php
                        if($is_admin==1||$is_admin == 2){
                        
                        ?>
                        <th><?= __('Block') ?></th>
                        
                        <th><?= __('Action') ?></th>
                        
                    
                        <?php
                            }
                        
                        ?>
                        


                    </tr>

                    <!-- section for playing players-->
                    
                    
                    
                    
                        
                        <?php
                        if(($is_admin == 2)||$is_admin == 1){?>
                        <tr>
                            <td><h4 style="color: #16A085;"> Playing Users</h4></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tbody>
                        
                        <?php //$count == 0 ?>
                        <?php    foreach($data_playing  as $key => $users){?>
                        
                        <?php
                            echo $this->Form->create();
                        ?>
                        <tr >
                            <td> <?= h($key+1)?> </td>
                            <td> <?= h($users['first_name'])  ?> <?= h($users['last_name'])  ?></td>
                            
                            <td></td>
                        
                            <?php
                                if(empty($users['comment'])){
                            ?>
                            <td style="color: #ccc;">
                                <?= h(__('...No comment'))  ?>
                                
                            </td>
                            <?php
                                }else{
                            ?>
                                 <td>
                                    <?= h($users['comment'])  ?>
                                 </td>
                            <?php }?>
                            
                            <?php
                            if(($key+1 <= $number_playing)){
                            ?>
                            <td> <?= __('Playing')?> </td>
                            
                            <?php
                            }else{
                            ?>
                            <td>
                                <?= __('Waiting')?>
                            </td>
                            <?php
                            }
                            ?>
                            <td style="float:right">
                                
                                <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                                <?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox','label' => false)); ?>
                            </td>
                            <td>
                                <?= $this->Form->button(__('Block')) ?>
                                
                            </td>
                            
                            <?php echo $this->form->end()?>
                            
                            
                        </tr>
                        </tbody>
                         <?php } ?>
                         
                         <!-- section for waiting players-->
                         <tr> 
                            
                            <td><h4 style="color: #cf850f;">Waiting Users</h4> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                         </tr>
                         <tbody>
                         <?php if(!empty($data_waiting)){?>
                         <?php foreach($data_waiting  as $num=> $users){?>
                         
                         <?php
                            echo $this->Form->create();
                         ?>
                            <tr '.$color.'>
                            <?php if($total == $max_users){?>
                                <td> <?= h($total+ $num )?> </td>
                            <?php }else{?>
                                <td> <?= h($total+ $num +1 )?> </td>
                            <?php }?>
                            
                            <td> <?= h($users['first_name'])  ?> <?= h($users['last_name'])  ?></td>
                            
                            <td></td>
                            
                            
                            <?php
                                if(empty($users['comment'])){
                            ?>
                            <td style="color: #ccc;">
                                <?= h(__('...No comment'))  ?>
                                
                            </td>
                            <?php
                                }else{
                            ?>
                                 <td>
                                    <?= h($users['comment'])  ?>
                                 </td>
                            <?php }?>
                            
                            <td>
                                <?= __('Waiting')?>
                            </td>
                            <td style="float:right">
                                
                                <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                                <?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox','label' => false)); ?>
                            </td>
                            <td>
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
                        <tr '.$color.'>
                            <?php if(!empty($is_admin)){?>
                            <td></td>
                            <?php }else{?>
                            
                            <?php }?>
                            <td> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
  
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
                            
                            <td>user blocked</td>
                            <?php
                            }
                            ?>
                            
                            
                            <td>
                                
                                <?php if($is_admin == 0 || ($is_admin == 2 && $users['id'] == $id)|| ($is_admin == 1 && $users['id'] == $id)){?>
                                
                                
                                <?php
                                //var_dump($is_full);exit;
                                if($users['block']==1){
                                
                                ?>
                                    <a onclick="alert('You cannot enter because you blocked from Dashboard');return false;"><?= $this->Form->button(__('Submit'))  ?></a>
                                <?php
                                }else{
                                ?>
                                    
                                    <?php if($is_closed){?>
                                         <a onclick="alert('Training Closed, Try attend for tomorrow');return false;"><?= $this->Form->button(__('Submit'))  ?></a>
                                    <?php }else{ ?>
                                        <?php if($is_full){?>
                                            <a onclick="alert('Training Full');return false;"><?= $this->Form->button(__('Submit'))  ?></a>
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
                            
                            <td>
                               <?php
                                    echo $this->Form->textarea('comment', ['rows' => '1', 'cols' => '20']);
                               ?>
                                
                            </td>
                             <?php if($users->coming){ ?>
                                   <?php if(in_array($users->id, $db_wting)){?>
                                        
                                     <td> Waiting</td>
                                    
                                   <?php }?>
                                   <?php if(in_array($users->id, $db_play)){?>
                                        
                                     <td> Playing</td>
                                    
                                   <?php }?>
                            <?php }else{?>
                                <td></td>
                            <?php }?>
                            
                            
                            <?= $this->Form->end() ?>
                            
                        </tr>
                        <?php
                        }
                        //}
                        }
                        ?>
                        
                        
                        
                        
                        
                        
                    </tbody>
                </thead>
            </table>
            <div >
                <?php if($is_admin == 1 || $is_admin == 2){?>
                <?php if($number >= 2){?>
                <div id="load" class="row">
                    <div id="load" class="counter"><?= h($number)?>/<?= h($num_all)?> لاعبين سيحضرون</div>
                </div>
                <?php
                }elseif($number <= 1){?>
                <div id="load" class="row">
                    <div id="load" class="counter2"><?= h($number)?>/<?= h($num_all)?> لاعبين سيحضرون</div>
                </div>
                <?php
                }
                }
                ?>
                
                <?php if($is_admin == 0){?>
                
                <div class="row">
                    <div id="load" class="counter"><?= h($number)?> لاعبين سيحضرون</div>
                </div>
                <?php
                }
                ?>
                
            </div>
        </div>
    </div>
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

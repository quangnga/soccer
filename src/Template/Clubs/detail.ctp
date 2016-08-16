
<?php 
    
    if($is_admin == 1 || ($is_admin == 2 && $club_id == $club->id)||($is_admin == 0 && $club_id == $club->id)){
?>
<div class="page-title">
<ol class="breadcrumb">
<li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active"> <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index"])?>"><i class="fa fa-building-o"></i> My Club</a></li>
<?php //var_dump($club->Clubs);exit;?>
<li class="active animated slideInRight"><i class="fa fa-list-alt animated slideInRight"></i>  <?= h($club->club_name) ?>  attendance sheet</a></li>
</ol>
</div>
<head>

</head>




<div class="col-lg-12 col-md-12">
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
    
    echo '<button type="button" class="weeksOff"></i> Monday</button>';}
    
    else {echo '<button type="button" class="weeksOn"><strong>Monday</strong></button>';}
    
    
    
    ?>

<?php if($club->tuesday==0){
    
    echo '<button type="button" class="weeksOff"></i>Tuesday</button>';}
    
    
    
    else {echo '<button type="button" class="weeksOn"><strong>Tuesday</strong></button>';}
    
    
    
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


<?php
    // Color referencces
   // if($users['coming'] == 1){
  //      $color = 'style="background:rgba(255, 0 ,0 , 0.44);"';
 //   }elseif($users['coming'] == 2){
 //       $color = 'style="background:rgba(255, 167 ,0 , 0.62);"';
 //   }

?>
        
        <tr '.$color.'>
                <th><?= __('Order') ?></th> 
                <th><?= __('Full name') ?></th>
                 <th><?= __('Status') ?></th>
                <th><?= __('Coming?') ?></th>
                <th><?= __('comments') ?></th>

                <?php
                    if($is_admin==1||$is_admin == 2){
                        
                ?>
                        <th><?= __('Block') ?></th>
                    
                
                <?php
                    }
                        
                ?>    
                
                
                <th><?= __('Action') ?></th>
                
                
        </tr>
        
        <!-- section for playing players-->
        
        
                <?php 
                    
                    $count=0;
                    foreach ($club->users as $users ): 
                        if($users['coming'] == 1){$count++;}
                        if($count <= $max_playing){    
                            if($is_admin == 0 && $users['id'] == $id){
                ?>
 <tbody>
        
        <tr '.$color.'>

                <td> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
                
                 <td>
                    <?php
                        if($users['coming'] == 1){
                    ?>
                        <?= __('Playing')  ?> 
                    <?php
                        }
                    ?>
                </td>
                <?= $this->Form->create($users) ?>



                <?php
                    if($block==0){
                ?>
                <td>
                
                        <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                        <?php echo $this->Form->input('coming',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
                </td>
                
                 <?php
                    } else{                   
                 ?>  
                
                <td>user blocked</td>
                <?php
                        }
                ?>
                <td>
                        <textarea name="comment"  cols="5" rows="2">
                    
                        </textarea>
                    
                </td>
                <td>
                        
                        <?php if($is_admin == 0 || ($is_admin == 2 && $users['id'] == $id)){?>
                                <?= $this->Form->button(__('Submit')) ?>
                        <?php
                         }
                         ?>
                         
                </td>
                <td></td>
               
          
                 <?= $this->Form->end() ?>
          
    </tr>
          
          <?php }elseif($is_admin == 1 || (($users['coming'] == 1) && ($is_admin == 2 ))){?>
                
          <tr '.$color.'>
                <td>
                    <?php
                        if($users['coming'] == 1){
                    ?>
                        <?= h($count)  ?> 
                    <?php
                        }
                    ?>
                </td>
                <td> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
                 <td>
                    <?php
                        if($users['coming'] == 1){
                    ?>
                        <?= __('Playing')  ?> 
                    <?php
                        }
                    ?>
                </td>

                    <?= $this->Form->create($users) ?>

                <td>
                
                        <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                        <?php echo $this->Form->input('coming',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
                </td>
                <td>
                        <textarea name="comment"  cols="7" rows="2">
                    
                        </textarea>
                    
                </td>
                <?php if(($is_admin == 1 && $users['id'] == $id) || ($is_admin == 2 && $users['id'] == $id)){?>
                            <td></td>
                            <td><?= $this->Form->button(__('Submit')) ?></td>
                            <td></td>
                            
                <?php
                 }
                 ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->create($users) ?>
                    
                
                <?php if(($is_admin == 1 &&$users['id'] != $id) ||($is_admin == 2 &&$users['id'] != $id)){?>
                    <td>
                    
                            <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                            <?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
                    </td>  
                <?php }else{ ?>

                <?php 
                    }
                ?>

                <td>
                        
                        
                         <?php if(($is_admin == 1&&$users['id'] != $id) ||($is_admin == 2&&$users['id'] != $id)){?>
                                <?= $this->Form->button(__('Block')) ?>
                        <?php
                         }
                         ?>
                </td>
                
                
                
            
          
                <?= $this->Form->end() ?>
            
          
        </tr>
          <?php
                }
            
          ?>

          
        <?php }else{
            

            //var_dump(1);exit;
            if($is_admin == 0 && $users['id'] == $id){    
        ?>
            <!-- section for bench-->

        <tr '.$color.'>
                
                <td> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
                <td>
                    <?php
                        if($users['coming'] == 1){
                    ?>
                        <?= __('waiting')  ?> 
                    <?php
                        }
                    ?>
                </td>
                
                <?= $this->Form->create($users) ?>



                <?php
                    if($block==0){
                ?>
                <td>
                
                        <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                        <?php echo $this->Form->input('coming',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
                </td>
                
                 <?php
                    } else{                   
                 ?>  
                
                <td>user blocked</td>
                <?php
                        }
                ?>
                <td>
                        <textarea name="comment"  cols="5" rows="2">
                    
                        </textarea>
                    
                </td>
                <td>
                        
                        <?php if($is_admin == 0 || ($is_admin == 2 && $users['id'] == $id)){?>
                                <?= $this->Form->button(__('Submit')) ?>
                        <?php
                         }
                         ?>
                         
                </td>
                <td></td>
                
          
                 <?= $this->Form->end() ?>
          
    </tr>
          
          <?php }elseif($is_admin == 1 || (($users['coming'] == 1) && ($is_admin == 2 ))){?>
               
          <tr'.$color.'>
                <td>
                     <?php
                        if($users['coming'] == 1){
                    ?>
                        <?= h($count)  ?> 
                    <?php
                        }
                    ?>
                </td>
                <td> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
                <td>
                    <?php
                        if($users['coming'] == 1){
                    ?>
                        <?= __('waiting')  ?> 
                    <?php
                        }
                    ?>
                </td>

                    <?= $this->Form->create($users) ?>
                
                
                


                <td>
                
                        <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                        <?php echo $this->Form->input('coming',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
                </td>
                <td>
                        <textarea name="comment"  cols="7" rows="2">
                    
                        </textarea>
                    
                </td>
                <?php if(($is_admin == 1 && $users['id'] == $id) || ($is_admin == 2 && $users['id'] == $id)){?>
                            
                            
                <?php
                 }
                 ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->create($users) ?>
                    
                
                <?php if(($is_admin == 1 &&$users['id'] != $id) ||($is_admin == 2 &&$users['id'] != $id)){?>
                    <td>
                    
                            <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                            <?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
                    </td>  
                <?php }else{ ?>

                <?php 
                    }
                ?>

                <td>
                        
                        
                         <?php if(($is_admin == 1&&$users['id'] != $id) ||($is_admin == 2&&$users['id'] != $id)){?>
                                <?= $this->Form->button(__('Block')) ?>
                        <?php
                         }
                         ?>
                </td>
                
                
                
                <?= $this->Form->end() ?>
            
          
        </tr>
          <?php
                }
            
          ?>
            
        <?php }endforeach; //var_dump($count);exit; ?>
        

           
         
</tbody>
</thead>
</table>
    <div>
                <?php if($is_admin == 1 || $is_admin == 2){?>
                <?php if($number >= 2){?>
                            <div class="row">
                            <div class="counter"><?= h($number)?>/<?= h($num_all)?> لاعبين سيحضرون</div>
                            </div>
                     <?php
                         }elseif($number <= 1){?>
                            <div class="row">
                            <div class="counter2"><?= h($number)?>/<?= h($num_all)?> لاعبين سيحضرون</div>
                            </div>
                <?php
                    }
                }
                ?>
                
                     <?php if($is_admin == 0){?>
                
                        <div class="row">
                        <div class="counter"><?= h($number)?> لاعبين سيحضرون</div>
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
    <h3>
        Data not found!
    </h3>
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

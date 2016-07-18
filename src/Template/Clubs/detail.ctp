

<div class="page-title">

<ol class="breadcrumb">
<li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active"> <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index"])?>"><i class="fa fa-building-o"></i> My Club</a></li>
<?php //var_dump($club->Clubs);exit;?>
<li class="active animated slideInRight"><i class="fa fa-list-alt animated slideInRight"></i>  <?= h($club->club_name) ?>  attendance sheet</a></li>
</ol>
</div>


<div class="portlet-heading">
<div class="portlet-title">
<div class="clubs view large-10 medium-9 columns content">
    <h4><?= h($time)?> daily training</h4>
    <h4><?= h($club->club_name) ?></h4>
    <table class="vertical-table">
</div>

<div class="clearfix"></div>

</div>
        <thead>
            <tr> Club: <?= h($club->club_name) ?> training hour <?= h($time2->format('H:i:s')) ?> </tr>
            <br />
            <tr>Today attendance list <?= h($time)?> </tr>
            <tr></tr>
        </thead>
</div>

<h3>Training days</h3>

<td>

<?php if($club->monday==0){

echo '<button type="button" class="weeksOff"></i> M</button>';}

else {echo '<button type="button" class="weeksOn"><strong>M</strong></button>';}



?>

<?php if($club->tuesday==0){

echo '<button type="button" class="weeksOff"></i> T</button>';}



else {echo '<button type="button" class="weeksOn"><strong>T</strong></button>';}



?>

<?php if($club->wednesday==0){

echo '<button type="button" class="weeksOff"></i> W</button>';}



else {echo '<button type="button" class="weeksOn"><strong>W</strong></button>';}



?>

<?php if($club->thursday==0){

echo '<button type="button" class="weeksOff"></i> T</button>';}



else {echo '<button type="button" class="weeksOn"><strong>T</strong></button>';}



?>

<?php if($club->friday==0){

echo '<button type="button" class="weeksOff"></i> F</button>';}



else {echo '<button type="button" class="weeksOn"><strong>F</strong></button>';}



?>

<?php if($club->saturday==0){

echo '<button type="button" class="weeksOff"></i> S</button>';}



else {echo '<button type="button" class="weeksOn"><strong>S</strong></button>';}



?>

<?php if($club->sunday==0){

echo '<button type="button" color="fff" class="weeksOff"></i> S</button>';}



else {echo '<button type="button" class="weeksOn"><strong>S</strong></button>';}



?>

</td>



</div>


<div class="portlet-body">
<div class="table-responsive">
<table class="table">



        <tr>
                <th><?= __('Full name') ?></th>
                <th><?= __('Training') ?></th>
                <th><?= __('Club name') ?></th>

                <th><?= __('training times') ?></th>
                <th><?= __('who is coming') ?></th>
                <th><?= __('Users comments') ?></th>
                
                <?php
                    if($is_admin==1||$is_admin == 2){
                        
                ?>
                        <th><?= __('Block') ?></th>
                    
                
                <?php
                    }
                        
                ?>    
                
                
                <th><?= __('Action') ?></th>
                
        </tr>
        
                <?php 

                foreach ($club->users as $users ): 
                if($is_admin == 0 && $users['id'] == $id){?>
 <tbody>
<tr>
<td> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
                
                
                <?= $this->Form->create($users) ?>
                <td>
                
                <?php 
                $today = strtolower(date("l")); //var_dump($club[$today]);exit; 
                ?>
                <?php if($club[$today] == 0){
                            echo 'no training today';}
                        else {echo '<button type="button" class="weeksOn"><strong>'.$today.'</strong></button>';}

                ?>
                
            </td>
            <td>
               <?= h($club->club_name) ?> 
            </td>
            <td>
                <?= h ($time2->format('H:i:s')) ?>
            </td>
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
            
          
            <?= $this->Form->end() ?>
          
    </tr>
          
          <?php }elseif($is_admin == 1 || (($users['coming'] == 1) && ($is_admin == 2 ))|| $users['id'] == $id){?>
                    
                <tr>
                <td> <?= h($users->first_name)  ?> <?= h($users->last_name)  ?></td>
                
                
                <?= $this->Form->create($users) ?>
                <td>
                
                
                            <td>
               <?= h($club->club_name) ?> 
            </td>
            <td>
                <?= h ($time2->format('H:i:s')) ?>
            </td>
            <td>
            
                    <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                    <?php echo $this->Form->input('coming',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
            </td>
            <td>
                    <textarea name="comment"  cols="5" rows="2">
                
                    </textarea>
                
            </td>
            <?php if($is_admin == 1 ||$is_admin == 2 ){?>
            <td>
            
                    <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                    <?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
            </td>  
            <?php } ?>
            
            <td>
                    
                    <?php if($is_admin == 0 || ($is_admin == 2 && $users['id'] == $id)){?>
                            <?= $this->Form->button(__('Submit')) ?>
                    <?php
                     }
                     ?>
                     <?php if($is_admin == 1 ||$is_admin == 2){?>
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
               
          
        <?php endforeach; ?>
        
    
           
         
</tbody>
</table>
    <div>
         <?php if($is_admin == 1 || $is_admin == 2){?>
                <h3><?= h($number)?>/<?= h($num_all)?> users will coming.</h3>
         <?php
            }
         ?>
         
         <?php if($is_admin == 0){?>
               <h3> <?= h($number)?> users will coming.</h3>
         <?php
            }
         ?>
         
    </div>
</div>
</div>
</div>
</div>

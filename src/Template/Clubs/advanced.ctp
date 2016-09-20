<style>
    .e404{
    text-align: center;
    }
</style>

<?php
    if($advanced){
?>

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
                
                <th><?= __('Day of week') ?></th>
                <th><?= __('Action') ?></th>
                
                
        </tr>
                <?= $this->Form->create($users) ?>
                <?php 
             
                 
                
                           
                $data_show = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
                    //$allow = 0;
                    $today = strtolower(date("l"));
                    //$today='tuesday';
                    $data_show = array();
                    
                    foreach($get_comings as $key => $get_coming){
                        
                        $data_show[$key] = $get_coming;
                        
                    }
                    //var_dump($get_coming);exit;
                    foreach($data_show as $key => $value){
                        //if(strcmp($today,$data_show[$key])== 0){
                          //  $allow = 1;
                            //$temp = $key;
                        //}
                                
                    //var_dump($allow);exit;
                        //if($club->$data_show[$key]  == 1){        
                        //for($i= $temp; $i<7; $i++){   
                        //foreach ($club->users as $users ):
                        $users = $club->users;
                        //var_dump($users[0]['id']);exit;
                            
                            
                                ?>
                            <tbody>
                                <tr>
                                    <td> <?= h($first_name)  ?> <?= h($last_name)  ?></td>
                            
                            
                                    
                                    <td>
                            
                                    
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
                                    
                                    <td> 
                                        <?php //echo $this->Form->input($data_show[$i],array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $data_show[$i])); ?>
                                        <?php //echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                                        <?php
                                        
                                            //var_dump($value);exit;
                                            if($club[$key]  == 1){
                                                if($data_show[$key] == 1){
                                                    echo $this->Form->input($key,array('class' => 'checkbox','type'=>'checkbox','checked'=>'checked', 'label' => false));
                                                }else{
                                                    echo $this->Form->input($key,array('class' => 'checkbox','type'=>'checkbox', 'label' => false));
                                                }
                                            }else{
                                        ?>
                                            <?php //echo $this->Form->input($value,array('class' => 'checkbox','type'=>'checkbox', 'label' => false)); ?>
                                           <?php echo $this->Form->input($key,array('class' => 'checkbox','type'=>'hidden', 'label' => false)); ?>
                                            
                                        <?php
                                        } 
                                        ?>
                                        
                                    </td>
                                <td>
                                    <?= h(ucwords($key)) ?> 
                                </td>
                                
                      
                        </tr>
                    
                     <?php    }?>
         
            </tbody>
            
            <td>
                <?php
                    if($is_closed){
                ?>
                      <a onclick="alert('Training Closed, Try attend for tomorrow');return false;"><?= $this->Form->button(__('Submit')) ?></a> 
                <?php }else{?>                           
                       <?php if($is_full){?>
                            <a onclick="alert('Training full, Try today after 7 pm to attend for tomorrow');return false;"><?= $this->Form->button(__('Submit')) ?></a>
                       <?php }else{?>
                            <?= $this->Form->button(__('Submit')) ?>
                       <?php }?> 
                 <?php }?>    
           </td>
                        
                      
                                <?= $this->Form->end() ?>
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
<?php
    }else{
        
?>
    <div class="e404">
        <h1>DATA NOT FOUND!</h1>
        <?php echo $this->Html->link('Back', ['controller'=>'Clubs','action' => 'index']);?>
    </div>

<?php
  }  
?>
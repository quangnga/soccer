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
<?php echo $this->Html->css('notiny.min.css');?>
<?php

if($is_admin == 1 || ($is_admin == 2 && $club_id == $club->id)||($is_admin == 0 && $club_id == $club->id)){
?>
<!--<meta http-equiv="refresh" content="2" >-->
<div class="page-title">
    <ol class="breadcrumb">
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"])?>"><i class="fa fa-dashboard"></i> الصفحة الرئيسية</a></li>
        <li class="active"> <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index"])?>"><i class="fa fa-building-o"></i> الفريق</a></li>
        
        <li class="active animated slideInRight"><i class="fa fa-list-alt animated slideInRight"></i>  <?= h($club->club_name) ?>  كشف الحضور</a></li>
    </ol>
</div>
<div class="col-lg-12 col-md-12" >
    <div class="portlet portlet-green">
        <div class="portlet-heading">
            <div class="portlet-title">
            </div>
            <h4>  التحضير اليومي <?= h($club->club_name) ?> </h4>
            <h4><?php
            $today = strtolower(date("l"));
            ?>

            <?php if($club[$today] == 0){
            echo 'no training today';}
            else {echo 'سيكون هناك تمرين اليوم الساعة';}
            
                ?>  :  <?= h($time2->format('H:i')) ?>
            </h4>
            <h4>أيام التمارين</h4>
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
              <!-- <th scope="col"></th> -->
                <?php }?>
              <th scope="col"><?= __('الأسم الكامل') ?></th>
              <th scope="col"><?= __('هل ستحضر؟') ?></th>
              <th scope="col"><?= __('إترك رسالة لمدير التمرين') ?></th>
              <th scope="col"><?= __('الحالة') ?></th>
               <?php
                if($is_admin==1||$is_admin == 2){
               ?>
               <th scope="col"><?= __('حضر اللاعب') ?></th>
                
               <th scope="col"><?= __('Action') ?></th>            
                <?php
                    }
                ?>
                <th></th>
            
            </tr>
          </thead>
          
          <?php if(($is_admin == 2)||$is_admin == 1){?>
             
             <tbody id="data_show">
                 <?php if(!empty($data_playing)){?>
                 <?php foreach($data_playing  as $num=> $users){?>
                 
                 <?php
                    echo $this->Form->create();
                 ?>
                 <tr id="hide_<?php echo $users['id']?>">
                 
                    
                    <td data-label = "<?= __('Full name') ?>"> <strong style="font-size: 1.5em;"><?= h($users['first_name'])  ?> <?= h($users['last_name'])  ?></strong></td>
                    
                    <td></td>
                    
                    
                    <?php
                        if(empty($users['comment'])){
                    ?>
                    <td data-label = "<?= __('Comments') ?>">
                        <span style="color: #ccc;"><?= h(__('...لا يوجد تعليق'))  ?></span>
                        
                    </td>
                    <?php
                        }else{
                    ?>
                         <td data-label = "<?= __('Comment') ?>">
                            <?= h($users['comment'])  ?>
                         </td>
                    <?php }?>
                    
                    <td data-label = "<?= __('Status') ?>">
                        <?= __('أساسي')?>
                    </td>
                    <td data-label = "<?= __('Block') ?>"  style="overflow: hidden;">
                        
                        <?php echo $this->Form->input('id',array('class' => 'checkbox','type'=>'hidden', 'label' => false,'value'=> $users['id'])); ?>
                        <span style="float: right;"><?php echo $this->Form->input('block',array('class' => 'checkbox','type'=>'checkbox','label' => false)); ?></span>
                    </td>
                    <td data-label = "<?= __('Action') ?>">
                        <?= $this->Form->button(__('Block')) ?>
                        
                    </td>
                    
                    <td></td>
                    
                    
                </tr><?php echo $this->Form->end();?>
                 <?php }}} ?>
                </tbody>
                
                <!--  session users...-->
                
                <tbody>

                <tr style="background:#ecf0f1 ; height: 30px; border-bottom: 1px solid #16a085; border-top: 1px solid #16a085; border-right: 3px double #ecf0f1; border-left: 3px  double #ecf0f1">
                    <td> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    
                    
                    <td colspan='7' style="text-align: center;"><h4 style="font-weight: bold;">All Players Attendance</h4> </td>
                    
                    
                </tr>
                <?php
                    foreach ($club->users as $users ){
                    if($users->coming==1){
                ?>
                <tr >
                    <?php if(!empty($is_admin)){?>
                    <td></td>
                    <?php }else{?>
                    
                    <?php }?>
                    <td data-label = "<?= __('Fullname') ?>" > <strong id="name_<?php echo $users->id?>" style="font-size: 1.5em;"><?php echo $users->first_name?> <?php echo $users->last_name?></strong> </td>
  

                           
                           
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
                            
                            <?php if($is_admin == 2||$is_admin == 1){?>
                            
                            
                            <?php
                            //var_dump($is_full);exit;
                            if($users['block']==1){
                            
                            ?>
                                <a ><?= $this->Form->button(__('Blocked'),['id'=>'block'])  ?></a>
                            <?php
                            }else{
                            ?>
                                
                                <?php if($is_closed){?>
                                     <a ><?= $this->Form->button(__('Submit'),['id'=>'close'])  ?></a>
                                <?php }else{ ?>
                                    <?php if($is_full){?>
                                        <a ><?= $this->Form->button(__('Submit'),['id'=>'full'])  ?></a>
                                    <?php }else{ ?>
                                        <?php if($users['attend'] == 0){?>
                                            <div class="coming">
                                                <button type="button" onclick="attend(<?php echo $users['id']?>)" class="btn" id="btn_<?php echo $users['id']?>" title="Action">سأحضر</button>
                                                 
                                                 <input type="hidden" id="status_<?php echo $users['id']?>" name="coming" value="1">
                                                 <input type="hidden" id="clubs_<?php echo $users['id']?>" value="<?php echo $users['club_id'];?>">
                                            </div>
                                           
                                        <?php }else{?>
                                        
                                           <div class="no-coming">
                                                <button type="button" id="btn_<?php echo $users['id']?>" onclick="attend(<?php echo $users['id']?>)" class="btn" title="Action">لن أحضر</button>
                                                 
                                                 <input type="hidden" id="status_<?php echo $users['id']?>" name="coming" value="0">
                                                 <input type="hidden" id="clubs_<?php echo $users['id']?>" value="<?php echo $users['club_id'];?>">
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
                            
                           <textarea name="comment" id="comment_<?php echo $users['id'];?>" cols="20" rows="1">
                               <?php echo $users['comment'];?>
                           </textarea>
                        </div>
                          
                            
                        </td>
                         
                        <td></td>
                        <td></td>
                        <td></td>
                            
                            

                            
                        </tr>
                        <?php
                        }
                        }
                        
                        ?>

             
            
          </tbody>
        </table>
        

        
        
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
        $('.btn-coming label').css({left:0});
        $(this).css({color:"#dcdcdc"});
        
        
    });
</script>
<?php 

    echo $this->Html->script('https://code.jquery.com/jquery-2.1.3.min.js');
    echo $this->Html->script('notiny.min.js');
?>

<script>
$(document).ready( function() {
    $("#block").click(function(){
        
        
    $.notiny({ text: 'You cannot enter because you blocked from Dashboard!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
    return false;
  });
  $("#close").click(function(){
        
        
    $.notiny({ text: 'Training Closed, Try attend for tomorrow!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
    return false;
  });
  $("#full").click(function(){
        
        
    $.notiny({ text: 'Training Full!', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
    return false;
  });
  
  
    
  
});

    function attend(id){
        var char_name = '#status_'+id;
        var button_name = '#btn_'+id;
        var club_name = '#clubs_'+id;
        var name_user = '#name_'+id;
        var coming = $(char_name).val();
        var clubs = $(club_name).val();
        var btn_name = $(button_name).val();
        var val_comment = '#comment_'+id;
        var comment = $(val_comment).val();
        var name_us = $(name_user).html();
        var name_hide = '#hide_'+id; 
        var name_of_tr = 'hide_'+id; 

       // console.log(name);
       
        
        var formData = {
                'id' : id,
                'coming': coming,
                'clubs' : clubs,
                'comment' : comment, 
            };
        $(button_name).html('waiting...');
        $.ajax({
            url :'<?php echo $this->Url->build(["controller" => "Clubs", "action" => "solveatten"]);?>',
            type: 'POST',
            data: formData,
            dataType: 'json',          
            success: function(data){
                //console.log(data.is_coming);
                //is coming
                if(data.is_coming=='1'){
                    
                    $(button_name).html('لن أحضر');
                    $(button_name).css('background-color','#cf692d');
                    $(button_name).css('border','none');
                    
                    $(char_name).attr('value','0');
                    
                    // var html +='<?php echo $this->Form->create()?>';
                       var html = '<tr '+'id= '+'"'+name_of_tr+'"'+'>';
                        
                        html += '<td data-label = "<?= __("Full name") ?>"> ';
                           
                        html += "<strong style='font-size: 1.5em;'>";
                             html+= name_us;
                        html += "</strong></td>";
                        
                        html += "<td>سأحضر</td>";
                    
                        html += ' <td data-label = "<?= __("Comment") ?>">';
                          //coment
                            html+= comment;
                        html += "</td>";
                        
                        
                        html += '<td data-label = "<?= __("Status") ?>">';
                             html+= 'أساسي';
                        html += "</td>";
                        html += '<td data-label = "<?= __("Block") ?>"  style="overflow: hidden">';
                            
                           html += '<?php echo $this->Form->input("id",array("class" => "checkbox","type"=>"hidden", "label" => false,"value"=> $users["id"])); ?>';
                           html += ' <span style="float: right;"><?php echo $this->Form->input("block",array("class" => "checkbox","type"=>"checkbox","label" => false)); ?></span>';
                        html += '</td>';
                        html += '<td data-label = "<?= __("Action") ?>">';
                           html += ' <?= $this->Form->button(__("Block")) ?>';
                            
                        html += '</td>';
                        
                        html += '<td></td>';
                        
                    
                        html += '</tr>';
                        // html += '<?php echo $this->form->end();?>'; 
                    $('#data_show').append(html);
                }else{
                    $(button_name).html('سأحضر');
                    $(button_name).css('background-color','#16a085');
                    $(button_name).css('border','none');
                    
                    $(char_name).attr('value','1');
                    
                    $("tr").remove(name_hide);
                }
               
            }
        });
        
    }

</script>


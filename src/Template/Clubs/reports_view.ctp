
<style>
    #page-wrapper {

        min-height: 800px;

    }
</style><div class="page-title">
    

    <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "dashboard", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "reports"]) ?>"><i class="fa fa-users"></i> Matches report</a></li>
        
    </ol>
</div>
<!-- left col -->




<div class="col-md-12 col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>View report</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in">
            <div class="portlet-body">
                <?php foreach($data_view as $data){?>
                <div class="row" style="text-align: center; font-weight: bold; margin: auto 10px; border-bottom: 1px dotted #dcdcdc;">
                    <h4><?= h($data->title)?></h4>
                </div>
                <div class="row" style="text-align: center; font-weight: bold; margin: auto 10px; border-bottom: 1px dotted #dcdcdc;">
                    <h4 style="color: red;"><?= h($data->goals_team)?> - <?= h($data->goals_opponent)?></h4>
                </div>
                <div class="row" style="text-align: justify; padding: 20px;">
                    <?= h($data->content)?>
                </div>
                <div class="row" style="text-align: justify; padding: 20px; font-style: italic; color: #959595;">
                   Date posted :  <?= h($data->created)?>  
                </div>
                <div class="row back_rp" style="text-align: right; padding: 0px 20px; font-style: italic; ">
                    <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "reports"]) ?>">
                        Back 
                    </a>
                </div>
                <?php }?>
                <?= $this->Form->create() ?>
                <div class="vote row">
                    <h3>Vote for best players of the match</h3>
                    <?php foreach($db_player as $value){?>
                        
                        <div class="col-md-5 list_player">
                        <?php if(!empty($db_like)){ ?>
                            <?php foreach($db_like as $db){?>
                                <?php if($db['id_like']==$value["id"]){ ?>
                                    <input type="radio" checked="checked" name="vote" value="<?php echo $value['id'];?>"> <i class="fa fa-male" aria-hidden="true"></i> <?php echo $value['first_name'];?> <?php echo  $value['last_name'];?> <br>
                                <?php }else{ ?>
                                    <input type="radio" name="vote" value="<?php echo $value['id'];?>"> <i class="fa fa-male" aria-hidden="true"></i> <?php echo $value['first_name'];?> <?php echo  $value['last_name'];?> <br>
                                <?php } ?>
                                
                                <input type="hidden" name="count_vote<?php echo $value['id']?>" value="<?php echo $value['vote_number'];?>">
                            <?php }?>
                        <?php }else{ ?>
                          
                                
                                    <input type="radio" name="vote" value="<?php echo $value['id'];?>"> <i class="fa fa-male" aria-hidden="true"></i> <?php echo $value['first_name'];?> <?php echo  $value['last_name'];?> <br>
                                
                                
                                <input type="hidden" name="count_vote<?php echo $value['id']?>" value="<?php echo $value['vote_number'];?>">
                           
                        <?php }?>
                        </div>
                    <?php }?>
                    
                </div>
                <div class="row" align="center">

                    <?php foreach($db_like as $dbb){ ?>
                        <?php if($id_comment == $dbb['id_comment']){?>
    
                        <?= $this->Form->button(__('Vote'), array('class' => 'btn vote_btn','id'=>'btn_like','type'=>'button')) ?>
                        <?php }else{?>
                            <?= $this->Form->button(__('Vote'), array('class' => 'btn vote_btn','id'=>'btn_like','type'=>'submit')) ?>
                        <?php }?> 
                    <?php }?> 

                </div>
                <?= $this->Form->end() ?>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


</script>
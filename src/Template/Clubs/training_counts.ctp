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

 <div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Table Training Count Of Club </h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in" >
            <div class="portlet-body">
                <table class="table table-striped" >
                    <thead>
                        <th scope="col" style="text-align: center;">Order</th>
                        
                        <th scope="col">Full name</th>
                        <th scope="col" >Player info</th>
                        <th scope="col" style="text-align: center;">Come times</th>
                    </thead>
                    <tbody>
                            
                            <?php if($is_admin!=0){?>
                            <?php echo $this->Form->create(null, array('url' => array('controller' => 'Clubs', 'action' => 'resetCountComing')));?>
                            
                                <div  class="form-group row" style="text-align: center;">
                                    
                                    <div class="form-group">
                                        <?php echo $this->Form->input('id_club', array('class' => 'form-control','value'=>$id_club , 'type'=>'hidden')); ?>
                                    </div>
                                </div>
                                <div class="show_time">
                                    <?php foreach($data_time as $data){?>
                                        <?php $date_cv = date('Y-m-d H:i:s a',strtotime($data['date_reset_count']))?>
<p style="text-align: center; font-style: italic; color: #777"> <strong>تاريخ التعديل : </strong> <?php echo $date_cv?></p>
                                    <?php }?>
                                </div>
                                <div class="row" style="text-align: center; margin-bottom: 10px;">
                                    
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to Reset Counts?')" onload="get_time()" type="submit">Reset Counts  </button>
                                        <a onclick="return confirm('Do you want print PDF?')" href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "pdftraining", $id_club]) ?>" target="_blank">
                                            <button style="background: #f25f43;margin-bottom: 0; margin-right: 10px;border:none;" type="button" class="btn btn-orange animated fadeInDown">
                                                Save PDF
                                            </button>
                                        </a>
                                   
                                </div>
                                <!-- <div class="row" style="text-align: center; margin-bottom: 10px;">
                                        
                                        
                                   
                                </div> -->

                            <?php echo $this->Form->end(); ?>
                            <?php }?>
                            <?php $k = 1;?>
                            <?php $i = $this->Paginator->params()['page'];?>
                                <?php foreach($data_users as $key => $db){?>
                                
                                    
                                        
                                        <tr>
                                            <td scope="row" data-label="<?= __('Order') ?>" style="text-align: center;">
                                                
                                                
                                                <?php $result = ($i-1)*10 + $k;
                                                        echo $result; ?>
                                            </td>
                                            <td scope="row" data-label="<?= __('Full name') ?>" style="text-align: center;">
                                                <?php echo $db['first_name'].' '. $db['last_name'] ?>
                                            </td>
                                            
                                            <td scope="row" data-label="<?= __('Player info') ?>">
                                            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "View", $db['id']]) ?>">
                                                <button type="button" class="btn btn-orange animated fadeInDown">
                                                    Info
                                                </button>
                                            </a>
                                                
                                            </td>
                                            <td scope="row" data-label="<?= __('Come times') ?>">
                                                <?php echo $db['count_coming']?>
                                                
                                            </td>
                                            
                                    
                                        </tr>
                                        
                                     
                                <?php 
                                    $k= $k+1;
                                }?>
                            
                            
                            
                            
                       
                    </tbody>

                </table>
                    
                 <?php if($is_admin != 0){ ?>
                    
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('Next') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                 <?php }?>
            </div>
            <div style="text-align: center; row">
                <a href="<?php echo $this->Url->build(["controller" => "Clubs", "action" => "index"]) ?>">
                    <button class="btn btn-primary"> Back <i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                </a>
            </div>
        </div>
    </div>
 <style>
    
 </style>
<script>
    function get_time(){
        $(".show_time").css('display','block');
    }

    // function printpdf(id){
    //     var formData = {
    //             'id' : id,
    //         };
    //     $.ajax({
    //         url :'<?php echo $this->Url->build(["controller" => "Clubs", "action" => "pdftraining"]);?>',
    //         type: 'post',
    //         data: formData,
    //         dataType: 'json',
    //         success: function(data){
    //             alert(1);
    //         }
    //     })
    // }
</script>                   
                    
                    
                    
                        
                        
                            


<?php $this->layout = false ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        table, th, td {
           border: 1px solid #888;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>

<body dir="rtl">
    <div class="col-md-12 col-lg-6 col-lg-offset-3">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title" style="text-align: center;">
                <h1>Table Training Count Of Club </h1>
            </div>
            <div class="" style="text-align: center;">
                <?php foreach($data_time as $data){?>
                    <?php $date_cv = date('Y-m-d H:i:s a',strtotime($data['date_reset_count']))?>
                            <p style="text-align: center; font-style: italic; color: #777"> 
                                <strong>تاريخ التعديل : </strong> 
                                <?php echo $date_cv?>
                            </p>
                <?php }?> 
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in" >
            <div class="portlet-body">
                <table class="" >     
                    <tr style="">
                        <td style="width: 250px; text-align: center; font-size: 22px; font-weight: bold;">Order</td>                       
                        <td style="width: 250px; text-align: center; font-size: 22px; font-weight: bold;">Full name</td>                        
                        <td style="width: 250px; text-align: center; font-size: 22px; font-weight: bold;">Come times</td>
                    </tr>
                    
                                         
                        <?php foreach($data_users as $key => $db){?>
                                                                                                   
                                <tr>
                                    <td scope="row" data-label="<?= __('Order') ?>" style="text-align: center;">
                                        <?php echo $key+1;?>

                                    </td>
                                    <td scope="row" data-label="<?= __('Full name') ?>" style="text-align: center;">
                                        <?php echo $db['first_name'].' '. $db['last_name'] ?>
                                    </td>
                                    
                                    
                                    <td scope="row" data-label="<?= __('Come times') ?>" style="text-align: center;">
                                        <?php echo $db['count_coming']?>
                                        
                                    </td>
                                    
                            
                                </tr>
                                
                             
                    
                       <?php }?>
                            
                                                   
                   

                </table>
                    
               
                    
                    
            </div>
           
        </div>
    </div>   
</body>
</html>
       
                    
                    
                        
                        
                            

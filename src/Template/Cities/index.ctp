

<div class="cities index large-9 medium-8 columns content">
    <h3><?= __('Cities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            
        </thead>
        <tbody>
        
        
            <center>
                           
                <label>Cites</label>
                        
                        <select name="cities" id="city" >
                            <option selected="selected">--Select cities--</option>
                            <?php  
                                                      
                                 foreach ($cities as $city){
                                    $id_club = $city->club_id;
                                    //var_dump($id_club);exit;
                             ?>
                                    <option value="<?= h($id_club) ?>"><?= h($city->city_name) ?></option>
                             <?php
                                } 
                             ?>
                        </select>
                        
                        
                        <label>Club</label>
                        
                                     <select name="club" id="club">
                                            <option selected="selected" >--Select Club--</option>
                                                      
                                    </select>   
                        
                  
            </center>
            
                    
                
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#city').change(function(){
        var city_id = $(this).val();
        $.ajax({
            url:'<?php echo $this->Url->build(["controller" => "Cities", "action" => "index"]) ?>',
            method:"POST",
            data:{cityId:city_id},
            success:function(data){
                $('#club').html(data);
            }
        });
    });
});
   
</script>
<?php 
                        
?>
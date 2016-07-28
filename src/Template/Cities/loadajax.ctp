
<div class="cities index large-9 medium-8 columns content">
    <h3><?= __('Cities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            
        </thead>
        <tbody>
        
        
            <center>
                           
                <label>Cites</label>
                        
                        <select name="cities" class="cities" onChange="getClub(this.value);">
                            <option selected="selected">--Select cities--</option>
                            <?php                            
                                 foreach ($cities as $city){
                             ?>
                                    <option value="<?= h($city->club_id) ?>"><?= h($city->city_name) ?></option>
                             <?php
                                } 
                             ?>
                        </select>
                  <label>Club</label>
                        <?php
                        
                            //if(!empty($_POST["club_id"])){
                                foreach($datas2 as $value){
                                    var_dump($value->id);exit;
                                    
                                    if($value->id == $_POST["club_id"]){
                                        
                        ?>
                                     <select name="club" class="club">
                                            <option selected="selected">--Select Club--</option>
                                            <option value="<?= h($value->id) ?>"><?= h($value->club_name) ?></option>
                                    </select>   
                        <?php           
                                    }
                                }
                            //}
                        ?>
                       
                  
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

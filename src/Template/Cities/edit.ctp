<style>
.edit-users{
text-align: center;
}
</style>


<div class="col-md-12 col-lg-6 col-lg-offset-3">
<div class="portlet portlet-default">
    <div class="portlet-heading">
        <div class="portlet-title">
            <h4><strong> <?= h($city->city_name) ?></strong> Edit Form</h4>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="basicFormExample" class="panel-collapse collapse in">
        <div class="portlet-body">
            <li><?= $this->Html->link(__('العودة للقائمة الرئيسية'), ["controller" => "dashboard", "action" => "index"]) ?></li>
        </ul>
    </nav>
    <div class="users form large-9 medium-8 columns content">
        <?= $this->Form->create($city) ?>
        <fieldset>
            <legend><?= __('Edit City') ?></legend>
            
            <div class="form-group col-md-12">
                
                <div class="form-group">
                
                    <?php echo $this->Form->input('city_name', array('class' => 'form-control', 'placeholder' => 'Enter city name', 'maxlength' => '20', 'label' => ' Name *')); ?>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="form-group">
                
                    <span style="color: #ccc;">Hold the CTRL key and click the items in a list to choose multiple values</span>
                    <?php  echo $this->Form->input('regions._ids', ['options' => $regions]);?>
                </div>
            </div>
           
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-default', 'formnovalidate' => true)) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
</div>
</div>
</div>




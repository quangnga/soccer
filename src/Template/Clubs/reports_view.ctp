
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
                <div class="row" style="text-align: justify; padding: 20px;">
                    <?= h($data->content)?>
                </div>
                <div class="row" style="text-align: justify; padding: 20px; font-style: italic; color: #959595;">
                   Date posted :  <?= h($data->created)?>  
                </div>
                <?php }?>
                <!--               
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev(('previous').' >') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('< '.__('next') ) ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>


                </div>-->
                
                
            </div>
        </div>
    </div>
</div>

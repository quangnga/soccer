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
                <h4>New users want to register for your Clubs</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="basicFormExample" class="panel-collapse collapse in" >
            <div class="portlet-body">
                <table class="table table-striped" >
                    <thead>
                        <th scope="col" style="text-align: center;">Full name</th>
                        <th scope="col">Position</th>
                        <th scope="col" >Player info</th>
                        <th scope="col" style="text-align: center;">Action</th>
                    </thead>
                    <tbody>
                       
                            <?php foreach($data_users as $db){?>
                            
                                <?= $this->Form->create() ?>
                                    
                                    <tr>
                                        <input type="hidden" value="<?php echo  $db['id']?>" name="id" />
                                        <input type="hidden" value="<?php echo  $db['email']?>" name="email" />
                                        <input type="hidden" value="<?php echo  $db['username']?>" name="username" />
                                        <td scope="row" data-label="<?= __('Full name') ?>" style="text-align: center;">
                                            <?php echo $db['first_name'].' '. $db['last_name'] ?>
                                        </td>
                                        <td scope="row" data-label="<?= __('Position') ?>">
                                            <?php switch ($db['position']){
                                     
                                                case 'Deffender':
                                                    echo 'دفاع';
                                                    break;
                                                case 'Deffender-left':
                                                    echo ' دفاع - أيسر';
                                                    break;
                                                case 'Deffender-right':
                                                    echo ' دفاع - أيمن';
                                                    break;
                                                case 'center':
                                                    echo  'محور';
                                                    break;
                                                case 'middle':
                                                    echo 'وسط';
                                                    break;
                                                case 'Forward':
                                                    echo 'هجوم';
                                                    break;
                                                case 'Keeper':
                                                    echo 'Keeper';
                                                    break;
                                                default:
                                                    echo '...';
                                                    
                                            }?>
                                        </td>
                                        <td scope="row" data-label="<?= __('Player info') ?>">
                                        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "View", $db['id']]) ?>">
                                            <button type="button" class="btn btn-orange animated fadeInDown">
                                                Info
                                            </button>
                                        </a>
                                            
                                        </td>
                                        <td scope="row" data-label="<?= __('Action') ?>">
                                            <?= $this->Form->button(__('Send code active'),['class'=>'btn btn-green animated fadeInDown']) ?>
                                            
                                        </td>
                                        
                                
                                    </tr>
                                    <?= $this->form->end()?>
                                 
                            <?php }?>
                            
                            
                            
                       
                    </tbody>

                </table>


            </div>
        </div>
    </div>
 
                   
                    
                    
                    
                        
                        
                            

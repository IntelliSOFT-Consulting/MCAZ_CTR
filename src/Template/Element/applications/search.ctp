<?php
    $this->Html->script('jquery/application_search', ['block' => true]);
?>
<?php 
    $arr1 = explode('?', $this->request->getRequestTarget());
    if(count($arr1) > 1) {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
    } else {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget())).'.csv';
    }
?>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
      <div class="col-md-10">
        <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk" aria-hidden="true"></span> to match any character e.g. ct4* to match ct4/2017, ct49/2018 etc.</em></small></h5>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('status', ['type' => 'hidden', 'templates' => 'table_form']);
                            echo $this->Form->control('protocol_no', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Protocol Number*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('created_start', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'Start Date']);
                        ?>                        
                    </td> 
                    <td>
                        <?php
                            echo $this->Form->control('created_end', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'End Date']);
                        ?>
                    </td>   
                </tr>
                <tr>  
                    <td>  
                        <?php
                            echo $this->Form->control('public_title', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Public Title*']);
                        ?>
                    </td> 
                    <td>
                        <?php
                            echo $this->Form->control('scientific_title', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Scientific Title*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('pi', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*PI Name/Email*']);
                        ?>
                    </td>
                </tr>                
                <tr>
                    <td colspan="3">
                    <a class="btn" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      View more
                    </a>
                    </td>
                </tr>     
            </tbody>
        </table>
        <div class="collapse" id="collapseExample">
        <table class="table">
            <tbody>               
                <tr>  
                    <td>  
                        <?php
                            echo $this->Form->control('business_name', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Name of Company*']);
                        ?>
                    </td> 
                    <td>
                        <?php
                            echo $this->Form->control('money_source', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Source of Funds*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sponsor', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Sponsor Name/Email*']);
                        ?>
                    </td>
                </tr>
                <tr>  
                    <td>  
                        <?php
                            echo $this->Form->control('site', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Site*']);
                        ?>
                    </td> 
                    <td>
                        <?php
                            echo $this->Form->control('medicine', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Medicine*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('health', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Health Condition(s)*']);
                        ?>
                    </td>
                </tr>  
            </tbody>
        </table>
        </div>
    </div>
    <div class="col-md-2">
        <br>
        <button type="submit" class="btn btn-primary btn-sm btn-block" id="search" 
                style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
        <?php
            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm btn-block', 'escape' => false]);
        ?>
        <!-- <button type="submit" class="btn btn-success btn-sm" id="search" style="margin-top: 4px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv</button> -->
        <a class="btn btn-success btn-sm btn-block" href="<?= $url ?>" style="margin-top: 4px;">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
        </a>

        <div class="dropdown"  style="margin-top: 14px;">
          <button class="btn btn-default btn-sm btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Sort by
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><?= $this->Paginator->sort('id') ?></li>
            <li><?= $this->Paginator->sort('protocol_no') ?></li>
            <li><?= $this->Paginator->sort('created') ?></li>
            <li><?= $this->Paginator->sort('modified') ?></li>
          </ul>
        </div>
    </div>
    </div>
</div>
<?= $this->Form->end() ?>
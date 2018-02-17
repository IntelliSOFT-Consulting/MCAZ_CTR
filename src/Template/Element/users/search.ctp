<?php
    $this->Html->script('jquery/sadr_search', ['block' => true]);
?>
<?php 
    $arr1 = explode('?', $this->request->getRequestTarget());
    if(count($arr1) > 1) {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
    } else {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget())).'.csv';
    }
    // pr($adrs);
?>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
      <p class="btn-zangu"><a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      <i class="fa fa-search" aria-hidden="true"></i> Search
                    </a></p>

      <div class="collapse" id="collapseExample">

      <div class="col-md-10">
        <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk" aria-hidden="true"></span> to match any character e.g. ed* to match Eddy, Eddie, Edward etc.</em></small></h5>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('status', ['type' => 'hidden', 'templates' => 'table_form']);
                            echo $this->Form->control('name', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*name/username/email*']);
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
                    <td colspan="2">
                        <?php
                            echo $this->Form->control('designation_id', 
                                ['label' => false, 'templates' => 'clear_form', 'options' => $designations, 'placeholder' => '*Province*',
                                 'empty' => true]);
                        ?>                        
                        <a onclick="$('#designation-id').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Designations</small>
                     </td>
                    <td>
                        <?php
                            echo $this->Form->control('group_id', 
                                ['label' => false, 'templates' => 'clear_form', 'options' => $groups, 'placeholder' => '*Province*',
                                 'empty' => true]);
                        ?>                        
                        <a onclick="$('#group-id').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Group</small>
                     </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-2">
        <br>
        <button type="submit" class="btn btn-primary btn-sm" id="search" 
                style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
        <?php
            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm', 'escape' => false]);
        ?>
        <!-- <button type="submit" class="btn btn-success btn-sm" id="search" style="margin-top: 4px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv</button> -->
        <a class="btn btn-success btn-sm" href="<?= $url ?>" style="margin-top: 4px;">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
        </a>
        <div class="dropdown"  style="margin-top: 14px;">
          <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Sort by
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><?= $this->Paginator->sort('id') ?></li>
            <li><?= $this->Paginator->sort('name') ?></li>
            <li><?= $this->Paginator->sort('created') ?></li>
            <li><?= $this->Paginator->sort('modified') ?></li>
          </ul>
        </div>
    </div>
    </div>
    </div>
</div>
<?= $this->Form->end() ?>
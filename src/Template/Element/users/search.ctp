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
    // pr($adrs);
?>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
<div class="row">
    <div class="col-xs-12">
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
</div>
    <div class="row">
        <div class=" col-xs-offset-4 col-xs-1">
            <button type="submit" class="btn btn-primary btn-sm" id="search" 
                    style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
        </div>
        <div class="col-xs-1">
            <?php
                echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm', 'escape' => false]);
            ?>
        </div>
        <div class="col-xs-1">
            <a class="btn btn-success btn-sm" href="<?= $url ?>">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
            </a>
        </div>
        <div class="col-xs-1">
            <div class="dropdown">
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
<?= $this->Form->end() ?>
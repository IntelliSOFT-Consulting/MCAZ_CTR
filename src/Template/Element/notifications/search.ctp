<?php
    $this->Html->script('jquery/sadr_search', ['block' => true]);
?>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
      <div class="col-md-12">
        <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk" aria-hidden="true"></span> to match any character e.g. *com*t* to match committee, come to the staffroom etc.</em></small></h5>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('status', ['type' => 'hidden', 'templates' => 'table_form']);
                            echo $this->Form->control('message', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Message*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('created_start', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'Sent Start Date']);
                        ?>                        
                    </td> 
                    <td>
                        <?php
                            echo $this->Form->control('created_end', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'Sent End Date']);
                        ?>
                    </td>   
                    <td>
                        <?php
                            echo $this->Form->control('deleted', ['type' => 'checkbox', 'label' => 'Include Deleted?', 'templates' => 'clear_form_checkbox', 'hiddenField' => false ]);
                      
                        ?>
                    </td>   
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="submit" class="btn btn-primary btn-sm" id="search" 
                style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
                        <?php
                            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm', 'escape' => false]);
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
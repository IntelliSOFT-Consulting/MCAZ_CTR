<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/attachments', ['block' => true]);

?>

    <div class="row">
        <div class="col-md-12">
            <h4>Kindly upload all the scanned receipts for the required fees: <button type="button" class="btn btn-info btn-sm" id="addAttachment">
                          Add <i class="fa fa-plus"></i>
                        </button></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="attachmentsTable"  class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> RECEIPT </th>
                    <th> DESCRIPTION OF CONTENTS</th>
                    <th>  </th>
                  </tr>
                </thead>
                <tbody>                  
              <?php 
                //Dynamic fields
                if (!empty($application['attachments'])) {
                  for ($i = 0; $i <= count($application['attachments'])-1; $i++) { 
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><p class="text-info text-left"><?php
                             echo $this->Form->input('attachments.'.$i.'.id', ['templates' => 'table_form']);
                             echo $this->Html->link($application['attachments'][$i]->file, substr($application['attachments'][$i]->dir, 8) . '/' . $application['attachments'][$i]->file, ['fullBase' => true]);
                        ?></p>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('attachments.'.$i.'.description', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-attachment"  value="<?php if (isset($application['attachments'][$i]['id'])) { echo $application['attachments'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

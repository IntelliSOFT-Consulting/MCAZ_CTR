<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/receipts', ['block' => true]);

?>

    <div class="row">
        <div class="col-md-12">
            <h4>Kindly upload all the scanned receipts for the required fees: <button type="button" class="btn btn-primary btn-sm" id="addReceipt">
                          Add <i class="fa fa-plus"></i>
                        </button></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="receiptsTable"  class="table table-bordered table-condensed">
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
                if (!empty($application['receipts'])) {
                  for ($i = 0; $i <= count($application['receipts'])-1; $i++) { 
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><p class="text-info text-left"><?php
                             echo $this->Form->input('receipts.'.$i.'.id', ['templates' => 'table_form']);
                             echo $this->Html->link($application['receipts'][$i]->file, substr($application['receipts'][$i]->dir, 8) . '/' . $application['receipts'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                        ?></p>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('receipts.'.$i.'.description', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-receipt"  value="<?php if (isset($application['receipts'][$i]['id'])) { echo $application['receipts'][$i]['id']; } ?>" >
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

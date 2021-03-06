<?php
    $this->Html->script('finance_view', ['block' => true]);
?>
<div class="row">
  <div class="col-xs-12">
    <h3 class="text-center text-warning"><?= $amendment->protocol_no ?></h3>
      <div id="tabs">
      <?php 
          echo $this->fetch('tabs');
      ?>

      <div id="tabs-16">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="4">
              <h4>Kindly upload all the scanned receipts for the required fees: </h4>
            </td>
          </tr>
        </table>

        <?php
          foreach($application['amendments'] as $key => $amendment) {
            if($amendment['submitted'] == 2 && !empty($amendment['receipts'])) {
        ?>
        <table class="table table-bordered table-condensed">
          <thead>
            <tr class="amender">
              <th colspan="4"><?php echo $key+1; ?></th>
            </tr>
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

          for ($i = 0; $i <= count($amendment['receipts'])-1; $i++) {
            if (!empty($amendment['receipts'])) {
              for ($i = 0; $i <= count($amendment['receipts'])-1; $i++) { 
          ?>

            <tr>
              <td><?= $i+1; ?></td>
              <td><p class="text-info text-left"><?php
                       echo $this->Html->link($amendment['receipts'][$i]->file, substr($amendment['receipts'][$i]->dir, 8) . '/' . $amendment['receipts'][$i]->file, ['fullBase' => true]);
                  ?></p>
              </td>
              <td>
                  <?php
                      echo $amendment->receipts[$i]['description'];
                  ?>
              </td>                    
              <td>

              </td>
            </tr>
            <?php } } } ; ?>
          </tbody>
        </table>        
          <?php } } ?>

      </div>

      <div id="tabs-17">
        <?php echo $this->element('amendments/finance'); ?>
        <?php //echo $this->element('applications/amendment_finance'); ?>
         <?php 
          echo $this->Form->create($amendment, ['type' => 'file', 'url' => ['action' => 'finance-approval']]);
           ?>
            <div class="row">
              <div class="col-xs-12"><h4 class="text-center text-warning">Finance Report</h4></div>
              <div class="col-xs-12">
              <?php
                    echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $amendment->id, 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('finance_approvals.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('finance_approvals.100.internal_comments', ['escape' => false, 'templates' => 'app_form', 'label' => 'Internal MCAZ Comments']);
                    echo $this->Form->control('finance_approvals.100.public_comments', ['escape' => false, 'templates' => 'app_form', 'label' => 'Applicant Visible Comments']);
                    
                    echo $this->Form->control('finance_approvals.100.outcome', ['type' => 'radio', 
                               'label' => '<b>Decision/Outcome</b>', 'escape' => false,
                               'templates' => 'radio_form',
                               'options' => [
                                  'Fees Complete' => 'Fees Complete', 
                                  'Incomplete Fees' => 'Incomplete Fees', 
                                  'Request info' => 'Request info', 
                                  'Declined' => 'Declined']]);
                    echo $this->Form->control('finance_approvals.100.outcome_date', ['type' => 'text', 'escape' => false, 
                      'templates' => [
                      'label' => '<div class="col-xs-4 control-label"><label {{attrs}}>{{text}}</label></div>',
                      'input' => '<div class="col-xs-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',], 
                      'label' => 'Outcome Date']);

                    // echo $this->Form->control('finance_approvals.100.file', ['type' => 'file','label' => 'Attach report (if available)', 'escape' => false, 'templates' => 'app_form']);
              ?>
              </div>          
            </div>

            <div class="row">
              <div class="col-xs-4 control-label">
                <label>Attach report(s) (if available)</label>
              </div>
              <div class="col-xs-7">
                <div class="uploadsTable">
                  <h6>
                      <button type="button" class="btn btn-primary btn-xs addFReceipt" value="100">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
                  </h6>
                  <hr>
                </div>
              </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8"> 
                  <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                </div> 
              </div>
          <?php          
          echo $this->Form->end(); 
          ?>
      </div>


    </div>
  </div>
</div>
 
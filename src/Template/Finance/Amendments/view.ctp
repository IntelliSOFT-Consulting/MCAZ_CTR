<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<?= $this->Html->script('application_view', ['block' => true]); ?>

  <ul class="nav nav-tabs" data-offset-top="60"  role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($amendment->submitted == 2) ? $amendment->parent_application->protocol_no.' amendment '.$amendment->created->i18nFormat('dd-MM-yyyy') : $amendment->created ?></b></a></li>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>    
  </ul>
  <div class="tab-content">
      <?= $this->Flash->render() ?>
      <div role="tabpanel" class="tab-pane active" id="report">
        <div id="tabs">
          <ul>
            <li><a href="#tabs-14">14. Financials</a></li>
          </ul>

          <div id="tabs-14">
            <table class="table table-condensed vertical-table">
              <tr>
                <td colspan="4">
                  <h4>Kindly upload all the scanned receipts for the required fees: </h4>
                </td>
              </tr>
            </table>

            <table class="table table-bordered table-condensed">
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
                           echo $this->Html->link($application['receipts'][$i]->file, substr($application['receipts'][$i]->dir, 8) . '/' . $application['receipts'][$i]->file, ['fullBase' => true]);
                      ?></p>
                  </td>
                  <td>
                      <?php
                          echo $application->receipts[$i]['description'];
                      ?>
                  </td>                    
                  <td>

                  </td>
                </tr>
                <?php } } ; ?>

              </tbody>
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
          </div>
      </div> <!-- Firstly, close the first tab!! IMPORTANT -->

      <div role="tabpanel" class="tab-pane" id="finance">
        <div id="tabs-14">
          <?php echo $this->element('applications/amendment_finance'); ?>

           <?php 
            echo $this->Form->create($amendment, ['type' => 'file', 'url' => ['action' => 'finance-approval']]);
             ?>
              <div class="row">
                <div class="col-xs-12"><h5 class="text-center">Finance Report</h5></div>
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
                      echo $this->Form->control('finance_approvals.100.outcome_date', ['type' => 'text', 'escape' => false, 'templates' => 'app_form', 'label' => 'Outcome Date']);

                      echo $this->Form->control('finance_approvals.100.file', ['type' => 'file','label' => 'Attach report (if available)', 'escape' => false, 'templates' => 'app_form']);
                ?>
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

<script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs({
      active   : 14
    });
  });
</script>


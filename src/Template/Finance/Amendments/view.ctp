<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/applications/application_view');
?>


<?php $this->start('form-actions'); ?>
  <ul class="nav nav-tabs" data-offset-top="60"  role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($amendment->submitted == 2) ? $amendment->parent_application->protocol_no.' amendment '.$amendment->created->i18nFormat('dd-MM-yyyy') : $amendment->created ?></b></a></li>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>    
  </ul>
<div class="tab-content">
     <?= $this->Flash->render() ?>
  <div role="tabpanel" class="tab-pane active" id="report">

<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <ul>
      <li style="display: none;"><a href="#tabs-1">1. Abstract</a></li>
      <li style="display: none;"><a href="#tabs-2">2. Investigator</a></li>
      <li style="display: none;"><a href="#tabs-3">3. Sponsor</a></li>
      <li style="display: none;"><a href="#tabs-4">4. Participants</a></li>
      <li style="display: none;"><a href="#tabs-5">5. Sites</a></li>
      <li style="display: none;"><a href="#tabs-6">6. Interventions</a></li>
      <li style="display: none;"><a href="#tabs-7">7. Criteria</a></li>
      <li style="display: none;"><a href="#tabs-8">8. Scope</a></li>
      <li style="display: none;"><a href="#tabs-9">9. Design</a></li>
      <li style="display: none;"><a href="#tabs-10">10. Ethical Considerations</a></li>
      <li style="display: none;"><a href="#tabs-11">11. Other details</a></li>
      <li style="display: none;"><a href="#tabs-12">12. Checklist </a></li>
      <li style="display: none;"><a href="#tabs-13">13. MC10 Form</a></li>
      <li><a href="#tabs-14">14. Financials</a></li>
    </ul>
<?php $this->end(); ?>


<?php $this->start('endjs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->

    <div role="tabpanel" class="tab-pane" id="finance">
      <div id="tabs-14">
        <?php echo $this->element('applications/finance'); ?>

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
<?php $this->end(); ?>


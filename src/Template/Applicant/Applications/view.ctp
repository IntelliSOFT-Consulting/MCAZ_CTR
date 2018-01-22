<?php
  $this->extend('/Element/applications/application_view');
  // $this->assign('editable', false);
  // $this->assign('baseClass', 'sadr_form');  
?>

<?php $this->start('form-actions'); ?>
  <ul class="nav nav-tabs" data-offset-top="60"  role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($application->submitted == 2) ? $application->protocol_no : $application->created ?></b></a></li>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>    
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Request for info</b></a></li>    
      <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>    
  </ul>
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="report">
<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <ul>
      <li><a href="#tabs-1">1. Abstract</a></li>
      <li><a href="#tabs-2">2. Investigator</a></li>
      <li><a href="#tabs-3">3. Sponsor</a></li>
      <li><a href="#tabs-4">4. Participants</a></li>
      <li><a href="#tabs-5">5. Sites</a></li>
      <li><a href="#tabs-6">6. Interventions</a></li>
      <li><a href="#tabs-7">7. Criteria</a></li>
      <li><a href="#tabs-8">8. Scope</a></li>
      <li><a href="#tabs-9">9. Design</a></li>
      <li><a href="#tabs-10">10. Ethical Considerations</a></li>
      <li><a href="#tabs-11">11. Organizations</a></li>
      <li><a href="#tabs-12">12. Other details</a></li>
      <li><a href="#tabs-13">13. Checklist </a></li>
      <li><a href="#tabs-14">14. Notifications</a></li>
      <li><a href="#tabs-15">15. MC10 Form</a></li>
      <li><a href="#tabs-16">16. Financials</a></li>
    </ul>
<?php $this->end(); ?>

<?php $this->start('endjs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->

    <div role="tabpanel" class="tab-pane" id="finance">
        <?= $this->element('applications/applicant_finance') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request">
        <?= $this->element('applications/applicant_request_info') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee">
        <?= $this->element('applications/applicant_committee') ?>
    </div>
  </div>

<?php $this->end(); ?>

<?php $this->start('submit_buttons'); ?>
    <div data-spy="affix" class="my-sidebar text-center">
      <?php
        if(!empty($application->amendments) && end($application->amendments)['submitted'] != 2) {
            echo $this->Html->link('<button class="btn btn-success btn-block action"> <i class="fa fa-edit" aria-hidden="true"></i> Edit </button>', ['action' => 'amendment', end($application->amendments)['id']], ['escape' => false]);  
        } else {
            echo $this->Form->postLink('<button class="btn btn-primary btn-block active"> <i class="fa fa-edit" aria-hidden="true"></i> Amendment </button>', ['action' => 'add-amendment', $application->id], ['escape' => false, 'confirm' => 'Are you sure you want to amend application '.$application->protocol_no.'?', 'class' => 'label-link']);  
        }
      ?>
      <hr>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-info btn-block']);
              ?>
      <hr>
    </div>

<?php $this->end(); ?>
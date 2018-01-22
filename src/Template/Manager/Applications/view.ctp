<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/applications/application_view');
?>


<?php $this->start('form-actions'); ?>
	<ul class="nav nav-tabs" data-offset-top="60"  role="tablist" id="myTab">
	    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
	      <b><?= ($application->submitted == 2) ? $application->protocol_no : $application->created ?></b></a></li>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>    
      <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab"><b>Assign Evaluator(s)</b></a></li>    
      <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><b>Reviews</b></a></li>    
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Request for info</b></a></li>    
	    <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>    
	</ul>
<div class="tab-content">
     <?= $this->Flash->render() ?>
	<div role="tabpanel" class="tab-pane active" id="report">
<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <!-- <ul>
      <li><a href="#tabs-16">16. Financials</a></li>
      <li><a href="#tabs-17">17. Finance Approvals</a></li>
    </ul> -->
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
        <?= $this->element('applications/finance') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="assign">
        <?= $this->element('applications/assign_evaluator') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="review">
        <?= $this->element('applications/reviews') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request">
        <?= $this->element('applications/request_info') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee">
        <?= $this->element('applications/committee') ?>
    </div>
  </div>

<?php $this->end(); ?>

<?php $this->start('submit_buttons'); ?>
    <br><br>
    <div data-spy="affix" class="my-sidebar text-center">
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-info btn-block']);
              ?>
      <hr>
    </div>

<?php $this->end(); ?>
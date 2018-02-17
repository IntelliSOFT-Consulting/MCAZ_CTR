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
      <!-- <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab"><b>Assign Evaluator(s)</b></a></li>     -->
      <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><b>Reviews</b></a></li>    
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Request for info</b></a></li>    
	    <!-- <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>     -->
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
    <?= $this->element('menus/tabs_menu') ?>
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


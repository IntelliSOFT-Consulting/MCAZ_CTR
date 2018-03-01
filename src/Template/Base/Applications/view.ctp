<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  use Cake\Utility\Hash;
  $this->Html->css('bootstrap/bootstrap.vertical-tabs', ['block' => true]);
  $this->extend('/Element/applications/application_view');
?>


<?php $this->start('form-actions'); ?>
<div class="col-xs-10">
  <div class="tab-content">
     <?= $this->Flash->render() ?>
  <div role="tabpanel" class="tab-pane active" id="report">
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, ], ['escape' => false, 'class' => 'btn btn-info active']);
              ?>
<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <?= $this->element('menus/tabs_menu') ?>
<?php $this->end(); ?>


<?php $this->start('endjs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->

    <div role="tabpanel" class="tab-pane" id="finance">
        <?= $this->element('applications/finance') ?>
    </div>
  <?php if(in_array("Fees Complete", Hash::extract($application->finance_approvals, '{n}.outcome'))) { ?> 
    <div role="tabpanel" class="tab-pane" id="notification">
        <?= $this->element('applications/notifications') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="section75">
        <?= $this->element('applications/section75') ?>
    </div>
    <?php if($prefix === 'manager') { ?> 
    <div role="tabpanel" class="tab-pane" id="assign">
        <?= $this->element('applications/assign_evaluator') ?>
    </div>
    <?php } ?> 
    <div role="tabpanel" class="tab-pane" id="review">
        <?= $this->element('applications/evaluations') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request">
        <?= $this->element('applications/request_info') ?>
    </div>
    <?php if($prefix === 'manager') { ?> 
    <div role="tabpanel" class="tab-pane" id="committee">
        <?= $this->element('applications/committee') ?>
        <hr style="border-width: 3px; border-color: #1737b5;">
        <?php //echo $this->element('applications/dg') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="dg">
        <?= $this->element('applications/dg') ?>
    </div>
    <?php } ?> 
  <?php } ?> 
    <div role="tabpanel" class="tab-pane" id="gcp">
        <?= $this->element('applications/gcp') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="stages">
        <?= $this->element('applications/stages') ?>
    </div>
  </div>
</div>

<div class="col-xs-2"> <!-- required for floating -->
  <ul class="nav nav-tabs tabs-right" data-spy="affix" data-offset-top="60" role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($application->submitted == 2) ? $application->protocol_no : $application->created ?></b></a></li>
      <?php if($application->submitted == 2) { ?>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>
    <?php if(in_array("Fees Complete", Hash::extract($application->finance_approvals, '{n}.outcome'))) { ?> 
      <li role="presentation"><a href="#notification" aria-controls="notification" role="tab" data-toggle="tab"><b>Notifications</b></a></li>    
      <li role="presentation"><a href="#section75" aria-controls="section75" role="tab" data-toggle="tab"><b>Section 75</b></a></li> 
      <?php if($prefix === 'manager') { ?>   
      <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab"><b>Assign Evaluator(s)</b></a></li>
      <?php } ?> 
      <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><b>Reviews</b></a></li>    
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Communications</b></a></li>    
      <?php if($prefix === 'manager') { ?> 
      <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>    
      <li role="presentation"><a href="#dg" aria-controls="dg" role="tab" data-toggle="tab"><b>Director General</b></a></li> 
      <?php } ?> 
      <li role="presentation"><a href="#gcp" aria-controls="gcp" role="tab" data-toggle="tab"><b>GCP</b></a></li>   
      <?php } ?> 
    <?php } ?>       
      <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab"><b>STAGES</b></a></li>  
  </ul>
</div>

<?php $this->end(); ?>


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
      <li role="presentation"><a href="#section75" aria-controls="section75" role="tab" data-toggle="tab"><b>Section 75</b></a></li>    
      <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab"><b>Assign Evaluator(s)</b></a></li>    
      <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><b>Reviews</b></a></li>    
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Communications</b></a></li>    
      <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>   
  </ul>
<div class="tab-content">
     <?= $this->Flash->render() ?>
  <div role="tabpanel" class="tab-pane active" id="report">
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => 'base'], ['escape' => false, 'class' => 'btn btn-info active']);
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
        <?php // $this->element('applications/finance') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="section75">
        <?php // $this->element('applications/section75') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="assign">
        <?php // $this->element('applications/assign_evaluator') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="review">
        <?php // $this->element('applications/reviews') ?>
        <?php // $this->element('applications/evaluations') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request">
        <?php // $this->element('applications/request_info') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee">
        <?php // $this->element('applications/committee') ?>
    </div>
  </div>

<?php $this->end(); ?>


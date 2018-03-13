<?php
  use Cake\Utility\Hash;
  $this->extend('/Element/applications/application_view');  
  $this->Html->css('bootstrap/bootstrap.vertical-tabs', ['block' => true]);
?>

<?php $this->start('form-actions'); ?>
<div class="col-xs-3"> <!-- required for floating -->
  <ul class="nav nav-tabs tabs-left" data-offset-top="60"  role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($amendment->submitted == 2) ? $amendment->protocol_no : $amendment->created ?></b></a></li>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>
    <?php if(in_array("Fees Complete", Hash::extract($amendment->finance_approvals, '{n}.outcome'))) { ?>   
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Communications</b></a></li>    
      <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>    
    <?php } ?>
      <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab"><b>STAGES</b></a></li>  
      <li role="presentation"><a href="#approvals" aria-controls="approvals" role="tab" data-toggle="tab"><b class="text-success">Approvals</b></a></li>  
  </ul>
</div>
<div class="col-xs-9">  

<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="report">
    <div>
      <?php
        if($application->approved === 'Authorize') {
          if(!empty($application->amendments) && end($application->amendments)['submitted'] != 2) {
              echo $this->Html->link('<i class="fa fa-edit" aria-hidden="true"></i> Edit Recent Amendment', ['action' => 'amendment', end($application->amendments)['id']], ['escape' => false, 'class' => 'label-link btn btn-success']);  
          } 
          echo "&nbsp;";
          echo $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i> Original Application', ['controller' => 'Applications', 'action' => 'view', $amendment->parent_application->id], ['escape' => false, 'class' => 'label-link btn btn-primary']);  
          
        }
      ?>
        <?php
          echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-info']);
                ?>
      <hr>
    </div>
<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <?= $this->element('menus/tabs_menu') ?>

<?php $this->end(); ?>

<?php $this->start('endjs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->

    <div role="tabpanel" class="tab-pane" id="finance">      
        <?= $this->element('amendments/applicant_finance') ?>
    </div>
  <?php if(in_array("Fees Complete", Hash::extract($amendment->finance_approvals, '{n}.outcome'))) { ?> 
    <div role="tabpanel" class="tab-pane" id="request">
        <?= $this->element('amendments/applicant_request_info') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee">
        <?= $this->element('amendments/applicant_committee') ?>
    </div>
  <?php } ?>
    <div role="tabpanel" class="tab-pane" id="stages">
        <?= $this->element('amendments/stages') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="approvals">
        <?= $this->element('amendments/applicant_approvals') ?>
    </div>
  </div>
</div>
<?php $this->end(); ?>

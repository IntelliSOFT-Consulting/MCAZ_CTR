<?php
  use Cake\Utility\Hash;
  $this->extend('/Element/applications/application_view');  
  $this->Html->css('bootstrap/bootstrap.vertical-tabs', ['block' => true]);

  $this->Html->css('bootstrap/common_header', ['block' => true]);
  $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
  $this->Html->script('bootstrap/approval_edit', ['block' => true]);
  //--wysiwyg editor    
  $this->Html->css('bootstrap/bootstrap-wysihtml5', ['block' => true]);
  $this->Html->script('bootstrap/wysihtml5-0.3.0', ['block' => true]);
  $this->Html->script('bootstrap/bootstrap-wysihtml5', ['block' => true]);
  $this->Html->script('bootstrap/wysihtml5', ['block' => true]);
?>

<?php $this->start('form-actions'); ?>
<div class="col-xs-3"> <!-- required for floating -->
  <ul class="nav nav-tabs nav-manager tabs-left" data-offset-top="60"  role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($application->submitted == 2) ? $application->protocol_no : $application->created ?></b></a></li>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>
    <?php if(in_array("Fees Complete", Hash::extract($application->finance_approvals, '{n}.outcome'))) { ?>   
      <?php if($application->approved === 'Authorize') { ?>     
      <li role="presentation"><a href="#section75" aria-controls="section75" role="tab" data-toggle="tab"><b>Section 75</b></a></li> 
      <?php } ?>    
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Communications</b></a></li>    
      <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>   
      <li role="presentation"><a href="#dg" aria-controls="dg" role="tab" data-toggle="tab"><b>Director General</b></a></li>  
      <?php if($application->approved === 'Authorize') { ?>    
      <li role="presentation"><a href="#notifications" aria-controls="notifications" role="tab" data-toggle="tab"><b>Notifications</b></a></li> 
      <?php } ?>    
      <li role="presentation"><a href="#gcp" aria-controls="gcp" role="tab" data-toggle="tab"><b>GCP Inspections</b></a></li>  
    <?php } ?>
      <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab"><b>STAGES</b></a></li>  
      <li role="presentation"><a href="#approvals" aria-controls="approvals" role="tab" data-toggle="tab"><b class="text-success">Approvals</b></a></li>  
      <?php if($application->approved === 'Declined') { ?>    
      <li role="presentation"><a href="#appeals" aria-controls="appeals" role="tab" data-toggle="tab"><b>Appeals</b></a></li> 
      <?php } ?> 
      <?php if($application->approved === 'Authorize') { ?>    
      <li role="presentation"><a href="#finals" aria-controls="finals" role="tab" data-toggle="tab"><b>Final Reports</b></a></li> 
      <?php } ?>  
  </ul>
</div>
<div class="col-xs-9">  

<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="report">
    <div>
      <?php
        if($application->approved === 'Authorize') {
          if(!empty($application->amendments) && end($application->amendments)['submitted'] != 2) {
              echo $this->Html->link('<button class="btn btn-success action"> <i class="fa fa-edit" aria-hidden="true"></i> Edit Amendment </button>', ['action' => 'amendment', end($application->amendments)['id']], ['escape' => false]);  
          } else {
              echo $this->Form->postLink('<button class="btn btn-primary active"> <i class="fa fa-edit" aria-hidden="true"></i> New Amendment </button>', ['action' => 'add-amendment', $application->id], ['escape' => false, 'confirm' => 'Are you sure you want to amend application '.$application->protocol_no.'? Kindly refer to fees schedule and attach relevant receipts with amendment.', 'class' => 'label-link']);  
          }
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
        <?= $this->element('applications/applicant_finance') ?>
    </div>
  <?php if(in_array("Fees Complete", Hash::extract($application->finance_approvals, '{n}.outcome'))) { ?> 
    <div role="tabpanel" class="tab-pane" id="section75">
        <?= $this->element('applications/applicant_section75') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request">
        <?= $this->element('applications/applicant_request_info') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee">
        <?= $this->element('applications/applicant_committee') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="dg">        
        <?php echo $this->element('applications/applicant_dg') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="notifications">
        <?= $this->element('applications/applicant_notifications') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="gcp">
        <?= $this->element('applications/applicant_gcp') ?>
    </div>
  <?php } ?>
    <div role="tabpanel" class="tab-pane" id="stages">
        <?= $this->element('applications/stages') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="approvals">
        <?= $this->element('applications/applicant_approvals') ?>
    </div>
    <?php if($application->approved === 'Declined') { ?>    
    <div role="tabpanel" class="tab-pane" id="appeals">
        <?= $this->element('applications/applicant_appeals') ?>
    </div>
    <?php } ?>  
    <?php if($application->approved === 'Authorize') { ?>    
    <div role="tabpanel" class="tab-pane" id="finals">
        <?= $this->element('applications/applicant_final') ?>
    </div>
    <?php } ?>  
  </div>
</div>
<?php $this->end(); ?>

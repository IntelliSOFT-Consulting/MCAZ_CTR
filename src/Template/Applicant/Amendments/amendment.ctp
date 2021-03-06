<?php
  $this->extend('/Element/applications/application_view');
  // $this->assign('editable', false);
  // $this->assign('baseClass', ' application_form');  
?>

<?php $this->start('form-actions'); ?>
    <?php
    $this->assign('MyApplications', 'active');
    $this->Html->script('ckeditor/ckeditor', ['block' => true]);
    $this->Html->script('ckeditor/config', ['block' => true]);
    $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
    $this->Html->script('jquery/jUpload/js/vendor/jquery.ui.widget.js', ['block' => true]);
    $this->Html->script('jquery/jUpload/js/jquery.iframe-transport.js', ['block' => true]);
    $this->Html->script('jquery/jUpload/js/jquery.fileupload.js', ['block' => true]);
    $this->Html->script('application_edit', ['block' => true]);


    $add_fileinput = '<button class="btn btn-warning btn-xs tiptip add-fileinput" data-toggle="tooltip" title="Add a file"
                                  style="margin-left:10px;" type="button">&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; </button>';
    ?>

    <?= $this->Flash->render() ?>
    <?php $this->ValidationMessages->display($amendment->errors()) ?>
    <div class="row">
        <div class="col-sm-12">    
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-info']);
    ?>
        </div>
    </div>

    <h3 class="text-center text-success"><u>Amendment <?= $amendment->protocol_no ?></u></h3>

    <?php echo $this->Form->create($amendment, ['type' => 'file']); ?>

    <hr>

<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <?php echo $this->Form->control('id', ['id' => 'applications-id']); ?>

    <?= $this->element('menus/tabs_menu') ?>
<?php $this->end(); ?>

<?php $this->start('application_abstract'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
    <?php echo $this->element('applications/application_abstract'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_investigator'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/application_investigator'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_sponsor'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_sponsor'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_participants'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_participants'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_sites'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_sites'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_interventions'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_interventions', ['add_fileinput' => $add_fileinput]); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_criteria'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/application_criteria'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_scope'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/application_scope'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_design'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/application_design'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_ethics'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_ethics', ['add_fileinput' => $add_fileinput]); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_organizations'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_organizations');?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_other'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/application_other'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_checklist'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_checklist'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_notifications'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_notifications'); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_mc10'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php echo $this->element('applications/amendment_mc10', ['add_fileinput' => $add_fileinput]); ?>
  </div>
<?php $this->end(); ?>

<?php $this->start('application_receipts'); ?>
  <div class="amend-form">
    <h3 class="text-center"><u>Amendment form</u></h3><br>
  <?php
    echo $this->element('applications/application_receipts');
  ?>
  </div>
<?php $this->end(); ?>


<?php $this->start('endjs'); ?>
    <br>
    <button name="submitted" value="1" id="amendmentSave" class="btn btn-primary active" type="submit" formnovalidate="formnovalidate"
          id="SadrSaveChanges" title="Save & continue editing"
          data-content="Save changes to form without submitting it. The form will still be available for further editing.">
              <span class="fa fa-edit" aria-hidden="true"></span> Save changes
    </button>
    <button name="submitted" value="2" id="amendmentSubmit" class="btn btn-success active" type="submit" formnovalidate="formnovalidate"
                    onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
            >
              <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
    </button>
    <button name="submitted" value="-1" id="amendmentCancel" class="btn btn-default active" type="submit" formnovalidate="formnovalidate"
                    onclick="return confirm('Are you sure you wish to cancel the report?');"
            >
              <span class="fa fa-close" aria-hidden="true"></span> Cancel
    </button>
    <?= $this->Form->end() ?>
    <br>
    <?= $this->Form->postLink(
              '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
              ['action' => 'delete', $amendment->id],
              ['confirm' => __('Are you sure you want to delete application # {0}?', $amendment->id), 'escape' => false,
                'class' => 'btn btn-danger active']
          )
    ?>
<?php $this->end(); ?>
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
<h3 class="text-center text-success"><u>Amendment <?= $amendment->created ?></u></h3>
<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <?= $this->Form->create($amendment, ['type' => 'file']); ?>
    <?php echo $this->Form->control('id', ['id' => 'applications-id']); ?>

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


<?php $this->start('submit_buttons'); ?>
<div class="col-xs-2">
    <div data-spy="affix" class="my-sidebar text-center">
      <button name="submitted" value="1" id="amendmentSave" class="btn btn-primary btn-block active" type="submit" formnovalidate="formnovalidate"
              id="SadrSaveChanges" title="Save & continue editing"
              data-content="Save changes to form without submitting it. The form will still be available for further editing.">
                  <span class="fa fa-edit" aria-hidden="true"></span> Save changes
      </button>
      <hr>
      <button name="submitted" value="2" id="amendmentSubmit" class="btn btn-success btn-block active" type="submit" formnovalidate="formnovalidate"
                        onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
                >
                  <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
      </button>
      <hr>
      <button name="submitted" value="-1" id="amendmentCancel" class="btn btn-default btn-block active" type="submit" formnovalidate="formnovalidate"
                        onclick="return confirm('Are you sure you wish to cancel the report?');"
                >
                  <span class="fa fa-close" aria-hidden="true"></span> Cancel
                </button>
      <?= $this->Form->end() ?>
      <hr>
      <?= $this->Form->postLink(
                '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                ['action' => 'delete', $amendment->id],
                ['confirm' => __('Are you sure you want to delete application # {0}?', $amendment->id), 'escape' => false,
                  'class' => 'btn btn-danger btn-block active']
            )
      ?>
      <hr>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-info btn-block']);
              ?>
      <hr>
    </div>

    <script type="text/javascript">
      // $(function() {
        // CKEDITOR.replace( 'drug_details' );
        // CKEDITOR.replace( 'ethic_considerations' );
        // CKEDITOR.replace( 'safety' );
        // CKEDITOR.replace( 'participants_description' );
        // CKEDITOR.replace( 'participants_justification' );
        // CKEDITOR.replace( 'countries_recruitment' );
        // CKEDITOR.replace( 'abstract-of-study');
        // CKEDITOR.replace( 'principal-inclusion-criteria');
        // CKEDITOR.replace( 'principal-exclusion-criteria');
        // CKEDITOR.replace( 'primary-end-points');
        // CKEDITOR.replace( 'other-details-explanation');
        // CKEDITOR.replace( 'notification');
      // });
    </script>
  </div>
<?php $this->end(); ?>
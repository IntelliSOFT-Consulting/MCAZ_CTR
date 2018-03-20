<?php
  $this->assign('MyApplications', 'active');
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
  $this->Html->script('jquery/jUpload/js/vendor/jquery.ui.widget.js', ['block' => true]);
  $this->Html->script('jquery/jUpload/js/jquery.iframe-transport.js', ['block' => true]);
  $this->Html->script('jquery/jUpload/js/jquery.fileupload.js', ['block' => true]);
  $this->Html->script('jquery/validate/jquery.validate', ['block' => true]);
  $this->Html->script('jquery/validate/validate', ['block' => true]);
  $this->Html->script('application_edit', ['block' => true]);


  $add_fileinput = '<button class="btn btn-warning btn-xs tiptip add-fileinput" data-toggle="tooltip" title="Add a file"
                                style="margin-left:10px;" type="button">&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; </button>';
?>

<div class="row">
  <?= $this->fetch('header'); ?>
  <?= $this->Flash->render() ?>
  <?php $this->ValidationMessages->display($application->errors()) ?>
</div>
<div class="row">
  <?php //pr($application->mc10_forms) ?>
  <?= $this->Form->create($application, ['type' => 'file', 'id' => 'application_form']); ?>
  <?php echo $this->Form->control('id', ['id' => 'applications-id']); ?>
    <div class="col-md-10">
      <div id="tabs">
        <?= $this->element('menus/tabs_menu') ?>

        <div id="tabs-1">
          <?php echo $this->element('applications/application_abstract'); ?>
        </div>
        <div id="tabs-2">
          <?php echo $this->element('applications/application_investigator'); ?>
        </div>
        <div id="tabs-3" >
          <?php echo $this->element('applications/application_sponsor'); ?>          
        </div>
        <div id="tabs-4">
          <?php echo $this->element('applications/application_participants'); ?>                 
        </div>
        <div id="tabs-5">
          <?php echo $this->element('applications/application_sites'); ?>           
        </div>
        <div id="tabs-6">
          <?php echo $this->element('applications/application_interventions', ['add_fileinput' => $add_fileinput]); ?>        
        </div>
        <div id="tabs-7">
          <?php echo $this->element('applications/application_criteria'); ?> 
        </div>
        <div id="tabs-8">
          <?php echo $this->element('applications/application_scope'); ?> 
        </div>
        <div id="tabs-9">
          <?php echo $this->element('applications/application_design'); ?> 
        </div>
        <div id="tabs-10">
          <?php echo $this->element('applications/application_ethics', ['add_fileinput' => $add_fileinput]); ?> 
        </div>
        <div id="tabs-11">
          <?php echo $this->element('applications/application_other'); ?> 
        </div>

        <div id="tabs-12">
          <?php echo $this->element('multi/checklist'); ?>
        </div>
        <div id="tabs-13">
          <?php echo $this->element('applications/application_mc10', ['add_fileinput' => $add_fileinput]); ?> 
        </div>
        <div id="tabs-14">
          <?php
            echo $this->element('multi/receipts');
          ?>
        </div>
      </div>

<br>
<div id="tabid"></div>
<div class="row Footer">
  <div class="col-md-6">    
          <div class="divleft pull-left">
              <button id="btnMoveLeftTab" class="btn btn-default" type="button" value="Previous page" text="Previous page"> 
                <i class="fa fa-backward"></i> Previous page
              </button>
          </div>
  </div>
  <div class="col-md-6">    
          <div class="divright pull-right">
              <button id="btnMoveRightTab" class="btn btn-default" type="button" value="Next"  text="Next page"> <i class="fa fa-forward"></i> Next page
              </button>
          </div>
  </div>
</div>

  </div>
  <div class="col-md-2">
    <div data-spy="affix" class="my-sidebar text-center">
      <button name="submitted" value="1" id="applicationSave" class="btn btn-primary btn-block active" type="submit" formnovalidate="formnovalidate"
              id="SadrSaveChanges" title="Save & continue editing"
              data-content="Save changes to form without submitting it. The form will still be available for further editing.">
                  <span class="fa fa-edit" aria-hidden="true"></span> Save changes
      </button>
      <hr>
      <button name="submitted" value="2" id="applicationSubmit" class="btn btn-success btn-block active" type="submit" formnovalidate="formnovalidate"
                        onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
                >
                  <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
      </button>
      <hr>
      <button name="submitted" value="-1" id="applicationCancel" class="btn btn-default btn-block active" type="submit" formnovalidate="formnovalidate"
                        onclick="return confirm('Are you sure you wish to cancel the report?');"
                >
                  <span class="fa fa-close" aria-hidden="true"></span> Cancel
                </button>
      <?= $this->Form->end() ?>
      <hr>
      <?= $this->Form->postLink(
                '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                ['action' => 'delete', $application->id],
                ['confirm' => __('Are you sure you want to delete application # {0}?', $application->id), 'escape' => false,
                  'class' => 'btn btn-danger btn-block active']
            )
      ?>
      <hr>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-info btn-block']);
              ?>
      <hr>
    </div>
  </div>
</div>


<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
?>

<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center">GCP Inspections</h4>
    <hr>
    <?php
      if(!empty($application->gcp_inspections)) {
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'gcp', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
      }          
    ?>
    <?php foreach ($application->gcp_inspections as $gcp_inspection) { 
      ?>
    <div class="ctr-groups <?php if($gcp_inspection->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $gcp_inspection['created'] ?> by <?= $gcp_inspection->user->name ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'gcp', '_ext' => 'pdf', $gcp_inspection->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">Internal MCAZ Comments:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $gcp_inspection['internal_review_comment'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Applicant Visible Comments:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $gcp_inspection['applicant_review_comment'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Decision:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $gcp_inspection['decision'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">GCP Attachment:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?php if (!empty($gcp_inspection['file'])) {
                          echo $this->Html->link($gcp_inspection->file, substr($gcp_inspection->dir, 8) . '/' . $gcp_inspection->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>   

        <hr>
      </form>      
        <?php
        if($prefix == 'manager') {
            echo    $this->Form->postLink(
                  '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                  ['action' => 'remove-gcp-inspection', $gcp_inspection->id],
                  ['confirm' => 'Are you sure you want to delete this GCP inspection for '.$application->protocol_no.'?', 'escape' => false,
                    'class' => 'btn btn-warning btn-xs active']
              );
        }
        ?>        
    </div>
    <?php }  ?>
    <hr> <br>
    <?php if($prefix != 'director_general') { ?> 
    <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'add-gcp-inspection']]); ?>
        <div class="row">
          <div class="col-xs-12">
          <?php
                echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('gcp_inspections.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('gcp_inspections.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                echo $this->Form->control('gcp_inspections.100.internal_review_comment', ['label' => '<label class="text-success">Internal MCAZ Comments</label>', 'escape' => false, 'templates' => 'textarea_form']);
                echo $this->Form->control('gcp_inspections.100.applicant_review_comment', ['label' => '<label class="text-success">Applicant Visible Comments</label>', 'escape' => false, 'templates' => 'textarea_form']);
                echo $this->Form->control('gcp_inspections.100.decision', ['type' => 'radio', 
                               'label' => '<b>Decision</b>', 'escape' => false,
                               'templates' => 'radio_form',
                               'options' => [
                                  'Compliance' => 'Compliance', 
                                  'Pending' => 'Pending', 
                                  'Non-compliance' => 'Non-compliance', ]]);                     
                echo $this->Form->control('gcp_inspections.100.file', ['label' => 'GCP Attachment', 'type' => 'file', 'escape' => false, 'templates' => 'app_form']);
          ?>
          </div>          
        </div>
        <div class="form-group"> 
            <div class="col-sm-12"> 
              <button type="submit" class="btn btn-primary active" id="sendRequest"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
            </div> 
        </div>
    <?php echo $this->Form->end(); } ?>

  </div>
</div>

<script type="text/javascript">
  CKEDITOR.replace('gcp-inspections-100-internal-review-comment');
  CKEDITOR.replace('gcp-inspections-100-applicant-review-comment');
</script>
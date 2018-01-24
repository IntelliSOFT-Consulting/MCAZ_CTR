<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
?>

<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center">GCP Inspections</h4>
    <h6 class="text-center muted">GCP Declaration form(s)</h6>
    <?php foreach ($application->gcp_inspections as $gcp_inspection) { 
      ?>
    <div class="ctr-groups  <?php if($gcp_inspection->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $gcp_inspection['created'] ?> by <?= ($gcp_inspection->user->group_id != 4) ? 'MCAZ' : $gcp_inspection->user->name; ?></em></small></p>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">Comments:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $gcp_inspection['applicant_review_comment'] ?></p>
          </div> 
        </div> 
        <?php if(!empty($gcp_inspection['decision'])) { ?>
        <div class="form-group">
          <label class="col-sm-4 control-label">Decision:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $gcp_inspection['decision'] ?></p>
          </div> 
        </div> 
        <?php } ?>
        <div class="form-group">
          <label class="col-sm-4 control-label">GCP Attachment:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?php if (!empty($gcp_inspection['file'])) {
                          echo $this->Html->link($gcp_inspection->file, substr($gcp_inspection->dir, 8) . '/' . $gcp_inspection->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>      
      </form>              
    </div>
    <?php }   ?>
    <br>
    <hr>
    <br>
    <?php echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-gcp-inspection']]); ?>
        <div class="row">
          <div class="col-xs-12">
          <?php
                echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('gcp_inspections.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('gcp_inspections.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                echo $this->Form->control('gcp_inspections.100.applicant_review_comment', ['label' => '<label class="text-success">Comments</label>', 'escape' => false, 'templates' => 'textarea_form']);
                echo $this->Form->control('gcp_inspections.100.file', ['label' => 'GCP Attachment', 'type' => 'file', 'escape' => false, 'templates' => 'app_form']);
          ?>
          </div>          
        </div>
        <div class="form-group"> 
            <div class="col-sm-12"> 
              <button type="submit" class="btn btn-success active" id="sendRequest"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
            </div> 
        </div>
    <?php echo $this->Form->end() ?>

  </div>
</div>

<script type="text/javascript">
  CKEDITOR.replace('gcp-inspections-100-applicant-review-comment');
</script>
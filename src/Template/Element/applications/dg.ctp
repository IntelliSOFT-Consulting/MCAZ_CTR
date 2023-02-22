<?php

use Cake\Utility\Hash;

$this->Html->script('ckeditor/ckeditor', ['block' => true]);
$this->Html->script('ckeditor/config', ['block' => true]);
$this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
// $this->Html->script('comments/attachos', ['block' => true]);
$this->Html->script('comments/dg', ['block' => true]);
?>

<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center"><label class="text-success">Director General Reviews</label></h4>
    <hr>
    <?php

    // if($prefix == 'director_general') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Authorization Certificate', ['action' => 'certificate', '_ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-success', 'id' => 'download_certificate']);
    echo '<br>';
    if (!empty($application->dg_reviews)) {
      echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'dg', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
    }
    ?>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <?php foreach ($application->dg_reviews as $dg_review) {  ?>
      <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">reviewed on: <?= $dg_review['created'] ?> by <?= $dg_review->user->name ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'dg', '_ext' => 'pdf', $dg_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
        <div class="amend-form">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-xs-4 control-label">Internal Review comment</label>
              <div class="col-xs-8">
                <p class="form-control-static"><?= $dg_review->internal_review_comment ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-4 control-label">Applicant Review comment</label>
              <div class="col-xs-8">
                <p class="form-control-static"><?= $dg_review->applicant_review_comment ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-4 control-label">Applicant Review comment</label>
              <div class="col-xs-8">
                <p class="form-control-static"><?= $dg_review->authorization_letter ?></p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <label class="control-label">Authorization Certificate</label>
                <p class="form-control-static"><?= $dg_review->authorization_certificate ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-4 control-label">Director General Decision:</label>
              <div class="col-xs-8">
                <p class="form-control-static"><?= $dg_review['decision'] ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-4 control-label">Decision Date:</label>
              <div class="col-xs-8">
                <p class="form-control-static"><?= $dg_review['approved_date'] ?></p>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label">Approval Letter</label>
              <?php foreach ($dg_review->attachments as $attachment) {
                if ($attachment->category === 'approval_letter') { ?>
                  <p class="form-control-static text-info text-left"><?php
                                                                      echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                                                                      ?></p>
                  <p><?= $attachment['description'] ?></p>
              <?php }
              } ?>
            </div>

            <?php /* ?>
                  <div class="form-group">
                    <label class="control-label">Authorization Certificate</label>
                    <?php foreach ($dg_review->attachments as $attachment) { 
                            if($attachment->category === 'authorization_letter') { ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php } } ?>
                  </div> 
                  <?php */ ?>

            <div class="form-group">
              <label class="control-label">Indemnity Forms</label>
              <?php foreach ($dg_review->attachments as $attachment) {
                if ($attachment->category === 'indemnity_forms') { ?>
                  <p class="form-control-static text-info text-left"><?php
                                                                      echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                                                                      ?></p>
                  <p><?= $attachment['description'] ?></p>
              <?php }
              } ?>
            </div>

          </form> <br>

        </div>
        <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
        <hr>
        <?php
        if ($prefix == 'manager' or $dg_review->user_id == $this->request->session()->read('Auth.User.id')) {
          echo    $this->Form->postLink(
            '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
            ['action' => 'remove-dg-review', $dg_review->id],
            [
              'confirm' => 'Are you sure you want to delete this review for ' . $application->protocol_no . '?', 'escape' => false,
              'class' => 'btn btn-warning btn-xs active'
            ]
          );
        }
        ?>

      </div>
    <?php } ?>

    <!-- TODO: Check if no previous decision is either approved or declied -->
    <?php if ($prefix === 'director_general') { ?>
      <hr style="border-width: 1px; border-color: #8a6d3b;">
      <?php if (
        !in_array("10", Hash::extract($application->application_stages, '{n}.stage_id'))
        and !in_array($application->approved, ['DirectorAuthorize', 'DirectorDeclined'])
      ) { ?>
        <?php if (count($application->evaluations) > 0) { ?>
          <?php echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-dg-review', $application->id], 'class' => 'form-horizontal']); ?>
          <div class="row">
            <div class="col-xs-12">
              <?php
              echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
              echo $this->Form->control('dg_reviews.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
              echo $this->Form->control('dg_reviews.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
              echo $this->Form->control('dg_reviews.100.model', ['type' => 'hidden', 'value' => 'DgReviews', 'templates' => 'table_form']);
              echo $this->Form->control('dg_reviews.100.internal_review_comment', ['escape' => false, 'templates' => 'textarea_form']);
              echo $this->Form->control('dg_reviews.100.applicant_review_comment', ['label' => 'Applicant review comment <small class="muted">(sent to applicants)</small>', 'escape' => false, 'templates' => 'textarea_form']);
              $cell = $this->cell('Certificate', [$application->id]);
              echo $this->Form->control('dg_reviews.100.authorization_certificate', [
                'label' => 'Authorization certificate <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
                'escape' => false, 'value' => $cell, 'templates' => 'textarea_form'
              ]);

              echo $this->Form->control('dg_reviews.100.decision', [
                'type' => 'radio',
                'label' => '<b>DG Decision</b>', 'escape' => false,
                'templates' => 'radio_form',
                'options' => [
                  'Authorize' => 'Authorize',
                  'Pending' => 'Pending',
                  'Declined' => 'Declined',
                ]
              ]);
              echo $this->Form->control('dg_reviews.100.approved_date', ['type' => 'text', 'class' => 'datepickers', 'templates' => [
                'label' => '<div class="col-sm-4 control-label"><label {{attrs}}>{{text}}</label></div>',
                'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
              ]]);
              // echo $this->Form->control('dg_reviews.100.attachments.100.file', ['escape' => false, 'templates' => 'app_form']);
              // dg_reviews[100][attachments][100][file]
              ?>

              <div class="row">
                <div class="col-xs-12">
                  <div class="checkcontrols">
                    <?php
                    echo $this->Form->control(
                      'dg_reviews.100.approval_letter',
                      ['type' => 'checkbox', 'label' => 'Approval Letter <i class="sterix fa fa-asterisk" aria-hidden="true"></i><button type="button" id="approval_letter" class="btn btn-primary btn-xs addApprovalLetter">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>', 'escape' => false, 'templates' => 'checklist_form']
                    );
                    ?>
                    <div class="uploadsTable"> </div>
                  </div>
                </div>
              </div>

              <?php /* ?>
                  <div class="row">
                      <div class="col-xs-12">
                      <div class="checkcontrols">
                        <?php
                            echo $this->Form->control('dg_reviews.100.authorization_letter', 
                                        ['type' => 'checkbox', 'label' => 'Authorization Letter <i class="sterix fa fa-asterisk" aria-hidden="true"></i><button type="button" id="authorization_letter" class="btn btn-primary btn-xs addAuthLetter">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>', 'escape' => false, 'templates' => 'checklist_form']);
                        ?>
                        <div class="uploadsTable">   </div>
                      </div>
                    </div>
                  </div>
                  <?php */ ?>

              <!-- <div class="row">
                      <div class="col-xs-12">
                          <h6 class="muted text-center"><b>Authorization Certificate </b>
                              <button type="button" class="btn btn-primary btn-xs addUpload">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
                          </h6>
                        <hr>
                      <div class="uploadsTable">

                      </div>
                      </div>
                  </div> -->
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Review</button>
            </div>
          </div>
          <?php echo $this->Form->end() ?>
        <?php } ?>
      <?php } ?>
    <?php } ?>
  </div>
</div>

<script type="text/javascript">
  if ($('#dg-reviews-100-internal-review-comment').length) {
    CKEDITOR.replace('dg-reviews-100-internal-review-comment');
  }
  if ($('#dg-reviews-100-applicant-review-comment').length) {
    CKEDITOR.replace('dg-reviews-100-applicant-review-comment');
  }
  if ($('#dg-reviews-100-authorization-certificate').length) {
    CKEDITOR.replace('dg-reviews-100-authorization-certificate');
  }
  $("#dg-reviews-100-approved-date").datepicker({
    minDate: "-100Y",
    maxDate: "-0D",
    dateFormat: 'dd-mm-yy',
    showButtonPanel: true,
    changeMonth: true,
    changeYear: true,
    buttonImageOnly: true,
    showAnim: 'show',
    showOn: 'both',
    buttonImage: '/img/calendar.gif'
  });
</script>
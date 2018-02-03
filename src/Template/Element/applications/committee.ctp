<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
?>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-warning">PVCT Committee Reviews</label></h4>
      <hr>
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
              ?>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->committee_reviews as $committee_review) {  ?>
          <div class="thumbnail">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> by <?= $all_evaluators->toArray()[$committee_review->user_id] ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $committee_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
              <div class="amend-form">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Internal Review comment</label>
                    <div class="col-xs-8">
                      <p class="form-control-static"><?= $committee_review->internal_review_comment ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Applicant Review comment</label>
                    <div class="col-xs-8">
                      <p class="form-control-static"><?= $committee_review->applicant_review_comment ?></p>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Committee Decision:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $committee_review['decision'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="col-xs-4 control-label">File</label>
                    <div class="col-xs-7">
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($committee_review->file, substr($committee_review->dir, 8) . '/' . $committee_review->file, ['fullBase' => true]);
                      ?></p>
                    </div>
                  </div> 
                </form>  <br>
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
              <?php
              if($prefix == 'manager' or $committee_review->user_id == $this->request->session()->read('Auth.User.id')) {
                  echo    $this->Form->postLink(
                        '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                        ['action' => 'remove-committee-review', $committee_review->id],
                        ['confirm' => 'Are you sure you want to delete this review for '.$application->protocol_no.'?', 'escape' => false,
                          'class' => 'btn btn-warning btn-xs active']
                    );
              }
              ?>
            
          </div>
          <?php } ?>

          <hr style="border-width: 1px; border-color: #8a6d3b;">

         <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'add-committee-review'], 'class' => 'form-horizontal']); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('committee_reviews.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('committee_reviews.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                      echo $this->Form->control('committee_reviews.100.internal_review_comment', ['escape' => false, 'templates' => 'textarea_form']);
                      echo $this->Form->control('committee_reviews.100.applicant_review_comment', ['label' => 'Applicant review comment <small class="muted">(sent to applicants)</small>', 'escape' => false, 'templates' => 'textarea_form']);

                      echo $this->Form->control('committee_reviews.100.decision', ['type' => 'radio', 
                               'label' => '<b>Committee Decision</b>', 'escape' => false,
                               'templates' => 'radio_form',
                               'options' => [
                                  'Approved' => 'Approved', 
                                  'Pending' => 'Pending', 
                                  'Declined' => 'Declined', ]]);
                      echo $this->Form->control('committee_reviews.100.file', ['type' => 'file', 'escape' => false, 'templates' => 'app_form']);
                ?>
                </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-xs-12"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Review</button>
                  </div> 
              </div>
           <?php echo $this->Form->end() ?>
        </div>
      </div>

<script type="text/javascript">
  CKEDITOR.replace('committee-reviews-100-internal-review-comment');
  CKEDITOR.replace('committee-reviews-100-applicant-review-comment');
</script>
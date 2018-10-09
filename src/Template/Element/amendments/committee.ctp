<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
  use Cake\Utility\Hash;
  $this->Html->script('committee_view', ['block' => true]);
?>
<style type="text/css">
    .desc { display: none; }
</style>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-warning">PVCT Committee Reviews</label></h4>
      <hr>
    <?php
      if(count($amendment->committee_reviews)>0)   echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Amendments', 'action' => 'committee', '_ext' => 'pdf', $amendment->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
              ?>
    </div>
  </div>

  <?php foreach ($amendment->committee_reviews as $committee_review) {  ?>
      <div class="row">
        <div class="col-xs-12">          
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> by <?= $all_evaluators->toArray()[$committee_review->user_id] ?></em></small></p>
            <div class="amend-form">
                <?php
                echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $committee_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
                ?>
              <div class="row">
                <div class="col-xs-8">
                
                      
                        <form>
                          <div class="form-group">
                            <label class="control-label">Internal Review comment</label>
                            <div>
                              <p class="form-control-static"><?= $committee_review->internal_review_comment ?></p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Applicant Review comment</label>
                            <div>
                              <p class="form-control-static"><?= $committee_review->applicant_review_comment ?></p>
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="control-label">Committee Decision:</label>
                            <div>
                            <p class="form-control-static"><?= $committee_review['decision'] ?></p>
                            </div> 
                          </div> 
                          <div class="form-group">
                            <label class="control-label">File</label>
                            <div class="">
                              <p class="form-control-static text-info text-left"><?php
                                   echo $this->Html->link($committee_review->file, substr($committee_review->dir, 8) . '/' . $committee_review->file, ['fullBase' => true]);
                              ?></p>
                            </div>
                          </div> 
                        </form>  <br>
                          
                      <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
                      <hr>
                      <?php
                      if($prefix == 'manager' or $committee_review->user_id == $this->request->session()->read('Auth.User.id')) {
                          echo    $this->Form->postLink(
                                '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                                ['action' => 'remove-committee-review', $committee_review->id],
                                ['confirm' => 'Are you sure you want to delete this review for '.$amendment->protocol_no.'?', 'escape' => false,
                                  'class' => 'btn btn-warning btn-xs active']
                            );
                      }
                      ?>
                    
                  
                  
                </div>

                <!-- include comments -->
                <div class="col-xs-4 lefty">
                  <?php //pr($committee_review->comments) ?>
                  <?php echo $this->element('comments/list', ['comments' => $committee_review->comments]) ?> 
                  <?php if(!in_array("12", Hash::extract($amendment->application_stages, '{n}.stage_id'))) { ?>
                  <?php  
                        echo $this->element('comments/add', [
                          'model' => ['model_id' => $amendment->id, 'foreign_key' => $committee_review->id, 
                                      'model' => 'CommitteeReviews', 'category' => 'committee', 'url' => 'add-from-committee']]) 
                  ?>
                  <?php } ?>
                </div>
            </div>  
          </div>
          </div>
        </div>
      </div>
    <?php } ?>

          <hr style="border-width: 1px; border-color: #8a6d3b;">

         <?php 
         if(in_array("4", Hash::extract($amendment->application_stages, '{n}.stage_id'))) {
         echo $this->Form->create($amendment, ['type' => 'file','url' => ['action' => 'add-committee-review', $amendment->id], 'class' => 'form-horizontal']); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $amendment->id, 'escape' => false, 'templates' => 'table_form']);
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
           <?php 
            } 
            echo $this->Form->end(); ?>


<script type="text/javascript">
  CKEDITOR.replace('committee-reviews-100-internal-review-comment');
  CKEDITOR.replace('committee-reviews-100-applicant-review-comment');
</script>
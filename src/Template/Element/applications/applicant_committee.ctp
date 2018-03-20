<?php
  use Cake\Utility\Hash;
?>
  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-warning">PVCT Committee Reviews</label></h4>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
      ?>
      <hr>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->committee_reviews as $committee_review) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> </em></small></p>
              <div class="amend-form">
              <?php
              echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $committee_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
              ?>
              <div class="row">
                <div class="col-xs-8">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Comment</label>
                    <div class="col-xs-8">
                      <p class="form-control-static"><?= $committee_review->applicant_review_comment ?></p>
                    </div>
                  </div> 
                  <!-- <div class="form-group">
                    <label class="col-xs-4 control-label">Committee Decision:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?php // $committee_review['decision'] ?></p>
                    </div> 
                  </div>  -->
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Outcome Date:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $committee_review['outcome_date'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-4 control-label">File</label>
                    <div class="col-sm-7">
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($committee_review->file, substr($committee_review->dir, 8) . '/' . $committee_review->file, ['fullBase' => true]);
                      ?></p>
                    </div>
                  </div> 
                </form>  <br>

                </div>

                <!-- include comments -->
                <div class="col-xs-4 lefty">
                  <?php //pr($committee_review->comments) ?>
                  <?php echo $this->element('comments/list', ['comments' => $committee_review->comments]) ?> 
                  <?php if(!in_array("9", Hash::extract($application->application_stages, '{n}.stage_id'))) { ?>
                  <?php if(in_array("6", Hash::extract($application->application_stages, '{n}.stage_id'))) { ?>
                  <?php  
                        echo $this->element('comments/add', [
                          'model' => ['model_id' => $application->id, 'foreign_key' => $committee_review->id, 
                                      'model' => 'CommitteeReviews', 'category' => 'applicant', 'url' => 'add-from-applicant']]) 
                  ?>
                  <?php } ?>
                  <?php } ?>
                </div>
            </div> 

              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php }  ?>

        </div>
      </div>

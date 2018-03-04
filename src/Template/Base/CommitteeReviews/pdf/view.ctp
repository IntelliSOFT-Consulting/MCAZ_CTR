    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Committee Reviews</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>
    <?php foreach ($committee_reviews as $committee_review) {  ?>
          <div class="thumbnail">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> by <?= $committee_review->user->name ?></em></small></p>

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
                <?php echo $this->element('comments/list', ['comments' => $committee_review->comments]) ?> 
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php } ?>
<?php foreach ($dg_reviews as $dg_review) {  ?>
<?= $dg_review->authorization_certificate ?>
<?php } ?>
<?php /*?>
    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Director General Reviews</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>
    <?php foreach ($dg_reviews as $dg_review) {  ?>
          <div class="thumbnail">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $dg_review['created'] ?> by <?= $dg_review->user->name ?></em></small></p>

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
                    <label class="col-xs-4 control-label">Director General Decision:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $dg_review['decision'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Approved Date:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $dg_review['approved_date'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="col-xs-4 control-label">File</label>
                    <div class="col-xs-7">
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($dg_review->file, substr($dg_review->dir, 8) . '/' . $dg_review->file, ['fullBase' => true]);
                      ?></p>
                    </div>
                  </div> 
                </form>  <br>
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php } ?>
    <?php */ ?>
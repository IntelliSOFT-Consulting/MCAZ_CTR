  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-success">Director General Reviews</label></h4>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'dg', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
      ?>
      <hr>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->dg_reviews as $dg_review) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $dg_review['created'] ?> </em></small></p>
              <?php
              echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'dg', '_ext' => 'pdf', $dg_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
              ?>
              <div class="amend-form">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Comment</label>
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
                    <label class="col-xs-4 control-label">Decision Date:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $dg_review['approved_date'] ?></p>
                    </div> 
                  </div> 

                  <div class="form-group">
                    <label class="control-label">File(s)</label>
                    <?php foreach ($dg_review->attachments as $attachment) { ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php } ?>
                  </div> 
                </form>  <br>
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php }  ?>

        </div>
      </div>

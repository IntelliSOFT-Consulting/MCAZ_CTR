
  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-warning">PVCT Committee Reviews</label></h4>
      <hr>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->committee_reviews as $committee_review) {  ?>
          <div class="thumbnail">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> </em></small></p>
              <div class="amend-form">
                <form>
                  <div class="form-group">
                    <label>Applicant Review comment</label>
                    <p class="form-control-static"><?= $committee_review->applicant_review_comment ?></p>
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

        </div>
      </div>

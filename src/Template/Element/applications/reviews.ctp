<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
  $this->Html->script('application_edit', ['block' => true]);
?>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center">Evaluator Reviews</h4>
      <hr>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->reviews as $review) {  ?>
          <div class="thumbnail">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $review['created'] ?> by <?= $all_evaluators->toArray()[$review->user_id] ?></em></small></p>
              <div class="amend-form">
                <form>
                  <div class="form-group">
                    <label>Review comment</label>
                    <p class="form-control-static"><?= $review->review_comment ?></p>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label text-success">File</label>
                    <div class="col-sm-7">
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($review->file, substr($review->dir, 8) . '/' . $review->file, ['fullBase' => true]);
                      ?></p>
                    </div>
                  </div> 
                </form>  <br>
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
              <?php
              if($prefix == 'manager' or $review->user_id == $this->request->session()->read('Auth.User.id')) {
                  echo    $this->Form->postLink(
                        '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                        ['action' => 'remove-review', $review->id],
                        ['confirm' => 'Are you sure you want to delete this review for '.$application->protocol_no.'?', 'escape' => false,
                          'class' => 'btn btn-warning btn-xs active']
                    );
              }
              ?>
            
          </div>
          <?php } ?>

         <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'add-review']]); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('reviews.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('reviews.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                      echo $this->Form->control('reviews.100.review_comment', ['escape' => false, 'templates' => 'textarea_form']);
                      echo $this->Form->control('reviews.100.file', ['type' => 'file', 'escape' => false, 'templates' => 'app_form']);
                ?>
                </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-sm-12"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Review</button>
                  </div> 
              </div>
           <?php echo $this->Form->end() ?>
        </div>
      </div>

<script type="text/javascript">
  CKEDITOR.replace('reviews-100-review-comment');
</script>
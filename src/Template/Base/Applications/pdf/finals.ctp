
    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Final Report</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>
    <?php foreach ($final_stages as $final_stage) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success"><?= $final_stage['created'] ?> by <?= $final_stage->user->name ?>, email <?= $final_stage->user->email ?></em></small></p>
              <div class="amend-form">
                <form>
                  <div class="form-group">
                    <label>Comment</label>
                    <p class="form-control-static"><?= $final_stage->applicant_review_comment ?></p>
                  </div>
                  <div class="form-group">
                    <label class="control-label">File(s)</label>
                    <?php foreach ($final_stage->attachments as $attachment) { ?>                  
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
          <?php } ?>
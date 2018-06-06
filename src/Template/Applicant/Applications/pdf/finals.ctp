    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Final Stage</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>

    <?php foreach ($final_stages as $final_stage) { 
      ?>
    <div class="ctr-groups <?php if($final_stage->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $final_stage['created'] ?> by <?= $final_stage->user->name ?></em></small></p>
      <form class="form-horizontal"> 
        <div class="form-group">
          <label class="col-xs-4 control-label">Comments:</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $final_stage['applicant_review_comment'] ?></p>
          </div> 
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

        <hr>
      </form>       
    </div>
    <?php }  ?>
    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Finance </h2>
    <hr>

  <?= $this->element('pdf/common_header')?>

  <?php foreach ($annual_approvals as $annual_approval) { ?>
  <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">created: <?= $annual_approval['created'] ?></em></small></p>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-xs-4 control-label">Comment</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $annual_approval['applicant_review_comment'] ?></p>
          </div> 
        </div>   
        <div class="form-group">
          <label class="col-xs-4 control-label">Completion Date</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $annual_approval['approved_date'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-xs-4 control-label">Attachment(s)</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?php if (!empty($annual_approval['file'])) {
                          echo $this->Html->link($annual_approval->file, substr($annual_approval->dir, 8) . '/' . $annual_approval->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>      
      </form>              
    </div>
    <?php } ?>
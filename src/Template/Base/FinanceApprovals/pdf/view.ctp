    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Finance Approval</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>

  <?php foreach ($finance_approvals as $finance_approval) { ?>
  <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">created: <?= $finance_approval['created'] ?></em></small></p>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-xs-4 control-label">Internal MCAZ Comments</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $finance_approval['internal_comments'] ?></p>
          </div> 
        </div>
        <div class="form-group">
          <label class="col-xs-4 control-label">Applicant Visible Comments</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $finance_approval['public_comments'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-xs-4 control-label">Outcome</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $finance_approval['outcome'] ?></p>
          </div> 
        </div>   
        <div class="form-group">
          <label class="col-xs-4 control-label">Outcome Date</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $finance_approval['outcome_date'] ?></p>
          </div> 
        </div>         
        <div class="form-group">
          <label class="col-sm-4 control-label">Attachment(s)</label>
          <div class="col-sm-8">
          <?php foreach ($finance_approval->attachments as $attachment) { ?>                  
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                      ?></p>
                      <p><?= $attachment['description'] ?></p>
                      <?php } ?>
          </div> 
        </div>      
      </form>              
    </div>
    <?php } ?>
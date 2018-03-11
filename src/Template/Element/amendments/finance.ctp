
<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center">Finance Approvals</h4>
    <?php
      if(count($amendment->finance_approvals)>0)  echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Amendments', 'action' => 'finance', '_ext' => 'pdf', $amendment->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
              ?>
    <?php foreach ($amendment->finance_approvals as $finance_approval) { 
      ?>
    <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">created: <?= $finance_approval['created'] ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Amendments', 'action' => 'finance', '_ext' => 'pdf', $finance_approval->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">Internal MCAZ Comments</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_approval['internal_comments'] ?></p>
          </div> 
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Applicant Visible Comments</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_approval['public_comments'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Outcome</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_approval['outcome'] ?></p>
          </div> 
        </div>   
        <div class="form-group">
          <label class="col-sm-4 control-label">Outcome Date</label>
          <div class="col-sm-8">
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
    <?php }   ?>
         
  </div>
</div>

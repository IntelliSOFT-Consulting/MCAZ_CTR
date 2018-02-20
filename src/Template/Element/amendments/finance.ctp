
<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center">Finance Approvals</h4>
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Amendments', 'action' => 'finance', '_ext' => 'pdf', $amendment->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
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
          <label class="col-sm-4 control-label">Attachment</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?php if (!empty($finance_approval['file'])) {
                          echo $this->Html->link($finance_approval->file, substr($finance_approval->dir, 8) . '/' . $finance_approval->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>      
      </form>              
    </div>
    <?php }   ?>
         
  </div>
</div>

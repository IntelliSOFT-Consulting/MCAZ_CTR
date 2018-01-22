
<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center">Finance Approvals</h4>
    <?php foreach ($application->finance_approvals as $finance_approval) { 
      ?>
    <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">created: <?= $finance_approval['created'] ?></em></small></p>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">Applicant Visible Comments</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_approval['public_comments'] ?></p>
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

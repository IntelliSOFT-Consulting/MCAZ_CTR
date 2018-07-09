
<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center">Finance Approvals</h4>
    <?php foreach ($application->finance_annual_approvals as $finance_annual_approval) { 
      ?>
    <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">created: <?= $finance_annual_approval['created'] ?></em></small></p>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">Internal MCAZ Comments</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_annual_approval['internal_comments'] ?></p>
          </div> 
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Applicant Visible Comments</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_annual_approval['public_comments'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Outcome</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_annual_approval['outcome'] ?></p>
          </div> 
        </div>   
        <div class="form-group">
          <label class="col-sm-4 control-label">Outcome Date</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $finance_annual_approval['outcome_date'] ?></p>
          </div> 
        </div>     
      </form>              
    </div>
    <?php }   ?>
         
  </div>
</div>

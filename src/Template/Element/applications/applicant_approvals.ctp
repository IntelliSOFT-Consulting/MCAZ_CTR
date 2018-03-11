

<div class="row">
  <div class="col-xs-12">
    <h2 class="text-center text-success">Approvals</h2>
    <hr>
    <h4 class="text-warning">Director General</h4>
      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->dg_reviews as $dg_review) {
                  if($dg_review->decision == "Authorize" or $dg_review->decision == "Declined" ) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $dg_review['approved_date'] ?> </em></small></p>
          <?php
          echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $dg_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
          ?>
              <div class="amend-form">
                <form class="form-horizontal">                  
                  <div class="form-group"
                    <label class="col-sm-4 control-label">DG Decision:</label>
                    <div class="col-sm-8">
                    <p class="form-control-static"><?= $dg_review['decision'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Applicant Review comment</label>
                    <div class="col-sm-8">
                      <p class="form-control-static"><?= $dg_review->applicant_review_comment ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">File</label>
                    <div class="col-sm-7">
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($dg_review->file, substr($dg_review->dir, 8) . '/' . $dg_review->file, ['fullBase' => true]);
                      ?></p>
                    </div>
                  </div> 
                </form>  <br>
              </div>                   
            
          </div>
          <?php } } ?>

        </div>
      </div>
    <hr>
    <h4 class="text-warning">PVCT Committee</h4>
      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->committee_reviews as $committee_review) {
                  if($committee_review->decision == "Approved" or $committee_review->decision == "Declined" ) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> </em></small></p>
          <?php
          echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $committee_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
          ?>
              <div class="amend-form">
                <form class="form-horizontal">                  
                  <div class="form-group"
                    <label class="col-sm-4 control-label">Committee Decision:</label>
                    <div class="col-sm-8">
                    <p class="form-control-static"><?= $committee_review['decision'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Applicant Review comment</label>
                    <div class="col-sm-8">
                      <p class="form-control-static"><?= $committee_review->applicant_review_comment ?></p>
                    </div>
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
            
          </div>
          <?php } } ?>

        </div>
      </div>
    <hr>
    <h4 class="text-warning">GCP Approval</h4>
    <?php foreach ($application->gcp_inspections as $gcp_inspection) { 
                  if($gcp_inspection->decision == "Passed" or $gcp_inspection->decision == "Failed" ) {
      ?>
    <div class="ctr-groups  <?php if($gcp_inspection->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $gcp_inspection['created'] ?> by <?= ($gcp_inspection->user->group_id != 4) ? 'MCAZ' : $gcp_inspection->user->name; ?></em></small></p>
          <?php
          echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'gcp', '_ext' => 'pdf', $gcp_inspection->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
          ?>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">Comments:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $gcp_inspection['applicant_review_comment'] ?></p>
          </div> 
        </div> 
        <?php if(!empty($gcp_inspection['decision'])) { ?>
        <div class="form-group">
          <label class="col-sm-4 control-label">Decision:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $gcp_inspection['decision'] ?></p>
          </div> 
        </div> 
        <?php } ?>
        <div class="form-group">
          <label class="col-sm-4 control-label">GCP Attachment:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?php if (!empty($gcp_inspection['file'])) {
                          echo $this->Html->link($gcp_inspection->file, substr($gcp_inspection->dir, 8) . '/' . $gcp_inspection->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>      
      </form>              
    </div>
    <?php } }  ?>

    <hr>
    <h4 class="text-warning">Section 75</h4>
    <?php foreach ($application->seventy_fives as $seventy_five) { 
            if ($seventy_five->decision == 'Approved' or $seventy_five->decision == 'Declined') {  ?>
    <div class="ctr-groups  <?php if($seventy_five->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $seventy_five['created'] ?> by <?= ($seventy_five->user->group_id != 4) ? 'MCAZ' : $seventy_five->user->name; ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'section75', '_ext' => 'pdf', $seventy_five->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">MCAZ Comments:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $seventy_five['applicant_review_comment'] ?></p>
          </div> 
        </div> 
        <?php if(!empty($seventy_five['decision'])) { ?>
        <div class="form-group">
          <label class="col-sm-4 control-label">Decision:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $seventy_five['decision'] ?></p>
          </div> 
        </div> 
        <?php } ?>
        <div class="form-group">
          <label class="col-sm-4 control-label">Section 75 Attachment:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?php if (!empty($seventy_five['file'])) {
                          echo $this->Html->link($seventy_five->file, substr($seventy_five->dir, 8) . '/' . $seventy_five->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>      
      </form>              
    </div>
    <?php } }  ?>

    <hr>
    <h4 class="text-warning">Finance</h4>
    <?php foreach ($application->finance_approvals as $finance_approval) { 
            if($finance_approval->outcome == 'Fees Complete' or $finance_approval->outcome == 'Declined' ) {
      ?>
    <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">created: <?= $finance_approval['created'] ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'finance', '_ext' => 'pdf', $finance_approval->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">MCAZ Comments</label>
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
    <?php } }  ?>
  </div>
</div>

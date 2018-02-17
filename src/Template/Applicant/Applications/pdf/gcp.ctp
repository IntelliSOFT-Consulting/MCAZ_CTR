    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">GCP Inspections</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>

    <?php foreach ($gcp_inspections as $gcp_inspection) { 
      ?>
    <div class="ctr-groups <?php if($gcp_inspection->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $gcp_inspection['created'] ?> by <?= $gcp_inspection->user->name ?></em></small></p>
      <form class="form-horizontal"> 
        <div class="form-group">
          <label class="col-xs-4 control-label">Comments:</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $gcp_inspection['applicant_review_comment'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-xs-4 control-label">Decision:</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $gcp_inspection['decision'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-xs-4 control-label">GCP Attachment:</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?php if (!empty($gcp_inspection['file'])) {
                          echo $this->Html->link($gcp_inspection->file, substr($gcp_inspection->dir, 8) . '/' . $gcp_inspection->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>   

        <hr>
      </form>       
    </div>
    <?php }  ?>
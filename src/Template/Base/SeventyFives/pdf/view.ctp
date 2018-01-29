    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Section 75</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>
    <?php foreach ($seventy_fives as $seventy_five) { 
      ?>
    <div class="ctr-groups <?php if($seventy_five->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $seventy_five['created'] ?> by <?= $seventy_five->user->name ?></em></small></p>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-4 control-label">Internal MCAZ Comments:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $seventy_five['internal_review_comment'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Applicant Visible Comments:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $seventy_five['applicant_review_comment'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Decision:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?= $seventy_five['decision'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-4 control-label">Section 75 Attachment:</label>
          <div class="col-sm-8">
          <p class="form-control-static"><?php if (!empty($seventy_five['file'])) {
                          echo $this->Html->link($seventy_five->file, substr($seventy_five->dir, 8) . '/' . $seventy_five->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>   

        <hr>
      </form>             
    </div>
    <?php }  ?>
<?php
  $this->Html->script('comments/applicant_dg', ['block' => true]);
?>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-success">Indemnity Forms</label></h4>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'dg', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
      ?>
      <hr>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->dg_reviews as $dg_review) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $dg_review['created'] ?> </em></small></p>
              <?php
              echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'dg', '_ext' => 'pdf', $dg_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
              ?>
              <div class="amend-form">
                <!-- <form class="form-horizontal"> -->
                <?php echo $this->Form->create($dg_review, ['type' => 'file','url' => ['action' => 'add-indemnity-forms', $dg_review->id, 'prefix' => 'applicant'], 'class' => 'form-horizontal']); ?>
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Comment</label>
                    <div class="col-xs-8">
                      <p class="form-control-static"><?= $dg_review->applicant_review_comment ?></p>
                    </div>
                  </div> 
                  <?php /*
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Director General Decision:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $dg_review['decision'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Decision Date:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $dg_review['approved_date'] ?></p>
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label class="control-label">Approval Letter</label>
                    <?php foreach ($dg_review->attachments as $attachment) { 
                            if($attachment->category === 'approval_letter') { ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php } } ?>
                  </div>                   
                  */ ?>

                  <div class="form-group">
                    <label class="control-label">Authorization Letter</label>
                    <?php foreach ($dg_review->attachments as $attachment) { 
                            if($attachment->category === 'authorization_letter') { ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php } } ?>
                  </div> 

              <?php if($application->approved === 'DirectorAuthorize' || $application->approved === 'Authorize') { ?>
                  <div class="form-group">
                    <label class="control-label">Indemnity Forms</label>
                    <?php 
                    $czech = 0;
                    foreach ($dg_review->attachments as $attachment) { 
                      if($attachment->category === 'indemnity_forms') { 
                        $czech++;
                              ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php 
                        } 
                      } 
                    ?>
                  </div> 

                  <?php
                    if($czech == 0) { 
                  ?>
                  <div class="row">
                      <div class="col-xs-12">
                      <div class="checkcontrols">
                        <?php
                            echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                            echo $this->Form->control('id', ['type' => 'hidden', 'escape' => false, 'value' => $dg_review->id, 'templates' => 'table_form']);
                            // echo $this->Form->control('indemnity_forms', 
                                        // ['type' => 'checkbox', 'label' => 'Indemnity Forms <i class="sterix fa fa-asterisk" aria-hidden="true"></i><button type="button" id="indemnity_forms" class="btn btn-primary btn-xs addIndemnityForm">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>', 'escape' => false, 'templates' => 'checklist_form']);
                        ?>
                        <label class="control-label">Upload!</label>
                        <button type="button" id="indemnity_forms" class="btn btn-success btn-xs addIndemnityForm">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
                        <div class="uploadsTable">   </div>
                      </div>
                    </div>
                  </div> 
                  <br>
                  <div class="form-group"> 
                      <div class="col-xs-12"> 
                        <button type="submit" class="btn btn-primary active" id="submitIndForm"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                      </div> 
                  </div>             
                  <?php 
                    } 
                  ?>
              <?php } ?>
                <!-- </form>   -->                
                <?php echo $this->Form->end() ?>
                <br>
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php }  ?>

        </div>
      </div>

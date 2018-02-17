<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
?>

<div class="row">
  <div class="col-xs-12">
    <h4 class="text-center">IMPORTATION OF UNREGISTERED PRODUCTS</h4>
    <h6 class="text-center muted">Section 75 of the Medicines and Allied Substances Control Act [Chapter 15:03]</h6>    
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'section75', '_ext' => 'pdf', $application->id, 'All', ], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
              ?>
    <?php foreach ($application->seventy_fives as $seventy_five) { 
      ?>
    <div class="ctr-groups <?php if($seventy_five->user->group_id != 4) echo 'amend-form'; ?>">
        <p class="topper"><small><em class="text-success">created: <?= $seventy_five['created'] ?> by <?= $seventy_five->user->name ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'section75', '_ext' => 'pdf', $seventy_five->id, ], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
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
        <?php
        if($prefix == 'manager') {
            echo    $this->Form->postLink(
                  '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                  ['action' => 'remove-section75-review', $seventy_five->id],
                  ['confirm' => 'Are you sure you want to delete this section 75 review for '.$application->protocol_no.'?', 'escape' => false,
                    'class' => 'btn btn-warning btn-xs active']
              );
        }
        ?>        
    </div>
    <?php }  ?>
    <br> <hr> <br>
    <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'add-section75-review']]); ?>
        <div class="row">
          <div class="col-xs-12">
          <?php
                echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('seventy_fives.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('seventy_fives.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                echo $this->Form->control('seventy_fives.100.internal_review_comment', ['label' => '<label class="text-success">Internal MCAZ Comments</label>', 'escape' => false, 'templates' => 'textarea_form']);
                echo $this->Form->control('seventy_fives.100.applicant_review_comment', ['label' => '<label class="text-success">Applicant Visible Comments</label>', 'escape' => false, 'templates' => 'textarea_form']);
                echo $this->Form->control('seventy_fives.100.decision', ['type' => 'radio', 
                               'label' => '<b>Decision</b>', 'escape' => false,
                               'templates' => 'radio_form',
                               'options' => [
                                  'Approved' => 'Approved', 
                                  'Pending' => 'Pending', 
                                  'Declined' => 'Declined', ]]);                     
                echo $this->Form->control('seventy_fives.100.file', ['label' => 'Section 75 Attachment', 'type' => 'file', 'escape' => false, 'templates' => 'app_form']);
          ?>
          </div>          
        </div>
        <div class="form-group"> 
            <div class="col-sm-12"> 
              <button type="submit" class="btn btn-primary active" id="sendRequest"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
            </div> 
        </div>
    <?php echo $this->Form->end() ?>

  </div>
</div>

<script type="text/javascript">
  CKEDITOR.replace('seventy-fives-100-internal-review-comment');
  CKEDITOR.replace('seventy-fives-100-applicant-review-comment');
</script>
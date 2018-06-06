<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
  $this->Html->script('comments/annual_approvals', ['block' => true]);
?>

<div class="row">
  <?= $this->Flash->render() ?>
  <?php $this->ValidationMessages->display($application->errors()) ?>
</div>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-success">Annual Approvals</label></h4>
      <hr>
    <?php
      if(!empty($application->annual_approvals)) {
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'annualApprovals', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
      }          
    ?>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->annual_approvals as $annual_approval) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">submitted on: <?= $annual_approval['created'] ?> by <?= $annual_approval->user->name ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'annualApprovals', '_ext' => 'pdf', $annual_approval->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
        ?>
              <div class="amend-form">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Comment</label>
                    <div class="col-xs-8">
                      <p class="form-control-static"><?= $annual_approval->applicant_review_comment ?></p>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Completion Date:</label>
                    <div class="col-xs-8">
                    <p class="form-control-static"><?= $annual_approval['approved_date'] ?></p>
                    </div> 
                  </div> 

                  <div class="form-group">
                    <label class="control-label">File(s)</label>
                    <?php foreach ($annual_approval->attachments as $attachment) { ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php } ?>
                  </div> 

                </form>  <br>

              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php } ?>

          <!-- TODO: Check if no previous decision is either authorize or declined -->
          <?php if($prefix === 'applicant') { ?> 
          <hr style="border-width: 1px; border-color: #8a6d3b;">
          <?php if(count($application->evaluations) > 0 && $application->approved === 'Authorize') { ?> 
          <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'add-annual-approval', $application->id], 'class' => 'form-horizontal']); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('annual_approvals.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('annual_approvals.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                      echo $this->Form->control('annual_approvals.100.applicant_review_comment', ['label' => 'Comment', 'escape' => false, 'templates' => 'textarea_form']);

                      echo $this->Form->control('annual_approvals.100.approved_date', ['label' => 'Completion Date', 'type' => 'text', 
                        'class' => 'datepickers', 'templates' => [
              'label' => '<div class="col-sm-4 control-label"><label {{attrs}}>{{text}}</label></div>',
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);
                ?>                
                  <div class="row">
                      <div class="col-xs-12">
                        <div class="checkcontrols">
                          <h4 class="text-center"><b>Attach File(s) and Receipts!!</b>
                              <button type="button" id="annual_approvals" class="btn btn-success btn-xs addAnnual">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
                          </h4>
                           <div class="annualsTable">   </div>
                         </div>
                        <hr>
                      </div>
                  </div>
                  
                </div>          
              </div>
              <br>
              <div class="form-group"> 
                  <div class="col-xs-12"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                  </div> 
              </div>
           <?php echo $this->Form->end() ?>
           <?php } ?>
           <?php } ?>
        </div>
      </div>

<script type="text/javascript">
  CKEDITOR.replace('annual-approvals-100-applicant-review-comment');
  $( "#annual-approvals-100-approved-date" ).datepicker({
      minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true,
      buttonImageOnly:true, showAnim:'show', showOn:'both', buttonImage:'/img/calendar.gif'
    });
</script>
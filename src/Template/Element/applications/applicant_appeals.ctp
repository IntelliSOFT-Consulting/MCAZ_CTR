<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
  $this->Html->script('multi/appeals', ['block' => true]);
?>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-danger">Appeals</label></h4>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'appeal', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
              ?>
      <hr>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->appeals as $appeal) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success"><?= $appeal['created'] ?> by <?= $appeal->user->name ?>, email <?= $appeal->user->email ?></em></small></p>
              <?php
              echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'appeal', '_ext' => 'pdf', $appeal->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
              ?>
              <div class="amend-form">
                <form>
                  <div class="form-group">
                    <label>Comment</label>
                    <p class="form-control-static"><?= $appeal->comment ?></p>
                  </div>

                  <div class="form-group">
                    <label class="control-label">File(s)</label>
                    <?php foreach ($appeal->attachments as $attachment) { ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php } ?>
                  </div> 
                </form>  <br>
              </div>      
            
          </div>
          <?php } ?>

          <hr style="border-width: 1px; border-color: #8a6d3b;">

         <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'raise-appeal'], 'class' => 'form-horizontal']); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('appeals.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('appeals.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                      echo $this->Form->control('appeals.100.comment', ['label' => 'Comment', 'escape' => false, 'templates' => 'textarea_form']);
                ?>

                  <div class="row">
                      <div class="col-xs-12">
                        <div class="appealsTable">
                          <h6 class="muted"><b>Attach File(s) </b>
                              <button type="button" class="btn btn-primary btn-xs addAppealFile">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
                          </h6>
                          <hr>
                        </div>
                      </div>
                  </div>

                </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-sm-12"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                  </div> 
              </div>
           <?php echo $this->Form->end() ?>
        </div>
      </div>

<script type="text/javascript">
  CKEDITOR.replace('appeals-100-comment');
</script>
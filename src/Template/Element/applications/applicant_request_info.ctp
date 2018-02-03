<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
?>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-success">Request for Info</label></h4>
      <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'communication', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
              ?>
      <hr>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <?php foreach ($application->request_infos as $request_info) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success"><?= $request_info['created'] ?> by <?= $request_info->user->name ?>, email <?= $request_info->user->email ?></em></small></p>
              <?php
              echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'communication', '_ext' => 'pdf', $request_info->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
              ?>
              <div class="amend-form">
                <form>
                  <div class="form-group">
                    <label>MCAZ comment</label>
                    <p class="form-control-static"><?= $request_info->mcaz_comment ?></p>
                  </div>
                  <div class="form-group">
                    <label>Applicant comment</label>
                    <p class="form-control-static"><?= $request_info->applicant_comment ?></p>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">File</label>
                    <div class="col-sm-7">
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($request_info->file, substr($request_info->dir, 8) . '/' . $request_info->file, ['fullBase' => true]);
                      ?></p>
                    </div>
                  </div> 
                </form>  <br>
              </div>      
            
          </div>
          <?php } ?>

          <hr style="border-width: 1px; border-color: #8a6d3b;">

         <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'request-info-response'], 'class' => 'form-horizontal']); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('request_infos.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('request_infos.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                      // echo $this->Form->control('request_infos.100.mcaz_comment', ['label' => 'MCAZ Comment' ,'escape' => false, 'templates' => 'textarea_form']);
                      echo $this->Form->control('request_infos.100.applicant_comment', ['label' => 'Applicant comment <small class="muted">(sent to mcaz)</small>', 'escape' => false, 'templates' => 'textarea_form']);
                      echo $this->Form->control('request_infos.100.file', ['type' => 'file', 'escape' => false, 'templates' => 'app_form']);
                ?>
                </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-sm-12"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Respond</button>
                  </div> 
              </div>
           <?php echo $this->Form->end() ?>
        </div>
      </div>

<script type="text/javascript">
  CKEDITOR.replace('request-infos-100-applicant-comment');
</script>
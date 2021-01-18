<?php 

  use Cake\Utility\Hash;
  $this->Html->css('bootstrap/comments.css', ['block' => true]);
  $this->Html->script('comments/comments', ['block' => true]);
  $v = array_unique(Hash::extract($application->committee_comments, '{n}[approver>0].model_id'));
  rsort($v);
  // print_r($v);
?>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-info"><u>PVCT Committee Feedback</u></label></h4>
      <hr>
    <?php
      if(!empty($application->committee_reviews)) {
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download ', ['controller' => 'Applications', 'action' => 'committee-feedback', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-success btn-sm']);              
      }
    ?>
    </div>
  </div>

  <?= $this->element('pdf/common_header')?>
  <div class="row">
    <div class="col-xs-12">
      <h4>Preamble</h4>
      <p>The application was tabled at the PVCT Committee Meeting and the applicant was requested to address the following issues:</p>
    </div>  
  </div>

<div class="row">
  <div class="col-xs-12">   
    <?php
      foreach ($v as $cn) {
    ?>
      <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#<?= $cn ?>" aria-expanded="false" aria-controls="<?= $cn ?>">
               PVCT Committee Meeting Number: <?= $cn ?>
            </a>
            <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>" id="<?= $cn ?>">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th scope="col">Committee query</th>
                          <th scope="col">Applicant's response</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0; ?>
                    <?php 
                        foreach ($application->committee_comments as $comment): 
                          if($comment->model_id == $cn) {
                            $disp = false;
                            if($prefix == 'evaluator' and $comment->user_id == $this->request->session()->read('Auth.User.id')) $disp = true;
                            if($prefix == 'evaluator' and $comment->user_id != $this->request->session()->read('Auth.User.id') and $comment->submitted == '2') $disp = true;
                            if($prefix == 'manager' and $comment->submitted == '2') $disp = true;
                            if($prefix == 'director_general' and $comment->submitted == '2') $disp = true;
                            if($prefix == 'applicant' and $comment->approver > 0) $disp = true;
                            if($disp) {
                      ?>
                    <?php $i++ ?>
                      <tr class="<?php 
                            if($comment->approver > 0) {
                                echo 'success';
                            } elseif ($comment->submitted == '2') {
                                echo 'info';
                            } else {
                                echo 'base';
                            }
                         ?>">
                        <td><?= $i ?></td>
                        <td>
                          <label class="control-label"><?=  $comment->subject ?></label><br>
                          <?=  $comment->content ?>
                          <div>
                            <p style="text-decoration: underline;">File(s)</p>
                            <?php foreach ($comment->attachments as $attachment) { ?>                  
                                <p class="form-control-static text-info text-left"><?php
                                     echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                                ?></p>
                                <p><?= $attachment['description'] ?></p>
                                <?php } ?>
                          </div> 
                          <hr>
                        </td>
                        <td>
                          <?php foreach($comment->responses as $response): ?>    
                              <label class="control-label"><?=  $response->subject ?></label>
                              <p><?= $response->content ?></p>    
                              <div>
                              <p style="text-decoration: underline;">File(s)</p>
                              <?php foreach ($response->attachments as $attachment) { ?>                  
                                  <p class="form-control-static text-info text-left"><?php
                                       echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                                  ?></p>
                                  <p><?= $attachment['description'] ?></p>
                                  <?php } ?> 
                                  <hr>   
                              </div> 
                            <?php endforeach; ?>

                            <div class="row">    
                        <?php if(!in_array("9", Hash::extract($application->application_stages, '{n}.stage_id'))) { ?>
                        <?php if(in_array("6", Hash::extract($application->application_stages, '{n}.stage_id'))) { ?>
                              <div class="col-xs-12">
                              <div class="bs-example">
                              <?php echo $this->Form->create(null, ['type' => 'file','url' => ['controller' => 'Comments', 'action' => 'add-from-applicant', 'prefix' => $prefix]]); ?>
                                <?php
                                    echo $this->Form->control('model_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                                    echo $this->Form->control('foreign_key', ['type' => 'hidden', 'value' => $comment->id, 'templates' => 'comment_form']);
                                    echo $this->Form->control('model', ['type' => 'hidden', 'value' => 'Comments', 'templates' => 'table_form']);
                                    echo $this->Form->control('category', ['type' => 'hidden', 'value' => 'committee', 'templates' => 'table_form']);
                                    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);                
                                    echo $this->Form->control('sender', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.name'), 'templates' => 'comment_form']);
                                    echo $this->Form->control('subject', ['label' => 'Subject', 'templates' => 'comment_form']);
                                    echo $this->Form->control('content', ['label' => 'Response', 'type' => 'textarea', 'templates' => 
                                          [
                                          'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                                          'textarea' => '<textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea>',]]);                     
                                ?>
                                <div class="row">
                                    <div class="col-xs-12">
                                      <div class="uploadsTable">
                                        <h6 class="muted"><b>Attach File(s) </b>
                                            <button type="button" class="btn btn-primary btn-xs addUpload">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
                                        </h6>
                                        <hr>
                                      </div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-xs-12"> 
                                      <!-- <button type="submit" class="btn btn-success active"><i class="fa fa-save" aria-hidden="true"></i> Submit</button> -->                                  
                <button type="submit" class="btn btn-success active" name="submitChanges" value="2"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                <button type="submit" class="btn btn-warning btn-sm" name="saveChanges" value="1"><i class="fa fa-save" aria-hidden="true"></i> Submit <small>(without notifications)</small> </button>
                                    </div> 
                                </div>
                              <?php echo $this->Form->end() ?>
                              </div>
                              </div>
                      <?php } ?>
                      <?php } ?>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td></td>      
                        <td colspan="2" class="evaluator-comment" 
                            data-type="wysihtml5" data-pk="<?= $comment->id ?>" 
                            data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluator-comment',  'prefix' => $prefix, $comment->id, '_ext' => 'json']); ?>" 
                            data-name="review"
                            data-title="Enter evaluator's comment">
                            <p>
                            <?php //echo (empty($application->evaluation_header->study_design)) ? $application->design_controlled : $application->evaluation_header->study_design ?>
                            <?=  ($comment->review) ? $comment->review : 'Evaluator\'s comment' ?>
                            </p>                    
                        </td>
                      </tr>
                    <?php 
                      }}
                      endforeach; ?>

                    <tr>
                      <td colspan="3">
                        <?php
                         /* $regs = array_filter(array_unique(Hash::extract($comments, '{n}[submitted=2].user_id')));
                          foreach ($regs as $file => $dir) {
                              echo $this->cell('Signature::evaluator', [$dir]);
                              echo $this->cell('Signature::manager', [$dir]);
                          }*/
                        ?>
                      </td>
                    </tr>
                  </tbody>
              </table>
          </div>
      </div>
    <?php
      }
    ?>
  </div>
</div>

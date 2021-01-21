<?php 

    use Cake\Utility\Hash;

  // echo "Sande sana"; 
  $v = array_unique(Hash::extract($comments, '{n}.model_id'));
  rsort($v);
  // print_r($v);
?>

<div class="row">
  <div class="col-xs-12">   
    <?php
      foreach ($v as $cn) {
    ?>
      <div class="thumbnail amend-form">
            <a class="btn btn-<?php
                if(count(Hash::extract($comments, "{n}[submitted=1]")) > 0) {
                    echo 'info';
                } 
                elseif(count(Hash::extract($comments, "{n}[submitted=2]")) > 0 && count(Hash::extract($comments, "{n}[submitted=2]")) == count(Hash::extract($comments, "{n}[approver>0]"))) {
                      echo 'success';
                } else {
                    echo 'default';
                }
                
            ?>" role="button" data-toggle="collapse" href="#<?= $cn ?>" aria-expanded="false" aria-controls="<?= $cn ?>">
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
                        foreach ($comments as $comment): 
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
                          <?php
                            if($this->request->params['_ext'] != 'pdf' and ($comment->user_id == $this->request->session()->read('Auth.User.id'))
                                and $comment->submitted != '2'
                               ) {
                              echo $this->Form->postLink(
                                  '<span class="label label-info">Edit</span>',
                                  ['action' => 'view', $application->id, '?' => ['cf_id' => $comment->id]],
                                  ['data' => ['cf_id' => $comment->id], 'escape' => false, 'confirm' => __('Are you sure you want to edit feedback {0}?', $comment->id)]
                              );
                              echo "&nbsp;";
                              if($prefix == 'evaluator') echo $this->Form->postLink(
                                  '<span class="label label-success">Submit <small>(for manager review)</small></span>',
                                  ['controller' => 'Comments', 'action' => 'submit', $comment->id, '?' => ['cf_sm' => $comment->id]],
                                  ['data' => ['cf_sm' => $comment->id, 'submitted' => 2], 'escape' => false, 'confirm' => __('Are you sure you want to submit feedback {0} for review?', $comment->id)]
                              );
                          }                          
                            echo "&nbsp;";
                            if($prefix == 'manager' and empty($comment->approver)) {
                              echo $this->Form->postLink(
                                '<span class="label label-success">Approve </span>',
                                ['controller' => 'Comments', 'action' => 'submit', $comment->id, '?' => ['cf_ma' => $comment->id]],
                                ['data' => ['cf_ma' => $comment->id, 'approver' => $this->request->session()->read('Auth.User.id')], 'escape' => false, 'confirm' => __('Are you sure you want to approve feedback {0}?', $comment->id)]
                            );          
                            echo "&nbsp;";
                          ?>
                            <!-- Button trigger modal -->
                            <a href="#">
                              <span class="label label-warning" data-toggle="modal" data-target="#revertModal"> Revert </span>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="revertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Manager feedback</h4>
                                  </div>
                                  <?php                                  
                                    echo $this->Form->create($comment, ['type' => 'file','url' => ['controller' => 'Comments', 'action' => 'submit', $comment->id, 'prefix' => $prefix,
                                      '?' => ['cf_rv' => $comment->id]
                                  ]]);
                                  ?>
                                  <div class="modal-body">
                                    <?php  
                                      echo $this->Form->control('manager_feedback', ['label' => false, 'type' => 'textarea', 'templates' => [
                                            'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                                            'textarea' => '<div class="col-sm-10"><textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);  
                                      
                                    ?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                  <?php echo $this->Form->end(); ?>
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                          <br>
                          <?php
                            if(!empty($comment->manager_feedback) && $prefix != 'applicant') {
                              echo "<h6><b>Internal feedback</b></h6>";
                              echo $comment->manager_feedback;
                            }
                          ?>

                        </td>
                        <td>
                          <?php foreach($comment->responses as $response): ?> 
                            <label class="control-label"><?=  $response->subject ?></label><br>
                            <p><?= $response->content ?></p>    
                            <div>
                            <p style="text-decoration: underline;">File(s)</p>
                            <?php foreach ($response->attachments as $attachment) { ?>                  
                                <p class="form-control-static text-info text-left"><?php
                                     echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                                ?></p>
                                <p><?= $attachment['description'] ?></p>
                                <?php } ?>    
                            </div> 
                            <hr>
                          <?php endforeach; ?>
                        </td>
                      </tr>
                      <tr>
                        <td></td>      
                        <td colspan="2" class="evaluation-comments" 
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
                          $regs = array_filter(array_unique(Hash::extract($comments, '{n}[submitted=2].user_id')));
                          foreach ($regs as $file => $dir) {
                              echo $this->cell('Signature::evaluator', [$dir]);
                              echo $this->cell('Signature::manager', [$dir]);
                          }
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

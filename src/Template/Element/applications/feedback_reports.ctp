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
        $recommandation = null;
    ?>
      <div class="thumbnail amend-form">
            <a class="btn btn-<?php
                $ao = count(Hash::extract(Hash::extract($comments, "{n}[submitted=1]"), "{n}[model_id=$cn]"));
                $bo = count(Hash::extract(Hash::extract($comments, "{n}[submitted=2]"), "{n}[model_id=$cn]"));
                $co = count(Hash::extract(Hash::extract($comments, "{n}[approver>0]"), "{n}[model_id=$cn]"));
                $do = count(Hash::extract(Hash::extract($comments, "{n}[manager_feedback=/[\s\S]/]"), "{n}[model_id=$cn]"));
                if($bo > 0 && $bo == $co) {
                      echo $luku = 'success';
                }
                elseif($co > 0) {
                      echo $luku = 'primary';
                }
                elseif($bo > 0) {
                      echo $luku = 'info';
                }
                elseif($ao > 0) {
                    echo $luku = 'default';
                } 
                elseif($do > 0) {
                    echo $luku = 'warning';
                } 
                else {
                    echo $luku = 'default';
                }
                
            ?>" role="button" data-toggle="collapse" href="#<?= $cn ?>" aria-expanded="false" aria-controls="<?= $cn ?>">
               PVCT Committee Meeting Number: <?= $cn ?>
            </a> 

            &nbsp;
            <?php 
              $xf = (Hash::extract(Hash::extract($comments, "{n}[submitted=2]"), "{n}[model_id=$cn]"))[0] ?? ['assigned_to' => ''];
              // debug($xf[]);
              echo (!empty($xf) and isset($feedback_evaluators->toArray()[$xf['assigned_to']])) ? 
                '<span class="label label-success">'.$feedback_evaluators->toArray()[$xf->assigned_to].'</span>' : '<span class="label label-default"><small><i>not assigned</i></small></span>';
            ?>  
            <?php
              if($prefix == 'manager') {
            ?>
              <a href="#">
                <span class="label label-info" data-toggle="modal" data-target="#evalAssignModal<?= $cn ?>"> Assign Evalator </span>
              </a>

              <!-- Modal -->
              <div class="modal fade" id="evalAssignModal<?= $cn ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $cn ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Assign Evaluator</h4>
                    </div>
                    <?php
                      
                      echo $this->Form->create(['schema' => ['assigned_to'], 'defaults' => ['assigned_to' => $xf['assigned_to']]], ['type' => 'file','url' => ['controller' => 'Comments', 'action' => 'submitAll', $cn, 'prefix' => $prefix,
                        '?' => ['cf_ae' => $cn]
                    ]]);
                    ?>
                    <div class="modal-body">
                      <?php
                        $fb = Hash::extract(Hash::extract($comments, "{n}[submitted=2]"), "{n}[model_id=$cn].id");
                        foreach ($fb as $n => $v) {
                          echo $this->Form->control('feedbacks.'.$n, ['type' => 'hidden', 'value' => $v]); 
                        }                                   
                        echo $this->Form->control('model_id', ['type' => 'hidden', 'value' => $cn]); 
                        echo $this->Form->control('foreign_key', ['type' => 'hidden', 'value' => $application->id]); 

                        echo $this->Form->control('assigned_to', ['type' => 'select', 'options' => $feedback_evaluators, 'empty' => true, 'escape' => false, 'templates' => 'app_form']);            
                        echo $this->Form->control('assign_message', ['label' => 'Message', 'type' => 'textarea', 'templates' => [
                              'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                              'label' => '<div class="col-sm-4 control-label"><label {{attrs}}>{{text}}</label></div>',
                              'textarea' => '<div class="col-sm-6"><textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);                                        
                      ?>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success btn-sm" name="assign" value="2">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Assign All</button>
                    </div>
                    <?php echo $this->Form->end(); ?>
                  </div>
                </div>
              </div>
            <?php 
              }
            ?>

            <?php
              //Can only submit my queries for manager review
              $user_id = $this->request->session()->read('Auth.User.id');
              $myq = Hash::extract(Hash::extract(Hash::extract($comments, "{n}[submitted=1]"), "{n}[model_id=$cn]"), "{n}[user_id=$user_id]");
              if($prefix == 'evaluator' and count($myq) > 0) {
                // debug(Hash::extract(Hash::extract($comments, "{n}[submitted=1]"), "{n}[model_id=$cn].id"));
                echo "&nbsp;"; echo "&nbsp;";
                echo $this->Form->postLink(
                  'Submit Queries',
                      ['controller' => 'Comments', 'action' => 'submitAll', $cn, '?' => ['cf_sa' => $cn]],
                      ['data' => ['id' => $cn, 'feedbacks' => Hash::extract($myq, "{n}.id"), 'submitted' => 2, 'foreign_key' => $application->id], 
                      'escape' => false, 'confirm' => __('Are you sure you want to submit all committee number {0} queries for manager review?', $cn), 'class' => 'label label-success']
                );
              }

              //Submit review comments for approval. Can only submit my unsubmitted review comments              
              $user_id = $this->request->session()->read('Auth.User.id');
              $myrc = Hash::extract(Hash::extract(Hash::extract($comments, "{n}[ef_submitted=1]"), "{n}[model_id=$cn]"), "{n}[assigned_to=$user_id]");
              if($prefix == 'evaluator' and count($myrc) > 0) {
                echo "&nbsp;"; echo "&nbsp;";
                echo $this->Form->postLink(
                  'Submit Review Comments',
                      ['controller' => 'Comments', 'action' => 'submitAll', $cn, '?' => ['cf_rc' => $cn]],
                      ['data' => ['model_id' => $cn, 'feedbacks' => Hash::extract($myrc, "{n}.id"), 'ef_submitted' => 2, 'foreign_key' => $application->id], 
                      'escape' => false, 'confirm' => __('Are you sure you want to submit all committee number {0} review comments for manager review?', $cn), 'class' => 'label label-success']
                );
              }

              echo "&nbsp;";
              if($prefix == 'manager' and $bo > 0 and $bo != $co) {
                  echo $this->Form->postLink(
                    'Approve All Queries',
                    ['controller' => 'Comments', 'action' => 'submitAll', $cn, '?' => ['cf_ma' => $cn]],
                    ['data' => ['id' => $cn, 'feedbacks' => Hash::extract(Hash::extract($comments, "{n}[submitted=2]"), "{n}[model_id=$cn].id"), 'submitted' => 2, 'foreign_key' => $application->id,
                                'approver' => $this->request->session()->read('Auth.User.id')], 
                      'escape' => false, 'confirm' => __('Are you sure you want to approve all committee number {0} queries?', $cn), 'class' => 'btn btn-success']
                );
              }

              echo "&nbsp;";
              $maef = Hash::extract(Hash::extract($comments, "{n}[ef_submitted=2]"), "{n}[model_id=$cn]");
              if($prefix == 'manager' and count($maef) > 0) {
                  echo $this->Form->postLink(
                    '<span class="label label-primary">Approve Feedback <span class="badge">'.count($maef).'</span></span>',
                    ['controller' => 'Comments', 'action' => 'submitAll', $cn, '?' => ['ef_ma' => $cn]],
                    ['data' => ['model_id' => $cn, 'ef_submitted' => '3', 'approver' => $this->request->session()->read('Auth.User.id'), 'feedbacks' => Hash::extract($maef, "{n}.id"), 'foreign_key' => $application->id], 
                    'escape' => false, 'confirm' => __('Are you sure you want to approve all evaluator feedback {0}?', $cn)]
                  );      
              }

              if($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee-feedback', '_ext' => 'pdf', $application->id, $cn], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
            ?>
            <div class="<?= ($this->request->params['_ext'] == 'pdf' || !empty($this->request->query('cf_id'))) ? '' : 'collapse'; ?>" id="<?= $cn ?>">
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
                          if($comment->model_id == $cn and $comment->subject != 'recommandation finale') {
                            $disp = false;
                            if($prefix == 'evaluator' and $comment->user_id == $this->request->session()->read('Auth.User.id')) $disp = true;
                            if($prefix == 'evaluator' and $comment->user_id != $this->request->session()->read('Auth.User.id') and $comment->submitted == '2') $disp = true;
                            if($prefix == 'manager' and $comment->submitted >= '2') $disp = true;
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
                        <td rowspan="3"><b><?= $i ?></b></td>
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
                              // echo "&nbsp;";
                              // if($prefix == 'evaluator') echo $this->Form->postLink(
                              //     '<span class="label label-success">Submit <small>(for manager review)</small></span>',
                              //     ['controller' => 'Comments', 'action' => 'add-from-committee', $comment->id, '?' => ['cf_sm' => $comment->id]],
                              //     ['data' => ['id' => $comment->id, 'foreign_key' => $comment->foreign_key, 'submitted' => 2], 
                              //     'escape' => false, 'confirm' => __('Are you sure you want to submit feedback {0} for review?', $comment->id)]
                              // );
                              echo "&nbsp;";
                              echo $this->Form->postLink(
                                  '<span class="label label-danger">Delete</span>',
                                  ['controller' => 'Comments', 'action' => 'delete', $comment->id],
                                  ['data' => ['id' => $comment->id, 'submitted' => 2], 'escape' => false, 'confirm' => __('Are you sure you want to delete feedback {0}?', $comment->id)]
                              );
                          }                          
                            echo "&nbsp;";
                            if($prefix == 'manager' and empty($comment->approver)) {
                              // echo $this->Form->postLink(
                              //   '<span class="label label-success">Approve </span>',
                              //   ['controller' => 'Comments', 'action' => 'submit', $comment->id, '?' => ['cf_ma' => $comment->id]],
                              //   ['data' => ['cf_ma' => $comment->id, 'approver' => $this->request->session()->read('Auth.User.id')], 'escape' => false, 'confirm' => __('Are you sure you want to approve feedback {0}?', $comment->id)]
                              // );  
                            echo "&nbsp;";
                              echo $this->Form->postLink(
                                  '<span class="label label-danger">Delete</span>',
                                  ['controller' => 'Comments', 'action' => 'delete', $comment->id, '?' => ['cf_md' => $application->id]],
                                  ['data' => ['id' => $comment->id, 'submitted' => 2], 'escape' => false, 'confirm' => __('Are you sure you want to delete feedback {0}?', $comment->id)]
                              );
                          ?>
                            <!-- Button trigger modal -->
                            <a href="#">
                              <span class="label label-warning" data-toggle="modal" data-target="#revertModal<?= $comment->id ?>"> Revert </span>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="revertModal<?= $comment->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $comment->id ?>">
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
                                      echo $this->Form->control('submitted', ['type' => 'hidden', 'value' => 3, 'templates' => 'comment_form']);
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
                            if(!empty($comment->manager_feedback) && $prefix != 'applicant' && $this->request->params['_ext'] != 'pdf') {
                              echo "<h6><b>Internal feedback</b></h6>";
                              echo $comment->manager_feedback;
                            }
                          ?>

                        </td>
                        <td>
                          <?php foreach($comment->responses as $response): 
                              if($response->submitted == '2') { ?> 
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
                          <?php }
                        endforeach; ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                            <b>Evaluator's Comments</b>                           
                                             
                            
                        </td>
                      </tr>
                      <tr class="<?php
                         echo ($comment->ef_submitted >= '2') ? 'success' : 'info'; ?>">
                        <!-- <td></td>       -->
                        <td colspan="2" class="evaluation-commentsa" 
                            data-type="wysihtml5" data-pk="<?= $comment->id ?>" 
                            data-url="<?= $this->Url->build(['controller' => 'Comments', 'action' => 'submit', $comment->id,  'prefix' => $prefix]); ?>" 
                            data-name="review"
                            data-title="Enter evaluator's comment">
                            <?php                               
                              $odipo = $bodipo = false;
                              
                              //if manager approves response, then visible to everyone
                              if($comment->ef_submitted == '3') $odipo = true;

                              //if manager assigns me response, then visible to me
                              if($comment->assigned_to == $this->request->session()->read('Auth.User.id')) $odipo = true;

                              //if submitted but not approved, then visible to manager and submitting evaluator only. Furthermore, only visible when not pdf
                              if($prefix == 'evaluator' and $comment->user_id == $this->request->session()->read('Auth.User.id') and $this->request->params['_ext'] != 'pdf') {
                                   $odipo = $bodipo = true;
                              }
                              if ($prefix == 'manager' and $comment->ef_submitted == '2' and $this->request->params['_ext'] != 'pdf') {
                                   $odipo = $bodipo = true;
                              }

                              //If the comment has not been assigned to the evaluator
                              if($prefix == 'evaluator' and $comment->assigned_to != $this->request->session()->read('Auth.User.id')) $odipo = false;

                              if($odipo) {
                                echo ($comment->review) ? $comment->review : '';
                              } 

                             ?>
                             <br>
                              <!-- Button trigger modal -->
                              <?php if($comment->assigned_to == $this->request->session()->read('Auth.User.id')) { ?>
                              <!-- <a href="#"> -->
                                <button class="btn btn-warning btn-xs"  id="#evalfeedModal<?= $comment->id ?>" onclick='$("#evalfeedModal<?= $comment->id ?>").toggle()' > Evaluator's feedback </button>
                              <!-- </a> -->
                              <?php } ?>

                              <!-- Modal -->
                              <div  id="evalfeedModal<?= $comment->id ?>"  aria-labelledby="myModalLabel<?= $comment->id ?>" style="display: none;" >
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                      <h4 class="modal-title">Evaluator's feedback</h4>
                                    </div>
                                    <?php                                  
                                      echo $this->Form->create($comment, ['type' => 'file','url' => ['controller' => 'Comments', 'action' => 'submit', $comment->id, 'prefix' => $prefix,
                                        '?' => ['cf_ef' => $comment->id]
                                    ]]);
                                    ?>
                                    <div class="modal-body">
                                      <?php                                        
                                      echo $this->Form->control('review', ['label' => false, 'type' => 'textarea', 'templates' => [
                                              'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                                              'textarea' => '<div class="col-sm-12"><textarea class="form-control rtecontrol" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);  
                                        
                                      ?>
                                    </div>
                                    <div class="modal-footer">
                                      <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                      <button type="submit" class="btn btn-primary btn-sm" name="ef_submitted" value="<?= ($comment->ef_submitted == 1 or empty($comment->ef_submitted)) ? 1 : $comment->ef_submitted ?>"><i class="fa fa-save" aria-hidden="true"></i> Save changes</button>
                                      <!-- <button type="submit" class="btn btn-success btn-sm" name="ef_submitted" value="2" onclick="return confirm('Are you sure you wish to submit for manager review?');">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit <small>(for manager review)</small> </button> -->
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                  </div>
                                </div>
                              </div>
                            <?php 

                              if($prefix == 'manager' and $comment->ef_submitted == '2') {
                               /* echo $this->Form->postLink(
                                  '<span class="label label-success">Approve </span>',
                                  ['controller' => 'Comments', 'action' => 'submit', $comment->id, '?' => ['ef_ma' => $comment->id]],
                                  ['data' => ['ef_ma' => $comment->id, 'ef_submitted' => '3'], 'escape' => false, 'confirm' => __('Are you sure you want to approve feedback {0}?', $comment->id)]
                                );   */       
                              echo "&nbsp;";
                            ?>
                              <!-- Button trigger modal -->
                              <a href="#">
                                <span class="label label-warning" data-toggle="modal" data-target="#revertefModal<?= $comment->id ?>"> Revert </span>
                              </a>

                              <!-- Modal -->
                              <div class="modal fade" id="revertefModal<?= $comment->id ?>" tabindex="-1" role="dialog" aria-labelledby="revertefModalLabel<?= $comment->id ?>">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Manager feedback</h4>
                                    </div>
                                    <?php                                  
                                      echo $this->Form->create($comment, ['type' => 'file','url' => ['controller' => 'Comments', 'action' => 'submit', $comment->id, 'prefix' => $prefix,
                                        '?' => ['ef_rv' => $comment->id]
                                    ]]);
                                    ?>
                                    <div class="modal-body">
                                      <?php  
                                        echo $this->Form->control('manager_feedback', ['label' => false, 'type' => 'textarea', 'templates' => [
                                              'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                                              'textarea' => '<div class="col-sm-10"><textarea class="form-control rtecontrol" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);  
                                        
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
                        </td>
                      </tr>
                    <?php 
                      }}
                      elseif($comment->model_id == $cn and $comment->subject == 'recommandation finale') {
                         $recommandation = $comment;
                      }
                      endforeach; ?>

                      <!-- Another row for recommendation or form if at least we have some queries -->
                      <tr class="<?= $luku ?>">
                        <td colspan="3">
                          <h3>Final Recommendation</h3>
                          <?php
                            if ($co > 0 and $prefix == 'evaluator' and $this->request->params['_ext'] != 'pdf') {
                              if (!empty($recommandation) and $recommandation->ef_submitted == 3) {
                                echo $recommandation->content.'<br>';
                              } else {
                                  echo $this->Form->create($recommandation, ['type' => 'file','url' => ['controller' => 'Comments', 'action' => 'add-from-committee', 'prefix' => $prefix]]);
                                  
                                  echo $this->Form->control('id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                                  echo $this->Form->control('foreign_key', ['type' => 'hidden', 'value' => $application->id, 'templates' => 'comment_form']);
                                  echo $this->Form->control('model_id', ['type' => 'hidden', 'value' => $cn, 'templates' => 'comment_form']);
                                  echo $this->Form->control('ef_submitted', ['type' => 'hidden', 'value' => 2, 'templates' => 'comment_form']);
                                  echo $this->Form->control('model', ['type' => 'hidden', 'value' => 'Applications', 'templates' => 'table_form']);
                                  echo $this->Form->control('category', ['type' => 'hidden', 'value' => 'committee', 'templates' => 'table_form']);
                                  echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);                
                                  echo $this->Form->control('sender', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.name'), 'templates' => 'comment_form']);
                                  echo $this->Form->control('subject', ['type' => 'hidden', 'value' => 'recommandation finale', 'templates' => 'comment_form']);
                                  echo $this->Form->control('content', ['label' => false, 'type' => 'textarea', 'templates' => 
                                        [
                                        'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                                        'textarea' => '<div class="col-sm-12"><textarea class="form-control rtecontrol" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]); 
                          ?>
                                <button type="submit" class="btn btn-success btn-sm" name="submitted" value="2" onclick="return confirm('Are you sure you wish to submit the final recommendation?');"> <i   class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                          <?php 
                                  echo $this->Form->end();
                                  if(!empty($recommandation) and $this->request->params['_ext'] != 'pdf') {
                                    echo "<hr><h4>Manager feedback</h4>";
                                    echo $recommandation->manager_feedback;
                                  }
                              }
                            }
                            elseif ($prefix == 'manager' and !empty($recommandation)) {
                                echo $recommandation->content.'<br>';
                                if($recommandation->ef_submitted != 3) {
                                    echo $this->Form->postLink(
                                      '<span class="label label-success">Approve </span>',
                                      ['controller' => 'Comments', 'action' => 'submit', $recommandation->id, '?' => ['ef_ma' => $recommandation->id]],
                                      ['data' => ['ef_ma' => $recommandation->id, 'ef_submitted' => '3', 'approver' => $this->request->session()->read('Auth.User.id')], 
                                      'escape' => false, 'confirm' => __('Are you sure you want to approve feedback {0}?', $recommandation->id)]
                                    ); 
                                } 

                                    // echo $this->Form->postLink(
                                    //   '<span class="label label-warning">Request changes </span>',
                                    //   ['controller' => 'Comments', 'action' => 'submit', $recommandation->id, '?' => ['ef_ma' => $recommandation->id]],
                                    //   ['data' => ['ef_ma' => $recommandation->id, 'ef_submitted' => '2', 'approver' => $this->request->session()->read('Auth.User.id')], 
                                    //   'escape' => false, 'confirm' => __('Are you sure you want to request changes to feedback {0}?', $recommandation->id)]
                                    // ); 
                              ?>
                                <!-- Button trigger modal -->
                                &nbsp;
                                <a href="#">
                                  <span class="label label-warning" data-toggle="modal" data-target="#requestModal<?= $recommandation->id ?>"> Request changes </span>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="requestModal<?= $recommandation->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $recommandation->id ?>">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Manager feedback</h4>
                                      </div>
                                      <?php                                  
                                        echo $this->Form->create($recommandation, ['type' => 'file','url' => ['controller' => 'Comments', 'action' => 'submit', $recommandation->id, 'prefix' => $prefix,
                                          '?' => ['ef_ma' => $recommandation->id]
                                      ]]);
                                      ?>
                                      <div class="modal-body">
                                        <?php  
                                          echo $this->Form->control('submitted', ['type' => 'hidden', 'value' => 0, 'templates' => 'comment_form']);
                                          echo $this->Form->control('ef_submitted', ['type' => 'hidden', 'value' => 2, 'templates' => 'comment_form']);
                                          echo $this->Form->control('ef_ma', ['type' => 'hidden', 'value' => $recommandation->id, 'templates' => 'comment_form']);
                                          echo $this->Form->control('manager_feedback', ['label' => false, 'type' => 'textarea', 'templates' => [
                                                'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                                                'textarea' => '<div class="col-sm-10"><textarea class="form-control rtecontrol" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);  
                                          
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
                              <?php
                              
                              if(!empty($recommandation) and $this->request->params['_ext'] != 'pdf') {
                                    echo "<hr><h4>Manager feedback</h4>";
                                    echo $recommandation->manager_feedback;
                              }

                            } elseif(!empty($recommandation) and $recommandation->ef_submitted == 3) {
                                //only approved recommendations appear
                                echo $recommandation->content.'<br>';
                            }
                          ?>
                        </td>
                      </tr>
                    <tr>
                      <td colspan="3">
                        <?php
                          // Hash::extract(Hash::extract($comments, "{n}[approver>0]"), "{n}[model_id=$cn]")
                          // $regs = array_filter(array_unique(Hash::extract($comments, '{n}[submitted=2].user_id')));
                          $regs = array_filter(array_unique(Hash::extract(Hash::extract($comments, "{n}[submitted=2]"), "{n}[model_id=$cn].user_id")));
                          foreach ($regs as $file => $dir) {
                              echo $this->cell('Signature::evaluator', [$dir]);
                              // echo $this->cell('Signature::manager', [$dir]);
                          }
                          $mans = array_filter(array_unique(Hash::extract(Hash::extract($comments, "{n}[approver>0]"), "{n}[model_id=$cn].approver")));
                          foreach ($mans as $file => $dir) {
                              // echo $this->cell('Signature::evaluator', [$dir]);
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

<?php
  use Cake\Utility\Hash;
  $numb = 1;
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';

  if($prefix === 'manager') {
    $this->Html->css('bootstrap-editable', ['block' => true]);
    $this->Html->css('bootstrap/common_header', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
    $this->Html->script('bootstrap/evaluation_report', ['block' => true]);
    //--wysiwyg editor    
    $this->Html->css('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5-0.3.0', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5', ['block' => true]);
  }
?>

      <div class="row">
        <div class="col-xs-12">          
        <?php 
          foreach ($evaluations as $evaluation) {  
            //manipulate edits to one-dimensional array
            $evaluation_edit = []; $resa = []; $res = [];
            foreach ($evaluation->evaluation_edits as $key => $value) {
              $res[$key] = $value->toArray();
            }
            $resa = Hash::flatten($res);
            foreach ($resa as $key => $value) {
              if (!isset($evaluation_edit[substr($key, strrpos($key, '.')+1)])) {
                $evaluation_edit[substr($key, strrpos($key, '.')+1)][] = 
                    ($evaluation[substr($key, strrpos($key, '.')+1)] != $value) ? $value : null;
              } else {                
                $evaluation_edit[substr($key, strrpos($key, '.')+1)][] = 
                    (end($evaluation_edit[substr($key, strrpos($key, '.')+1)]) != $value) ? $value : null;
              }
            }
            $evaluation_edit = Hash::filter($evaluation_edit);
            // print_r($resa);
        ?>
          <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#<?= $evaluation->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false" aria-controls="<?= $evaluation->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
               Evaluated on: <?= $evaluation['created'] ?> by <?= $evaluation->user->name ?>
            </a>
            <p class="topper"><small><em class="text-success">evaluate on: <?= $evaluation['created'] ?> by <?= $evaluation->user->name ?></em></small></p>
        <?php
          if($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Amendments', 'action' => 'review', '_ext' => 'pdf', $evaluation->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
          // print_r(Hash::extract($evaluations, '{n}.chosen'));
          // echo count(array_filter(Hash::extract($evaluations, '{n}.chosen'), 'is_numeric' ));
          if($this->request->params['_ext'] != 'pdf' and ($evaluation->user_id == $this->request->session()->read('Auth.User.id')
                                                          or $this->request->session()->read('Auth.User.group_id') == 2)
              // and  empty(Hash::extract($evaluations, '{n}.chosen')) 
                 and count(array_filter(Hash::extract($evaluations, '{n}.chosen'), 'is_numeric' )) < 1
               ) {
            echo $this->Form->postLink(
                '<span class="label label-info">Edit</span>',
                [],
                ['data' => ['evaluation_id' => $evaluation->id], 'escape' => false, 'confirm' => __('Are you sure you want to edit evaluation {0}?', $evaluation->id)]
            );
          }
          echo '&nbsp;'; //print_r(Hash::extract($evaluations, '{n}.chosen'));
          if($this->request->params['_ext'] != 'pdf' and ($evaluation->user_id != $this->request->session()->read('Auth.User.id')) 
               and $this->request->session()->read('Auth.User.group_id') == 2 //available to managers only
               //and count(array_filter(Hash::extract($evaluations, '{n}.chosen'), 'is_numeric' )) < 1
               and is_null($evaluation->chosen)
             ) {            
            echo $this->Form->postLink('<span class="label label-success active">Approve the evaluation?</span>', 
                ['action' => 'attachSignature', $evaluation->id, 'prefix' => $prefix], 
                ['escape' => false, 'confirm' => 'Are you sure you want to attach your signature to evaluation?', 'class' => 'label-link']);
          } 
          if ($this->request->params['_ext'] != 'pdf' and !empty($evaluation->chosen)
                   and in_array($evaluation->chosen, Hash::extract($evaluations, '{n}.chosen'))) {
            echo '&nbsp;<span class="label label-success">Approved</span>';
          }       
        ?>
              <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>" id="<?= $evaluation->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
                <table class="table table-bordered table-condensed">
                  <thead>
                    <tr class="active">
                      <th colspan="3">PREAMBLE </th>
                    </tr>
                  </thead>
                  <tbody>                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                        <span class="<?= (isset($evaluation_edit['vulnerable_population_comments'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->vulnerable_population_comments ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['vulnerable_population_comments'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['vulnerable_population_comments'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['vulnerable_population_comments'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['vulnerable_population_comments'][$i].'</span>';
                            }
                          }
                        ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- comments -->                    
                    <tr class="info">
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
           <div class="evaluation-comments"
                  data-type="wysihtml5" data-pk="<?= $evaluation->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluationComment',  'prefix' => 'manager', $evaluation->id, '_ext' => 'json']); ?>" 
                  data-name="comment_vulnerable_population"
                  data-title="Comments">
                  <p>
                  <?php echo (empty($evaluation->comment_vulnerable_population)) ? '<i>manager comments</i>' : $evaluation->comment_vulnerable_population ?></p>                    
              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- end comment -->

                    
                    <tr class="active">
                      <td colspan="3"><strong>Introduction </strong></td>
                    </tr> 
                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                        <span class="<?= (isset($evaluation_edit['scientific_issues_comments'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->scientific_issues_comments ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['scientific_issues_comments'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['scientific_issues_comments'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['scientific_issues_comments'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['scientific_issues_comments'][$i].'</span>';
                            }
                          }
                        ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- comments -->
                    <tr class="info">
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
           <div class="evaluation-comments"
                  data-type="wysihtml5" data-pk="<?= $evaluation->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluationComment',  'prefix' => 'manager', $evaluation->id, '_ext' => 'json']); ?>" 
                  data-name="comment_scientific_issues"
                  data-title="Comments">
                  <p>
                  <?php echo (empty($evaluation->comment_scientific_issues)) ? '<i>manager comments</i>' : $evaluation->comment_scientific_issues ?></p>                    
              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- end comment -->

                    <tr class="active">
                      <td colspan="3"><strong>Proposed Amendments </strong></td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                        <span class="<?= (isset($evaluation_edit['informed_consent_text'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->informed_consent_text ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['informed_consent_text'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['informed_consent_text'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['informed_consent_text'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['informed_consent_text'][$i].'</span>';
                            }
                          }
                        ?>
                          </div>
                        </div>
                      </td>
                    </tr>


                    <!-- comments -->
                    <tr class="info">
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
           <div class="evaluation-comments"
                  data-type="wysihtml5" data-pk="<?= $evaluation->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluationComment',  'prefix' => 'manager', $evaluation->id, '_ext' => 'json']); ?>" 
                  data-name="comment_informed_consent"
                  data-title="Comments">
                  <p>
                  <?php echo (empty($evaluation->comment_informed_consent)) ? '<i>manager comments</i>' : $evaluation->comment_informed_consent ?></p>                    
              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- end comment -->

                    <tr class="active">
                      <td colspan="3"><strong>Evaluator’s Comments </strong></td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                            <span class="<?= (isset($evaluation_edit['other_materials_comments'])) ? 'editer' : 'retide'; ?>">
                              <?= $evaluation->other_materials_comments ?>
                            </span>
                            <?php
                              for ($i=0; $i < count(($evaluation_edit['other_materials_comments'] ?? null)); $i++) { 
                                if ($i == count($evaluation_edit['other_materials_comments'])-1) {
                                  echo '<span class="retide">'.$evaluation_edit['other_materials_comments'][$i].'</span>';
                                } else {
                                  echo '<span class="editer">'.$evaluation_edit['other_materials_comments'][$i].'</span>';
                                }
                              }
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- comments -->
                    <tr class="info">
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
           <div class="evaluation-comments"
                  data-type="wysihtml5" data-pk="<?= $evaluation->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluationComment',  'prefix' => 'manager', $evaluation->id, '_ext' => 'json']); ?>" 
                  data-name="comment_other_materials"
                  data-title="Comments">
                  <p>
                  <?php echo (empty($evaluation->comment_other_materials)) ? '<i>manager comments</i>' : $evaluation->comment_other_materials ?></p>                    
              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- end comment -->


                    <tr class="active">
                      <td colspan="3"><strong>INFORMATION TO BE COMMUNICATED TO APPLICANT  </strong></td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <span class="<?= (isset($evaluation_edit['clinical_trials_text'])) ? 'editer' : 'retide'; ?>">
                              <?= $evaluation->clinical_trials_text ?>
                            </span>
                            <?php
                              for ($i=0; $i < count(($evaluation_edit['clinical_trials_text'] ?? null)); $i++) { 
                                if ($i == count($evaluation_edit['clinical_trials_text'])-1) {
                                  echo '<span class="retide">'.$evaluation_edit['clinical_trials_text'][$i].'</span>';
                                } else {
                                  echo '<span class="editer">'.$evaluation_edit['clinical_trials_text'][$i].'</span>';
                                }
                              }
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- comments -->
                    <tr class="info">
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
           <div class="evaluation-comments"
                  data-type="wysihtml5" data-pk="<?= $evaluation->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluationComment',  'prefix' => 'manager', $evaluation->id, '_ext' => 'json']); ?>" 
                  data-name="comment_clinical_trials"
                  data-title="Comments">
                  <p>
                  <?php echo (empty($evaluation->comment_clinical_trials)) ? '<i>manager comments</i>' : $evaluation->comment_clinical_trials ?></p>                    
              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- end comment -->

                    

                    
                    <tr class="active">
                      <td colspan="3"><strong>RECOMMENDATION </strong></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                          <span class="<?= (isset($evaluation_edit['recommendations'])) ? 'editer' : 'retide'; ?>">
                            <?= $evaluation->recommendations ?>
                          </span>
                          <?php
                            for ($i=0; $i < count(($evaluation_edit['recommendations'] ?? null)); $i++) { 
                              if ($i == count($evaluation_edit['recommendations'])-1) {
                                echo '<span class="retide">'.$evaluation_edit['recommendations'][$i].'</span>';
                              } else {
                                echo '<span class="editer">'.$evaluation_edit['recommendations'][$i].'</span>';
                              }
                            }
                          ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>File Attachment</label>

                            <div class="form-group">
                              <label class="col-sm-3 control-label text-success">File</label>
                              <div class="col-sm-7">
                                <p class="form-control-static text-info text-left"><?php
                                     echo $this->Html->link($evaluation->file, substr($evaluation->dir, 8) . '/' . $evaluation->file, ['fullBase' => true]);
                                ?></p>
                              </div>
                            </div> 

                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- comments -->
                    <tr class="info">
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
           <div class="evaluation-comments"
                  data-type="wysihtml5" data-pk="<?= $evaluation->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluationComment',  'prefix' => 'manager', $evaluation->id, '_ext' => 'json']); ?>" 
                  data-name="comment_recommendations"
                  data-title="Comments">
                  <p>
                  <?php echo (empty($evaluation->comment_recommendations)) ? '<i>manager comments</i>' : $evaluation->comment_recommendations ?></p>                    
              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- end comment -->
                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4 class="text-center"> Signature(s)</h4>
                          </div>
                          <div class="col-xs-12">
                            <h4 class="text-center"><?php          
                              // echo ($evaluation->signature) ? "<img src='".$this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true)."' style='width: 30%;' alt=''>" : '';
                              echo ($evaluation->user->dir) ? "<span>".$evaluation->user->name.": </span><img src='".$this->Url->build(substr($evaluation->user->dir, 8) . '/' . $evaluation->user->file, true)."' style='width: 30%;' alt=''>" : '';
                            ?></h4>
                            <?= ($evaluation->chosen) ? $this->cell('Signature', [$evaluation->chosen]) : ''; ?>
                          </div>
                        </div>
                        <br>
                      </td>
                    </tr>

                  </tbody>
                </table>

              <?php
              if($this->request->params['_ext'] != 'pdf') {
              if($prefix == 'manager' or $evaluation->user_id == $this->request->session()->read('Auth.User.id')) {
                  echo    $this->Form->postLink(
                        '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                        ['action' => 'remove-review', $evaluation->id],
                        ['confirm' => 'Are you sure you want to delete this evaluation for '.$application->protocol_no.'?', 'escape' => false,
                          'class' => 'btn btn-warning btn-xs active']
                    );
              } }
              ?>
              </div>      
              <hr>
            
          </div>
          <?php } ?>
        </div>
      </div>



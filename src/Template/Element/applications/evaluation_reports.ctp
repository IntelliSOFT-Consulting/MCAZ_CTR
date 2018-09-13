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
          if($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'review', '_ext' => 'pdf', $evaluation->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
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
               and count(array_filter(Hash::extract($evaluations, '{n}.chosen'), 'is_numeric' )) < 1) {            
            echo $this->Form->postLink('<span class="label label-success active">Approve the evaluation?</span>', 
                ['action' => 'attachSignature', $evaluation->id, 'prefix' => $prefix], 
                ['escape' => false, 'confirm' => 'Are you sure you want to attach your signature to evaluation?', 'class' => 'label-link']);
          } elseif ($this->request->params['_ext'] != 'pdf' and !empty($evaluation->chosen)
                   and in_array($evaluation->chosen, Hash::extract($evaluations, '{n}.chosen'))) {
            echo '<span class="editer">Approved</span>';
          }       
        ?>
              <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>" id="<?= $evaluation->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
                <table class="table table-bordered table-condensed">
                  <thead>
                    <tr class="active">
                      <th></th>
                      <th>Vulnerable/High Risk Groups </th>
                      <th width="22.5%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td>Is a vulnerable population being studied:</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['vulnerable_population'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->vulnerable_population ?>
                        </span>
                          <?php
                            foreach (($evaluation_edit['vulnerable_population'] ?? []) as $key => $value) {
                              echo '<span class="editer">'.$value.'</span>';
                            }
                          ?>          
                     </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="2">
                        <div class="row">
                          <div class="col-xs-4">
                            <div class="entry">
                              <span class="editer">
                                <?= ($evaluation->vulnerable_pregnant) ? $checked : $nChecked; ?> Pregnant women <br> 
                              </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_pregnant']) ? $checked : $nChecked; $a.=' Pregnant women <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                            <div class="entry">
                              <span class="editer">
                                <?= ($evaluation->vulnerable_adolescent) ? $checked : $nChecked; ?> Adolescents <br> 
                              </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_adolescent']) ? $checked : $nChecked; $a.=' Adolescents <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                            <div class="entry">
                              <span class="editer">
                                <?= ($evaluation->vulnerable_children) ? $checked : $nChecked; ?> Children <br> 
                              </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_children']) ? $checked : $nChecked; $a.=' Children <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="entry">
                            <span class="editer">
                              <?= ($evaluation->vulnerable_elderly) ? $checked : $nChecked; ?> Elderly <br> 
                            </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_elderly']) ? $checked : $nChecked; $a.=' Elderly <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                            <div class="entry">
                            <span class="editer">
                              <?= ($evaluation->vulnerable_refugees) ? $checked : $nChecked; ?> Refugees <br> 
                            </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_refugees']) ? $checked : $nChecked; $a.=' Refugees <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                            <div class="entry">
                            <span class="editer">
                              <?= ($evaluation->vulnerable_unconscious) ? $checked : $nChecked; ?> Those who cannot give consent (unconscious) <br> 
                            </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_unconscious']) ? $checked : $nChecked; $a.=' Those who cannot give consent (unconscious) <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="entry">
                            <span class="editer">
                              <?= ($evaluation->vulnerable_prisoners) ? $checked : $nChecked; ?> Prisoners <br> 
                            </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_prisoners']) ? $checked : $nChecked; $a.=' Prisoners <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                            <div class="entry">
                            <span class="editer">
                              <?= ($evaluation->vulnerable_mental) ? $checked : $nChecked; ?> Persons with mental or Behavioural  Disorders <br> 
                            </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_mental']) ? $checked : $nChecked; $a.=' Persons with mental or Behavioural  Disorders <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                            <div class="entry">
                            <span class="editer">
                              <?= ($evaluation->vulnerable_others) ? $checked : $nChecked; ?> Others <br> 
                            </span>
                              <?php
                                foreach ($evaluation->evaluation_edits as $nvalue) {
                                  $a = ($nvalue['vulnerable_others']) ? $checked : $nChecked; $a.=' Others <br>';
                                  echo "<span class='editer'>$a</span>";
                                }
                              ?>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td>Is the justification for studying this vulnerable population adequate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['justification_adequate'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->justification_adequate ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['justification_adequate'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['justification_adequate'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['justification_adequate'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['justification_adequate'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Have adequate provisions been made to ensure the vulnerable population is not being exploited?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['adequate_provisions'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->adequate_provisions ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['adequate_provisions'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['adequate_provisions'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['adequate_provisions'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['adequate_provisions'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
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
                      <td><?php $numb = 1; ?> </td>
                      <td><strong>Scientific and Technical Issues </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the rationale for the study clearly stated in the context present knowledge?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['rationale_stated'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->rationale_stated ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['rationale_stated'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['rationale_stated'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['rationale_stated'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['rationale_stated'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the hypothesis to be tested fully explained?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['hypothesis_explained'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->hypothesis_explained ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['hypothesis_explained'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['hypothesis_explained'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['hypothesis_explained'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['hypothesis_explained'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the study design scientifically sound?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['design_sound'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->design_sound ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['design_sound'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['design_sound'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['design_sound'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['design_sound'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where present, is the control arm adequate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['control_arm'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->control_arm ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['control_arm'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['control_arm'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['control_arm'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['control_arm'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the inclusion and exclusion criteria complete and appropriate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['criteria_complete'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->criteria_complete ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['criteria_complete'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['criteria_complete'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['criteria_complete'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['criteria_complete'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the types and methods for subject allocation appropriate? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['subject_allocation'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->subject_allocation ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['subject_allocation'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['subject_allocation'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['subject_allocation'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['subject_allocation'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the procedures for participant recruitment, admission, follow up and completion appropriate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['procedures_appropriate'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->procedures_appropriate ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['procedures_appropriate'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['procedures_appropriate'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['procedures_appropriate'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['procedures_appropriate'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the drugs and/or devices to be used fully described?  List medicines/devices:</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['drugs_described'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->drugs_described ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['drugs_described'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['drugs_described'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['drugs_described'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['drugs_described'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the project design include appropriate criteria for stopping and discontinuing the research?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['drugs_described'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->drugs_described ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['drugs_described'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['drugs_described'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['drugs_described'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['drugs_described'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the clinical procedures to be carried out fully described and appropriate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['clinical_procedures'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->clinical_procedures ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['clinical_procedures'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['clinical_procedures'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['clinical_procedures'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['clinical_procedures'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the laboratory tests and other diagnostic procedures fully described and appropriate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['laboratory_tests'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->laboratory_tests ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['laboratory_tests'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['laboratory_tests'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['laboratory_tests'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['laboratory_tests'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the statistical basis for the study design appropriate and is the plan for analysis of the data appropriate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['statistical_basis'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->statistical_basis ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['statistical_basis'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['statistical_basis'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['statistical_basis'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['statistical_basis'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
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
                      <td> <?php $numb = 1; ?></td>
                      <td><strong>Informed Consent, Decision-making & Confidentiality   </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the information sheet free of technical terms, written in lay-persons’ language, easily understandable, complete and adequate? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['information_sheet'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->information_sheet ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['information_sheet'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['information_sheet'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['information_sheet'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['information_sheet'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it make clear that the proposed study is research?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['proposed_study'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->proposed_study ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['proposed_study'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['proposed_study'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['proposed_study'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['proposed_study'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it explain why the study is being done and why the subject is being asked to participate?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['explain_study'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->explain_study ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['explain_study'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['explain_study'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['explain_study'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['explain_study'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it clearly state the duration of the research?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['research_duration'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->research_duration ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['research_duration'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['research_duration'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['research_duration'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['research_duration'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide participants with a full description of the nature, sequence and frequency of the procedures to be carried out?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['full_description'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->full_description ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['full_description'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['full_description'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['full_description'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['full_description'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the nature and likelihood of anticipated discomfort or adverse effects, including psychological; and social risks, if any and what has been done to minimise these risks, and the action to be taken if they occur?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['nature_discomfort'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->nature_discomfort ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['nature_discomfort'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['nature_discomfort'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['nature_discomfort'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['nature_discomfort'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb ?>a.</td>
                      <td> Does it outline the possible benefits, if any, to the research participants?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['possible_benefits'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->possible_benefits ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['possible_benefits'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['possible_benefits'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['possible_benefits'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['possible_benefits'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>b.</td>
                      <td> Does it outline the possible benefits, if any to the community or to society?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['outline_community'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->outline_community ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['outline_community'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['outline_community'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['outline_community'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['outline_community'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to protect the confidentiality of participants’ data (either that provided by participants or that derived during and from the research itself?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['outline_procedure'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->outline_procedure ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['outline_procedure'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['outline_procedure'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['outline_procedure'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['outline_procedure'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If confidentiality is not possible due to the research design, has this been conveyed to all relevant persons?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['conveyed_persons'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->conveyed_persons ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['conveyed_persons'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['conveyed_persons'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['conveyed_persons'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['conveyed_persons'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it inform the research participants that their participation is voluntary and refusal to participate (or discontinue participation) will involve no penalty or loss of medical benefits to which the participant was otherwise entitled?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['participation_voluntary'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->participation_voluntary ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['participation_voluntary'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['participation_voluntary'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['participation_voluntary'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['participation_voluntary'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the nature of any compensation or reimbursement to be provided?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['compensation_provided'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->compensation_provided ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['compensation_provided'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['compensation_provided'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['compensation_provided'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['compensation_provided'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the alternatives to participation?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['alternatives_participation'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->alternatives_participation ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['alternatives_participation'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['alternatives_participation'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['alternatives_participation'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['alternatives_participation'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the name and contact information of a person who can provide more information about the research project at any time?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['contact_research'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->contact_research ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['contact_research'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['contact_research'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['contact_research'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['contact_research'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable or reading and signing the written consent form (e.g. illiterate patients)? (Please attach)</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['subjects_illiterate'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->subjects_illiterate ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['subjects_illiterate'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['subjects_illiterate'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['subjects_illiterate'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['subjects_illiterate'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it conclude with a statement such as “I have read the foregoing information, or it has been read to me? I have had the opportunity to ask questions about it and any questions I have asked have been answered to my satisfaction.  I consent voluntarily to participate as a subject in this study and understand that I have the right to withdraw from the study at any time without in any way it affecting my further medical care”? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['conclude_statement'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->conclude_statement ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['conclude_statement'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['conclude_statement'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['conclude_statement'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['conclude_statement'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide information to the research participants on the costs to the participants involved in terms of time, man-day lost from work, etc and reimbursement, if any? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['cost_participants'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->cost_participants ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['cost_participants'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['cost_participants'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['cost_participants'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['cost_participants'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable of giving personal consent (e.g. for cultural reasons, children or adolescents less than the legal age of consent in the country in which research is taking place, subjects with mental illness, etc)?  (Please attach)</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['incapable_consent'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->incapable_consent ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['incapable_consent'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['incapable_consent'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['incapable_consent'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['incapable_consent'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to keep participants informed of the progress and outcome of the research?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['research_outcome'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->research_outcome ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['research_outcome'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['research_outcome'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['research_outcome'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['research_outcome'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
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
                      <td> <?php $numb = 1; ?> </td>
                      <td><strong>Other materials, documents and study instruments (Patient recruitment materials, Questionnaires) </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Participant Recruitment Material (e.g. advertisement, notices, media articles, transcripts or radio messages) provided both in English and in the local language(s)?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['recruitment_material'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->recruitment_material ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['recruitment_material'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['recruitment_material'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['recruitment_material'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['recruitment_material'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does these materials make claims that may not be true?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['material_claims'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->material_claims ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['material_claims'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['material_claims'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['material_claims'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['material_claims'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do they make promises that may be inappropriate in the research setting (e.g. provide undue incentives or emphasise remuneration)?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['promises_inappropriate'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->promises_inappropriate ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['promises_inappropriate'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['promises_inappropriate'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['promises_inappropriate'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['promises_inappropriate'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the study involve questionnaires, diaries, study instruments, etc?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['study_questionnaires'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->study_questionnaires ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['study_questionnaires'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['study_questionnaires'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['study_questionnaires'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['study_questionnaires'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are these attached to the proposal? (In English and local language)</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['attached_proposal'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->attached_proposal ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['attached_proposal'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['attached_proposal'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['attached_proposal'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['attached_proposal'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires written in lay language and easily understood?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['lay_language'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->lay_language ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['lay_language'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['lay_language'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['lay_language'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['lay_language'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires relevant to answer the research questions?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['relevant_answer'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->relevant_answer ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['relevant_answer'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['relevant_answer'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['relevant_answer'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['relevant_answer'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires worded sensitively?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['worded_sensitively'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->worded_sensitively ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['worded_sensitively'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['worded_sensitively'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['worded_sensitively'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['worded_sensitively'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form describe the nature and purpose of the questions to be asked?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['consent_information'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->consent_information ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['consent_information'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['consent_information'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['consent_information'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['consent_information'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If applicable, does the consent information and form make it clear that some of the questions may prove to be embarrassing for the participant?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['embarrassing_questions'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->embarrassing_questions ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['embarrassing_questions'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['embarrassing_questions'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['embarrassing_questions'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['embarrassing_questions'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form state the participant is free to not answer any question?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['consent_participant'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->consent_participant ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['consent_participant'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['consent_participant'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['consent_participant'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['consent_participant'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how confidentiality of the questionnaires will be maintained (i.e. will they be coded or anonimised)?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['describe_confidentiality'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->describe_confidentiality ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['describe_confidentiality'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['describe_confidentiality'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['describe_confidentiality'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['describe_confidentiality'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the informed consent form make it clear the in-depth interview of focus group discussion is likely to be audio or video taped?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['interview_focus'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->interview_focus ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['interview_focus'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['interview_focus'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['interview_focus'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['interview_focus'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent form mention how and for long does these tapes are going to be stored?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['tapes_stored'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->tapes_stored ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['tapes_stored'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['tapes_stored'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['tapes_stored'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['tapes_stored'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
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
                      <td> <?php $numb = 1?> </td>
                      <td><strong>CLINICAL TRIALS/STUDY MEDICINES  </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> What are the investigational medicines/devices?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['investigational_medicines'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->investigational_medicines ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['investigational_medicines'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['investigational_medicines'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['investigational_medicines'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['investigational_medicines'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is there placebo?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['there_placebo'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->there_placebo ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['there_placebo'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['there_placebo'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['there_placebo'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['there_placebo'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is this a new drug or vaccine trial?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['new_drug'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->new_drug ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['new_drug'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['new_drug'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['new_drug'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['new_drug'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If it’s a new medicine or drug was the pharmaceutical, & pre-clinical development summary submitted?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['new_medicine'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->new_medicine ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['new_medicine'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['new_medicine'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['new_medicine'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['new_medicine'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the certificate of the pharmaceutical product submitted for each medicine?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['certificate_submitted'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->certificate_submitted ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['certificate_submitted'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['certificate_submitted'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['certificate_submitted'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['certificate_submitted'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the medicines registered for sale in the country of origin?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['medicines_registered'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->medicines_registered ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['medicines_registered'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['medicines_registered'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['medicines_registered'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['medicines_registered'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Investigator’s Brochure (including safety information attached?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['brochure_attached'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->brochure_attached ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['brochure_attached'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['brochure_attached'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['brochure_attached'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['brochure_attached'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Adverse Reaction/Adverse Event Reporting form attached?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['adr_attached'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->adr_attached ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['adr_attached'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['adr_attached'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['adr_attached'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['adr_attached'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has a Data Safety Monitoring Board been established?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['dsmb_established'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->dsmb_established ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['dsmb_established'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['dsmb_established'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['dsmb_established'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['dsmb_established'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the names of the chairperson and members of the DSMB available for the records? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['names_dsmb'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->names_dsmb ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['names_dsmb'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['names_dsmb'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['names_dsmb'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['names_dsmb'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
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
                      <td> <?php $numb = 1?> </td>
                      <td><strong>Human Biological Materials  </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Will human biological materials (tissues, cells, fluids, genetic material or genetic information) to be collected as part of the research?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['biological_materials'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->biological_materials ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['biological_materials'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['biological_materials'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['biological_materials'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['biological_materials'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form fully describe the nature, number and volume of the samples to be obtained and the procedures to be used for obtaining them?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['consent_volume'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->consent_volume ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['consent_volume'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['consent_volume'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['consent_volume'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['consent_volume'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form indicate if the procedures for obtaining these materials are routine or experimental and if routine, are more invasive than usual?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['consent_procedure'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->consent_procedure ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['consent_procedure'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['consent_procedure'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['consent_procedure'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['consent_procedure'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form clearly describe the use to which these samples will be put?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['consent_describe'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->consent_describe ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['consent_describe'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['consent_describe'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['consent_describe'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['consent_describe'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form include the provision for the subject to decide on the use of left-over specimens in future research of a restricted, specified or unspecified nature?
                      </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['consent_provision'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->consent_provision ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['consent_provision'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['consent_provision'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['consent_provision'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['consent_provision'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form cover for how long such specimens can be kept and how long they will be finally destroyed?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['consent_specimens'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->consent_specimens ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['consent_specimens'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['consent_specimens'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['consent_specimens'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['consent_specimens'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how specimens will be coded/anonimized?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['proposal_specimens'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->proposal_specimens ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['proposal_specimens'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['proposal_specimens'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['proposal_specimens'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['proposal_specimens'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent mention that generic testing/genomic analysis will be carried out on the human biologic materials?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['genomic_analysis'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->genomic_analysis ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['genomic_analysis'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['genomic_analysis'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['genomic_analysis'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['genomic_analysis'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is Insurance cover/certificate provided for participants trial-related injuries?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['insurance_cover'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->insurance_cover ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['insurance_cover'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['insurance_cover'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['insurance_cover'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['insurance_cover'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the sponsor sign the financial declaration form? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['sponsor_sign'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->sponsor_sign ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['sponsor_sign'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['sponsor_sign'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['sponsor_sign'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['sponsor_sign'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the Principal Investigator (PI) & Co investigator sign the GCP declaration form? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['sign_gcp'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->sign_gcp ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['sign_gcp'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['sign_gcp'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['sign_gcp'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['sign_gcp'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do the PI and co-investigators have sufficient time to run the study?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['run_study'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->run_study ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['run_study'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['run_study'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['run_study'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['run_study'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Were the CVs for the PI and co-investigators submitted?</td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['cvs_submitted'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->cvs_submitted ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['cvs_submitted'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['cvs_submitted'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['cvs_submitted'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['cvs_submitted'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the ethics approval (MRCZ) letter submitted? </td>
                      <td>
                        <span class="<?= (isset($evaluation_edit['ethics_letter'])) ? 'editer' : 'retide'; ?>">
                          <?= $evaluation->ethics_letter ?>
                        </span>
                        <?php
                          for ($i=0; $i < count(($evaluation_edit['ethics_letter'] ?? null)); $i++) { 
                            if ($i == count($evaluation_edit['ethics_letter'])-1) {
                              echo '<span class="retide">'.$evaluation_edit['ethics_letter'][$i].'</span>';
                            } else {
                              echo '<span class="editer">'.$evaluation_edit['ethics_letter'][$i].'</span>';
                            }
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <span class="<?= (isset($evaluation_edit['biological_materials_comments'])) ? 'editer' : 'retide'; ?>">
                              <?= $evaluation->biological_materials_comments ?>
                            </span>
                            <?php
                              for ($i=0; $i < count(($evaluation_edit['biological_materials_comments'] ?? null)); $i++) { 
                                if ($i == count($evaluation_edit['biological_materials_comments'])-1) {
                                  echo '<span class="retide">'.$evaluation_edit['biological_materials_comments'][$i].'</span>';
                                } else {
                                  echo '<span class="editer">'.$evaluation_edit['biological_materials_comments'][$i].'</span>';
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
                  data-name="comment_human_biological"
                  data-title="Comments">
                  <p>
                  <?php echo (empty($evaluation->comment_human_biological)) ? '<i>manager comments</i>' : $evaluation->comment_human_biological ?></p>                    
              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- end comment -->

                    <tr class="active">
                      <td> <?php $numb = 1?> </td>
                      <td><strong>Recommendations </strong></td>
                      <td></td>
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



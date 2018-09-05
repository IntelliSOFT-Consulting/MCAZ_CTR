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
          
          <?php foreach ($evaluations as $evaluation) {  ?>
          <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#<?= $evaluation->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false" aria-controls="<?= $evaluation->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
               Evaluated on: <?= $evaluation['created'] ?> by <?= $all_evaluators->toArray()[$evaluation->user_id] ?>
            </a>
            <p class="topper"><small><em class="text-success">evaluate on: <?= $evaluation['created'] ?> by <?= $all_evaluators->toArray()[$evaluation->user_id] ?></em></small></p>
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
            echo $this->Form->postLink('<span class="editer active">Approve the evaluation?</span>', 
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
                  <?= $evaluation->vulnerable_population ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['vulnerable_population']) && $edit['vulnerable_population'] != $evaluation['vulnerable_population']){      ?>
                          -> <span class="editer">
                             <?= $edit->vulnerable_population ?>
                          </span>
                   <?php   } } ?>
                     </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="2">
                        <div class="row">
                          <div class="col-xs-4">
                            <?= ($evaluation->vulnerable_pregnant) ? $checked : $nChecked; ?> Pregnant women <br> 
                            <?= ($evaluation->vulnerable_adolescent) ? $checked : $nChecked; ?> Adolescents <br> 
                            <?= ($evaluation->vulnerable_children) ? $checked : $nChecked; ?> Children </div>
                          <div class="col-xs-4">
                            <?= ($evaluation->vulnerable_elderly) ? $checked : $nChecked; ?> Elderly <br>  
                            <?= ($evaluation->vulnerable_refugees) ? $checked : $nChecked; ?> Refugees <br> 
                            <?= ($evaluation->vulnerable_unconscious) ? $checked : $nChecked; ?> Those who cannot give consent (unconscious) </div>
                          <div class="col-xs-4">
                            <?= ($evaluation->vulnerable_prisoners) ? $checked : $nChecked; ?> Prisoners <br> 
                            <?= ($evaluation->vulnerable_mental) ? $checked : $nChecked; ?> Persons with mental or Behavioural  Disorders <br> 
                            <?= ($evaluation->vulnerable_others) ? $checked : $nChecked; ?> Others </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td>Is the justification for studying this vulnerable population adequate?</td>
                      <td>
           <?= $evaluation->justification_adequate ?>                         
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['justification_adequate']) && $edit['justification_adequate'] != $evaluation['justification_adequate']){      ?>
                          -> <span class="editer">
                             <?= $edit->justification_adequate ?>
                          </span>
                   <?php   } } ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Have adequate provisions been made to ensure the vulnerable population is not being exploited?</td>
                      <td>
           <?= $evaluation->adequate_provisions ?>                         
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['adequate_provisions']) && $edit['adequate_provisions'] != $evaluation['adequate_provisions']){      ?>
                          -> <span class="editer">
                             <?= $edit->adequate_provisions ?>
                          </span>
                   <?php   } } ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->vulnerable_population_comments ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['vulnerable_population_comments']) && $edit['vulnerable_population_comments'] != $evaluation['vulnerable_population_comments']){      ?>
                          -> <span class="editer">
                             <?= $edit->vulnerable_population_comments ?>
                          </span>
                   <?php   } } ?>
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
           <?= $evaluation->rationale_stated ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['rationale_stated']) && $edit['rationale_stated'] != $evaluation['rationale_stated']){      ?>
                          -> <span class="editer">
                             <?= $edit->rationale_stated ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the hypothesis to be tested fully explained?</td>
                      <td>
           <?= $evaluation->hypothesis_explained ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['hypothesis_explained']) && $edit['hypothesis_explained'] != $evaluation['hypothesis_explained']){      ?>
                          -> <span class="editer">
                             <?= $edit->hypothesis_explained ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the study design scientifically sound?</td>
                      <td>
           <?= $evaluation->design_sound ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['design_sound']) && $edit['design_sound'] != $evaluation['design_sound']){      ?>
                          -> <span class="editer">
                             <?= $edit->design_sound ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where present, is the control arm adequate?</td>
                      <td>
           <?= $evaluation->control_arm ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['control_arm']) && $edit['control_arm'] != $evaluation['control_arm']){      ?>
                          -> <span class="editer">
                             <?= $edit->control_arm ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the inclusion and exclusion criteria complete and appropriate?</td>
                      <td>
           <?= $evaluation->criteria_complete ?>                         
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['criteria_complete']) && $edit['criteria_complete'] != $evaluation['criteria_complete']){      ?>
                          -> <span class="editer">
                             <?= $edit->criteria_complete ?>
                          </span>
                   <?php   } } ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the types and methods for subject allocation appropriate? </td>
                      <td>
           <?= $evaluation->subject_allocation ?>                 
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['subject_allocation']) && $edit['subject_allocation'] != $evaluation['subject_allocation']){      ?>
                          -> <span class="editer">
                             <?= $edit->subject_allocation ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the procedures for participant recruitment, admission, follow up and completion appropriate?</td>
                      <td>
           <?= $evaluation->procedures_appropriate ?>                 
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['procedures_appropriate']) && $edit['procedures_appropriate'] != $evaluation['procedures_appropriate']){      ?>
                          -> <span class="editer">
                             <?= $edit->procedures_appropriate ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the drugs and/or devices to be used fully described?  List medicines/devices:</td>
                      <td>
           <?= $evaluation->drugs_described ?>                 
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['drugs_described']) && $edit['drugs_described'] != $evaluation['drugs_described']){      ?>
                          -> <span class="editer">
                             <?= $edit->drugs_described ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the project design include appropriate criteria for stopping and discontinuing the research?</td>
                      <td>
           <?= $evaluation->appropriate_criteria ?>
                         
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['appropriate_criteria']) && $edit['appropriate_criteria'] != $evaluation['appropriate_criteria']){      ?>
                          -> <span class="editer">
                             <?= $edit->appropriate_criteria ?>
                          </span>
                   <?php   } } ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the clinical procedures to be carried out fully described and appropriate?</td>
                      <td>
           <?= $evaluation->clinical_procedures ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['clinical_procedures']) && $edit['clinical_procedures'] != $evaluation['clinical_procedures']){      ?>
                          -> <span class="editer">
                             <?= $edit->clinical_procedures ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the laboratory tests and other diagnostic procedures fully described and appropriate?</td>
                      <td>
           <?= $evaluation->laboratory_tests ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['laboratory_tests']) && $edit['laboratory_tests'] != $evaluation['laboratory_tests']){      ?>
                          -> <span class="editer">
                             <?= $edit->laboratory_tests ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the statistical basis for the study design appropriate and is the plan for analysis of the data appropriate?</td>
                      <td>
           <?= $evaluation->statistical_basis ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['statistical_basis']) && $edit['statistical_basis'] != $evaluation['statistical_basis']){      ?>
                          -> <span class="editer">
                             <?= $edit->statistical_basis ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->scientific_issues_comments ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['scientific_issues_comments']) && $edit['scientific_issues_comments'] != $evaluation['scientific_issues_comments']){      ?>
                          -> <span class="editer">
                             <?= $edit->scientific_issues_comments ?>
                          </span>
                   <?php   } } ?>
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
           <?= $evaluation->information_sheet ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['information_sheet']) && $edit['information_sheet'] != $evaluation['information_sheet']){      ?>
                          -> <span class="editer">
                             <?= $edit->information_sheet ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it make clear that the proposed study is research?</td>
                      <td>
           <?= $evaluation->proposed_study ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['proposed_study']) && $edit['proposed_study'] != $evaluation['proposed_study']){      ?>
                          -> <span class="editer">
                             <?= $edit->proposed_study ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it explain why the study is being done and why the subject is being asked to participate?</td>
                      <td>
           <?= $evaluation->explain_study ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['explain_study']) && $edit['explain_study'] != $evaluation['explain_study']){      ?>
                          -> <span class="editer">
                             <?= $edit->explain_study ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it clearly state the duration of the research?</td>
                      <td>
           <?= $evaluation->research_duration ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['research_duration']) && $edit['research_duration'] != $evaluation['research_duration']){      ?>
                          -> <span class="editer">
                             <?= $edit->research_duration ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide participants with a full description of the nature, sequence and frequency of the procedures to be carried out?</td>
                      <td>
           <?= $evaluation->full_description ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['full_description']) && $edit['full_description'] != $evaluation['full_description']){      ?>
                          -> <span class="editer">
                             <?= $edit->full_description ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the nature and likelihood of anticipated discomfort or adverse effects, including psychological; and social risks, if any and what has been done to minimise these risks, and the action to be taken if they occur?</td>
                      <td>
           <?= $evaluation->nature_discomfort ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['nature_discomfort']) && $edit['nature_discomfort'] != $evaluation['nature_discomfort']){      ?>
                          -> <span class="editer">
                             <?= $edit->nature_discomfort ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb ?>a.</td>
                      <td> Does it outline the possible benefits, if any, to the research participants?</td>
                      <td>
           <?= $evaluation->possible_benefits ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['possible_benefits']) && $edit['possible_benefits'] != $evaluation['possible_benefits']){      ?>
                          -> <span class="editer">
                             <?= $edit->possible_benefits ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>b.</td>
                      <td> Does it outline the possible benefits, if any to the community or to society?</td>
                      <td>
           <?= $evaluation->outline_community ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['outline_community']) && $edit['outline_community'] != $evaluation['outline_community']){      ?>
                          -> <span class="editer">
                             <?= $edit->outline_community ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to protect the confidentiality of participants’ data (either that provided by participants or that derived during and from the research itself?</td>
                      <td>
           <?= $evaluation->outline_procedure ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['outline_procedure']) && $edit['outline_procedure'] != $evaluation['outline_procedure']){      ?>
                          -> <span class="editer">
                             <?= $edit->outline_procedure ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If confidentiality is not possible due to the research design, has this been conveyed to all relevant persons?</td>
                      <td>
           <?= $evaluation->conveyed_persons ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['conveyed_persons']) && $edit['conveyed_persons'] != $evaluation['conveyed_persons']){      ?>
                          -> <span class="editer">
                             <?= $edit->conveyed_persons ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it inform the research participants that their participation is voluntary and refusal to participate (or discontinue participation) will involve no penalty or loss of medical benefits to which the participant was otherwise entitled?</td>
                      <td>
           <?= $evaluation->participation_voluntary ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['participation_voluntary']) && $edit['participation_voluntary'] != $evaluation['participation_voluntary']){      ?>
                          -> <span class="editer">
                             <?= $edit->participation_voluntary ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the nature of any compensation or reimbursement to be provided?</td>
                      <td>
           <?= $evaluation->compensation_provided ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['compensation_provided']) && $edit['compensation_provided'] != $evaluation['compensation_provided']){      ?>
                          -> <span class="editer">
                             <?= $edit->compensation_provided ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the alternatives to participation?</td>
                      <td>
           <?= $evaluation->alternatives_participation ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['alternatives_participation']) && $edit['alternatives_participation'] != $evaluation['alternatives_participation']){      ?>
                          -> <span class="editer">
                             <?= $edit->alternatives_participation ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the name and contact information of a person who can provide more information about the research project at any time?</td>
                      <td>
           <?= $evaluation->contact_research ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['contact_research']) && $edit['contact_research'] != $evaluation['contact_research']){      ?>
                          -> <span class="editer">
                             <?= $edit->contact_research ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable or reading and signing the written consent form (e.g. illiterate patients)? (Please attach)</td>
                      <td>
           <?= $evaluation->subjects_illiterate ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['subjects_illiterate']) && $edit['subjects_illiterate'] != $evaluation['subjects_illiterate']){      ?>
                          -> <span class="editer">
                             <?= $edit->subjects_illiterate ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it conclude with a statement such as “I have read the foregoing information, or it has been read to me? I have had the opportunity to ask questions about it and any questions I have asked have been answered to my satisfaction.  I consent voluntarily to participate as a subject in this study and understand that I have the right to withdraw from the study at any time without in any way it affecting my further medical care”? </td>
                      <td>
           <?= $evaluation->conclude_statement ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['conclude_statement']) && $edit['conclude_statement'] != $evaluation['conclude_statement']){      ?>
                          -> <span class="editer">
                             <?= $edit->conclude_statement ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide information to the research participants on the costs to the participants involved in terms of time, man-day lost from work, etc and reimbursement, if any? </td>
                      <td>
           <?= $evaluation->cost_participants ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['cost_participants']) && $edit['cost_participants'] != $evaluation['cost_participants']){      ?>
                          -> <span class="editer">
                             <?= $edit->cost_participants ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable of giving personal consent (e.g. for cultural reasons, children or adolescents less than the legal age of consent in the country in which research is taking place, subjects with mental illness, etc)?  (Please attach)</td>
                      <td>
           <?= $evaluation->incapable_consent ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['incapable_consent']) && $edit['incapable_consent'] != $evaluation['incapable_consent']){      ?>
                          -> <span class="editer">
                             <?= $edit->incapable_consent ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to keep participants informed of the progress and outcome of the research?</td>
                      <td>
           <?= $evaluation->research_outcome ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['research_outcome']) && $edit['research_outcome'] != $evaluation['research_outcome']){      ?>
                          -> <span class="editer">
                             <?= $edit->research_outcome ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->informed_consent_text ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['informed_consent_text']) && $edit['informed_consent_text'] != $evaluation['informed_consent_text']){      ?>
                          -> <span class="editer">
                             <?= $edit->informed_consent_text ?>
                          </span>
                   <?php   } } ?>
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
           <?= $evaluation->recruitment_material ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['recruitment_material']) && $edit['recruitment_material'] != $evaluation['recruitment_material']){      ?>
                          -> <span class="editer">
                             <?= $edit->recruitment_material ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does these materials make claims that may not be true?</td>
                      <td>
           <?= $evaluation->material_claims ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['material_claims']) && $edit['material_claims'] != $evaluation['material_claims']){      ?>
                          -> <span class="editer">
                             <?= $edit->material_claims ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do they make promises that may be inappropriate in the research setting (e.g. provide undue incentives or emphasise remuneration)?</td>
                      <td>
           <?= $evaluation->promises_inappropriate ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['promises_inappropriate']) && $edit['promises_inappropriate'] != $evaluation['promises_inappropriate']){      ?>
                          -> <span class="editer">
                             <?= $edit->promises_inappropriate ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the study involve questionnaires, diaries, study instruments, etc?</td>
                      <td>
           <?= $evaluation->study_questionnaires ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['study_questionnaires']) && $edit['study_questionnaires'] != $evaluation['study_questionnaires']){      ?>
                          -> <span class="editer">
                             <?= $edit->study_questionnaires ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are these attached to the proposal? (In English and local language)</td>
                      <td>
           <?= $evaluation->attached_proposal ?>
                         
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['attached_proposal']) && $edit['attached_proposal'] != $evaluation['attached_proposal']){      ?>
                          -> <span class="editer">
                             <?= $edit->attached_proposal ?>
                          </span>
                   <?php   } } ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires written in lay language and easily understood?</td>
                      <td>
           <?= $evaluation->lay_language ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['lay_language']) && $edit['lay_language'] != $evaluation['lay_language']){      ?>
                          -> <span class="editer">
                             <?= $edit->lay_language ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires relevant to answer the research questions?</td>
                      <td>
           <?= $evaluation->relevant_answer ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['relevant_answer']) && $edit['relevant_answer'] != $evaluation['relevant_answer']){      ?>
                          -> <span class="editer">
                             <?= $edit->relevant_answer ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires worded sensitively?</td>
                      <td>
           <?= $evaluation->worded_sensitively ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['worded_sensitively']) && $edit['worded_sensitively'] != $evaluation['worded_sensitively']){      ?>
                          -> <span class="editer">
                             <?= $edit->worded_sensitively ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form describe the nature and purpose of the questions to be asked?</td>
                      <td>
           <?= $evaluation->consent_information ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['consent_information']) && $edit['consent_information'] != $evaluation['consent_information']){      ?>
                          -> <span class="editer">
                             <?= $edit->consent_information ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If applicable, does the consent information and form make it clear that some of the questions may prove to be embarrassing for the participant?</td>
                      <td>
           <?= $evaluation->embarrassing_questions ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['embarrassing_questions']) && $edit['embarrassing_questions'] != $evaluation['embarrassing_questions']){      ?>
                          -> <span class="editer">
                             <?= $edit->embarrassing_questions ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form state the participant is free to not answer any question?</td>
                      <td>
           <?= $evaluation->consent_participant ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['consent_participant']) && $edit['consent_participant'] != $evaluation['consent_participant']){      ?>
                          -> <span class="editer">
                             <?= $edit->consent_participant ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how confidentiality of the questionnaires will be maintained (i.e. will they be coded or anonimised)?</td>
                      <td>
           <?= $evaluation->describe_confidentiality ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['describe_confidentiality']) && $edit['describe_confidentiality'] != $evaluation['describe_confidentiality']){      ?>
                          -> <span class="editer">
                             <?= $edit->describe_confidentiality ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the informed consent form make it clear the in-depth interview of focus group discussion is likely to be audio or video taped?</td>
                      <td>
           <?= $evaluation->interview_focus ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['interview_focus']) && $edit['interview_focus'] != $evaluation['interview_focus']){      ?>
                          -> <span class="editer">
                             <?= $edit->interview_focus ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent form mention how and for long does these tapes are going to be stored?</td>
                      <td>
           <?= $evaluation->tapes_stored ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['tapes_stored']) && $edit['tapes_stored'] != $evaluation['tapes_stored']){      ?>
                          -> <span class="editer">
                             <?= $edit->tapes_stored ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->other_materials_comments ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['other_materials_comments']) && $edit['other_materials_comments'] != $evaluation['other_materials_comments']){      ?>
                          -> <span class="editer">
                             <?= $edit->other_materials_comments ?>
                          </span>
                   <?php   } } ?>
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
           <?= $evaluation->investigational_medicines ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['investigational_medicines']) && $edit['investigational_medicines'] != $evaluation['investigational_medicines']){      ?>
                          -> <span class="editer">
                             <?= $edit->investigational_medicines ?>
                          </span>
                   <?php   } } ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is there placebo?</td>
                      <td>
           <?= $evaluation->there_placebo ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['there_placebo']) && $edit['there_placebo'] != $evaluation['there_placebo']){      ?>
                          -> <span class="editer">
                             <?= $edit->there_placebo ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is this a new drug or vaccine trial?</td>
                      <td>
           <?= $evaluation->new_drug ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['new_drug']) && $edit['new_drug'] != $evaluation['new_drug']){      ?>
                          -> <span class="editer">
                             <?= $edit->new_drug ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If it’s a new medicine or drug was the pharmaceutical, & pre-clinical development summary submitted?</td>
                      <td>
           <?= $evaluation->new_medicine ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['new_medicine']) && $edit['new_medicine'] != $evaluation['new_medicine']){      ?>
                          -> <span class="editer">
                             <?= $edit->new_medicine ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the certificate of the pharmaceutical product submitted for each medicine?</td>
                      <td>
           <?= $evaluation->certificate_submitted ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['certificate_submitted']) && $edit['certificate_submitted'] != $evaluation['certificate_submitted']){      ?>
                          -> <span class="editer">
                             <?= $edit->certificate_submitted ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the medicines registered for sale in the country of origin?</td>
                      <td>
           <?= $evaluation->medicines_registered ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['medicines_registered']) && $edit['medicines_registered'] != $evaluation['medicines_registered']){      ?>
                          -> <span class="editer">
                             <?= $edit->medicines_registered ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Investigator’s Brochure (including safety information attached?</td>
                      <td>
           <?= $evaluation->brochure_attached ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['brochure_attached']) && $edit['brochure_attached'] != $evaluation['brochure_attached']){      ?>
                          -> <span class="editer">
                             <?= $edit->brochure_attached ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Adverse Reaction/Adverse Event Reporting form attached?</td>
                      <td>
           <?= $evaluation->adr_attached ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['adr_attached']) && $edit['adr_attached'] != $evaluation['adr_attached']){      ?>
                          -> <span class="editer">
                             <?= $edit->adr_attached ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has a Data Safety Monitoring Board been established?</td>
                      <td>
           <?= $evaluation->dsmb_established ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['dsmb_established']) && $edit['dsmb_established'] != $evaluation['dsmb_established']){      ?>
                          -> <span class="editer">
                             <?= $edit->dsmb_established ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the names of the chairperson and members of the DSMB available for the records? </td>
                      <td>
           <?= $evaluation->names_dsmb ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['names_dsmb']) && $edit['names_dsmb'] != $evaluation['names_dsmb']){      ?>
                          -> <span class="editer">
                             <?= $edit->names_dsmb ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->clinical_trials_text ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['clinical_trials_text']) && $edit['clinical_trials_text'] != $evaluation['clinical_trials_text']){      ?>
                          -> <span class="editer">
                             <?= $edit->clinical_trials_text ?>
                          </span>
                   <?php   } } ?>

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
           <?= $evaluation->biological_materials ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['biological_materials']) && $edit['biological_materials'] != $evaluation['biological_materials']){      ?>
                          -> <span class="editer">
                             <?= $edit->biological_materials ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form fully describe the nature, number and volume of the samples to be obtained and the procedures to be used for obtaining them?</td>
                      <td>
           <?= $evaluation->consent_volume ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['consent_volume']) && $edit['consent_volume'] != $evaluation['consent_volume']){      ?>
                          -> <span class="editer">
                             <?= $edit->consent_volume ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form indicate if the procedures for obtaining these materials are routine or experimental and if routine, are more invasive than usual?</td>
                      <td>
           <?= $evaluation->consent_procedure ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['consent_procedure']) && $edit['consent_procedure'] != $evaluation['consent_procedure']){      ?>
                          -> <span class="editer">
                             <?= $edit->consent_procedure ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form clearly describe the use to which these samples will be put?</td>
                      <td>
           <?= $evaluation->consent_describe ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['consent_describe']) && $edit['consent_describe'] != $evaluation['consent_describe']){      ?>
                          -> <span class="editer">
                             <?= $edit->consent_describe ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form include the provision for the subject to decide on the use of left-over specimens in future research of a restricted, specified or unspecified nature?
                      </td>
                      <td>
           <?= $evaluation->consent_provision ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['consent_provision']) && $edit['consent_provision'] != $evaluation['consent_provision']){      ?>
                          -> <span class="editer">
                             <?= $edit->consent_provision ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form cover for how long such specimens can be kept and how long they will be finally destroyed?</td>
                      <td>
           <?= $evaluation->consent_specimens ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['consent_specimens']) && $edit['consent_specimens'] != $evaluation['consent_specimens']){      ?>
                          -> <span class="editer">
                             <?= $edit->consent_specimens ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how specimens will be coded/anonimized?</td>
                      <td>
           <?= $evaluation->proposal_specimens ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['proposal_specimens']) && $edit['proposal_specimens'] != $evaluation['proposal_specimens']){      ?>
                          -> <span class="editer">
                             <?= $edit->proposal_specimens ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent mention that generic testing/genomic analysis will be carried out on the human biologic materials?</td>
                      <td>
           <?= $evaluation->genomic_analysis ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['genomic_analysis']) && $edit['genomic_analysis'] != $evaluation['genomic_analysis']){      ?>
                          -> <span class="editer">
                             <?= $edit->genomic_analysis ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is Insurance cover/certificate provided for participants trial-related injuries?</td>
                      <td>
           <?= $evaluation->insurance_cover ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['insurance_cover']) && $edit['insurance_cover'] != $evaluation['insurance_cover']){      ?>
                          -> <span class="editer">
                             <?= $edit->insurance_cover ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the sponsor sign the financial declaration form? </td>
                      <td>
           <?= $evaluation->sponsor_sign ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['sponsor_sign']) && $edit['sponsor_sign'] != $evaluation['sponsor_sign']){      ?>
                          -> <span class="editer">
                             <?= $edit->sponsor_sign ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the Principal Investigator (PI) & Co investigator sign the GCP declaration form? </td>
                      <td>
           <?= $evaluation->sign_gcp ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['sign_gcp']) && $edit['sign_gcp'] != $evaluation['sign_gcp']){      ?>
                          -> <span class="editer">
                             <?= $edit->sign_gcp ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do the PI and co-investigators have sufficient time to run the study?</td>
                      <td>
           <?= $evaluation->run_study ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['run_study']) && $edit['run_study'] != $evaluation['run_study']){      ?>
                          -> <span class="editer">
                             <?= $edit->run_study ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Were the CVs for the PI and co-investigators submitted?</td>
                      <td>
           <?= $evaluation->cvs_submitted ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['cvs_submitted']) && $edit['cvs_submitted'] != $evaluation['cvs_submitted']){      ?>
                          -> <span class="editer">
                             <?= $edit->cvs_submitted ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the ethics approval (MRCZ) letter submitted? </td>
                      <td>
           <?= $evaluation->ethics_letter ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['ethics_letter']) && $edit['ethics_letter'] != $evaluation['ethics_letter']){      ?>
                          -> <span class="editer">
                             <?= $edit->ethics_letter ?>
                          </span>
                   <?php   } } ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->biological_materials_comments ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['biological_materials_comments']) && $edit['biological_materials_comments'] != $evaluation['biological_materials_comments']){      ?>
                          -> <span class="editer">
                             <?= $edit->biological_materials_comments ?>
                          </span>
                   <?php   } } ?>
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
           <?= $evaluation->recommendations ?>
                  <?php
                    foreach($evaluation['evaluation_edits'] as $key => $edit) {
                      if(isset($edit['recommendations']) && $edit['recommendations'] != $evaluation['recommendations']){      ?>
                          -> <span class="editer">
                             <?= $edit->recommendations ?>
                          </span>
                   <?php   } } ?>
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



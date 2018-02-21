<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
  $numb = 1;
  use Cake\Utility\Hash;
?>
  
  <div class="row">
    <div class="col-xs-12">      
      <?= $this->Flash->render() ?>
      <?php $this->ValidationMessages->display($application->errors()) ?>
          <h2 class="text-center">Evaluation Report(s)</h2>
          <hr>
        <?php
            echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Applications', 'action' => 'review', '_ext' => 'pdf', $application->id, 'All', ], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
                  ?>
    </div>
  </div>

  <?= $this->element('pdf/common_header')?>

      <div class="row">
        <div class="col-xs-12">          
          <?php
            if (!empty($application->evaluations)) {
              echo "<h3 class='text-center'>Previous Evaluation(s)</h3>";
            }
          ?>
          <?= $this->element('applications/evaluation_reports', ["evaluations" => $application->evaluations]) ?>
        </div>
      </div>

      <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseReview" aria-expanded="false" aria-controls="collapseReview">
        Evaluation Form. Click to review
      </button>

      <div class="row collapse" id="collapseReview" >
        <div class="col-xs-12">

         <?php 
         // pr($application->evaluations);
         //$application['evaluations'][] = [100 => $application->evaluations[0]];
         //$application->evaluations[100] = $application->evaluations[0];
         //pr($application->evaluations);
         //$ekey = 100;
         echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-review']]); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('evaluation_pr_id', ['type' => 'hidden', 'value' => (($application->evaluations[$ekey]['id']) ?? 100), 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('evaluations.'.$ekey.'.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('evaluations.'.$ekey.'.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                ?>

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
                        <?= $this->Form->control('evaluations.'.$ekey.'.vulnerable_population', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?> </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="2">
                        <div class="row">
                          <div class="col-xs-4"> 
                          <?php
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_pregnant', ['type' => 'checkbox', 'label' => 'Pregnant women', 'templates' => 'checkbox_form_ev' ]);
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_adolescent', ['type' => 'checkbox', 'label' => 'Adolescents', 'templates' => 'checkbox_form_ev' ]);
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_children', ['type' => 'checkbox', 'label' => 'Children', 'templates' => 'checkbox_form_ev' ]);
                          ?>
                          </div>
                          <div class="col-xs-4"> 
                          <?php
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_elderly', ['type' => 'checkbox', 'label' => 'Elderly', 'templates' => 'checkbox_form_ev' ]);
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_refugees', ['type' => 'checkbox', 'label' => 'Refugees', 'templates' => 'checkbox_form_ev' ]);
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_unconscious', ['type' => 'checkbox', 'label' => 'Those who cannot give consent (unconscious)', 'templates' => 'checkbox_form_ev' ]);
                          ?>
                          </div>
                          <div class="col-xs-4"> 
                          <?php
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_prisoners', ['type' => 'checkbox', 'label' => 'Prisoners', 'templates' => 'checkbox_form_ev' ]);
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_mental', ['type' => 'checkbox', 'label' => 'Persons with mental or Behavioural  Disorders', 'templates' => 'checkbox_form_ev' ]);
                             echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_others', ['type' => 'checkbox', 'label' => 'Others', 'templates' => 'checkbox_form_ev' ]);
                          ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td>Is the justification for studying this vulnerable population adequate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.justification_adequate', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Have adequate provisions been made to ensure the vulnerable population is not being exploited?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.adequate_provisions', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_population_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="active">
                      <td> <?php $numb = 1; ?> </td>
                      <td><strong>Scientific and Technical Issues </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the rationale for the study clearly stated in the context present knowledge?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.rationale_stated', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the hypothesis to be tested fully explained?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.hypothesis_explained', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the study design scientifically sound?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.design_sound', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where present, is the control arm adequate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.control_arm', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the inclusion and exclusion criteria complete and appropriate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.criteria_complete', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the types and methods for subject allocation appropriate? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.subject_allocation', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the procedures for participant recruitment, admission, follow up and completion appropriate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.procedures_appropriate', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the drugs and/or devices to be used fully described?  List medicines/devices:</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.drugs_described', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the project design include appropriate criteria for stopping and discontinuing the research?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.appropriate_criteria', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the clinical procedures to be carried out fully described and appropriate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.clinical_procedures', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the laboratory tests and other diagnostic procedures fully described and appropriate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.laboratory_tests', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the statistical basis for the study design appropriate and is the plan for analysis of the data appropriate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.statistical_basis', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.scientific_issues_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td> <?php $numb = 1; ?></td>
                      <td><strong>Informed Consent, Decision-making & Confidentiality   </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the information sheet free of technical terms, written in lay-persons’ language, easily understandable, complete and adequate? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.information_sheet', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it make clear that the proposed study is research?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.proposed_study', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it explain why the study is being done and why the subject is being asked to participate?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.explain_study', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it clearly state the duration of the research?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.research_duration', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide participants with a full description of the nature, sequence and frequency of the procedures to be carried out?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.full_description', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the nature and likelihood of anticipated discomfort or adverse effects, including psychological; and social risks, if any and what has been done to minimise these risks, and the action to be taken if they occur?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.nature_discomfort', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb ?>a.</td>
                      <td> Does it outline the possible benefits, if any, to the research participants?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.possible_benefits', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>b.</td>
                      <td> Does it outline the possible benefits, if any to the community or to society?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.outline_community', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to protect the confidentiality of participants’ data (either that provided by participants or that derived during and from the research itself?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.outline_procedure', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If confidentiality is not possible due to the research design, has this been conveyed to all relevant persons?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.conveyed_persons', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it inform the research participants that their participation is voluntary and refusal to participate (or discontinue participation) will involve no penalty or loss of medical benefits to which the participant was otherwise entitled?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.participation_voluntary', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the nature of any compensation or reimbursement to be provided?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.compensation_provided', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the alternatives to participation?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.alternatives_participation', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the name and contact information of a person who can provide more information about the research project at any time?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.contact_research', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable or reading and signing the written consent form (e.g. illiterate patients)? (Please attach)</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.subjects_illiterate', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it conclude with a statement such as “I have read the foregoing information, or it has been read to me? I have had the opportunity to ask questions about it and any questions I have asked have been answered to my satisfaction.  I consent voluntarily to participate as a subject in this study and understand that I have the right to withdraw from the study at any time without in any way it affecting my further medical care”? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.conclude_statement', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide information to the research participants on the costs to the participants involved in terms of time, man-day lost from work, etc and reimbursement, if any? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.cost_participants', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable of giving personal consent (e.g. for cultural reasons, children or adolescents less than the legal age of consent in the country in which research is taking place, subjects with mental illness, etc)?  (Please attach)</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.incapable_consent', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to keep participants informed of the progress and outcome of the research?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.research_outcome', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.informed_consent_text', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td> <?php $numb = 1; ?> </td>
                      <td><strong>Other materials, documents and study instruments (Patient recruitment materials, Questionnaires) </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Participant Recruitment Material (e.g. advertisement, notices, media articles, transcripts or radio messages) provided both in English and in the local language(s)?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.recruitment_material', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does these materials make claims that may not be true?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.material_claims', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do they make promises that may be inappropriate in the research setting (e.g. provide undue incentives or emphasise remuneration)?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.promises_inappropriate', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the study involve questionnaires, diaries, study instruments, etc?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.study_questionnaires', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are these attached to the proposal? (In English and local language)</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.attached_proposal', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires written in lay language and easily understood?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.lay_language', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires relevant to answer the research questions?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.relevant_answer', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires worded sensitively?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.worded_sensitively', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form describe the nature and purpose of the questions to be asked?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.consent_information', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If applicable, does the consent information and form make it clear that some of the questions may prove to be embarrassing for the participant?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.embarrassing_questions', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form state the participant is free to not answer any question?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.consent_participant', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how confidentiality of the questionnaires will be maintained (i.e. will they be coded or anonimised)?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.describe_confidentiality', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the informed consent form make it clear the in-depth interview of focus group discussion is likely to be audio or video taped?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.interview_focus', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent form mention how and for long does these tapes are going to be stored?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.tapes_stored', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.other_materials_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td> <?php $numb = 1?> </td>
                      <td><strong>CLINICAL TRIALS/STUDY MEDICINES  </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> What are the investigational medicines/devices?</td>
                      <td>
                        <?php
                        $medicines = $application->drug_name;
                        $medicines .= ', '.$application->quantity_excemption;
                        $medicines .= implode(";<br> ", Hash::format($application['amendments'], ['{n}.drug_name', '{n}.quantity_excemption'], '%1$s, %2$s'));
                        $medicines .= implode(', ', Hash::format($application['medicines'], ['{n}.medicine_name', '{n}.quantity_required'], '%1$s, %2$s'));
                        $medicines .= implode(";<br> ", Hash::format($application['amendments'], ['{n}.medicines.{n}.medicine_name', '{n}.medicines.{n}.quantity_required'], '%1$s, %2$s'));
                       // echo $medicines;
                        echo $this->Form->control('evaluations.'.$ekey.'.investigational_medicines', ['type' => 'textarea', 'label' => false, 'templates' => 'table_form', 
                          'value' => $medicines
                              ]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is there placebo?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.there_placebo', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is this a new drug or vaccine trial?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.new_drug', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If it’s a new medicine or drug was the pharmaceutical, & pre-clinical development summary submitted?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.new_medicine', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the certificate of the pharmaceutical product submitted for each medicine?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.certificate_submitted', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the medicines registered for sale in the country of origin?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.medicines_registered', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Investigator’s Brochure (including safety information attached?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.brochure_attached', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Adverse Reaction/Adverse Event Reporting form attached?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.adr_attached', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has a Data Safety Monitoring Board been established?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.dsmb_established', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the names of the chairperson and members of the DSMB available for the records? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.names_dsmb', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.clinical_trials_text', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td> <?php $numb = 1?> </td>
                      <td><strong>Human Biological Materials  </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Will human biological materials (tissues, cells, fluids, genetic material or genetic information) to be collected as part of the research?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.biological_materials', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form fully describe the nature, number and volume of the samples to be obtained and the procedures to be used for obtaining them?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.consent_volume', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form indicate if the procedures for obtaining these materials are routine or experimental and if routine, are more invasive than usual?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.consent_procedure', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form clearly describe the use to which these samples will be put?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.consent_describe', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form include the provision for the subject to decide on the use of left-over specimens in future research of a restricted, specified or unspecified nature?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.consent_provision', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form cover for how long such specimens can be kept and how long they will be finally destroyed?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.consent_specimens', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how specimens will be coded/anonimized?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.proposal_specimens', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent mention that generic testing/genomic analysis will be carried out on the human biologic materials?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.genomic_analysis', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is Insurance cover/certificate provided for participants trial-related injuries?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.insurance_cover', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the sponsor sign the financial declaration form? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.sponsor_sign', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the Principal Investigator (PI) & Co investigator sign the GCP declaration form? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.sign_gcp', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do the PI and co-investigators have sufficient time to run the study?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.run_study', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Were the CVs for the PI and co-investigators submitted?</td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.cvs_submitted', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the ethics approval (MRCZ) letter submitted? </td>
                      <td>
                        <?= $this->Form->control('evaluations.'.$ekey.'.ethics_letter', ['type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                              'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]); ?>     
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.biological_materials_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="active">
                      <td> <?php $numb = 1?> </td>
                      <td><strong>Recommendations </strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.recommendations', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.file', ['type' => 'file', 'label' => false, 'escape' => false, 'templates' => 'table_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                </table>

                </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-sm-12"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Review</button>
                  </div> 
              </div>
           <?php echo $this->Form->end() ?>
        </div>
      </div>

<script type="text/javascript">
  CKEDITOR.replace('evaluations-100-vulnerable-population-comments');
  CKEDITOR.replace('evaluations-100-scientific-issues-comments');
  CKEDITOR.replace('evaluations-100-informed-consent-text');
  CKEDITOR.replace('evaluations-100-other-materials-comments');
  CKEDITOR.replace('evaluations-100-clinical-trials-text');
  CKEDITOR.replace('evaluations-100-biological-materials-comments');
  CKEDITOR.replace('evaluations-100-recommendations');
</script>
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
          if($this->request->params['_ext'] != 'pdf' and ($evaluation->user_id == $this->request->session()->read('Auth.User.id')
                                                          or $this->request->session()->read('Auth.User.group_id') == 2)) {
            echo $this->Form->postLink(
                '<span class="label label-info">Edit</span>',
                [],
                ['data' => ['evaluation_id' => $evaluation->id], 'escape' => false, 'confirm' => __('Are you sure you want to edit evaluation {0}?', $evaluation->id)]
            );
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
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Have adequate provisions been made to ensure the vulnerable population is not being exploited?</td>
                      <td>
           <?= $evaluation->adequate_provisions ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->vulnerable_population_comments ?>
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
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the hypothesis to be tested fully explained?</td>
                      <td>
           <?= $evaluation->hypothesis_explained ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the study design scientifically sound?</td>
                      <td>
           <?= $evaluation->design_sound ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where present, is the control arm adequate?</td>
                      <td>
           <?= $evaluation->control_arm ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the inclusion and exclusion criteria complete and appropriate?</td>
                      <td>
           <?= $evaluation->criteria_complete ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the types and methods for subject allocation appropriate? </td>
                      <td>
           <?= $evaluation->subject_allocation ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the procedures for participant recruitment, admission, follow up and completion appropriate?</td>
                      <td>
           <?= $evaluation->procedures_appropriate ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the drugs and/or devices to be used fully described?  List medicines/devices:</td>
                      <td>
           <?= $evaluation->drugs_described ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the project design include appropriate criteria for stopping and discontinuing the research?</td>
                      <td>
           <?= $evaluation->appropriate_criteria ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the clinical procedures to be carried out fully described and appropriate?</td>
                      <td>
           <?= $evaluation->clinical_procedures ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the laboratory tests and other diagnostic procedures fully described and appropriate?</td>
                      <td>
           <?= $evaluation->laboratory_tests ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the statistical basis for the study design appropriate and is the plan for analysis of the data appropriate?</td>
                      <td>
           <?= $evaluation->statistical_basis ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->scientific_issues_comments ?>
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
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it make clear that the proposed study is research?</td>
                      <td>
           <?= $evaluation->proposed_study ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it explain why the study is being done and why the subject is being asked to participate?</td>
                      <td>
           <?= $evaluation->explain_study ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it clearly state the duration of the research?</td>
                      <td>
           <?= $evaluation->research_duration ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide participants with a full description of the nature, sequence and frequency of the procedures to be carried out?</td>
                      <td>
           <?= $evaluation->full_description ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the nature and likelihood of anticipated discomfort or adverse effects, including psychological; and social risks, if any and what has been done to minimise these risks, and the action to be taken if they occur?</td>
                      <td>
           <?= $evaluation->nature_discomfort ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb ?>a.</td>
                      <td> Does it outline the possible benefits, if any, to the research participants?</td>
                      <td>
           <?= $evaluation->possible_benefits ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>b.</td>
                      <td> Does it outline the possible benefits, if any to the community or to society?</td>
                      <td>
           <?= $evaluation->outline_community ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to protect the confidentiality of participants’ data (either that provided by participants or that derived during and from the research itself?</td>
                      <td>
           <?= $evaluation->outline_procedure ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If confidentiality is not possible due to the research design, has this been conveyed to all relevant persons?</td>
                      <td>
           <?= $evaluation->conveyed_persons ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it inform the research participants that their participation is voluntary and refusal to participate (or discontinue participation) will involve no penalty or loss of medical benefits to which the participant was otherwise entitled?</td>
                      <td>
           <?= $evaluation->participation_voluntary ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the nature of any compensation or reimbursement to be provided?</td>
                      <td>
           <?= $evaluation->compensation_provided ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it describe the alternatives to participation?</td>
                      <td>
           <?= $evaluation->alternatives_participation ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide the name and contact information of a person who can provide more information about the research project at any time?</td>
                      <td>
           <?= $evaluation->contact_research ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable or reading and signing the written consent form (e.g. illiterate patients)? (Please attach)</td>
                      <td>
           <?= $evaluation->subjects_illiterate ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it conclude with a statement such as “I have read the foregoing information, or it has been read to me? I have had the opportunity to ask questions about it and any questions I have asked have been answered to my satisfaction.  I consent voluntarily to participate as a subject in this study and understand that I have the right to withdraw from the study at any time without in any way it affecting my further medical care”? </td>
                      <td>
           <?= $evaluation->conclude_statement ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it provide information to the research participants on the costs to the participants involved in terms of time, man-day lost from work, etc and reimbursement, if any? </td>
                      <td>
           <?= $evaluation->cost_participants ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has provision been made for subjects incapable of giving personal consent (e.g. for cultural reasons, children or adolescents less than the legal age of consent in the country in which research is taking place, subjects with mental illness, etc)?  (Please attach)</td>
                      <td>
           <?= $evaluation->incapable_consent ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does it outline the procedure that will be followed to keep participants informed of the progress and outcome of the research?</td>
                      <td>
           <?= $evaluation->research_outcome ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->informed_consent_text ?>
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
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does these materials make claims that may not be true?</td>
                      <td>
           <?= $evaluation->material_claims ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do they make promises that may be inappropriate in the research setting (e.g. provide undue incentives or emphasise remuneration)?</td>
                      <td>
           <?= $evaluation->promises_inappropriate ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the study involve questionnaires, diaries, study instruments, etc?</td>
                      <td>
           <?= $evaluation->study_questionnaires ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are these attached to the proposal? (In English and local language)</td>
                      <td>
           <?= $evaluation->attached_proposal ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires written in lay language and easily understood?</td>
                      <td>
           <?= $evaluation->lay_language ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires relevant to answer the research questions?</td>
                      <td>
           <?= $evaluation->relevant_answer ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the questionnaires worded sensitively?</td>
                      <td>
           <?= $evaluation->worded_sensitively ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form describe the nature and purpose of the questions to be asked?</td>
                      <td>
           <?= $evaluation->consent_information ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If applicable, does the consent information and form make it clear that some of the questions may prove to be embarrassing for the participant?</td>
                      <td>
           <?= $evaluation->embarrassing_questions ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form state the participant is free to not answer any question?</td>
                      <td>
           <?= $evaluation->consent_participant ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how confidentiality of the questionnaires will be maintained (i.e. will they be coded or anonimised)?</td>
                      <td>
           <?= $evaluation->describe_confidentiality ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the informed consent form make it clear the in-depth interview of focus group discussion is likely to be audio or video taped?</td>
                      <td>
           <?= $evaluation->interview_focus ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent form mention how and for long does these tapes are going to be stored?</td>
                      <td>
           <?= $evaluation->tapes_stored ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->other_materials_comments ?>
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
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is there placebo?</td>
                      <td>
           <?= $evaluation->there_placebo ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is this a new drug or vaccine trial?</td>
                      <td>
           <?= $evaluation->new_drug ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> If it’s a new medicine or drug was the pharmaceutical, & pre-clinical development summary submitted?</td>
                      <td>
           <?= $evaluation->new_medicine ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the certificate of the pharmaceutical product submitted for each medicine?</td>
                      <td>
           <?= $evaluation->certificate_submitted ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the medicines registered for sale in the country of origin?</td>
                      <td>
           <?= $evaluation->medicines_registered ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Investigator’s Brochure (including safety information attached?</td>
                      <td>
           <?= $evaluation->brochure_attached ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is the Adverse Reaction/Adverse Event Reporting form attached?</td>
                      <td>
           <?= $evaluation->adr_attached ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Has a Data Safety Monitoring Board been established?</td>
                      <td>
           <?= $evaluation->dsmb_established ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Are the names of the chairperson and members of the DSMB available for the records? </td>
                      <td>
           <?= $evaluation->names_dsmb ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->clinical_trials_text ?>
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
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form fully describe the nature, number and volume of the samples to be obtained and the procedures to be used for obtaining them?</td>
                      <td>
           <?= $evaluation->consent_volume ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form indicate if the procedures for obtaining these materials are routine or experimental and if routine, are more invasive than usual?</td>
                      <td>
           <?= $evaluation->consent_procedure ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form clearly describe the use to which these samples will be put?</td>
                      <td>
           <?= $evaluation->consent_describe ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form include the provision for the subject to decide on the use of left-over specimens in future research of a restricted, specified or unspecified nature?
                      </td>
                      <td>
           <?= $evaluation->consent_provision ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the consent information and form cover for how long such specimens can be kept and how long they will be finally destroyed?</td>
                      <td>
           <?= $evaluation->consent_specimens ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Does the proposal describe how specimens will be coded/anonimized?</td>
                      <td>
           <?= $evaluation->proposal_specimens ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Where applicable, does the consent mention that generic testing/genomic analysis will be carried out on the human biologic materials?</td>
                      <td>
           <?= $evaluation->genomic_analysis ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Is Insurance cover/certificate provided for participants trial-related injuries?</td>
                      <td>
           <?= $evaluation->insurance_cover ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the sponsor sign the financial declaration form? </td>
                      <td>
           <?= $evaluation->sponsor_sign ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Did the Principal Investigator (PI) & Co investigator sign the GCP declaration form? </td>
                      <td>
           <?= $evaluation->sign_gcp ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Do the PI and co-investigators have sufficient time to run the study?</td>
                      <td>
           <?= $evaluation->run_study ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Were the CVs for the PI and co-investigators submitted?</td>
                      <td>
           <?= $evaluation->cvs_submitted ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td><?= $numb++ ?>.</td>
                      <td> Was the ethics approval (MRCZ) letter submitted? </td>
                      <td>
           <?= $evaluation->ethics_letter ?>
                         
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
           <?= $evaluation->biological_materials_comments ?>
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
                            <h4 class="text-center"> Signature</h4>
                          </div>
                          <div class="col-xs-12">
                            <h4 class="text-center"><?php          
                              // echo ($evaluation->signature) ? "<img src='".$this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true)."' style='width: 30%;' alt=''>" : '';
                              echo ($evaluation->user->dir) ? "<img src='".$this->Url->build(substr($evaluation->user->dir, 8) . '/' . $evaluation->user->file, true)."' style='width: 30%;' alt=''>" : '';
                            ?></h4>
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



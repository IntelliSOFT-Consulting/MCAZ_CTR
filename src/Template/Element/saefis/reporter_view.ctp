<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"> 
      <span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Serious Adverse Event After Immunization (AEFI) Investigation Form
      </h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center has-error">(Only for Serious Adverse Events Following Immunization <i class="fa fa-minus" aria-hidden="true"></i> Death / Disability / Hospitalization / Cluster)</h5></div>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-xs-12">
      <?= $this->Form->create($saefi, ['type' => 'file']) ?>
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= ($saefi->submitted == 2) ? $saefi->reference_number : $saefi->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ; ?></strong></h5></div>         
          </div>

          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
              <?php
                  echo $this->Form->control('basic_details', ['type' => 'textarea', 'label' => 'Basic Details']);
              ?>
            </div>
            <div class="col-xs-1"></div>
          </div>

          <div class="row">              
            <div class="col-xs-6">
                <?php
                  echo $this->Form->control('reporter_name', ['type' => 'textarea', 'label' => 'Name of Investigating Health Worker']);
                  echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);                 
              ?>
            </div>
            <div class="col-xs-6">
                <?php
                  echo $this->Form->control('telephone', ['type' => 'textarea', 'label' => 'Telephone # Landline (with code)']);
                  echo $this->Form->control('mobile', ['type' => 'textarea', 'label' => 'Mobile']);               
                  echo $this->Form->control('reporter_email', ['type' => 'textarea', 'label' => 'Reporter email']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
              <?php                  
                  echo $this->Form->control('place_vaccination', [ 
                     'type' => 'textarea', 'label' => 'Treatment provided', 'escape' => false,
                                          'options' => ['Govt. health facility' => 'Govt. health facility', 'Private health facility' => 'Private health facility', 'Other' => 'Other']]);
                  echo $this->Form->control('place_vaccination_other', ['type' => 'textarea', 'label' => 'Other, (specify)']);
                  echo $this->Form->control('site_type', [ 
                     'type' => 'textarea', 'label' => 'Type of site', 'escape' => false,
                                          'options' => ['Fixed' => 'Fixed', 'Mobile' => 'Mobile', 'Outreach' => 'Outreach' , 'Other' => 'Other']]);
                  echo $this->Form->control('site_type_other', ['type' => 'textarea', 'label' => 'Other, (specify)']);
                  echo $this->Form->control('vaccination_in', [ 
                     'type' => 'textarea', 'label' => 'Vaccination in', 'escape' => false,
                                          'options' => ['Campaign' => 'Campaign', 'Routine' => 'Routine', 'Other' => 'Other']]);
                  echo $this->Form->control('vaccination_in_other', ['type' => 'textarea', 'label' => 'Other, (specify)']);
              ?>
            </div>
            <div class="col-xs-3">
                <?php
                  echo $this->Form->control('report_date', ['type' => 'textarea', 'label' => 'Date AEFI reported']);
                  echo $this->Form->control('start_date', ['type' => 'textarea', 'label' => 'Date investigation started']);
                  echo $this->Form->control('complete_date', ['type' => 'textarea', 'label' => 'Date investigation completed']);
              ?>
            </div>
          </div>

          <div class="row"> 
            <div class="col-xs-6"> 
                <?= $this->Form->control('patient_name', ['type' => 'textarea', 'label' => 'Patient Name']); ?>
            </div> 
            <div class="col-xs-6"> 
                <?= $this->Form->control('gender', [ 
                     'type' => 'textarea', 'label' => 'Gender <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
                                          'options' => ['Male' => 'Male', 'Female' => 'Female']]);
                ?>
            </div> 
          </div>

          <div class="row">
            <div class="col-xs-8">
              <?php              
                  echo $this->Form->control('hospitalization_date', ['type' => 'textarea', 'label' => 'Date of hospitalization', 'type' => 'text']);    
                  echo $this->Form->control('status_on_date', [ 
                     'type' => 'textarea', 'label' => 'Status on the date of investigation', 'escape' => false,
                                          'options' => ['Died' => 'Died', 'Disabled' => 'Disabled', 'Recovering' => 'Recovering', 'Recovered completely' => 'Recovered completely', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('died_date', ['type' => 'textarea', 'label' => 'If died, date and time of death ', 'type' => 'text']);
                  echo $this->Form->control('autopsy_done', [ 
                     'type' => 'textarea', 'label' => 'Autopsy done?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('autopsy_done_date', ['type' => 'textarea', 'label' => 'If yes, date:', 'type' => 'text']); 

                  echo $this->Form->control('autopsy_planned', [ 
                     'type' => 'textarea', 'label' => 'Autopsy Planned?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('autopsy_planned_date', ['type' => 'textarea', 'label' => 'If yes, date:', 'type' => 'text']); 
              ?>
            </div>
            <div class="col-xs-3">
                <br><br><br>
                <?php
                if (!empty($saefi['reports'])) {
                    echo '<p>File attachment: </p>';
                    echo $this->Html->link($saefi['reports'][0]->file, substr($saefi['reports'][0]->dir, 8) . '/' . $saefi['reports'][0]->file, ['fullBase' => true]);
                } else {
                  echo $this->Form->control('reports.0.file', ['type' => 'textarea', 'label' => 'Attach report (if available)', ]);
                }
              ?>
            </div>
          </div>

          <hr>

          <h4>Section B:  <span class="text-center">Relevant patient information prior to immunization </span></h4>
          
          <div class="row">
              <div class="col-xs-12">
                  <table class="table table-bordered table-condensed">
                      <thead>
                        <tr>
                          <th style="width: 50%;" class="text-center">Criteria</th>
                          <th class="text-center">Finding</th>
                          <th class="text-center">Remarks (If yes)</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td><label>Past history of similar event</label></td>
                              <td>
                                  <?= $this->Form->control('past_history', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('past_history_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Adverse event after previous vaccination(s)</label></td>
                              <td>
                                  <?= $this->Form->control('adverse_event', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('adverse_event_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>History of allergy to vaccine, drug or food</label></td>
                              <td>
                                  <?= $this->Form->control('allergy_history', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('allergy_history_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Pre-existing illness (30 days) / congenital disorder</label></td>
                              <td>
                                  <?= $this->Form->control('existing_illness', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('existing_illness_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>History of hospitalization in last 30 days, with cause</label></td>
                              <td>
                                  <?= $this->Form->control('hospitalization_history', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('hospitalization_history_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Was patient on medication at time of vaccination?
(If yes, name the drug, indication, doses & treatment dates)</label></td>
                              <td>
                                  <?= $this->Form->control('medication_vaccination', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('medication_vaccination_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Did patient consult faith healers before/after vaccination?
*specify</label></td>
                              <td>
                                  <?= $this->Form->control('faith_healers', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('faith_healers_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Family history of any disease (relevant to AEFI) or allergy</label></td>
                              <td>
                                  <?= $this->Form->control('family_history', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('family_history_remarks', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
                <p>For Adult Women:</p>
                <div class="row">
                  <div class="col-xs-8">
                      <?= $this->Form->control('pregnant', [ 
                         'type' => 'textarea', 'label' => 'Currently pregnant?', 
                                                  'options' => ['Yes' => 'Yes', 'No' => 'No']]); ?>
                  </div>
                  <div class="col-xs-4">
                      <?= $this->Form->control('pregnant_weeks', [
                         'type' => 'textarea', 'label' => 'Weeks',]); ?>
                  </div>
              </div>
            </div>
            <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-12">
                      <?= $this->Form->control('breastfeeding', [ 
                         'type' => 'textarea', 'label' => 'Currently breastfeeding?', 
                                                  'options' => ['Yes' => 'Yes', 'No' => 'No',]]); ?>
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
                <p>For Infants:</p>
                <div class="row">
                  <div class="col-xs-8">
                      <?= $this->Form->control('infant', [ 
                         'type' => 'textarea', 'label' => 'The birth was:', 
                                                  'options' => ['full-term' => 'full-term', 'pre-term' => 'pre-term', 'post-term' => 'post-term']]); ?>
                  </div>
                  <div class="col-xs-4">
                      <?= $this->Form->control('birth_weight', [
                         'type' => 'textarea', 'label' => 'Birth Weight',]); ?>
                  </div>
              </div>
            </div>
            <div class="col-xs-4">
                
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
                      <?= $this->Form->control('delivery_procedure', [ 
                         'type' => 'textarea', 'label' => 'Delivery procedure was:', 
                                                  'options' => ['Normal' => 'Normal', 'Caesarean' => 'Caesarean', 'Assisted (forceps, vacuum etc.)' => 'Assisted (forceps, vacuum etc.)', 'with complication' => 'with complication']]); ?>
                  
            </div>
            <div class="col-xs-4">
                      <?= $this->Form->control('delivery_procedure_specify', [
                         'type' => 'textarea', 'label' => 'If complication, specify',]); ?> 
            </div>
          </div>

          <h4>Section C                           Details of first examination** of serious AEFI case</h4>
          <p>Source of information:</p>
          <div class="row">
              <div class="col-xs-6">
                
                  <?php
                    echo $this->Form->control('source_examination', [ 'type' => 'textarea', 'label' => 'Examination by the investigator', ]);
                    echo $this->Form->control('source_verbal', [ 'type' => 'textarea', 'label' => 'Verbal autopsy', ]);
                    echo $this->Form->control('verbal_source', [
                         'type' => 'textarea', 'label' => 'If verbal autopsy, please mention the source',]);
                    
                  ?>
              </div>
              <div class="col-xs-6">
                  <?php
                    echo $this->Form->control('source_documents', [ 'type' => 'textarea', 'label' => 'Documents', ]);
                    echo $this->Form->control('source_other', [ 'type' => 'textarea', 'label' => 'Other', ]);
                    echo $this->Form->control('source_other_specify', [
                         'type' => 'textarea', 'label' => 'If other, specify',]);
                  ?>
              </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
                <?php 
                    echo $this->Form->control('examiner_name', [
                         'type' => 'textarea', 'label' => 'Name of the person who first examined/treated the patient:',]);

                    echo $this->Form->control('other_sources', [
                         'type' => 'textarea', 'label' => 'Other sources who provided information (specify):',]);
                    echo $this->Form->control('signs_symptoms', [
                         'type' => 'textarea', 'label' => 'Signs and symptoms in chronological order from the time of vaccination:',]);
                ?>
            </div>
          </div>

          <div class="row">
              <div class="col-xs-4">
                  <?php
                    echo $this->Form->control('person_details', [
                         'type' => 'textarea', 'label' => 'Name and contact information of person completing these clinical details:',]);
                  ?>
              </div>
              <div class="col-xs-4">
                  <?php
                    echo $this->Form->control('person_designation', [
                         'type' => 'textarea', 'label' => 'Designation',]);
                  ?>
              </div>
              <div class="col-xs-4">
                  <?php
                    echo $this->Form->control('person_date', [ 'type' => 'textarea', 'label' => 'Date/time',]);
                  ?>
              </div>
          </div>

          <h4><strong>**Instructions – Attach copies of ALL available documents (including case sheet, discharge summary, case notes, laboratory reports and autopsy reports) and then complete additional information NOT AVAILABLE in existing documents, i.e.</strong> <br>
            <ul>
                <li><strong>If patient has received medical care </strong>– attach copies of all available documents (including case sheet, discharge summary, laboratory reports and autopsy reports, if available) and write only the information that is not available in the attached documents below
                </li>
                <div class="row">
                    <div class="col-xs-12"><?php echo $this->Form->control('medical_care', ['type' => 'textarea', 'label' => false]);?></div>
                  </div>
                <li>
                <strong>If patient has not received medical care </strong> – obtain history, examine the patient and write down your findings below (add additional sheets if necessary)
                </li>
                <div class="row">
                  <div class="col-xs-12"><?php echo $this->Form->control('not_medical_care', ['type' => 'textarea', 'label' => false]);?></div>
                </div>
            </ul>
            </h4>
          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments');?></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php echo $this->Form->control('final_diagnosis', ['type' => 'textarea', 'label' => 'Provisional / Final diagnosis:']);?>
            </div>
          </div>

        <h4>Section D              Details of vaccines provided at the site linked to AEFI on the corresponding day 
        </h4>
        <div class="col-xs-12"><?php echo $this->element('multi/saefi_list_of_vaccines');?></div>

        <div class="row">
            <div class="col-xs-12">
                <p>a) When was the patient vaccinated:</p>
                <?= $this->Form->control('when_vaccinated', [ 
                         'type' => 'textarea', 'label' => false, 
                                                  'options' => ['Within the first vaccinations of the session' => 'Within the first vaccinations of the session', 'Within the last vaccinations of the session' => 'Within the last vaccinations of the session']]); ?>
                <p>In case of multidose vials, was the vaccine given</p>
                <?= $this->Form->control('when_vaccinated', [ 
                         'type' => 'textarea', 'label' => false, 
                                                  'options' => ['within the first few doses of the vial administered' => 'within the first few doses of the vial administered', 'within the last doses of the vial administered' => 'within the last doses of the vial administered', 'Unknown' => 'Unknown']]); ?>
                <?php echo $this->Form->control('when_vaccinated_specify', ['type' => 'textarea', 'label' => 'Specify:']);?>
            </div>
        </div>

        <div class="row">
              <div class="col-xs-12">
                  <table class="table table-bordered table-condensed">
                      <tbody>
                          <tr>
                              <td><label>b) Was there an error in prescribing or non-adherence to recommendations for use of this vaccine?</label></td>
                              <td>
                                  <?= $this->Form->control('prescribing_error', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('prescribing_error_specify', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>c) Based on your investigation, do you feel that the vaccine (ingredients) administered could have been unsterile?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccine_unsterile', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_unsterile_specify', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>d) Based on your investigation, do you feel that the vaccine's physical condition (e.g. colour, turbidity, foreign substances etc.) was abnormal at the time of administration?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccine_condition', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_condition_specify', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>e) Based on your investigation, do you feel that there was an error in vaccine reconstitution/preparation by the vaccinator (e.g. wrong product, wrong diluent, improper mixing, improper syringe filling etc.)?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccine_reconstitution', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_reconstitution_specify', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>f) Based on your investigation, do you feel that there was an error in vaccine handling (e.g. cold chain failure during transport, storage and/or immunization session etc.)?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccine_handling', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_handling_specify', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>g) Based on your investigation, do you feel that the vaccine was administered incorrectly (e.g. wrong dose, site or route of administration, wrong needle size, not following good injection practice etc.)?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccine_administered', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_administered_specify', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>h) Number vaccinated from the concerned vaccine vial/ampoule </label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_vial', [
                     'type' => 'textarea', 'label' => false, 
                     ]); ?>
                              </td>
                              <td>
                                  
                              </td>
                          </tr>
                          <tr>
                              <td><label>i) Number vaccinated with the concerned vaccine in the same session</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_session', [
                     'type' => 'textarea', 'label' => false, 
                     ]); ?>
                              </td>
                              <td>
                                  
                              </td>
                          </tr>
                          <tr>
                              <td><label>j) Number vaccinated with the concerned vaccine having the same batch number in other locations. Specify locations: </label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_locations', [
                     'type' => 'textarea', 'label' => false, 
                     ]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccinated_locations_specify', ['type' => 'textarea', 'label' => false]); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>k) Is this case a part of a cluster?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_cluster', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                          <tr>
                              <td><label>i. If yes, how many other cases have been detected in the cluster?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_cluster_number', [
                     'type' => 'textarea', 'label' => false,
                     ]); ?>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                          <tr>
                              <td><label>a. Did all the cases in the cluster receive vaccine from the same vial?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_cluster_vial', [ 
                     'type' => 'textarea', 'label' => false, 
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                          <tr>
                              <td><label>b. If no, number of vials used in the cluster (enter details separately)</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_cluster_vial_number', [
                     'type' => 'textarea', 'label' => false, 
                     ]); ?>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>

        <h4>
            Section E        Immunization practices at the place(s) where concerned vaccine was used <br>
            <small>(Complete this section by asking and/or observing practice)</small>
        </h4>
        <p><strong>Syringes and needles used:</strong></p>
        <div class="row">
            <div class="col-xs-6">
                      <?= $this->Form->control('syringes_used', [ 
                         'type' => 'textarea', 'label' => 'Are AD syringes used for immunization?', 
                                                  'options' => ['Yes' => 'Yes', 'No' => 'No']]); ?>
                  
            </div>
            <div class="col-xs-6">
                <?= $this->Form->control('syringes_used_specify', [ 
                    'type' => 'textarea', 'label' => 'If no, specify the type of syringes used:', 
                                                  'options' => ['Glass' => 'Glass', 'Disposable' => 'Disposable', 'Recycled disposable' => 'Recycled disposable', 'Other' => 'Other']]); ?>
                <?= $this->Form->control('syringes_used_other', ['type' => 'textarea', 'label' => 'If other, specify']); ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">                
                <?php echo $this->Form->control('syringes_used_findings', ['type' => 'textarea', 'label' => 'Specific key findings/additional observations and comments:']);?>
            </div>
          </div>

          <p><strong>Reconstitution: (complete only if applicable, NA if not applicable)</strong></p>
          <p>Reconstitution procedure :</p>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('reconstitution_multiple', [ 
                     'type' => 'textarea', 'label' => 'Same reconstitution syringe used for multiple vials of same vaccine?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('reconstitution_different', [ 
                     'type' => 'textarea', 'label' => 'Same reconstitution syringe used for reconstituting different vaccines?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('reconstitution_vial', [ 
                     'type' => 'textarea', 'label' => 'Separate reconstitution syringe for each vaccine vial?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('reconstitution_syringe', [ 
                     'type' => 'textarea', 'label' => 'Separate reconstitution syringe for each vaccination?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('reconstitution_vaccines', [ 
                     'type' => 'textarea', 'label' => 'Are the vaccines and diluents used the same as those recommended by the manufacturer?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('reconstitution_observations', ['type' => 'textarea', 'label' => 'Specific key findings/additional observations and comments:']);
              ?>
            </div>
          </div>

        <h4> Section F                                       Cold chain and transport <br>
            <small>(Complete this section by asking and/or observing practice)</small></h4>
        <p><strong>Last vaccine storage point:</strong></p>
        <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('cold_temperature', [ 
                     'type' => 'textarea', 'label' => 'Is the temperature of the vaccine storage refrigerator monitored?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('cold_temperature_deviation', [ 
                     'type' => 'textarea', 'label' => 'If “yes”, was there any deviation outside of 2-8° C after the vaccine was placed inside?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('cold_temperature_specify', ['type' => 'textarea', 'label' => 'If “yes”, provide details of monitoring separately.']);
                  echo $this->Form->control('procedure_followed', [ 
                     'type' => 'textarea', 'label' => 'Was the correct procedure for storing vaccines, diluents and syringes followed?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('other_items', [ 
                     'type' => 'textarea', 'label' => 'Was any other item (other than EPI vaccines and diluents) in the refrigerator or freezer?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('partial_vaccines', [ 
                     'type' => 'textarea', 'label' => 'Were any partially used reconstituted vaccines in the refrigerator?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('unusable_vaccines', [ 
                     'type' => 'textarea', 'label' => 'Were any unusable vaccines (expired, no label, VVM at stages 3 or 4, frozen) in the refrigerator?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('unusable_diluents', [ 
                     'type' => 'textarea', 'label' => 'Were any unusable diluents (expired, manufacturer not matched, cracked, dirty ampoule) in the store?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);

                  echo $this->Form->control('additional_observations', ['type' => 'textarea', 'label' => 'Specific key findings/additional observations and comments:']);
              ?>
              <p><strong>Vaccine transportation from the refrigerator to the vaccination centre:</strong></p>
              <?php 
                  echo $this->Form->control('cold_transportation', [ 
                     'type' => 'textarea', 'label' => 'Was cold chain properly maintained during transportation?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('vaccine_carrier', [ 
                     'type' => 'textarea', 'label' => 'Was the vaccine carrier sent to the site on the same day as vaccination?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('coolant_packs', [ 
                     'type' => 'textarea', 'label' => 'Were conditioned coolant-packs used?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);

                  echo $this->Form->control('transport_findings', ['type' => 'textarea', 'label' => 'Specific key findings/additional observations and comments:']);
              ?>
            </div>
          </div>

        <h4>Section G       Community investigation (Please visit locality and interview parents/others)</h4>
        <div class="row">
            <div class="col-xs-12">
                <?php
                  echo $this->Form->control('similar_events', [ 
                     'type' => 'textarea', 'label' => 'Were any similar events reported within a time period similar to when the adverse event occurred and in the same locality?', 'escape' => false,
                                          'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);

                  echo $this->Form->control('similar_events_describe', ['type' => 'textarea', 'label' => 'If yes, describe:']);
                  echo $this->Form->control('similar_events_episodes', ['type' => 'textarea', 'label' => 'If yes, how many events/episodes?']);

                  echo '<p>Of those affected, how many are:</p>';
                  echo $this->Form->control('affected_vaccinated', ['type' => 'textarea', 'label' => 'Vaccinated:']);
                  echo $this->Form->control('affected_not_vaccinated', ['type' => 'textarea', 'label' => 'Not Vaccinated:']);
                  echo $this->Form->control('affected_unknown', ['type' => 'textarea', 'label' => 'Unknown:']);

                  echo $this->Form->control('community_comments', ['type' => 'textarea', 'label' => 'Other comments:']);
                ?>
            </div>
        </div>

        <h4>Section H       Other relevant findings/observations/comments</h4>
        <?php
            echo $this->Form->control('relevant_findings', ['type' => 'textarea', 'label' => false]);
        ?>
        

      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
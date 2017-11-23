<div class="container">
  <div class="row">
    <div class="col-xs-12"><h3 class="text-center">
      <span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>SERIOUS ADVERSE EVENT REPORTING FORM </h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ZIMBABWE REPORTING FORM FOR ADVERSE EVENTS FOLLOWING IMMUNIZATION (AEFI) </h5></div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-xs-12">
      <?= $this->Form->create($adr, ['type' => 'file']) ?>
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= $adr->reference_number ?></strong></h5></div>          
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('mrcz_protocol_number', ['type' => 'textarea', 'label' => 'MRCZ Protocol # <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('mcaz_protocol_number', ['type' => 'textarea', 'label' => 'MCAZ Protocol # <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('principal_investigator', ['type' => 'textarea', 'label' => 'Principal Investigator <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('reporter_name', ['type' => 'textarea', 'label' => 'Reporter Name', 'escape' => false]);

                  echo $this->Form->control('reporter_email', ['type' => 'textarea', 'label' => 'Reporter Email', 'escape' => false]);

              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('name_of_institution', 
                    ['type' => 'textarea', 'label' => ['text' => 'Clinic/Hospital Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]]);                                
                  echo $this->Form->control('institution_code', ['type' => 'textarea', 'label' => 'Clinic/Hospital Number']);

                  echo $this->Form->input('designation_id', ['type' => 'textarea', 'empty' => true]);

                  echo $this->Form->control('reporter_phone', ['type' => 'textarea', 'label' => 'Reporter Phone ', 'escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('study_title', ['type' => 'textarea', 'label' => 'Study Title', 'escape' => false]);

                  echo $this->Form->control('date_of_adverse_event', ['type' => 'textarea', 'label' => 'Date of Adverse Event', 'escape' => false, ]);

                  echo $this->Form->control('participant_number', ['type' => 'textarea', 'label' => 'Participant ID', 'escape' => false]);

                  echo $this->Form->control('report_type', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => '<b>Type of Report <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Initial' => 'Initial', 'Follow-up' => 'Follow-up', 'Resolution' => 'Resolution']]);
                  
              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('study_sponsor', 
                    ['type' => 'textarea', 'label' => ['text' => 'Study Sponsor', 'escape' => false]]);                                
                  echo $this->Form->control('date_of_site_awareness', ['type' => 'textarea', 'label' => 'Date of site Awareness', ]);

                  echo $this->Form->control('date_of_birth', array(
                    'type' => 'date',
                    'type' => 'textarea', 'label' => 'Date of Birth',
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
                  echo $this->Form->control('gender', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => '<b>Gender <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Male' => 'Male', 'Female' => 'Female']]);
                  echo $this->Form->control('study_week', 
                    ['type' => 'textarea', 'label' => ['text' => 'Study Week', 'escape' => false]]);
                  echo $this->Form->control('visit_number', 
                    ['type' => 'textarea', 'label' => ['text' => 'Visit number', 'escape' => false]]);

              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('adverse_event_type', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'What type of adverse event is this?', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['AE' => 'AE', 'SAE' => 'SAE', 'Death' => 'Death']]);

                  // echo $this->Form->control('sae_type', 
                  //   ['type' => 'textarea', 'label' => ['text' => 'If SAE, is it 1. Fatal, 2. Life', 'escape' => false]]);

                  echo $this->Form->control('sae_type', ['type' => 'textarea', 'label' => 'If SAE, is it',  'options' => ['Fatal' => 'Fatal', 'Seizures' => 'Seizures', 'Life-threatening (an actual risk of death at the time of the event).' => 'Life-threatening (an actual risk of death at the time of the event).', 'Caused or prolonged hospitalization (non-elective).' => 'Caused or prolonged hospitalization (non-elective).', 'Resulted in persistent or significant disability or incapacity.' => 'Resulted in persistent or significant disability or incapacity.', 'Any other important medical event.' => 'Any other important medical event.'], 'empty' => true]);
                  echo $this->Form->control('sae_description', ['type' => 'textarea', 'label' => 'If Other, specify', 'escape' => false]);

              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                                                  
                  // echo $this->Form->control('toxicity_grade', ['type' => 'radio','type' => 'textarea', 'label' => 'Toxicity Grade:', 
                  //     'options' => ['Grade 1' => 'Grade 1', 'Grade 2' => 'Grade 2', 'Grade 3' => 'Grade 3', 'Grade 4' => 'Grade 4', 'Grade 5' => 'Grade 5']]);
                  echo $this->Form->control('toxicity_grade', ['type' => 'radio', 'type' => 'textarea', 'label' => 'Toxicity Grade', 
                    // 'templates' => 'radio_form',
                    'options' => ['Grade 1' => 'Grade 1', 'Grade 2' => 'Grade 2', 'Grade 3' => 'Grade 3', 'Grade 4' => 'Grade 4', 'Grade 5' => 'Grade 5'],
                    'templates' => [
      'nestingLabel' => '<div class="col-sm-offset-4 radio">{{hidden}}<label  {{attrs}}>{{input}}{{text}}</label></div>',
                    ]
                  ]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-9">
              <?php
                  echo $this->Form->control('previous_events', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'Any previous Adverse Events report on this participant?', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No']]);

              ?>            
            </div>
            <div class="col-xs-3">
              <?php
                  echo $this->Form->control('previous_events_number', ['type' => 'textarea', 'label' => 'If yes, how many?', 'escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('total_saes', ['type' => 'textarea', 'label' => 'Total Number of SAEs to date for the whole study', 'escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('location_event', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'Location of the current Adverse Event', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Home' => 'Home', 'Clinic/Hospital' => 'Clinic/Hospital', 'Work' => 'Work', 'Study site' => 'Study site', 'Other, specify' => 'Other, specify']]);

                  echo $this->Form->control('location_event_specify', ['type' => 'textarea', 'label' => 'If Other, specify', 'escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('research_involves', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'Research involves', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Drug' => 'Drug', 'Device' => 'Device', 'Procedure' => 'Procedure', 'Vaccine' => 'Vaccine', 'Other, specify' => 'Other, specify']]);
                  echo $this->Form->control('research_involves_specify', ['type' => 'textarea', 'label' => 'if other, specify', 'escape' => false]);
              ?>
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('name_of_drug', ['type' => 'textarea', 'label' => 'Name of Drug, Device or Procedure', 'escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('drug_investigational', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'Is the drug/device investigational', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No']]);
            ?></div>
          </div>    

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">List all study / intervention drugs being taken at the time of onset of the SAE, or within 30 days prior to onset, and describe their relationship to the SAE:</h4></div>
          </div>

          <div class="row">
        <div class="col-xs-12">
            <table id="listOfDevicesTable"  class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th colspan="2" > Drug/Device/Vaccine </th>
                    <th colspan="2" > Dose </th>
                    <th colspan="2" > Route and Frequency </th>
                    <th> Date commenced </th>
                    <th> Taking drug at onset of SAE?</th>
                    <th colspan="2"> Relationship of SAE to drug </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php
                             echo $this->Form->input('adr_list_of_drugs.0.id')  ;
                             echo $this->Form->control('adr_list_of_drugs.0.drug_name', ['label' => false,
                                  'type' => 'textarea']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.dosage', ['label' => false, 'type' => 'textarea']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.dose_id', ['label' => false, 'options' => $doses, 'type' => 'textarea', 'empty' => true]);
                        ?>
                    </td>                 
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.0.route_id', ['label' => false, 'options' => $routes, 'type' => 'textarea', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.0.frequency_id', ['label' => false, 'options' => $frequencies, 'type' => 'textarea', 'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.start_date', [
                                'type' => 'textarea',
                                'label' => false, 
                                'templates' => 'dates_form'
                                ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.taking_drug', ['type' => 'radio', 
                   'label' => false,
                   'type' => 'textarea',
                   'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.relationship_to_sae', ['label' => false, 'type' => 'select', 'options' => ['Definitely related' => 'Definitely related', 'Probably related' => 'Probably related', 'Possibly related' => 'Possibly related', 'Not related' => 'Not related', 'Pending' => 'Pending'], 'type' => 'textarea' ,'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" id="addListOfDevice">
                          <i class="fa fa-plus"></i>
                        </button>
                    </td>
                  </tr>
              
              <?php 
                //Dynamic fields
                if (!empty($adr['adr_list_of_drugs'])) {
                  for ($i = 1; $i <= count($adr['adr_list_of_drugs'])-1; $i++) { 
                    // pr($adr);
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('adr_list_of_drugs.'.$i.'.id')  ;
                             echo $this->Form->control('adr_list_of_drugs.'.$i.'.drug_name', ['label' => false,
                                  'type' => 'textarea']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.dosage', ['label' => false, 'type' => 'textarea']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.dose_id', ['label' => false, 'options' => $doses, 'type' => 'textarea', 'empty' => true]);
                        ?>
                    </td>                 
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.route_id', ['label' => false, 'options' => $routes, 'type' => 'textarea', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.frequency_id', ['label' => false, 'options' => $frequencies, 'type' => 'textarea', 'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.start_date', [
                                'type' => 'textarea',
                                'label' => false, 
                                'templates' => 'dates_form'
                                ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.taking_drug', ['type' => 'radio', 
                   'label' => false,
                   'type' => 'textarea',
                   'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.relationship_to_sae', ['label' => false, 'type' => 'select', 'options' => ['Definitely related' => 'Definitely related', 'Probably related' => 'Probably related', 'Possibly related' => 'Possibly related', 'Not related' => 'Not related', 'Pending' => 'Pending'], 'type' => 'textarea' ,'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-device"  value="<?php if (isset($adr['adr_list_of_drugs'][$i]['id'])) { echo $adr['adr_list_of_drugs'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

    <div class="row">
      <div class="col-xs-12"><?php 
        echo $this->Form->control('patient_other_drug', ['type' => 'radio', 
               'label' => 'Was the patient taking any other drug at the time of onset of the AE? ', 'escape' => false,
               'templates' => 'radio_form',
                 'options' => ['Yes' => 'Yes', 'No' => 'No']]);
      ?></div>
    </div>  
    <hr>
        
    <div class="row">
      <div class="col-xs-12"><h4>If yes, then list all concomitant medication being taken at least one month before the onset of the SAE and describe the relationship to the SAE: 
        <button type="button" class="btn btn-success" id="addAdrConcomitant">
                           <i class="fa fa-plus"></i>
                        </button>
                      </h4></div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="listOfConcomitantTable"  class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="2" style="width: 45%;"> Concomitant medication: </th>
                    <th> Date Started </th>
                    <th> Date Stopped </th>
                    <th colspan="2" style="width: 25%;"> Relationship of SAE to medication </th>
                  </tr>
                </thead>
                <tbody>                  
              <?php 
                //Dynamic fields
                if (!empty($adr['adr_other_drugs'])) {
                  for ($i = 0; $i <= count($adr['adr_other_drugs'])-1; $i++) { 
                    // pr($adr);
              ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('adr_other_drugs.'.$i.'.id')  ;
                             echo $this->Form->control('adr_other_drugs.'.$i.'.drug_name', ['label' => false,
                                  'type' => 'textarea']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_other_drugs.'.$i.'.start_date', ['label' => false, 'type' => 'textarea',
                            'templates' => 'dates_form'                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_other_drugs.'.$i.'.stop_date', ['label' => false, 'type' => 'textarea',
                            'templates' => 'dates_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_other_drugs.'.$i.'.relationship_to_sae', ['label' => false, 'type' => 'select', 'options' => ['Definitely related' => 'Definitely related', 'Probably related' => 'Probably related', 'Possibly related' => 'Possibly related', 'Not related' => 'Not related', 'Pending' => 'Pending'], 'type' => 'textarea' ,'empty' => true]);
                        ?>
                    </td>
                    <td><button type="button" class="btn btn-default remove-concomitant" value="<?php if (isset($adr['adr_other_drugs'][$i]['id'])) { echo $adr['adr_other_drugs'][$i]['id']; } ?>">
                           <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
              <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

          <div class="row">
            <p>Has the Adverse Event been reported to:      </p>
            <div class="col-xs-3"><?php 
              echo $this->Form->control('report_to_mcaz', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => '(a) MCAZ', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              echo $this->Form->control('report_to_mcaz_date', ['type' => 'textarea', 'label' => 'Date', 'escape' => false, 'templates' => ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',]]);
              ?>
            </div>
            <div class="col-xs-3"><?php 
              echo $this->Form->control('report_to_mrcz', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => '(b) MRCZ', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              echo $this->Form->control('report_to_mrcz_date', ['type' => 'textarea', 'label' => 'Date', 'escape' => false, 'templates' => ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',]]);
              ?>
            </div>
            <div class="col-xs-3"><?php 
              echo $this->Form->control('report_to_sponsor', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => '(c) Sponsor', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              echo $this->Form->control('report_to_sponsor_date', ['type' => 'textarea', 'label' => 'Date', 'escape' => false, 'templates' => ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',]]);
              ?>
            </div>
            <div class="col-xs-3"><?php 
              echo $this->Form->control('report_to_irb', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => '(d) IRB', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              echo $this->Form->control('report_to_irb_date', ['type' => 'textarea', 'label' => 'Date', 'escape' => false, 'templates' => ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',]]);
              ?>
            </div>
          </div> 

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center"> Describe the SAE with diagnosis, immediate cause or precipitating events, symptoms, any investigations, management, results and outcome (with dates where possible). Include relevant medical history. Additional narrative, photocopies of results of abnormal investigations and a hospital discharge letter may be attached:</h4></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('medical_history', ['type' => 'textarea', 'label' => 'Summary of relevant past medical history of participant', 'escape' => false]);
              ?></div>
          </div>

          <div class="row">
            <div class="col-xs-6"><?php 
              echo $this->Form->control('diagnosis', ['type' => 'textarea', 'label' => '(a) Diagnosis', 'escape' => false]);
              echo $this->Form->control('immediate_cause', ['type' => 'textarea', 'label' => '(b) Immediate Cause', 'escape' => false]);
              ?>
            </div>
            <div class="col-xs-6">
                <?php             
              echo $this->Form->control('symptoms', ['type' => 'textarea', 'label' => '(c) Symptoms', 'escape' => false]);             
              echo $this->Form->control('investigations', ['type' => 'textarea', 'label' => '(d) Investigations-Laboratory and any other significant investigations conducted', 'escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
      <div class="col-md-12">
        <h4>Add Lab test: <button type="button" class="btn btn-primary btn-sm" id="addLabTest">
                          <i class="fa fa-plus"></i>
                        </button></h4>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table id="adrLabTestsTable"  class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th> Lab test </th>
                    <th> Abnormal Result </th>
                    <th> Site Normal Range </th>
                    <th> Collection date</th>
                    <th> Lab value previous or subsequent to this event </th>
                    <th> Collection date </th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>                 
              
              <?php 
                //Dynamic fields
                if (!empty($adr['adr_lab_tests'])) {
                  for ($i = 0; $i <= count($adr['adr_lab_tests'])-1; $i++) { 
                    // pr($adr);
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('adr_lab_tests.'.$i.'.id')  ;
                             echo $this->Form->control('adr_lab_tests.'.$i.'.lab_test', ['label' => false,
                                  'type' => 'textarea']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.abnormal_result', ['label' => false, 'type' => 'textarea']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.site_normal_range', ['label' => false, 'type' => 'textarea']);
                        ?>
                    </td>                 
                    <td><?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.collection_date', ['label' => false, 'type' => 'textarea','templates' => 'dates_form']);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.lab_value', ['label' => false, 'type' => 'textarea']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.lab_value_date', [
                                'type' => 'textarea',
                                'label' => false, 
                                'templates' => 'dates_form'
                                ]);
                        ?>
                    </td>
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-lab-test"  value="<?php if (isset($adr['adr_lab_tests'][$i]['id'])) { echo $adr['adr_lab_tests'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

          <div class="row">
            <div class="col-xs-6"><?php 
              echo $this->Form->control('results', ['type' => 'textarea', 'label' => '(e) Results', 'escape' => false]);
              echo $this->Form->control('management', ['type' => 'textarea', 'label' => '(f) Management (Include management of study treatment, continued, temporarily held, reduced dose, permanent discontinuation, off Product)', 'escape' => false]);
              ?>
            </div>
            <div class="col-xs-6">
                <?php             
              echo $this->Form->control('outcome', ['type' => 'textarea', 'label' => '(g) Outcome', 'escape' => false]);             

              ?>
            </div>
          </div>

          <p><b>NB</b> If the outcome is death, please complete and attach the death form. </p>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('d1_consent_form', ['type' => 'radio', 
                      'label' => 'D1.  Was this Adverse Event originally addressed in the protocol and consent form?', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
          </div> 
          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('d2_brochure', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'D2.   Was this Adverse Event originally addressed in Investigators Brochure?', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('d3_changes_sae', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'D3.   Are changes required to the protocol as a result of this SAE? ', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('d4_consent_sae', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'D4.   Are changes required to the consent form as a result of this SAE?', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
          </div>

          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments');?></div>
          </div>
          
          <p>If changes are <b>required</b>, please attach a copy of the revised protocol/consent form with changes highlighted with a bright coloured  highlighter. </p>

          <p>If changes are <b>not required</b>, please explain as to why changes to the protocol /consent form are not necessary based on the event.   </p>
          
          <div class="row">
            <div class="col-xs-6">
                <?php             
              echo $this->Form->control('changes_explain', ['type' => 'textarea', 'label' => false, 'escape' => false]); 
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('assess_risk', ['type' => 'radio', 
                     'type' => 'textarea', 'label' => 'From the data obtained or from currently available information, do you see any need to reassess the risks and benefits to the subjects in this research.', 'escape' => false,
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              ?>
            </div>
          </div>

      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
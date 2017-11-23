<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
// pr($aefi);
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"> 
      <span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Adverse Event After Immunization (AEFI) Report Form
      </h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ZIMBABWE REPORTING FORM FOR ADVERSE EVENTS FOLLOWING IMMUNIZATION (AEFI) </h5></div>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-xs-12">
      <?= $this->Form->create($aefi, ['type' => 'file']) ?>
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= $aefi->reference_number ?></strong></h5></div>         
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php               

                  echo $this->Form->control('patient_name', ['type' => 'textarea', 'label' => 'Patient first name <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('patient_surname', ['type' => 'textarea', 'label' => 'Patient Surname <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('patient_next_of_kin', ['type' => 'textarea', 'label' => 'Patient next of Kin', 'escape' => false]);

                  echo $this->Form->control('patient_address', ['type' => 'textarea', 'label' => 'Patient\'s physical address <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('patient_telephone', ['type' => 'textarea', 'label' => 'Patient\'s telephone', 'escape' => false]);
                  echo $this->Form->control('gender', [ 
                     'type' => 'textarea', 'label' => 'Gender <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
                     
                     'options' => ['Male' => 'Male', 'Female' => 'Female']]);

                  echo $this->Form->control('date_of_birth', array(
                     'escape' => false,
                    'type' => 'textarea', 'label' => 'Date of Birth <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              
                  // echo $this->Form->control('age_at_onset', ['type' => 'textarea', 'label' => 'OR Age at onset:', 'escape' => false]);
                  echo $this->Form->control('age_at_onset', [ 
                     'type' => 'textarea', 'label' => 'OR Age at onset:', 'escape' => false,
                     
                     'options' => ['Years' => 'Years', 'Months' => 'Months', 'Days' => 'Days']]);
                  echo $this->Form->control('age_at_onset_specify', ['type' => 'textarea', 'label' => false, 'escape' => false]);
                  
              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('reporter_name', ['type' => 'textarea', 'label' => 'Reporter\'s name']);
                  echo $this->Form->input('designation_id', ['type' => 'textarea', 'empty' => true]);
                  echo $this->Form->control('reporter_department', ['type' => 'textarea', 'label' => 'Department']);
                  echo $this->Form->control('reporter_address', ['type' => 'textarea', 'label' => 'Address']);
                  echo $this->Form->control('reporter_district', ['type' => 'textarea', 'label' => 'District']);
                  echo $this->Form->control('reporter_province', ['type' => 'textarea', 'label' => 'Province']);
                  echo $this->Form->control('reporter_phone', ['type' => 'textarea', 'label' => 'Reporter phone']);
                  echo $this->Form->control('reporter_email', ['type' => 'textarea', 'label' => 'Reporter email']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('name_of_vaccination_center', ['type' => 'textarea', 'label' => 'Name of vaccination center']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/list_of_vaccines');?></div>
          </div>

          <div class="row">
            <div class="col-xs-3">
              <h4>Adverse Event(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span>:</h4>
              <?php
                  // echo $this->Form->control('adverse_events', ['type' => 'textarea', 'label' => 'Adverse event(s):', 'type' => 'select', 'multiple' => true, 'options' => ['Severe local reaction' => 'Severe local reaction', 'Seizures' => 'Seizures', 'Abscess' => 'Abscess']]);
                  echo $this->Form->control('ae_severe_local_reaction', ['type' => 'textarea', 'label' => 'Severe local reaction',]);
                  echo $this->Form->control('ae_seizures', ['type' => 'textarea', 'label' => 'Seizures', ]);
                  echo $this->Form->control('ae_abscess', ['type' => 'textarea', 'label' => 'Abscess', ]);
                  echo $this->Form->control('ae_sepsis', ['type' => 'textarea', 'label' => 'Sepsis', ]);
                  echo $this->Form->control('ae_encephalopathy', ['type' => 'textarea', 'label' => 'Encephalopathy', ]);
                  echo $this->Form->control('ae_toxic_shock', ['type' => 'textarea', 'label' => 'Toxic shock syndrome', ]);
                  echo $this->Form->control('ae_thrombocytopenia', ['type' => 'textarea', 'label' => 'Thrombocytopenia', ]);
                                  
              ?>
            </div>
            <div class="col-xs-3">
              <br><br>
              <?php
                  echo $this->Form->control('ae_anaphylaxis', ['type' => 'textarea', 'label' => 'Anaphylaxis', ]);
                  echo $this->Form->control('ae_fever', ['type' => 'textarea', 'label' => 'Fever≥38°C', ]);
                  echo $this->Form->control('ae_3days', ['type' => 'textarea', 'label' => '>3 days', ]);
                  echo $this->Form->control('ae_febrile', ['type' => 'textarea', 'label' => 'febrile', ]);
                  echo $this->Form->control('ae_beyond_joint', ['type' => 'textarea', 'label' => 'beyond nearest joint', ]);
                  echo $this->Form->control('ae_afebrile', ['type' => 'textarea', 'label' => 'afebrile', ]);
                  
              ?>
            </div>
            <div class="col-xs-3">
              <br><br>
              <?php 
                  echo $this->Form->control('ae_other', ['type' => 'textarea', 'label' => 'Other (specify)'
                  ]);
                  echo $this->Form->control('adverse_events_specify', ['type' => 'textarea', 'label' => 'If other, specify',  
                    ]);

                  echo $this->Form->control('aefi_date', ['type' => 'textarea', 'label' => 'Date & Time AEFI started', ]);
                  echo $this->Form->control('notification_date', ['type' => 'textarea', 'label' => 'Date patient notified event to health system', ]);
              ?>
            </div>
            <div class="col-xs-3">
              <br><br><br>
              <?php
                  //echo $this->Form->control('description_of_reaction', ['type' => 'textarea', 'label' => 'Describe AEFI (Signs and symptoms):']);
                  echo $this->Form->control('description_of_reaction', ['type' => 'textarea', 'label' => 'Describe AEFI (Signs and symptoms)',  
                    ]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('treatment_provided', [ 
                     'type' => 'textarea', 'label' => 'Treatment provided', 'escape' => false,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('serious', [ 
                     'type' => 'textarea', 'label' => 'Serious?', 'escape' => false,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('serious_yes', [ 
                     'type' => 'textarea', 'label' => 'If yes,', 'escape' => false,
                     'options' => ['Death' => 'Death', 'Life threatening' => 'Life threatening', 'Disability' => 'Disability', 'Hospitalization' => 'Hospitalization', 'Congenital anomaly' => 'Congenital anomaly']]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('outcome', ['type' => 'select', 'empty' => true, 
                     'type' => 'textarea', 'label' => 'Outcome', 'escape' => false,
                     'options' => ['Recovering' => 'Recovering', 'Recovered' => 'Recovered', 'Recovered with sequelae' => 'Recovered with sequelae', 'Not Recovered' => 'Not Recovered', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('died_date', ['type' => 'textarea', 'label' => 'If died, date of death']);
                  echo $this->Form->control('autopsy', [  
                     'type' => 'textarea', 'label' => 'Autopsy done', 'escape' => false,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('past_medical_history', ['type' => 'textarea', 'label' => 'Past medical history (including history of similar reaction or other allergies), concomitant medication and other relevant information 
  (e.g. other cases).']);
              ?>
            </div>
          </div>

          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments');?></div>
          </div>
          
          <p>First decision making level to complete (District level):</p>
          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('district_receive_date', ['type' => 'textarea', 'label' => 'Date report received at district level']);
              ?>
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('investigation_needed', [  
                     'type' => 'textarea', 'label' => 'Investigation needed', 'escape' => false,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('investigation_date', ['type' => 'textarea', 'label' => 'If yes, date investigation planned']);
              ?>
            </div>
          </div>

          <p>National level top complete:</p>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('national_receive_date', ['type' => 'textarea', 'label' => 'Date report received at national level']);
              ?>
            </div>
          </div>

          <p>Comments:</p>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('comments', ['type' => 'textarea', 'label' => false]);
              ?>
            </div>          
          </div>

      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
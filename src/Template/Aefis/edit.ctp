<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
// pr($aefi);
$this->Html->script('aefi_edit', ['block' => true]);
?>
<div class="row">
  <div class="col-md-12"><h3 class="text-center">Adverse Event After Immunization (AEFI) Report Form</h3>  
    <div class="row">
      <div class="col-md-12"><h5 class="text-center">ZIMBABWE REPORTING FORM FOR ADVERSE EVENTS FOLLOWING IMMUNIZATION (AEFI) </h5></div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <?= $this->Form->create($aefi, ['type' => 'file']) ?>
        <div class="row">
          <div class="col-md-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= $aefi->reference_number ?></strong></h5></div>         
          <?php 
          // echo $this->Form->control('aefi_list_of_vaccines.0.vaccination_date', [
          //         'label' => 'vaccination_date:',
          //         'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}} {{hour}}{{minute}}{{second}}{{meridian}}</div>',
          //                         'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
          //         'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,                
          //                       ]);
                                ?> 
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php               

                echo $this->Form->control('patient_name', ['label' => 'Patient first name: <span class="sterix">*</span>', 'escape' => false]);

                echo $this->Form->control('patient_surname', ['label' => 'Patient Surname: <span class="sterix">*</span>', 'escape' => false]);

                echo $this->Form->control('patient_next_of_kin', ['label' => 'Patient next of Kin: <span class="sterix">*</span>', 'escape' => false]);

                echo $this->Form->control('patient_address', ['label' => 'Patient\'s physical address: ', 'escape' => false]);

                echo $this->Form->control('patient_telephone', ['label' => 'Patient\'s telephone: ', 'escape' => false]);
                echo $this->Form->control('gender', ['type' => 'radio', 
                   'label' => 'Gender: <span class="sterix">*</span>', 'escape' => false,
                   'templates' => 'radio_form',
                   'options' => ['Male' => 'Male', 'Female' => 'Female']]);

                echo $this->Form->control('date_of_birth', array(
                  'type' => 'date',
                  'label' => 'Date of Birth:',
                  'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                  'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                  'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                ));
            
                // echo $this->Form->control('age_at_onset', ['label' => 'OR Age at onset:', 'escape' => false]);
                echo $this->Form->control('age_at_onset', ['type' => 'radio', 
                   'label' => 'OR Age at onset:', 'escape' => false,
                   'templates' => 'radio_form',
                   'options' => ['Years' => 'Years', 'Months' => 'Months', 'Days' => 'Days']]);
                echo $this->Form->control('age_at_onset_specify', ['label' => false, 'escape' => false]);
                
            ?>            
          </div>
          <div class="col-md-6">
            <?php
                echo $this->Form->control('reporter_name', ['label' => 'Reporter\'s name']);
                echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);
                echo $this->Form->control('reporter_department', ['label' => 'Department']);
                echo $this->Form->control('reporter_address', ['label' => 'Address:']);
                echo $this->Form->control('reporter_district', ['label' => 'District:']);
                echo $this->Form->control('reporter_province', ['label' => 'Province:']);
                echo $this->Form->control('reporter_phone', ['label' => 'Reporter phone']);
                echo $this->Form->control('reporter_email', ['label' => 'Reporter email']);
            ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <?php
                echo $this->Form->control('name_of_vaccination_center', ['label' => 'Name of vaccination center']);
            ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><?php echo $this->element('multi/list_of_vaccines');?></div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <h4>Adverse Event(s) <span class="sterix">*</span>:</h4>
            <?php
                // echo $this->Form->control('adverse_events', ['label' => 'Adverse event(s):', 'type' => 'select', 'multiple' => true, 'options' => ['Severe local reaction' => 'Severe local reaction', 'Seizures' => 'Seizures', 'Abscess' => 'Abscess']]);
                echo $this->Form->control('ae_severe_local_reaction', ['type' => 'checkbox', 'label' => 'Severe local reaction', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_seizures', ['type' => 'checkbox', 'label' => 'Seizures', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_abscess', ['type' => 'checkbox', 'label' => 'Abscess', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_sepsis', ['type' => 'checkbox', 'label' => 'Sepsis', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_encephalopathy', ['type' => 'checkbox', 'label' => 'Encephalopathy', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_toxic_shock', ['type' => 'checkbox', 'label' => 'Toxic shock syndrome', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_thrombocytopenia', ['type' => 'checkbox', 'label' => 'Thrombocytopenia', 'templates' => 'checkbox_form']);
                                
            ?>
          </div>
          <div class="col-md-3">
            <br><br>
            <?php
                echo $this->Form->control('ae_anaphylaxis', ['type' => 'checkbox', 'label' => 'Anaphylaxis', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_fever', ['type' => 'checkbox', 'label' => 'Fever≥38°C', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_3days', ['type' => 'checkbox', 'label' => '>3 days', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_febrile', ['type' => 'checkbox', 'label' => 'febrile', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_beyond_joint', ['type' => 'checkbox', 'label' => 'beyond nearest joint', 'templates' => 'checkbox_form']);
                echo $this->Form->control('ae_afebrile', ['type' => 'checkbox', 'label' => 'afebrile', 'templates' => 'checkbox_form']);
                
            ?>
          </div>
          <div class="col-md-3">
            <br><br>
            <?php 
                echo $this->Form->control('ae_other', ['type' => 'checkbox', 'label' => 'Other (specify):', 
                  //'templates' => 'checkbox_form'
                  'templates' => [
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'inputContainer' => '<div class="form-group"><div class=" {{required}}"><div class="checkbox">{{content}}</div></div></div>',
                  ]
                ]);
                echo $this->Form->control('adverse_events_specify', ['label' => 'If other, specify:',  
                  'templates' =>[ 
                    'label' => '<label {{attrs}}>{{text}}</label>',
                    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                    'textarea' => '<textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea>',]]);

                echo $this->Form->control('aefi_date', ['label' => 'Date & Time AEFI started:', 'type' => 'text',                   
                  'templates' =>[    
                    'label' => '<label {{attrs}}>{{text}}</label>',
                    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>']]);
                echo $this->Form->control('notification_date', ['label' => 'Date patient notified event to health system:', 'type' => 'text',
                  'templates' =>[    
                    'label' => '<label {{attrs}}>{{text}}</label>',
                    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>']]);
            ?>
          </div>
          <div class="col-md-3">
            <br><br><br>
            <?php
                //echo $this->Form->control('description_of_reaction', ['label' => 'Describe AEFI (Signs and symptoms):']);
                echo $this->Form->control('description_of_reaction', ['label' => 'Describe AEFI (Signs and symptoms):',  
                  'templates' =>[ 
                    'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                    'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="7" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);
            ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <?php
                echo $this->Form->control('treatment_provided', ['type' => 'radio', 
                   'label' => 'Treatment provided:', 'escape' => false,
                   'templates' => 'radio_form',
                   'options' => ['Yes' => 'Yes', 'No' => 'No']]);
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php
                echo $this->Form->control('serious', ['type' => 'radio', 
                   'label' => 'Serious?:', 'escape' => false,
                   'templates' => 'radio_form',
                   'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                echo $this->Form->control('serious_yes', ['type' => 'radio', 
                   'label' => 'If yes,:', 'escape' => false,
                   'templates' => 'radio_form',
                   'options' => ['Death' => 'Death', 'Life threatening' => 'Life threatening', 'Disability' => 'Disability', 'Hospitalization' => 'Hospitalization', 'Congenital anomaly' => 'Congenital anomaly']]);
            ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <?php
                echo $this->Form->control('outcome', ['type' => 'select', 'empty' => true, 
                   'label' => 'Outcome:', 'escape' => false,
                   //'templates' => 'radio_form',
                   'options' => ['Recovering' => 'Recovering', 'Recovered' => 'Recovered', 'Recovered with sequelae' => 'Recovered with sequelae', 'Not Recovered' => 'Not Recovered', 'Unknown' => 'Unknown']]);
                echo $this->Form->control('died_date', ['label' => 'If died, date of death:', 'type' => 'text']);
                echo $this->Form->control('autopsy', ['type' => 'radio',  
                   'label' => 'Autopsy done:', 'escape' => false,
                   'templates' => 'radio_form',
                   'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
            ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <?php
                echo $this->Form->control('past_medical_history', ['label' => 'Past medical history (including history of similar reaction or other allergies), concomitant medication and other relevant information 
(e.g. other cases).']);
            ?>
          </div>
        </div>

        <!-- <p>Attachments!!</p> -->
        <div class="row">
          <div class="col-md-12"><?php echo $this->element('multi/attachments');?></div>
        </div>
        
        <p>First decision making level to complete (District level):</p>
        <div class="row">
          <div class="col-md-6">
            <?php
                echo $this->Form->control('district_receive_date', ['label' => 'Date report received at district level:', 'type' => 'text']);
            ?>
          </div>
          <div class="col-md-6">
            <?php
                echo $this->Form->control('investigation_needed', ['type' => 'radio',  
                   'label' => 'Investigation needed:', 'escape' => false,
                   'templates' => 'radio_form',
                   'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                echo $this->Form->control('investigation_date', ['label' => 'If yes, date investigation planned:', 'type' => 'text']);
            ?>
          </div>
        </div>

        <p>National level top complete:</p>
        <div class="row">
          <div class="col-md-12">
            <?php
                echo $this->Form->control('national_receive_date', ['label' => 'Date report received at national level:', 'type' => 'text']);
            ?>
          </div>
        </div>

        <p>Comments:</p>
        <div class="row">
          <div class="col-md-12">
            <?php
                echo $this->Form->control('comments', ['label' => false]);
            ?>
          </div>          
        </div>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
  </div>
</div>

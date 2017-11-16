<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
// debug($sadr);
// debug($this->request->data);
?>
<div class="sadr_form">
  <div class="row">
    <div class="col-md-12">

      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Spontenous Adverse Drug Reaction (ADR) Report Form</h3>  
      <div class="row">
        <div class="col-md-12"><h5 class="text-center">Identities of Reporter, Patient and Institute will remain confidential</h5></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12"><h5 class="text-center"> MCAZ Reference Number: <strong><?= $sadr->reference_number ?></strong></h5></div>          
  </div>



<hr>
  <div class="row">
    <div class="col-md-12">
      <?= $this->Form->create($sadr, ['type' => 'file']) ?>
        <div class="row">
          <div class="col-md-12"><h5 class="text-center">Patient details (to allow linkage with other reports)</h5></div>
        </div>
          <div class="row">
            <div class="col-md-6">
              <?php
                  echo $this->Form->control('name_of_institution', 
                    ['label' => ['text' => 'Clinic/Hospital Name ', 'escape' => false]]);
                  echo $this->Form->control('patient_name', ['label' => 'Patient Initials <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                  //echo $this->Form->control('date_of_birth');
                   
                  echo $this->Form->control('date_of_birth', array(
                    'type' => 'date', 'escape' => false,
                    'label' => 'Date of Birth <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              
                  echo $this->Form->control('age_group', ['type' => 'select',                      
                       'options' => [
                              'neonate' => 'neonate',
                              'infant' => 'infant',
                              'child' => 'child',
                              'adolescent' => 'adolescent',
                              'adult' =>'adult',
                              'elderly'=>'elderly',
                              ]
                       , 'empty' => true]
                                                );
              ?>            
            </div>
            <div class="col-md-6">
              <?php
                  echo $this->Form->control('institution_code', ['label' => 'Clinic/Hospital Number']);
                  echo $this->Form->control('ip_no', ['label' => 'VCT/OI/TB Number']);
                  echo $this->Form->control('weight', ['label' => 'Weight (KGs)']);
                  echo $this->Form->control('height', ['label' => 'Height (meters)']);
                  echo $this->Form->control('gender', ['type' => 'radio', 
                     'label' => '<b>Gender <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Male' => 'Male', 'Female' => 'Female', 'Unknown' => 'Unknown']]);
              ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12"><h4 class="text-center">Adverse Reaction</h4></div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <?php 
                  //$this->Form->control('date_of_onset_of_reaction', ['label' => 'Date of Onset:']); 
                  echo $this->Form->control('date_of_onset_of_reaction', array(
                    'type' => 'date', 'escape' => false,
                    'label' => 'Date of onset of Reaction <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              ?>
            </div>
            <div class="col-md-6">
              <?php 
                  //$this->Form->control('date_of_end_of_reaction', ['label' => 'Date of Onset:']); 
                  echo $this->Form->control('date_of_end_of_reaction', array(
                    'type' => 'date',
                    'label' => 'Date of end of Reaction <br> <i>(if it ended)</i>', 'escape' => false,
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              ?>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-md-8"><?php
              // $this->Form->control('duration_type', [
              // 'type' => 'radio', 'label' => 'Duration Type:',
              // 'options' => ['Less than one hour' => 'Less than one hour', 'Hours' => 'Hours', 'Days' => 'Days',
              //                                 'Weeks' => 'Weeks', 'Months' => 'Months']]); 
              ?></div>
             <div class="col-md-4"></div>
          </div> -->

          <!-- <div class="row">
            <div class="col-md-6"><?php //$this->Form->control('duration', ['label' => 'Duration:']); ?></div>
            <div class="col-md-6"></div>
          </div> -->

          <div class="row">
            <div class="col-md-8"><?= $this->Form->control('description_of_reaction', ['label' => 'Description of ADR <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]); ?></div>
            <div class="col-md-4"></div>
          </div>

          <div class="row">
            <div class="col-md-3"><?= 
              // $this->Form->control('severity', ['type' => 'radio', //'label' => 'Serious:',
              //     'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
              //        'templates' => [
              //          'radio' => '<input type="radio" class="radio-inline" name="{{name}}" value="{{value}}"{{attrs}}>', 
              //          'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
              //          'nestingLabel' => '{{hidden}}<label class="radio-inline" {{attrs}}>{{input}}{{text}}</label>',
              //        ],
              //       'options' => ['Yes' => 'Yes', 'No' => 'No']]); 
                $this->Form->control('severity', ['type' => 'radio', 
                    'label' => '<b>Serious <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                    //'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                    'templates' => 'radio_form',
                    'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              ?>            
            </div>
            <div class="col-md-5"><?= $this->Form->control('severity_reason', ['type' => 'select', 
                    'label' => 'Reason for Seriousness',
                    //'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                    'templates' => 'radio_form', 'empty' => true,
                    'options' => ['Death' => 'Death', 'Life-threatening' => 'Life-threatening', 'Hospitalizaion/Prolonged' => 'Hospitalizaion/Prolonged', 'Disabling' => 'Disabling', 
                                      'Congenital-anomaly' => 'Congenital-anomaly', 
                                              'Other Medically Important Reason' => 'Other Medically Important Reason']]); ?></div>
              <div class="col-md-4">
                <?=
                  $this->Form->control('outcome', ['type' => 'select', 
                      'label' => 'Outcome <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'empty' => true, 'escape' => false,
                      'templates' => 'radio_form',
                      'options' => ['Recovered' => 'Recovered', 
									'Recovering' => 'Recovering', 
									'Not yet recovered' => 'Not yet recovered', 
									'Fatal' => 'Fatal', 
									'Unknown' => 'Unknown']]); 
                ?>
              </div>
          </div>

          <div class="row">
            <div class="col-md-6"><?= $this->Form->control('medical_history', ['label' => 'Relevant Medical History']); ?></div>
            <div class="col-md-6"><?= $this->Form->control('past_drug_therapy', ['label' => 'Relevant Past Drug Therapy']); ?></div>
          </div>

          <div class="row">
            <div class="col-md-12"><h4 class="text-center">Current Medication</h4></div>
          </div>
          
          <div class="row">
            <div class="col-md-12"><?php echo $this->element('multi/list_of_drugs');?></div>
          </div>        

          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-md-12"><?php echo $this->element('multi/attachments');?></div>
          </div>

          <div class="row">
            <div class="col-md-8"><?= $this->Form->control('lab_test_results', ['label' => 'Laboratory test Results']); ?></div>
            <div class="col-md-4"></div>
          </div>

          <div class="row">
            <div class="col-md-12"><h4 class="text-center">Reported By:</h4></div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <?php
                echo $this->Form->control('reporter_name', ['label' => 'Reporter name']);
                echo $this->Form->control('reporter_email', ['label' => 'Reporter email']);
              ?>
            </div><!--/span-->
            <div class="col-md-6">
              <?php
                echo $this->Form->control('reporter_phone', ['label' => 'Reporter phone']);
                echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);

              ?>
            </div><!--/span-->
          </div><!--/row-->

          <div class="well">
            <div class="row">
              <div class="col-md-4 text-center">
                <button name="submitted" value="1" id="sadrSaveChanges" class="btn btn-primary active" type="submit">
                  <span class="fa fa-edit" aria-hidden="true"></span> Save changes
                </button>
              </div>
              <div class="col-md-4 text-center">
                <button name="submitted" value="2" id="sadrSubmit" class="btn btn-success active" type="submit"
                        onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
                >
                  <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
                </button>
              </div>
              <div class="col-md-4 text-center">
                <button name="submitted" value="-1" id="sadrCancel" class="btn btn-default active" type="submit"
                        onclick="return confirm('Are you sure you wish to cancel the report?');"
                >
                  <span class="fa fa-close" aria-hidden="true"></span> Cancel
                </button>
              </div>
            </div>
          </div>

      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
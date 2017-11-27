<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
// debug($sadr);
// debug($this->request->data);
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12">

      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Spontenous Adverse Drug Reaction (ADR) Report Form</h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">Identities of Reporter, Patient and Institute will remain confidential</h5></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12"><h5 class="text-center"> MCAZ Reference Number: <strong><?= ($sadr->submitted == 2) ? $sadr->reference_number : $sadr->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ; ?></strong></h5></div>          
  </div>



<hr>
  <div class="row">
    <div class="col-xs-12">
      <?= $this->Form->create($sadr, ['type' => 'file']) ?>
        <div class="row">
          <div class="col-xs-12"><h5 class="text-center">Patient details (to allow linkage with other reports)</h5></div>
        </div>
          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('name_of_institution', 
                    ['type' => 'textarea', 'type' => 'textarea', 'label' => ['text' => 'Clinic/Hospital Name ', 'escape' => false]]);
                  echo $this->Form->control('patient_name', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Patient Initials <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                  //echo $this->Form->control('date_of_birth');
                   
                  echo $this->Form->control('date_of_birth', array(
                    'escape' => false,
                    'type' => 'textarea', 'type' => 'textarea', 'label' => 'Date of Birth <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              
                  echo $this->Form->control('age_group', ['type' => 'textarea',                      
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
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('institution_code', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Clinic/Hospital Number']);
                  echo $this->Form->control('ip_no', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'VCT/OI/TB Number']);
                  echo $this->Form->control('weight', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Weight (KGs)']);
                  echo $this->Form->control('height', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Height (meters)']);
                  echo $this->Form->control('gender', [
                     'type' => 'textarea', 'type' => 'textarea', 'label' => '<b>Gender <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                     'templates' => 'radio_form',
                       'options' => ['Male' => 'Male', 'Female' => 'Female', 'Unknown' => 'Unknown']]);
              ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Adverse Reaction</h4></div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php 
                  //$this->Form->control('date_of_onset_of_reaction', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Date of Onset:']); 
                  echo $this->Form->control('date_of_onset_of_reaction', array(
                     'escape' => false,
                    'type' => 'textarea', 'type' => 'textarea', 'label' => 'Date of onset of Reaction <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              ?>
            </div>
            <div class="col-xs-6">
              <?php 
                  //$this->Form->control('date_of_end_of_reaction', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Date of Onset:']); 
                  echo $this->Form->control('date_of_end_of_reaction', array(
                    
                    'type' => 'textarea', 'type' => 'textarea', 'label' => 'Date of end of Reaction <br> <i>(if it ended)</i>', 'escape' => false,
                    'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              ?>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-xs-8"><?php
              // $this->Form->control('duration_type', [
              // 'type' => 'textarea', 'type' => 'textarea', 'label' => 'Duration Type:',
              // 'options' => ['Less than one hour' => 'Less than one hour', 'Hours' => 'Hours', 'Days' => 'Days',
              //                                 'Weeks' => 'Weeks', 'Months' => 'Months']]); 
              ?></div>
             <div class="col-xs-4"></div>
          </div> -->

          <!-- <div class="row">
            <div class="col-xs-6"><?php //$this->Form->control('duration', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Duration:']); ?></div>
            <div class="col-xs-6"></div>
          </div> -->

          <div class="row">
            <div class="col-xs-8"><?= $this->Form->control('description_of_reaction', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Description of ADR <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]); ?></div>
            <div class="col-xs-4"></div>
          </div>

          <div class="row">
            <div class="col-xs-3"><?= 
              // $this->Form->control('severity', [//'type' => 'textarea', 'type' => 'textarea', 'label' => 'Serious:',
              //     'type' => 'textarea', 'type' => 'textarea', 'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
              //        'templates' => [
              //          'radio' => '<input type="radio" class="radio-inline" name="{{name}}" value="{{value}}"{{attrs}}>', 
              //          'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
              //          'nestingLabel' => '{{hidden}}<label class="radio-inline" {{attrs}}>{{input}}{{text}}</label>',
              //        ],
              //       'options' => ['Yes' => 'Yes', 'No' => 'No']]); 
                $this->Form->control('severity', [
                    'type' => 'textarea', 'type' => 'textarea', 'label' => '<b>Serious <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                    //'type' => 'textarea', 'type' => 'textarea', 'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                    'templates' => 'radio_form',
                    'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              ?>            
            </div>
            <div class="col-xs-5"><?= $this->Form->control('severity_reason', [ 
                    'type' => 'textarea', 'type' => 'textarea', 'label' => 'Reason for Seriousness',
                    //'type' => 'textarea', 'type' => 'textarea', 'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                    'templates' => 'radio_form', 'empty' => true,
                    'options' => ['Death' => 'Death', 'Life-threatening' => 'Life-threatening', 'Hospitalizaion/Prolonged' => 'Hospitalizaion/Prolonged', 'Disabling' => 'Disabling', 
                                      'Congenital-anomaly' => 'Congenital-anomaly', 
                                              'Other Medically Important Reason' => 'Other Medically Important Reason']]); ?></div>
              <div class="col-xs-4">
                
              </div>
          </div>

          <div class="row">
            <div class="col-xs-6"><?= $this->Form->control('medical_history', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Relevant Medical History']); ?></div>
            <div class="col-xs-6"><?= $this->Form->control('past_drug_therapy', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Relevant Past Drug Therapy']); ?></div>
          </div>

          <div class="row">
            <div class="col-xs-8"><?= $this->Form->control('lab_test_results', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Laboratory test Results']); ?></div>
            <div class="col-xs-4"></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Current Medication</h4></div>
          </div>
          
          <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/list_of_drugs', ['block' => true]);
?>

    <div class="row">
        <div class="col-xs-12">
            <table id="listofdrugsform"  class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th colspan="2" > Generic Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Brand Name </th>
                    <th> Batch Number</th>
                    <th colspan="2" > Dose <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th colspan="2" > Route and Frequency <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Indication </th>
                    <th> Date Started <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Date Stopped </th>
                    <th colspan="2"> Tick Suspected Drug(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php
                             echo $this->Form->input('sadr_list_of_drugs.0.id')  ;
                             echo $this->Form->control('sadr_list_of_drugs.0.drug_name', ['type' => 'textarea', 'label' => false,
                                  ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.brand_name', ['type' => 'textarea', 'label' => false, ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.batch_number', ['type' => 'textarea', 'label' => false, ]);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.0.dose', ['type' => 'textarea', 'label' => false, 
                            ]); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.dose_id', ['type' => 'textarea', 'label' => false, 'options' => $doses, 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.0.route_id', ['type' => 'textarea', 'label' => false, 'options' => $routes, 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.0.frequency_id', ['type' => 'textarea', 'label' => false, 'options' => $frequencies, 'empty' => true]);
                        ?>
                    </td>
                    <td><?= $this->Form->control('sadr_list_of_drugs.0.indication', ['type' => 'textarea', 'label' => false, ]); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.start_date', [                                
                                'type' => 'textarea', 'label' => false, //'monthNames' => false,
                                
                                //'templates' => [
                                    //'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
                                //    'dateWidget' => '{{day}}{{month}}{{year}}',]
                                ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.stop_date', ['type' => 'textarea', 'label' => false, 
                                ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->checkbox('sadr_list_of_drugs.0.suspected_drug', ['type' => 'textarea', 'label' => false, ])
                        ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" id="addListOfDrug">
                          <i class="fa fa-plus"></i>
                        </button>
                    </td>
                  </tr>
              
              <?php 
                //Dynamic fields
                if (!empty($sadr['sadr_list_of_drugs'])) {
                  for ($i = 1; $i <= count($sadr['sadr_list_of_drugs'])-1; $i++) { 
                    // pr($sadr);
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('sadr_list_of_drugs.'.$i.'.id')  ;
                             echo $this->Form->control('sadr_list_of_drugs.'.$i.'.drug_name', ['type' => 'textarea', 'label' => false,
                                  ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.brand_name', ['type' => 'textarea', 'label' => false, ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.batch_number', ['type' => 'textarea', 'label' => false, ]);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose', ['type' => 'textarea', 'label' => false, 
                            ]); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose_id', ['type' => 'textarea', 'label' => false, 'options' => $doses, 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.route_id', ['type' => 'textarea', 'label' => false, 'options' => $routes, 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.frequency_id', ['type' => 'textarea', 'label' => false, 'options' => $frequencies, 'empty' => true]);
                        ?>
                    </td>
                    <td><?= $this->Form->control('sadr_list_of_drugs.'.$i.'.indication', ['type' => 'textarea', 'label' => false, ]); ?></td>
                    <td>
                      <?php
                          echo $this->Form->control('sadr_list_of_drugs.'.$i.'.start_date', [
                            'type' => 'textarea', 'label' => false,
                            'templates' => 'dates_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.stop_date', ['type' => 'textarea', 'label' => false,
                            'templates' => 'dates_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->checkbox('sadr_list_of_drugs.'.$i.'.suspected_drug', ['type' => 'textarea', 'label' => false, ])
                        ?>
                    </td>
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-row"  value="<?php if (isset($sadr['sadr_list_of_drugs'][$i]['id'])) { echo $sadr['sadr_list_of_drugs'][$i]['id']; } ?>" >
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
      <div class="col-xs-12"><h4 class="text-center">Concomitant (Other) drugs taken, including herbal medicines & Dates/period taken: 
        <button type="button" class="btn btn-success" id="addConcomitantDrug">
                           <i class="fa fa-plus"></i>
                        </button>
                      </h4></div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="tableotherdrugs"  class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="2" style="width: 65%;"> Name of Drug: </th>
                    <th> Date Started </th>
                    <th> Date Stopped </th>
                    <th colspan="2"> Tick Suspected Drug(s) </th>
                  </tr>
                </thead>
                <tbody>                  
              <?php 
                //Dynamic fields
                if (!empty($sadr['sadr_other_drugs'])) {
                  for ($i = 0; $i <= count($sadr['sadr_other_drugs'])-1; $i++) { 
                    // pr($sadr);
              ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('sadr_other_drugs.'.$i.'.id')  ;
                             echo $this->Form->control('sadr_other_drugs.'.$i.'.drug_name', ['type' => 'textarea', 'label' => false,
                                  ]);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('sadr_other_drugs.'.$i.'.start_date', ['type' => 'textarea', 'label' => false,
                            'templates' => 'dates_form'                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_other_drugs.'.$i.'.stop_date', ['type' => 'textarea', 'label' => false,
                            'templates' => 'dates_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->checkbox('sadr_other_drugs.'.$i.'.suspected_drug', ['type' => 'textarea', 'label' => false, ])
                        ?>
                    </td>
                    <td><button type="button" class="btn btn-default remove-cd-row" value="<?php if (isset($sadr['sadr_other_drugs'][$i]['id'])) { echo $sadr['sadr_other_drugs'][$i]['id']; } ?>">
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
            <div class="col-xs-4">
                <?=
                  $this->Form->control('action_taken', ['type' => 'textarea', 
                      'label' => 'Action Taken: <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'empty' => true, 'escape' => false,
                      'templates' => 'radio_form',
                      'options' => ['Drug withdrawn' => 'Drug withdrawn',
'Dose increased' => 'Dose increased',
'Unknown' => 'Unknown',
'Dose reduced' => 'Dose reduced',
'Dose not changed' => 'Dose not changed',
'Not applicable' => 'Not applicable',
'Medical treatment of ADR' => 'Medical treatment of ADR']]); 
                ?>
            </div>
            <div class="col-xs-4">
                <?=
                  $this->Form->control('outcome', ['type' => 'textarea', 
                      'label' => 'Outcome <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'empty' => true, 'escape' => false,
                      'templates' => 'radio_form',
                      'options' => ['Recovered' => 'Recovered', 
                  'Recovering' => 'Recovering', 
                  'Not yet recovered' => 'Not yet recovered', 
                  'Fatal' => 'Fatal', 
                  'Unknown' => 'Unknown']]); 
                ?>
              </div>
            
            <div class="col-xs-4">
                <?=
                  $this->Form->control('relatedness', ['type' => 'textarea', 
                      'label' => 'Relatedness of suspected medicine(s) to ADR:', 'empty' => true, 'escape' => false,
                      'templates' => 'radio_form',
                      'options' => ['Certain' => 'Certain',
'Probable / Likely' => 'Probable / Likely',
'Possible' => 'Possible',
'Unlikely' => 'Unlikely',
'Conditional / Unclassified' => 'Conditional / Unclassified',
'Unassessable / Unclassifiable,' => 'Unassessable / Unclassifiable,',]]); 
                ?>
            </div>
          </div>

    <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments');?></div>
          </div>


          

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Reported By:</h4></div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                echo $this->Form->control('reporter_name', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Reporter name']);
                echo $this->Form->control('reporter_email', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Reporter email']);
              ?>
            </div><!--/span-->
            <div class="col-xs-6">
              <?php
                echo $this->Form->control('reporter_phone', ['type' => 'textarea', 'type' => 'textarea', 'label' => 'Reporter phone']);
                echo $this->Form->input('designation_id', ['type' => 'textarea', 'empty' => true]);

              ?>
            </div><!--/span-->
          </div><!--/row-->

      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
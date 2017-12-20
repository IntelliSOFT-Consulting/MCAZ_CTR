<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\adr $adr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/list_of_devices', ['block' => true]);
?>

    <div class="row">
        <div class="col-md-12">
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
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.dosage', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.dose_id', ['label' => false, 'options' => $doses, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>                 
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.0.route_id', ['label' => false, 'options' => $routes, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.0.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.start_date', [
                                'type' => 'text',
                                'label' => false, 
                                'templates' => 'dates_form'
                                ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.taking_drug', ['type' => 'radio', 
                   'label' => false,
                   'templates' => 'table_form',
                   'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.0.relationship_to_sae', ['label' => false, 'type' => 'select', 'options' => ['Definitely related' => 'Definitely related', 'Probably related' => 'Probably related', 'Possibly related' => 'Possibly related', 'Not related' => 'Not related', 'Pending' => 'Pending'], 'templates' => 'table_form' ,'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" id="addListOfDevice">
                          Add <i class="fa fa-plus"></i>
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
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.dosage', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.dose_id', ['label' => false, 'options' => $doses, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>                 
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.route_id', ['label' => false, 'options' => $routes, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.start_date', [
                                'type' => 'text',
                                'label' => false, 
                                'templates' => 'dates_form'
                                ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.taking_drug', ['type' => 'radio', 
                   'label' => false,
                   'templates' => 'table_form',
                   'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_list_of_drugs.'.$i.'.relationship_to_sae', ['label' => false, 'type' => 'select', 'options' => ['Definitely related' => 'Definitely related', 'Probably related' => 'Probably related', 'Possibly related' => 'Possibly related', 'Not related' => 'Not related', 'Pending' => 'Pending'], 'templates' => 'table_form' ,'empty' => true]);
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
      <div class="col-md-12"><?php 
        echo $this->Form->control('patient_other_drug', ['type' => 'radio', 
               'label' => 'Was the patient taking any other drug at the time of onset of the AE? ', 'escape' => false,
               'templates' => 'radio_form',
                 'options' => ['Yes' => 'Yes', 'No' => 'No']]);
      ?></div>
    </div>  
    <hr>
        
    <div class="row">
      <div class="col-md-12"><h4>If yes, then list all concomitant medication being taken at least one month before the onset of the SAE and describe the relationship to the SAE: 
        <button type="button" class="btn btn-success" id="addAdrConcomitant">
                           Add <i class="fa fa-plus"></i>
                        </button>
                      </h4></div>
    </div>

    <div class="row">
        <div class="col-md-12">
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
                                  'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_other_drugs.'.$i.'.start_date', ['label' => false, 'type' => 'text',
                            'templates' => 'dates_form'                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_other_drugs.'.$i.'.stop_date', ['label' => false, 'type' => 'text',
                            'templates' => 'dates_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_other_drugs.'.$i.'.relationship_to_sae', ['label' => false, 'type' => 'select', 'options' => ['Definitely related' => 'Definitely related', 'Probably related' => 'Probably related', 'Possibly related' => 'Possibly related', 'Not related' => 'Not related', 'Pending' => 'Pending'], 'templates' => 'table_form' ,'empty' => true]);
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

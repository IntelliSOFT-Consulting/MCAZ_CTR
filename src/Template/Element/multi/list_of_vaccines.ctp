<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
    // $this->Html->script('multi/list_of_aefis', array('inline' => false));
  $this->Html->script('multi/list_of_vaccines', ['block' => true]);
?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">Vaccines <button type="button" class="btn btn-primary btn-sm" id="addAefiVaccine">
                          <i class="fa fa-plus"></i>
                        </button></h3>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="listOfVaccinesTable"  class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="2" > Name </th>
                    <th> <h5>Date and Time of Vaccination <br><small id="helpBlock" class="has-warning">Format dd-mm-yyyy hh24:minute</small></h5></th>
                    <th> Dose (1st, 2nd...)</th>
                    <th> Batch/Lot number </th>
                    <th colspan="2"> Expiry date </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    //Dynamic fields
                    if (!empty($aefi['aefi_list_of_vaccines'])) {
                      for ($i = 0; $i <= count($aefi['aefi_list_of_vaccines'])-1; $i++) { 
                        // pr($aefi);
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('aefi_list_of_vaccines.'.$i.'.id')  ;
                             echo $this->Form->control('aefi_list_of_vaccines.'.$i.'.vaccine_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.'.$i.'.vaccination_date', ['label' => false,
                                'type' => 'text',
                                'templates' => [
              'input' => '<input class="form-control datetime-field" type="{{type}}" name="{{name}}"{{attrs}}/>',
              'formGroup' => ' {{label}}{{input}} ',
          ]]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.'.$i.'.dosage', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('aefi_list_of_vaccines.'.$i.'.batch_number', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.'.$i.'.expiry_date', [
                                'type' => 'text',
                                'label' => false, 
                                'templates' => 'dates_form'
                                ]);
                        ?>
                    </td>
                    
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-vaccine"  value="<?php if (isset($aefi['aefi_list_of_vaccines'][$i]['id'])) { echo $aefi['aefi_list_of_vaccines'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                
                <?php }} ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">Diluents <button type="button" class="btn btn-success btn-sm" id="addAefiDiluent">
                          <i class="fa fa-plus"></i>
                        </button></h3>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="listOfDiluentsTable"  class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="2" > Name </th>
                    <th> Date and Time of reconstitution </th>
                    <th> Batch/Lot number </th>
                    <th colspan="2"> Expiry date </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    //Dynamic fields
                    if (!empty($aefi['aefi_list_of_diluents'])) {
                      for ($i = 0; $i <= count($aefi['aefi_list_of_diluents'])-1; $i++) { 
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('aefi_list_of_diluents.'.$i.'.id')  ;
                             echo $this->Form->control('aefi_list_of_diluents.'.$i.'.diluent_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_diluents.'.$i.'.diluent_date', ['label' => false, 
                                'type' => 'text',
                                'templates' => 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('aefi_list_of_diluents.'.$i.'.batch_number', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_diluents.'.$i.'.expiry_date', [
                                'type' => 'text',
                                'label' => false, 
                                'templates' => 'dates_form'
                                ]);
                        ?>
                    </td>
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-diluent"  value="<?php if (isset($aefi['aefi_list_of_diluents'][$i]['id'])) { echo $aefi['aefi_list_of_diluents'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                
                <?php }} ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

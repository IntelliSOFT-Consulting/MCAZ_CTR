<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_aefis', array('inline' => false));
  $this->Html->script('multi/list_of_aefis', ['block' => true]);
?>

    <div class="row">
        <div class="col-md-12">
            <table id="listofaefisform"  class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="2" > Name </th>
                    <th> Date of Vaccination </th>
                    <th> Dose</th>
                    <th> Batch/Lot number </th>
                    <th> Expiry date </th>
                    <th>  </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php
                             echo $this->Form->input('aefi_list_of_vaccines.0.id')  ;
                             echo $this->Form->control('aefi_list_of_vaccines.0.vaccine_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.0.vaccination_date', ['label' => false, 
                                'type' => 'text',
                                'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.0.dose', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('aefi_list_of_vaccines.0.batch_number', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.0.expiry_date', [
                                'type' => 'text',
                                'label' => false, //'monthNames' => false,
                                'templates' => 'table_form'
                                //'templates' => [
                                    //'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
                                //    'dateWidget' => '{{day}}{{month}}{{year}}',]
                                ]);
                        ?>
                    </td>
                    
                    <td>
                        <button type="button" class="btn btn-default btn-sm" id="addAefiVaccine">
                          <i class="fa fa-plus"></i>
                        </button>
                    </td>
                  </tr>
              
                  <tr>
                    <td>2</td>
                    <td><?php
                             echo $this->Form->input('aefi_list_of_vaccines.1.id')  ;
                             echo $this->Form->control('aefi_list_of_vaccines.1.vaccine_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.1.vaccination_date', ['label' => false, 
                                'type' => 'text',
                                'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.1.dose', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('aefi_list_of_vaccines.1.batch_number', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.1.expiry_date', [
                                'type' => 'text',
                                'label' => false, //'monthNames' => false,
                                'templates' => 'table_form'
                                //'templates' => [
                                    //'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
                                //    'dateWidget' => '{{day}}{{month}}{{year}}',]
                                ]);
                        ?>
                    </td>
                    
                    <td>
                        <button type="button" class="btn btn-default btn-sm" id="addAefiVaccine">
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td><?php
                             echo $this->Form->input('aefi_list_of_vaccines.2.id')  ;
                             echo $this->Form->control('aefi_list_of_vaccines.2.vaccine_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.2.vaccination_date', ['label' => false, 
                                'type' => 'text',
                                'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.2.dose', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('aefi_list_of_vaccines.2.batch_number', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('aefi_list_of_vaccines.2.expiry_date', [
                                'type' => 'text',
                                'label' => false, //'monthNames' => false,
                                'templates' => 'table_form'
                                //'templates' => [
                                    //'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
                                //    'dateWidget' => '{{day}}{{month}}{{year}}',]
                                ]);
                        ?>
                    </td>
                    
                    <td>
                        <button type="button" class="btn btn-default btn-sm" id="addAefiVaccine">
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

    <hr>

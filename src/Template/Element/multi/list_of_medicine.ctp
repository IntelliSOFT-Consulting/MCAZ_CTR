<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/list_of_medicine', ['block' => true]);
?>

    <div class="row">
        <div class="col-md-12">
            <label>6.2 Information on Placebo</label>
            <table id="listofdrugsform"  class="table table-bordered table-condensed">
                <thead>
                  <tr> 
                    <th>#</th>                  
                    <th> Administration Route <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th colspan="2" > Dose and Frequency <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Indication </th>
                    <th> Date Started <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Control Medicine </th>
                    </span></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php
                             echo $this->Form->input('sadr_list_of_drugs.0.id')  ;
                        ?>
                    </td>

                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.0.route_id', ['label' => false, 'options' => $routes, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.0.dose', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.dose_id', ['label' => false, 'options' => $doses, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.0.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.start_date', [
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
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.control_medicine', ['label' => false, 'templates' => 'table_form'])
                        ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" id="addListOfDrug">
                          Add <i class="fa fa-plus"></i>
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
                        ?>
                    </td>                    
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.route_id', ['label' => false, 'options' => $routes, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose_id', ['label' => false, 'options' => $doses, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td>
                      <?php
                          echo $this->Form->control('sadr_list_of_drugs.'.$i.'.start_date', [
                            'label' => false, 'type' => 'text',
                            'templates' => 'dates_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.control_medicine', ['label' => false, 'templates' => 'table_form'])
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
    <hr>

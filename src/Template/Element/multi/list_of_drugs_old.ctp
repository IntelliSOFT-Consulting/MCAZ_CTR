<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
?>
    <div class="row">
        <div class="col-md-12">
            <table id="buildyourform"  class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="2" > Generic Name </th>
                    <th> Brand Name </th>
                    <th> Batch Number</th>
                    <th colspan="2" > Dose </th>
                    <th colspan="2" > Route and Frequency </th>
                    <th> Indication </th>
                    <th> Date Started </th>
                    <th> Date Stopped </th>
                    <th colspan="2"> Tick Suspected Drug(s) </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php
                             echo $this->Form->input('sadr_list_of_drugs.0.id')  ;
                             echo $this->Form->control('sadr_list_of_drugs.0.drug_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.brand_name', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.batch_number', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.0.dose', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.dose_id', ['label' => false, 'options' => $doses, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.0.route_id', ['label' => false, 'options' => $routes, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.0.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?= $this->Form->control('sadr_list_of_drugs.0.indication', ['label' => false, 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.0.start_date', [
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
                            echo $this->Form->control('sadr_list_of_drugs.0.stop_date', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->checkbox('sadr_list_of_drugs.0.suspected_drug', ['label' => false, 'templates' => 'table_form'])
                        ?>
                    </td>
                    <td><input class="btn btn-default" type="button" value="+"></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><?php
                             echo $this->Form->input('sadr_list_of_drugs.1.id')  ;
                             echo $this->Form->control('sadr_list_of_drugs.1.drug_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.1.brand_name', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.1.batch_number', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.1.dose', ['label' => false, 
                           'type' => 'text', 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.1.dose_id', ['label' => false, 'options' => $doses, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.1.route_id', ['label' => false, 'options' => $routes, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.1.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?= $this->Form->control('sadr_list_of_drugs.1.indication', ['label' => false, 'templates' => 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.1.start_date', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.1.stop_date', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->checkbox('sadr_list_of_drugs.1.suspected_drug', ['label' => false, 'templates' => 'table_form'])
                        ?>
                    </td>
                    <td><input class="btn btn-default" type="button" value="+"></td>
                  </tr>
                  <?php
                    if (!empty($this->request->data['SadrListOfDrug'])) {
                        for ($i = 1; $i <= count($this->request->data['SadrListOfDrug'])-1; $i++) {     ?>
                  <tr>
                    <td><?php echo $i+1; ?></td>
                    <td data-title="Generic Name *"><?php
                             echo $this->Form->input('SadrListOfDrug.'.$i.'.id') ;

                            echo $this->Form->input('SadrListOfDrug.'.$i.'.drug_name', array(
                                    'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 autoComblete autosave-ignore',
                                    'error' => array('attributes' => array( 'class' => 'help-block')),
                                    'data-items' => '4', 'autocomplete'=> 'off',
                            ));
                        ?>
                    </td>
                    <td data-title="Brand Name">
                        <?php echo $this->Form->input('SadrListOfDrug.'.$i.'.brand_name', array(
                                                        'label' => false, 'between' => false,
                                                        'after' => false, 'class' => 'span11 autoComblete2 autosave-ignore',));
                        ?>
                    </td>
                    <td  data-title="Dose *" style="width: 5%;">
                        <?php
                            echo $this->Form->input('SadrListOfDrug.'.$i.'.dose', array(
                                                        'label' => false, 'between' => false,
                                                        'error' => array('attributes' => array( 'class' => 'help-block')),
                                                        'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td style="width: 10%; border-left:0px;">
                        <?php
                            echo $this->Form->input('SadrListOfDrug.'.$i.'.dose_id', array(
                                            'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
                                            'type' => 'select',
                                            'error' => array('attributes' => array( 'class' => 'help-block')),
                                            'options' => $dose,
                                            ));
                        ?>
                    </td>
                    <td data-title="Route *"><?php
                            echo $this->Form->input('SadrListOfDrug.'.$i.'.route_id', array(
                                        'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
                                        'type' => 'select',
                                        'options' => $routes,
                                        'error' => array('attributes' => array( 'class' => 'help-block')),
                                ));
                        ?>
                    </td>
                    <td data-title="Frequency *"><?php
                            echo $this->Form->input('SadrListOfDrug.'.$i.'.frequency_id', array(
                                    'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
                                    'type' => 'select',
                                    'options' => $frequency,
                                    'error' => array('attributes' => array( 'class' => 'help-block')),
                                ));

                    ?>
                    </td>
                    <td data-title="Date Started (dd-mm-yyyy) *">
                        <?php
                            echo $this->Form->input('SadrListOfDrug.'.$i.'.start_date', array(
                                'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 date-pick-from autosave-ignore',
                                    'error' => array('attributes' => array( 'class' => 'help-block')),
                            ));
                        ?>
                    </td>
                    <td data-title="Date Stopped (dd-mm-yyyy)">
                        <?php
                            echo $this->Form->input('SadrListOfDrug.'.$i.'.stop_date', array(
                                'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 date-pick-to autosave-ignore',
                                    'error' => array('attributes' => array( 'class' => 'help-block')),
                            ));
                        ?>
                    </td>
                    <td data-title="Indication">
                        <?php
                        // echo $this->Form->input('SadrListOfDrug.'.$i.'.indication', array(
                        //      'label' => false, 'between' => false,
                        //      'after' => false, 'class' => 'span9 autosave-ignore',));
                        echo $this->Form->input('SadrListOfDrug.'.$i.'.indication', array(
                                    'label' => false, 'between' => false, 'after' => false, 'class' => 'span11',
                                    'error' => array('attributes' => array( 'class' => 'help-block'))
                            ));
                        // echo $this->Form->input('SadrListOfDrug.$i.indication', array(
                        //  'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 autoComblete autosave-ignore',
                        //  'error' => array('attributes' => array( 'class' => 'help-block')),
                        //  'data-items' => '4',  'autocomplete'=> 'off',
                        //  ));
                        ?>
                    </td>
                    <td data-title="Suspected Drug?">
                        <?php
                            echo $this->Form->input('SadrListOfDrug.'.$i.'.suspected_drug', array(
                                    'type' => 'checkbox', 'class' => 'autosave-ignore',
                                    'label' => false, 'between' => false, 'after' => false,
                                    'between' => '<label class="checkbox">',
                                    'after' => '</label>',)
                            );
                        ?>
                    </td>
                    <td data-title="Remove Drug - ">
                        <button  type="button" class="btn-mini removeTr" title="click here to delete row"
                                    id="<?php if (isset($this->request->data['SadrListOfDrug'][$i]['id'])) { echo $this->request->data['SadrListOfDrug'][$i]['id']; } ?>" >
                            <i class="icon-minus"></i>
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
      <div class="col-md-12"><h4 class="text-center">Concomitant (Other) drugs taken, including herbal medicines & Dates/period taken:</h4></div>
    </div>

    <div class="row">
        <div class="col-md-12">
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
                  <tr>
                    <td>1</td>
                    <td><?php
                             echo $this->Form->input('sadr_other_drugs.0.id')  ;
                             echo $this->Form->control('sadr_other_drugs.0.drug_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('sadr_other_drugs.0.start_date', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_other_drugs.0.stop_date', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    
                    <td>
                        <?php
                            echo $this->Form->checkbox('sadr_other_drugs.0.suspected_drug', ['label' => false, 'templates' => 'table_form'])
                        ?>
                    </td>
                    <td><input class="btn btn-default" type="button" value="+"></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><?php
                             echo $this->Form->input('sadr_other_drugs.1.id')  ;
                             echo $this->Form->control('sadr_other_drugs.1.drug_name', ['label' => false,
                                  'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('sadr_other_drugs.1.start_date', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_other_drugs.1.stop_date', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->checkbox('sadr_other_drugs.1.suspected_drug', ['label' => false, 'templates' => 'table_form'])
                        ?>
                    </td>
                    <td><input class="btn btn-default" type="button" value="+"></td>
                  </tr>
                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

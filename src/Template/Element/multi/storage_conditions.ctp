<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\application $application
 */
// $this->Html->script('multi/list_of_drugs', array('inline' => false));
$this->Html->script('multi/storage_conditions', ['block' => true]);
?>
<table class="table table-bordered table-condensed">
    <thead>
        <tr class="active">
            <th></th>
            <th>List of proposed shelf-life/retest period and storage conditions of the drug substance. </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>
                <div class="row">
                    <div class="col-xs-12">

                        <h5><small> Summary of stability studies provided in support of the proposed shelf-life.
                                State number of months for which data is available.:</small></h5>
                        <h5>Add Shelf Life: <button type="button" class="btn btn-primary btn-xs" id="addParticipant">
                                Add <i class="fa fa-plus"></i>
                            </button></h5>

                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>

                <div class="row">
                    <div class="col-xs-12">
                        <!-- div with a border -->
                        <div class="border">
                            <table id="participantsTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Batch details<br> (e.g. batch number) </th>
                                        <th> Manufacturing <br>process </th>
                                        <th> -70ºC</th>
                                        <th> -20ºC </th>
                                        <th> 5ºC </th>
                                        <th> 25ºC/<br>60% RH</th>
                                        <th> 30ºC/<br>65% RH</th>
                                        <th> 40ºC/<br>75% RH </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    //Dynamic fields
                                    if (!empty($application['quality_assessments']['sdrugs']['storage_conditions'])) {
                                        for ($i = 0; $i <= count($application['quality_assessments']['sdrugs']['storage_conditions']) - 1; $i++) {
                                    ?>

                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td><?php
                                                 echo $this->Form->control('storage_conditions.' . $i . '.model', [
                                                    'type' => 'hidden', 
                                                    'label' => false,
                                                    'templates' => 'table_form'
                                                ]);
                                                    echo $this->Form->control('storage_conditions.' . $i . '.batch_details', [
                                                        'label' => false,
                                                        'templates' => 'table_form'
                                                    ]);
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $this->Form->control('storage_conditions.' . $i . '.manu_process', ['label' => false, 'templates' => 'table_form']);
                                                    ?>
                                                </td> 
                                                <td><?php
                                                    echo $this->Form->control('storage_conditions.' . $i . '.neg_seventy', ['label' => false, 'type' => 'text', 'templates' => 'dates_form']);
                                                    ?>
                                                </td>

                                                <td><?php
                                                    echo $this->Form->control('storage_conditions.' . $i . '.neg_twenty', ['label' => false, 'type' => 'text', 'templates' => 'dates_form']);
                                                    ?>
                                                </td>
                                                <td><?php
                                                    echo $this->Form->control('storage_conditions.' . $i . '.pos_five', ['label' => false, 'type' => 'text', 'templates' => 'dates_form']);
                                                    ?>
                                                </td>
                                                <td><?php
                                                    echo $this->Form->control('storage_conditions.' . $i . '.pos_twenty_five', ['label' => false, 'type' => 'text', 'templates' => 'dates_form']);
                                                    ?>
                                                </td>
                                                <td><?php
                                                    echo $this->Form->control('storage_conditions.' . $i . '.pos_thirty', ['label' => false, 'type' => 'text', 'templates' => 'dates_form']);
                                                    ?>
                                                </td>

                                                <td><?php
                                                    echo $this->Form->control('storage_conditions.' . $i . '.pos_forty', ['label' => false, 'type' => 'text', 'templates' => 'dates_form']);
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default btn-sm remove-participant">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                    <?php }
                                    }; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/span-->
                </div>
            </td>
        </tr>
    </tbody>
</table>
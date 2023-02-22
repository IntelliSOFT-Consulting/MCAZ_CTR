<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\application $application
 */
// $this->Html->script('multi/list_of_drugs', array('inline' => false));
$this->Html->script('multi/gmp_compliance', ['block' => true]);
?>
<table class="table table-bordered table-condensed">
    <thead>
        <tr class="active">
            <th></th>
            <th>GMP compliance </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>
                <div class="row">
                    <div class="col-xs-12">

                        <h5>Information on the authorization and procurement of testing laboratories can be included for IMPs derived of human tissue <small> Information about all manufacturers involved (drug substance, drug product, placebo, etc) and evidence of GMP (manufacturing licenses/ GMP Certificates):</small></h5>
                        <h5>Add Compliance: <button type="button" class="btn btn-primary btn-xs" id="addParticipant">
                                Add <i class="fa fa-plus"></i>
                            </button></h5>

                    </div>
                </div>
            </td>
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
                                        <th> Name and address of site(can be cut and pasted from the IMPD) </th>
                                        <th> Function (include reference to PRx, PLx etc as relevant) </th>
                                        <th> Valid license </th>
                                        <th> Comment </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    //Dynamic fields
                                    if (!empty($application['quality_assessments'][$ekey]['compliance'])) {
                                        $i = 0;
                                        foreach ($application['quality_assessments'][$ekey]['compliance'] as $compliance) {
                                    ?>

                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td><?php
                                                    echo $this->Form->control('compliance.' . $ekey . '.site_name', [
                                                        'label' => false,
                                                        'templates' => 'table_form',
                                                        'value' => $compliance->site_name,
                                                    ]);
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $this->Form->control('compliance.' . $ekey . '.site_function', [
                                                        'label' => false, 'templates' => 'table_form',
                                                        'value' => $compliance->site_function,
                                                    ]);
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $this->Form->checkbox('compliance.' . $ekey . '.valid_license', [
                                                        'label' => false, 'templates' => 'table_form',
                                                        'checked' => $compliance->valid_license == 1,
                                                    ]);
                                                    ?>
                                                </td>
                                                <td><?php
                                                    echo $this->Form->control('compliance.' . $ekey . '.comment', [
                                                        'label' => false, 'type' => 'text', 'templates' => 'dates_form',
                                                        'value' => $compliance->comment,
                                                    ]);
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default btn-sm remove-participant">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                    <?php
                                            $i++;
                                        }
                                    };
                                    ?>

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
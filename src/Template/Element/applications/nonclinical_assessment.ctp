<?php
$numb = 1;

use Cake\Utility\Hash;

if (!in_array($prefix, ['director_general', 'admin']) and count(array_filter(Hash::extract($application->evaluations, '{n}.chosen'), 'is_numeric')) < 1) {
    echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-non-clinical-review']]); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php
            echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
            //   Copy Edit
            echo $this->Form->control('non_clinical_pr_id', ['type' => 'hidden', 'value' => (!empty($application->non_clinicals[$ekey]['id']) ? $application->non_clinicals[$ekey]['id'] : 100), 'escape' => false, 'templates' => 'table_form']);
            if ($this->request->query('non_cnl_id')) {
                echo $this->Form->control('non_clinicals.' . $ekey . '.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
            } elseif ($this->request->query('non_cp_fn_cnl')) {
                echo $this->Form->control('non_clinicals.' . $ekey . '.submitted', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form', 'value' => 2]);
            } else {
                echo $this->Form->control('non_clinicals.' . $ekey . '.non_clinical_id', ['type' => 'hidden', 'value' => $non_clinical_id, 'templates' => 'table_form']);
                echo $this->Form->control('non_clinicals.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($non_clinical_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]);
            }

            // End of Copy Edit
            echo $this->Form->control('non_clinicals.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);

            ?>

            <table class="table table-bordered table-condensed">
                <thead>
                    <tr class="active">
                        <th></th>
                        <th>Pharmacology </th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">
                        <th></th>
                        <th>Primary pharmacodynamics </th>
                        <th width="22.5%"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The pharmacology studies provide the pharmacological basis for the proposed trial</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.basis_provided', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Were relevant in vitro and/or in vivo models studied?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.relevant_vitro_vivo', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the intended pharmacological effect expected/possible at clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.pharmacological_exposure', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Were pharmacologically active major metabolites identified?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.active_metabolites', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the IMP a first-in-class compound?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.imp_compound', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.primary_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Secondary pharmacodynamics </th>
                        <th width="22.5%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The studies described in this section identified off-target effects?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.off_target_identified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are off-target effects expected / possible at clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.off_target_effects', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.secondary_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Safety pharmacology </th>
                        <th width="22.5%">Major Findings</th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Cardiovascular
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.cardiovascular', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.cardiovascular_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Respiratory
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.respiratory', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.respiratory_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>CNS
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.cns', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.cns_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Other
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.other', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.other_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Did the safety pharmacology studies identify significant concerns?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.significant_concerns', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.planned_exposure', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.safety_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Pharmacodynamic drug interactions </th>
                        <th width="22.5%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Have potential pharmacodynamics drug interactions been identified?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.interactions_identified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.Pharmacodynamic_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Pharmacokinetics </th>
                        <th width="22.5%"></th>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Methods of analysis </th>
                        <th width="22.5%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are the methods of analysis and their sensitivities adequate?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.adequate_analysis', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.analysis_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Absorption, Distribution, Metabolism & Excretion </th>
                        <th width="35%">Major Findings</th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Absorption
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.absorption', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.absorption_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Distribution
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.distribution', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.distribution_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Metabolism
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.metabolism', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.metabolism_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Excretion
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.excretion', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.excretion_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do the ADME studies identify significant concerns?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.adme_concerns', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Major human metabolites were identified</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.major_metabolites', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Unique human metabolites were identified</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.unique_metabolites', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.pharmacokinetics_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Pharmacokinetic drug interactions (Enzymes, Transporter, other)</th>
                        <th width="35%">Major Findings</th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Enzyme inhibition
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.enzyme_inhibition', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.enzyme_inhibition_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Enzyme induction
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.enzyme_induction', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.enzyme_induction_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Transporter
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.transporter', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.transporter_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Co-pathways
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.co_pathways', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.co_pathways_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Potential for PK drug interactions is indicated at therapeutic dose</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.drug_interaction', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The potential interactions have been highlighted to investigators and relevant information is
                            included in the IB/study protocol</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.interaction_highlighted', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.drug_interaction_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Other pharmacokinetic studies (e.g. PK of metabolite, novel excipients, genomic integration and
                            inadvertent germline transmission of gene transfer vectors)</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Were other PK studies performed?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.pk_studies', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Do these studies identify concerns?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.concerns_identified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.identified_studies_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Toxicology</th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Animal species selection/Study design</th>
                        <th width="35%"></th>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Toxicologically relevant animal species studied</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.toxicologically_relevant', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The studied species show similar pharmacology to humans</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.human_pharmacology', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The studied species show similar PK to humans</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.human_pk', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The studies were sufficiently well-designed</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.well_designed_studies', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.toxicology_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Single dose toxicity</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Were significant toxicities identified?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.toxicities_identified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.sufficient_margins', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.single_dose_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Repeat-dose toxicity</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Were significant toxicities identified?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.repeat_toxicities_identified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.repeat_sufficient_margins', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Does the duration of treatment support the proposed trial duration?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.repeat_treatment_duration', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.repeat_dose_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Genotoxicity</th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">

                        <th> </th>
                        <th>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Type of test/study</p>
                                </div>
                                <div class="col-xs-6">
                                    Test system
                                </div>
                            </div>
                        </th>
                        <th width="35%">Results</th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Gene mutations in bacteria</p>
                                </div>
                                <div class="col-xs-6">
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.gene_mutations', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.gene_mutation_results', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Positive' => 'Positive', 'Negative' => 'Negative', 'Equivocal' => 'Equivocal']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>In vitro mammalian assay</p>
                                </div>
                                <div class="col-xs-6">
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.vitro_mammalian', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.vitro_mammalian_results', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Positive' => 'Positive', 'Negative' => 'Negative', 'Equivocal' => 'Equivocal']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>In vivo genotoxicity test</p>
                                </div>
                                <div class="col-xs-6">
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.vivo_genotoxicit', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.vivo_genotoxicit_results', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Positive' => 'Positive', 'Negative' => 'Negative', 'Equivocal' => 'Equivocal']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Additional assays</p>
                                </div>
                                <div class="col-xs-6">
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.additional_assays', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.additional_assays_results', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Positive' => 'Positive', 'Negative' => 'Negative', 'Equivocal' => 'Equivocal']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do the submitted data indicate genotoxic potential?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.potential_genotoxic', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.genotoxicity_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Carcinogenicity</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Do studies identify potential for carcinogenicity?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.carcinogenicity', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.carcinogenicity_exposure', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.carcinogenicity_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>



                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Reproductive and developmental toxicity Summary</th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">

                        <th> </th>
                        <th>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>System</p>
                                </div>
                                <div class="col-xs-6">
                                    Toxicities identified
                                </div>
                            </div>
                        </th>
                        <th width="35%">Findings</th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Fertility and early embryonic development</p>
                                </div>
                                <div class="col-xs-6">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.fertility', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>

                                </div>
                            </div>
                        </td>
                        <td> <?php
                                echo $this->Form->control('non_clinicals.' . $ekey . '.fertility_findings', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Embryo-fetal development</p>
                                </div>
                                <div class="col-xs-6">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.embryo_dev', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>

                                </div>
                            </div>
                        </td>
                        <td> <?php
                                echo $this->Form->control('non_clinicals.' . $ekey . '.embryo_dev_findings', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Prenatal and postnatal development, including maternal function</p>
                                </div>
                                <div class="col-xs-6">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.pre_post_natal', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>

                                </div>
                            </div>
                        </td>
                        <td> <?php
                                echo $this->Form->control('non_clinicals.' . $ekey . '.pre_post_natal_findings', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.reproductive_margins', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.reproductive_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>


                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Juvenile toxicity studies</th>
                        <th width="35%"></th>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The studies used animals in the appropriate age range</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.juvenile_age_range', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The studies identified additional/enhanced juvenile toxicities</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.enhanced_juvenile', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.planned_juvenile_exposure', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.juvenile_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Other studies (including enhanced PPND studies)</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The studies identified potential toxicities</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.other_potential_toxicities', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.other_potential_exposure', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.other_potential_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Recommendations for contraception measures</th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Non-clinical data summary</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-3">
                                    <label> IMP</label>
                                </div>
                                <div class="col-xs-9">
                                    (check off all that apply)
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.imp_teratogenic', ['type' => 'checkbox', 'label' => 'Suspected/ demonstrated teratogenic or fetotoxic effects', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.imp_genotoxic', ['type' => 'checkbox', 'label' => 'Genotoxic', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.imp_insufficient', ['type' => 'checkbox', 'label' => 'Insufficient data', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.imp_irelevant', ['type' => 'checkbox', 'label' => 'Demonstrated embryo-fetotoxic effects, which do not seem relevant to the CT participants', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.imp_nodata', ['type' => 'checkbox', 'label' => 'Sufficient data and no indication of risk', 'templates' => 'checkbox_form_ev']);
                                    ?>


                                </div>
                            </div>
                        </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>WOCBP/male partners of WOCBP are included in the proposed clinical trial</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.male_partners_included', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>According to the guidance issued by the Clinical Trials Facilitation Group on "Recommendations
                            related to contraception and pregnancy testing in clinical trials” the risk of
                            teratogenicity/fetotoxicity based on the non-clinical data is considered (please tick one)</td>
                        <td> <?php
                                echo $this->Form->control('non_clinicals.' . $ekey . '.considered_suspected', ['type' => 'checkbox', 'label' => 'Demonstrated/Suspected', 'templates' => 'checkbox_form_ev']);
                                ?>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.considered_possible', ['type' => 'checkbox', 'label' => 'Possible', 'templates' => 'checkbox_form_ev']);
                            ?>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.considered_unlikely', ['type' => 'checkbox', 'label' => 'Unlikely', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.imp_assessor_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Local tolerance</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do the submitted studies indicate a potential for local toxicity?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.local_toxicity', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.local_toxicity_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Other toxicity studies</th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>
                            <div class="row">
                                <div class="col-xs-7">
                                    Dedicated Study
                                </div>
                                <div class="col-xs-5">
                                    Toxicities identified
                                </div>
                        </th>

                        <th width="35%">Findings</th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">
                                    Phototoxicity
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_phototoxic', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_phototoxic_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">
                                    Tissue cross reactivity
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_tissue', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_tissue_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Antigenicity
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_antigenicity', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_antigenicity_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Immuno-toxicity
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_imuno', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_imuno_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Dependence
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_dependence', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_dependence_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Metabolites
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_metabolites', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_metabolites_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Impurities
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_impurities', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_impurities_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Other
                                </div>

                                <div class="col-xs-5">
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.std_other', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control('non_clinicals.' . $ekey . '.std_other_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.other_toxicity_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Additional Considerations</th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> First in human trials</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the starting dose adequately justified?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.fih_dose', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Are the dose steps adequately justified?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.fih_dose_steps', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the maximum dose adequately justified?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.fih_dose_max', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.fih_dose_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> GLP aspects</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Were all pivotal safety studies performed in line with the good laboratory practices (GLP) of
                            the Organization for Economic Cooperation and Development? Were the studies performed in a
                            country that is a member of OECD Mutual Acceptance of Data (MAD) for GLP?</td>
                        <td>
                            <?= $this->Form->control('non_clinicals.' . $ekey . '.glp_aspects', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.glp_aspects_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>


                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th> Assessor’s Overall Conclusions on the non-clinical part</th>
                        <th width="35%"></th>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> <?php
                                echo $this->Form->control('non_clinicals.' . $ekey . '.non_clinical_acceptable', ['type' => 'checkbox', 'label' => 'The non-clinical data provided are acceptable', 'templates' => 'checkbox_form_ev']);
                                ?></td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> <?php
                                echo $this->Form->control('non_clinicals.' . $ekey . '.supplementary_info_needed', ['type' => 'checkbox', 'label' => ' Supplementary information needs to be provided (refer
                                to the list of requests for additional information)', 'templates' => 'checkbox_form_ev']);
                                ?></td>
                        <td> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.overall_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> REQUESTS FOR ADDITIONAL INFORMATION:</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.additional', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>File Attachment</label>
                                    <?php
                                    echo $this->Form->control('non_clinicals.' . $ekey . '.file', ['type' => 'file', 'label' => false, 'escape' => false, 'templates' => 'table_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php if ($prefix == 'evaluator' || $prefix == 'manager') { ?>
                <button type="submit" class="btn btn-info active" id="ev-save-changes" name="ev_save" value="1"><i class="fa fa-save" aria-hidden="true"></i> Save Changes</button>
            <?php } ?>
            <button type="submit" class="btn btn-primary active" id="ev-submit" name="ev_save" value="2"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
            <?php
            echo $this->Html->link('<i class="fa fa-remove" aria-hidden="true"></i> Reset', [], ['escape' => false, 'class' => 'btn btn-default']);
            ?>
        </div>
    </div>
<?php
    echo $this->Form->end();
}
?>
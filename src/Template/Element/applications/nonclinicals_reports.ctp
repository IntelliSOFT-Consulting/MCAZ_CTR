<?php

use Cake\Utility\Hash;

$numb = 1;
$checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
$nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';

if ($prefix === 'manager') {
    $this->Html->css('bootstrap-editable', ['block' => true]);
    $this->Html->css('bootstrap/common_header', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
    $this->Html->script('bootstrap/evaluation_report', ['block' => true]);
    //--wysiwyg editor    
    $this->Html->css('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5-0.3.0', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5', ['block' => true]);
}

?>
<div class="row">
    <div class="col-xs-12">
        <?php
        foreach ($non_clinicals as $nonclinical) { ?>

        <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse"
                href="#<?= $nonclinical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false"
                aria-controls="<?= $nonclinical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
                Assessed on: <?= $nonclinical['created'] ?> by <?= $nonclinical->user->name ?>
            </a>
            <?php
                if ($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'review', '_ext' => 'pdf', $nonclinical->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
                ?>
        </div>
        <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>"
            id="<?= $nonclinical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr class="active">
                        <th></th>
                        <th>Pharmacolog </th>
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
                            <?= $nonclinical->basis_provided ?></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Were relevant in vitro and/or in vivo models studied?</td>
                        <td> <?= $nonclinical->relevant_vitro_vivo ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the intended pharmacological effect expected/possible at clinical exposure?</td>
                        <td> <?= $nonclinical->pharmacological_exposure ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Were pharmacologically active major metabolites identified?</td>
                        <td><?= $nonclinical->active_metabolites ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the IMP a first-in-class compound?</td>
                        <td> <?= $nonclinical->imp_compound ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->primary_comment ?>

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
                        <td> <?= $nonclinical->off_target_identified ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are off-target effects expected / possible at clinical exposure?</td>
                        <td> <?= $nonclinical->off_target_effects ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br> <?= $nonclinical->secondary_comment ?>

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
                                    <?= $nonclinical->cardiovascular ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->cardiovascular_comments ?>
                        </td>
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
                                    <?= $nonclinical->respiratory ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->respiratory_comments ?>
                        </td>
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
                                    <?= $nonclinical->cns ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->cns_comments ?>
                        </td>
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
                                    <?= $nonclinical->other ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->other_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Did the safety pharmacology studies identify significant concerns?</td>
                        <td> <?= $nonclinical->significant_concerns ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td> <?= $nonclinical->planned_exposure ?>
                        </td>
                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->safety_comment ?>

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
                        <td> <?= $nonclinical->interactions_identified ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->Pharmacodynamic_comment ?>

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
                        <td> <?= $nonclinical->adequate_analysis ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->analysis_comment ?>

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
                                    <?= $nonclinical->absorption ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->absorption_comments ?>
                        </td>
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
                                    <?= $nonclinical->distribution ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $nonclinical->distribution_comments ?>
                        </td>
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
                                    <?= $nonclinical->metabolism ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->metabolism_comments ?>
                        </td>
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
                                    <?= $nonclinical->excretion ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $nonclinical->excretion_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do the ADME studies identify significant concerns?</td>
                        <td> <?= $nonclinical->adme_concerns ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Major human metabolites were identified</td>
                        <td> <?= $nonclinical->major_metabolites ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Unique human metabolites were identified</td>
                        <td> <?= $nonclinical->unique_metabolites ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->pharmacokinetics_comment ?>

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
                                    <?= $nonclinical->enzyme_inhibition ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $nonclinical->enzyme_inhibition_comments ?>
                        </td>
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
                                    <?= $nonclinical->enzyme_induction ?>
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.', [
                                            'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                        ]); ?>
                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->enzyme_induction_comments ?>
                        </td>
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
                                    <?= $nonclinical->transporter ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->transporter_comments ?>
                        </td>
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
                                    <?= $nonclinical->co_pathways ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->co_pathways_comments ?>

                        </td>
                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Potential for PK drug interactions is indicated at therapeutic dose</td>
                        <td><?= $nonclinical->drug_interaction ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The potential interactions have been highlighted to investigators and relevant information
                            is
                            included in the IB/study protocol</td>
                        <td> <?= $nonclinical->interaction_highlighted ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->drug_interaction_comment ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">

                        <th> <?php $numb = 1; ?></th>
                        <th>Other pharmacokinetic studies (e.g. PK of metabolite, novel excipients, genomic integration
                            and
                            inadvertent germline transmission of gene transfer vectors)</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Were other PK studies performed?</td>
                        <td> <?= $nonclinical->pk_studies ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Do these studies identify concerns?</td>
                        <td> <?= $nonclinical->concerns_identified ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->identified_studies_comment ?>

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
                        <td> <?= $nonclinical->toxicologically_relevant ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The studied species show similar pharmacology to humans</td>
                        <td> <?= $nonclinical->human_pharmacology ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The studied species show similar PK to humans</td>
                        <td> <?= $nonclinical->human_pk ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The studies were sufficiently well-designed</td>
                        <td> <?= $nonclinical->well_designed_studies ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->toxicology_comment ?>

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
                        <td> <?= $nonclinical->toxicities_identified ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td> <?= $nonclinical->sufficient_margins ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->single_dose_comment ?>

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
                        <td> <?= $nonclinical->repeat_toxicities_identified ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td> <?= $nonclinical->repeat_sufficient_margins ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Does the duration of treatment support the proposed trial duration?</td>
                        <td> <?= $nonclinical->repeat_treatment_duration ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->repeat_dose_comment ?>

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
                                    <?= $nonclinical->gene_mutations ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $nonclinical->gene_mutation_results ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>In vitro mammalian assay</p>
                                </div>
                                <div class="col-xs-6">
                                    <?= $nonclinical->vitro_mammalian ?>


                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->vitro_mammalian_results ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>In vivo genotoxicity test</p>
                                </div>
                                <div class="col-xs-6">
                                    <?= $nonclinical->vivo_genotoxicit ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->vivo_genotoxicit_results ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Additional assays</p>
                                </div>
                                <div class="col-xs-6">
                                    <?= $nonclinical->additional_assays ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->additional_assays_results ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do the submitted data indicate genotoxic potential?</td>
                        <td> <?= $nonclinical->potential_genotoxic ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->genotoxicity_comment ?>

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
                        <td> <?= $nonclinical->carcinogenicity ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td> <?= $nonclinical->carcinogenicity_exposure ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->carcinogenicity_comment ?>

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
                                    <?= $nonclinical->fertility ?>
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.', [
                                            'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                        ]); ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $nonclinical->fertility_findings ?>

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
                                    <?= $nonclinical->embryo_dev ?>


                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->embryo_dev_findings ?>

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
                                    <?= $nonclinical->pre_post_natal ?>


                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->pre_post_natal_findings ?>


                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td> <?= $nonclinical->reproductive_margins ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->reproductive_comment ?>

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
                        <td> <?= $nonclinical->juvenile_age_range ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The studies identified additional/enhanced juvenile toxicities</td>
                        <td> <?= $nonclinical->enhanced_juvenile ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td> <?= $nonclinical->planned_juvenile_exposure ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->juvenile_comment ?>

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
                        <td> <?= $nonclinical->other_potential_toxicities ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Do sufficient margins of exposure exist for planned clinical exposure?</td>
                        <td> <?= $nonclinical->other_potential_exposure ?>

                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->other_potential_comment ?>

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
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($nonclinical->imp_teratogenic) ? $checked : $nChecked; ?>
                                            Suspected/ demonstrated teratogenic or fetotoxic effects <br>
                                        </span>

                                    </div>
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($nonclinical->imp_genotoxic) ? $checked : $nChecked; ?>
                                            Genotoxic <br>
                                        </span>

                                    </div>
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($nonclinical->imp_insufficient) ? $checked : $nChecked; ?>
                                            Insufficient data <br>
                                        </span>

                                    </div>
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($nonclinical->imp_irelevant) ? $checked : $nChecked; ?>
                                            Demonstrated embryo-fetotoxic effects, which do not seem relevant to the CT
                                            participants <br>
                                        </span>

                                    </div>
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($nonclinical->imp_nodata) ? $checked : $nChecked; ?>
                                            'Sufficient data and no indication of risk <br>
                                        </span>

                                    </div>


                                </div>
                            </div>
                        </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>WOCBP/male partners of WOCBP are included in the proposed clinical trial</td>
                        <td> <?= $nonclinical->male_partners_included ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>According to the guidance issued by the Clinical Trials Facilitation Group on
                            "Recommendations
                            related to contraception and pregnancy testing in clinical trials” the risk of
                            teratogenicity/fetotoxicity based on the non-clinical data is considered (please tick one)
                        </td>
                        <td>

                            <div class="entry">
                                <span class="editer">
                                    <?= ($nonclinical->considered_suspected) ? $checked : $nChecked; ?>
                                    Demonstrated/Suspected<br>
                                </span>

                            </div>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($nonclinical->considered_possible) ? $checked : $nChecked; ?>
                                    Possible<br>
                                </span>

                            </div>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($nonclinical->considered_unlikely) ? $checked : $nChecked; ?>
                                    Unlikely<br>
                                </span>

                            </div>


                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->imp_assessor_comment ?>

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
                        <td> <?= $nonclinical->local_toxicity ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->local_toxicity_comments ?>

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
                                    <?= $nonclinical->std_phototoxic ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_phototoxic_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">
                                    Tissue cross reactivity
                                </div>

                                <div class="col-xs-5">
                                    <?= $nonclinical->std_tissue ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_tissue_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Antigenicity
                                </div>

                                <div class="col-xs-5">
                                    <?= $nonclinical->std_antigenicity ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_antigenicity_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Immuno-toxicity
                                </div>

                                <div class="col-xs-5">
                                    <?= $nonclinical->std_imuno ?>
                                    <?= $this->Form->control('non_clinicals.' . $ekey . '.', [
                                            'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                        ]); ?>
                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_imuno_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Dependence
                                </div>

                                <div class="col-xs-5">
                                    <?= $nonclinical->std_dependence ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_dependence_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Metabolites
                                </div>

                                <div class="col-xs-5">
                                    <?= $nonclinical->std_metabolites ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_metabolites_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Impurities
                                </div>

                                <div class="col-xs-5">
                                    <?= $nonclinical->std_impurities ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_impurities_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7">Other
                                </div>

                                <div class="col-xs-5">
                                    <?= $nonclinical->std_other ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $nonclinical->std_other_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->other_toxicity_comments ?>

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
                        <td> <?= $nonclinical->fih_dose ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Are the dose steps adequately justified?</td>
                        <td> <?= $nonclinical->fih_dose_steps ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the maximum dose adequately justified?</td>
                        <td> <?= $nonclinical->fih_dose_max ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->fih_dose_comments ?>

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
                        <td> Were all pivotal safety studies performed in line with the good laboratory practices (GLP)
                            of
                            the Organization for Economic Cooperation and Development? Were the studies performed in a
                            country that is a member of OECD Mutual Acceptance of Data (MAD) for GLP?</td>
                        <td> <?= $nonclinical->glp_aspects ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->glp_aspects_comments ?>

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
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($nonclinical->non_clinical_acceptable) ? $checked : $nChecked; ?>
                                    The non-clinical data provided are acceptable<br>
                                </span>

                            </div>
                        </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($nonclinical->supplementary_info_needed) ? $checked : $nChecked; ?>
                                    Supplementary information needs to be provided (refer to the list of requests for
                                    additional information)<br>
                                </span>

                            </div>

                        </td>
                        <td> </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $nonclinical->overall_comments ?>


                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
                if ($this->request->params['_ext'] != 'pdf') {
                    if ($prefix == 'manager' or $nonclinical->user_id == $this->request->session()->read('Auth.User.id')) {
                        echo    $this->Form->postLink(
                            '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                            ['action' => 'remove-nonclinical-assessment', $nonclinical->id],
                            [
                                'confirm' => 'Are you sure you want to delete this nonclinical assessment for ' . $application->protocol_no . '?', 'escape' => false,
                                'class' => 'btn btn-warning btn-xs active'
                            ]
                        );
                    }
                }
                ?>
        </div>
        <?php } ?>

    </div>
</div>
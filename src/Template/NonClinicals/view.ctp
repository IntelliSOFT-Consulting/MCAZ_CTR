<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NonClinical $nonClinical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Non Clinical'), ['action' => 'edit', $nonClinical->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Non Clinical'), ['action' => 'delete', $nonClinical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nonClinical->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Non Clinicals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Non Clinical'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nonClinicals view large-9 medium-8 columns content">
    <h3><?= h($nonClinical->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $nonClinical->has('application') ? $this->Html->link($nonClinical->application->id, ['controller' => 'Applications', 'action' => 'view', $nonClinical->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $nonClinical->has('user') ? $this->Html->link($nonClinical->user->name, ['controller' => 'Users', 'action' => 'view', $nonClinical->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Basis Provided') ?></th>
            <td><?= h($nonClinical->basis_provided) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relevant Vitro Vivo') ?></th>
            <td><?= h($nonClinical->relevant_vitro_vivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pharmacological Exposure') ?></th>
            <td><?= h($nonClinical->pharmacological_exposure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Metabolites') ?></th>
            <td><?= h($nonClinical->active_metabolites) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imp Compound') ?></th>
            <td><?= h($nonClinical->imp_compound) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Off Target Identified') ?></th>
            <td><?= h($nonClinical->off_target_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Off Target Effects') ?></th>
            <td><?= h($nonClinical->off_target_effects) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cardiovascular') ?></th>
            <td><?= h($nonClinical->cardiovascular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Respiratory') ?></th>
            <td><?= h($nonClinical->respiratory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cns') ?></th>
            <td><?= h($nonClinical->cns) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other') ?></th>
            <td><?= h($nonClinical->other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Significant Concerns') ?></th>
            <td><?= h($nonClinical->significant_concerns) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Planned Exposure') ?></th>
            <td><?= h($nonClinical->planned_exposure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interactions Identified') ?></th>
            <td><?= h($nonClinical->interactions_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adequate Analysis') ?></th>
            <td><?= h($nonClinical->adequate_analysis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Absorption') ?></th>
            <td><?= h($nonClinical->absorption) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distribution') ?></th>
            <td><?= h($nonClinical->distribution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Metabolism') ?></th>
            <td><?= h($nonClinical->metabolism) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Excretion') ?></th>
            <td><?= h($nonClinical->excretion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adme Concerns') ?></th>
            <td><?= h($nonClinical->adme_concerns) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Major Metabolites') ?></th>
            <td><?= h($nonClinical->major_metabolites) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unique Metabolites') ?></th>
            <td><?= h($nonClinical->unique_metabolites) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enzyme Inhibition') ?></th>
            <td><?= h($nonClinical->enzyme_inhibition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enzyme Induction') ?></th>
            <td><?= h($nonClinical->enzyme_induction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transporter') ?></th>
            <td><?= h($nonClinical->transporter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Co Pathways') ?></th>
            <td><?= h($nonClinical->co_pathways) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Interaction') ?></th>
            <td><?= h($nonClinical->drug_interaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interaction Highlighted') ?></th>
            <td><?= h($nonClinical->interaction_highlighted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pk Studies') ?></th>
            <td><?= h($nonClinical->pk_studies) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Concerns Identified') ?></th>
            <td><?= h($nonClinical->concerns_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Toxicologically Relevant') ?></th>
            <td><?= h($nonClinical->toxicologically_relevant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Human Pharmacology') ?></th>
            <td><?= h($nonClinical->human_pharmacology) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Human Pk') ?></th>
            <td><?= h($nonClinical->human_pk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Well Designed Studies') ?></th>
            <td><?= h($nonClinical->well_designed_studies) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Toxicities Identified') ?></th>
            <td><?= h($nonClinical->toxicities_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sufficient Margins') ?></th>
            <td><?= h($nonClinical->sufficient_margins) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repeat Toxicities Identified') ?></th>
            <td><?= h($nonClinical->repeat_toxicities_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repeat Sufficient Margins') ?></th>
            <td><?= h($nonClinical->repeat_sufficient_margins) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repeat Treatment Duration') ?></th>
            <td><?= h($nonClinical->repeat_treatment_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gene Mutation Results') ?></th>
            <td><?= h($nonClinical->gene_mutation_results) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vitro Mammalian Results') ?></th>
            <td><?= h($nonClinical->vitro_mammalian_results) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vivo Genotoxicit Results') ?></th>
            <td><?= h($nonClinical->vivo_genotoxicit_results) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Additional Assays Results') ?></th>
            <td><?= h($nonClinical->additional_assays_results) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Potential Genotoxic') ?></th>
            <td><?= h($nonClinical->potential_genotoxic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Carcinogenicity') ?></th>
            <td><?= h($nonClinical->carcinogenicity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Carcinogenicity Exposure') ?></th>
            <td><?= h($nonClinical->carcinogenicity_exposure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fertility') ?></th>
            <td><?= h($nonClinical->fertility) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Embryo Dev') ?></th>
            <td><?= h($nonClinical->embryo_dev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pre Post Natal') ?></th>
            <td><?= h($nonClinical->pre_post_natal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reproductive Margins') ?></th>
            <td><?= h($nonClinical->reproductive_margins) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Juvenile Age Range') ?></th>
            <td><?= h($nonClinical->juvenile_age_range) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enhanced Juvenile') ?></th>
            <td><?= h($nonClinical->enhanced_juvenile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Planned Juvenile Exposure') ?></th>
            <td><?= h($nonClinical->planned_juvenile_exposure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Potential Toxicities') ?></th>
            <td><?= h($nonClinical->other_potential_toxicities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Potential Exposure') ?></th>
            <td><?= h($nonClinical->other_potential_exposure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Male Partners Included') ?></th>
            <td><?= h($nonClinical->male_partners_included) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Local Toxicity') ?></th>
            <td><?= h($nonClinical->local_toxicity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Phototoxic') ?></th>
            <td><?= h($nonClinical->std_phototoxic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Tissue') ?></th>
            <td><?= h($nonClinical->std_tissue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Antigenicity') ?></th>
            <td><?= h($nonClinical->std_antigenicity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Imuno') ?></th>
            <td><?= h($nonClinical->std_imuno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Dependence') ?></th>
            <td><?= h($nonClinical->std_dependence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Metabolites') ?></th>
            <td><?= h($nonClinical->std_metabolites) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Impurities') ?></th>
            <td><?= h($nonClinical->std_impurities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Std Other') ?></th>
            <td><?= h($nonClinical->std_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fih Dose') ?></th>
            <td><?= h($nonClinical->fih_dose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fih Dose Steps') ?></th>
            <td><?= h($nonClinical->fih_dose_steps) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fih Dose Max') ?></th>
            <td><?= h($nonClinical->fih_dose_max) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Glp Aspects') ?></th>
            <td><?= h($nonClinical->glp_aspects) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nonClinical->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chosen') ?></th>
            <td><?= $this->Number->format($nonClinical->chosen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($nonClinical->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($nonClinical->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imp Teratogenic') ?></th>
            <td><?= $nonClinical->imp_teratogenic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imp Genotoxic') ?></th>
            <td><?= $nonClinical->imp_genotoxic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imp Insufficient') ?></th>
            <td><?= $nonClinical->imp_insufficient ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imp Irelevant') ?></th>
            <td><?= $nonClinical->imp_irelevant ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imp Nodata') ?></th>
            <td><?= $nonClinical->imp_nodata ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Considered Suspected') ?></th>
            <td><?= $nonClinical->considered_suspected ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Considered Possible') ?></th>
            <td><?= $nonClinical->considered_possible ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Considered Unlikely') ?></th>
            <td><?= $nonClinical->considered_unlikely ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Non Clinical Acceptable') ?></th>
            <td><?= $nonClinical->non_clinical_acceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplementary Info Needed') ?></th>
            <td><?= $nonClinical->supplementary_info_needed ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Primary Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->primary_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Secondary Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->secondary_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cardiovascular Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->cardiovascular_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Respiratory Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->respiratory_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pharmacology Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->pharmacology_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cns Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->cns_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->other_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Safety Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->safety_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pharmacodynamic Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->Pharmacodynamic_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analysis Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->analysis_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Absorption Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->absorption_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Distribution Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->distribution_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Metabolism Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->metabolism_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Excretion Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->excretion_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pharmacokinetics Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->pharmacokinetics_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Enzyme Inhibition Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->enzyme_inhibition_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Enzyme Induction Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->enzyme_induction_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Transporter Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->transporter_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Co Pathways Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->co_pathways_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Drug Interaction Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->drug_interaction_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Identified Studies Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->identified_studies_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Toxicology Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->toxicology_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Single Dose Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->single_dose_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Repeat Dose Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->repeat_dose_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gene Mutations') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->gene_mutations)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vitro Mammalian') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->vitro_mammalian)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vivo Genotoxicit') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->vivo_genotoxicit)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional Assays') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->additional_assays)); ?>
    </div>
    <div class="row">
        <h4><?= __('Genotoxicity Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->genotoxicity_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Carcinogenicity Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->carcinogenicity_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Fertility Findings') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->fertility_findings)); ?>
    </div>
    <div class="row">
        <h4><?= __('Embryo Dev Findings') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->embryo_dev_findings)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pre Post Natal Findings') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->pre_post_natal_findings)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reproductive Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->reproductive_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Juvenile Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->juvenile_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Potential Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->other_potential_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Imp Assessor Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->imp_assessor_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Local Toxicity Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->local_toxicity_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Phototoxic Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_phototoxic_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Tissue Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_tissue_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Antigenicity Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_antigenicity_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Imuno Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_imuno_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Dependence Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_dependence_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Metabolites Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_metabolites_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Impurities Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_impurities_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Std Other Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->std_other_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Toxicity Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->other_toxicity_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Fih Dose Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->fih_dose_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Glp Aspects Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->glp_aspects_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Overall Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->overall_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional') ?></h4>
        <?= $this->Text->autoParagraph(h($nonClinical->additional)); ?>
    </div>
</div>

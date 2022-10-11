<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NonClinical $nonClinical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nonClinical->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nonClinical->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Non Clinicals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nonClinicals form large-9 medium-8 columns content">
    <?= $this->Form->create($nonClinical) ?>
    <fieldset>
        <legend><?= __('Edit Non Clinical') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('basis_provided');
            echo $this->Form->control('primary_comment');
            echo $this->Form->control('relevant_vitro_vivo');
            echo $this->Form->control('pharmacological_exposure');
            echo $this->Form->control('active_metabolites');
            echo $this->Form->control('imp_compound');
            echo $this->Form->control('off_target_identified');
            echo $this->Form->control('off_target_effects');
            echo $this->Form->control('secondary_comment');
            echo $this->Form->control('cardiovascular');
            echo $this->Form->control('cardiovascular_comments');
            echo $this->Form->control('respiratory');
            echo $this->Form->control('respiratory_comments');
            echo $this->Form->control('pharmacology_comment');
            echo $this->Form->control('cns');
            echo $this->Form->control('cns_comments');
            echo $this->Form->control('other');
            echo $this->Form->control('other_comments');
            echo $this->Form->control('significant_concerns');
            echo $this->Form->control('planned_exposure');
            echo $this->Form->control('safety_comment');
            echo $this->Form->control('interactions_identified');
            echo $this->Form->control('Pharmacodynamic_comment');
            echo $this->Form->control('adequate_analysis');
            echo $this->Form->control('analysis_comment');
            echo $this->Form->control('absorption');
            echo $this->Form->control('absorption_comments');
            echo $this->Form->control('distribution');
            echo $this->Form->control('distribution_comments');
            echo $this->Form->control('metabolism');
            echo $this->Form->control('metabolism_comments');
            echo $this->Form->control('excretion');
            echo $this->Form->control('excretion_comments');
            echo $this->Form->control('adme_concerns');
            echo $this->Form->control('major_metabolites');
            echo $this->Form->control('unique_metabolites');
            echo $this->Form->control('pharmacokinetics_comment');
            echo $this->Form->control('enzyme_inhibition');
            echo $this->Form->control('enzyme_inhibition_comments');
            echo $this->Form->control('enzyme_induction');
            echo $this->Form->control('enzyme_induction_comments');
            echo $this->Form->control('transporter');
            echo $this->Form->control('transporter_comments');
            echo $this->Form->control('co_pathways');
            echo $this->Form->control('co_pathways_comments');
            echo $this->Form->control('drug_interaction');
            echo $this->Form->control('interaction_highlighted');
            echo $this->Form->control('drug_interaction_comment');
            echo $this->Form->control('pk_studies');
            echo $this->Form->control('concerns_identified');
            echo $this->Form->control('identified_studies_comment');
            echo $this->Form->control('toxicologically_relevant');
            echo $this->Form->control('human_pharmacology');
            echo $this->Form->control('human_pk');
            echo $this->Form->control('well_designed_studies');
            echo $this->Form->control('toxicology_comment');
            echo $this->Form->control('toxicities_identified');
            echo $this->Form->control('sufficient_margins');
            echo $this->Form->control('single_dose_comment');
            echo $this->Form->control('repeat_toxicities_identified');
            echo $this->Form->control('repeat_sufficient_margins');
            echo $this->Form->control('repeat_treatment_duration');
            echo $this->Form->control('repeat_dose_comment');
            echo $this->Form->control('gene_mutations');
            echo $this->Form->control('gene_mutation_results');
            echo $this->Form->control('vitro_mammalian');
            echo $this->Form->control('vitro_mammalian_results');
            echo $this->Form->control('vivo_genotoxicit');
            echo $this->Form->control('vivo_genotoxicit_results');
            echo $this->Form->control('additional_assays');
            echo $this->Form->control('additional_assays_results');
            echo $this->Form->control('potential_genotoxic');
            echo $this->Form->control('genotoxicity_comment');
            echo $this->Form->control('carcinogenicity');
            echo $this->Form->control('carcinogenicity_exposure');
            echo $this->Form->control('carcinogenicity_comment');
            echo $this->Form->control('fertility');
            echo $this->Form->control('fertility_findings');
            echo $this->Form->control('embryo_dev');
            echo $this->Form->control('embryo_dev_findings');
            echo $this->Form->control('pre_post_natal');
            echo $this->Form->control('pre_post_natal_findings');
            echo $this->Form->control('reproductive_margins');
            echo $this->Form->control('reproductive_comment');
            echo $this->Form->control('juvenile_age_range');
            echo $this->Form->control('enhanced_juvenile');
            echo $this->Form->control('planned_juvenile_exposure');
            echo $this->Form->control('juvenile_comment');
            echo $this->Form->control('other_potential_toxicities');
            echo $this->Form->control('other_potential_exposure');
            echo $this->Form->control('other_potential_comment');
            echo $this->Form->control('imp_teratogenic');
            echo $this->Form->control('imp_genotoxic');
            echo $this->Form->control('imp_insufficient');
            echo $this->Form->control('imp_irelevant');
            echo $this->Form->control('imp_nodata');
            echo $this->Form->control('male_partners_included');
            echo $this->Form->control('considered_suspected');
            echo $this->Form->control('considered_possible');
            echo $this->Form->control('considered_unlikely');
            echo $this->Form->control('imp_assessor_comment');
            echo $this->Form->control('local_toxicity');
            echo $this->Form->control('local_toxicity_comments');
            echo $this->Form->control('std_phototoxic');
            echo $this->Form->control('std_phototoxic_comments');
            echo $this->Form->control('std_tissue');
            echo $this->Form->control('std_tissue_comments');
            echo $this->Form->control('std_antigenicity');
            echo $this->Form->control('std_antigenicity_comments');
            echo $this->Form->control('std_imuno');
            echo $this->Form->control('std_imuno_comments');
            echo $this->Form->control('std_dependence');
            echo $this->Form->control('std_dependence_comments');
            echo $this->Form->control('std_metabolites');
            echo $this->Form->control('std_metabolites_comments');
            echo $this->Form->control('std_impurities');
            echo $this->Form->control('std_impurities_comments');
            echo $this->Form->control('std_other');
            echo $this->Form->control('std_other_comments');
            echo $this->Form->control('other_toxicity_comments');
            echo $this->Form->control('fih_dose');
            echo $this->Form->control('fih_dose_steps');
            echo $this->Form->control('fih_dose_max');
            echo $this->Form->control('fih_dose_comments');
            echo $this->Form->control('glp_aspects');
            echo $this->Form->control('glp_aspects_comments');
            echo $this->Form->control('non_clinical_acceptable');
            echo $this->Form->control('supplementary_info_needed');
            echo $this->Form->control('overall_comments');
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('additional');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

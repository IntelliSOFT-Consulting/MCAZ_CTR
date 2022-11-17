<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NonClinical[]|\Cake\Collection\CollectionInterface $nonClinicals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Non Clinical'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nonClinicals index large-9 medium-8 columns content">
    <h3><?= __('Non Clinicals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('non_clinical_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evaluation_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('basis_provided') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relevant_vitro_vivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pharmacological_exposure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active_metabolites') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imp_compound') ?></th>
                <th scope="col"><?= $this->Paginator->sort('off_target_identified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('off_target_effects') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cardiovascular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('respiratory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cns') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('significant_concerns') ?></th>
                <th scope="col"><?= $this->Paginator->sort('planned_exposure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interactions_identified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adequate_analysis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('absorption') ?></th>
                <th scope="col"><?= $this->Paginator->sort('distribution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('metabolism') ?></th>
                <th scope="col"><?= $this->Paginator->sort('excretion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adme_concerns') ?></th>
                <th scope="col"><?= $this->Paginator->sort('major_metabolites') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unique_metabolites') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enzyme_inhibition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enzyme_induction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transporter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('co_pathways') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_interaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interaction_highlighted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pk_studies') ?></th>
                <th scope="col"><?= $this->Paginator->sort('concerns_identified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('toxicologically_relevant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('human_pharmacology') ?></th>
                <th scope="col"><?= $this->Paginator->sort('human_pk') ?></th>
                <th scope="col"><?= $this->Paginator->sort('well_designed_studies') ?></th>
                <th scope="col"><?= $this->Paginator->sort('toxicities_identified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sufficient_margins') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repeat_toxicities_identified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repeat_sufficient_margins') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repeat_treatment_duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gene_mutation_results') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vitro_mammalian_results') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vivo_genotoxicit_results') ?></th>
                <th scope="col"><?= $this->Paginator->sort('additional_assays_results') ?></th>
                <th scope="col"><?= $this->Paginator->sort('potential_genotoxic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('carcinogenicity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('carcinogenicity_exposure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fertility') ?></th>
                <th scope="col"><?= $this->Paginator->sort('embryo_dev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pre_post_natal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reproductive_margins') ?></th>
                <th scope="col"><?= $this->Paginator->sort('juvenile_age_range') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enhanced_juvenile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('planned_juvenile_exposure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_potential_toxicities') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_potential_exposure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imp_teratogenic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imp_genotoxic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imp_insufficient') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imp_irelevant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imp_nodata') ?></th>
                <th scope="col"><?= $this->Paginator->sort('male_partners_included') ?></th>
                <th scope="col"><?= $this->Paginator->sort('considered_suspected') ?></th>
                <th scope="col"><?= $this->Paginator->sort('considered_possible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('considered_unlikely') ?></th>
                <th scope="col"><?= $this->Paginator->sort('local_toxicity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_phototoxic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_tissue') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_antigenicity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_imuno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_dependence') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_metabolites') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_impurities') ?></th>
                <th scope="col"><?= $this->Paginator->sort('std_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fih_dose') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fih_dose_steps') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fih_dose_max') ?></th>
                <th scope="col"><?= $this->Paginator->sort('glp_aspects') ?></th>
                <th scope="col"><?= $this->Paginator->sort('non_clinical_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplementary_info_needed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chosen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nonClinicals as $nonClinical): ?>
            <tr>
                <td><?= $this->Number->format($nonClinical->id) ?></td>
                <td><?= $nonClinical->has('application') ? $this->Html->link($nonClinical->application->id, ['controller' => 'Applications', 'action' => 'view', $nonClinical->application->id]) : '' ?></td>
                <td><?= $nonClinical->has('user') ? $this->Html->link($nonClinical->user->name, ['controller' => 'Users', 'action' => 'view', $nonClinical->user->id]) : '' ?></td>
                <td><?= $nonClinical->has('non_clinical') ? $this->Html->link($nonClinical->non_clinical->id, ['controller' => 'NonClinicals', 'action' => 'view', $nonClinical->non_clinical->id]) : '' ?></td>
                <td><?= h($nonClinical->evaluation_type) ?></td>
                <td><?= h($nonClinical->basis_provided) ?></td>
                <td><?= h($nonClinical->relevant_vitro_vivo) ?></td>
                <td><?= h($nonClinical->pharmacological_exposure) ?></td>
                <td><?= h($nonClinical->active_metabolites) ?></td>
                <td><?= h($nonClinical->imp_compound) ?></td>
                <td><?= h($nonClinical->off_target_identified) ?></td>
                <td><?= h($nonClinical->off_target_effects) ?></td>
                <td><?= h($nonClinical->cardiovascular) ?></td>
                <td><?= h($nonClinical->respiratory) ?></td>
                <td><?= h($nonClinical->cns) ?></td>
                <td><?= h($nonClinical->other) ?></td>
                <td><?= h($nonClinical->significant_concerns) ?></td>
                <td><?= h($nonClinical->planned_exposure) ?></td>
                <td><?= h($nonClinical->interactions_identified) ?></td>
                <td><?= h($nonClinical->adequate_analysis) ?></td>
                <td><?= h($nonClinical->absorption) ?></td>
                <td><?= h($nonClinical->distribution) ?></td>
                <td><?= h($nonClinical->metabolism) ?></td>
                <td><?= h($nonClinical->excretion) ?></td>
                <td><?= h($nonClinical->adme_concerns) ?></td>
                <td><?= h($nonClinical->major_metabolites) ?></td>
                <td><?= h($nonClinical->unique_metabolites) ?></td>
                <td><?= h($nonClinical->enzyme_inhibition) ?></td>
                <td><?= h($nonClinical->enzyme_induction) ?></td>
                <td><?= h($nonClinical->transporter) ?></td>
                <td><?= h($nonClinical->co_pathways) ?></td>
                <td><?= h($nonClinical->drug_interaction) ?></td>
                <td><?= h($nonClinical->interaction_highlighted) ?></td>
                <td><?= h($nonClinical->pk_studies) ?></td>
                <td><?= h($nonClinical->concerns_identified) ?></td>
                <td><?= h($nonClinical->toxicologically_relevant) ?></td>
                <td><?= h($nonClinical->human_pharmacology) ?></td>
                <td><?= h($nonClinical->human_pk) ?></td>
                <td><?= h($nonClinical->well_designed_studies) ?></td>
                <td><?= h($nonClinical->toxicities_identified) ?></td>
                <td><?= h($nonClinical->sufficient_margins) ?></td>
                <td><?= h($nonClinical->repeat_toxicities_identified) ?></td>
                <td><?= h($nonClinical->repeat_sufficient_margins) ?></td>
                <td><?= h($nonClinical->repeat_treatment_duration) ?></td>
                <td><?= h($nonClinical->gene_mutation_results) ?></td>
                <td><?= h($nonClinical->vitro_mammalian_results) ?></td>
                <td><?= h($nonClinical->vivo_genotoxicit_results) ?></td>
                <td><?= h($nonClinical->additional_assays_results) ?></td>
                <td><?= h($nonClinical->potential_genotoxic) ?></td>
                <td><?= h($nonClinical->carcinogenicity) ?></td>
                <td><?= h($nonClinical->carcinogenicity_exposure) ?></td>
                <td><?= h($nonClinical->fertility) ?></td>
                <td><?= h($nonClinical->embryo_dev) ?></td>
                <td><?= h($nonClinical->pre_post_natal) ?></td>
                <td><?= h($nonClinical->reproductive_margins) ?></td>
                <td><?= h($nonClinical->juvenile_age_range) ?></td>
                <td><?= h($nonClinical->enhanced_juvenile) ?></td>
                <td><?= h($nonClinical->planned_juvenile_exposure) ?></td>
                <td><?= h($nonClinical->other_potential_toxicities) ?></td>
                <td><?= h($nonClinical->other_potential_exposure) ?></td>
                <td><?= h($nonClinical->imp_teratogenic) ?></td>
                <td><?= h($nonClinical->imp_genotoxic) ?></td>
                <td><?= h($nonClinical->imp_insufficient) ?></td>
                <td><?= h($nonClinical->imp_irelevant) ?></td>
                <td><?= h($nonClinical->imp_nodata) ?></td>
                <td><?= h($nonClinical->male_partners_included) ?></td>
                <td><?= h($nonClinical->considered_suspected) ?></td>
                <td><?= h($nonClinical->considered_possible) ?></td>
                <td><?= h($nonClinical->considered_unlikely) ?></td>
                <td><?= h($nonClinical->local_toxicity) ?></td>
                <td><?= h($nonClinical->std_phototoxic) ?></td>
                <td><?= h($nonClinical->std_tissue) ?></td>
                <td><?= h($nonClinical->std_antigenicity) ?></td>
                <td><?= h($nonClinical->std_imuno) ?></td>
                <td><?= h($nonClinical->std_dependence) ?></td>
                <td><?= h($nonClinical->std_metabolites) ?></td>
                <td><?= h($nonClinical->std_impurities) ?></td>
                <td><?= h($nonClinical->std_other) ?></td>
                <td><?= h($nonClinical->fih_dose) ?></td>
                <td><?= h($nonClinical->fih_dose_steps) ?></td>
                <td><?= h($nonClinical->fih_dose_max) ?></td>
                <td><?= h($nonClinical->glp_aspects) ?></td>
                <td><?= h($nonClinical->non_clinical_acceptable) ?></td>
                <td><?= h($nonClinical->supplementary_info_needed) ?></td>
                <td><?= $this->Number->format($nonClinical->chosen) ?></td>
                <td><?= $this->Number->format($nonClinical->submitted) ?></td>
                <td><?= h($nonClinical->created) ?></td>
                <td><?= h($nonClinical->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nonClinical->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nonClinical->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nonClinical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nonClinical->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clinical[]|\Cake\Collection\CollectionInterface $clinicals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clinical'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clinicals index large-9 medium-8 columns content">
    <h3><?= __('Clinicals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clinical_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evaluation_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('low_intervention') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evidence_based') ?></th>
                <th scope="col"><?= $this->Paginator->sort('products_authorised') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poses_risk') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rationale_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('objective_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endpoint_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('secondary_objective_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('secondary_endpoint_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_health_participants') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_participants') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_adults') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_adolescent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_elderly') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_male') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_female') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adolescents_age_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('potential_contraception') ?></th>
                <th scope="col"><?= $this->Paginator->sort('potential_none_contraception') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inclusion_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exclusion_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vulnerable_population') ?></th>
                <th scope="col"><?= $this->Paginator->sort('justifiable_population') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clinical_benefit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imp_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comparator_usage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comparator_smpc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comparator_international') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comparator_publications') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comparator_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placebo_usage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placebo_justified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auxiliary_usage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auxiliary_justified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medical_device_justified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emergency_procedure_justified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('additional_measures') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teratogenicity_risk') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contraceptive_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('proposal_insufficient') ?></th>
                <th scope="col"><?= $this->Paginator->sort('male_participants') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contraception_treatment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pregnancy_interval') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pregnancy_test') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postmenopausal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_issue') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discontinuation_criteria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criteria_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permitted_concomitant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prohibited_concomitant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('procedures_adequate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('insufficient_frequency') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relevant_targets') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minimization_measures') ?></th>
                <th scope="col"><?= $this->Paginator->sort('risk_unacceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('insufficient_followup') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_safety') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rsi_included') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acceptable_document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acceptable_format') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dsmc_committee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arrangements_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_definition_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('collection_unacceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_policies_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unauthorised_unacceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('measures_unacceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breach_unacceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_protection') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recruitment_unacceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('risk_evaluation_unacceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('participants_protection_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('condition_unmonitored') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unsafeguarded_rights') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unmonitored_threshold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplementary_required') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chosen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clinicals as $clinical): ?>
            <tr>
                <td><?= $this->Number->format($clinical->id) ?></td>
                <td><?= $clinical->has('application') ? $this->Html->link($clinical->application->id, ['controller' => 'Applications', 'action' => 'view', $clinical->application->id]) : '' ?></td>
                <td><?= $clinical->has('user') ? $this->Html->link($clinical->user->name, ['controller' => 'Users', 'action' => 'view', $clinical->user->id]) : '' ?></td>
                <td><?= $clinical->has('clinical') ? $this->Html->link($clinical->clinical->id, ['controller' => 'Clinicals', 'action' => 'view', $clinical->clinical->id]) : '' ?></td>
                <td><?= h($clinical->evaluation_type) ?></td>
                <td><?= h($clinical->low_intervention) ?></td>
                <td><?= h($clinical->evidence_based) ?></td>
                <td><?= h($clinical->products_authorised) ?></td>
                <td><?= h($clinical->poses_risk) ?></td>
                <td><?= h($clinical->rationale_acceptable) ?></td>
                <td><?= h($clinical->objective_acceptable) ?></td>
                <td><?= h($clinical->endpoint_acceptable) ?></td>
                <td><?= h($clinical->secondary_objective_acceptable) ?></td>
                <td><?= h($clinical->secondary_endpoint_acceptable) ?></td>
                <td><?= h($clinical->study_health_participants) ?></td>
                <td><?= h($clinical->study_participants) ?></td>
                <td><?= h($clinical->study_adults) ?></td>
                <td><?= h($clinical->study_adolescent) ?></td>
                <td><?= h($clinical->study_elderly) ?></td>
                <td><?= h($clinical->study_male) ?></td>
                <td><?= h($clinical->study_female) ?></td>
                <td><?= h($clinical->adolescents_age_group) ?></td>
                <td><?= h($clinical->potential_contraception) ?></td>
                <td><?= h($clinical->potential_none_contraception) ?></td>
                <td><?= h($clinical->inclusion_acceptable) ?></td>
                <td><?= h($clinical->exclusion_acceptable) ?></td>
                <td><?= h($clinical->vulnerable_population) ?></td>
                <td><?= h($clinical->justifiable_population) ?></td>
                <td><?= h($clinical->clinical_benefit) ?></td>
                <td><?= h($clinical->imp_acceptable) ?></td>
                <td><?= h($clinical->comparator_usage) ?></td>
                <td><?= h($clinical->comparator_smpc) ?></td>
                <td><?= h($clinical->comparator_international) ?></td>
                <td><?= h($clinical->comparator_publications) ?></td>
                <td><?= h($clinical->comparator_acceptable) ?></td>
                <td><?= h($clinical->placebo_usage) ?></td>
                <td><?= h($clinical->placebo_justified) ?></td>
                <td><?= h($clinical->auxiliary_usage) ?></td>
                <td><?= h($clinical->auxiliary_justified) ?></td>
                <td><?= h($clinical->medical_device_justified) ?></td>
                <td><?= h($clinical->emergency_procedure_justified) ?></td>
                <td><?= h($clinical->additional_measures) ?></td>
                <td><?= h($clinical->teratogenicity_risk) ?></td>
                <td><?= h($clinical->contraceptive_acceptable) ?></td>
                <td><?= h($clinical->proposal_insufficient) ?></td>
                <td><?= h($clinical->male_participants) ?></td>
                <td><?= h($clinical->contraception_treatment) ?></td>
                <td><?= h($clinical->pregnancy_interval) ?></td>
                <td><?= h($clinical->pregnancy_test) ?></td>
                <td><?= h($clinical->postmenopausal) ?></td>
                <td><?= h($clinical->other_issue) ?></td>
                <td><?= h($clinical->discontinuation_criteria) ?></td>
                <td><?= h($clinical->criteria_acceptable) ?></td>
                <td><?= h($clinical->permitted_concomitant) ?></td>
                <td><?= h($clinical->prohibited_concomitant) ?></td>
                <td><?= h($clinical->procedures_adequate) ?></td>
                <td><?= h($clinical->insufficient_frequency) ?></td>
                <td><?= h($clinical->relevant_targets) ?></td>
                <td><?= h($clinical->minimization_measures) ?></td>
                <td><?= h($clinical->risk_unacceptable) ?></td>
                <td><?= h($clinical->insufficient_followup) ?></td>
                <td><?= h($clinical->other_safety) ?></td>
                <td><?= h($clinical->rsi_included) ?></td>
                <td><?= h($clinical->acceptable_document) ?></td>
                <td><?= h($clinical->acceptable_format) ?></td>
                <td><?= h($clinical->expected_acceptable) ?></td>
                <td><?= h($clinical->dsmc_committee) ?></td>
                <td><?= h($clinical->arrangements_acceptable) ?></td>
                <td><?= h($clinical->trial_definition_acceptable) ?></td>
                <td><?= h($clinical->collection_unacceptable) ?></td>
                <td><?= h($clinical->data_policies_acceptable) ?></td>
                <td><?= h($clinical->unauthorised_unacceptable) ?></td>
                <td><?= h($clinical->measures_unacceptable) ?></td>
                <td><?= h($clinical->breach_unacceptable) ?></td>
                <td><?= h($clinical->other_protection) ?></td>
                <td><?= h($clinical->recruitment_unacceptable) ?></td>
                <td><?= h($clinical->risk_evaluation_unacceptable) ?></td>
                <td><?= h($clinical->participants_protection_acceptable) ?></td>
                <td><?= h($clinical->condition_unmonitored) ?></td>
                <td><?= h($clinical->unsafeguarded_rights) ?></td>
                <td><?= h($clinical->unmonitored_threshold) ?></td>
                <td><?= h($clinical->application_acceptable) ?></td>
                <td><?= h($clinical->supplementary_required) ?></td>
                <td><?= $this->Number->format($clinical->chosen) ?></td>
                <td><?= $this->Number->format($clinical->submitted) ?></td>
                <td><?= h($clinical->deleted) ?></td>
                <td><?= h($clinical->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clinical->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clinical->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clinical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinical->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adr[]|\Cake\Collection\CollectionInterface $adrs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adr'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr Lab Tests'), ['controller' => 'AdrLabTests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr Lab Test'), ['controller' => 'AdrLabTests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr List Of Drugs'), ['controller' => 'AdrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr List Of Drug'), ['controller' => 'AdrListOfDrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr Other Drugs'), ['controller' => 'AdrOtherDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr Other Drug'), ['controller' => 'AdrOtherDrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrs index large-9 medium-8 columns content">
    <h3><?= __('Adrs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mrcz_protocol_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mcaz_protocol_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('principal_investigator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_sponsor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_adverse_event') ?></th>
                <th scope="col"><?= $this->Paginator->sort('participant_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_site_awareness') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_week') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adverse_event_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sae_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('toxicity_grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('previous_events') ?></th>
                <th scope="col"><?= $this->Paginator->sort('previous_events_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_saes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_event') ?></th>
                <th scope="col"><?= $this->Paginator->sort('research_involves') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_investigational') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_other_drug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_mcaz') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_mcaz_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_mrcz') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_mrcz_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_sponsor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_sponsor_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_irb') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_to_irb_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('d1_consent_form') ?></th>
                <th scope="col"><?= $this->Paginator->sort('d2_brochure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('d3_changes_sae') ?></th>
                <th scope="col"><?= $this->Paginator->sort('d4_consent_sae') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assess_risk') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adrs as $adr): ?>
            <tr>
                <td><?= $this->Number->format($adr->id) ?></td>
                <td><?= $adr->has('user') ? $this->Html->link($adr->user->name, ['controller' => 'Users', 'action' => 'view', $adr->user->id]) : '' ?></td>
                <td><?= h($adr->mrcz_protocol_number) ?></td>
                <td><?= h($adr->mcaz_protocol_number) ?></td>
                <td><?= h($adr->principal_investigator) ?></td>
                <td><?= h($adr->reporter_name) ?></td>
                <td><?= h($adr->reporter_email) ?></td>
                <td><?= $adr->has('designation') ? $this->Html->link($adr->designation->name, ['controller' => 'Designations', 'action' => 'view', $adr->designation->id]) : '' ?></td>
                <td><?= h($adr->reporter_phone) ?></td>
                <td><?= h($adr->name_of_institution) ?></td>
                <td><?= h($adr->institution_code) ?></td>
                <td><?= h($adr->study_title) ?></td>
                <td><?= h($adr->study_sponsor) ?></td>
                <td><?= h($adr->date_of_adverse_event) ?></td>
                <td><?= h($adr->participant_number) ?></td>
                <td><?= h($adr->report_type) ?></td>
                <td><?= h($adr->date_of_site_awareness) ?></td>
                <td><?= h($adr->date_of_birth) ?></td>
                <td><?= h($adr->gender) ?></td>
                <td><?= h($adr->study_week) ?></td>
                <td><?= h($adr->visit_number) ?></td>
                <td><?= h($adr->adverse_event_type) ?></td>
                <td><?= h($adr->sae_type) ?></td>
                <td><?= h($adr->toxicity_grade) ?></td>
                <td><?= h($adr->previous_events) ?></td>
                <td><?= h($adr->previous_events_number) ?></td>
                <td><?= h($adr->total_saes) ?></td>
                <td><?= h($adr->location_event) ?></td>
                <td><?= h($adr->research_involves) ?></td>
                <td><?= h($adr->drug_investigational) ?></td>
                <td><?= h($adr->patient_other_drug) ?></td>
                <td><?= h($adr->report_to_mcaz) ?></td>
                <td><?= h($adr->report_to_mcaz_date) ?></td>
                <td><?= h($adr->report_to_mrcz) ?></td>
                <td><?= h($adr->report_to_mrcz_date) ?></td>
                <td><?= h($adr->report_to_sponsor) ?></td>
                <td><?= h($adr->report_to_sponsor_date) ?></td>
                <td><?= h($adr->report_to_irb) ?></td>
                <td><?= h($adr->report_to_irb_date) ?></td>
                <td><?= h($adr->d1_consent_form) ?></td>
                <td><?= h($adr->d2_brochure) ?></td>
                <td><?= h($adr->d3_changes_sae) ?></td>
                <td><?= h($adr->d4_consent_sae) ?></td>
                <td><?= h($adr->assess_risk) ?></td>
                <td><?= h($adr->created) ?></td>
                <td><?= h($adr->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adr->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adr->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adr->id)]) ?>
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

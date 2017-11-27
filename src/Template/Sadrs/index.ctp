<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr[]|\Cake\Collection\CollectionInterface $sadrs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Counties'), ['controller' => 'SubCounties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub County'), ['controller' => 'SubCounties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrs index large-9 medium-8 columns content">
    <h3><?= __('Sadrs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vigiflow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ward') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('known_allergy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('known_allergy_specify') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pregnant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pregnancy_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_onset_of_reaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('severity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action_taken') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outcome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('causality') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emails') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrs as $sadr): ?>
            <tr>
                <td><?= $this->Number->format($sadr->id) ?></td>
                <td><?= $sadr->has('user') ? $this->Html->link($sadr->user->name, ['controller' => 'Users', 'action' => 'view', $sadr->user->id]) : '' ?></td>
                <td><?= $sadr->has('county') ? $this->Html->link($sadr->county->id, ['controller' => 'Counties', 'action' => 'view', $sadr->county->id]) : '' ?></td>
                <td><?= $sadr->has('sub_county') ? $this->Html->link($sadr->sub_county->id, ['controller' => 'SubCounties', 'action' => 'view', $sadr->sub_county->id]) : '' ?></td>
                <td><?= $sadr->has('designation') ? $this->Html->link($sadr->designation->name, ['controller' => 'Designations', 'action' => 'view', $sadr->designation->id]) : '' ?></td>
                <td><?= h($sadr->vigiflow_id) ?></td>
                <td><?= h($sadr->report_title) ?></td>
                <td><?= h($sadr->report_type) ?></td>
                <td><?= h($sadr->name_of_institution) ?></td>
                <td><?= h($sadr->institution_code) ?></td>
                <td><?= h($sadr->address) ?></td>
                <td><?= h($sadr->contact) ?></td>
                <td><?= h($sadr->patient_name) ?></td>
                <td><?= h($sadr->ip_no) ?></td>
                <td><?= h($sadr->date_of_birth) ?></td>
                <td><?= h($sadr->age_group) ?></td>
                <td><?= h($sadr->patient_address) ?></td>
                <td><?= h($sadr->ward) ?></td>
                <td><?= h($sadr->gender) ?></td>
                <td><?= h($sadr->known_allergy) ?></td>
                <td><?= h($sadr->known_allergy_specify) ?></td>
                <td><?= h($sadr->pregnant) ?></td>
                <td><?= h($sadr->pregnancy_status) ?></td>
                <td><?= h($sadr->weight) ?></td>
                <td><?= h($sadr->height) ?></td>
                <td><?= h($sadr->date_of_onset_of_reaction) ?></td>
                <td><?= h($sadr->severity) ?></td>
                <td><?= h($sadr->action_taken) ?></td>
                <td><?= h($sadr->outcome) ?></td>
                <td><?= h($sadr->causality) ?></td>
                <td><?= h($sadr->reporter_name) ?></td>
                <td><?= h($sadr->reporter_email) ?></td>
                <td><?= h($sadr->reporter_phone) ?></td>
                <td><?= $this->Number->format($sadr->submitted) ?></td>
                <td><?= $this->Number->format($sadr->emails) ?></td>
                <td><?= h($sadr->active) ?></td>
                <td><?= $this->Number->format($sadr->device) ?></td>
                <td><?= $this->Number->format($sadr->notified) ?></td>
                <td><?= h($sadr->created) ?></td>
                <td><?= h($sadr->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sadr->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sadr->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sadr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadr->id)]) ?>
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

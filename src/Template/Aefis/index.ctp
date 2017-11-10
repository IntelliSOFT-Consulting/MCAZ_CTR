<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi[]|\Cake\Collection\CollectionInterface $aefis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefis index large-9 medium-8 columns content">
    <h3><?= __('Aefis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_onset_of_reaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_end_of_reaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('severity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('severity_reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outcome') ?></th>
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
            <?php foreach ($aefis as $aefi): ?>
            <tr>
                <td><?= $this->Number->format($aefi->id) ?></td>
                <td><?= $aefi->has('user') ? $this->Html->link($aefi->user->name, ['controller' => 'Users', 'action' => 'view', $aefi->user->id]) : '' ?></td>
                <td><?= $aefi->has('designation') ? $this->Html->link($aefi->designation->name, ['controller' => 'Designations', 'action' => 'view', $aefi->designation->id]) : '' ?></td>
                <td><?= h($aefi->report_type) ?></td>
                <td><?= h($aefi->name_of_institution) ?></td>
                <td><?= h($aefi->institution_code) ?></td>
                <td><?= h($aefi->patient_name) ?></td>
                <td><?= h($aefi->ip_no) ?></td>
                <td><?= h($aefi->date_of_birth) ?></td>
                <td><?= h($aefi->age_group) ?></td>
                <td><?= h($aefi->gender) ?></td>
                <td><?= h($aefi->weight) ?></td>
                <td><?= h($aefi->height) ?></td>
                <td><?= h($aefi->date_of_onset_of_reaction) ?></td>
                <td><?= h($aefi->date_of_end_of_reaction) ?></td>
                <td><?= h($aefi->duration_type) ?></td>
                <td><?= h($aefi->duration) ?></td>
                <td><?= h($aefi->severity) ?></td>
                <td><?= h($aefi->severity_reason) ?></td>
                <td><?= h($aefi->outcome) ?></td>
                <td><?= h($aefi->reporter_name) ?></td>
                <td><?= h($aefi->reporter_email) ?></td>
                <td><?= h($aefi->reporter_phone) ?></td>
                <td><?= $this->Number->format($aefi->submitted) ?></td>
                <td><?= $this->Number->format($aefi->emails) ?></td>
                <td><?= h($aefi->active) ?></td>
                <td><?= $this->Number->format($aefi->device) ?></td>
                <td><?= $this->Number->format($aefi->notified) ?></td>
                <td><?= h($aefi->created) ?></td>
                <td><?= h($aefi->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aefi->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aefi->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefi->id)]) ?>
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

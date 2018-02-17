<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrFollowup[]|\Cake\Collection\CollectionInterface $sadrFollowups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrFollowups index large-9 medium-8 columns content">
    <h3><?= __('Sadr Followups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outcome') ?></th>
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
            <?php foreach ($sadrFollowups as $sadrFollowup): ?>
            <tr>
                <td><?= $this->Number->format($sadrFollowup->id) ?></td>
                <td><?= $sadrFollowup->has('user') ? $this->Html->link($sadrFollowup->user->name, ['controller' => 'Users', 'action' => 'view', $sadrFollowup->user->id]) : '' ?></td>
                <td><?= $sadrFollowup->has('county') ? $this->Html->link($sadrFollowup->county->id, ['controller' => 'Counties', 'action' => 'view', $sadrFollowup->county->id]) : '' ?></td>
                <td><?= $sadrFollowup->has('sadr') ? $this->Html->link($sadrFollowup->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadrFollowup->sadr->id]) : '' ?></td>
                <td><?= $sadrFollowup->has('designation') ? $this->Html->link($sadrFollowup->designation->name, ['controller' => 'Designations', 'action' => 'view', $sadrFollowup->designation->id]) : '' ?></td>
                <td><?= h($sadrFollowup->outcome) ?></td>
                <td><?= h($sadrFollowup->reporter_email) ?></td>
                <td><?= h($sadrFollowup->reporter_phone) ?></td>
                <td><?= $this->Number->format($sadrFollowup->submitted) ?></td>
                <td><?= $this->Number->format($sadrFollowup->emails) ?></td>
                <td><?= h($sadrFollowup->active) ?></td>
                <td><?= $this->Number->format($sadrFollowup->device) ?></td>
                <td><?= $this->Number->format($sadrFollowup->notified) ?></td>
                <td><?= h($sadrFollowup->created) ?></td>
                <td><?= h($sadrFollowup->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sadrFollowup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sadrFollowup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sadrFollowup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrFollowup->id)]) ?>
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

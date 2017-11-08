<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $messages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messages index large-9 medium-8 columns content">
    <h3><?= __('Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pqmp_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_followup_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receiver') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
            <tr>
                <td><?= $this->Number->format($message->id) ?></td>
                <td><?= $message->has('sadr') ? $this->Html->link($message->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $message->sadr->id]) : '' ?></td>
                <td><?= $message->has('pqmp') ? $this->Html->link($message->pqmp->id, ['controller' => 'Pqmps', 'action' => 'view', $message->pqmp->id]) : '' ?></td>
                <td><?= $message->has('sadr_followup') ? $this->Html->link($message->sadr_followup->id, ['controller' => 'SadrFollowups', 'action' => 'view', $message->sadr_followup->id]) : '' ?></td>
                <td><?= h($message->sender) ?></td>
                <td><?= h($message->receiver) ?></td>
                <td><?= h($message->subject) ?></td>
                <td><?= $this->Number->format($message->sent) ?></td>
                <td><?= h($message->created) ?></td>
                <td><?= h($message->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $message->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?>
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

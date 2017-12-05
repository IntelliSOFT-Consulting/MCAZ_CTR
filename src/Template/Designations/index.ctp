<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Designation[]|\Cake\Collection\CollectionInterface $designations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="designations index large-9 medium-8 columns content">
    <h3><?= __('Designations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($designations as $designation): ?>
            <tr>
                <td><?= $this->Number->format($designation->id) ?></td>
                <td><?= h($designation->name) ?></td>
                <td><?= h($designation->created) ?></td>
                <td><?= h($designation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $designation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $designation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $designation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designation->id)]) ?>
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

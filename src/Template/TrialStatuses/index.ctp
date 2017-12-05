<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrialStatus[]|\Cake\Collection\CollectionInterface $trialStatuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trial Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trialStatuses index large-9 medium-8 columns content">
    <h3><?= __('Trial Statuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trialStatuses as $trialStatus): ?>
            <tr>
                <td><?= $this->Number->format($trialStatus->id) ?></td>
                <td><?= h($trialStatus->value) ?></td>
                <td><?= h($trialStatus->name) ?></td>
                <td><?= h($trialStatus->created) ?></td>
                <td><?= h($trialStatus->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trialStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trialStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trialStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trialStatus->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine[]|\Cake\Collection\CollectionInterface $medicines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Medicine'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicines index large-9 medium-8 columns content">
    <h3><?= __('Medicines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medicine_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_required') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicines as $medicine): ?>
            <tr>
                <td><?= $this->Number->format($medicine->id) ?></td>
                <td><?= $medicine->has('application') ? $this->Html->link($medicine->application->id, ['controller' => 'Applications', 'action' => 'view', $medicine->application->id]) : '' ?></td>
                <td><?= h($medicine->medicine_name) ?></td>
                <td><?= h($medicine->quantity_required) ?></td>
                <td><?= h($medicine->created) ?></td>
                <td><?= h($medicine->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $medicine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medicine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medicine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicine->id)]) ?>
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

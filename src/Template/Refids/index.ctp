<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Refid[]|\Cake\Collection\CollectionInterface $refids
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Refid'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refids index large-9 medium-8 columns content">
    <h3><?= __('Refids') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foreign_key') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('refid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refids as $refid): ?>
            <tr>
                <td><?= $this->Number->format($refid->id) ?></td>
                <td><?= $this->Number->format($refid->foreign_key) ?></td>
                <td><?= h($refid->model) ?></td>
                <td><?= $this->Number->format($refid->refid) ?></td>
                <td><?= $this->Number->format($refid->year) ?></td>
                <td><?= h($refid->created) ?></td>
                <td><?= h($refid->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refid->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refid->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refid->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StorageCondition[]|\Cake\Collection\CollectionInterface $storageConditions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storageConditions index large-9 medium-8 columns content">
    <h3><?= __('Storage Conditions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sdrug_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pdrug_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manu_process') ?></th>
                <th scope="col"><?= $this->Paginator->sort('neg_seventy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('neg_twenty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pos_five') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pos_twenty_five') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pos_thirty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pos_forty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storageConditions as $storageCondition): ?>
            <tr>
                <td><?= $this->Number->format($storageCondition->id) ?></td>
                <td><?= $storageCondition->has('application') ? $this->Html->link($storageCondition->application->id, ['controller' => 'Applications', 'action' => 'view', $storageCondition->application->id]) : '' ?></td>
                <td><?= $storageCondition->has('sdrug') ? $this->Html->link($storageCondition->sdrug->id, ['controller' => 'Sdrugs', 'action' => 'view', $storageCondition->sdrug->id]) : '' ?></td>
                <td><?= $this->Number->format($storageCondition->pdrug_id) ?></td>
                <td><?= h($storageCondition->batch_details) ?></td>
                <td><?= h($storageCondition->manu_process) ?></td>
                <td><?= h($storageCondition->neg_seventy) ?></td>
                <td><?= h($storageCondition->neg_twenty) ?></td>
                <td><?= h($storageCondition->pos_five) ?></td>
                <td><?= $this->Number->format($storageCondition->pos_twenty_five) ?></td>
                <td><?= $this->Number->format($storageCondition->pos_thirty) ?></td>
                <td><?= $this->Number->format($storageCondition->pos_forty) ?></td>
                <td><?= h($storageCondition->created_at) ?></td>
                <td><?= h($storageCondition->updated_at) ?></td>
                <td><?= h($storageCondition->model) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storageCondition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storageCondition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storageCondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageCondition->id)]) ?>
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

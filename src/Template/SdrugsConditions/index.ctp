<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdrugsCondition[]|\Cake\Collection\CollectionInterface $sdrugsConditions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sdrugs Condition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['controller' => 'Pdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pdrug'), ['controller' => 'Pdrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdrugsConditions index large-9 medium-8 columns content">
    <h3><?= __('Sdrugs Conditions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sdrug_id') ?></th>
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
            <?php foreach ($sdrugsConditions as $sdrugsCondition): ?>
            <tr>
                <td><?= $this->Number->format($sdrugsCondition->id) ?></td>
                <td><?= $sdrugsCondition->has('application') ? $this->Html->link($sdrugsCondition->application->id, ['controller' => 'Applications', 'action' => 'view', $sdrugsCondition->application->id]) : '' ?></td>
                <td><?= $sdrugsCondition->has('sdrug') ? $this->Html->link($sdrugsCondition->sdrug->id, ['controller' => 'Sdrugs', 'action' => 'view', $sdrugsCondition->sdrug->id]) : '' ?></td>
                <td><?= h($sdrugsCondition->batch_details) ?></td>
                <td><?= h($sdrugsCondition->manu_process) ?></td>
                <td><?= h($sdrugsCondition->neg_seventy) ?></td>
                <td><?= h($sdrugsCondition->neg_twenty) ?></td>
                <td><?= h($sdrugsCondition->pos_five) ?></td>
                <td><?= $this->Number->format($sdrugsCondition->pos_twenty_five) ?></td>
                <td><?= $this->Number->format($sdrugsCondition->pos_thirty) ?></td>
                <td><?= $this->Number->format($sdrugsCondition->pos_forty) ?></td>
                <td><?= h($sdrugsCondition->created_at) ?></td>
                <td><?= h($sdrugsCondition->updated_at) ?></td>
                <td><?= h($sdrugsCondition->model) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdrugsCondition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdrugsCondition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdrugsCondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdrugsCondition->id)]) ?>
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

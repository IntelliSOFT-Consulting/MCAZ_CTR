<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrLabTest[]|\Cake\Collection\CollectionInterface $adrLabTests
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adr Lab Test'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrLabTests index large-9 medium-8 columns content">
    <h3><?= __('Adr Lab Tests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lab_test') ?></th>
                <th scope="col"><?= $this->Paginator->sort('abnormal_result') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_normal_range') ?></th>
                <th scope="col"><?= $this->Paginator->sort('collection_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lab_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lab_value_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adrLabTests as $adrLabTest): ?>
            <tr>
                <td><?= $this->Number->format($adrLabTest->id) ?></td>
                <td><?= $adrLabTest->has('adr') ? $this->Html->link($adrLabTest->adr->id, ['controller' => 'Adrs', 'action' => 'view', $adrLabTest->adr->id]) : '' ?></td>
                <td><?= h($adrLabTest->lab_test) ?></td>
                <td><?= h($adrLabTest->abnormal_result) ?></td>
                <td><?= h($adrLabTest->site_normal_range) ?></td>
                <td><?= h($adrLabTest->collection_date) ?></td>
                <td><?= h($adrLabTest->lab_value) ?></td>
                <td><?= h($adrLabTest->lab_value_date) ?></td>
                <td><?= h($adrLabTest->created) ?></td>
                <td><?= h($adrLabTest->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adrLabTest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adrLabTest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adrLabTest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrLabTest->id)]) ?>
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

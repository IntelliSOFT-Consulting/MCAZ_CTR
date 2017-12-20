<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrOtherDrug[]|\Cake\Collection\CollectionInterface $sadrOtherDrugs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sadr Other Drug'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrOtherDrugs index large-9 medium-8 columns content">
    <h3><?= __('Sadr Other Drugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stop_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('suspected_drug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrOtherDrugs as $sadrOtherDrug): ?>
            <tr>
                <td><?= $this->Number->format($sadrOtherDrug->id) ?></td>
                <td><?= $sadrOtherDrug->has('sadr') ? $this->Html->link($sadrOtherDrug->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadrOtherDrug->sadr->id]) : '' ?></td>
                <td><?= h($sadrOtherDrug->drug_name) ?></td>
                <td><?= h($sadrOtherDrug->start_date) ?></td>
                <td><?= h($sadrOtherDrug->stop_date) ?></td>
                <td><?= h($sadrOtherDrug->suspected_drug) ?></td>
                <td><?= h($sadrOtherDrug->created) ?></td>
                <td><?= h($sadrOtherDrug->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sadrOtherDrug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sadrOtherDrug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sadrOtherDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrOtherDrug->id)]) ?>
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

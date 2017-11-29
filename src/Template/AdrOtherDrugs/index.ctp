<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrOtherDrug[]|\Cake\Collection\CollectionInterface $adrOtherDrugs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adr Other Drug'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrOtherDrugs index large-9 medium-8 columns content">
    <h3><?= __('Adr Other Drugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stop_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relationship_to_sae') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adrOtherDrugs as $adrOtherDrug): ?>
            <tr>
                <td><?= $this->Number->format($adrOtherDrug->id) ?></td>
                <td><?= $adrOtherDrug->has('adr') ? $this->Html->link($adrOtherDrug->adr->id, ['controller' => 'Adrs', 'action' => 'view', $adrOtherDrug->adr->id]) : '' ?></td>
                <td><?= h($adrOtherDrug->drug_name) ?></td>
                <td><?= h($adrOtherDrug->start_date) ?></td>
                <td><?= h($adrOtherDrug->stop_date) ?></td>
                <td><?= h($adrOtherDrug->relationship_to_sae) ?></td>
                <td><?= h($adrOtherDrug->created) ?></td>
                <td><?= h($adrOtherDrug->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adrOtherDrug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adrOtherDrug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adrOtherDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrOtherDrug->id)]) ?>
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

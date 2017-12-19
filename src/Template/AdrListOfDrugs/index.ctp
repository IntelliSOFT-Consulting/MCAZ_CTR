<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrListOfDrug[]|\Cake\Collection\CollectionInterface $adrListOfDrugs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adr List Of Drug'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrListOfDrugs index large-9 medium-8 columns content">
    <h3><?= __('Adr List Of Drugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dosage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dose_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('route_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stop_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('taking_drug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relationship_to_sae') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adrListOfDrugs as $adrListOfDrug): ?>
            <tr>
                <td><?= $this->Number->format($adrListOfDrug->id) ?></td>
                <td><?= $adrListOfDrug->has('adr') ? $this->Html->link($adrListOfDrug->adr->id, ['controller' => 'Adrs', 'action' => 'view', $adrListOfDrug->adr->id]) : '' ?></td>
                <td><?= h($adrListOfDrug->drug_name) ?></td>
                <td><?= h($adrListOfDrug->dosage) ?></td>
                <td><?= $adrListOfDrug->has('dose') ? $this->Html->link($adrListOfDrug->dose->name, ['controller' => 'Doses', 'action' => 'view', $adrListOfDrug->dose->id]) : '' ?></td>
                <td><?= $adrListOfDrug->has('route') ? $this->Html->link($adrListOfDrug->route->name, ['controller' => 'Routes', 'action' => 'view', $adrListOfDrug->route->id]) : '' ?></td>
                <td><?= $adrListOfDrug->has('frequency') ? $this->Html->link($adrListOfDrug->frequency->name, ['controller' => 'Frequencies', 'action' => 'view', $adrListOfDrug->frequency->id]) : '' ?></td>
                <td><?= h($adrListOfDrug->start_date) ?></td>
                <td><?= h($adrListOfDrug->stop_date) ?></td>
                <td><?= h($adrListOfDrug->taking_drug) ?></td>
                <td><?= h($adrListOfDrug->relationship_to_sae) ?></td>
                <td><?= h($adrListOfDrug->created) ?></td>
                <td><?= h($adrListOfDrug->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adrListOfDrug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adrListOfDrug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adrListOfDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrListOfDrug->id)]) ?>
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

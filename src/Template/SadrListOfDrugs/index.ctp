<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrListOfDrug[]|\Cake\Collection\CollectionInterface $sadrListOfDrugs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrListOfDrugs index large-9 medium-8 columns content">
    <h3><?= __('Sadr List Of Drugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_followup_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dose_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('route_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dose') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stop_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('indication') ?></th>
                <th scope="col"><?= $this->Paginator->sort('suspected_drug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrListOfDrugs as $sadrListOfDrug): ?>
            <tr>
                <td><?= $this->Number->format($sadrListOfDrug->id) ?></td>
                <td><?= $sadrListOfDrug->has('sadr') ? $this->Html->link($sadrListOfDrug->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadrListOfDrug->sadr->id]) : '' ?></td>
                <td><?= $sadrListOfDrug->has('sadr_followup') ? $this->Html->link($sadrListOfDrug->sadr_followup->id, ['controller' => 'SadrFollowups', 'action' => 'view', $sadrListOfDrug->sadr_followup->id]) : '' ?></td>
                <td><?= $sadrListOfDrug->has('dose') ? $this->Html->link($sadrListOfDrug->dose->name, ['controller' => 'Doses', 'action' => 'view', $sadrListOfDrug->dose->id]) : '' ?></td>
                <td><?= $sadrListOfDrug->has('route') ? $this->Html->link($sadrListOfDrug->route->name, ['controller' => 'Routes', 'action' => 'view', $sadrListOfDrug->route->id]) : '' ?></td>
                <td><?= $sadrListOfDrug->has('frequency') ? $this->Html->link($sadrListOfDrug->frequency->name, ['controller' => 'Frequencies', 'action' => 'view', $sadrListOfDrug->frequency->id]) : '' ?></td>
                <td><?= h($sadrListOfDrug->drug_name) ?></td>
                <td><?= h($sadrListOfDrug->brand_name) ?></td>
                <td><?= h($sadrListOfDrug->dose) ?></td>
                <td><?= h($sadrListOfDrug->start_date) ?></td>
                <td><?= h($sadrListOfDrug->stop_date) ?></td>
                <td><?= h($sadrListOfDrug->indication) ?></td>
                <td><?= h($sadrListOfDrug->suspected_drug) ?></td>
                <td><?= h($sadrListOfDrug->created) ?></td>
                <td><?= h($sadrListOfDrug->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sadrListOfDrug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sadrListOfDrug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sadrListOfDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrListOfDrug->id)]) ?>
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

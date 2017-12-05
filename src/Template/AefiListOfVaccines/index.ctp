<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiListOfVaccine[]|\Cake\Collection\CollectionInterface $aefiListOfVaccines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aefi List Of Vaccine'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiListOfVaccines index large-9 medium-8 columns content">
    <h3><?= __('Aefi List Of Vaccines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccination_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dosage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefiListOfVaccines as $aefiListOfVaccine): ?>
            <tr>
                <td><?= $this->Number->format($aefiListOfVaccine->id) ?></td>
                <td><?= $aefiListOfVaccine->has('aefi') ? $this->Html->link($aefiListOfVaccine->aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefiListOfVaccine->aefi->id]) : '' ?></td>
                <td><?= h($aefiListOfVaccine->vaccine_name) ?></td>
                <td><?= h($aefiListOfVaccine->vaccination_date) ?></td>
                <td><?= h($aefiListOfVaccine->dosage) ?></td>
                <td><?= h($aefiListOfVaccine->batch_number) ?></td>
                <td><?= h($aefiListOfVaccine->expiry_date) ?></td>
                <td><?= h($aefiListOfVaccine->created) ?></td>
                <td><?= h($aefiListOfVaccine->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aefiListOfVaccine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aefiListOfVaccine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aefiListOfVaccine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfVaccine->id)]) ?>
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

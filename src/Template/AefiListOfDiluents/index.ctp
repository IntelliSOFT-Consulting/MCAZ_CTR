<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiListOfDiluent[]|\Cake\Collection\CollectionInterface $aefiListOfDiluents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aefi List Of Diluent'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiListOfDiluents index large-9 medium-8 columns content">
    <h3><?= __('Aefi List Of Diluents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diluent_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diluent_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefiListOfDiluents as $aefiListOfDiluent): ?>
            <tr>
                <td><?= $this->Number->format($aefiListOfDiluent->id) ?></td>
                <td><?= $aefiListOfDiluent->has('aefi') ? $this->Html->link($aefiListOfDiluent->aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefiListOfDiluent->aefi->id]) : '' ?></td>
                <td><?= h($aefiListOfDiluent->diluent_name) ?></td>
                <td><?= h($aefiListOfDiluent->diluent_date) ?></td>
                <td><?= h($aefiListOfDiluent->batch_number) ?></td>
                <td><?= h($aefiListOfDiluent->expiry_date) ?></td>
                <td><?= h($aefiListOfDiluent->created) ?></td>
                <td><?= h($aefiListOfDiluent->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aefiListOfDiluent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aefiListOfDiluent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aefiListOfDiluent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfDiluent->id)]) ?>
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

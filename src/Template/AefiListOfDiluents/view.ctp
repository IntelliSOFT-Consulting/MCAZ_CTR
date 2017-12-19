<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiListOfDiluent $aefiListOfDiluent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aefi List Of Diluent'), ['action' => 'edit', $aefiListOfDiluent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aefi List Of Diluent'), ['action' => 'delete', $aefiListOfDiluent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfDiluent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aefi List Of Diluents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi List Of Diluent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aefiListOfDiluents view large-9 medium-8 columns content">
    <h3><?= h($aefiListOfDiluent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Aefi') ?></th>
            <td><?= $aefiListOfDiluent->has('aefi') ? $this->Html->link($aefiListOfDiluent->aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefiListOfDiluent->aefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diluent Name') ?></th>
            <td><?= h($aefiListOfDiluent->diluent_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Number') ?></th>
            <td><?= h($aefiListOfDiluent->batch_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aefiListOfDiluent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diluent Date') ?></th>
            <td><?= h($aefiListOfDiluent->diluent_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiry Date') ?></th>
            <td><?= h($aefiListOfDiluent->expiry_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($aefiListOfDiluent->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($aefiListOfDiluent->modified) ?></td>
        </tr>
    </table>
</div>

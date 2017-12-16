<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiListOfVaccine $aefiListOfVaccine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aefi List Of Vaccine'), ['action' => 'edit', $aefiListOfVaccine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aefi List Of Vaccine'), ['action' => 'delete', $aefiListOfVaccine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfVaccine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aefi List Of Vaccines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi List Of Vaccine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aefiListOfVaccines view large-9 medium-8 columns content">
    <h3><?= h($aefiListOfVaccine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Aefi') ?></th>
            <td><?= $aefiListOfVaccine->has('aefi') ? $this->Html->link($aefiListOfVaccine->aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefiListOfVaccine->aefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Name') ?></th>
            <td><?= h($aefiListOfVaccine->vaccine_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dosage') ?></th>
            <td><?= h($aefiListOfVaccine->dosage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Number') ?></th>
            <td><?= h($aefiListOfVaccine->batch_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aefiListOfVaccine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccination Date') ?></th>
            <td><?= h($aefiListOfVaccine->vaccination_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiry Date') ?></th>
            <td><?= h($aefiListOfVaccine->expiry_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($aefiListOfVaccine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($aefiListOfVaccine->modified) ?></td>
        </tr>
    </table>
</div>

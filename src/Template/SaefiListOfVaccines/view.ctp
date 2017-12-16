<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaefiListOfVaccine $saefiListOfVaccine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Saefi List Of Vaccine'), ['action' => 'edit', $saefiListOfVaccine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Saefi List Of Vaccine'), ['action' => 'delete', $saefiListOfVaccine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefiListOfVaccine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Saefi List Of Vaccines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi List Of Vaccine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="saefiListOfVaccines view large-9 medium-8 columns content">
    <h3><?= h($saefiListOfVaccine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Saefi') ?></th>
            <td><?= $saefiListOfVaccine->has('saefi') ? $this->Html->link($saefiListOfVaccine->saefi->id, ['controller' => 'Saefis', 'action' => 'view', $saefiListOfVaccine->saefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Name') ?></th>
            <td><?= h($saefiListOfVaccine->vaccine_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($saefiListOfVaccine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccination Doses') ?></th>
            <td><?= $this->Number->format($saefiListOfVaccine->vaccination_doses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($saefiListOfVaccine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($saefiListOfVaccine->modified) ?></td>
        </tr>
    </table>
</div>

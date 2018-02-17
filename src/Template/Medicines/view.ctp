<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine $medicine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medicine'), ['action' => 'edit', $medicine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medicine'), ['action' => 'delete', $medicine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medicines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medicine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medicines view large-9 medium-8 columns content">
    <h3><?= h($medicine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $medicine->has('application') ? $this->Html->link($medicine->application->id, ['controller' => 'Applications', 'action' => 'view', $medicine->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medicine Name') ?></th>
            <td><?= h($medicine->medicine_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Required') ?></th>
            <td><?= h($medicine->quantity_required) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($medicine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($medicine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($medicine->modified) ?></td>
        </tr>
    </table>
</div>

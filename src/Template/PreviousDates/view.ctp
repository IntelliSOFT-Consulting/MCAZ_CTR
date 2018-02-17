<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreviousDate $previousDate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Previous Date'), ['action' => 'edit', $previousDate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Previous Date'), ['action' => 'delete', $previousDate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $previousDate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Previous Dates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Previous Date'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="previousDates view large-9 medium-8 columns content">
    <h3><?= h($previousDate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $previousDate->has('application') ? $this->Html->link($previousDate->application->id, ['controller' => 'Applications', 'action' => 'view', $previousDate->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($previousDate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Previous Protocol') ?></th>
            <td><?= h($previousDate->date_of_previous_protocol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($previousDate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($previousDate->modified) ?></td>
        </tr>
    </table>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CommitteeDate $committeeDate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Committee Date'), ['action' => 'edit', $committeeDate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Committee Date'), ['action' => 'delete', $committeeDate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $committeeDate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Committee Dates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Committee Date'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="committeeDates view large-9 medium-8 columns content">
    <h3><?= h($committeeDate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $committeeDate->has('user') ? $this->Html->link($committeeDate->user->name, ['controller' => 'Users', 'action' => 'view', $committeeDate->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($committeeDate->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($committeeDate->end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($committeeDate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meeting Date') ?></th>
            <td><?= h($committeeDate->meeting_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($committeeDate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($committeeDate->modified) ?></td>
        </tr>
    </table>
</div>

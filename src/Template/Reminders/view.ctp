<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reminder $reminder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reminder'), ['action' => 'edit', $reminder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reminder'), ['action' => 'delete', $reminder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reminder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reminders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reminder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reminders view large-9 medium-8 columns content">
    <h3><?= h($reminder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($reminder->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $reminder->has('user') ? $this->Html->link($reminder->user->name, ['controller' => 'Users', 'action' => 'view', $reminder->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reminder Type') ?></th>
            <td><?= h($reminder->reminder_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reminder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foreign Key') ?></th>
            <td><?= $this->Number->format($reminder->foreign_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reminder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reminder->modified) ?></td>
        </tr>
    </table>
</div>

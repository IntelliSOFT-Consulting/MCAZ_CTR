<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Committee $committee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Committee'), ['action' => 'edit', $committee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Committee'), ['action' => 'delete', $committee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $committee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Committees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Committee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="committees view large-9 medium-8 columns content">
    <h3><?= h($committee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $committee->has('application') ? $this->Html->link($committee->application->id, ['controller' => 'Applications', 'action' => 'view', $committee->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($committee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($committee->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone Number') ?></th>
            <td><?= h($committee->telephone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Address') ?></th>
            <td><?= h($committee->email_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($committee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($committee->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($committee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($committee->modified) ?></td>
        </tr>
    </table>
</div>

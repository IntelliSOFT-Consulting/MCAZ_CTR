<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reviewer $reviewer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reviewer'), ['action' => 'edit', $reviewer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reviewer'), ['action' => 'delete', $reviewer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviewer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reviewers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reviewer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reviewers view large-9 medium-8 columns content">
    <h3><?= h($reviewer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $reviewer->has('user') ? $this->Html->link($reviewer->user->name, ['controller' => 'Users', 'action' => 'view', $reviewer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $reviewer->has('application') ? $this->Html->link($reviewer->application->id, ['controller' => 'Applications', 'action' => 'view', $reviewer->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accepted') ?></th>
            <td><?= h($reviewer->accepted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reviewer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reviewer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reviewer->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notified') ?></th>
            <td><?= $reviewer->notified ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($reviewer->description)); ?>
    </div>
</div>

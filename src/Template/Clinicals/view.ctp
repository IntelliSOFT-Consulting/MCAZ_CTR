<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clinical $clinical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clinical'), ['action' => 'edit', $clinical->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clinical'), ['action' => 'delete', $clinical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinical->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clinicals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clinical'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluations'), ['controller' => 'Evaluations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluation'), ['controller' => 'Evaluations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clinicals view large-9 medium-8 columns content">
    <h3><?= h($clinical->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $clinical->has('application') ? $this->Html->link($clinical->application->id, ['controller' => 'Applications', 'action' => 'view', $clinical->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evaluation') ?></th>
            <td><?= $clinical->has('evaluation') ? $this->Html->link($clinical->evaluation->id, ['controller' => 'Evaluations', 'action' => 'view', $clinical->evaluation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $clinical->has('user') ? $this->Html->link($clinical->user->name, ['controller' => 'Users', 'action' => 'view', $clinical->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clinical->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evaluation Type') ?></th>
            <td><?= $this->Number->format($clinical->evaluation_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Justification Acceptable') ?></th>
            <td><?= $clinical->justification_acceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Products Authorised') ?></th>
            <td><?= $clinical->products_authorised ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Sponsor Justification') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->sponsor_justification)); ?>
    </div>
</div>

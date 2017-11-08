<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feedback $feedback
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Feedback'), ['action' => 'edit', $feedback->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Feedback'), ['action' => 'delete', $feedback->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="feedbacks view large-9 medium-8 columns content">
    <h3><?= h($feedback->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($feedback->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $feedback->has('user') ? $this->Html->link($feedback->user->name, ['controller' => 'Users', 'action' => 'view', $feedback->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sadr') ?></th>
            <td><?= $feedback->has('sadr') ? $this->Html->link($feedback->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $feedback->sadr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sadr Followup') ?></th>
            <td><?= $feedback->has('sadr_followup') ? $this->Html->link($feedback->sadr_followup->id, ['controller' => 'SadrFollowups', 'action' => 'view', $feedback->sadr_followup->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pqmp') ?></th>
            <td><?= $feedback->has('pqmp') ? $this->Html->link($feedback->pqmp->id, ['controller' => 'Pqmps', 'action' => 'view', $feedback->pqmp->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($feedback->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($feedback->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($feedback->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Feedback') ?></h4>
        <?= $this->Text->autoParagraph(h($feedback->feedback)); ?>
    </div>
</div>

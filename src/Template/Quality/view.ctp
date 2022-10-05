<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quality $quality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Quality'), ['action' => 'edit', $quality->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quality'), ['action' => 'delete', $quality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quality->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quality'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quality view large-9 medium-8 columns content">
    <h3><?= h($quality->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $quality->has('application') ? $this->Html->link($quality->application->id, ['controller' => 'Applications', 'action' => 'view', $quality->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $quality->has('user') ? $this->Html->link($quality->user->name, ['controller' => 'Users', 'action' => 'view', $quality->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= h($quality->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($quality->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Smpc') ?></th>
            <td><?= $this->Number->format($quality->gmp_smpc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Included') ?></th>
            <td><?= $this->Number->format($quality->gmp_included) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Quality Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($quality->quality_workspace)); ?>
    </div>
</div>

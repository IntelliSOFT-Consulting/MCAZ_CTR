<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Refid $refid
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Refid'), ['action' => 'edit', $refid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Refid'), ['action' => 'delete', $refid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Refids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refid'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refids view large-9 medium-8 columns content">
    <h3><?= h($refid->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($refid->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($refid->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foreign Key') ?></th>
            <td><?= $this->Number->format($refid->foreign_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Refid') ?></th>
            <td><?= $this->Number->format($refid->refid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($refid->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($refid->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($refid->modified) ?></td>
        </tr>
    </table>
</div>

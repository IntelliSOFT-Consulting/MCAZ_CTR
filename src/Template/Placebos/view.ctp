<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Placebo $placebo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Placebo'), ['action' => 'edit', $placebo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Placebo'), ['action' => 'delete', $placebo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $placebo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Placebos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Placebo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="placebos view large-9 medium-8 columns content">
    <h3><?= h($placebo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $placebo->has('application') ? $this->Html->link($placebo->application->id, ['controller' => 'Applications', 'action' => 'view', $placebo->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Placebo Present') ?></th>
            <td><?= h($placebo->placebo_present) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pharmaceutical Form') ?></th>
            <td><?= h($placebo->pharmaceutical_form) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Route Of Administration') ?></th>
            <td><?= h($placebo->route_of_administration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Composition') ?></th>
            <td><?= h($placebo->composition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Identical Indp') ?></th>
            <td><?= h($placebo->identical_indp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($placebo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($placebo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($placebo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Major Ingredients') ?></h4>
        <?= $this->Text->autoParagraph(h($placebo->major_ingredients)); ?>
    </div>
</div>

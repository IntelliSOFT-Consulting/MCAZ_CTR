<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compliance $compliance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Compliance'), ['action' => 'edit', $compliance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Compliance'), ['action' => 'delete', $compliance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compliance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Compliance'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compliance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="compliance view large-9 medium-8 columns content">
    <h3><?= h($compliance->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $compliance->has('application') ? $this->Html->link($compliance->application->id, ['controller' => 'Applications', 'action' => 'view', $compliance->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quality Assessment') ?></th>
            <td><?= $compliance->has('quality_assessment') ? $this->Html->link($compliance->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $compliance->quality_assessment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valid License') ?></th>
            <td><?= h($compliance->valid_license) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($compliance->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($compliance->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Function') ?></h4>
        <?= $this->Text->autoParagraph(h($compliance->function)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($compliance->comment)); ?>
    </div>
</div>

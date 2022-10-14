<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pdrug $pdrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pdrug->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pdrug->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['controller' => 'StorageConditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['controller' => 'StorageConditions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pdrugs form large-9 medium-8 columns content">
    <?= $this->Form->create($pdrug) ?>
    <fieldset>
        <legend><?= __('Edit Pdrug') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('quality_assessment_id', ['options' => $qualityAssessments, 'empty' => true]);
            echo $this->Form->control('composition');
            echo $this->Form->control('composition_workspace');
            echo $this->Form->control('composition_comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

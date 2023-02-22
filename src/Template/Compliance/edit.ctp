<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compliance $compliance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $compliance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $compliance->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Compliance'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="compliance form large-9 medium-8 columns content">
    <?= $this->Form->create($compliance) ?>
    <fieldset>
        <legend><?= __('Edit Compliance') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('quality_assessment_id', ['options' => $qualityAssessments, 'empty' => true]);
            echo $this->Form->control('site_name');
            echo $this->Form->control('site_function');
            echo $this->Form->control('valid_license');
            echo $this->Form->control('comment');
            echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('updated_at', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

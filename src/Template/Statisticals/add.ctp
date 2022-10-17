<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Statistical $statistical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Statisticals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="statisticals form large-9 medium-8 columns content">
    <?= $this->Form->create($statistical) ?>
    <fieldset>
        <legend><?= __('Add Statistical') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('design_type');
            echo $this->Form->control('randomized');
            echo $this->Form->control('blinding');
            echo $this->Form->control('design_description');
            echo $this->Form->control('design_acceptable');
            echo $this->Form->control('design_comment');
            echo $this->Form->control('rand_description');
            echo $this->Form->control('rand_comment');
            echo $this->Form->control('sample_acceptable');
            echo $this->Form->control('power_acceptable');
            echo $this->Form->control('sample_description');
            echo $this->Form->control('sample_comment');
            echo $this->Form->control('analysis_description');
            echo $this->Form->control('analysis_objective');
            echo $this->Form->control('analysis_objective_comments');
            echo $this->Form->control('methods_appropriate');
            echo $this->Form->control('methods_appropriate_comments');
            echo $this->Form->control('considerations');
            echo $this->Form->control('considerations_comments');
            echo $this->Form->control('multiplicity');
            echo $this->Form->control('multiplicity_comments');
            echo $this->Form->control('analyses_acceptable');
            echo $this->Form->control('analysis_comment');
            echo $this->Form->control('interim_safety');
            echo $this->Form->control('interim_planning');
            echo $this->Form->control('interim_description');
            echo $this->Form->control('interim_comment');
            echo $this->Form->control('statistical_acceptable');
            echo $this->Form->control('information_needed');
            echo $this->Form->control('overall_comment');
            echo $this->Form->control('chosen');
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('additional');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

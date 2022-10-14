<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QualityAssessment $qualityAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Compliance'), ['controller' => 'Compliance', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Compliance'), ['controller' => 'Compliance', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['controller' => 'Pdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pdrug'), ['controller' => 'Pdrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="qualityAssessments form large-9 medium-8 columns content">
    <?= $this->Form->create($qualityAssessment) ?>
    <fieldset>
        <legend><?= __('Add Quality Assessment') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('quality_workspace');
            echo $this->Form->control('gmp_included');
            echo $this->Form->control('gmp_smpc');
            echo $this->Form->control('quality_data');
            echo $this->Form->control('auxiliary_workspace');
            echo $this->Form->control('auxiliary_comments');
            echo $this->Form->control('adventitious_agents');
            echo $this->Form->control('adventitious_workspace');
            echo $this->Form->control('adventitious_comments');
            echo $this->Form->control('novel_excipients');
            echo $this->Form->control('novel_excipients_workspace');
            echo $this->Form->control('novel_excipients_comments');
            echo $this->Form->control('reconstitution');
            echo $this->Form->control('reconstitution_workspace');
            echo $this->Form->control('reconstitution_comments');
            echo $this->Form->control('labelling');
            echo $this->Form->control('labelling_comments');
            echo $this->Form->control('blinding_workspace');
            echo $this->Form->control('blinding_comments');
            echo $this->Form->control('acceptable');
            echo $this->Form->control('supplementary_need');
            echo $this->Form->control('overall_comments');
            echo $this->Form->control('additional');
            echo $this->Form->control('updated_at', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

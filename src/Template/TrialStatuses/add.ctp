<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrialStatus $trialStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trial Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trialStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($trialStatus) ?>
    <fieldset>
        <legend><?= __('Add Trial Status') ?></legend>
        <?php
            echo $this->Form->control('value');
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

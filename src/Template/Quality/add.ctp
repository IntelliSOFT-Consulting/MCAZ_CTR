<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quality $quality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Quality'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quality form large-9 medium-8 columns content">
    <?= $this->Form->create($quality) ?>
    <fieldset>
        <legend><?= __('Add Quality') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('submitted');
            echo $this->Form->control('quality_workspace');
            echo $this->Form->control('gmp_smpc');
            echo $this->Form->control('gmp_included');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

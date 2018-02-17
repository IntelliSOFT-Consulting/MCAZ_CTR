<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine $medicine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Medicines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicines form large-9 medium-8 columns content">
    <?= $this->Form->create($medicine) ?>
    <fieldset>
        <legend><?= __('Add Medicine') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('medicine_name');
            echo $this->Form->control('quantity_required');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

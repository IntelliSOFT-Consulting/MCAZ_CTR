<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dose $dose
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Doses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doses form large-9 medium-8 columns content">
    <?= $this->Form->create($dose) ?>
    <fieldset>
        <legend><?= __('Add Dose') ?></legend>
        <?php
            echo $this->Form->control('value');
            echo $this->Form->control('icsr_code');
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

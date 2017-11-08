<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frequency $frequency
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $frequency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $frequency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="frequencies form large-9 medium-8 columns content">
    <?= $this->Form->create($frequency) ?>
    <fieldset>
        <legend><?= __('Edit Frequency') ?></legend>
        <?php
            echo $this->Form->control('value');
            echo $this->Form->control('name');
            echo $this->Form->control('icsr_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StorageCondition $storageCondition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storageCondition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storageCondition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storageConditions form large-9 medium-8 columns content">
    <?= $this->Form->create($storageCondition) ?>
    <fieldset>
        <legend><?= __('Edit Storage Condition') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('sdrug_id', ['options' => $sdrugs, 'empty' => true]);
            echo $this->Form->control('pdrug_id');
            echo $this->Form->control('batch_details');
            echo $this->Form->control('manu_process');
            echo $this->Form->control('neg_seventy');
            echo $this->Form->control('neg_twenty');
            echo $this->Form->control('pos_five');
            echo $this->Form->control('pos_twenty_five');
            echo $this->Form->control('pos_thirty');
            echo $this->Form->control('pos_forty');
            echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('updated_at', ['empty' => true]);
            echo $this->Form->control('model');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

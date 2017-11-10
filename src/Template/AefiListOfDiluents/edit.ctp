<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiListOfDiluent $aefiListOfDiluent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aefiListOfDiluent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfDiluent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Aefi List Of Diluents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiListOfDiluents form large-9 medium-8 columns content">
    <?= $this->Form->create($aefiListOfDiluent) ?>
    <fieldset>
        <legend><?= __('Edit Aefi List Of Diluent') ?></legend>
        <?php
            echo $this->Form->control('aefi_id', ['options' => $aefis, 'empty' => true]);
            echo $this->Form->control('diluent_name');
            echo $this->Form->control('diluent_date', ['empty' => true]);
            echo $this->Form->control('batch_number');
            echo $this->Form->control('expiry_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

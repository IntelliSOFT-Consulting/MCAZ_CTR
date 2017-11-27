<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrOtherDrug $sadrOtherDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sadr Other Drugs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrOtherDrugs form large-9 medium-8 columns content">
    <?= $this->Form->create($sadrOtherDrug) ?>
    <fieldset>
        <legend><?= __('Add Sadr Other Drug') ?></legend>
        <?php
            echo $this->Form->control('sadr_id', ['options' => $sadrs, 'empty' => true]);
            echo $this->Form->control('drug_name');
            echo $this->Form->control('start_date', ['empty' => true]);
            echo $this->Form->control('stop_date', ['empty' => true]);
            echo $this->Form->control('suspected_drug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

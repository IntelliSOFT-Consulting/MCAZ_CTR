<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrOtherDrug $adrOtherDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adr Other Drugs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrOtherDrugs form large-9 medium-8 columns content">
    <?= $this->Form->create($adrOtherDrug) ?>
    <fieldset>
        <legend><?= __('Add Adr Other Drug') ?></legend>
        <?php
            echo $this->Form->control('adr_id', ['options' => $adrs, 'empty' => true]);
            echo $this->Form->control('drug_name');
            echo $this->Form->control('start_date', ['empty' => true]);
            echo $this->Form->control('stop_date', ['empty' => true]);
            echo $this->Form->control('relationship_to_sae');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

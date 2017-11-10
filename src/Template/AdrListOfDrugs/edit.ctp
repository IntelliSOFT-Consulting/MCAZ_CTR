<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrListOfDrug $adrListOfDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adrListOfDrug->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adrListOfDrug->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Adr List Of Drugs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrListOfDrugs form large-9 medium-8 columns content">
    <?= $this->Form->create($adrListOfDrug) ?>
    <fieldset>
        <legend><?= __('Edit Adr List Of Drug') ?></legend>
        <?php
            echo $this->Form->control('adr_id', ['options' => $adrs, 'empty' => true]);
            echo $this->Form->control('drug_name');
            echo $this->Form->control('dosage');
            echo $this->Form->control('dose_id', ['options' => $doses, 'empty' => true]);
            echo $this->Form->control('route_id', ['options' => $routes, 'empty' => true]);
            echo $this->Form->control('frequency_id', ['options' => $frequencies, 'empty' => true]);
            echo $this->Form->control('start_date', ['empty' => true]);
            echo $this->Form->control('stop_date', ['empty' => true]);
            echo $this->Form->control('taking_drug');
            echo $this->Form->control('relationship_to_sae');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

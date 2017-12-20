<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrListOfDrug $sadrListOfDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrListOfDrugs form large-9 medium-8 columns content">
    <?= $this->Form->create($sadrListOfDrug) ?>
    <fieldset>
        <legend><?= __('Add Sadr List Of Drug') ?></legend>
        <?php
            echo $this->Form->control('sadr_id', ['options' => $sadrs, 'empty' => true]);
            echo $this->Form->control('sadr_followup_id', ['options' => $sadrFollowups, 'empty' => true]);
            echo $this->Form->control('dose_id', ['options' => $doses, 'empty' => true]);
            echo $this->Form->control('route_id', ['options' => $routes, 'empty' => true]);
            echo $this->Form->control('frequency_id', ['options' => $frequencies, 'empty' => true]);
            echo $this->Form->control('drug_name');
            echo $this->Form->control('brand_name');
            echo $this->Form->control('dose');
            echo $this->Form->control('start_date', ['empty' => true]);
            echo $this->Form->control('stop_date', ['empty' => true]);
            echo $this->Form->control('indication');
            echo $this->Form->control('suspected_drug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

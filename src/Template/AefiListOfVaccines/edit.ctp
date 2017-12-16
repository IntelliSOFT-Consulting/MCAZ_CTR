<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiListOfVaccine $aefiListOfVaccine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aefiListOfVaccine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfVaccine->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Aefi List Of Vaccines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiListOfVaccines form large-9 medium-8 columns content">
    <?= $this->Form->create($aefiListOfVaccine) ?>
    <fieldset>
        <legend><?= __('Edit Aefi List Of Vaccine') ?></legend>
        <?php
            echo $this->Form->control('aefi_id', ['options' => $aefis, 'empty' => true]);
            echo $this->Form->control('vaccine_name');
            echo $this->Form->control('vaccination_date', ['empty' => true]);
            echo $this->Form->control('dosage');
            echo $this->Form->control('batch_number');
            echo $this->Form->control('expiry_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

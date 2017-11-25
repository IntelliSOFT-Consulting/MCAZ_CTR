<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaefiListOfVaccine $saefiListOfVaccine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $saefiListOfVaccine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $saefiListOfVaccine->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Saefi List Of Vaccines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="saefiListOfVaccines form large-9 medium-8 columns content">
    <?= $this->Form->create($saefiListOfVaccine) ?>
    <fieldset>
        <legend><?= __('Edit Saefi List Of Vaccine') ?></legend>
        <?php
            echo $this->Form->control('saefi_id', ['options' => $saefis, 'empty' => true]);
            echo $this->Form->control('vaccine_name');
            echo $this->Form->control('vaccination_doses');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

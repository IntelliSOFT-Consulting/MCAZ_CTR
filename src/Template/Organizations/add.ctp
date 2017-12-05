<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organization $organization
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizations form large-9 medium-8 columns content">
    <?= $this->Form->create($organization) ?>
    <fieldset>
        <legend><?= __('Add Organization') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('organization');
            echo $this->Form->control('contact_person');
            echo $this->Form->control('address');
            echo $this->Form->control('telephone_number');
            echo $this->Form->control('all_tasks');
            echo $this->Form->control('monitoring');
            echo $this->Form->control('regulatory');
            echo $this->Form->control('investigator_recruitment');
            echo $this->Form->control('ivrs_treatment_randomisation');
            echo $this->Form->control('data_management');
            echo $this->Form->control('e_data_capture');
            echo $this->Form->control('susar_reporting');
            echo $this->Form->control('quality_assurance_auditing');
            echo $this->Form->control('statistical_analysis');
            echo $this->Form->control('medical_writing');
            echo $this->Form->control('other_duties');
            echo $this->Form->control('other_duties_specify');
            echo $this->Form->control('misc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sponsors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sponsors form large-9 medium-8 columns content">
    <?= $this->Form->create($sponsor) ?>
    <fieldset>
        <legend><?= __('Add Sponsor') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('sponsor');
            echo $this->Form->control('contact_person');
            echo $this->Form->control('address');
            echo $this->Form->control('telephone_number');
            echo $this->Form->control('fax_number');
            echo $this->Form->control('cell_number');
            echo $this->Form->control('email_address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

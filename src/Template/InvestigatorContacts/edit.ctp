<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvestigatorContact $investigatorContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $investigatorContact->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $investigatorContact->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Investigator Contacts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="investigatorContacts form large-9 medium-8 columns content">
    <?= $this->Form->create($investigatorContact) ?>
    <fieldset>
        <legend><?= __('Edit Investigator Contact') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('given_name');
            echo $this->Form->control('middle_name');
            echo $this->Form->control('family_name');
            echo $this->Form->control('qualification');
            echo $this->Form->control('professional_address');
            echo $this->Form->control('telephone');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

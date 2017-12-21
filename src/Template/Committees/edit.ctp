<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Committee $committee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $committee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $committee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Committees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="committees form large-9 medium-8 columns content">
    <?= $this->Form->create($committee) ?>
    <fieldset>
        <legend><?= __('Edit Committee') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('telephone_number');
            echo $this->Form->control('email_address');
            echo $this->Form->control('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

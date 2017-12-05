<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreviousDate $previousDate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $previousDate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $previousDate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Previous Dates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="previousDates form large-9 medium-8 columns content">
    <?= $this->Form->create($previousDate) ?>
    <fieldset>
        <legend><?= __('Edit Previous Date') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('date_of_previous_protocol', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

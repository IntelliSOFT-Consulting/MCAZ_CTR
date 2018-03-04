<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CommitteeDate $committeeDate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Committee Dates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="committeeDates form large-9 medium-8 columns content">
    <?= $this->Form->create($committeeDate) ?>
    <fieldset>
        <legend><?= __('Add Committee Date') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('meeting_date', ['empty' => true]);
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

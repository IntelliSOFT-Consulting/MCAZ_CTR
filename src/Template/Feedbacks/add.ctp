<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feedback $feedback
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="feedbacks form large-9 medium-8 columns content">
    <?= $this->Form->create($feedback) ?>
    <fieldset>
        <legend><?= __('Add Feedback') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('email');
            echo $this->Form->control('subject');
            echo $this->Form->control('feedback');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

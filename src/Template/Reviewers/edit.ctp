<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reviewer $reviewer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reviewer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reviewer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reviewers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reviewers form large-9 medium-8 columns content">
    <?= $this->Form->create($reviewer) ?>
    <fieldset>
        <legend><?= __('Edit Reviewer') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('description');
            echo $this->Form->control('notified');
            echo $this->Form->control('accepted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

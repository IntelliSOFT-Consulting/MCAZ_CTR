<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clinical $clinical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clinical->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clinical->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clinicals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluations'), ['controller' => 'Evaluations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluation'), ['controller' => 'Evaluations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clinicals form large-9 medium-8 columns content">
    <?= $this->Form->create($clinical) ?>
    <fieldset>
        <legend><?= __('Edit Clinical') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('evaluation_id', ['options' => $evaluations]);
            echo $this->Form->control('evaluation_type');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('sponsor_justification');
            echo $this->Form->control('justification_acceptable');
            echo $this->Form->control('products_authorised');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Placebo $placebo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $placebo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $placebo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Placebos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="placebos form large-9 medium-8 columns content">
    <?= $this->Form->create($placebo) ?>
    <fieldset>
        <legend><?= __('Edit Placebo') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('placebo_present');
            echo $this->Form->control('pharmaceutical_form');
            echo $this->Form->control('route_of_administration');
            echo $this->Form->control('composition');
            echo $this->Form->control('identical_indp');
            echo $this->Form->control('major_ingredients');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

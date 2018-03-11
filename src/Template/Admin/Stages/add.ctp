<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="stages form large-9 medium-8 columns content">
    <?= $this->Form->create($stage) ?>
    <fieldset>
        <legend><?= __('Add Stage') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('min_day');
            echo $this->Form->control('max_day');
            echo $this->Form->control('duration');
            echo $this->Form->control('allowance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

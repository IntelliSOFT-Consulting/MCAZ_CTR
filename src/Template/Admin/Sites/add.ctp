<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sites form large-9 medium-8 columns content">
    <?= $this->Form->create($site) ?>
    <fieldset>
        <legend><?= __('Add Site') ?></legend>
        <?php
            echo $this->Form->control('description');
            echo $this->Form->control('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

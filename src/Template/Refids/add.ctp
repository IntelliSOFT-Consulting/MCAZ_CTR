<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Refid $refid
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Refids'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="refids form large-9 medium-8 columns content">
    <?= $this->Form->create($refid) ?>
    <fieldset>
        <legend><?= __('Add Refid') ?></legend>
        <?php
            echo $this->Form->control('foreign_key');
            echo $this->Form->control('model');
            echo $this->Form->control('refid');
            echo $this->Form->control('year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

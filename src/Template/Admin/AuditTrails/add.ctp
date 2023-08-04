<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuditTrail $auditTrail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Audit Trails'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="auditTrails form large-9 medium-8 columns content">
    <?= $this->Form->create($auditTrail) ?>
    <fieldset>
        <legend><?= __('Add Audit Trail') ?></legend>
        <?php
            echo $this->Form->control('foreign_key');
            echo $this->Form->control('model');
            echo $this->Form->control('message');
            echo $this->Form->control('ip');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

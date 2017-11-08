<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attachment $attachment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attachments form large-9 medium-8 columns content">
    <?= $this->Form->create($attachment) ?>
    <fieldset>
        <legend><?= __('Add Attachment') ?></legend>
        <?php
            echo $this->Form->control('sadr_id', ['options' => $sadrs, 'empty' => true]);
            echo $this->Form->control('sadr_followup_id', ['options' => $sadrFollowups, 'empty' => true]);
            echo $this->Form->control('pqmp_id', ['options' => $pqmps, 'empty' => true]);
            echo $this->Form->control('filename');
            echo $this->Form->control('description');
            echo $this->Form->control('mimetype');
            echo $this->Form->control('filesize');
            echo $this->Form->control('dir');
            echo $this->Form->control('file');
            echo $this->Form->control('basename');
            echo $this->Form->control('dirname');
            echo $this->Form->control('checksum');
            echo $this->Form->control('model');
            echo $this->Form->control('foreign_key');
            echo $this->Form->control('alternative');
            echo $this->Form->control('group');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HelpInfo $helpInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Help Infos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="helpInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($helpInfo) ?>
    <fieldset>
        <legend><?= __('Add Help Info') ?></legend>
        <?php
            echo $this->Form->control('field_name');
            echo $this->Form->control('field_label');
            echo $this->Form->control('place_holder');
            echo $this->Form->control('help_type');
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('help_text');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HelpInfo $helpInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Help Info'), ['action' => 'edit', $helpInfo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Help Info'), ['action' => 'delete', $helpInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $helpInfo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Help Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Help Info'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="helpInfos view large-9 medium-8 columns content">
    <h3><?= h($helpInfo->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Field Name') ?></th>
            <td><?= h($helpInfo->field_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field Label') ?></th>
            <td><?= h($helpInfo->field_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place Holder') ?></th>
            <td><?= h($helpInfo->place_holder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Help Type') ?></th>
            <td><?= h($helpInfo->help_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($helpInfo->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Help Text') ?></th>
            <td><?= h($helpInfo->help_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($helpInfo->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($helpInfo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($helpInfo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($helpInfo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($helpInfo->content)); ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HelpInfo[]|\Cake\Collection\CollectionInterface $helpInfos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Help Info'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="helpInfos index large-9 medium-8 columns content">
    <h3><?= __('Help Infos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place_holder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('help_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('help_text') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($helpInfos as $helpInfo): ?>
            <tr>
                <td><?= $this->Number->format($helpInfo->id) ?></td>
                <td><?= h($helpInfo->field_name) ?></td>
                <td><?= h($helpInfo->field_label) ?></td>
                <td><?= h($helpInfo->place_holder) ?></td>
                <td><?= h($helpInfo->help_type) ?></td>
                <td><?= h($helpInfo->title) ?></td>
                <td><?= h($helpInfo->help_text) ?></td>
                <td><?= h($helpInfo->type) ?></td>
                <td><?= h($helpInfo->created) ?></td>
                <td><?= h($helpInfo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $helpInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $helpInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $helpInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $helpInfo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

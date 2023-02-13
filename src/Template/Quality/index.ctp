<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quality[]|\Cake\Collection\CollectionInterface $quality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Quality'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quality index large-9 medium-8 columns content">
    <h3><?= __('Quality') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gmp_smpc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gmp_included') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quality as $quality): ?>
            <tr>
                <td><?= $this->Number->format($quality->id) ?></td>
                <td><?= $quality->has('application') ? $this->Html->link($quality->application->id, ['controller' => 'Applications', 'action' => 'view', $quality->application->id]) : '' ?></td>
                <td><?= $quality->has('user') ? $this->Html->link($quality->user->name, ['controller' => 'Users', 'action' => 'view', $quality->user->id]) : '' ?></td>
                <td><?= h($quality->submitted) ?></td>
                <td><?= $this->Number->format($quality->gmp_smpc) ?></td>
                <td><?= $this->Number->format($quality->gmp_included) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $quality->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quality->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quality->id)]) ?>
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

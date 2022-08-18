<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clinical[]|\Cake\Collection\CollectionInterface $clinicals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clinical'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluations'), ['controller' => 'Evaluations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluation'), ['controller' => 'Evaluations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clinicals index large-9 medium-8 columns content">
    <h3><?= __('Clinicals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evaluation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evaluation_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('justification_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('products_authorised') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clinicals as $clinical): ?>
            <tr>
                <td><?= $this->Number->format($clinical->id) ?></td>
                <td><?= $clinical->has('application') ? $this->Html->link($clinical->application->id, ['controller' => 'Applications', 'action' => 'view', $clinical->application->id]) : '' ?></td>
                <td><?= $clinical->has('evaluation') ? $this->Html->link($clinical->evaluation->id, ['controller' => 'Evaluations', 'action' => 'view', $clinical->evaluation->id]) : '' ?></td>
                <td><?= $this->Number->format($clinical->evaluation_type) ?></td>
                <td><?= $clinical->has('user') ? $this->Html->link($clinical->user->name, ['controller' => 'Users', 'action' => 'view', $clinical->user->id]) : '' ?></td>
                <td><?= h($clinical->justification_acceptable) ?></td>
                <td><?= h($clinical->products_authorised) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clinical->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clinical->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clinical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinical->id)]) ?>
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

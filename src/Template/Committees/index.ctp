<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Committee[]|\Cake\Collection\CollectionInterface $committees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Committee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="committees index large-9 medium-8 columns content">
    <h3><?= __('Committees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($committees as $committee): ?>
            <tr>
                <td><?= $this->Number->format($committee->id) ?></td>
                <td><?= $committee->has('application') ? $this->Html->link($committee->application->id, ['controller' => 'Applications', 'action' => 'view', $committee->application->id]) : '' ?></td>
                <td><?= h($committee->name) ?></td>
                <td><?= h($committee->address) ?></td>
                <td><?= h($committee->telephone_number) ?></td>
                <td><?= h($committee->email_address) ?></td>
                <td><?= h($committee->deleted) ?></td>
                <td><?= h($committee->created) ?></td>
                <td><?= h($committee->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $committee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $committee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $committee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $committee->id)]) ?>
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

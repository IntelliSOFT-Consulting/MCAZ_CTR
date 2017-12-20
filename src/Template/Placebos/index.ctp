<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Placebo[]|\Cake\Collection\CollectionInterface $placebos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Placebo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="placebos index large-9 medium-8 columns content">
    <h3><?= __('Placebos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placebo_present') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pharmaceutical_form') ?></th>
                <th scope="col"><?= $this->Paginator->sort('route_of_administration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('composition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('identical_indp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($placebos as $placebo): ?>
            <tr>
                <td><?= $this->Number->format($placebo->id) ?></td>
                <td><?= $placebo->has('application') ? $this->Html->link($placebo->application->id, ['controller' => 'Applications', 'action' => 'view', $placebo->application->id]) : '' ?></td>
                <td><?= h($placebo->placebo_present) ?></td>
                <td><?= h($placebo->pharmaceutical_form) ?></td>
                <td><?= h($placebo->route_of_administration) ?></td>
                <td><?= h($placebo->composition) ?></td>
                <td><?= h($placebo->identical_indp) ?></td>
                <td><?= h($placebo->created) ?></td>
                <td><?= h($placebo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $placebo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $placebo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $placebo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $placebo->id)]) ?>
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

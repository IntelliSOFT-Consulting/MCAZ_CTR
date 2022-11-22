<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Statistical[]|\Cake\Collection\CollectionInterface $statisticals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Statistical'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="statisticals index large-9 medium-8 columns content">
    <h3><?= __('Statisticals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statistical_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evaluation_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('randomized') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blinding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sample_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('power_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('analysis_objective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('methods_appropriate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('considerations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multiplicity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('analyses_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interim_safety') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interim_planning') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statistical_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('information_needed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chosen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($statisticals as $statistical): ?>
            <tr>
                <td><?= $this->Number->format($statistical->id) ?></td>
                <td><?= $statistical->has('application') ? $this->Html->link($statistical->application->id, ['controller' => 'Applications', 'action' => 'view', $statistical->application->id]) : '' ?></td>
                <td><?= $statistical->has('user') ? $this->Html->link($statistical->user->name, ['controller' => 'Users', 'action' => 'view', $statistical->user->id]) : '' ?></td>
                <td><?= $this->Number->format($statistical->statistical_id) ?></td>
                <td><?= h($statistical->evaluation_type) ?></td>
                <td><?= h($statistical->design_type) ?></td>
                <td><?= h($statistical->randomized) ?></td>
                <td><?= h($statistical->blinding) ?></td>
                <td><?= h($statistical->design_acceptable) ?></td>
                <td><?= h($statistical->sample_acceptable) ?></td>
                <td><?= h($statistical->power_acceptable) ?></td>
                <td><?= h($statistical->analysis_objective) ?></td>
                <td><?= h($statistical->methods_appropriate) ?></td>
                <td><?= h($statistical->considerations) ?></td>
                <td><?= h($statistical->multiplicity) ?></td>
                <td><?= h($statistical->analyses_acceptable) ?></td>
                <td><?= h($statistical->interim_safety) ?></td>
                <td><?= h($statistical->interim_planning) ?></td>
                <td><?= h($statistical->statistical_acceptable) ?></td>
                <td><?= h($statistical->information_needed) ?></td>
                <td><?= $this->Number->format($statistical->chosen) ?></td>
                <td><?= h($statistical->created) ?></td>
                <td><?= h($statistical->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $statistical->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $statistical->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $statistical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $statistical->id)]) ?>
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

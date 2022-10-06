<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compliance[]|\Cake\Collection\CollectionInterface $compliance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Compliance'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="compliance index large-9 medium-8 columns content">
    <h3><?= __('Compliance') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quality_assessment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valid_license') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compliance as $compliance): ?>
            <tr>
                <td><?= $this->Number->format($compliance->id) ?></td>
                <td><?= $compliance->has('application') ? $this->Html->link($compliance->application->id, ['controller' => 'Applications', 'action' => 'view', $compliance->application->id]) : '' ?></td>
                <td><?= $compliance->has('quality_assessment') ? $this->Html->link($compliance->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $compliance->quality_assessment->id]) : '' ?></td>
                <td><?= h($compliance->valid_license) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $compliance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $compliance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $compliance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compliance->id)]) ?>
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

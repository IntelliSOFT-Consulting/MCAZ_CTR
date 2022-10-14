<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pdrug[]|\Cake\Collection\CollectionInterface $pdrugs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pdrug'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['controller' => 'StorageConditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['controller' => 'StorageConditions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pdrugs index large-9 medium-8 columns content">
    <h3><?= __('Pdrugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quality_assessment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('composition') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pdrugs as $pdrug): ?>
            <tr>
                <td><?= $this->Number->format($pdrug->id) ?></td>
                <td><?= $pdrug->has('application') ? $this->Html->link($pdrug->application->id, ['controller' => 'Applications', 'action' => 'view', $pdrug->application->id]) : '' ?></td>
                <td><?= $pdrug->has('quality_assessment') ? $this->Html->link($pdrug->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $pdrug->quality_assessment->id]) : '' ?></td>
                <td><?= $this->Number->format($pdrug->composition) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pdrug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pdrug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pdrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pdrug->id)]) ?>
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

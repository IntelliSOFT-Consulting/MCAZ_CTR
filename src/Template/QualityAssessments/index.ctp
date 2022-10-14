<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QualityAssessment[]|\Cake\Collection\CollectionInterface $qualityAssessments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Compliance'), ['controller' => 'Compliance', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Compliance'), ['controller' => 'Compliance', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['controller' => 'Pdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pdrug'), ['controller' => 'Pdrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="qualityAssessments index large-9 medium-8 columns content">
    <h3><?= __('Quality Assessments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gmp_included') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gmp_smpc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quality_data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adventitious_agents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('novel_excipients') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reconstitution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('labelling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplementary_need') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($qualityAssessments as $qualityAssessment): ?>
            <tr>
                <td><?= $this->Number->format($qualityAssessment->id) ?></td>
                <td><?= $qualityAssessment->has('application') ? $this->Html->link($qualityAssessment->application->id, ['controller' => 'Applications', 'action' => 'view', $qualityAssessment->application->id]) : '' ?></td>
                <td><?= $qualityAssessment->has('user') ? $this->Html->link($qualityAssessment->user->name, ['controller' => 'Users', 'action' => 'view', $qualityAssessment->user->id]) : '' ?></td>
                <td><?= $this->Number->format($qualityAssessment->gmp_included) ?></td>
                <td><?= $this->Number->format($qualityAssessment->gmp_smpc) ?></td>
                <td><?= h($qualityAssessment->quality_data) ?></td>
                <td><?= h($qualityAssessment->adventitious_agents) ?></td>
                <td><?= h($qualityAssessment->novel_excipients) ?></td>
                <td><?= h($qualityAssessment->reconstitution) ?></td>
                <td><?= h($qualityAssessment->labelling) ?></td>
                <td><?= h($qualityAssessment->acceptable) ?></td>
                <td><?= h($qualityAssessment->supplementary_need) ?></td>
                <td><?= h($qualityAssessment->created) ?></td>
                <td><?= h($qualityAssessment->updated_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $qualityAssessment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qualityAssessment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qualityAssessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualityAssessment->id)]) ?>
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

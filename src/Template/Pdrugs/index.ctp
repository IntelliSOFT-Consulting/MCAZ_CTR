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
                <th scope="col"><?= $this->Paginator->sort('pharma_adequate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manu_identified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('control_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('control_steps_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validation_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specification_criteria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('analytical_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('procedures_validated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('justification_satisfactory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('animal_origin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tse_satisfactory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('excipients_controlled') ?></th>
                <th scope="col"><?= $this->Paginator->sort('appropriate_limits') ?></th>
                <th scope="col"><?= $this->Paginator->sort('analytical_methods') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validation_procedure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validation_results') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_analyses') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_described_comments') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impurities_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_specifications') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_standards') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closure_system') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stability_tests') ?></th>
                <th scope="col"><?= $this->Paginator->sort('substantial_amendment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registered_protocol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
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
                <td><?= h($pdrug->pharma_adequate) ?></td>
                <td><?= h($pdrug->manu_identified) ?></td>
                <td><?= h($pdrug->batch_described) ?></td>
                <td><?= h($pdrug->control_described) ?></td>
                <td><?= h($pdrug->control_steps_described) ?></td>
                <td><?= h($pdrug->validation_described) ?></td>
                <td><?= h($pdrug->specification_criteria) ?></td>
                <td><?= h($pdrug->analytical_described) ?></td>
                <td><?= h($pdrug->procedures_validated) ?></td>
                <td><?= h($pdrug->justification_satisfactory) ?></td>
                <td><?= h($pdrug->animal_origin) ?></td>
                <td><?= h($pdrug->tse_satisfactory) ?></td>
                <td><?= h($pdrug->excipients_controlled) ?></td>
                <td><?= h($pdrug->appropriate_limits) ?></td>
                <td><?= h($pdrug->analytical_methods) ?></td>
                <td><?= h($pdrug->validation_procedure) ?></td>
                <td><?= h($pdrug->validation_results) ?></td>
                <td><?= h($pdrug->batch_analyses) ?></td>
                <td><?= h($pdrug->batch_described_comments) ?></td>
                <td><?= h($pdrug->impurities_acceptable) ?></td>
                <td><?= h($pdrug->product_specifications) ?></td>
                <td><?= h($pdrug->reference_standards) ?></td>
                <td><?= h($pdrug->closure_system) ?></td>
                <td><?= h($pdrug->stability_tests) ?></td>
                <td><?= h($pdrug->substantial_amendment) ?></td>
                <td><?= h($pdrug->registered_protocol) ?></td>
                <td><?= h($pdrug->created_at) ?></td>
                <td><?= h($pdrug->updated_at) ?></td>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sdrug[]|\Cake\Collection\CollectionInterface $sdrugs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sdrug'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sdrugs Conditions'), ['controller' => 'SdrugsConditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sdrugs Condition'), ['controller' => 'SdrugsConditions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['controller' => 'StorageConditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['controller' => 'StorageConditions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdrugs index large-9 medium-8 columns content">
    <h3><?= __('Sdrugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quality_assessment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mono_ph') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mono_japan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mono_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mono_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gmp_smpc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gmp_included') ?></th>
                <th scope="col"><?= $this->Paginator->sort('labelling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplementary_need') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_eur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_usp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_none') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_authorised') ?></th>
                <th scope="col"><?= $this->Paginator->sort('str_subsection') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gen_prop_adequately') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manu_identified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('process_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('control_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('control_steps_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validation_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manufacturing_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('substance_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impurities_characterised') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specifications_appropriate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('analytical_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acceptance_presented') ?></th>
                <th scope="col"><?= $this->Paginator->sort('suitability_explained') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_provided') ?></th>
                <th scope="col"><?= $this->Paginator->sort('substantial_amendment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registered_protocol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('justification_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('container_suitable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stability_satisfactory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdrugs as $sdrug): ?>
            <tr>
                <td><?= $this->Number->format($sdrug->id) ?></td>
                <td><?= $sdrug->has('application') ? $this->Html->link($sdrug->application->id, ['controller' => 'Applications', 'action' => 'view', $sdrug->application->id]) : '' ?></td>
                <td><?= $sdrug->has('quality_assessment') ? $this->Html->link($sdrug->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $sdrug->quality_assessment->id]) : '' ?></td>
                <td><?= h($sdrug->mono_ph) ?></td>
                <td><?= h($sdrug->mono_japan) ?></td>
                <td><?= h($sdrug->mono_other) ?></td>
                <td><?= h($sdrug->mono_no) ?></td>
                <td><?= h($sdrug->gmp_smpc) ?></td>
                <td><?= h($sdrug->gmp_included) ?></td>
                <td><?= h($sdrug->labelling) ?></td>
                <td><?= h($sdrug->acceptable) ?></td>
                <td><?= h($sdrug->supplementary_need) ?></td>
                <td><?= h($sdrug->submitted) ?></td>
                <td><?= h($sdrug->created) ?></td>
                <td><?= h($sdrug->deleted) ?></td>
                <td><?= h($sdrug->drug_eur) ?></td>
                <td><?= h($sdrug->drug_usp) ?></td>
                <td><?= h($sdrug->drug_none) ?></td>
                <td><?= h($sdrug->drug_authorised) ?></td>
                <td><?= h($sdrug->str_subsection) ?></td>
                <td><?= h($sdrug->gen_prop_adequately) ?></td>
                <td><?= h($sdrug->manu_identified) ?></td>
                <td><?= h($sdrug->process_described) ?></td>
                <td><?= h($sdrug->control_described) ?></td>
                <td><?= h($sdrug->control_steps_described) ?></td>
                <td><?= h($sdrug->validation_described) ?></td>
                <td><?= h($sdrug->manufacturing_described) ?></td>
                <td><?= h($sdrug->substance_described) ?></td>
                <td><?= h($sdrug->impurities_characterised) ?></td>
                <td><?= h($sdrug->specifications_appropriate) ?></td>
                <td><?= h($sdrug->analytical_described) ?></td>
                <td><?= h($sdrug->acceptance_presented) ?></td>
                <td><?= h($sdrug->suitability_explained) ?></td>
                <td><?= h($sdrug->batch_provided) ?></td>
                <td><?= h($sdrug->substantial_amendment) ?></td>
                <td><?= h($sdrug->registered_protocol) ?></td>
                <td><?= h($sdrug->justification_acceptable) ?></td>
                <td><?= h($sdrug->reference_described) ?></td>
                <td><?= h($sdrug->container_suitable) ?></td>
                <td><?= h($sdrug->stability_satisfactory) ?></td>
                <td><?= h($sdrug->created_at) ?></td>
                <td><?= h($sdrug->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdrug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdrug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdrug->id)]) ?>
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

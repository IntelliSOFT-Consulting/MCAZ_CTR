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
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
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
                <th scope="col"><?= $this->Paginator->sort('justification_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('container_suitable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stability_satisfactory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medical_product') ?></th>
                <th scope="col"><?= $this->Paginator->sort('agents_adequate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('novel_excipients') ?></th>
                <th scope="col"><?= $this->Paginator->sort('solvents_info') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placebo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auxiliary') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($qualityAssessments as $qualityAssessment): ?>
            <tr>
                <td><?= $this->Number->format($qualityAssessment->id) ?></td>
                <td><?= $qualityAssessment->has('application') ? $this->Html->link($qualityAssessment->application->id, ['controller' => 'Applications', 'action' => 'view', $qualityAssessment->application->id]) : '' ?></td>
                <td><?= $qualityAssessment->has('user') ? $this->Html->link($qualityAssessment->user->name, ['controller' => 'Users', 'action' => 'view', $qualityAssessment->user->id]) : '' ?></td>
                <td><?= h($qualityAssessment->code) ?></td>
                <td><?= h($qualityAssessment->gmp_smpc) ?></td>
                <td><?= h($qualityAssessment->gmp_included) ?></td>
                <td><?= h($qualityAssessment->labelling) ?></td>
                <td><?= h($qualityAssessment->acceptable) ?></td>
                <td><?= h($qualityAssessment->supplementary_need) ?></td>
                <td><?= h($qualityAssessment->submitted) ?></td>
                <td><?= h($qualityAssessment->created) ?></td>
                <td><?= h($qualityAssessment->deleted) ?></td>
                <td><?= h($qualityAssessment->drug_eur) ?></td>
                <td><?= h($qualityAssessment->drug_usp) ?></td>
                <td><?= h($qualityAssessment->drug_none) ?></td>
                <td><?= h($qualityAssessment->drug_authorised) ?></td>
                <td><?= h($qualityAssessment->str_subsection) ?></td>
                <td><?= h($qualityAssessment->gen_prop_adequately) ?></td>
                <td><?= h($qualityAssessment->manu_identified) ?></td>
                <td><?= h($qualityAssessment->process_described) ?></td>
                <td><?= h($qualityAssessment->control_described) ?></td>
                <td><?= h($qualityAssessment->control_steps_described) ?></td>
                <td><?= h($qualityAssessment->validation_described) ?></td>
                <td><?= h($qualityAssessment->manufacturing_described) ?></td>
                <td><?= h($qualityAssessment->substance_described) ?></td>
                <td><?= h($qualityAssessment->impurities_characterised) ?></td>
                <td><?= h($qualityAssessment->specifications_appropriate) ?></td>
                <td><?= h($qualityAssessment->analytical_described) ?></td>
                <td><?= h($qualityAssessment->acceptance_presented) ?></td>
                <td><?= h($qualityAssessment->suitability_explained) ?></td>
                <td><?= h($qualityAssessment->batch_provided) ?></td>
                <td><?= h($qualityAssessment->justification_acceptable) ?></td>
                <td><?= h($qualityAssessment->reference_described) ?></td>
                <td><?= h($qualityAssessment->container_suitable) ?></td>
                <td><?= h($qualityAssessment->stability_satisfactory) ?></td>
                <td><?= h($qualityAssessment->medical_product) ?></td>
                <td><?= h($qualityAssessment->agents_adequate) ?></td>
                <td><?= h($qualityAssessment->novel_excipients) ?></td>
                <td><?= h($qualityAssessment->solvents_info) ?></td>
                <td><?= h($qualityAssessment->placebo) ?></td>
                <td><?= h($qualityAssessment->auxiliary) ?></td>
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

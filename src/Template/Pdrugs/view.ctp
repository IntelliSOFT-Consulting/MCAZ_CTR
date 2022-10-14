<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pdrug $pdrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pdrug'), ['action' => 'edit', $pdrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pdrug'), ['action' => 'delete', $pdrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pdrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pdrug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['controller' => 'StorageConditions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['controller' => 'StorageConditions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pdrugs view large-9 medium-8 columns content">
    <h3><?= h($pdrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $pdrug->has('application') ? $this->Html->link($pdrug->application->id, ['controller' => 'Applications', 'action' => 'view', $pdrug->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quality Assessment') ?></th>
            <td><?= $pdrug->has('quality_assessment') ? $this->Html->link($pdrug->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $pdrug->quality_assessment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pharma Adequate') ?></th>
            <td><?= h($pdrug->pharma_adequate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manu Identified') ?></th>
            <td><?= h($pdrug->manu_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Described') ?></th>
            <td><?= h($pdrug->batch_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Control Described') ?></th>
            <td><?= h($pdrug->control_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Control Steps Described') ?></th>
            <td><?= h($pdrug->control_steps_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validation Described') ?></th>
            <td><?= h($pdrug->validation_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specification Criteria') ?></th>
            <td><?= h($pdrug->specification_criteria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analytical Described') ?></th>
            <td><?= h($pdrug->analytical_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedures Validated') ?></th>
            <td><?= h($pdrug->procedures_validated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Justification Satisfactory') ?></th>
            <td><?= h($pdrug->justification_satisfactory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Animal Origin') ?></th>
            <td><?= h($pdrug->animal_origin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tse Satisfactory') ?></th>
            <td><?= h($pdrug->tse_satisfactory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Excipients Controlled') ?></th>
            <td><?= h($pdrug->excipients_controlled) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Appropriate Limits') ?></th>
            <td><?= h($pdrug->appropriate_limits) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analytical Methods') ?></th>
            <td><?= h($pdrug->analytical_methods) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validation Procedure') ?></th>
            <td><?= h($pdrug->validation_procedure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validation Results') ?></th>
            <td><?= h($pdrug->validation_results) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Analyses') ?></th>
            <td><?= h($pdrug->batch_analyses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Described Comments') ?></th>
            <td><?= h($pdrug->batch_described_comments) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impurities Acceptable') ?></th>
            <td><?= h($pdrug->impurities_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Specifications') ?></th>
            <td><?= h($pdrug->product_specifications) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Standards') ?></th>
            <td><?= h($pdrug->reference_standards) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closure System') ?></th>
            <td><?= h($pdrug->closure_system) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stability Tests') ?></th>
            <td><?= h($pdrug->stability_tests) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Substantial Amendment') ?></th>
            <td><?= h($pdrug->substantial_amendment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registered Protocol') ?></th>
            <td><?= h($pdrug->registered_protocol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pdrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Composition') ?></th>
            <td><?= $this->Number->format($pdrug->composition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($pdrug->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($pdrug->updated_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Composition Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->composition_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Composition Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->composition_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pharma Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->pharma_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Manu Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->manu_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Manu Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->manu_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Batch Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->batch_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Batch Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->batch_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->control_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->control_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Steps Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->control_steps_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Validation Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->validation_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Validation Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->validation_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Specifications Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->specifications_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analytical Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->analytical_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Procedures Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->procedures_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->justification_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->justification_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tse Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->tse_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Excipients Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->excipients_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Excipients Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->excipients_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Appropriate Control Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->appropriate_control_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Appropriate Control Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->appropriate_control_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analytical Methods Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->analytical_methods_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Validation Second Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->validation_second_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Impurities Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->impurities_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Impurities Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->impurities_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Satis Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->justification_satis_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Specs Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->justification_specs_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Specs Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->justification_specs_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reference Standards Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->reference_standards_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Closure System Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->closure_system_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Stability Tests Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->stability_tests_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pdrug Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->pdrug_comments)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Storage Conditions') ?></h4>
        <?php if (!empty($pdrug->storage_conditions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Sdrug Id') ?></th>
                <th scope="col"><?= __('Pdrug Id') ?></th>
                <th scope="col"><?= __('Batch Details') ?></th>
                <th scope="col"><?= __('Manu Process') ?></th>
                <th scope="col"><?= __('Neg Seventy') ?></th>
                <th scope="col"><?= __('Neg Twenty') ?></th>
                <th scope="col"><?= __('Pos Five') ?></th>
                <th scope="col"><?= __('Pos Twenty Five') ?></th>
                <th scope="col"><?= __('Pos Thirty') ?></th>
                <th scope="col"><?= __('Pos Forty') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pdrug->storage_conditions as $storageConditions): ?>
            <tr>
                <td><?= h($storageConditions->id) ?></td>
                <td><?= h($storageConditions->application_id) ?></td>
                <td><?= h($storageConditions->sdrug_id) ?></td>
                <td><?= h($storageConditions->pdrug_id) ?></td>
                <td><?= h($storageConditions->batch_details) ?></td>
                <td><?= h($storageConditions->manu_process) ?></td>
                <td><?= h($storageConditions->neg_seventy) ?></td>
                <td><?= h($storageConditions->neg_twenty) ?></td>
                <td><?= h($storageConditions->pos_five) ?></td>
                <td><?= h($storageConditions->pos_twenty_five) ?></td>
                <td><?= h($storageConditions->pos_thirty) ?></td>
                <td><?= h($storageConditions->pos_forty) ?></td>
                <td><?= h($storageConditions->created_at) ?></td>
                <td><?= h($storageConditions->updated_at) ?></td>
                <td><?= h($storageConditions->model) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StorageConditions', 'action' => 'view', $storageConditions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StorageConditions', 'action' => 'edit', $storageConditions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StorageConditions', 'action' => 'delete', $storageConditions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageConditions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

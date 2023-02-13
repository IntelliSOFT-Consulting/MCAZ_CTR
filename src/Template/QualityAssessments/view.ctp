<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QualityAssessment $qualityAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Quality Assessment'), ['action' => 'edit', $qualityAssessment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quality Assessment'), ['action' => 'delete', $qualityAssessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualityAssessment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Compliance'), ['controller' => 'Compliance', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compliance'), ['controller' => 'Compliance', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['controller' => 'Pdrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pdrug'), ['controller' => 'Pdrugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quality Assessment Edits'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality Assessment Edit'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="qualityAssessments view large-9 medium-8 columns content">
    <h3><?= h($qualityAssessment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $qualityAssessment->has('application') ? $this->Html->link($qualityAssessment->application->id, ['controller' => 'Applications', 'action' => 'view', $qualityAssessment->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $qualityAssessment->has('user') ? $this->Html->link($qualityAssessment->user->name, ['controller' => 'Users', 'action' => 'view', $qualityAssessment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quality Assessment') ?></th>
            <td><?= $qualityAssessment->has('quality_assessment') ? $this->Html->link($qualityAssessment->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $qualityAssessment->quality_assessment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evaluation Type') ?></th>
            <td><?= h($qualityAssessment->evaluation_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quality Data') ?></th>
            <td><?= h($qualityAssessment->quality_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adventitious Agents') ?></th>
            <td><?= h($qualityAssessment->adventitious_agents) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Novel Excipients') ?></th>
            <td><?= h($qualityAssessment->novel_excipients) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reconstitution') ?></th>
            <td><?= h($qualityAssessment->reconstitution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Labelling') ?></th>
            <td><?= h($qualityAssessment->labelling) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acceptable') ?></th>
            <td><?= h($qualityAssessment->acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplementary Need') ?></th>
            <td><?= h($qualityAssessment->supplementary_need) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($qualityAssessment->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dir') ?></th>
            <td><?= h($qualityAssessment->dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= h($qualityAssessment->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($qualityAssessment->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($qualityAssessment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Included') ?></th>
            <td><?= $this->Number->format($qualityAssessment->gmp_included) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Smpc') ?></th>
            <td><?= $this->Number->format($qualityAssessment->gmp_smpc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chosen') ?></th>
            <td><?= $this->Number->format($qualityAssessment->chosen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($qualityAssessment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($qualityAssessment->updated_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Quality Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->quality_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Auxiliary Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->auxiliary_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Auxiliary Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->auxiliary_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Adventitious Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->adventitious_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Adventitious Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->adventitious_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Novel Excipients Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->novel_excipients_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Novel Excipients Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->novel_excipients_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reconstitution Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->reconstitution_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reconstitution Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->reconstitution_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Labelling Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->labelling_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Blinding Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->blinding_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Blinding Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->blinding_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Overall Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->overall_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->additional)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Compliance') ?></h4>
        <?php if (!empty($qualityAssessment->compliance)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Quality Assessment Id') ?></th>
                <th scope="col"><?= __('Site Name') ?></th>
                <th scope="col"><?= __('Site Function') ?></th>
                <th scope="col"><?= __('Valid License') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($qualityAssessment->compliance as $compliance): ?>
            <tr>
                <td><?= h($compliance->id) ?></td>
                <td><?= h($compliance->application_id) ?></td>
                <td><?= h($compliance->quality_assessment_id) ?></td>
                <td><?= h($compliance->site_name) ?></td>
                <td><?= h($compliance->site_function) ?></td>
                <td><?= h($compliance->valid_license) ?></td>
                <td><?= h($compliance->comment) ?></td>
                <td><?= h($compliance->created_at) ?></td>
                <td><?= h($compliance->updated_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Compliance', 'action' => 'view', $compliance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Compliance', 'action' => 'edit', $compliance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Compliance', 'action' => 'delete', $compliance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compliance->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pdrugs') ?></h4>
        <?php if (!empty($qualityAssessment->pdrugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Quality Assessment Id') ?></th>
                <th scope="col"><?= __('Composition') ?></th>
                <th scope="col"><?= __('Composition Workspace') ?></th>
                <th scope="col"><?= __('Composition Comment') ?></th>
                <th scope="col"><?= __('Pharma Adequate') ?></th>
                <th scope="col"><?= __('Pharma Comments') ?></th>
                <th scope="col"><?= __('Manu Identified') ?></th>
                <th scope="col"><?= __('Manu Workspace') ?></th>
                <th scope="col"><?= __('Manu Comments') ?></th>
                <th scope="col"><?= __('Batch Described') ?></th>
                <th scope="col"><?= __('Batch Workspace') ?></th>
                <th scope="col"><?= __('Batch Comments') ?></th>
                <th scope="col"><?= __('Control Described') ?></th>
                <th scope="col"><?= __('Control Workspace') ?></th>
                <th scope="col"><?= __('Control Comments') ?></th>
                <th scope="col"><?= __('Control Steps Described') ?></th>
                <th scope="col"><?= __('Control Steps Comments') ?></th>
                <th scope="col"><?= __('Validation Described') ?></th>
                <th scope="col"><?= __('Validation Workspace') ?></th>
                <th scope="col"><?= __('Validation Comments') ?></th>
                <th scope="col"><?= __('Specification Criteria') ?></th>
                <th scope="col"><?= __('Specifications Comments') ?></th>
                <th scope="col"><?= __('Analytical Described') ?></th>
                <th scope="col"><?= __('Analytical Comments') ?></th>
                <th scope="col"><?= __('Procedures Validated') ?></th>
                <th scope="col"><?= __('Procedures Comments') ?></th>
                <th scope="col"><?= __('Justification Satisfactory') ?></th>
                <th scope="col"><?= __('Justification Comments') ?></th>
                <th scope="col"><?= __('Justification Workspace') ?></th>
                <th scope="col"><?= __('Animal Origin') ?></th>
                <th scope="col"><?= __('Tse Satisfactory') ?></th>
                <th scope="col"><?= __('Tse Comments') ?></th>
                <th scope="col"><?= __('Excipients Controlled') ?></th>
                <th scope="col"><?= __('Excipients Workspace') ?></th>
                <th scope="col"><?= __('Excipients Comments') ?></th>
                <th scope="col"><?= __('Appropriate Limits') ?></th>
                <th scope="col"><?= __('Appropriate Control Workspace') ?></th>
                <th scope="col"><?= __('Appropriate Control Comments') ?></th>
                <th scope="col"><?= __('Analytical Methods') ?></th>
                <th scope="col"><?= __('Analytical Methods Comments') ?></th>
                <th scope="col"><?= __('Validation Procedure') ?></th>
                <th scope="col"><?= __('Validation Results') ?></th>
                <th scope="col"><?= __('Validation Second Comments') ?></th>
                <th scope="col"><?= __('Batch Analyses') ?></th>
                <th scope="col"><?= __('Batch Described Comments') ?></th>
                <th scope="col"><?= __('Impurities Acceptable') ?></th>
                <th scope="col"><?= __('Impurities Workspace') ?></th>
                <th scope="col"><?= __('Impurities Comments') ?></th>
                <th scope="col"><?= __('Product Specifications') ?></th>
                <th scope="col"><?= __('Justification Satis Comments') ?></th>
                <th scope="col"><?= __('Justification Specs Comments') ?></th>
                <th scope="col"><?= __('Justification Specs Workspace') ?></th>
                <th scope="col"><?= __('Reference Standards') ?></th>
                <th scope="col"><?= __('Reference Standards Comments') ?></th>
                <th scope="col"><?= __('Closure System') ?></th>
                <th scope="col"><?= __('Closure System Comments') ?></th>
                <th scope="col"><?= __('Stability Tests') ?></th>
                <th scope="col"><?= __('Stability Tests Workspace') ?></th>
                <th scope="col"><?= __('Substantial Amendment') ?></th>
                <th scope="col"><?= __('Registered Protocol') ?></th>
                <th scope="col"><?= __('Pdrug Comments') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($qualityAssessment->pdrugs as $pdrugs): ?>
            <tr>
                <td><?= h($pdrugs->id) ?></td>
                <td><?= h($pdrugs->application_id) ?></td>
                <td><?= h($pdrugs->quality_assessment_id) ?></td>
                <td><?= h($pdrugs->composition) ?></td>
                <td><?= h($pdrugs->composition_workspace) ?></td>
                <td><?= h($pdrugs->composition_comment) ?></td>
                <td><?= h($pdrugs->pharma_adequate) ?></td>
                <td><?= h($pdrugs->pharma_comments) ?></td>
                <td><?= h($pdrugs->manu_identified) ?></td>
                <td><?= h($pdrugs->manu_workspace) ?></td>
                <td><?= h($pdrugs->manu_comments) ?></td>
                <td><?= h($pdrugs->batch_described) ?></td>
                <td><?= h($pdrugs->batch_workspace) ?></td>
                <td><?= h($pdrugs->batch_comments) ?></td>
                <td><?= h($pdrugs->control_described) ?></td>
                <td><?= h($pdrugs->control_workspace) ?></td>
                <td><?= h($pdrugs->control_comments) ?></td>
                <td><?= h($pdrugs->control_steps_described) ?></td>
                <td><?= h($pdrugs->control_steps_comments) ?></td>
                <td><?= h($pdrugs->validation_described) ?></td>
                <td><?= h($pdrugs->validation_workspace) ?></td>
                <td><?= h($pdrugs->validation_comments) ?></td>
                <td><?= h($pdrugs->specification_criteria) ?></td>
                <td><?= h($pdrugs->specifications_comments) ?></td>
                <td><?= h($pdrugs->analytical_described) ?></td>
                <td><?= h($pdrugs->analytical_comments) ?></td>
                <td><?= h($pdrugs->procedures_validated) ?></td>
                <td><?= h($pdrugs->procedures_comments) ?></td>
                <td><?= h($pdrugs->justification_satisfactory) ?></td>
                <td><?= h($pdrugs->justification_comments) ?></td>
                <td><?= h($pdrugs->justification_workspace) ?></td>
                <td><?= h($pdrugs->animal_origin) ?></td>
                <td><?= h($pdrugs->tse_satisfactory) ?></td>
                <td><?= h($pdrugs->tse_comments) ?></td>
                <td><?= h($pdrugs->excipients_controlled) ?></td>
                <td><?= h($pdrugs->excipients_workspace) ?></td>
                <td><?= h($pdrugs->excipients_comments) ?></td>
                <td><?= h($pdrugs->appropriate_limits) ?></td>
                <td><?= h($pdrugs->appropriate_control_workspace) ?></td>
                <td><?= h($pdrugs->appropriate_control_comments) ?></td>
                <td><?= h($pdrugs->analytical_methods) ?></td>
                <td><?= h($pdrugs->analytical_methods_comments) ?></td>
                <td><?= h($pdrugs->validation_procedure) ?></td>
                <td><?= h($pdrugs->validation_results) ?></td>
                <td><?= h($pdrugs->validation_second_comments) ?></td>
                <td><?= h($pdrugs->batch_analyses) ?></td>
                <td><?= h($pdrugs->batch_described_comments) ?></td>
                <td><?= h($pdrugs->impurities_acceptable) ?></td>
                <td><?= h($pdrugs->impurities_workspace) ?></td>
                <td><?= h($pdrugs->impurities_comments) ?></td>
                <td><?= h($pdrugs->product_specifications) ?></td>
                <td><?= h($pdrugs->justification_satis_comments) ?></td>
                <td><?= h($pdrugs->justification_specs_comments) ?></td>
                <td><?= h($pdrugs->justification_specs_workspace) ?></td>
                <td><?= h($pdrugs->reference_standards) ?></td>
                <td><?= h($pdrugs->reference_standards_comments) ?></td>
                <td><?= h($pdrugs->closure_system) ?></td>
                <td><?= h($pdrugs->closure_system_comments) ?></td>
                <td><?= h($pdrugs->stability_tests) ?></td>
                <td><?= h($pdrugs->stability_tests_workspace) ?></td>
                <td><?= h($pdrugs->substantial_amendment) ?></td>
                <td><?= h($pdrugs->registered_protocol) ?></td>
                <td><?= h($pdrugs->pdrug_comments) ?></td>
                <td><?= h($pdrugs->created_at) ?></td>
                <td><?= h($pdrugs->updated_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pdrugs', 'action' => 'view', $pdrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pdrugs', 'action' => 'edit', $pdrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pdrugs', 'action' => 'delete', $pdrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pdrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Quality Assessments') ?></h4>
        <?php if (!empty($qualityAssessment->quality_assessment_edits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Quality Assessment Id') ?></th>
                <th scope="col"><?= __('Evaluation Type') ?></th>
                <th scope="col"><?= __('Quality Workspace') ?></th>
                <th scope="col"><?= __('Gmp Included') ?></th>
                <th scope="col"><?= __('Gmp Smpc') ?></th>
                <th scope="col"><?= __('Quality Data') ?></th>
                <th scope="col"><?= __('Auxiliary Workspace') ?></th>
                <th scope="col"><?= __('Auxiliary Comments') ?></th>
                <th scope="col"><?= __('Adventitious Agents') ?></th>
                <th scope="col"><?= __('Adventitious Workspace') ?></th>
                <th scope="col"><?= __('Adventitious Comments') ?></th>
                <th scope="col"><?= __('Novel Excipients') ?></th>
                <th scope="col"><?= __('Novel Excipients Workspace') ?></th>
                <th scope="col"><?= __('Novel Excipients Comments') ?></th>
                <th scope="col"><?= __('Reconstitution') ?></th>
                <th scope="col"><?= __('Reconstitution Workspace') ?></th>
                <th scope="col"><?= __('Reconstitution Comments') ?></th>
                <th scope="col"><?= __('Labelling') ?></th>
                <th scope="col"><?= __('Labelling Comments') ?></th>
                <th scope="col"><?= __('Blinding Workspace') ?></th>
                <th scope="col"><?= __('Blinding Comments') ?></th>
                <th scope="col"><?= __('Acceptable') ?></th>
                <th scope="col"><?= __('Supplementary Need') ?></th>
                <th scope="col"><?= __('Overall Comments') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Additional') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($qualityAssessment->quality_assessment_edits as $qualityAssessmentEdits): ?>
            <tr>
                <td><?= h($qualityAssessmentEdits->id) ?></td>
                <td><?= h($qualityAssessmentEdits->application_id) ?></td>
                <td><?= h($qualityAssessmentEdits->user_id) ?></td>
                <td><?= h($qualityAssessmentEdits->quality_assessment_id) ?></td>
                <td><?= h($qualityAssessmentEdits->evaluation_type) ?></td>
                <td><?= h($qualityAssessmentEdits->quality_workspace) ?></td>
                <td><?= h($qualityAssessmentEdits->gmp_included) ?></td>
                <td><?= h($qualityAssessmentEdits->gmp_smpc) ?></td>
                <td><?= h($qualityAssessmentEdits->quality_data) ?></td>
                <td><?= h($qualityAssessmentEdits->auxiliary_workspace) ?></td>
                <td><?= h($qualityAssessmentEdits->auxiliary_comments) ?></td>
                <td><?= h($qualityAssessmentEdits->adventitious_agents) ?></td>
                <td><?= h($qualityAssessmentEdits->adventitious_workspace) ?></td>
                <td><?= h($qualityAssessmentEdits->adventitious_comments) ?></td>
                <td><?= h($qualityAssessmentEdits->novel_excipients) ?></td>
                <td><?= h($qualityAssessmentEdits->novel_excipients_workspace) ?></td>
                <td><?= h($qualityAssessmentEdits->novel_excipients_comments) ?></td>
                <td><?= h($qualityAssessmentEdits->reconstitution) ?></td>
                <td><?= h($qualityAssessmentEdits->reconstitution_workspace) ?></td>
                <td><?= h($qualityAssessmentEdits->reconstitution_comments) ?></td>
                <td><?= h($qualityAssessmentEdits->labelling) ?></td>
                <td><?= h($qualityAssessmentEdits->labelling_comments) ?></td>
                <td><?= h($qualityAssessmentEdits->blinding_workspace) ?></td>
                <td><?= h($qualityAssessmentEdits->blinding_comments) ?></td>
                <td><?= h($qualityAssessmentEdits->acceptable) ?></td>
                <td><?= h($qualityAssessmentEdits->supplementary_need) ?></td>
                <td><?= h($qualityAssessmentEdits->overall_comments) ?></td>
                <td><?= h($qualityAssessmentEdits->file) ?></td>
                <td><?= h($qualityAssessmentEdits->dir) ?></td>
                <td><?= h($qualityAssessmentEdits->size) ?></td>
                <td><?= h($qualityAssessmentEdits->type) ?></td>
                <td><?= h($qualityAssessmentEdits->additional) ?></td>
                <td><?= h($qualityAssessmentEdits->chosen) ?></td>
                <td><?= h($qualityAssessmentEdits->created) ?></td>
                <td><?= h($qualityAssessmentEdits->updated_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'QualityAssessments', 'action' => 'view', $qualityAssessmentEdits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'QualityAssessments', 'action' => 'edit', $qualityAssessmentEdits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'QualityAssessments', 'action' => 'delete', $qualityAssessmentEdits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualityAssessmentEdits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sdrugs') ?></h4>
        <?php if (!empty($qualityAssessment->sdrugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Quality Assessment Id') ?></th>
                <th scope="col"><?= __('Mono Ph') ?></th>
                <th scope="col"><?= __('Mono Japan') ?></th>
                <th scope="col"><?= __('Mono Other') ?></th>
                <th scope="col"><?= __('Mono No') ?></th>
                <th scope="col"><?= __('Quality Workspace') ?></th>
                <th scope="col"><?= __('Gmp Smpc') ?></th>
                <th scope="col"><?= __('Gmp Included') ?></th>
                <th scope="col"><?= __('Labelling') ?></th>
                <th scope="col"><?= __('Labelling Comments') ?></th>
                <th scope="col"><?= __('Blinding Workspace') ?></th>
                <th scope="col"><?= __('Blinding Comments') ?></th>
                <th scope="col"><?= __('Acceptable') ?></th>
                <th scope="col"><?= __('Supplementary Need') ?></th>
                <th scope="col"><?= __('Overall Comments') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Drug Eur') ?></th>
                <th scope="col"><?= __('Drug Usp') ?></th>
                <th scope="col"><?= __('Drug None') ?></th>
                <th scope="col"><?= __('Drug Authorised') ?></th>
                <th scope="col"><?= __('Drug Ssection') ?></th>
                <th scope="col"><?= __('Nomen Workspace') ?></th>
                <th scope="col"><?= __('Noment Comment') ?></th>
                <th scope="col"><?= __('Str Subsection') ?></th>
                <th scope="col"><?= __('Str Workspace') ?></th>
                <th scope="col"><?= __('Str Comment') ?></th>
                <th scope="col"><?= __('Gen Prop Adequately') ?></th>
                <th scope="col"><?= __('Gen Prop Workspace') ?></th>
                <th scope="col"><?= __('Gen Prop Comment') ?></th>
                <th scope="col"><?= __('Manu Identified') ?></th>
                <th scope="col"><?= __('Process Described') ?></th>
                <th scope="col"><?= __('Gen Manu Comment') ?></th>
                <th scope="col"><?= __('Process Workspace') ?></th>
                <th scope="col"><?= __('Workspace Comment') ?></th>
                <th scope="col"><?= __('Control Described') ?></th>
                <th scope="col"><?= __('Control Workspace') ?></th>
                <th scope="col"><?= __('Control Comment') ?></th>
                <th scope="col"><?= __('Control Steps Described') ?></th>
                <th scope="col"><?= __('Control Steps Comments') ?></th>
                <th scope="col"><?= __('Validation Described') ?></th>
                <th scope="col"><?= __('Validation Comments') ?></th>
                <th scope="col"><?= __('Manufacturing Described') ?></th>
                <th scope="col"><?= __('Manufacturing Workspace') ?></th>
                <th scope="col"><?= __('Manufacturing Comments') ?></th>
                <th scope="col"><?= __('Substance Described') ?></th>
                <th scope="col"><?= __('Substance Workspace') ?></th>
                <th scope="col"><?= __('Substance Comments') ?></th>
                <th scope="col"><?= __('Impurities Characterised') ?></th>
                <th scope="col"><?= __('Impurities Workspace') ?></th>
                <th scope="col"><?= __('Impurities Comments') ?></th>
                <th scope="col"><?= __('Specifications Appropriate') ?></th>
                <th scope="col"><?= __('Specifications Workspace') ?></th>
                <th scope="col"><?= __('Specifications Comments') ?></th>
                <th scope="col"><?= __('Analytical Described') ?></th>
                <th scope="col"><?= __('Analytical Comments') ?></th>
                <th scope="col"><?= __('Acceptance Presented') ?></th>
                <th scope="col"><?= __('Suitability Explained') ?></th>
                <th scope="col"><?= __('Validation Procedures Comments') ?></th>
                <th scope="col"><?= __('Batch Provided') ?></th>
                <th scope="col"><?= __('Batch Workspace') ?></th>
                <th scope="col"><?= __('Batch Comments') ?></th>
                <th scope="col"><?= __('Substantial Amendment') ?></th>
                <th scope="col"><?= __('Registered Protocol') ?></th>
                <th scope="col"><?= __('Sdrug Comments') ?></th>
                <th scope="col"><?= __('Justification Acceptable') ?></th>
                <th scope="col"><?= __('Justification Workspace') ?></th>
                <th scope="col"><?= __('Justification Comments') ?></th>
                <th scope="col"><?= __('Reference Described') ?></th>
                <th scope="col"><?= __('Reference Comments') ?></th>
                <th scope="col"><?= __('Container Suitable') ?></th>
                <th scope="col"><?= __('Container Comments') ?></th>
                <th scope="col"><?= __('Stability Satisfactory') ?></th>
                <th scope="col"><?= __('Stability Workspace') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($qualityAssessment->sdrugs as $sdrugs): ?>
            <tr>
                <td><?= h($sdrugs->id) ?></td>
                <td><?= h($sdrugs->application_id) ?></td>
                <td><?= h($sdrugs->quality_assessment_id) ?></td>
                <td><?= h($sdrugs->mono_ph) ?></td>
                <td><?= h($sdrugs->mono_japan) ?></td>
                <td><?= h($sdrugs->mono_other) ?></td>
                <td><?= h($sdrugs->mono_no) ?></td>
                <td><?= h($sdrugs->quality_workspace) ?></td>
                <td><?= h($sdrugs->gmp_smpc) ?></td>
                <td><?= h($sdrugs->gmp_included) ?></td>
                <td><?= h($sdrugs->labelling) ?></td>
                <td><?= h($sdrugs->labelling_comments) ?></td>
                <td><?= h($sdrugs->blinding_workspace) ?></td>
                <td><?= h($sdrugs->blinding_comments) ?></td>
                <td><?= h($sdrugs->acceptable) ?></td>
                <td><?= h($sdrugs->supplementary_need) ?></td>
                <td><?= h($sdrugs->overall_comments) ?></td>
                <td><?= h($sdrugs->submitted) ?></td>
                <td><?= h($sdrugs->created) ?></td>
                <td><?= h($sdrugs->deleted) ?></td>
                <td><?= h($sdrugs->drug_eur) ?></td>
                <td><?= h($sdrugs->drug_usp) ?></td>
                <td><?= h($sdrugs->drug_none) ?></td>
                <td><?= h($sdrugs->drug_authorised) ?></td>
                <td><?= h($sdrugs->drug_ssection) ?></td>
                <td><?= h($sdrugs->nomen_workspace) ?></td>
                <td><?= h($sdrugs->noment_comment) ?></td>
                <td><?= h($sdrugs->str_subsection) ?></td>
                <td><?= h($sdrugs->str_workspace) ?></td>
                <td><?= h($sdrugs->str_comment) ?></td>
                <td><?= h($sdrugs->gen_prop_adequately) ?></td>
                <td><?= h($sdrugs->gen_prop_workspace) ?></td>
                <td><?= h($sdrugs->gen_prop_comment) ?></td>
                <td><?= h($sdrugs->manu_identified) ?></td>
                <td><?= h($sdrugs->process_described) ?></td>
                <td><?= h($sdrugs->gen_manu_comment) ?></td>
                <td><?= h($sdrugs->process_workspace) ?></td>
                <td><?= h($sdrugs->workspace_comment) ?></td>
                <td><?= h($sdrugs->control_described) ?></td>
                <td><?= h($sdrugs->control_workspace) ?></td>
                <td><?= h($sdrugs->control_comment) ?></td>
                <td><?= h($sdrugs->control_steps_described) ?></td>
                <td><?= h($sdrugs->control_steps_comments) ?></td>
                <td><?= h($sdrugs->validation_described) ?></td>
                <td><?= h($sdrugs->validation_comments) ?></td>
                <td><?= h($sdrugs->manufacturing_described) ?></td>
                <td><?= h($sdrugs->manufacturing_workspace) ?></td>
                <td><?= h($sdrugs->manufacturing_comments) ?></td>
                <td><?= h($sdrugs->substance_described) ?></td>
                <td><?= h($sdrugs->substance_workspace) ?></td>
                <td><?= h($sdrugs->substance_comments) ?></td>
                <td><?= h($sdrugs->impurities_characterised) ?></td>
                <td><?= h($sdrugs->impurities_workspace) ?></td>
                <td><?= h($sdrugs->impurities_comments) ?></td>
                <td><?= h($sdrugs->specifications_appropriate) ?></td>
                <td><?= h($sdrugs->specifications_workspace) ?></td>
                <td><?= h($sdrugs->specifications_comments) ?></td>
                <td><?= h($sdrugs->analytical_described) ?></td>
                <td><?= h($sdrugs->analytical_comments) ?></td>
                <td><?= h($sdrugs->acceptance_presented) ?></td>
                <td><?= h($sdrugs->suitability_explained) ?></td>
                <td><?= h($sdrugs->validation_procedures_comments) ?></td>
                <td><?= h($sdrugs->batch_provided) ?></td>
                <td><?= h($sdrugs->batch_workspace) ?></td>
                <td><?= h($sdrugs->batch_comments) ?></td>
                <td><?= h($sdrugs->substantial_amendment) ?></td>
                <td><?= h($sdrugs->registered_protocol) ?></td>
                <td><?= h($sdrugs->sdrug_comments) ?></td>
                <td><?= h($sdrugs->justification_acceptable) ?></td>
                <td><?= h($sdrugs->justification_workspace) ?></td>
                <td><?= h($sdrugs->justification_comments) ?></td>
                <td><?= h($sdrugs->reference_described) ?></td>
                <td><?= h($sdrugs->reference_comments) ?></td>
                <td><?= h($sdrugs->container_suitable) ?></td>
                <td><?= h($sdrugs->container_comments) ?></td>
                <td><?= h($sdrugs->stability_satisfactory) ?></td>
                <td><?= h($sdrugs->stability_workspace) ?></td>
                <td><?= h($sdrugs->created_at) ?></td>
                <td><?= h($sdrugs->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sdrugs', 'action' => 'view', $sdrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sdrugs', 'action' => 'edit', $sdrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sdrugs', 'action' => 'delete', $sdrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

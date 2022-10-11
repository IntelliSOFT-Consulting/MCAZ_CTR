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
        <li><?= $this->Html->link(__('List Compliance'), ['controller' => 'Compliance', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compliance'), ['controller' => 'Compliance', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($qualityAssessment->code) ?></td>
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
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= h($qualityAssessment->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Authorised') ?></th>
            <td><?= h($qualityAssessment->drug_authorised) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Str Subsection') ?></th>
            <td><?= h($qualityAssessment->str_subsection) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gen Prop Adequately') ?></th>
            <td><?= h($qualityAssessment->gen_prop_adequately) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manu Identified') ?></th>
            <td><?= h($qualityAssessment->manu_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Process Described') ?></th>
            <td><?= h($qualityAssessment->process_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Control Described') ?></th>
            <td><?= h($qualityAssessment->control_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Control Steps Described') ?></th>
            <td><?= h($qualityAssessment->control_steps_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validation Described') ?></th>
            <td><?= h($qualityAssessment->validation_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manufacturing Described') ?></th>
            <td><?= h($qualityAssessment->manufacturing_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Substance Described') ?></th>
            <td><?= h($qualityAssessment->substance_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impurities Characterised') ?></th>
            <td><?= h($qualityAssessment->impurities_characterised) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specifications Appropriate') ?></th>
            <td><?= h($qualityAssessment->specifications_appropriate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analytical Described') ?></th>
            <td><?= h($qualityAssessment->analytical_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acceptance Presented') ?></th>
            <td><?= h($qualityAssessment->acceptance_presented) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suitability Explained') ?></th>
            <td><?= h($qualityAssessment->suitability_explained) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Provided') ?></th>
            <td><?= h($qualityAssessment->batch_provided) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Justification Acceptable') ?></th>
            <td><?= h($qualityAssessment->justification_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Described') ?></th>
            <td><?= h($qualityAssessment->reference_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Container Suitable') ?></th>
            <td><?= h($qualityAssessment->container_suitable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stability Satisfactory') ?></th>
            <td><?= h($qualityAssessment->stability_satisfactory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medical Product') ?></th>
            <td><?= h($qualityAssessment->medical_product) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agents Adequate') ?></th>
            <td><?= h($qualityAssessment->agents_adequate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Novel Excipients') ?></th>
            <td><?= h($qualityAssessment->novel_excipients) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Solvents Info') ?></th>
            <td><?= h($qualityAssessment->solvents_info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Placebo') ?></th>
            <td><?= h($qualityAssessment->placebo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auxiliary') ?></th>
            <td><?= h($qualityAssessment->auxiliary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($qualityAssessment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($qualityAssessment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($qualityAssessment->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Smpc') ?></th>
            <td><?= $qualityAssessment->gmp_smpc ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Included') ?></th>
            <td><?= $qualityAssessment->gmp_included ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Eur') ?></th>
            <td><?= $qualityAssessment->drug_eur ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Usp') ?></th>
            <td><?= $qualityAssessment->drug_usp ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug None') ?></th>
            <td><?= $qualityAssessment->drug_none ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Quality Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->quality_workspace)); ?>
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
        <h4><?= __('Drug Ssection') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->drug_ssection)); ?>
    </div>
    <div class="row">
        <h4><?= __('Nomen Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->nomen_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Noment Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->noment_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Str Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->str_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Str Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->str_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gen Prop Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->gen_prop_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gen Prop Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->gen_prop_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gen Manu Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->gen_manu_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Process Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->process_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Workspace Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->workspace_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->control_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->control_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Steps Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->control_steps_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Validation Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->validation_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Manufacturing Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->manufacturing_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Manufacturing Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->manufacturing_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Substance Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->substance_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Substance Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->substance_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Impurities Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->impurities_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Impurities Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->impurities_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Specifications Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->specifications_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Specifications Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->specifications_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analytical Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->analytical_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Validation Procedures Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->validation_procedures_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Batch Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->batch_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Batch Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->batch_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->justification_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->justification_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reference Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->reference_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Container Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->container_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Stability Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->stability_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical Product Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->medical_product_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical Product Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->medical_product_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Agents Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->agents_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Agents Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->agents_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Novel Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->novel_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Novel Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->novel_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Solvents Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->solvents_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Solvents Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->solvents_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Placebo Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->placebo_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Placebo Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($qualityAssessment->placebo_comments)); ?>
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

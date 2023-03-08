<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sdrug $sdrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sdrug'), ['action' => 'edit', $sdrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sdrug'), ['action' => 'delete', $sdrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sdrug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sdrugs Conditions'), ['controller' => 'SdrugsConditions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sdrugs Condition'), ['controller' => 'SdrugsConditions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['controller' => 'StorageConditions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['controller' => 'StorageConditions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdrugs view large-9 medium-8 columns content">
    <h3><?= h($sdrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $sdrug->has('application') ? $this->Html->link($sdrug->application->id, ['controller' => 'Applications', 'action' => 'view', $sdrug->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quality Assessment') ?></th>
            <td><?= $sdrug->has('quality_assessment') ? $this->Html->link($sdrug->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $sdrug->quality_assessment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Labelling') ?></th>
            <td><?= h($sdrug->labelling) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acceptable') ?></th>
            <td><?= h($sdrug->acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplementary Need') ?></th>
            <td><?= h($sdrug->supplementary_need) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= h($sdrug->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Authorised') ?></th>
            <td><?= h($sdrug->drug_authorised) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Str Subsection') ?></th>
            <td><?= h($sdrug->str_subsection) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gen Prop Adequately') ?></th>
            <td><?= h($sdrug->gen_prop_adequately) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manu Identified') ?></th>
            <td><?= h($sdrug->manu_identified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Process Described') ?></th>
            <td><?= h($sdrug->process_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Control Described') ?></th>
            <td><?= h($sdrug->control_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Control Steps Described') ?></th>
            <td><?= h($sdrug->control_steps_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validation Described') ?></th>
            <td><?= h($sdrug->validation_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manufacturing Described') ?></th>
            <td><?= h($sdrug->manufacturing_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Substance Described') ?></th>
            <td><?= h($sdrug->substance_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impurities Characterised') ?></th>
            <td><?= h($sdrug->impurities_characterised) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specifications Appropriate') ?></th>
            <td><?= h($sdrug->specifications_appropriate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analytical Described') ?></th>
            <td><?= h($sdrug->analytical_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acceptance Presented') ?></th>
            <td><?= h($sdrug->acceptance_presented) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suitability Explained') ?></th>
            <td><?= h($sdrug->suitability_explained) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Provided') ?></th>
            <td><?= h($sdrug->batch_provided) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Substantial Amendment') ?></th>
            <td><?= h($sdrug->substantial_amendment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registered Protocol') ?></th>
            <td><?= h($sdrug->registered_protocol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Justification Acceptable') ?></th>
            <td><?= h($sdrug->justification_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Described') ?></th>
            <td><?= h($sdrug->reference_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Container Suitable') ?></th>
            <td><?= h($sdrug->container_suitable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stability Satisfactory') ?></th>
            <td><?= h($sdrug->stability_satisfactory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sdrug->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($sdrug->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($sdrug->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update At') ?></th>
            <td><?= h($sdrug->update_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mono Ph') ?></th>
            <td><?= $sdrug->mono_ph ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mono Japan') ?></th>
            <td><?= $sdrug->mono_japan ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mono Other') ?></th>
            <td><?= $sdrug->mono_other ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mono No') ?></th>
            <td><?= $sdrug->mono_no ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Smpc') ?></th>
            <td><?= $sdrug->gmp_smpc ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gmp Included') ?></th>
            <td><?= $sdrug->gmp_included ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Eur') ?></th>
            <td><?= $sdrug->drug_eur ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Usp') ?></th>
            <td><?= $sdrug->drug_usp ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug None') ?></th>
            <td><?= $sdrug->drug_none ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Quality Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->quality_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Labelling Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->labelling_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Blinding Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->blinding_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Blinding Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->blinding_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Overall Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->overall_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Drug Ssection') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->drug_ssection)); ?>
    </div>
    <div class="row">
        <h4><?= __('Nomen Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->nomen_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Noment Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->noment_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Str Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->str_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Str Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->str_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gen Prop Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->gen_prop_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gen Prop Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->gen_prop_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gen Manu Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->gen_manu_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Process Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->process_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Workspace Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->workspace_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->control_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->control_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Control Steps Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->control_steps_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Validation Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->validation_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Manufacturing Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->manufacturing_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Manufacturing Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->manufacturing_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Substance Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->substance_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Substance Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->substance_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Impurities Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->impurities_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Impurities Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->impurities_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Specifications Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->specifications_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Specifications Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->specifications_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analytical Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->analytical_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Validation Procedures Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->validation_procedures_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Batch Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->batch_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Batch Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->batch_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sdrug Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->sdrug_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->justification_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Justification Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->justification_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reference Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->reference_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Container Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->container_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Stability Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($sdrug->stability_workspace)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sdrugs Conditions') ?></h4>
        <?php if (!empty($sdrug->sdrugs_conditions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Sdrug Id') ?></th>
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
            <?php foreach ($sdrug->sdrugs_conditions as $sdrugsConditions): ?>
            <tr>
                <td><?= h($sdrugsConditions->id) ?></td>
                <td><?= h($sdrugsConditions->application_id) ?></td>
                <td><?= h($sdrugsConditions->sdrug_id) ?></td>
                <td><?= h($sdrugsConditions->batch_details) ?></td>
                <td><?= h($sdrugsConditions->manu_process) ?></td>
                <td><?= h($sdrugsConditions->neg_seventy) ?></td>
                <td><?= h($sdrugsConditions->neg_twenty) ?></td>
                <td><?= h($sdrugsConditions->pos_five) ?></td>
                <td><?= h($sdrugsConditions->pos_twenty_five) ?></td>
                <td><?= h($sdrugsConditions->pos_thirty) ?></td>
                <td><?= h($sdrugsConditions->pos_forty) ?></td>
                <td><?= h($sdrugsConditions->created_at) ?></td>
                <td><?= h($sdrugsConditions->updated_at) ?></td>
                <td><?= h($sdrugsConditions->model) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdrugsConditions', 'action' => 'view', $sdrugsConditions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdrugsConditions', 'action' => 'edit', $sdrugsConditions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdrugsConditions', 'action' => 'delete', $sdrugsConditions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdrugsConditions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Storage Conditions') ?></h4>
        <?php if (!empty($sdrug->storage_conditions)): ?>
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
            <?php foreach ($sdrug->storage_conditions as $storageConditions): ?>
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

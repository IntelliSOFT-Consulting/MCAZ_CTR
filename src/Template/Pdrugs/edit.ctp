<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pdrug $pdrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pdrug->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pdrug->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['controller' => 'StorageConditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['controller' => 'StorageConditions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pdrugs form large-9 medium-8 columns content">
    <?= $this->Form->create($pdrug) ?>
    <fieldset>
        <legend><?= __('Edit Pdrug') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('quality_assessment_id', ['options' => $qualityAssessments, 'empty' => true]);
            echo $this->Form->control('composition');
            echo $this->Form->control('composition_workspace');
            echo $this->Form->control('composition_comment');
            echo $this->Form->control('pharma_adequate');
            echo $this->Form->control('pharma_comments');
            echo $this->Form->control('manu_identified');
            echo $this->Form->control('manu_workspace');
            echo $this->Form->control('manu_comments');
            echo $this->Form->control('batch_described');
            echo $this->Form->control('batch_workspace');
            echo $this->Form->control('batch_comments');
            echo $this->Form->control('control_described');
            echo $this->Form->control('control_workspace');
            echo $this->Form->control('control_comments');
            echo $this->Form->control('control_steps_described');
            echo $this->Form->control('control_steps_comments');
            echo $this->Form->control('validation_described');
            echo $this->Form->control('validation_workspace');
            echo $this->Form->control('validation_comments');
            echo $this->Form->control('specification_criteria');
            echo $this->Form->control('specifications_comments');
            echo $this->Form->control('analytical_described');
            echo $this->Form->control('analytical_comments');
            echo $this->Form->control('procedures_validated');
            echo $this->Form->control('procedures_comments');
            echo $this->Form->control('justification_satisfactory');
            echo $this->Form->control('justification_comments');
            echo $this->Form->control('justification_workspace');
            echo $this->Form->control('animal_origin');
            echo $this->Form->control('tse_satisfactory');
            echo $this->Form->control('tse_comments');
            echo $this->Form->control('excipients_controlled');
            echo $this->Form->control('excipients_workspace');
            echo $this->Form->control('excipients_comments');
            echo $this->Form->control('appropriate_limits');
            echo $this->Form->control('appropriate_control_workspace');
            echo $this->Form->control('appropriate_control_comments');
            echo $this->Form->control('analytical_methods');
            echo $this->Form->control('analytical_methods_comments');
            echo $this->Form->control('validation_procedure');
            echo $this->Form->control('validation_results');
            echo $this->Form->control('validation_second_comments');
            echo $this->Form->control('batch_analyses');
            echo $this->Form->control('batch_described_comments');
            echo $this->Form->control('impurities_acceptable');
            echo $this->Form->control('impurities_workspace');
            echo $this->Form->control('impurities_comments');
            echo $this->Form->control('product_specifications');
            echo $this->Form->control('justification_satis_comments');
            echo $this->Form->control('justification_specs_comments');
            echo $this->Form->control('justification_specs_workspace');
            echo $this->Form->control('reference_standards');
            echo $this->Form->control('reference_standards_comments');
            echo $this->Form->control('closure_system');
            echo $this->Form->control('closure_system_comments');
            echo $this->Form->control('stability_tests');
            echo $this->Form->control('stability_tests_workspace');
            echo $this->Form->control('substantial_amendment');
            echo $this->Form->control('registered_protocol');
            echo $this->Form->control('pdrug_comments');
            echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('updated_at', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

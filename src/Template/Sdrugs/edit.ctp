<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sdrug $sdrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdrug->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdrug->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['action' => 'index']) ?></li>
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
<div class="sdrugs form large-9 medium-8 columns content">
    <?= $this->Form->create($sdrug) ?>
    <fieldset>
        <legend><?= __('Edit Sdrug') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('quality_assessment_id', ['options' => $qualityAssessments, 'empty' => true]);
            echo $this->Form->control('mono_ph');
            echo $this->Form->control('mono_japan');
            echo $this->Form->control('mono_other');
            echo $this->Form->control('mono_no');
            echo $this->Form->control('quality_workspace');
            echo $this->Form->control('gmp_smpc');
            echo $this->Form->control('gmp_included');
            echo $this->Form->control('labelling');
            echo $this->Form->control('labelling_comments');
            echo $this->Form->control('blinding_workspace');
            echo $this->Form->control('blinding_comments');
            echo $this->Form->control('acceptable');
            echo $this->Form->control('supplementary_need');
            echo $this->Form->control('overall_comments');
            echo $this->Form->control('submitted');
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('drug_eur');
            echo $this->Form->control('drug_usp');
            echo $this->Form->control('drug_none');
            echo $this->Form->control('drug_authorised');
            echo $this->Form->control('drug_ssection');
            echo $this->Form->control('nomen_workspace');
            echo $this->Form->control('noment_comment');
            echo $this->Form->control('str_subsection');
            echo $this->Form->control('str_workspace');
            echo $this->Form->control('str_comment');
            echo $this->Form->control('gen_prop_adequately');
            echo $this->Form->control('gen_prop_workspace');
            echo $this->Form->control('gen_prop_comment');
            echo $this->Form->control('manu_identified');
            echo $this->Form->control('process_described');
            echo $this->Form->control('gen_manu_comment');
            echo $this->Form->control('process_workspace');
            echo $this->Form->control('workspace_comment');
            echo $this->Form->control('control_described');
            echo $this->Form->control('control_workspace');
            echo $this->Form->control('control_comment');
            echo $this->Form->control('control_steps_described');
            echo $this->Form->control('control_steps_comments');
            echo $this->Form->control('validation_described');
            echo $this->Form->control('validation_comments');
            echo $this->Form->control('manufacturing_described');
            echo $this->Form->control('manufacturing_workspace');
            echo $this->Form->control('manufacturing_comments');
            echo $this->Form->control('substance_described');
            echo $this->Form->control('substance_workspace');
            echo $this->Form->control('substance_comments');
            echo $this->Form->control('impurities_characterised');
            echo $this->Form->control('impurities_workspace');
            echo $this->Form->control('impurities_comments');
            echo $this->Form->control('specifications_appropriate');
            echo $this->Form->control('specifications_workspace');
            echo $this->Form->control('specifications_comments');
            echo $this->Form->control('analytical_described');
            echo $this->Form->control('analytical_comments');
            echo $this->Form->control('acceptance_presented');
            echo $this->Form->control('suitability_explained');
            echo $this->Form->control('validation_procedures_comments');
            echo $this->Form->control('batch_provided');
            echo $this->Form->control('batch_workspace');
            echo $this->Form->control('batch_comments');
            echo $this->Form->control('substantial_amendment');
            echo $this->Form->control('registered_protocol');
            echo $this->Form->control('sdrug_comments');
            echo $this->Form->control('justification_acceptable');
            echo $this->Form->control('justification_workspace');
            echo $this->Form->control('justification_comments');
            echo $this->Form->control('reference_described');
            echo $this->Form->control('reference_comments');
            echo $this->Form->control('container_suitable');
            echo $this->Form->control('container_comments');
            echo $this->Form->control('stability_satisfactory');
            echo $this->Form->control('stability_workspace');
            echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('update_at', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QualityAssessment $qualityAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['action' => 'index']) ?></li>
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
<div class="qualityAssessments form large-9 medium-8 columns content">
    <?= $this->Form->create($qualityAssessment) ?>
    <fieldset>
        <legend><?= __('Add Quality Assessment') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('code');
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
            echo $this->Form->control('justification_acceptable');
            echo $this->Form->control('justification_workspace');
            echo $this->Form->control('justification_comments');
            echo $this->Form->control('reference_described');
            echo $this->Form->control('reference_comments');
            echo $this->Form->control('container_suitable');
            echo $this->Form->control('container_comments');
            echo $this->Form->control('stability_satisfactory');
            echo $this->Form->control('stability_workspace');
            echo $this->Form->control('medical_product');
            echo $this->Form->control('medical_product_workspace');
            echo $this->Form->control('medical_product_comments');
            echo $this->Form->control('agents_adequate');
            echo $this->Form->control('agents_workspace');
            echo $this->Form->control('agents_comments');
            echo $this->Form->control('novel_excipients');
            echo $this->Form->control('novel_workspace');
            echo $this->Form->control('novel_comments');
            echo $this->Form->control('solvents_info');
            echo $this->Form->control('solvents_workspace');
            echo $this->Form->control('solvents_comments');
            echo $this->Form->control('placebo');
            echo $this->Form->control('placebo_workspace');
            echo $this->Form->control('placebo_comments');
            echo $this->Form->control('auxiliary');
            echo $this->Form->control('auxiliary_workspace');
            echo $this->Form->control('auxiliary_comments');
            echo $this->Form->control('additional');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

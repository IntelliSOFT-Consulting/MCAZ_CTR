<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clinical $clinical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clinicals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clinicals form large-9 medium-8 columns content">
    <?= $this->Form->create($clinical) ?>
    <fieldset>
        <legend><?= __('Add Clinical') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('clinical_id');
            echo $this->Form->control('evaluation_type');
            echo $this->Form->control('sponsor_justification');
            echo $this->Form->control('sponsor_comment');
            echo $this->Form->control('low_intervention');
            echo $this->Form->control('evidence_based');
            echo $this->Form->control('products_authorised');
            echo $this->Form->control('poses_risk');
            echo $this->Form->control('posed_risks_comment');
            echo $this->Form->control('trial_phase');
            echo $this->Form->control('therapeutic_condition');
            echo $this->Form->control('action_mechanism');
            echo $this->Form->control('development_status');
            echo $this->Form->control('rationale_acceptable');
            echo $this->Form->control('objective_acceptable');
            echo $this->Form->control('endpoint_acceptable');
            echo $this->Form->control('objective_comments');
            echo $this->Form->control('secondary_objective_acceptable');
            echo $this->Form->control('secondary_endpoint_acceptable');
            echo $this->Form->control('secondary_objective_comments');
            echo $this->Form->control('study_health_participants');
            echo $this->Form->control('study_participants');
            echo $this->Form->control('study_adults');
            echo $this->Form->control('study_adolescent');
            echo $this->Form->control('study_elderly');
            echo $this->Form->control('study_male');
            echo $this->Form->control('study_female');
            echo $this->Form->control('adolescents_age_group');
            echo $this->Form->control('potential_contraception');
            echo $this->Form->control('potential_none_contraception');
            echo $this->Form->control('study_population_comments');
            echo $this->Form->control('inclusion_acceptable');
            echo $this->Form->control('inclusion_comments');
            echo $this->Form->control('exclusion_acceptable');
            echo $this->Form->control('exclusion_comments');
            echo $this->Form->control('vulnerable_population');
            echo $this->Form->control('justifiable_population');
            echo $this->Form->control('clinical_benefit');
            echo $this->Form->control('vulnerable_comments');
            echo $this->Form->control('proposed_study_acceptable');
            echo $this->Form->control('study_plan_comments');
            echo $this->Form->control('imp_acceptable');
            echo $this->Form->control('imp_other');
            echo $this->Form->control('imp_comments');
            echo $this->Form->control('comparator_usage');
            echo $this->Form->control('comparator_comments');
            echo $this->Form->control('comparator_smpc');
            echo $this->Form->control('comparator_international');
            echo $this->Form->control('comparator_publications');
            echo $this->Form->control('comparator_acceptable');
            echo $this->Form->control('comparator_workspace_comments');
            echo $this->Form->control('placebo_usage');
            echo $this->Form->control('placebo_justified');
            echo $this->Form->control('placebo_comments');
            echo $this->Form->control('auxiliary_usage');
            echo $this->Form->control('auxiliary_justified');
            echo $this->Form->control('auxiliary_comments');
            echo $this->Form->control('medical_device_justified');
            echo $this->Form->control('medical_device_comments');
            echo $this->Form->control('associated_risks_comments');
            echo $this->Form->control('emergency_procedure_justified');
            echo $this->Form->control('additional_measures');
            echo $this->Form->control('unbinding_comments');
            echo $this->Form->control('teratogenicity_risk');
            echo $this->Form->control('contraceptive_acceptable');
            echo $this->Form->control('proposal_insufficient');
            echo $this->Form->control('proposal_comments');
            echo $this->Form->control('male_participants');
            echo $this->Form->control('male_participants_comments');
            echo $this->Form->control('contraception_treatment');
            echo $this->Form->control('contraception_treatment_comments');
            echo $this->Form->control('other_issue_comments');
            echo $this->Form->control('pregnancy_interval');
            echo $this->Form->control('pregnancy_interval_comments');
            echo $this->Form->control('pregnancy_test');
            echo $this->Form->control('pregnancy_test_comments');
            echo $this->Form->control('postmenopausal');
            echo $this->Form->control('postmenopausal_comments');
            echo $this->Form->control('other_issue');
            echo $this->Form->control('general_contraception_comments');
            echo $this->Form->control('discontinuation_criteria');
            echo $this->Form->control('criteria_acceptable');
            echo $this->Form->control('termination_criteria_acceptable');
            echo $this->Form->control('discontinuation_comments');
            echo $this->Form->control('permitted_concomitant');
            echo $this->Form->control('prohibited_concomitant');
            echo $this->Form->control('concomitant_comments');
            echo $this->Form->control('procedures_adequate');
            echo $this->Form->control('insufficient_frequency');
            echo $this->Form->control('frequency_comments');
            echo $this->Form->control('relevant_targets');
            echo $this->Form->control('relevant_targets_comments');
            echo $this->Form->control('minimization_measures');
            echo $this->Form->control('minimization_measures_comments');
            echo $this->Form->control('risk_unacceptable');
            echo $this->Form->control('risk_unacceptable_comments');
            echo $this->Form->control('insufficient_followup');
            echo $this->Form->control('insufficient_followup_comments');
            echo $this->Form->control('other_safety');
            echo $this->Form->control('other_safety_comments');
            echo $this->Form->control('rsi_included');
            echo $this->Form->control('acceptable_document');
            echo $this->Form->control('acceptable_format');
            echo $this->Form->control('expected_acceptable');
            echo $this->Form->control('general_irs_comments');
            echo $this->Form->control('general_safety_comments');
            echo $this->Form->control('dsmc_committee');
            echo $this->Form->control('arrangements_acceptable');
            echo $this->Form->control('dsmc_comments');
            echo $this->Form->control('trial_definition_acceptable');
            echo $this->Form->control('trial_definition_comments');
            echo $this->Form->control('collection_unacceptable');
            echo $this->Form->control('collection_unacceptable_comments');
            echo $this->Form->control('data_policies_acceptable');
            echo $this->Form->control('data_policies_acceptable_comments');
            echo $this->Form->control('unauthorised_unacceptable');
            echo $this->Form->control('unauthorised_unacceptable_comments');
            echo $this->Form->control('measures_unacceptable');
            echo $this->Form->control('measures_unacceptable_comments');
            echo $this->Form->control('breach_unacceptable');
            echo $this->Form->control('breach_unacceptable_comments');
            echo $this->Form->control('other_protection');
            echo $this->Form->control('other_protection_comments');
            echo $this->Form->control('data_protection_comments');
            echo $this->Form->control('recruitment_unacceptable');
            echo $this->Form->control('recruitment_unacceptable_comments');
            echo $this->Form->control('recruitment_comments');
            echo $this->Form->control('risk_evaluation_unacceptable');
            echo $this->Form->control('participants_protection_acceptable');
            echo $this->Form->control('condition_unmonitored');
            echo $this->Form->control('condition_unmonitored_comments');
            echo $this->Form->control('unsafeguarded_rights');
            echo $this->Form->control('unsafeguarded_rights_comments');
            echo $this->Form->control('unmonitored_threshold');
            echo $this->Form->control('unmonitored_threshold_comments');
            echo $this->Form->control('risk_assessment_comments');
            echo $this->Form->control('application_acceptable');
            echo $this->Form->control('application_acceptable_comments');
            echo $this->Form->control('supplementary_required');
            echo $this->Form->control('supplementary_required_comments');
            echo $this->Form->control('overal_assessment_comments');
            echo $this->Form->control('chosen');
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('assessor_discussion');
            echo $this->Form->control('additional');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

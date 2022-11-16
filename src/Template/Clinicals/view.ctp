<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clinical $clinical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clinical'), ['action' => 'edit', $clinical->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clinical'), ['action' => 'delete', $clinical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinical->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clinicals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clinical'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clinicals view large-9 medium-8 columns content">
    <h3><?= h($clinical->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $clinical->has('application') ? $this->Html->link($clinical->application->id, ['controller' => 'Applications', 'action' => 'view', $clinical->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $clinical->has('user') ? $this->Html->link($clinical->user->name, ['controller' => 'Users', 'action' => 'view', $clinical->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evaluation Type') ?></th>
            <td><?= h($clinical->evaluation_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Low Intervention') ?></th>
            <td><?= h($clinical->low_intervention) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evidence Based') ?></th>
            <td><?= h($clinical->evidence_based) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Products Authorised') ?></th>
            <td><?= h($clinical->products_authorised) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poses Risk') ?></th>
            <td><?= h($clinical->poses_risk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rationale Acceptable') ?></th>
            <td><?= h($clinical->rationale_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Objective Acceptable') ?></th>
            <td><?= h($clinical->objective_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endpoint Acceptable') ?></th>
            <td><?= h($clinical->endpoint_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Secondary Objective Acceptable') ?></th>
            <td><?= h($clinical->secondary_objective_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Secondary Endpoint Acceptable') ?></th>
            <td><?= h($clinical->secondary_endpoint_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adolescents Age Group') ?></th>
            <td><?= h($clinical->adolescents_age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Potential Contraception') ?></th>
            <td><?= h($clinical->potential_contraception) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Potential None Contraception') ?></th>
            <td><?= h($clinical->potential_none_contraception) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Inclusion Acceptable') ?></th>
            <td><?= h($clinical->inclusion_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exclusion Acceptable') ?></th>
            <td><?= h($clinical->exclusion_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vulnerable Population') ?></th>
            <td><?= h($clinical->vulnerable_population) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Justifiable Population') ?></th>
            <td><?= h($clinical->justifiable_population) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clinical Benefit') ?></th>
            <td><?= h($clinical->clinical_benefit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imp Acceptable') ?></th>
            <td><?= h($clinical->imp_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comparator Usage') ?></th>
            <td><?= h($clinical->comparator_usage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comparator Acceptable') ?></th>
            <td><?= h($clinical->comparator_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Placebo Usage') ?></th>
            <td><?= h($clinical->placebo_usage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Placebo Justified') ?></th>
            <td><?= h($clinical->placebo_justified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auxiliary Usage') ?></th>
            <td><?= h($clinical->auxiliary_usage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auxiliary Justified') ?></th>
            <td><?= h($clinical->auxiliary_justified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medical Device Justified') ?></th>
            <td><?= h($clinical->medical_device_justified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emergency Procedure Justified') ?></th>
            <td><?= h($clinical->emergency_procedure_justified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Additional Measures') ?></th>
            <td><?= h($clinical->additional_measures) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teratogenicity Risk') ?></th>
            <td><?= h($clinical->teratogenicity_risk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contraceptive Acceptable') ?></th>
            <td><?= h($clinical->contraceptive_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Proposal Insufficient') ?></th>
            <td><?= h($clinical->proposal_insufficient) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discontinuation Criteria') ?></th>
            <td><?= h($clinical->discontinuation_criteria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criteria Acceptable') ?></th>
            <td><?= h($clinical->criteria_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permitted Concomitant') ?></th>
            <td><?= h($clinical->permitted_concomitant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rsi Included') ?></th>
            <td><?= h($clinical->rsi_included) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acceptable Document') ?></th>
            <td><?= h($clinical->acceptable_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acceptable Format') ?></th>
            <td><?= h($clinical->acceptable_format) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Acceptable') ?></th>
            <td><?= h($clinical->expected_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dsmc Committee') ?></th>
            <td><?= h($clinical->dsmc_committee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arrangements Acceptable') ?></th>
            <td><?= h($clinical->arrangements_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Definition Acceptable') ?></th>
            <td><?= h($clinical->trial_definition_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Collection Unacceptable') ?></th>
            <td><?= h($clinical->collection_unacceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risk Evaluation Unacceptable') ?></th>
            <td><?= h($clinical->risk_evaluation_unacceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participants Protection Acceptable') ?></th>
            <td><?= h($clinical->participants_protection_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clinical->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clinical Id') ?></th>
            <td><?= $this->Number->format($clinical->clinical_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chosen') ?></th>
            <td><?= $this->Number->format($clinical->chosen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($clinical->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($clinical->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Health Participants') ?></th>
            <td><?= $clinical->study_health_participants ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Participants') ?></th>
            <td><?= $clinical->study_participants ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Adults') ?></th>
            <td><?= $clinical->study_adults ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Adolescent') ?></th>
            <td><?= $clinical->study_adolescent ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Elderly') ?></th>
            <td><?= $clinical->study_elderly ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Male') ?></th>
            <td><?= $clinical->study_male ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Female') ?></th>
            <td><?= $clinical->study_female ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comparator Smpc') ?></th>
            <td><?= $clinical->comparator_smpc ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comparator International') ?></th>
            <td><?= $clinical->comparator_international ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comparator Publications') ?></th>
            <td><?= $clinical->comparator_publications ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Male Participants') ?></th>
            <td><?= $clinical->male_participants ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contraception Treatment') ?></th>
            <td><?= $clinical->contraception_treatment ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pregnancy Interval') ?></th>
            <td><?= $clinical->pregnancy_interval ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pregnancy Test') ?></th>
            <td><?= $clinical->pregnancy_test ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postmenopausal') ?></th>
            <td><?= $clinical->postmenopausal ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Issue') ?></th>
            <td><?= $clinical->other_issue ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prohibited Concomitant') ?></th>
            <td><?= $clinical->prohibited_concomitant ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedures Adequate') ?></th>
            <td><?= $clinical->procedures_adequate ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Insufficient Frequency') ?></th>
            <td><?= $clinical->insufficient_frequency ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relevant Targets') ?></th>
            <td><?= $clinical->relevant_targets ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minimization Measures') ?></th>
            <td><?= $clinical->minimization_measures ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risk Unacceptable') ?></th>
            <td><?= $clinical->risk_unacceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Insufficient Followup') ?></th>
            <td><?= $clinical->insufficient_followup ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Safety') ?></th>
            <td><?= $clinical->other_safety ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Policies Acceptable') ?></th>
            <td><?= $clinical->data_policies_acceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unauthorised Unacceptable') ?></th>
            <td><?= $clinical->unauthorised_unacceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Measures Unacceptable') ?></th>
            <td><?= $clinical->measures_unacceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breach Unacceptable') ?></th>
            <td><?= $clinical->breach_unacceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Protection') ?></th>
            <td><?= $clinical->other_protection ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recruitment Unacceptable') ?></th>
            <td><?= $clinical->recruitment_unacceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition Unmonitored') ?></th>
            <td><?= $clinical->condition_unmonitored ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unsafeguarded Rights') ?></th>
            <td><?= $clinical->unsafeguarded_rights ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unmonitored Threshold') ?></th>
            <td><?= $clinical->unmonitored_threshold ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Application Acceptable') ?></th>
            <td><?= $clinical->application_acceptable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplementary Required') ?></th>
            <td><?= $clinical->supplementary_required ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Sponsor Justification') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->sponsor_justification)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sponsor Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->sponsor_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Posed Risks Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->posed_risks_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Trial Phase') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->trial_phase)); ?>
    </div>
    <div class="row">
        <h4><?= __('Therapeutic Condition') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->therapeutic_condition)); ?>
    </div>
    <div class="row">
        <h4><?= __('Action Mechanism') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->action_mechanism)); ?>
    </div>
    <div class="row">
        <h4><?= __('Development Status') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->development_status)); ?>
    </div>
    <div class="row">
        <h4><?= __('Objective Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->objective_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Secondary Objective Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->secondary_objective_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Study Population Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->study_population_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Inclusion Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->inclusion_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Exclusion Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->exclusion_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vulnerable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->vulnerable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Proposed Study Acceptable') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->proposed_study_acceptable)); ?>
    </div>
    <div class="row">
        <h4><?= __('Study Plan Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->study_plan_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Imp Other') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->imp_other)); ?>
    </div>
    <div class="row">
        <h4><?= __('Imp Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->imp_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comparator Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->comparator_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comparator Workspace Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->comparator_workspace_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Placebo Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->placebo_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Auxiliary Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->auxiliary_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical Device Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->medical_device_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Associated Risks Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->associated_risks_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Unbinding Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->unbinding_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Proposal Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->proposal_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Male Participants Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->male_participants_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Contraception Treatment Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->contraception_treatment_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Issue Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->other_issue_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pregnancy Interval Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->pregnancy_interval_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pregnancy Test Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->pregnancy_test_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Postmenopausal Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->postmenopausal_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('General Contraception Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->general_contraception_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Termination Criteria Acceptable') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->termination_criteria_acceptable)); ?>
    </div>
    <div class="row">
        <h4><?= __('Discontinuation Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->discontinuation_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Concomitant Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->concomitant_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Frequency Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->frequency_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Relevant Targets Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->relevant_targets_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Minimization Measures Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->minimization_measures_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Risk Unacceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->risk_unacceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Insufficient Followup Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->insufficient_followup_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Safety Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->other_safety_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('General Irs Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->general_irs_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('General Safety Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->general_safety_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Dsmc Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->dsmc_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Trial Definition Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->trial_definition_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Collection Unacceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->collection_unacceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Data Policies Acceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->data_policies_acceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Unauthorised Unacceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->unauthorised_unacceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Measures Unacceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->measures_unacceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Breach Unacceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->breach_unacceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Protection Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->other_protection_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Data Protection Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->data_protection_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Recruitment Unacceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->recruitment_unacceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Recruitment Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->recruitment_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Condition Unmonitored Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->condition_unmonitored_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Unsafeguarded Rights Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->unsafeguarded_rights_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Unmonitored Threshold Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->unmonitored_threshold_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Risk Assessment Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->risk_assessment_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Application Acceptable Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->application_acceptable_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Supplementary Required Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->supplementary_required_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Overal Assessment Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->overal_assessment_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Assessor Discussion') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->assessor_discussion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional') ?></h4>
        <?= $this->Text->autoParagraph(h($clinical->additional)); ?>
    </div>
</div>

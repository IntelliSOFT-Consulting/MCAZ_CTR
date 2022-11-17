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
        <li><?= $this->Html->link(__('List Clinicals'), ['controller' => 'Clinicals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clinical'), ['controller' => 'Clinicals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clinical Edits'), ['controller' => 'Clinicals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clinical Edit'), ['controller' => 'Clinicals', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('Clinical') ?></th>
            <td><?= $clinical->has('clinical') ? $this->Html->link($clinical->clinical->id, ['controller' => 'Clinicals', 'action' => 'view', $clinical->clinical->id]) : '' ?></td>
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
            <th scope="row"><?= __('Chosen') ?></th>
            <td><?= $this->Number->format($clinical->chosen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($clinical->submitted) ?></td>
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
    <div class="related">
        <h4><?= __('Related Clinicals') ?></h4>
        <?php if (!empty($clinical->clinical_edits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Clinical Id') ?></th>
                <th scope="col"><?= __('Evaluation Type') ?></th>
                <th scope="col"><?= __('Sponsor Justification') ?></th>
                <th scope="col"><?= __('Sponsor Comment') ?></th>
                <th scope="col"><?= __('Low Intervention') ?></th>
                <th scope="col"><?= __('Evidence Based') ?></th>
                <th scope="col"><?= __('Products Authorised') ?></th>
                <th scope="col"><?= __('Poses Risk') ?></th>
                <th scope="col"><?= __('Posed Risks Comment') ?></th>
                <th scope="col"><?= __('Trial Phase') ?></th>
                <th scope="col"><?= __('Therapeutic Condition') ?></th>
                <th scope="col"><?= __('Action Mechanism') ?></th>
                <th scope="col"><?= __('Development Status') ?></th>
                <th scope="col"><?= __('Rationale Acceptable') ?></th>
                <th scope="col"><?= __('Objective Acceptable') ?></th>
                <th scope="col"><?= __('Endpoint Acceptable') ?></th>
                <th scope="col"><?= __('Objective Comments') ?></th>
                <th scope="col"><?= __('Secondary Objective Acceptable') ?></th>
                <th scope="col"><?= __('Secondary Endpoint Acceptable') ?></th>
                <th scope="col"><?= __('Secondary Objective Comments') ?></th>
                <th scope="col"><?= __('Study Health Participants') ?></th>
                <th scope="col"><?= __('Study Participants') ?></th>
                <th scope="col"><?= __('Study Adults') ?></th>
                <th scope="col"><?= __('Study Adolescent') ?></th>
                <th scope="col"><?= __('Study Elderly') ?></th>
                <th scope="col"><?= __('Study Male') ?></th>
                <th scope="col"><?= __('Study Female') ?></th>
                <th scope="col"><?= __('Adolescents Age Group') ?></th>
                <th scope="col"><?= __('Potential Contraception') ?></th>
                <th scope="col"><?= __('Potential None Contraception') ?></th>
                <th scope="col"><?= __('Study Population Comments') ?></th>
                <th scope="col"><?= __('Inclusion Acceptable') ?></th>
                <th scope="col"><?= __('Inclusion Comments') ?></th>
                <th scope="col"><?= __('Exclusion Acceptable') ?></th>
                <th scope="col"><?= __('Exclusion Comments') ?></th>
                <th scope="col"><?= __('Vulnerable Population') ?></th>
                <th scope="col"><?= __('Justifiable Population') ?></th>
                <th scope="col"><?= __('Clinical Benefit') ?></th>
                <th scope="col"><?= __('Vulnerable Comments') ?></th>
                <th scope="col"><?= __('Proposed Study Acceptable') ?></th>
                <th scope="col"><?= __('Study Plan Comments') ?></th>
                <th scope="col"><?= __('Imp Acceptable') ?></th>
                <th scope="col"><?= __('Imp Other') ?></th>
                <th scope="col"><?= __('Imp Comments') ?></th>
                <th scope="col"><?= __('Comparator Usage') ?></th>
                <th scope="col"><?= __('Comparator Comments') ?></th>
                <th scope="col"><?= __('Comparator Smpc') ?></th>
                <th scope="col"><?= __('Comparator International') ?></th>
                <th scope="col"><?= __('Comparator Publications') ?></th>
                <th scope="col"><?= __('Comparator Acceptable') ?></th>
                <th scope="col"><?= __('Comparator Workspace Comments') ?></th>
                <th scope="col"><?= __('Placebo Usage') ?></th>
                <th scope="col"><?= __('Placebo Justified') ?></th>
                <th scope="col"><?= __('Placebo Comments') ?></th>
                <th scope="col"><?= __('Auxiliary Usage') ?></th>
                <th scope="col"><?= __('Auxiliary Justified') ?></th>
                <th scope="col"><?= __('Auxiliary Comments') ?></th>
                <th scope="col"><?= __('Medical Device Justified') ?></th>
                <th scope="col"><?= __('Medical Device Comments') ?></th>
                <th scope="col"><?= __('Associated Risks Comments') ?></th>
                <th scope="col"><?= __('Emergency Procedure Justified') ?></th>
                <th scope="col"><?= __('Additional Measures') ?></th>
                <th scope="col"><?= __('Unbinding Comments') ?></th>
                <th scope="col"><?= __('Teratogenicity Risk') ?></th>
                <th scope="col"><?= __('Contraceptive Acceptable') ?></th>
                <th scope="col"><?= __('Proposal Insufficient') ?></th>
                <th scope="col"><?= __('Proposal Comments') ?></th>
                <th scope="col"><?= __('Male Participants') ?></th>
                <th scope="col"><?= __('Male Participants Comments') ?></th>
                <th scope="col"><?= __('Contraception Treatment') ?></th>
                <th scope="col"><?= __('Contraception Treatment Comments') ?></th>
                <th scope="col"><?= __('Other Issue Comments') ?></th>
                <th scope="col"><?= __('Pregnancy Interval') ?></th>
                <th scope="col"><?= __('Pregnancy Interval Comments') ?></th>
                <th scope="col"><?= __('Pregnancy Test') ?></th>
                <th scope="col"><?= __('Pregnancy Test Comments') ?></th>
                <th scope="col"><?= __('Postmenopausal') ?></th>
                <th scope="col"><?= __('Postmenopausal Comments') ?></th>
                <th scope="col"><?= __('Other Issue') ?></th>
                <th scope="col"><?= __('General Contraception Comments') ?></th>
                <th scope="col"><?= __('Discontinuation Criteria') ?></th>
                <th scope="col"><?= __('Criteria Acceptable') ?></th>
                <th scope="col"><?= __('Termination Criteria Acceptable') ?></th>
                <th scope="col"><?= __('Discontinuation Comments') ?></th>
                <th scope="col"><?= __('Permitted Concomitant') ?></th>
                <th scope="col"><?= __('Prohibited Concomitant') ?></th>
                <th scope="col"><?= __('Concomitant Comments') ?></th>
                <th scope="col"><?= __('Procedures Adequate') ?></th>
                <th scope="col"><?= __('Insufficient Frequency') ?></th>
                <th scope="col"><?= __('Frequency Comments') ?></th>
                <th scope="col"><?= __('Relevant Targets') ?></th>
                <th scope="col"><?= __('Relevant Targets Comments') ?></th>
                <th scope="col"><?= __('Minimization Measures') ?></th>
                <th scope="col"><?= __('Minimization Measures Comments') ?></th>
                <th scope="col"><?= __('Risk Unacceptable') ?></th>
                <th scope="col"><?= __('Risk Unacceptable Comments') ?></th>
                <th scope="col"><?= __('Insufficient Followup') ?></th>
                <th scope="col"><?= __('Insufficient Followup Comments') ?></th>
                <th scope="col"><?= __('Other Safety') ?></th>
                <th scope="col"><?= __('Other Safety Comments') ?></th>
                <th scope="col"><?= __('Rsi Included') ?></th>
                <th scope="col"><?= __('Acceptable Document') ?></th>
                <th scope="col"><?= __('Acceptable Format') ?></th>
                <th scope="col"><?= __('Expected Acceptable') ?></th>
                <th scope="col"><?= __('General Irs Comments') ?></th>
                <th scope="col"><?= __('General Safety Comments') ?></th>
                <th scope="col"><?= __('Dsmc Committee') ?></th>
                <th scope="col"><?= __('Arrangements Acceptable') ?></th>
                <th scope="col"><?= __('Dsmc Comments') ?></th>
                <th scope="col"><?= __('Trial Definition Acceptable') ?></th>
                <th scope="col"><?= __('Trial Definition Comments') ?></th>
                <th scope="col"><?= __('Collection Unacceptable') ?></th>
                <th scope="col"><?= __('Collection Unacceptable Comments') ?></th>
                <th scope="col"><?= __('Data Policies Acceptable') ?></th>
                <th scope="col"><?= __('Data Policies Acceptable Comments') ?></th>
                <th scope="col"><?= __('Unauthorised Unacceptable') ?></th>
                <th scope="col"><?= __('Unauthorised Unacceptable Comments') ?></th>
                <th scope="col"><?= __('Measures Unacceptable') ?></th>
                <th scope="col"><?= __('Measures Unacceptable Comments') ?></th>
                <th scope="col"><?= __('Breach Unacceptable') ?></th>
                <th scope="col"><?= __('Breach Unacceptable Comments') ?></th>
                <th scope="col"><?= __('Other Protection') ?></th>
                <th scope="col"><?= __('Other Protection Comments') ?></th>
                <th scope="col"><?= __('Data Protection Comments') ?></th>
                <th scope="col"><?= __('Recruitment Unacceptable') ?></th>
                <th scope="col"><?= __('Recruitment Unacceptable Comments') ?></th>
                <th scope="col"><?= __('Recruitment Comments') ?></th>
                <th scope="col"><?= __('Risk Evaluation Unacceptable') ?></th>
                <th scope="col"><?= __('Participants Protection Acceptable') ?></th>
                <th scope="col"><?= __('Condition Unmonitored') ?></th>
                <th scope="col"><?= __('Condition Unmonitored Comments') ?></th>
                <th scope="col"><?= __('Unsafeguarded Rights') ?></th>
                <th scope="col"><?= __('Unsafeguarded Rights Comments') ?></th>
                <th scope="col"><?= __('Unmonitored Threshold') ?></th>
                <th scope="col"><?= __('Unmonitored Threshold Comments') ?></th>
                <th scope="col"><?= __('Risk Assessment Comments') ?></th>
                <th scope="col"><?= __('Application Acceptable') ?></th>
                <th scope="col"><?= __('Application Acceptable Comments') ?></th>
                <th scope="col"><?= __('Supplementary Required') ?></th>
                <th scope="col"><?= __('Supplementary Required Comments') ?></th>
                <th scope="col"><?= __('Overal Assessment Comments') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Assessor Discussion') ?></th>
                <th scope="col"><?= __('Additional') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($clinical->clinical_edits as $clinicalEdits): ?>
            <tr>
                <td><?= h($clinicalEdits->id) ?></td>
                <td><?= h($clinicalEdits->application_id) ?></td>
                <td><?= h($clinicalEdits->user_id) ?></td>
                <td><?= h($clinicalEdits->clinical_id) ?></td>
                <td><?= h($clinicalEdits->evaluation_type) ?></td>
                <td><?= h($clinicalEdits->sponsor_justification) ?></td>
                <td><?= h($clinicalEdits->sponsor_comment) ?></td>
                <td><?= h($clinicalEdits->low_intervention) ?></td>
                <td><?= h($clinicalEdits->evidence_based) ?></td>
                <td><?= h($clinicalEdits->products_authorised) ?></td>
                <td><?= h($clinicalEdits->poses_risk) ?></td>
                <td><?= h($clinicalEdits->posed_risks_comment) ?></td>
                <td><?= h($clinicalEdits->trial_phase) ?></td>
                <td><?= h($clinicalEdits->therapeutic_condition) ?></td>
                <td><?= h($clinicalEdits->action_mechanism) ?></td>
                <td><?= h($clinicalEdits->development_status) ?></td>
                <td><?= h($clinicalEdits->rationale_acceptable) ?></td>
                <td><?= h($clinicalEdits->objective_acceptable) ?></td>
                <td><?= h($clinicalEdits->endpoint_acceptable) ?></td>
                <td><?= h($clinicalEdits->objective_comments) ?></td>
                <td><?= h($clinicalEdits->secondary_objective_acceptable) ?></td>
                <td><?= h($clinicalEdits->secondary_endpoint_acceptable) ?></td>
                <td><?= h($clinicalEdits->secondary_objective_comments) ?></td>
                <td><?= h($clinicalEdits->study_health_participants) ?></td>
                <td><?= h($clinicalEdits->study_participants) ?></td>
                <td><?= h($clinicalEdits->study_adults) ?></td>
                <td><?= h($clinicalEdits->study_adolescent) ?></td>
                <td><?= h($clinicalEdits->study_elderly) ?></td>
                <td><?= h($clinicalEdits->study_male) ?></td>
                <td><?= h($clinicalEdits->study_female) ?></td>
                <td><?= h($clinicalEdits->adolescents_age_group) ?></td>
                <td><?= h($clinicalEdits->potential_contraception) ?></td>
                <td><?= h($clinicalEdits->potential_none_contraception) ?></td>
                <td><?= h($clinicalEdits->study_population_comments) ?></td>
                <td><?= h($clinicalEdits->inclusion_acceptable) ?></td>
                <td><?= h($clinicalEdits->inclusion_comments) ?></td>
                <td><?= h($clinicalEdits->exclusion_acceptable) ?></td>
                <td><?= h($clinicalEdits->exclusion_comments) ?></td>
                <td><?= h($clinicalEdits->vulnerable_population) ?></td>
                <td><?= h($clinicalEdits->justifiable_population) ?></td>
                <td><?= h($clinicalEdits->clinical_benefit) ?></td>
                <td><?= h($clinicalEdits->vulnerable_comments) ?></td>
                <td><?= h($clinicalEdits->proposed_study_acceptable) ?></td>
                <td><?= h($clinicalEdits->study_plan_comments) ?></td>
                <td><?= h($clinicalEdits->imp_acceptable) ?></td>
                <td><?= h($clinicalEdits->imp_other) ?></td>
                <td><?= h($clinicalEdits->imp_comments) ?></td>
                <td><?= h($clinicalEdits->comparator_usage) ?></td>
                <td><?= h($clinicalEdits->comparator_comments) ?></td>
                <td><?= h($clinicalEdits->comparator_smpc) ?></td>
                <td><?= h($clinicalEdits->comparator_international) ?></td>
                <td><?= h($clinicalEdits->comparator_publications) ?></td>
                <td><?= h($clinicalEdits->comparator_acceptable) ?></td>
                <td><?= h($clinicalEdits->comparator_workspace_comments) ?></td>
                <td><?= h($clinicalEdits->placebo_usage) ?></td>
                <td><?= h($clinicalEdits->placebo_justified) ?></td>
                <td><?= h($clinicalEdits->placebo_comments) ?></td>
                <td><?= h($clinicalEdits->auxiliary_usage) ?></td>
                <td><?= h($clinicalEdits->auxiliary_justified) ?></td>
                <td><?= h($clinicalEdits->auxiliary_comments) ?></td>
                <td><?= h($clinicalEdits->medical_device_justified) ?></td>
                <td><?= h($clinicalEdits->medical_device_comments) ?></td>
                <td><?= h($clinicalEdits->associated_risks_comments) ?></td>
                <td><?= h($clinicalEdits->emergency_procedure_justified) ?></td>
                <td><?= h($clinicalEdits->additional_measures) ?></td>
                <td><?= h($clinicalEdits->unbinding_comments) ?></td>
                <td><?= h($clinicalEdits->teratogenicity_risk) ?></td>
                <td><?= h($clinicalEdits->contraceptive_acceptable) ?></td>
                <td><?= h($clinicalEdits->proposal_insufficient) ?></td>
                <td><?= h($clinicalEdits->proposal_comments) ?></td>
                <td><?= h($clinicalEdits->male_participants) ?></td>
                <td><?= h($clinicalEdits->male_participants_comments) ?></td>
                <td><?= h($clinicalEdits->contraception_treatment) ?></td>
                <td><?= h($clinicalEdits->contraception_treatment_comments) ?></td>
                <td><?= h($clinicalEdits->other_issue_comments) ?></td>
                <td><?= h($clinicalEdits->pregnancy_interval) ?></td>
                <td><?= h($clinicalEdits->pregnancy_interval_comments) ?></td>
                <td><?= h($clinicalEdits->pregnancy_test) ?></td>
                <td><?= h($clinicalEdits->pregnancy_test_comments) ?></td>
                <td><?= h($clinicalEdits->postmenopausal) ?></td>
                <td><?= h($clinicalEdits->postmenopausal_comments) ?></td>
                <td><?= h($clinicalEdits->other_issue) ?></td>
                <td><?= h($clinicalEdits->general_contraception_comments) ?></td>
                <td><?= h($clinicalEdits->discontinuation_criteria) ?></td>
                <td><?= h($clinicalEdits->criteria_acceptable) ?></td>
                <td><?= h($clinicalEdits->termination_criteria_acceptable) ?></td>
                <td><?= h($clinicalEdits->discontinuation_comments) ?></td>
                <td><?= h($clinicalEdits->permitted_concomitant) ?></td>
                <td><?= h($clinicalEdits->prohibited_concomitant) ?></td>
                <td><?= h($clinicalEdits->concomitant_comments) ?></td>
                <td><?= h($clinicalEdits->procedures_adequate) ?></td>
                <td><?= h($clinicalEdits->insufficient_frequency) ?></td>
                <td><?= h($clinicalEdits->frequency_comments) ?></td>
                <td><?= h($clinicalEdits->relevant_targets) ?></td>
                <td><?= h($clinicalEdits->relevant_targets_comments) ?></td>
                <td><?= h($clinicalEdits->minimization_measures) ?></td>
                <td><?= h($clinicalEdits->minimization_measures_comments) ?></td>
                <td><?= h($clinicalEdits->risk_unacceptable) ?></td>
                <td><?= h($clinicalEdits->risk_unacceptable_comments) ?></td>
                <td><?= h($clinicalEdits->insufficient_followup) ?></td>
                <td><?= h($clinicalEdits->insufficient_followup_comments) ?></td>
                <td><?= h($clinicalEdits->other_safety) ?></td>
                <td><?= h($clinicalEdits->other_safety_comments) ?></td>
                <td><?= h($clinicalEdits->rsi_included) ?></td>
                <td><?= h($clinicalEdits->acceptable_document) ?></td>
                <td><?= h($clinicalEdits->acceptable_format) ?></td>
                <td><?= h($clinicalEdits->expected_acceptable) ?></td>
                <td><?= h($clinicalEdits->general_irs_comments) ?></td>
                <td><?= h($clinicalEdits->general_safety_comments) ?></td>
                <td><?= h($clinicalEdits->dsmc_committee) ?></td>
                <td><?= h($clinicalEdits->arrangements_acceptable) ?></td>
                <td><?= h($clinicalEdits->dsmc_comments) ?></td>
                <td><?= h($clinicalEdits->trial_definition_acceptable) ?></td>
                <td><?= h($clinicalEdits->trial_definition_comments) ?></td>
                <td><?= h($clinicalEdits->collection_unacceptable) ?></td>
                <td><?= h($clinicalEdits->collection_unacceptable_comments) ?></td>
                <td><?= h($clinicalEdits->data_policies_acceptable) ?></td>
                <td><?= h($clinicalEdits->data_policies_acceptable_comments) ?></td>
                <td><?= h($clinicalEdits->unauthorised_unacceptable) ?></td>
                <td><?= h($clinicalEdits->unauthorised_unacceptable_comments) ?></td>
                <td><?= h($clinicalEdits->measures_unacceptable) ?></td>
                <td><?= h($clinicalEdits->measures_unacceptable_comments) ?></td>
                <td><?= h($clinicalEdits->breach_unacceptable) ?></td>
                <td><?= h($clinicalEdits->breach_unacceptable_comments) ?></td>
                <td><?= h($clinicalEdits->other_protection) ?></td>
                <td><?= h($clinicalEdits->other_protection_comments) ?></td>
                <td><?= h($clinicalEdits->data_protection_comments) ?></td>
                <td><?= h($clinicalEdits->recruitment_unacceptable) ?></td>
                <td><?= h($clinicalEdits->recruitment_unacceptable_comments) ?></td>
                <td><?= h($clinicalEdits->recruitment_comments) ?></td>
                <td><?= h($clinicalEdits->risk_evaluation_unacceptable) ?></td>
                <td><?= h($clinicalEdits->participants_protection_acceptable) ?></td>
                <td><?= h($clinicalEdits->condition_unmonitored) ?></td>
                <td><?= h($clinicalEdits->condition_unmonitored_comments) ?></td>
                <td><?= h($clinicalEdits->unsafeguarded_rights) ?></td>
                <td><?= h($clinicalEdits->unsafeguarded_rights_comments) ?></td>
                <td><?= h($clinicalEdits->unmonitored_threshold) ?></td>
                <td><?= h($clinicalEdits->unmonitored_threshold_comments) ?></td>
                <td><?= h($clinicalEdits->risk_assessment_comments) ?></td>
                <td><?= h($clinicalEdits->application_acceptable) ?></td>
                <td><?= h($clinicalEdits->application_acceptable_comments) ?></td>
                <td><?= h($clinicalEdits->supplementary_required) ?></td>
                <td><?= h($clinicalEdits->supplementary_required_comments) ?></td>
                <td><?= h($clinicalEdits->overal_assessment_comments) ?></td>
                <td><?= h($clinicalEdits->chosen) ?></td>
                <td><?= h($clinicalEdits->submitted) ?></td>
                <td><?= h($clinicalEdits->deleted) ?></td>
                <td><?= h($clinicalEdits->created) ?></td>
                <td><?= h($clinicalEdits->assessor_discussion) ?></td>
                <td><?= h($clinicalEdits->additional) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clinicals', 'action' => 'view', $clinicalEdits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clinicals', 'action' => 'edit', $clinicalEdits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clinicals', 'action' => 'delete', $clinicalEdits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalEdits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

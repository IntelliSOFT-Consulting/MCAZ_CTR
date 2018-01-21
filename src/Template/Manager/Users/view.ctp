<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aro'), ['controller' => 'Aros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aro'), ['controller' => 'Aros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $user->has('designation') ? $this->Html->link($user->designation->name, ['controller' => 'Designations', 'action' => 'view', $user->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Confirm Password') ?></th>
            <td><?= h($user->confirm_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Institution') ?></th>
            <td><?= h($user->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Address') ?></th>
            <td><?= h($user->institution_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Code') ?></th>
            <td><?= h($user->institution_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Contact') ?></th>
            <td><?= h($user->institution_contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ward') ?></th>
            <td><?= h($user->ward) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= h($user->phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activation Key') ?></th>
            <td><?= h($user->activation_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County Id') ?></th>
            <td><?= $this->Number->format($user->county_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forgot Password') ?></th>
            <td><?= $this->Number->format($user->forgot_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Email') ?></th>
            <td><?= $this->Number->format($user->initial_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Admin') ?></th>
            <td><?= $user->is_admin ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Aros') ?></h4>
        <?php if (!empty($user->aro)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->aro as $aro): ?>
            <tr>
                <td><?= h($aro->id) ?></td>
                <td><?= h($aro->parent_id) ?></td>
                <td><?= h($aro->model) ?></td>
                <td><?= h($aro->foreign_key) ?></td>
                <td><?= h($aro->alias) ?></td>
                <td><?= h($aro->lft) ?></td>
                <td><?= h($aro->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Aros', 'action' => 'view', $aro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Aros', 'action' => 'edit', $aro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aros', 'action' => 'delete', $aro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aro->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Feedbacks') ?></h4>
        <?php if (!empty($user->feedbacks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Sadr Followup Id') ?></th>
                <th scope="col"><?= __('Pqmp Id') ?></th>
                <th scope="col"><?= __('Feedback') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->feedbacks as $feedbacks): ?>
            <tr>
                <td><?= h($feedbacks->id) ?></td>
                <td><?= h($feedbacks->email) ?></td>
                <td><?= h($feedbacks->user_id) ?></td>
                <td><?= h($feedbacks->sadr_id) ?></td>
                <td><?= h($feedbacks->sadr_followup_id) ?></td>
                <td><?= h($feedbacks->pqmp_id) ?></td>
                <td><?= h($feedbacks->feedback) ?></td>
                <td><?= h($feedbacks->created) ?></td>
                <td><?= h($feedbacks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Feedbacks', 'action' => 'view', $feedbacks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Feedbacks', 'action' => 'edit', $feedbacks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Feedbacks', 'action' => 'delete', $feedbacks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedbacks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sadrs') ?></h4>
        <?php if (!empty($user->sadrs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Reference Number') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Name Of Institution') ?></th>
                <th scope="col"><?= __('Institution Code') ?></th>
                <th scope="col"><?= __('Patient Name') ?></th>
                <th scope="col"><?= __('Ip No') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Age Group') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Date Of Onset Of Reaction') ?></th>
                <th scope="col"><?= __('Date Of End Of Reaction') ?></th>
                <th scope="col"><?= __('Duration Type') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Description Of Reaction') ?></th>
                <th scope="col"><?= __('Severity') ?></th>
                <th scope="col"><?= __('Severity Reason') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Past Drug Therapy') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('Lab Test Results') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Device') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Action Taken') ?></th>
                <th scope="col"><?= __('Relatedness') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->sadrs as $sadrs): ?>
            <tr>
                <td><?= h($sadrs->id) ?></td>
                <td><?= h($sadrs->user_id) ?></td>
                <td><?= h($sadrs->reference_number) ?></td>
                <td><?= h($sadrs->designation_id) ?></td>
                <td><?= h($sadrs->report_type) ?></td>
                <td><?= h($sadrs->name_of_institution) ?></td>
                <td><?= h($sadrs->institution_code) ?></td>
                <td><?= h($sadrs->patient_name) ?></td>
                <td><?= h($sadrs->ip_no) ?></td>
                <td><?= h($sadrs->date_of_birth) ?></td>
                <td><?= h($sadrs->age_group) ?></td>
                <td><?= h($sadrs->gender) ?></td>
                <td><?= h($sadrs->weight) ?></td>
                <td><?= h($sadrs->height) ?></td>
                <td><?= h($sadrs->date_of_onset_of_reaction) ?></td>
                <td><?= h($sadrs->date_of_end_of_reaction) ?></td>
                <td><?= h($sadrs->duration_type) ?></td>
                <td><?= h($sadrs->duration) ?></td>
                <td><?= h($sadrs->description_of_reaction) ?></td>
                <td><?= h($sadrs->severity) ?></td>
                <td><?= h($sadrs->severity_reason) ?></td>
                <td><?= h($sadrs->medical_history) ?></td>
                <td><?= h($sadrs->past_drug_therapy) ?></td>
                <td><?= h($sadrs->outcome) ?></td>
                <td><?= h($sadrs->lab_test_results) ?></td>
                <td><?= h($sadrs->reporter_name) ?></td>
                <td><?= h($sadrs->reporter_email) ?></td>
                <td><?= h($sadrs->reporter_phone) ?></td>
                <td><?= h($sadrs->submitted) ?></td>
                <td><?= h($sadrs->emails) ?></td>
                <td><?= h($sadrs->active) ?></td>
                <td><?= h($sadrs->device) ?></td>
                <td><?= h($sadrs->notified) ?></td>
                <td><?= h($sadrs->created) ?></td>
                <td><?= h($sadrs->modified) ?></td>
                <td><?= h($sadrs->action_taken) ?></td>
                <td><?= h($sadrs->relatedness) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sadrs', 'action' => 'view', $sadrs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sadrs', 'action' => 'edit', $sadrs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sadrs', 'action' => 'delete', $sadrs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adrs') ?></h4>
        <?php if (!empty($user->adrs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Reference Number') ?></th>
                <th scope="col"><?= __('Mrcz Protocol Number') ?></th>
                <th scope="col"><?= __('Mcaz Protocol Number') ?></th>
                <th scope="col"><?= __('Principal Investigator') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Name Of Institution') ?></th>
                <th scope="col"><?= __('Institution Code') ?></th>
                <th scope="col"><?= __('Study Title') ?></th>
                <th scope="col"><?= __('Study Sponsor') ?></th>
                <th scope="col"><?= __('Date Of Adverse Event') ?></th>
                <th scope="col"><?= __('Participant Number') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Date Of Site Awareness') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Study Week') ?></th>
                <th scope="col"><?= __('Visit Number') ?></th>
                <th scope="col"><?= __('Adverse Event Type') ?></th>
                <th scope="col"><?= __('Sae Type') ?></th>
                <th scope="col"><?= __('Sae Description') ?></th>
                <th scope="col"><?= __('Toxicity Grade') ?></th>
                <th scope="col"><?= __('Previous Events') ?></th>
                <th scope="col"><?= __('Previous Events Number') ?></th>
                <th scope="col"><?= __('Total Saes') ?></th>
                <th scope="col"><?= __('Location Event') ?></th>
                <th scope="col"><?= __('Location Event Specify') ?></th>
                <th scope="col"><?= __('Research Involves') ?></th>
                <th scope="col"><?= __('Research Involves Specify') ?></th>
                <th scope="col"><?= __('Name Of Drug') ?></th>
                <th scope="col"><?= __('Drug Investigational') ?></th>
                <th scope="col"><?= __('Patient Other Drug') ?></th>
                <th scope="col"><?= __('Report To Mcaz') ?></th>
                <th scope="col"><?= __('Report To Mcaz Date') ?></th>
                <th scope="col"><?= __('Report To Mrcz') ?></th>
                <th scope="col"><?= __('Report To Mrcz Date') ?></th>
                <th scope="col"><?= __('Report To Sponsor') ?></th>
                <th scope="col"><?= __('Report To Sponsor Date') ?></th>
                <th scope="col"><?= __('Report To Irb') ?></th>
                <th scope="col"><?= __('Report To Irb Date') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Diagnosis') ?></th>
                <th scope="col"><?= __('Immediate Cause') ?></th>
                <th scope="col"><?= __('Symptoms') ?></th>
                <th scope="col"><?= __('Investigations') ?></th>
                <th scope="col"><?= __('Results') ?></th>
                <th scope="col"><?= __('Management') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('D1 Consent Form') ?></th>
                <th scope="col"><?= __('D2 Brochure') ?></th>
                <th scope="col"><?= __('D3 Changes Sae') ?></th>
                <th scope="col"><?= __('D4 Consent Sae') ?></th>
                <th scope="col"><?= __('Changes Explain') ?></th>
                <th scope="col"><?= __('Assess Risk') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->adrs as $adrs): ?>
            <tr>
                <td><?= h($adrs->id) ?></td>
                <td><?= h($adrs->user_id) ?></td>
                <td><?= h($adrs->reference_number) ?></td>
                <td><?= h($adrs->mrcz_protocol_number) ?></td>
                <td><?= h($adrs->mcaz_protocol_number) ?></td>
                <td><?= h($adrs->principal_investigator) ?></td>
                <td><?= h($adrs->reporter_name) ?></td>
                <td><?= h($adrs->reporter_email) ?></td>
                <td><?= h($adrs->designation_id) ?></td>
                <td><?= h($adrs->reporter_phone) ?></td>
                <td><?= h($adrs->name_of_institution) ?></td>
                <td><?= h($adrs->institution_code) ?></td>
                <td><?= h($adrs->study_title) ?></td>
                <td><?= h($adrs->study_sponsor) ?></td>
                <td><?= h($adrs->date_of_adverse_event) ?></td>
                <td><?= h($adrs->participant_number) ?></td>
                <td><?= h($adrs->report_type) ?></td>
                <td><?= h($adrs->date_of_site_awareness) ?></td>
                <td><?= h($adrs->date_of_birth) ?></td>
                <td><?= h($adrs->gender) ?></td>
                <td><?= h($adrs->study_week) ?></td>
                <td><?= h($adrs->visit_number) ?></td>
                <td><?= h($adrs->adverse_event_type) ?></td>
                <td><?= h($adrs->sae_type) ?></td>
                <td><?= h($adrs->sae_description) ?></td>
                <td><?= h($adrs->toxicity_grade) ?></td>
                <td><?= h($adrs->previous_events) ?></td>
                <td><?= h($adrs->previous_events_number) ?></td>
                <td><?= h($adrs->total_saes) ?></td>
                <td><?= h($adrs->location_event) ?></td>
                <td><?= h($adrs->location_event_specify) ?></td>
                <td><?= h($adrs->research_involves) ?></td>
                <td><?= h($adrs->research_involves_specify) ?></td>
                <td><?= h($adrs->name_of_drug) ?></td>
                <td><?= h($adrs->drug_investigational) ?></td>
                <td><?= h($adrs->patient_other_drug) ?></td>
                <td><?= h($adrs->report_to_mcaz) ?></td>
                <td><?= h($adrs->report_to_mcaz_date) ?></td>
                <td><?= h($adrs->report_to_mrcz) ?></td>
                <td><?= h($adrs->report_to_mrcz_date) ?></td>
                <td><?= h($adrs->report_to_sponsor) ?></td>
                <td><?= h($adrs->report_to_sponsor_date) ?></td>
                <td><?= h($adrs->report_to_irb) ?></td>
                <td><?= h($adrs->report_to_irb_date) ?></td>
                <td><?= h($adrs->medical_history) ?></td>
                <td><?= h($adrs->diagnosis) ?></td>
                <td><?= h($adrs->immediate_cause) ?></td>
                <td><?= h($adrs->symptoms) ?></td>
                <td><?= h($adrs->investigations) ?></td>
                <td><?= h($adrs->results) ?></td>
                <td><?= h($adrs->management) ?></td>
                <td><?= h($adrs->outcome) ?></td>
                <td><?= h($adrs->d1_consent_form) ?></td>
                <td><?= h($adrs->d2_brochure) ?></td>
                <td><?= h($adrs->d3_changes_sae) ?></td>
                <td><?= h($adrs->d4_consent_sae) ?></td>
                <td><?= h($adrs->changes_explain) ?></td>
                <td><?= h($adrs->assess_risk) ?></td>
                <td><?= h($adrs->created) ?></td>
                <td><?= h($adrs->modified) ?></td>
                <td><?= h($adrs->submitted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Adrs', 'action' => 'view', $adrs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Adrs', 'action' => 'edit', $adrs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Adrs', 'action' => 'delete', $adrs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefis') ?></h4>
        <?php if (!empty($user->aefis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Reference Number') ?></th>
                <th scope="col"><?= __('Patient Name') ?></th>
                <th scope="col"><?= __('Patient Surname') ?></th>
                <th scope="col"><?= __('Patient Next Of Kin') ?></th>
                <th scope="col"><?= __('Patient Address') ?></th>
                <th scope="col"><?= __('Patient Telephone') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Age At Onset') ?></th>
                <th scope="col"><?= __('Age At Onset Specify') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Reporter Department') ?></th>
                <th scope="col"><?= __('Reporter Address') ?></th>
                <th scope="col"><?= __('Reporter District') ?></th>
                <th scope="col"><?= __('Reporter Province') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Name Of Vaccination Center') ?></th>
                <th scope="col"><?= __('Adverse Events') ?></th>
                <th scope="col"><?= __('Ae Severe Local Reaction') ?></th>
                <th scope="col"><?= __('Ae Seizures') ?></th>
                <th scope="col"><?= __('Ae Abscess') ?></th>
                <th scope="col"><?= __('Ae Sepsis') ?></th>
                <th scope="col"><?= __('Ae Encephalopathy') ?></th>
                <th scope="col"><?= __('Ae Toxic Shock') ?></th>
                <th scope="col"><?= __('Ae Thrombocytopenia') ?></th>
                <th scope="col"><?= __('Ae Anaphylaxis') ?></th>
                <th scope="col"><?= __('Ae Fever') ?></th>
                <th scope="col"><?= __('Ae 3days') ?></th>
                <th scope="col"><?= __('Ae Febrile') ?></th>
                <th scope="col"><?= __('Ae Beyond Joint') ?></th>
                <th scope="col"><?= __('Ae Afebrile') ?></th>
                <th scope="col"><?= __('Ae Other') ?></th>
                <th scope="col"><?= __('Adverse Events Specify') ?></th>
                <th scope="col"><?= __('Aefi Date') ?></th>
                <th scope="col"><?= __('Notification Date') ?></th>
                <th scope="col"><?= __('Description Of Reaction') ?></th>
                <th scope="col"><?= __('Treatment Provided') ?></th>
                <th scope="col"><?= __('Serious') ?></th>
                <th scope="col"><?= __('Serious Yes') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('Died Date') ?></th>
                <th scope="col"><?= __('Autopsy') ?></th>
                <th scope="col"><?= __('Past Medical History') ?></th>
                <th scope="col"><?= __('District Receive Date') ?></th>
                <th scope="col"><?= __('Investigation Needed') ?></th>
                <th scope="col"><?= __('Investigation Date') ?></th>
                <th scope="col"><?= __('National Receive Date') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Province Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->aefis as $aefis): ?>
            <tr>
                <td><?= h($aefis->id) ?></td>
                <td><?= h($aefis->user_id) ?></td>
                <td><?= h($aefis->reference_number) ?></td>
                <td><?= h($aefis->patient_name) ?></td>
                <td><?= h($aefis->patient_surname) ?></td>
                <td><?= h($aefis->patient_next_of_kin) ?></td>
                <td><?= h($aefis->patient_address) ?></td>
                <td><?= h($aefis->patient_telephone) ?></td>
                <td><?= h($aefis->report_type) ?></td>
                <td><?= h($aefis->gender) ?></td>
                <td><?= h($aefis->date_of_birth) ?></td>
                <td><?= h($aefis->age_at_onset) ?></td>
                <td><?= h($aefis->age_at_onset_specify) ?></td>
                <td><?= h($aefis->reporter_name) ?></td>
                <td><?= h($aefis->designation_id) ?></td>
                <td><?= h($aefis->reporter_department) ?></td>
                <td><?= h($aefis->reporter_address) ?></td>
                <td><?= h($aefis->reporter_district) ?></td>
                <td><?= h($aefis->reporter_province) ?></td>
                <td><?= h($aefis->reporter_phone) ?></td>
                <td><?= h($aefis->reporter_email) ?></td>
                <td><?= h($aefis->name_of_vaccination_center) ?></td>
                <td><?= h($aefis->adverse_events) ?></td>
                <td><?= h($aefis->ae_severe_local_reaction) ?></td>
                <td><?= h($aefis->ae_seizures) ?></td>
                <td><?= h($aefis->ae_abscess) ?></td>
                <td><?= h($aefis->ae_sepsis) ?></td>
                <td><?= h($aefis->ae_encephalopathy) ?></td>
                <td><?= h($aefis->ae_toxic_shock) ?></td>
                <td><?= h($aefis->ae_thrombocytopenia) ?></td>
                <td><?= h($aefis->ae_anaphylaxis) ?></td>
                <td><?= h($aefis->ae_fever) ?></td>
                <td><?= h($aefis->ae_3days) ?></td>
                <td><?= h($aefis->ae_febrile) ?></td>
                <td><?= h($aefis->ae_beyond_joint) ?></td>
                <td><?= h($aefis->ae_afebrile) ?></td>
                <td><?= h($aefis->ae_other) ?></td>
                <td><?= h($aefis->adverse_events_specify) ?></td>
                <td><?= h($aefis->aefi_date) ?></td>
                <td><?= h($aefis->notification_date) ?></td>
                <td><?= h($aefis->description_of_reaction) ?></td>
                <td><?= h($aefis->treatment_provided) ?></td>
                <td><?= h($aefis->serious) ?></td>
                <td><?= h($aefis->serious_yes) ?></td>
                <td><?= h($aefis->outcome) ?></td>
                <td><?= h($aefis->died_date) ?></td>
                <td><?= h($aefis->autopsy) ?></td>
                <td><?= h($aefis->past_medical_history) ?></td>
                <td><?= h($aefis->district_receive_date) ?></td>
                <td><?= h($aefis->investigation_needed) ?></td>
                <td><?= h($aefis->investigation_date) ?></td>
                <td><?= h($aefis->national_receive_date) ?></td>
                <td><?= h($aefis->comments) ?></td>
                <td><?= h($aefis->created) ?></td>
                <td><?= h($aefis->modified) ?></td>
                <td><?= h($aefis->submitted) ?></td>
                <td><?= h($aefis->province_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Aefis', 'action' => 'view', $aefis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Aefis', 'action' => 'edit', $aefis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aefis', 'action' => 'delete', $aefis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Saefis') ?></h4>
        <?php if (!empty($user->saefis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Reference Number') ?></th>
                <th scope="col"><?= __('Basic Details') ?></th>
                <th scope="col"><?= __('Place Vaccination') ?></th>
                <th scope="col"><?= __('Place Vaccination Other') ?></th>
                <th scope="col"><?= __('Site Type') ?></th>
                <th scope="col"><?= __('Site Type Other') ?></th>
                <th scope="col"><?= __('Vaccination In') ?></th>
                <th scope="col"><?= __('Vaccination In Other') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Report Date') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Complete Date') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Telephone') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Patient Name') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Hospitalization Date') ?></th>
                <th scope="col"><?= __('Status On Date') ?></th>
                <th scope="col"><?= __('Died Date') ?></th>
                <th scope="col"><?= __('Autopsy Done') ?></th>
                <th scope="col"><?= __('Autopsy Done Date') ?></th>
                <th scope="col"><?= __('Autopsy Planned') ?></th>
                <th scope="col"><?= __('Autopsy Planned Date') ?></th>
                <th scope="col"><?= __('Past History') ?></th>
                <th scope="col"><?= __('Past History Remarks') ?></th>
                <th scope="col"><?= __('Adverse Event') ?></th>
                <th scope="col"><?= __('Adverse Event Remarks') ?></th>
                <th scope="col"><?= __('Allergy History') ?></th>
                <th scope="col"><?= __('Allergy History Remarks') ?></th>
                <th scope="col"><?= __('Existing Illness') ?></th>
                <th scope="col"><?= __('Existing Illness Remarks') ?></th>
                <th scope="col"><?= __('Hospitalization History') ?></th>
                <th scope="col"><?= __('Hospitalization History Remarks') ?></th>
                <th scope="col"><?= __('Medication Vaccination') ?></th>
                <th scope="col"><?= __('Medication Vaccination Remarks') ?></th>
                <th scope="col"><?= __('Faith Healers') ?></th>
                <th scope="col"><?= __('Faith Healers Remarks') ?></th>
                <th scope="col"><?= __('Family History') ?></th>
                <th scope="col"><?= __('Family History Remarks') ?></th>
                <th scope="col"><?= __('Pregnant') ?></th>
                <th scope="col"><?= __('Pregnant Weeks') ?></th>
                <th scope="col"><?= __('Breastfeeding') ?></th>
                <th scope="col"><?= __('Infant') ?></th>
                <th scope="col"><?= __('Birth Weight') ?></th>
                <th scope="col"><?= __('Delivery Procedure') ?></th>
                <th scope="col"><?= __('Delivery Procedure Specify') ?></th>
                <th scope="col"><?= __('Source Examination') ?></th>
                <th scope="col"><?= __('Source Documents') ?></th>
                <th scope="col"><?= __('Source Verbal') ?></th>
                <th scope="col"><?= __('Verbal Source') ?></th>
                <th scope="col"><?= __('Source Other') ?></th>
                <th scope="col"><?= __('Source Other Specify') ?></th>
                <th scope="col"><?= __('Examiner Name') ?></th>
                <th scope="col"><?= __('Other Sources') ?></th>
                <th scope="col"><?= __('Signs Symptoms') ?></th>
                <th scope="col"><?= __('Person Details') ?></th>
                <th scope="col"><?= __('Person Designation') ?></th>
                <th scope="col"><?= __('Person Date') ?></th>
                <th scope="col"><?= __('Medical Care') ?></th>
                <th scope="col"><?= __('Not Medical Care') ?></th>
                <th scope="col"><?= __('Final Diagnosis') ?></th>
                <th scope="col"><?= __('When Vaccinated') ?></th>
                <th scope="col"><?= __('When Vaccinated Specify') ?></th>
                <th scope="col"><?= __('Prescribing Error') ?></th>
                <th scope="col"><?= __('Prescribing Error Specify') ?></th>
                <th scope="col"><?= __('Vaccine Unsterile') ?></th>
                <th scope="col"><?= __('Vaccine Unsterile Specify') ?></th>
                <th scope="col"><?= __('Vaccine Condition') ?></th>
                <th scope="col"><?= __('Vaccine Condition Specify') ?></th>
                <th scope="col"><?= __('Vaccine Reconstitution') ?></th>
                <th scope="col"><?= __('Vaccine Reconstitution Specify') ?></th>
                <th scope="col"><?= __('Vaccine Handling') ?></th>
                <th scope="col"><?= __('Vaccine Handling Specify') ?></th>
                <th scope="col"><?= __('Vaccine Administered') ?></th>
                <th scope="col"><?= __('Vaccine Administered Specify') ?></th>
                <th scope="col"><?= __('Vaccinated Vial') ?></th>
                <th scope="col"><?= __('Vaccinated Session') ?></th>
                <th scope="col"><?= __('Vaccinated Locations') ?></th>
                <th scope="col"><?= __('Vaccinated Locations Specify') ?></th>
                <th scope="col"><?= __('Vaccinated Cluster') ?></th>
                <th scope="col"><?= __('Vaccinated Cluster Number') ?></th>
                <th scope="col"><?= __('Vaccinated Cluster Vial') ?></th>
                <th scope="col"><?= __('Vaccinated Cluster Vial Number') ?></th>
                <th scope="col"><?= __('Syringes Used') ?></th>
                <th scope="col"><?= __('Syringes Used Specify') ?></th>
                <th scope="col"><?= __('Syringes Used Other') ?></th>
                <th scope="col"><?= __('Syringes Used Findings') ?></th>
                <th scope="col"><?= __('Reconstitution Multiple') ?></th>
                <th scope="col"><?= __('Reconstitution Different') ?></th>
                <th scope="col"><?= __('Reconstitution Vial') ?></th>
                <th scope="col"><?= __('Reconstitution Syringe') ?></th>
                <th scope="col"><?= __('Reconstitution Vaccines') ?></th>
                <th scope="col"><?= __('Reconstitution Observations') ?></th>
                <th scope="col"><?= __('Cold Temperature') ?></th>
                <th scope="col"><?= __('Cold Temperature Deviation') ?></th>
                <th scope="col"><?= __('Cold Temperature Specify') ?></th>
                <th scope="col"><?= __('Procedure Followed') ?></th>
                <th scope="col"><?= __('Other Items') ?></th>
                <th scope="col"><?= __('Partial Vaccines') ?></th>
                <th scope="col"><?= __('Unusable Vaccines') ?></th>
                <th scope="col"><?= __('Unusable Diluents') ?></th>
                <th scope="col"><?= __('Additional Observations') ?></th>
                <th scope="col"><?= __('Cold Transportation') ?></th>
                <th scope="col"><?= __('Vaccine Carrier') ?></th>
                <th scope="col"><?= __('Coolant Packs') ?></th>
                <th scope="col"><?= __('Transport Findings') ?></th>
                <th scope="col"><?= __('Similar Events') ?></th>
                <th scope="col"><?= __('Similar Events Describe') ?></th>
                <th scope="col"><?= __('Similar Events Episodes') ?></th>
                <th scope="col"><?= __('Affected Vaccinated') ?></th>
                <th scope="col"><?= __('Affected Not Vaccinated') ?></th>
                <th scope="col"><?= __('Affected Unknown') ?></th>
                <th scope="col"><?= __('Community Comments') ?></th>
                <th scope="col"><?= __('Relevant Findings') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->saefis as $saefis): ?>
            <tr>
                <td><?= h($saefis->id) ?></td>
                <td><?= h($saefis->user_id) ?></td>
                <td><?= h($saefis->reference_number) ?></td>
                <td><?= h($saefis->basic_details) ?></td>
                <td><?= h($saefis->place_vaccination) ?></td>
                <td><?= h($saefis->place_vaccination_other) ?></td>
                <td><?= h($saefis->site_type) ?></td>
                <td><?= h($saefis->site_type_other) ?></td>
                <td><?= h($saefis->vaccination_in) ?></td>
                <td><?= h($saefis->vaccination_in_other) ?></td>
                <td><?= h($saefis->reporter_name) ?></td>
                <td><?= h($saefis->report_date) ?></td>
                <td><?= h($saefis->start_date) ?></td>
                <td><?= h($saefis->complete_date) ?></td>
                <td><?= h($saefis->designation_id) ?></td>
                <td><?= h($saefis->telephone) ?></td>
                <td><?= h($saefis->mobile) ?></td>
                <td><?= h($saefis->reporter_email) ?></td>
                <td><?= h($saefis->patient_name) ?></td>
                <td><?= h($saefis->gender) ?></td>
                <td><?= h($saefis->hospitalization_date) ?></td>
                <td><?= h($saefis->status_on_date) ?></td>
                <td><?= h($saefis->died_date) ?></td>
                <td><?= h($saefis->autopsy_done) ?></td>
                <td><?= h($saefis->autopsy_done_date) ?></td>
                <td><?= h($saefis->autopsy_planned) ?></td>
                <td><?= h($saefis->autopsy_planned_date) ?></td>
                <td><?= h($saefis->past_history) ?></td>
                <td><?= h($saefis->past_history_remarks) ?></td>
                <td><?= h($saefis->adverse_event) ?></td>
                <td><?= h($saefis->adverse_event_remarks) ?></td>
                <td><?= h($saefis->allergy_history) ?></td>
                <td><?= h($saefis->allergy_history_remarks) ?></td>
                <td><?= h($saefis->existing_illness) ?></td>
                <td><?= h($saefis->existing_illness_remarks) ?></td>
                <td><?= h($saefis->hospitalization_history) ?></td>
                <td><?= h($saefis->hospitalization_history_remarks) ?></td>
                <td><?= h($saefis->medication_vaccination) ?></td>
                <td><?= h($saefis->medication_vaccination_remarks) ?></td>
                <td><?= h($saefis->faith_healers) ?></td>
                <td><?= h($saefis->faith_healers_remarks) ?></td>
                <td><?= h($saefis->family_history) ?></td>
                <td><?= h($saefis->family_history_remarks) ?></td>
                <td><?= h($saefis->pregnant) ?></td>
                <td><?= h($saefis->pregnant_weeks) ?></td>
                <td><?= h($saefis->breastfeeding) ?></td>
                <td><?= h($saefis->infant) ?></td>
                <td><?= h($saefis->birth_weight) ?></td>
                <td><?= h($saefis->delivery_procedure) ?></td>
                <td><?= h($saefis->delivery_procedure_specify) ?></td>
                <td><?= h($saefis->source_examination) ?></td>
                <td><?= h($saefis->source_documents) ?></td>
                <td><?= h($saefis->source_verbal) ?></td>
                <td><?= h($saefis->verbal_source) ?></td>
                <td><?= h($saefis->source_other) ?></td>
                <td><?= h($saefis->source_other_specify) ?></td>
                <td><?= h($saefis->examiner_name) ?></td>
                <td><?= h($saefis->other_sources) ?></td>
                <td><?= h($saefis->signs_symptoms) ?></td>
                <td><?= h($saefis->person_details) ?></td>
                <td><?= h($saefis->person_designation) ?></td>
                <td><?= h($saefis->person_date) ?></td>
                <td><?= h($saefis->medical_care) ?></td>
                <td><?= h($saefis->not_medical_care) ?></td>
                <td><?= h($saefis->final_diagnosis) ?></td>
                <td><?= h($saefis->when_vaccinated) ?></td>
                <td><?= h($saefis->when_vaccinated_specify) ?></td>
                <td><?= h($saefis->prescribing_error) ?></td>
                <td><?= h($saefis->prescribing_error_specify) ?></td>
                <td><?= h($saefis->vaccine_unsterile) ?></td>
                <td><?= h($saefis->vaccine_unsterile_specify) ?></td>
                <td><?= h($saefis->vaccine_condition) ?></td>
                <td><?= h($saefis->vaccine_condition_specify) ?></td>
                <td><?= h($saefis->vaccine_reconstitution) ?></td>
                <td><?= h($saefis->vaccine_reconstitution_specify) ?></td>
                <td><?= h($saefis->vaccine_handling) ?></td>
                <td><?= h($saefis->vaccine_handling_specify) ?></td>
                <td><?= h($saefis->vaccine_administered) ?></td>
                <td><?= h($saefis->vaccine_administered_specify) ?></td>
                <td><?= h($saefis->vaccinated_vial) ?></td>
                <td><?= h($saefis->vaccinated_session) ?></td>
                <td><?= h($saefis->vaccinated_locations) ?></td>
                <td><?= h($saefis->vaccinated_locations_specify) ?></td>
                <td><?= h($saefis->vaccinated_cluster) ?></td>
                <td><?= h($saefis->vaccinated_cluster_number) ?></td>
                <td><?= h($saefis->vaccinated_cluster_vial) ?></td>
                <td><?= h($saefis->vaccinated_cluster_vial_number) ?></td>
                <td><?= h($saefis->syringes_used) ?></td>
                <td><?= h($saefis->syringes_used_specify) ?></td>
                <td><?= h($saefis->syringes_used_other) ?></td>
                <td><?= h($saefis->syringes_used_findings) ?></td>
                <td><?= h($saefis->reconstitution_multiple) ?></td>
                <td><?= h($saefis->reconstitution_different) ?></td>
                <td><?= h($saefis->reconstitution_vial) ?></td>
                <td><?= h($saefis->reconstitution_syringe) ?></td>
                <td><?= h($saefis->reconstitution_vaccines) ?></td>
                <td><?= h($saefis->reconstitution_observations) ?></td>
                <td><?= h($saefis->cold_temperature) ?></td>
                <td><?= h($saefis->cold_temperature_deviation) ?></td>
                <td><?= h($saefis->cold_temperature_specify) ?></td>
                <td><?= h($saefis->procedure_followed) ?></td>
                <td><?= h($saefis->other_items) ?></td>
                <td><?= h($saefis->partial_vaccines) ?></td>
                <td><?= h($saefis->unusable_vaccines) ?></td>
                <td><?= h($saefis->unusable_diluents) ?></td>
                <td><?= h($saefis->additional_observations) ?></td>
                <td><?= h($saefis->cold_transportation) ?></td>
                <td><?= h($saefis->vaccine_carrier) ?></td>
                <td><?= h($saefis->coolant_packs) ?></td>
                <td><?= h($saefis->transport_findings) ?></td>
                <td><?= h($saefis->similar_events) ?></td>
                <td><?= h($saefis->similar_events_describe) ?></td>
                <td><?= h($saefis->similar_events_episodes) ?></td>
                <td><?= h($saefis->affected_vaccinated) ?></td>
                <td><?= h($saefis->affected_not_vaccinated) ?></td>
                <td><?= h($saefis->affected_unknown) ?></td>
                <td><?= h($saefis->community_comments) ?></td>
                <td><?= h($saefis->relevant_findings) ?></td>
                <td><?= h($saefis->created) ?></td>
                <td><?= h($saefis->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Saefis', 'action' => 'view', $saefis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Saefis', 'action' => 'edit', $saefis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Saefis', 'action' => 'delete', $saefis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

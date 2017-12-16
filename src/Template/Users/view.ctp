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
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviewers'), ['controller' => 'Reviewers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reviewer'), ['controller' => 'Reviewers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
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
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= h($user->phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Institution') ?></th>
            <td><?= h($user->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Physical') ?></th>
            <td><?= h($user->institution_physical) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Address') ?></th>
            <td><?= h($user->institution_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Contact') ?></th>
            <td><?= h($user->institution_contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $user->has('country') ? $this->Html->link($user->country->name, ['controller' => 'Countries', 'action' => 'view', $user->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
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
            <th scope="row"><?= __('Deactivated') ?></th>
            <td><?= $user->deactivated ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Applications') ?></h4>
        <?php if (!empty($user->applications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Trial Status Id') ?></th>
                <th scope="col"><?= __('Abstract Of Study') ?></th>
                <th scope="col"><?= __('Study Title') ?></th>
                <th scope="col"><?= __('Short Title') ?></th>
                <th scope="col"><?= __('Protocol No') ?></th>
                <th scope="col"><?= __('Version No') ?></th>
                <th scope="col"><?= __('Date Of Protocol') ?></th>
                <th scope="col"><?= __('Study Drug') ?></th>
                <th scope="col"><?= __('Disease Condition') ?></th>
                <th scope="col"><?= __('Product Type Biologicals') ?></th>
                <th scope="col"><?= __('Product Type Proteins') ?></th>
                <th scope="col"><?= __('Product Type Immunologicals') ?></th>
                <th scope="col"><?= __('Product Type Vaccines') ?></th>
                <th scope="col"><?= __('Product Type Hormones') ?></th>
                <th scope="col"><?= __('Product Type Toxoid') ?></th>
                <th scope="col"><?= __('Product Type Chemical') ?></th>
                <th scope="col"><?= __('Product Type Medical Device') ?></th>
                <th scope="col"><?= __('Product Type Chemical Name') ?></th>
                <th scope="col"><?= __('Product Type Medical Device Name') ?></th>
                <th scope="col"><?= __('Ecct Not Applicable') ?></th>
                <th scope="col"><?= __('Ecct Ref Number') ?></th>
                <th scope="col"><?= __('Email Address') ?></th>
                <th scope="col"><?= __('Applicant Covering Letter') ?></th>
                <th scope="col"><?= __('Applicant Protocol') ?></th>
                <th scope="col"><?= __('Applicant Patient Information') ?></th>
                <th scope="col"><?= __('Applicant Investigators Brochure') ?></th>
                <th scope="col"><?= __('Applicant Investigators Cv') ?></th>
                <th scope="col"><?= __('Applicant Signed Declaration') ?></th>
                <th scope="col"><?= __('Applicant Financial Declaration') ?></th>
                <th scope="col"><?= __('Applicant Gmp Certificate') ?></th>
                <th scope="col"><?= __('Applicant Indemnity Cover') ?></th>
                <th scope="col"><?= __('Applicant Opinion Letter') ?></th>
                <th scope="col"><?= __('Applicant Approval Letter') ?></th>
                <th scope="col"><?= __('Applicant Statement') ?></th>
                <th scope="col"><?= __('Applicant Participating Countries') ?></th>
                <th scope="col"><?= __('Applicant Addendum') ?></th>
                <th scope="col"><?= __('Applicant Fees') ?></th>
                <th scope="col"><?= __('Declaration Applicant') ?></th>
                <th scope="col"><?= __('Declaration Date1') ?></th>
                <th scope="col"><?= __('Declaration Principal Investigator') ?></th>
                <th scope="col"><?= __('Declaration Date2') ?></th>
                <th scope="col"><?= __('Placebo Present') ?></th>
                <th scope="col"><?= __('Principal Inclusion Criteria') ?></th>
                <th scope="col"><?= __('Principal Exclusion Criteria') ?></th>
                <th scope="col"><?= __('Primary End Points') ?></th>
                <th scope="col"><?= __('Scope Diagnosis') ?></th>
                <th scope="col"><?= __('Scope Prophylaxis') ?></th>
                <th scope="col"><?= __('Scope Therapy') ?></th>
                <th scope="col"><?= __('Scope Safety') ?></th>
                <th scope="col"><?= __('Scope Efficacy') ?></th>
                <th scope="col"><?= __('Scope Pharmacokinetic') ?></th>
                <th scope="col"><?= __('Scope Pharmacodynamic') ?></th>
                <th scope="col"><?= __('Scope Bioequivalence') ?></th>
                <th scope="col"><?= __('Scope Dose Response') ?></th>
                <th scope="col"><?= __('Scope Pharmacogenetic') ?></th>
                <th scope="col"><?= __('Scope Pharmacogenomic') ?></th>
                <th scope="col"><?= __('Scope Pharmacoecomomic') ?></th>
                <th scope="col"><?= __('Scope Others') ?></th>
                <th scope="col"><?= __('Scope Others Specify') ?></th>
                <th scope="col"><?= __('Trial Human Pharmacology') ?></th>
                <th scope="col"><?= __('Trial Administration Humans') ?></th>
                <th scope="col"><?= __('Trial Bioequivalence Study') ?></th>
                <th scope="col"><?= __('Trial Other') ?></th>
                <th scope="col"><?= __('Trial Other Specify') ?></th>
                <th scope="col"><?= __('Trial Therapeutic Exploratory') ?></th>
                <th scope="col"><?= __('Trial Therapeutic Confirmatory') ?></th>
                <th scope="col"><?= __('Trial Therapeutic Use') ?></th>
                <th scope="col"><?= __('Design Controlled') ?></th>
                <th scope="col"><?= __('Site Capacity') ?></th>
                <th scope="col"><?= __('Staff Numbers') ?></th>
                <th scope="col"><?= __('Other Details Explanation') ?></th>
                <th scope="col"><?= __('Other Details Regulatory Notapproved') ?></th>
                <th scope="col"><?= __('Other Details Regulatory Approved') ?></th>
                <th scope="col"><?= __('Other Details Regulatory Rejected') ?></th>
                <th scope="col"><?= __('Other Details Regulatory Halted') ?></th>
                <th scope="col"><?= __('Estimated Duration') ?></th>
                <th scope="col"><?= __('Design Controlled Randomised') ?></th>
                <th scope="col"><?= __('Design Controlled Open') ?></th>
                <th scope="col"><?= __('Design Controlled Single Blind') ?></th>
                <th scope="col"><?= __('Design Controlled Double Blind') ?></th>
                <th scope="col"><?= __('Design Controlled Parallel Group') ?></th>
                <th scope="col"><?= __('Design Controlled Cross Over') ?></th>
                <th scope="col"><?= __('Design Controlled Other') ?></th>
                <th scope="col"><?= __('Design Controlled Specify') ?></th>
                <th scope="col"><?= __('Design Controlled Comparator') ?></th>
                <th scope="col"><?= __('Design Controlled Other Medicinal') ?></th>
                <th scope="col"><?= __('Design Controlled Placebo') ?></th>
                <th scope="col"><?= __('Design Controlled Medicinal Other') ?></th>
                <th scope="col"><?= __('Design Controlled Medicinal Specify') ?></th>
                <th scope="col"><?= __('Single Site Member State') ?></th>
                <th scope="col"><?= __('Location Of Area') ?></th>
                <th scope="col"><?= __('Single Site Physical Address') ?></th>
                <th scope="col"><?= __('Single Site Contact Person') ?></th>
                <th scope="col"><?= __('Single Site Telephone') ?></th>
                <th scope="col"><?= __('Multiple Sites Member State') ?></th>
                <th scope="col"><?= __('Multiple Countries') ?></th>
                <th scope="col"><?= __('Multiple Member States') ?></th>
                <th scope="col"><?= __('Number Of Sites') ?></th>
                <th scope="col"><?= __('Multi Country List') ?></th>
                <th scope="col"><?= __('Data Monitoring Committee') ?></th>
                <th scope="col"><?= __('Total Enrolment Per Site') ?></th>
                <th scope="col"><?= __('Total Participants Worldwide') ?></th>
                <th scope="col"><?= __('Population Less Than 18 Years') ?></th>
                <th scope="col"><?= __('Population Utero') ?></th>
                <th scope="col"><?= __('Population Preterm Newborn') ?></th>
                <th scope="col"><?= __('Population Newborn') ?></th>
                <th scope="col"><?= __('Population Infant And Toddler') ?></th>
                <th scope="col"><?= __('Population Children') ?></th>
                <th scope="col"><?= __('Population Adolescent') ?></th>
                <th scope="col"><?= __('Population Above 18') ?></th>
                <th scope="col"><?= __('Population Adult') ?></th>
                <th scope="col"><?= __('Population Elderly') ?></th>
                <th scope="col"><?= __('Gender Female') ?></th>
                <th scope="col"><?= __('Gender Male') ?></th>
                <th scope="col"><?= __('Subjects Healthy') ?></th>
                <th scope="col"><?= __('Subjects Patients') ?></th>
                <th scope="col"><?= __('Subjects Vulnerable Populations') ?></th>
                <th scope="col"><?= __('Subjects Women Child Bearing') ?></th>
                <th scope="col"><?= __('Subjects Women Using Contraception') ?></th>
                <th scope="col"><?= __('Subjects Pregnant Women') ?></th>
                <th scope="col"><?= __('Subjects Nursing Women') ?></th>
                <th scope="col"><?= __('Subjects Emergency Situation') ?></th>
                <th scope="col"><?= __('Subjects Incapable Consent') ?></th>
                <th scope="col"><?= __('Subjects Specify') ?></th>
                <th scope="col"><?= __('Subjects Others') ?></th>
                <th scope="col"><?= __('Subjects Others Specify') ?></th>
                <th scope="col"><?= __('Investigator1 Given Name') ?></th>
                <th scope="col"><?= __('Investigator1 Middle Name') ?></th>
                <th scope="col"><?= __('Investigator1 Family Name') ?></th>
                <th scope="col"><?= __('Investigator1 Qualification') ?></th>
                <th scope="col"><?= __('Investigator1 Professional Address') ?></th>
                <th scope="col"><?= __('Investigator1 Telephone') ?></th>
                <th scope="col"><?= __('Investigator1 Email') ?></th>
                <th scope="col"><?= __('Organisations Transferred ') ?></th>
                <th scope="col"><?= __('Number Participants') ?></th>
                <th scope="col"><?= __('Notification') ?></th>
                <th scope="col"><?= __('Approval Date') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Deleted Date') ?></th>
                <th scope="col"><?= __('Deactivated') ?></th>
                <th scope="col"><?= __('Date Submitted') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Approved Reason') ?></th>
                <th scope="col"><?= __('Final Report') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->applications as $applications): ?>
            <tr>
                <td><?= h($applications->id) ?></td>
                <td><?= h($applications->user_id) ?></td>
                <td><?= h($applications->trial_status_id) ?></td>
                <td><?= h($applications->abstract_of_study) ?></td>
                <td><?= h($applications->study_title) ?></td>
                <td><?= h($applications->short_title) ?></td>
                <td><?= h($applications->protocol_no) ?></td>
                <td><?= h($applications->version_no) ?></td>
                <td><?= h($applications->date_of_protocol) ?></td>
                <td><?= h($applications->study_drug) ?></td>
                <td><?= h($applications->disease_condition) ?></td>
                <td><?= h($applications->product_type_biologicals) ?></td>
                <td><?= h($applications->product_type_proteins) ?></td>
                <td><?= h($applications->product_type_immunologicals) ?></td>
                <td><?= h($applications->product_type_vaccines) ?></td>
                <td><?= h($applications->product_type_hormones) ?></td>
                <td><?= h($applications->product_type_toxoid) ?></td>
                <td><?= h($applications->product_type_chemical) ?></td>
                <td><?= h($applications->product_type_medical_device) ?></td>
                <td><?= h($applications->product_type_chemical_name) ?></td>
                <td><?= h($applications->product_type_medical_device_name) ?></td>
                <td><?= h($applications->ecct_not_applicable) ?></td>
                <td><?= h($applications->ecct_ref_number) ?></td>
                <td><?= h($applications->email_address) ?></td>
                <td><?= h($applications->applicant_covering_letter) ?></td>
                <td><?= h($applications->applicant_protocol) ?></td>
                <td><?= h($applications->applicant_patient_information) ?></td>
                <td><?= h($applications->applicant_investigators_brochure) ?></td>
                <td><?= h($applications->applicant_investigators_cv) ?></td>
                <td><?= h($applications->applicant_signed_declaration) ?></td>
                <td><?= h($applications->applicant_financial_declaration) ?></td>
                <td><?= h($applications->applicant_gmp_certificate) ?></td>
                <td><?= h($applications->applicant_indemnity_cover) ?></td>
                <td><?= h($applications->applicant_opinion_letter) ?></td>
                <td><?= h($applications->applicant_approval_letter) ?></td>
                <td><?= h($applications->applicant_statement) ?></td>
                <td><?= h($applications->applicant_participating_countries) ?></td>
                <td><?= h($applications->applicant_addendum) ?></td>
                <td><?= h($applications->applicant_fees) ?></td>
                <td><?= h($applications->declaration_applicant) ?></td>
                <td><?= h($applications->declaration_date1) ?></td>
                <td><?= h($applications->declaration_principal_investigator) ?></td>
                <td><?= h($applications->declaration_date2) ?></td>
                <td><?= h($applications->placebo_present) ?></td>
                <td><?= h($applications->principal_inclusion_criteria) ?></td>
                <td><?= h($applications->principal_exclusion_criteria) ?></td>
                <td><?= h($applications->primary_end_points) ?></td>
                <td><?= h($applications->scope_diagnosis) ?></td>
                <td><?= h($applications->scope_prophylaxis) ?></td>
                <td><?= h($applications->scope_therapy) ?></td>
                <td><?= h($applications->scope_safety) ?></td>
                <td><?= h($applications->scope_efficacy) ?></td>
                <td><?= h($applications->scope_pharmacokinetic) ?></td>
                <td><?= h($applications->scope_pharmacodynamic) ?></td>
                <td><?= h($applications->scope_bioequivalence) ?></td>
                <td><?= h($applications->scope_dose_response) ?></td>
                <td><?= h($applications->scope_pharmacogenetic) ?></td>
                <td><?= h($applications->scope_pharmacogenomic) ?></td>
                <td><?= h($applications->scope_pharmacoecomomic) ?></td>
                <td><?= h($applications->scope_others) ?></td>
                <td><?= h($applications->scope_others_specify) ?></td>
                <td><?= h($applications->trial_human_pharmacology) ?></td>
                <td><?= h($applications->trial_administration_humans) ?></td>
                <td><?= h($applications->trial_bioequivalence_study) ?></td>
                <td><?= h($applications->trial_other) ?></td>
                <td><?= h($applications->trial_other_specify) ?></td>
                <td><?= h($applications->trial_therapeutic_exploratory) ?></td>
                <td><?= h($applications->trial_therapeutic_confirmatory) ?></td>
                <td><?= h($applications->trial_therapeutic_use) ?></td>
                <td><?= h($applications->design_controlled) ?></td>
                <td><?= h($applications->site_capacity) ?></td>
                <td><?= h($applications->staff_numbers) ?></td>
                <td><?= h($applications->other_details_explanation) ?></td>
                <td><?= h($applications->other_details_regulatory_notapproved) ?></td>
                <td><?= h($applications->other_details_regulatory_approved) ?></td>
                <td><?= h($applications->other_details_regulatory_rejected) ?></td>
                <td><?= h($applications->other_details_regulatory_halted) ?></td>
                <td><?= h($applications->estimated_duration) ?></td>
                <td><?= h($applications->design_controlled_randomised) ?></td>
                <td><?= h($applications->design_controlled_open) ?></td>
                <td><?= h($applications->design_controlled_single_blind) ?></td>
                <td><?= h($applications->design_controlled_double_blind) ?></td>
                <td><?= h($applications->design_controlled_parallel_group) ?></td>
                <td><?= h($applications->design_controlled_cross_over) ?></td>
                <td><?= h($applications->design_controlled_other) ?></td>
                <td><?= h($applications->design_controlled_specify) ?></td>
                <td><?= h($applications->design_controlled_comparator) ?></td>
                <td><?= h($applications->design_controlled_other_medicinal) ?></td>
                <td><?= h($applications->design_controlled_placebo) ?></td>
                <td><?= h($applications->design_controlled_medicinal_other) ?></td>
                <td><?= h($applications->design_controlled_medicinal_specify) ?></td>
                <td><?= h($applications->single_site_member_state) ?></td>
                <td><?= h($applications->location_of_area) ?></td>
                <td><?= h($applications->single_site_physical_address) ?></td>
                <td><?= h($applications->single_site_contact_person) ?></td>
                <td><?= h($applications->single_site_telephone) ?></td>
                <td><?= h($applications->multiple_sites_member_state) ?></td>
                <td><?= h($applications->multiple_countries) ?></td>
                <td><?= h($applications->multiple_member_states) ?></td>
                <td><?= h($applications->number_of_sites) ?></td>
                <td><?= h($applications->multi_country_list) ?></td>
                <td><?= h($applications->data_monitoring_committee) ?></td>
                <td><?= h($applications->total_enrolment_per_site) ?></td>
                <td><?= h($applications->total_participants_worldwide) ?></td>
                <td><?= h($applications->population_less_than_18_years) ?></td>
                <td><?= h($applications->population_utero) ?></td>
                <td><?= h($applications->population_preterm_newborn) ?></td>
                <td><?= h($applications->population_newborn) ?></td>
                <td><?= h($applications->population_infant_and_toddler) ?></td>
                <td><?= h($applications->population_children) ?></td>
                <td><?= h($applications->population_adolescent) ?></td>
                <td><?= h($applications->population_above_18) ?></td>
                <td><?= h($applications->population_adult) ?></td>
                <td><?= h($applications->population_elderly) ?></td>
                <td><?= h($applications->gender_female) ?></td>
                <td><?= h($applications->gender_male) ?></td>
                <td><?= h($applications->subjects_healthy) ?></td>
                <td><?= h($applications->subjects_patients) ?></td>
                <td><?= h($applications->subjects_vulnerable_populations) ?></td>
                <td><?= h($applications->subjects_women_child_bearing) ?></td>
                <td><?= h($applications->subjects_women_using_contraception) ?></td>
                <td><?= h($applications->subjects_pregnant_women) ?></td>
                <td><?= h($applications->subjects_nursing_women) ?></td>
                <td><?= h($applications->subjects_emergency_situation) ?></td>
                <td><?= h($applications->subjects_incapable_consent) ?></td>
                <td><?= h($applications->subjects_specify) ?></td>
                <td><?= h($applications->subjects_others) ?></td>
                <td><?= h($applications->subjects_others_specify) ?></td>
                <td><?= h($applications->investigator1_given_name) ?></td>
                <td><?= h($applications->investigator1_middle_name) ?></td>
                <td><?= h($applications->investigator1_family_name) ?></td>
                <td><?= h($applications->investigator1_qualification) ?></td>
                <td><?= h($applications->investigator1_professional_address) ?></td>
                <td><?= h($applications->investigator1_telephone) ?></td>
                <td><?= h($applications->investigator1_email) ?></td>
                <td><?= h($applications->organisations_transferred_) ?></td>
                <td><?= h($applications->number_participants) ?></td>
                <td><?= h($applications->notification) ?></td>
                <td><?= h($applications->approval_date) ?></td>
                <td><?= h($applications->submitted) ?></td>
                <td><?= h($applications->deleted) ?></td>
                <td><?= h($applications->deleted_date) ?></td>
                <td><?= h($applications->deactivated) ?></td>
                <td><?= h($applications->date_submitted) ?></td>
                <td><?= h($applications->approved) ?></td>
                <td><?= h($applications->approved_reason) ?></td>
                <td><?= h($applications->final_report) ?></td>
                <td><?= h($applications->modified) ?></td>
                <td><?= h($applications->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $applications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applications', 'action' => 'delete', $applications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applications->id)]) ?>
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
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Feedback') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->feedbacks as $feedbacks): ?>
            <tr>
                <td><?= h($feedbacks->id) ?></td>
                <td><?= h($feedbacks->user_id) ?></td>
                <td><?= h($feedbacks->email) ?></td>
                <td><?= h($feedbacks->subject) ?></td>
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
        <h4><?= __('Related Notifications') ?></h4>
        <?php if (!empty($user->notifications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('System Message') ?></th>
                <th scope="col"><?= __('User Message') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Deleted Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->notifications as $notifications): ?>
            <tr>
                <td><?= h($notifications->id) ?></td>
                <td><?= h($notifications->user_id) ?></td>
                <td><?= h($notifications->type) ?></td>
                <td><?= h($notifications->model) ?></td>
                <td><?= h($notifications->foreign_key) ?></td>
                <td><?= h($notifications->title) ?></td>
                <td><?= h($notifications->url) ?></td>
                <td><?= h($notifications->system_message) ?></td>
                <td><?= h($notifications->user_message) ?></td>
                <td><?= h($notifications->deleted) ?></td>
                <td><?= h($notifications->deleted_date) ?></td>
                <td><?= h($notifications->created) ?></td>
                <td><?= h($notifications->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $notifications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $notifications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $notifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notifications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviewers') ?></h4>
        <?php if (!empty($user->reviewers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Accepted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reviewers as $reviewers): ?>
            <tr>
                <td><?= h($reviewers->id) ?></td>
                <td><?= h($reviewers->user_id) ?></td>
                <td><?= h($reviewers->application_id) ?></td>
                <td><?= h($reviewers->description) ?></td>
                <td><?= h($reviewers->notified) ?></td>
                <td><?= h($reviewers->accepted) ?></td>
                <td><?= h($reviewers->created) ?></td>
                <td><?= h($reviewers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviewers', 'action' => 'view', $reviewers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviewers', 'action' => 'edit', $reviewers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviewers', 'action' => 'delete', $reviewers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviewers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($user->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('Recommendation') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Accepted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->id) ?></td>
                <td><?= h($reviews->user_id) ?></td>
                <td><?= h($reviews->application_id) ?></td>
                <td><?= h($reviews->type) ?></td>
                <td><?= h($reviews->title) ?></td>
                <td><?= h($reviews->text) ?></td>
                <td><?= h($reviews->recommendation) ?></td>
                <td><?= h($reviews->notified) ?></td>
                <td><?= h($reviews->accepted) ?></td>
                <td><?= h($reviews->created) ?></td>
                <td><?= h($reviews->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $reviews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $reviews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

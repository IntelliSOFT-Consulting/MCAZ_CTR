<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Application'), ['action' => 'edit', $application->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Application'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trial Statuses'), ['controller' => 'TrialStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trial Status'), ['controller' => 'TrialStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Investigator Contacts'), ['controller' => 'InvestigatorContacts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Investigator Contact'), ['controller' => 'InvestigatorContacts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Placebos'), ['controller' => 'Placebos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Placebo'), ['controller' => 'Placebos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Previous Dates'), ['controller' => 'PreviousDates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Previous Date'), ['controller' => 'PreviousDates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviewers'), ['controller' => 'Reviewers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reviewer'), ['controller' => 'Reviewers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Site Details'), ['controller' => 'SiteDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site Detail'), ['controller' => 'SiteDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sponsors'), ['controller' => 'Sponsors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsor'), ['controller' => 'Sponsors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="applications view large-9 medium-8 columns content">
    <h3><?= h($application->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $application->has('user') ? $this->Html->link($application->user->name, ['controller' => 'Users', 'action' => 'view', $application->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Status') ?></th>
            <td><?= $application->has('trial_status') ? $this->Html->link($application->trial_status->name, ['controller' => 'TrialStatuses', 'action' => 'view', $application->trial_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Short Title') ?></th>
            <td><?= h($application->short_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Protocol No') ?></th>
            <td><?= h($application->protocol_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version No') ?></th>
            <td><?= h($application->version_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Drug') ?></th>
            <td><?= h($application->study_drug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disease Condition') ?></th>
            <td><?= h($application->disease_condition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Chemical Name') ?></th>
            <td><?= h($application->product_type_chemical_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Medical Device Name') ?></th>
            <td><?= h($application->product_type_medical_device_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ecct Ref Number') ?></th>
            <td><?= h($application->ecct_ref_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Address') ?></th>
            <td><?= h($application->email_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Declaration Applicant') ?></th>
            <td><?= h($application->declaration_applicant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Declaration Principal Investigator') ?></th>
            <td><?= h($application->declaration_principal_investigator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Placebo Present') ?></th>
            <td><?= h($application->placebo_present) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled') ?></th>
            <td><?= h($application->design_controlled) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Capacity') ?></th>
            <td><?= h($application->site_capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimated Duration') ?></th>
            <td><?= h($application->estimated_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Randomised') ?></th>
            <td><?= h($application->design_controlled_randomised) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Open') ?></th>
            <td><?= h($application->design_controlled_open) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Single Blind') ?></th>
            <td><?= h($application->design_controlled_single_blind) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Double Blind') ?></th>
            <td><?= h($application->design_controlled_double_blind) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Parallel Group') ?></th>
            <td><?= h($application->design_controlled_parallel_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Cross Over') ?></th>
            <td><?= h($application->design_controlled_cross_over) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Other') ?></th>
            <td><?= h($application->design_controlled_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Specify') ?></th>
            <td><?= h($application->design_controlled_specify) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Comparator') ?></th>
            <td><?= h($application->design_controlled_comparator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Other Medicinal') ?></th>
            <td><?= h($application->design_controlled_other_medicinal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Placebo') ?></th>
            <td><?= h($application->design_controlled_placebo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Medicinal Other') ?></th>
            <td><?= h($application->design_controlled_medicinal_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Controlled Medicinal Specify') ?></th>
            <td><?= h($application->design_controlled_medicinal_specify) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Single Site Member State') ?></th>
            <td><?= h($application->single_site_member_state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Of Area') ?></th>
            <td><?= h($application->location_of_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Single Site Physical Address') ?></th>
            <td><?= h($application->single_site_physical_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Single Site Contact Person') ?></th>
            <td><?= h($application->single_site_contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Single Site Telephone') ?></th>
            <td><?= h($application->single_site_telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multiple Sites Member State') ?></th>
            <td><?= h($application->multiple_sites_member_state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multiple Countries') ?></th>
            <td><?= h($application->multiple_countries) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multiple Member States') ?></th>
            <td><?= h($application->multiple_member_states) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Sites') ?></th>
            <td><?= h($application->number_of_sites) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Monitoring Committee') ?></th>
            <td><?= h($application->data_monitoring_committee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Participants Worldwide') ?></th>
            <td><?= h($application->total_participants_worldwide) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Less Than 18 Years') ?></th>
            <td><?= h($application->population_less_than_18_years) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Utero') ?></th>
            <td><?= h($application->population_utero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Preterm Newborn') ?></th>
            <td><?= h($application->population_preterm_newborn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Newborn') ?></th>
            <td><?= h($application->population_newborn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Infant And Toddler') ?></th>
            <td><?= h($application->population_infant_and_toddler) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Children') ?></th>
            <td><?= h($application->population_children) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Adolescent') ?></th>
            <td><?= h($application->population_adolescent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Above 18') ?></th>
            <td><?= h($application->population_above_18) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Adult') ?></th>
            <td><?= h($application->population_adult) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Population Elderly') ?></th>
            <td><?= h($application->population_elderly) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Healthy') ?></th>
            <td><?= h($application->subjects_healthy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Patients') ?></th>
            <td><?= h($application->subjects_patients) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Vulnerable Populations') ?></th>
            <td><?= h($application->subjects_vulnerable_populations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Women Child Bearing') ?></th>
            <td><?= h($application->subjects_women_child_bearing) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Women Using Contraception') ?></th>
            <td><?= h($application->subjects_women_using_contraception) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Pregnant Women') ?></th>
            <td><?= h($application->subjects_pregnant_women) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Nursing Women') ?></th>
            <td><?= h($application->subjects_nursing_women) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Emergency Situation') ?></th>
            <td><?= h($application->subjects_emergency_situation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Incapable Consent') ?></th>
            <td><?= h($application->subjects_incapable_consent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Others') ?></th>
            <td><?= h($application->subjects_others) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator1 Given Name') ?></th>
            <td><?= h($application->investigator1_given_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator1 Middle Name') ?></th>
            <td><?= h($application->investigator1_middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator1 Family Name') ?></th>
            <td><?= h($application->investigator1_family_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator1 Qualification') ?></th>
            <td><?= h($application->investigator1_qualification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator1 Professional Address') ?></th>
            <td><?= h($application->investigator1_professional_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator1 Telephone') ?></th>
            <td><?= h($application->investigator1_telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator1 Email') ?></th>
            <td><?= h($application->investigator1_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Organisations Transferred ') ?></th>
            <td><?= h($application->organisations_transferred_) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($application->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= $this->Number->format($application->approved) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Protocol') ?></th>
            <td><?= h($application->date_of_protocol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Declaration Date1') ?></th>
            <td><?= h($application->declaration_date1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Declaration Date2') ?></th>
            <td><?= h($application->declaration_date2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approval Date') ?></th>
            <td><?= h($application->approval_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted Date') ?></th>
            <td><?= h($application->deleted_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Submitted') ?></th>
            <td><?= h($application->date_submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($application->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($application->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Biologicals') ?></th>
            <td><?= $application->product_type_biologicals ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Proteins') ?></th>
            <td><?= $application->product_type_proteins ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Immunologicals') ?></th>
            <td><?= $application->product_type_immunologicals ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Vaccines') ?></th>
            <td><?= $application->product_type_vaccines ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Hormones') ?></th>
            <td><?= $application->product_type_hormones ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Toxoid') ?></th>
            <td><?= $application->product_type_toxoid ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Chemical') ?></th>
            <td><?= $application->product_type_chemical ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type Medical Device') ?></th>
            <td><?= $application->product_type_medical_device ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ecct Not Applicable') ?></th>
            <td><?= $application->ecct_not_applicable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Covering Letter') ?></th>
            <td><?= $application->applicant_covering_letter ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Protocol') ?></th>
            <td><?= $application->applicant_protocol ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Patient Information') ?></th>
            <td><?= $application->applicant_patient_information ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Investigators Brochure') ?></th>
            <td><?= $application->applicant_investigators_brochure ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Investigators Cv') ?></th>
            <td><?= $application->applicant_investigators_cv ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Signed Declaration') ?></th>
            <td><?= $application->applicant_signed_declaration ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Financial Declaration') ?></th>
            <td><?= $application->applicant_financial_declaration ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Gmp Certificate') ?></th>
            <td><?= $application->applicant_gmp_certificate ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Indemnity Cover') ?></th>
            <td><?= $application->applicant_indemnity_cover ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Opinion Letter') ?></th>
            <td><?= $application->applicant_opinion_letter ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Approval Letter') ?></th>
            <td><?= $application->applicant_approval_letter ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Statement') ?></th>
            <td><?= $application->applicant_statement ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Participating Countries') ?></th>
            <td><?= $application->applicant_participating_countries ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Addendum') ?></th>
            <td><?= $application->applicant_addendum ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Applicant Fees') ?></th>
            <td><?= $application->applicant_fees ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Diagnosis') ?></th>
            <td><?= $application->scope_diagnosis ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Prophylaxis') ?></th>
            <td><?= $application->scope_prophylaxis ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Therapy') ?></th>
            <td><?= $application->scope_therapy ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Safety') ?></th>
            <td><?= $application->scope_safety ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Efficacy') ?></th>
            <td><?= $application->scope_efficacy ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Pharmacokinetic') ?></th>
            <td><?= $application->scope_pharmacokinetic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Pharmacodynamic') ?></th>
            <td><?= $application->scope_pharmacodynamic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Bioequivalence') ?></th>
            <td><?= $application->scope_bioequivalence ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Dose Response') ?></th>
            <td><?= $application->scope_dose_response ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Pharmacogenetic') ?></th>
            <td><?= $application->scope_pharmacogenetic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Pharmacogenomic') ?></th>
            <td><?= $application->scope_pharmacogenomic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Pharmacoecomomic') ?></th>
            <td><?= $application->scope_pharmacoecomomic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scope Others') ?></th>
            <td><?= $application->scope_others ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Human Pharmacology') ?></th>
            <td><?= $application->trial_human_pharmacology ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Administration Humans') ?></th>
            <td><?= $application->trial_administration_humans ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Bioequivalence Study') ?></th>
            <td><?= $application->trial_bioequivalence_study ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Other') ?></th>
            <td><?= $application->trial_other ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Therapeutic Exploratory') ?></th>
            <td><?= $application->trial_therapeutic_exploratory ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Therapeutic Confirmatory') ?></th>
            <td><?= $application->trial_therapeutic_confirmatory ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trial Therapeutic Use') ?></th>
            <td><?= $application->trial_therapeutic_use ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender Female') ?></th>
            <td><?= $application->gender_female ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender Male') ?></th>
            <td><?= $application->gender_male ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $application->submitted ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $application->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deactivated') ?></th>
            <td><?= $application->deactivated ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Abstract Of Study') ?></h4>
        <?= $this->Text->autoParagraph(h($application->abstract_of_study)); ?>
    </div>
    <div class="row">
        <h4><?= __('Study Title') ?></h4>
        <?= $this->Text->autoParagraph(h($application->study_title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Principal Inclusion Criteria') ?></h4>
        <?= $this->Text->autoParagraph(h($application->principal_inclusion_criteria)); ?>
    </div>
    <div class="row">
        <h4><?= __('Principal Exclusion Criteria') ?></h4>
        <?= $this->Text->autoParagraph(h($application->principal_exclusion_criteria)); ?>
    </div>
    <div class="row">
        <h4><?= __('Primary End Points') ?></h4>
        <?= $this->Text->autoParagraph(h($application->primary_end_points)); ?>
    </div>
    <div class="row">
        <h4><?= __('Scope Others Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($application->scope_others_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Trial Other Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($application->trial_other_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Staff Numbers') ?></h4>
        <?= $this->Text->autoParagraph(h($application->staff_numbers)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details Explanation') ?></h4>
        <?= $this->Text->autoParagraph(h($application->other_details_explanation)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details Regulatory Notapproved') ?></h4>
        <?= $this->Text->autoParagraph(h($application->other_details_regulatory_notapproved)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details Regulatory Approved') ?></h4>
        <?= $this->Text->autoParagraph(h($application->other_details_regulatory_approved)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details Regulatory Rejected') ?></h4>
        <?= $this->Text->autoParagraph(h($application->other_details_regulatory_rejected)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details Regulatory Halted') ?></h4>
        <?= $this->Text->autoParagraph(h($application->other_details_regulatory_halted)); ?>
    </div>
    <div class="row">
        <h4><?= __('Multi Country List') ?></h4>
        <?= $this->Text->autoParagraph(h($application->multi_country_list)); ?>
    </div>
    <div class="row">
        <h4><?= __('Total Enrolment Per Site') ?></h4>
        <?= $this->Text->autoParagraph(h($application->total_enrolment_per_site)); ?>
    </div>
    <div class="row">
        <h4><?= __('Subjects Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($application->subjects_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Subjects Others Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($application->subjects_others_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Number Participants') ?></h4>
        <?= $this->Text->autoParagraph(h($application->number_participants)); ?>
    </div>
    <div class="row">
        <h4><?= __('Notification') ?></h4>
        <?= $this->Text->autoParagraph(h($application->notification)); ?>
    </div>
    <div class="row">
        <h4><?= __('Approved Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($application->approved_reason)); ?>
    </div>
    <div class="row">
        <h4><?= __('Final Report') ?></h4>
        <?= $this->Text->autoParagraph(h($application->final_report)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Investigator Contacts') ?></h4>
        <?php if (!empty($application->investigator_contacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Given Name') ?></th>
                <th scope="col"><?= __('Middle Name') ?></th>
                <th scope="col"><?= __('Family Name') ?></th>
                <th scope="col"><?= __('Qualification') ?></th>
                <th scope="col"><?= __('Professional Address') ?></th>
                <th scope="col"><?= __('Telephone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->investigator_contacts as $investigatorContacts): ?>
            <tr>
                <td><?= h($investigatorContacts->id) ?></td>
                <td><?= h($investigatorContacts->application_id) ?></td>
                <td><?= h($investigatorContacts->given_name) ?></td>
                <td><?= h($investigatorContacts->middle_name) ?></td>
                <td><?= h($investigatorContacts->family_name) ?></td>
                <td><?= h($investigatorContacts->qualification) ?></td>
                <td><?= h($investigatorContacts->professional_address) ?></td>
                <td><?= h($investigatorContacts->telephone) ?></td>
                <td><?= h($investigatorContacts->email) ?></td>
                <td><?= h($investigatorContacts->created) ?></td>
                <td><?= h($investigatorContacts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvestigatorContacts', 'action' => 'view', $investigatorContacts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvestigatorContacts', 'action' => 'edit', $investigatorContacts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvestigatorContacts', 'action' => 'delete', $investigatorContacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investigatorContacts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Organizations') ?></h4>
        <?php if (!empty($application->organizations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Organization') ?></th>
                <th scope="col"><?= __('Contact Person') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Telephone Number') ?></th>
                <th scope="col"><?= __('All Tasks') ?></th>
                <th scope="col"><?= __('Monitoring') ?></th>
                <th scope="col"><?= __('Regulatory') ?></th>
                <th scope="col"><?= __('Investigator Recruitment') ?></th>
                <th scope="col"><?= __('Ivrs Treatment Randomisation') ?></th>
                <th scope="col"><?= __('Data Management') ?></th>
                <th scope="col"><?= __('E Data Capture') ?></th>
                <th scope="col"><?= __('Susar Reporting') ?></th>
                <th scope="col"><?= __('Quality Assurance Auditing') ?></th>
                <th scope="col"><?= __('Statistical Analysis') ?></th>
                <th scope="col"><?= __('Medical Writing') ?></th>
                <th scope="col"><?= __('Other Duties') ?></th>
                <th scope="col"><?= __('Other Duties Specify') ?></th>
                <th scope="col"><?= __('Misc') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->organizations as $organizations): ?>
            <tr>
                <td><?= h($organizations->id) ?></td>
                <td><?= h($organizations->application_id) ?></td>
                <td><?= h($organizations->organization) ?></td>
                <td><?= h($organizations->contact_person) ?></td>
                <td><?= h($organizations->address) ?></td>
                <td><?= h($organizations->telephone_number) ?></td>
                <td><?= h($organizations->all_tasks) ?></td>
                <td><?= h($organizations->monitoring) ?></td>
                <td><?= h($organizations->regulatory) ?></td>
                <td><?= h($organizations->investigator_recruitment) ?></td>
                <td><?= h($organizations->ivrs_treatment_randomisation) ?></td>
                <td><?= h($organizations->data_management) ?></td>
                <td><?= h($organizations->e_data_capture) ?></td>
                <td><?= h($organizations->susar_reporting) ?></td>
                <td><?= h($organizations->quality_assurance_auditing) ?></td>
                <td><?= h($organizations->statistical_analysis) ?></td>
                <td><?= h($organizations->medical_writing) ?></td>
                <td><?= h($organizations->other_duties) ?></td>
                <td><?= h($organizations->other_duties_specify) ?></td>
                <td><?= h($organizations->misc) ?></td>
                <td><?= h($organizations->created) ?></td>
                <td><?= h($organizations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Organizations', 'action' => 'view', $organizations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Organizations', 'action' => 'edit', $organizations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organizations', 'action' => 'delete', $organizations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organizations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Placebos') ?></h4>
        <?php if (!empty($application->placebos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Placebo Present') ?></th>
                <th scope="col"><?= __('Pharmaceutical Form') ?></th>
                <th scope="col"><?= __('Route Of Administration') ?></th>
                <th scope="col"><?= __('Composition') ?></th>
                <th scope="col"><?= __('Identical Indp') ?></th>
                <th scope="col"><?= __('Major Ingredients') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->placebos as $placebos): ?>
            <tr>
                <td><?= h($placebos->id) ?></td>
                <td><?= h($placebos->application_id) ?></td>
                <td><?= h($placebos->placebo_present) ?></td>
                <td><?= h($placebos->pharmaceutical_form) ?></td>
                <td><?= h($placebos->route_of_administration) ?></td>
                <td><?= h($placebos->composition) ?></td>
                <td><?= h($placebos->identical_indp) ?></td>
                <td><?= h($placebos->major_ingredients) ?></td>
                <td><?= h($placebos->created) ?></td>
                <td><?= h($placebos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Placebos', 'action' => 'view', $placebos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Placebos', 'action' => 'edit', $placebos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Placebos', 'action' => 'delete', $placebos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $placebos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Previous Dates') ?></h4>
        <?php if (!empty($application->previous_dates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Date Of Previous Protocol') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->previous_dates as $previousDates): ?>
            <tr>
                <td><?= h($previousDates->id) ?></td>
                <td><?= h($previousDates->application_id) ?></td>
                <td><?= h($previousDates->date_of_previous_protocol) ?></td>
                <td><?= h($previousDates->created) ?></td>
                <td><?= h($previousDates->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PreviousDates', 'action' => 'view', $previousDates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PreviousDates', 'action' => 'edit', $previousDates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PreviousDates', 'action' => 'delete', $previousDates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $previousDates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviewers') ?></h4>
        <?php if (!empty($application->reviewers)): ?>
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
            <?php foreach ($application->reviewers as $reviewers): ?>
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
        <?php if (!empty($application->reviews)): ?>
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
            <?php foreach ($application->reviews as $reviews): ?>
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
    <div class="related">
        <h4><?= __('Related Site Details') ?></h4>
        <?php if (!empty($application->site_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Site Name') ?></th>
                <th scope="col"><?= __('Physical Address') ?></th>
                <th scope="col"><?= __('Contact Details') ?></th>
                <th scope="col"><?= __('Contact Person') ?></th>
                <th scope="col"><?= __('Site Capacity') ?></th>
                <th scope="col"><?= __('Misc') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->site_details as $siteDetails): ?>
            <tr>
                <td><?= h($siteDetails->id) ?></td>
                <td><?= h($siteDetails->application_id) ?></td>
                <td><?= h($siteDetails->county_id) ?></td>
                <td><?= h($siteDetails->site_name) ?></td>
                <td><?= h($siteDetails->physical_address) ?></td>
                <td><?= h($siteDetails->contact_details) ?></td>
                <td><?= h($siteDetails->contact_person) ?></td>
                <td><?= h($siteDetails->site_capacity) ?></td>
                <td><?= h($siteDetails->misc) ?></td>
                <td><?= h($siteDetails->created) ?></td>
                <td><?= h($siteDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SiteDetails', 'action' => 'view', $siteDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SiteDetails', 'action' => 'edit', $siteDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SiteDetails', 'action' => 'delete', $siteDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $siteDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sponsors') ?></h4>
        <?php if (!empty($application->sponsors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Sponsor') ?></th>
                <th scope="col"><?= __('Contact Person') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Telephone Number') ?></th>
                <th scope="col"><?= __('Fax Number') ?></th>
                <th scope="col"><?= __('Cell Number') ?></th>
                <th scope="col"><?= __('Email Address') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->sponsors as $sponsors): ?>
            <tr>
                <td><?= h($sponsors->id) ?></td>
                <td><?= h($sponsors->application_id) ?></td>
                <td><?= h($sponsors->sponsor) ?></td>
                <td><?= h($sponsors->contact_person) ?></td>
                <td><?= h($sponsors->address) ?></td>
                <td><?= h($sponsors->telephone_number) ?></td>
                <td><?= h($sponsors->fax_number) ?></td>
                <td><?= h($sponsors->cell_number) ?></td>
                <td><?= h($sponsors->email_address) ?></td>
                <td><?= h($sponsors->created) ?></td>
                <td><?= h($sponsors->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sponsors', 'action' => 'view', $sponsors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sponsors', 'action' => 'edit', $sponsors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sponsors', 'action' => 'delete', $sponsors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

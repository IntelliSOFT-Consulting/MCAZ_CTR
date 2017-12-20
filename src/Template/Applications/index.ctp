<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application[]|\Cake\Collection\CollectionInterface $applications
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Application'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trial Statuses'), ['controller' => 'TrialStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trial Status'), ['controller' => 'TrialStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Investigator Contacts'), ['controller' => 'InvestigatorContacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Investigator Contact'), ['controller' => 'InvestigatorContacts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Placebos'), ['controller' => 'Placebos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Placebo'), ['controller' => 'Placebos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Previous Dates'), ['controller' => 'PreviousDates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Previous Date'), ['controller' => 'PreviousDates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviewers'), ['controller' => 'Reviewers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reviewer'), ['controller' => 'Reviewers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Site Details'), ['controller' => 'SiteDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site Detail'), ['controller' => 'SiteDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sponsors'), ['controller' => 'Sponsors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sponsor'), ['controller' => 'Sponsors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applications index large-9 medium-8 columns content">
    <h3><?= __('Applications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('short_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('protocol_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_protocol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_drug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disease_condition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_biologicals') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_proteins') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_immunologicals') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_vaccines') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_hormones') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_toxoid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_chemical') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_medical_device') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_chemical_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_medical_device_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ecct_not_applicable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ecct_ref_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_covering_letter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_protocol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_patient_information') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_investigators_brochure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_investigators_cv') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_signed_declaration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_financial_declaration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_gmp_certificate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_indemnity_cover') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_opinion_letter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_approval_letter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_statement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_participating_countries') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_addendum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicant_fees') ?></th>
                <th scope="col"><?= $this->Paginator->sort('declaration_applicant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('declaration_date1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('declaration_principal_investigator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('declaration_date2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placebo_present') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_diagnosis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_prophylaxis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_therapy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_safety') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_efficacy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_pharmacokinetic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_pharmacodynamic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_bioequivalence') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_dose_response') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_pharmacogenetic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_pharmacogenomic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_pharmacoecomomic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope_others') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_human_pharmacology') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_administration_humans') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_bioequivalence_study') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_therapeutic_exploratory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_therapeutic_confirmatory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trial_therapeutic_use') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_capacity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estimated_duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_randomised') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_open') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_single_blind') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_double_blind') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_parallel_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_cross_over') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_specify') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_comparator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_other_medicinal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_placebo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_medicinal_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_controlled_medicinal_specify') ?></th>
                <th scope="col"><?= $this->Paginator->sort('single_site_member_state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_of_area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('single_site_physical_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('single_site_contact_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('single_site_telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multiple_sites_member_state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multiple_countries') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multiple_member_states') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_sites') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_monitoring_committee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_participants_worldwide') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_less_than_18_years') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_utero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_preterm_newborn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_newborn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_infant_and_toddler') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_children') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_adolescent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_above_18') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_adult') ?></th>
                <th scope="col"><?= $this->Paginator->sort('population_elderly') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender_female') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender_male') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_healthy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_patients') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_vulnerable_populations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_women_child_bearing') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_women_using_contraception') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_pregnant_women') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_nursing_women') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_emergency_situation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_incapable_consent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_others') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator1_given_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator1_middle_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator1_family_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator1_qualification') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator1_professional_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator1_telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator1_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('organisations_transferred_') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approval_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deactivated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application): ?>
            <tr>
                <td><?= $this->Number->format($application->id) ?></td>
                <td><?= $application->has('user') ? $this->Html->link($application->user->name, ['controller' => 'Users', 'action' => 'view', $application->user->id]) : '' ?></td>
                <td><?= $application->has('trial_status') ? $this->Html->link($application->trial_status->name, ['controller' => 'TrialStatuses', 'action' => 'view', $application->trial_status->id]) : '' ?></td>
                <td><?= h($application->short_title) ?></td>
                <td><?= h($application->protocol_no) ?></td>
                <td><?= h($application->version_no) ?></td>
                <td><?= h($application->date_of_protocol) ?></td>
                <td><?= h($application->study_drug) ?></td>
                <td><?= h($application->disease_condition) ?></td>
                <td><?= h($application->product_type_biologicals) ?></td>
                <td><?= h($application->product_type_proteins) ?></td>
                <td><?= h($application->product_type_immunologicals) ?></td>
                <td><?= h($application->product_type_vaccines) ?></td>
                <td><?= h($application->product_type_hormones) ?></td>
                <td><?= h($application->product_type_toxoid) ?></td>
                <td><?= h($application->product_type_chemical) ?></td>
                <td><?= h($application->product_type_medical_device) ?></td>
                <td><?= h($application->product_type_chemical_name) ?></td>
                <td><?= h($application->product_type_medical_device_name) ?></td>
                <td><?= h($application->ecct_not_applicable) ?></td>
                <td><?= h($application->ecct_ref_number) ?></td>
                <td><?= h($application->email_address) ?></td>
                <td><?= h($application->applicant_covering_letter) ?></td>
                <td><?= h($application->applicant_protocol) ?></td>
                <td><?= h($application->applicant_patient_information) ?></td>
                <td><?= h($application->applicant_investigators_brochure) ?></td>
                <td><?= h($application->applicant_investigators_cv) ?></td>
                <td><?= h($application->applicant_signed_declaration) ?></td>
                <td><?= h($application->applicant_financial_declaration) ?></td>
                <td><?= h($application->applicant_gmp_certificate) ?></td>
                <td><?= h($application->applicant_indemnity_cover) ?></td>
                <td><?= h($application->applicant_opinion_letter) ?></td>
                <td><?= h($application->applicant_approval_letter) ?></td>
                <td><?= h($application->applicant_statement) ?></td>
                <td><?= h($application->applicant_participating_countries) ?></td>
                <td><?= h($application->applicant_addendum) ?></td>
                <td><?= h($application->applicant_fees) ?></td>
                <td><?= h($application->declaration_applicant) ?></td>
                <td><?= h($application->declaration_date1) ?></td>
                <td><?= h($application->declaration_principal_investigator) ?></td>
                <td><?= h($application->declaration_date2) ?></td>
                <td><?= h($application->placebo_present) ?></td>
                <td><?= h($application->scope_diagnosis) ?></td>
                <td><?= h($application->scope_prophylaxis) ?></td>
                <td><?= h($application->scope_therapy) ?></td>
                <td><?= h($application->scope_safety) ?></td>
                <td><?= h($application->scope_efficacy) ?></td>
                <td><?= h($application->scope_pharmacokinetic) ?></td>
                <td><?= h($application->scope_pharmacodynamic) ?></td>
                <td><?= h($application->scope_bioequivalence) ?></td>
                <td><?= h($application->scope_dose_response) ?></td>
                <td><?= h($application->scope_pharmacogenetic) ?></td>
                <td><?= h($application->scope_pharmacogenomic) ?></td>
                <td><?= h($application->scope_pharmacoecomomic) ?></td>
                <td><?= h($application->scope_others) ?></td>
                <td><?= h($application->trial_human_pharmacology) ?></td>
                <td><?= h($application->trial_administration_humans) ?></td>
                <td><?= h($application->trial_bioequivalence_study) ?></td>
                <td><?= h($application->trial_other) ?></td>
                <td><?= h($application->trial_therapeutic_exploratory) ?></td>
                <td><?= h($application->trial_therapeutic_confirmatory) ?></td>
                <td><?= h($application->trial_therapeutic_use) ?></td>
                <td><?= h($application->design_controlled) ?></td>
                <td><?= h($application->site_capacity) ?></td>
                <td><?= h($application->estimated_duration) ?></td>
                <td><?= h($application->design_controlled_randomised) ?></td>
                <td><?= h($application->design_controlled_open) ?></td>
                <td><?= h($application->design_controlled_single_blind) ?></td>
                <td><?= h($application->design_controlled_double_blind) ?></td>
                <td><?= h($application->design_controlled_parallel_group) ?></td>
                <td><?= h($application->design_controlled_cross_over) ?></td>
                <td><?= h($application->design_controlled_other) ?></td>
                <td><?= h($application->design_controlled_specify) ?></td>
                <td><?= h($application->design_controlled_comparator) ?></td>
                <td><?= h($application->design_controlled_other_medicinal) ?></td>
                <td><?= h($application->design_controlled_placebo) ?></td>
                <td><?= h($application->design_controlled_medicinal_other) ?></td>
                <td><?= h($application->design_controlled_medicinal_specify) ?></td>
                <td><?= h($application->single_site_member_state) ?></td>
                <td><?= h($application->location_of_area) ?></td>
                <td><?= h($application->single_site_physical_address) ?></td>
                <td><?= h($application->single_site_contact_person) ?></td>
                <td><?= h($application->single_site_telephone) ?></td>
                <td><?= h($application->multiple_sites_member_state) ?></td>
                <td><?= h($application->multiple_countries) ?></td>
                <td><?= h($application->multiple_member_states) ?></td>
                <td><?= h($application->number_of_sites) ?></td>
                <td><?= h($application->data_monitoring_committee) ?></td>
                <td><?= h($application->total_participants_worldwide) ?></td>
                <td><?= h($application->population_less_than_18_years) ?></td>
                <td><?= h($application->population_utero) ?></td>
                <td><?= h($application->population_preterm_newborn) ?></td>
                <td><?= h($application->population_newborn) ?></td>
                <td><?= h($application->population_infant_and_toddler) ?></td>
                <td><?= h($application->population_children) ?></td>
                <td><?= h($application->population_adolescent) ?></td>
                <td><?= h($application->population_above_18) ?></td>
                <td><?= h($application->population_adult) ?></td>
                <td><?= h($application->population_elderly) ?></td>
                <td><?= h($application->gender_female) ?></td>
                <td><?= h($application->gender_male) ?></td>
                <td><?= h($application->subjects_healthy) ?></td>
                <td><?= h($application->subjects_patients) ?></td>
                <td><?= h($application->subjects_vulnerable_populations) ?></td>
                <td><?= h($application->subjects_women_child_bearing) ?></td>
                <td><?= h($application->subjects_women_using_contraception) ?></td>
                <td><?= h($application->subjects_pregnant_women) ?></td>
                <td><?= h($application->subjects_nursing_women) ?></td>
                <td><?= h($application->subjects_emergency_situation) ?></td>
                <td><?= h($application->subjects_incapable_consent) ?></td>
                <td><?= h($application->subjects_others) ?></td>
                <td><?= h($application->investigator1_given_name) ?></td>
                <td><?= h($application->investigator1_middle_name) ?></td>
                <td><?= h($application->investigator1_family_name) ?></td>
                <td><?= h($application->investigator1_qualification) ?></td>
                <td><?= h($application->investigator1_professional_address) ?></td>
                <td><?= h($application->investigator1_telephone) ?></td>
                <td><?= h($application->investigator1_email) ?></td>
                <td><?= h($application->organisations_transferred_) ?></td>
                <td><?= h($application->approval_date) ?></td>
                <td><?= h($application->submitted) ?></td>
                <td><?= h($application->deleted) ?></td>
                <td><?= h($application->deleted_date) ?></td>
                <td><?= h($application->deactivated) ?></td>
                <td><?= h($application->date_submitted) ?></td>
                <td><?= $this->Number->format($application->approved) ?></td>
                <td><?= h($application->modified) ?></td>
                <td><?= h($application->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $application->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $application->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $application->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $application->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['action' => 'index']) ?></li>
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
<div class="applications form large-9 medium-8 columns content">
    <?= $this->Form->create($application) ?>
    <fieldset>
        <legend><?= __('Edit Application') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('trial_status_id', ['options' => $trialStatuses, 'empty' => true]);
            echo $this->Form->control('abstract_of_study');
            echo $this->Form->control('study_title');
            echo $this->Form->control('short_title');
            echo $this->Form->control('protocol_no');
            echo $this->Form->control('version_no');
            echo $this->Form->control('date_of_protocol', ['empty' => true]);
            echo $this->Form->control('study_drug');
            echo $this->Form->control('disease_condition');
            echo $this->Form->control('product_type_biologicals');
            echo $this->Form->control('product_type_proteins');
            echo $this->Form->control('product_type_immunologicals');
            echo $this->Form->control('product_type_vaccines');
            echo $this->Form->control('product_type_hormones');
            echo $this->Form->control('product_type_toxoid');
            echo $this->Form->control('product_type_chemical');
            echo $this->Form->control('product_type_medical_device');
            echo $this->Form->control('product_type_chemical_name');
            echo $this->Form->control('product_type_medical_device_name');
            echo $this->Form->control('ecct_not_applicable');
            echo $this->Form->control('ecct_ref_number');
            echo $this->Form->control('email_address');
            echo $this->Form->control('applicant_covering_letter');
            echo $this->Form->control('applicant_protocol');
            echo $this->Form->control('applicant_patient_information');
            echo $this->Form->control('applicant_investigators_brochure');
            echo $this->Form->control('applicant_investigators_cv');
            echo $this->Form->control('applicant_signed_declaration');
            echo $this->Form->control('applicant_financial_declaration');
            echo $this->Form->control('applicant_gmp_certificate');
            echo $this->Form->control('applicant_indemnity_cover');
            echo $this->Form->control('applicant_opinion_letter');
            echo $this->Form->control('applicant_approval_letter');
            echo $this->Form->control('applicant_statement');
            echo $this->Form->control('applicant_participating_countries');
            echo $this->Form->control('applicant_addendum');
            echo $this->Form->control('applicant_fees');
            echo $this->Form->control('declaration_applicant');
            echo $this->Form->control('declaration_date1', ['empty' => true]);
            echo $this->Form->control('declaration_principal_investigator');
            echo $this->Form->control('declaration_date2', ['empty' => true]);
            echo $this->Form->control('placebo_present');
            echo $this->Form->control('principal_inclusion_criteria');
            echo $this->Form->control('principal_exclusion_criteria');
            echo $this->Form->control('primary_end_points');
            echo $this->Form->control('scope_diagnosis');
            echo $this->Form->control('scope_prophylaxis');
            echo $this->Form->control('scope_therapy');
            echo $this->Form->control('scope_safety');
            echo $this->Form->control('scope_efficacy');
            echo $this->Form->control('scope_pharmacokinetic');
            echo $this->Form->control('scope_pharmacodynamic');
            echo $this->Form->control('scope_bioequivalence');
            echo $this->Form->control('scope_dose_response');
            echo $this->Form->control('scope_pharmacogenetic');
            echo $this->Form->control('scope_pharmacogenomic');
            echo $this->Form->control('scope_pharmacoecomomic');
            echo $this->Form->control('scope_others');
            echo $this->Form->control('scope_others_specify');
            echo $this->Form->control('trial_human_pharmacology');
            echo $this->Form->control('trial_administration_humans');
            echo $this->Form->control('trial_bioequivalence_study');
            echo $this->Form->control('trial_other');
            echo $this->Form->control('trial_other_specify');
            echo $this->Form->control('trial_therapeutic_exploratory');
            echo $this->Form->control('trial_therapeutic_confirmatory');
            echo $this->Form->control('trial_therapeutic_use');
            echo $this->Form->control('design_controlled');
            echo $this->Form->control('site_capacity');
            echo $this->Form->control('staff_numbers');
            echo $this->Form->control('other_details_explanation');
            echo $this->Form->control('other_details_regulatory_notapproved');
            echo $this->Form->control('other_details_regulatory_approved');
            echo $this->Form->control('other_details_regulatory_rejected');
            echo $this->Form->control('other_details_regulatory_halted');
            echo $this->Form->control('estimated_duration');
            echo $this->Form->control('design_controlled_randomised');
            echo $this->Form->control('design_controlled_open');
            echo $this->Form->control('design_controlled_single_blind');
            echo $this->Form->control('design_controlled_double_blind');
            echo $this->Form->control('design_controlled_parallel_group');
            echo $this->Form->control('design_controlled_cross_over');
            echo $this->Form->control('design_controlled_other');
            echo $this->Form->control('design_controlled_specify');
            echo $this->Form->control('design_controlled_comparator');
            echo $this->Form->control('design_controlled_other_medicinal');
            echo $this->Form->control('design_controlled_placebo');
            echo $this->Form->control('design_controlled_medicinal_other');
            echo $this->Form->control('design_controlled_medicinal_specify');
            echo $this->Form->control('single_site_member_state');
            echo $this->Form->control('location_of_area');
            echo $this->Form->control('single_site_physical_address');
            echo $this->Form->control('single_site_contact_person');
            echo $this->Form->control('single_site_telephone');
            echo $this->Form->control('multiple_sites_member_state');
            echo $this->Form->control('multiple_countries');
            echo $this->Form->control('multiple_member_states');
            echo $this->Form->control('number_of_sites');
            echo $this->Form->control('multi_country_list');
            echo $this->Form->control('data_monitoring_committee');
            echo $this->Form->control('total_enrolment_per_site');
            echo $this->Form->control('total_participants_worldwide');
            echo $this->Form->control('population_less_than_18_years');
            echo $this->Form->control('population_utero');
            echo $this->Form->control('population_preterm_newborn');
            echo $this->Form->control('population_newborn');
            echo $this->Form->control('population_infant_and_toddler');
            echo $this->Form->control('population_children');
            echo $this->Form->control('population_adolescent');
            echo $this->Form->control('population_above_18');
            echo $this->Form->control('population_adult');
            echo $this->Form->control('population_elderly');
            echo $this->Form->control('gender_female');
            echo $this->Form->control('gender_male');
            echo $this->Form->control('subjects_healthy');
            echo $this->Form->control('subjects_patients');
            echo $this->Form->control('subjects_vulnerable_populations');
            echo $this->Form->control('subjects_women_child_bearing');
            echo $this->Form->control('subjects_women_using_contraception');
            echo $this->Form->control('subjects_pregnant_women');
            echo $this->Form->control('subjects_nursing_women');
            echo $this->Form->control('subjects_emergency_situation');
            echo $this->Form->control('subjects_incapable_consent');
            echo $this->Form->control('subjects_specify');
            echo $this->Form->control('subjects_others');
            echo $this->Form->control('subjects_others_specify');
            echo $this->Form->control('investigator1_given_name');
            echo $this->Form->control('investigator1_middle_name');
            echo $this->Form->control('investigator1_family_name');
            echo $this->Form->control('investigator1_qualification');
            echo $this->Form->control('investigator1_professional_address');
            echo $this->Form->control('investigator1_telephone');
            echo $this->Form->control('investigator1_email');
            echo $this->Form->control('organisations_transferred_');
            echo $this->Form->control('number_participants');
            echo $this->Form->control('notification');
            echo $this->Form->control('approval_date', ['empty' => true]);
            echo $this->Form->control('submitted');
            echo $this->Form->control('deleted');
            echo $this->Form->control('deleted_date', ['empty' => true]);
            echo $this->Form->control('deactivated');
            echo $this->Form->control('date_submitted', ['empty' => true]);
            echo $this->Form->control('approved');
            echo $this->Form->control('approved_reason');
            echo $this->Form->control('final_report');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

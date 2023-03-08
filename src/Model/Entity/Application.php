<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $application_id
 * @property string $report_type
 * @property int $trial_status_id
 * @property string $study_title
 * @property string $short_title
 * @property string $public_title
 * @property string $scientific_title
 * @property string $public_contact_email
 * @property string $public_contact_name
 * @property string $public_contact_designation
 * @property string $public_contact_phone
 * @property string $public_contact_postal
 * @property string $public_contact_affiliation
 * @property string $scientific_contact_email
 * @property string $scientific_contact_designation
 * @property string $scientific_contact_name
 * @property string $scientific_contact_phone
 * @property string $scientific_contact_postal
 * @property string $scientific_contact_affiliation
 * @property string $countries_recruitment
 * @property string $abstract_of_study
 * @property string $protocol_no
 * @property string $version_no
 * @property \Cake\I18n\FrozenDate $date_of_protocol
 * @property string $protocol_version
 * @property string $study_drug
 * @property string $drug_name
 * @property string $quantity_excemption
 * @property string $drug_details
 * @property string $medicine_reaction
 * @property string $medicine_therapeutic_effects
 * @property string $medicine_registered_details
 * @property string $trial_origin_details
 * @property string $other_country_details
 * @property string $safety
 * @property string $medicine_registered
 * @property string $trials_origin_country
 * @property string $registered_other_country
 * @property string $registered_other_country_details
 * @property string $application_other_country
 * @property string $application_other_country_details
 * @property string $rejected_other_country
 * @property string $rejected_other_country_details
 * @property string $administration_route
 * @property string $exemption_required
 * @property string $state_antidote
 * @property string $ethic_considerations
 * @property string $insurance_company
 * @property string $insurance_address
 * @property string $insurance_amount
 * @property string $other_insurance
 * @property string $ethical_review_status
 * @property \Cake\I18n\FrozenDate $date_of_approval_ethics
 * @property string $concomitant_medicine
 * @property string $status_medicine
 * @property string $given_concomitantly
 * @property string $concomitant_name
 * @property string $concurrent_medicine
 * @property string $disease_condition
 * @property string $sponsor_name
 * @property string $sponsor_contact_person
 * @property string $sponsor_address
 * @property string $sponsor_telephone_number
 * @property string $sponsor_fax_number
 * @property string $sponsor_cell_number
 * @property string $sponsor_email_address
 * @property string $participants_description
 * @property bool $product_type_biologicals
 * @property string $product_type_biologicals_name
 * @property bool $product_type_proteins
 * @property bool $product_type_immunologicals
 * @property bool $product_type_vaccines
 * @property bool $product_type_hormones
 * @property bool $product_type_toxoid
 * @property bool $product_type_chemical
 * @property bool $product_type_medical_device
 * @property string $product_type_chemical_name
 * @property string $product_type_medical_device_name
 * @property string $participants_justification
 * @property bool $ecct_not_applicable
 * @property string $ecct_ref_number
 * @property string $email_address
 * @property bool $applicant_covering_letter
 * @property bool $applicant_protocol
 * @property bool $applicant_patient_information
 * @property bool $applicant_investigators_brochure
 * @property bool $applicant_investigators_cv
 * @property bool $applicant_signed_declaration
 * @property bool $applicant_financial_declaration
 * @property bool $applicant_gmp_certificate
 * @property bool $applicant_indemnity_cover
 * @property bool $applicant_opinion_letter
 * @property bool $applicant_approval_letter
 * @property bool $applicant_statement
 * @property bool $applicant_participating_countries
 * @property bool $applicant_addendum
 * @property bool $applicant_fees
 * @property bool $applicant_mc10
 * @property bool $applicant_study_monitors
 * @property bool $applicant_monitoring_plans
 * @property bool $applicant_pi_declaration
 * @property bool $applicant_study_sponsorship
 * @property bool $applicant_pharmacy_plan
 * @property bool $applicant_pharmacy_license
 * @property bool $applicant_study_medicines
 * @property bool $applicant_insurance_certificate
 * @property bool $applicant_generic_insurance
 * @property bool $applicant_ethics_approval
 * @property bool $applicant_ethics_letter
 * @property bool $applicant_country_approvals
 * @property bool $applicant_advertisments
 * @property bool $applicant_electronic_versions
 * @property bool $applicant_safety_monitoring
 * @property bool $applicant_biological_products
 * @property bool $applicant_dossier
 * @property string $placebo_present
 * @property string $principal_inclusion_criteria
 * @property string $principal_exclusion_criteria
 * @property string $primary_end_points
 * @property bool $scope_diagnosis
 * @property bool $scope_prophylaxis
 * @property bool $scope_therapy
 * @property bool $scope_safety
 * @property bool $scope_efficacy
 * @property bool $scope_pharmacokinetic
 * @property bool $scope_pharmacodynamic
 * @property bool $scope_bioequivalence
 * @property bool $scope_dose_response
 * @property bool $scope_pharmacogenetic
 * @property bool $scope_pharmacogenomic
 * @property bool $scope_pharmacoecomomic
 * @property bool $scope_others
 * @property string $scope_others_specify
 * @property bool $trial_human_pharmacology
 * @property bool $trial_administration_humans
 * @property bool $trial_bioequivalence_study
 * @property bool $trial_other
 * @property string $trial_other_specify
 * @property bool $trial_therapeutic_exploratory
 * @property bool $trial_therapeutic_confirmatory
 * @property bool $trial_therapeutic_use
 * @property string $design_controlled
 * @property string $site_capacity
 * @property string $staff_numbers
 * @property string $other_details_explanation
 * @property string $other_details_regulatory_notapproved
 * @property string $other_details_regulatory_approved
 * @property string $other_details_regulatory_rejected
 * @property string $other_details_regulatory_halted
 * @property string $recording_effects
 * @property string $tests_done
 * @property string $recording_method
 * @property string $trial_storage
 * @property string $measures_compliance
 * @property string $evalution_of_results
 * @property string $inform_persons
 * @property string $inform_staff
 * @property string $record_keeping
 * @property string $animal_particulars
 * @property string $estimated_duration
 * @property string $design_controlled_randomised
 * @property string $design_controlled_open
 * @property string $design_controlled_single_blind
 * @property string $design_controlled_double_blind
 * @property string $design_controlled_parallel_group
 * @property string $design_controlled_cross_over
 * @property string $design_controlled_other
 * @property string $design_controlled_specify
 * @property string $design_controlled_comparator
 * @property string $design_controlled_other_medicinal
 * @property string $design_controlled_placebo
 * @property string $design_controlled_medicinal_other
 * @property string $design_controlled_medicinal_specify
 * @property string $single_site_member_state
 * @property string $location_of_area
 * @property string $single_site_physical_address
 * @property string $single_site_contact_person
 * @property string $single_site_telephone
 * @property string $single_site_name
 * @property string $single_site_physical_address1
 * @property string $single_site_contact_person1
 * @property string $single_site_contact_details
 * @property int $single_site_province_id
 * @property string $multiple_sites_member_state
 * @property string $multiple_countries
 * @property string $multiple_member_states
 * @property string $number_of_sites
 * @property string $multi_country_list
 * @property string $data_monitoring_committee
 * @property string $total_enrolment_per_site
 * @property string $total_participants_worldwide
 * @property string $population_less_than_18_years
 * @property string $population_utero
 * @property string $population_preterm_newborn
 * @property string $population_newborn
 * @property string $population_infant_and_toddler
 * @property string $population_children
 * @property string $population_adolescent
 * @property string $population_above_18
 * @property string $population_adult
 * @property string $population_elderly
 * @property bool $gender_female
 * @property bool $gender_male
 * @property string $subjects_healthy
 * @property string $subjects_patients
 * @property string $subjects_vulnerable_populations
 * @property string $subjects_women_child_bearing
 * @property string $subjects_women_using_contraception
 * @property string $subjects_pregnant_women
 * @property string $subjects_nursing_women
 * @property string $subjects_emergency_situation
 * @property string $subjects_incapable_consent
 * @property string $subjects_children
 * @property string $subjects_adolescents
 * @property string $subjects_prisoners
 * @property string $subjects_refugees
 * @property string $subjects_elderly
 * @property string $subjects_unconscious
 * @property string $subjects_disorders
 * @property string $subjects_specify
 * @property string $subjects_others
 * @property string $subjects_others_specify
 * @property string $investigator1_full_name
 * @property \Cake\I18n\FrozenDate $investigator1_date_of_birth
 * @property string $investigator1_qualification
 * @property string $investigator1_professional_address
 * @property string $investigator1_telephone
 * @property string $investigator1_email
 * @property string $business_name
 * @property string $business_office
 * @property string $business_physical_address
 * @property string $business_telephone
 * @property string $business_position
 * @property string $money_source
 * @property string $business_field_manufacture
 * @property string $organisations_transferred_
 * @property string $number_participants
 * @property string $notification
 * @property \Cake\I18n\FrozenDate $approval_date
 * @property int $submitted
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $deleted_date
 * @property bool $deactivated
 * @property \Cake\I18n\FrozenTime $date_submitted
 * @property string $status
 * @property string $approved
 * @property \Cake\I18n\FrozenDate $approved_date
 * @property string $approved_reason
 * @property string $final_report
 * @property string $clinical
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Application $parent_application
 * @property \App\Model\Entity\Comment[] $evaluation_comments
 * @property \App\Model\Entity\Comment[] $notification_comments
 * @property \App\Model\Entity\Comment[] $committee_comments
 * @property \App\Model\Entity\ApplicationStage[] $application_stages
 * @property \App\Model\Entity\InvestigatorContact[] $investigator_contacts
 * @property \App\Model\Entity\Participant[] $participants
 * @property \App\Model\Entity\Medicine[] $medicines
 * @property \App\Model\Entity\Placebo[] $placebos
 * @property \App\Model\Entity\EvaluationHeader $evaluation_header
 * @property \App\Model\Entity\Evaluation[] $evaluations
 * @property \App\Model\Entity\SiteDetail[] $site_details
 * @property \App\Model\Entity\Sponsor[] $sponsors
 * @property \App\Model\Entity\Committee[] $committees
 * @property \App\Model\Entity\FinanceApproval[] $finance_approvals
 * @property \App\Model\Entity\FinanceAnnualApproval[] $finance_annual_approvals
 * @property \App\Model\Entity\AssignEvaluator[] $assign_evaluators
 * @property \App\Model\Entity\CommitteeReview[] $committee_reviews
 * @property \App\Model\Entity\DgReview[] $dg_reviews
 * @property \App\Model\Entity\FinalStage[] $final_stages
 * @property \App\Model\Entity\AnnualApproval[] $annual_approvals
 * @property \App\Model\Entity\Appeal[] $appeals
 * @property \App\Model\Entity\RequestInfo[] $request_infos
 * @property \App\Model\Entity\SeventyFife[] $seventy_fives
 * @property \App\Model\Entity\GcpInspection[] $gcp_inspections
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Attachment[] $registrations
 * @property \App\Model\Entity\Attachment[] $policies
 * @property \App\Model\Entity\Attachment[] $details
 * @property \App\Model\Entity\Attachment[] $proofs
 * @property \App\Model\Entity\Attachment[] $cover_letters
 * @property \App\Model\Entity\Attachment[] $protocols
 * @property \App\Model\Entity\Attachment[] $fees
 * @property \App\Model\Entity\Attachment[] $receipts
 * @property \App\Model\Entity\Attachment[] $mc10_forms
 * @property \App\Model\Entity\Attachment[] $leaflets
 * @property \App\Model\Entity\Attachment[] $brochures
 * @property \App\Model\Entity\Attachment[] $investigator_cvs
 * @property \App\Model\Entity\Attachment[] $declarations
 * @property \App\Model\Entity\Attachment[] $study_monitors
 * @property \App\Model\Entity\Attachment[] $monitoring_plans
 * @property \App\Model\Entity\Attachment[] $pi_declarations
 * @property \App\Model\Entity\Attachment[] $study_sponsorships
 * @property \App\Model\Entity\Attachment[] $pharmacy_plans
 * @property \App\Model\Entity\Attachment[] $pharmacy_licenses
 * @property \App\Model\Entity\Attachment[] $study_medicines
 * @property \App\Model\Entity\Attachment[] $insurance_certificates
 * @property \App\Model\Entity\Attachment[] $generic_insurances
 * @property \App\Model\Entity\Attachment[] $ethics_approvals
 * @property \App\Model\Entity\Attachment[] $ethics_letters
 * @property \App\Model\Entity\Attachment[] $country_approvals
 * @property \App\Model\Entity\Attachment[] $advertisments
 * @property \App\Model\Entity\Attachment[] $safety_monitors
 * @property \App\Model\Entity\Attachment[] $biological_products
 * @property \App\Model\Entity\Attachment[] $dossiers
 * @property \App\Model\Entity\Attachment[] $legal_forms
 * @property \App\Model\Entity\Application[] $amendments
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Clinical[] $clinicals
 */
class Application extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'application_id' => true,
        'report_type' => true,
        'trial_status_id' => true,
        'study_title' => true,
        'short_title' => true,
        'public_title' => true,
        'scientific_title' => true,
        'public_contact_email' => true,
        'public_contact_name' => true,
        'public_contact_designation' => true,
        'public_contact_phone' => true,
        'public_contact_postal' => true,
        'public_contact_affiliation' => true,
        'scientific_contact_email' => true,
        'scientific_contact_designation' => true,
        'scientific_contact_name' => true,
        'scientific_contact_phone' => true,
        'scientific_contact_postal' => true,
        'scientific_contact_affiliation' => true,
        'countries_recruitment' => true,
        'abstract_of_study' => true,
        'protocol_no' => true,
        'version_no' => true,
        'date_of_protocol' => true,
        'protocol_version' => true,
        'study_drug' => true,
        'drug_name' => true,
        'quantity_excemption' => true,
        'drug_details' => true,
        'medicine_reaction' => true,
        'medicine_therapeutic_effects' => true,
        'medicine_registered_details' => true,
        'trial_origin_details' => true,
        'other_country_details' => true,
        'safety' => true,
        'medicine_registered' => true,
        'trials_origin_country' => true,
        'registered_other_country' => true,
        'registered_other_country_details' => true,
        'application_other_country' => true,
        'application_other_country_details' => true,
        'rejected_other_country' => true,
        'rejected_other_country_details' => true,
        'administration_route' => true,
        'exemption_required' => true,
        'state_antidote' => true,
        'ethic_considerations' => true,
        'insurance_company' => true,
        'insurance_address' => true,
        'insurance_amount' => true,
        'other_insurance' => true,
        'ethical_review_status' => true,
        'date_of_approval_ethics' => true,
        'concomitant_medicine' => true,
        'status_medicine' => true,
        'given_concomitantly' => true,
        'concomitant_name' => true,
        'concurrent_medicine' => true,
        'disease_condition' => true,
        'sponsor_name' => true,
        'sponsor_contact_person' => true,
        'sponsor_address' => true,
        'sponsor_telephone_number' => true,
        'sponsor_fax_number' => true,
        'sponsor_cell_number' => true,
        'sponsor_email_address' => true,
        'participants_description' => true,
        'product_type_biologicals' => true,
        'product_type_biologicals_name' => true,
        'product_type_proteins' => true,
        'product_type_immunologicals' => true,
        'product_type_vaccines' => true,
        'product_type_hormones' => true,
        'product_type_toxoid' => true,
        'product_type_chemical' => true,
        'product_type_medical_device' => true,
        'product_type_chemical_name' => true,
        'product_type_medical_device_name' => true,
        'participants_justification' => true,
        'ecct_not_applicable' => true,
        'ecct_ref_number' => true,
        'email_address' => true,
        'applicant_covering_letter' => true,
        'applicant_protocol' => true,
        'applicant_patient_information' => true,
        'applicant_investigators_brochure' => true,
        'applicant_investigators_cv' => true,
        'applicant_signed_declaration' => true,
        'applicant_financial_declaration' => true,
        'applicant_gmp_certificate' => true,
        'applicant_indemnity_cover' => true,
        'applicant_opinion_letter' => true,
        'applicant_approval_letter' => true,
        'applicant_statement' => true,
        'applicant_participating_countries' => true,
        'applicant_addendum' => true,
        'applicant_fees' => true,
        'applicant_mc10' => true,
        'applicant_study_monitors' => true,
        'applicant_monitoring_plans' => true,
        'applicant_pi_declaration' => true,
        'applicant_study_sponsorship' => true,
        'applicant_pharmacy_plan' => true,
        'applicant_pharmacy_license' => true,
        'applicant_study_medicines' => true,
        'applicant_insurance_certificate' => true,
        'applicant_generic_insurance' => true,
        'applicant_ethics_approval' => true,
        'applicant_ethics_letter' => true,
        'applicant_country_approvals' => true,
        'applicant_advertisments' => true,
        'applicant_electronic_versions' => true,
        'applicant_safety_monitoring' => true,
        'applicant_biological_products' => true,
        'applicant_dossier' => true,
        'placebo_present' => true,
        'principal_inclusion_criteria' => true,
        'principal_exclusion_criteria' => true,
        'primary_end_points' => true,
        'scope_diagnosis' => true,
        'scope_prophylaxis' => true,
        'scope_therapy' => true,
        'scope_safety' => true,
        'scope_efficacy' => true,
        'scope_pharmacokinetic' => true,
        'scope_pharmacodynamic' => true,
        'scope_bioequivalence' => true,
        'scope_dose_response' => true,
        'scope_pharmacogenetic' => true,
        'scope_pharmacogenomic' => true,
        'scope_pharmacoecomomic' => true,
        'scope_others' => true,
        'scope_others_specify' => true,
        'trial_human_pharmacology' => true,
        'trial_administration_humans' => true,
        'trial_bioequivalence_study' => true,
        'trial_other' => true,
        'trial_other_specify' => true,
        'trial_therapeutic_exploratory' => true,
        'trial_therapeutic_confirmatory' => true,
        'trial_therapeutic_use' => true,
        'design_controlled' => true,
        'site_capacity' => true,
        'staff_numbers' => true,
        'other_details_explanation' => true,
        'other_details_regulatory_notapproved' => true,
        'other_details_regulatory_approved' => true,
        'other_details_regulatory_rejected' => true,
        'other_details_regulatory_halted' => true,
        'recording_effects' => true,
        'tests_done' => true,
        'recording_method' => true,
        'trial_storage' => true,
        'measures_compliance' => true,
        'evalution_of_results' => true,
        'inform_persons' => true,
        'inform_staff' => true,
        'record_keeping' => true,
        'animal_particulars' => true,
        'estimated_duration' => true,
        'design_controlled_randomised' => true,
        'design_controlled_open' => true,
        'design_controlled_single_blind' => true,
        'design_controlled_double_blind' => true,
        'design_controlled_parallel_group' => true,
        'design_controlled_cross_over' => true,
        'design_controlled_other' => true,
        'design_controlled_specify' => true,
        'design_controlled_comparator' => true,
        'design_controlled_other_medicinal' => true,
        'design_controlled_placebo' => true,
        'design_controlled_medicinal_other' => true,
        'design_controlled_medicinal_specify' => true,
        'single_site_member_state' => true,
        'location_of_area' => true,
        'single_site_physical_address' => true,
        'single_site_contact_person' => true,
        'single_site_telephone' => true,
        'single_site_name' => true,
        'single_site_physical_address1' => true,
        'single_site_contact_person1' => true,
        'single_site_contact_details' => true,
        'single_site_province_id' => true,
        'multiple_sites_member_state' => true,
        'multiple_countries' => true,
        'multiple_member_states' => true,
        'number_of_sites' => true,
        'multi_country_list' => true,
        'data_monitoring_committee' => true,
        'total_enrolment_per_site' => true,
        'total_participants_worldwide' => true,
        'population_less_than_18_years' => true,
        'population_utero' => true,
        'population_preterm_newborn' => true,
        'population_newborn' => true,
        'population_infant_and_toddler' => true,
        'population_children' => true,
        'population_adolescent' => true,
        'population_above_18' => true,
        'population_adult' => true,
        'population_elderly' => true,
        'gender_female' => true,
        'gender_male' => true,
        'subjects_healthy' => true,
        'subjects_patients' => true,
        'subjects_vulnerable_populations' => true,
        'subjects_women_child_bearing' => true,
        'subjects_women_using_contraception' => true,
        'subjects_pregnant_women' => true,
        'subjects_nursing_women' => true,
        'subjects_emergency_situation' => true,
        'subjects_incapable_consent' => true,
        'subjects_children' => true,
        'subjects_adolescents' => true,
        'subjects_prisoners' => true,
        'subjects_refugees' => true,
        'subjects_elderly' => true,
        'subjects_unconscious' => true,
        'subjects_disorders' => true,
        'subjects_specify' => true,
        'subjects_others' => true,
        'subjects_others_specify' => true,
        'investigator1_full_name' => true,
        'investigator1_date_of_birth' => true,
        'investigator1_qualification' => true,
        'investigator1_professional_address' => true,
        'investigator1_telephone' => true,
        'investigator1_email' => true,
        'business_name' => true,
        'business_office' => true,
        'business_physical_address' => true,
        'business_telephone' => true,
        'business_position' => true,
        'money_source' => true,
        'business_field_manufacture' => true,
        'organisations_transferred_' => true,
        'number_participants' => true,
        'notification' => true,
        'approval_date' => true,
        'submitted' => true,
        'deleted' => true,
        'deleted_date' => true,
        'deactivated' => true,
        'date_submitted' => true,
        'status' => true,
        'approved' => true,
        'approved_date' => true,
        'approved_reason' => true,
        'final_report' => true,
        'clinical' => true,
        'modified' => true,
        'created' => true,
        'user' => true,
        'parent_application' => true,
        'evaluation_comments' => true,
        'notification_comments' => true,
        'committee_comments' => true,
        'application_stages' => true,
        'investigator_contacts' => true,
        'participants' => true,
        'medicines' => true,
        'placebos' => true,
        'evaluation_header' => true,
        'evaluations' => true,
        'site_details' => true,
        'sponsors' => true,
        'committees' => true,
        'finance_approvals' => true,
        'finance_annual_approvals' => true,
        'assign_evaluators' => true,
        'committee_reviews' => true,
        'dg_reviews' => true,
        'final_stages' => true,
        'annual_approvals' => true,
        'appeals' => true,
        'request_infos' => true,
        'seventy_fives' => true,
        'gcp_inspections' => true,
        'attachments' => true,
        'registrations' => true,
        'policies' => true,
        'details' => true,
        'proofs' => true,
        'cover_letters' => true,
        'protocols' => true,
        'fees' => true,
        'receipts' => true,
        'mc10_forms' => true,
        'leaflets' => true,
        'brochures' => true,
        'investigator_cvs' => true,
        'declarations' => true,
        'study_monitors' => true,
        'monitoring_plans' => true,
        'pi_declarations' => true,
        'study_sponsorships' => true,
        'pharmacy_plans' => true,
        'pharmacy_licenses' => true,
        'study_medicines' => true,
        'insurance_certificates' => true,
        'generic_insurances' => true,
        'ethics_approvals' => true,
        'ethics_letters' => true,
        'country_approvals' => true,
        'advertisments' => true,
        'safety_monitors' => true,
        'biological_products' => true,
        'dossiers' => true,
        'legal_forms' => true,
        'amendments' => true,
        'comments' => true,
        'clinicals' => true,
        'non_clinicals' => true,
        'statisticals' => true,
        'quality_assessments' => true,
        'sdrugs' => true,
        'quality' => true,
        'compliance' => true,
        'storage_conditions' => true,
        'pdrugs' => true,
        'sdrugs_conditions' => true,
    ];
}
<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $trial_status_id
 * @property string $abstract_of_study
 * @property string $study_title
 * @property string $short_title
 * @property string $protocol_no
 * @property string $version_no
 * @property \Cake\I18n\FrozenDate $date_of_protocol
 * @property string $study_drug
 * @property string $disease_condition
 * @property bool $product_type_biologicals
 * @property bool $product_type_proteins
 * @property bool $product_type_immunologicals
 * @property bool $product_type_vaccines
 * @property bool $product_type_hormones
 * @property bool $product_type_toxoid
 * @property bool $product_type_chemical
 * @property bool $product_type_medical_device
 * @property string $product_type_chemical_name
 * @property string $product_type_medical_device_name
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
 * @property string $declaration_applicant
 * @property \Cake\I18n\FrozenDate $declaration_date1
 * @property string $declaration_principal_investigator
 * @property \Cake\I18n\FrozenDate $declaration_date2
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
 * @property string $subjects_specify
 * @property string $subjects_others
 * @property string $subjects_others_specify
 * @property string $investigator1_given_name
 * @property string $investigator1_middle_name
 * @property string $investigator1_family_name
 * @property string $investigator1_qualification
 * @property string $investigator1_professional_address
 * @property string $investigator1_telephone
 * @property string $investigator1_email
 * @property string $organisations_transferred_
 * @property string $number_participants
 * @property string $notification
 * @property \Cake\I18n\FrozenDate $approval_date
 * @property bool $submitted
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $deleted_date
 * @property bool $deactivated
 * @property \Cake\I18n\FrozenTime $date_submitted
 * @property int $approved
 * @property string $approved_reason
 * @property string $final_report
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\TrialStatus $trial_status
 * @property \App\Model\Entity\InvestigatorContact[] $investigator_contacts
 * @property \App\Model\Entity\Organization[] $organizations
 * @property \App\Model\Entity\Placebo[] $placebos
 * @property \App\Model\Entity\PreviousDate[] $previous_dates
 * @property \App\Model\Entity\Reviewer[] $reviewers
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\SiteDetail[] $site_details
 * @property \App\Model\Entity\Sponsor[] $sponsors
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
        '*' => true,
    ];
}

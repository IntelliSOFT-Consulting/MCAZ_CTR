<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clinical Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $user_id
 * @property int $clinical_id
 * @property string $evaluation_type
 * @property string $sponsor_justification
 * @property string $sponsor_comment
 * @property string $low_intervention
 * @property string $evidence_based
 * @property string $products_authorised
 * @property string $poses_risk
 * @property string $posed_risks_comment
 * @property string $trial_phase
 * @property string $therapeutic_condition
 * @property string $action_mechanism
 * @property string $development_status
 * @property string $rationale_acceptable
 * @property string $objective_acceptable
 * @property string $endpoint_acceptable
 * @property string $objective_comments
 * @property string $secondary_objective_acceptable
 * @property string $secondary_endpoint_acceptable
 * @property string $secondary_objective_comments
 * @property bool $study_health_participants
 * @property bool $study_participants
 * @property bool $study_adults
 * @property bool $study_adolescent
 * @property bool $study_elderly
 * @property bool $study_male
 * @property bool $study_female
 * @property string $adolescents_age_group
 * @property string $potential_contraception
 * @property string $potential_none_contraception
 * @property string $study_population_comments
 * @property string $inclusion_acceptable
 * @property string $inclusion_comments
 * @property string $exclusion_acceptable
 * @property string $exclusion_comments
 * @property string $vulnerable_population
 * @property string $justifiable_population
 * @property string $clinical_benefit
 * @property string $vulnerable_comments
 * @property string $proposed_study_acceptable
 * @property string $study_plan_comments
 * @property string $imp_acceptable
 * @property string $imp_other
 * @property string $imp_comments
 * @property string $comparator_usage
 * @property string $comparator_comments
 * @property bool $comparator_smpc
 * @property bool $comparator_international
 * @property bool $comparator_publications
 * @property string $comparator_acceptable
 * @property string $comparator_workspace_comments
 * @property string $placebo_usage
 * @property string $placebo_justified
 * @property string $placebo_comments
 * @property string $auxiliary_usage
 * @property string $auxiliary_justified
 * @property string $auxiliary_comments
 * @property string $medical_device_justified
 * @property string $medical_device_comments
 * @property string $associated_risks_comments
 * @property string $emergency_procedure_justified
 * @property string $additional_measures
 * @property string $unbinding_comments
 * @property string $teratogenicity_risk
 * @property string $contraceptive_acceptable
 * @property string $proposal_insufficient
 * @property string $proposal_comments
 * @property bool $male_participants
 * @property string $male_participants_comments
 * @property bool $contraception_treatment
 * @property string $contraception_treatment_comments
 * @property string $other_issue_comments
 * @property bool $pregnancy_interval
 * @property string $pregnancy_interval_comments
 * @property bool $pregnancy_test
 * @property string $pregnancy_test_comments
 * @property bool $postmenopausal
 * @property string $postmenopausal_comments
 * @property bool $other_issue
 * @property string $general_contraception_comments
 * @property string $discontinuation_criteria
 * @property string $criteria_acceptable
 * @property string $termination_criteria_acceptable
 * @property string $discontinuation_comments
 * @property string $permitted_concomitant
 * @property bool $prohibited_concomitant
 * @property string $concomitant_comments
 * @property bool $procedures_adequate
 * @property bool $insufficient_frequency
 * @property string $frequency_comments
 * @property bool $relevant_targets
 * @property string $relevant_targets_comments
 * @property bool $minimization_measures
 * @property string $minimization_measures_comments
 * @property bool $risk_unacceptable
 * @property string $risk_unacceptable_comments
 * @property bool $insufficient_followup
 * @property string $insufficient_followup_comments
 * @property bool $other_safety
 * @property string $other_safety_comments
 * @property string $rsi_included
 * @property string $acceptable_document
 * @property string $acceptable_format
 * @property string $expected_acceptable
 * @property string $general_irs_comments
 * @property string $general_safety_comments
 * @property string $dsmc_committee
 * @property string $arrangements_acceptable
 * @property string $dsmc_comments
 * @property string $trial_definition_acceptable
 * @property string $trial_definition_comments
 * @property string $collection_unacceptable
 * @property string $collection_unacceptable_comments
 * @property bool $data_policies_acceptable
 * @property string $data_policies_acceptable_comments
 * @property bool $unauthorised_unacceptable
 * @property string $unauthorised_unacceptable_comments
 * @property bool $measures_unacceptable
 * @property string $measures_unacceptable_comments
 * @property bool $breach_unacceptable
 * @property string $breach_unacceptable_comments
 * @property bool $other_protection
 * @property string $other_protection_comments
 * @property string $data_protection_comments
 * @property bool $recruitment_unacceptable
 * @property string $recruitment_unacceptable_comments
 * @property string $recruitment_comments
 * @property string $risk_evaluation_unacceptable
 * @property string $participants_protection_acceptable
 * @property bool $condition_unmonitored
 * @property string $condition_unmonitored_comments
 * @property bool $unsafeguarded_rights
 * @property string $unsafeguarded_rights_comments
 * @property bool $unmonitored_threshold
 * @property string $unmonitored_threshold_comments
 * @property string $risk_assessment_comments
 * @property bool $application_acceptable
 * @property string $application_acceptable_comments
 * @property bool $supplementary_required
 * @property string $supplementary_required_comments
 * @property string $overal_assessment_comments
 * @property $file
 * @property string $dir
 * @property string $size
 * @property string $type
 * @property int $chosen
 * @property int $submitted
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property string $assessor_discussion
 * @property string $additional
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Clinical $clinical
 * @property \App\Model\Entity\Clinical[] $clinical_edits
 */
class Clinical extends Entity
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

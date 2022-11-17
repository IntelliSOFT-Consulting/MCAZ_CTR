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
        'application_id' => true,
        'user_id' => true,
        'clinical_id' => true,
        'evaluation_type' => true,
        'sponsor_justification' => true,
        'sponsor_comment' => true,
        'low_intervention' => true,
        'evidence_based' => true,
        'products_authorised' => true,
        'poses_risk' => true,
        'posed_risks_comment' => true,
        'trial_phase' => true,
        'therapeutic_condition' => true,
        'action_mechanism' => true,
        'development_status' => true,
        'rationale_acceptable' => true,
        'objective_acceptable' => true,
        'endpoint_acceptable' => true,
        'objective_comments' => true,
        'secondary_objective_acceptable' => true,
        'secondary_endpoint_acceptable' => true,
        'secondary_objective_comments' => true,
        'study_health_participants' => true,
        'study_participants' => true,
        'study_adults' => true,
        'study_adolescent' => true,
        'study_elderly' => true,
        'study_male' => true,
        'study_female' => true,
        'adolescents_age_group' => true,
        'potential_contraception' => true,
        'potential_none_contraception' => true,
        'study_population_comments' => true,
        'inclusion_acceptable' => true,
        'inclusion_comments' => true,
        'exclusion_acceptable' => true,
        'exclusion_comments' => true,
        'vulnerable_population' => true,
        'justifiable_population' => true,
        'clinical_benefit' => true,
        'vulnerable_comments' => true,
        'proposed_study_acceptable' => true,
        'study_plan_comments' => true,
        'imp_acceptable' => true,
        'imp_other' => true,
        'imp_comments' => true,
        'comparator_usage' => true,
        'comparator_comments' => true,
        'comparator_smpc' => true,
        'comparator_international' => true,
        'comparator_publications' => true,
        'comparator_acceptable' => true,
        'comparator_workspace_comments' => true,
        'placebo_usage' => true,
        'placebo_justified' => true,
        'placebo_comments' => true,
        'auxiliary_usage' => true,
        'auxiliary_justified' => true,
        'auxiliary_comments' => true,
        'medical_device_justified' => true,
        'medical_device_comments' => true,
        'associated_risks_comments' => true,
        'emergency_procedure_justified' => true,
        'additional_measures' => true,
        'unbinding_comments' => true,
        'teratogenicity_risk' => true,
        'contraceptive_acceptable' => true,
        'proposal_insufficient' => true,
        'proposal_comments' => true,
        'male_participants' => true,
        'male_participants_comments' => true,
        'contraception_treatment' => true,
        'contraception_treatment_comments' => true,
        'other_issue_comments' => true,
        'pregnancy_interval' => true,
        'pregnancy_interval_comments' => true,
        'pregnancy_test' => true,
        'pregnancy_test_comments' => true,
        'postmenopausal' => true,
        'postmenopausal_comments' => true,
        'other_issue' => true,
        'general_contraception_comments' => true,
        'discontinuation_criteria' => true,
        'criteria_acceptable' => true,
        'termination_criteria_acceptable' => true,
        'discontinuation_comments' => true,
        'permitted_concomitant' => true,
        'prohibited_concomitant' => true,
        'concomitant_comments' => true,
        'procedures_adequate' => true,
        'insufficient_frequency' => true,
        'frequency_comments' => true,
        'relevant_targets' => true,
        'relevant_targets_comments' => true,
        'minimization_measures' => true,
        'minimization_measures_comments' => true,
        'risk_unacceptable' => true,
        'risk_unacceptable_comments' => true,
        'insufficient_followup' => true,
        'insufficient_followup_comments' => true,
        'other_safety' => true,
        'other_safety_comments' => true,
        'rsi_included' => true,
        'acceptable_document' => true,
        'acceptable_format' => true,
        'expected_acceptable' => true,
        'general_irs_comments' => true,
        'general_safety_comments' => true,
        'dsmc_committee' => true,
        'arrangements_acceptable' => true,
        'dsmc_comments' => true,
        'trial_definition_acceptable' => true,
        'trial_definition_comments' => true,
        'collection_unacceptable' => true,
        'collection_unacceptable_comments' => true,
        'data_policies_acceptable' => true,
        'data_policies_acceptable_comments' => true,
        'unauthorised_unacceptable' => true,
        'unauthorised_unacceptable_comments' => true,
        'measures_unacceptable' => true,
        'measures_unacceptable_comments' => true,
        'breach_unacceptable' => true,
        'breach_unacceptable_comments' => true,
        'other_protection' => true,
        'other_protection_comments' => true,
        'data_protection_comments' => true,
        'recruitment_unacceptable' => true,
        'recruitment_unacceptable_comments' => true,
        'recruitment_comments' => true,
        'risk_evaluation_unacceptable' => true,
        'participants_protection_acceptable' => true,
        'condition_unmonitored' => true,
        'condition_unmonitored_comments' => true,
        'unsafeguarded_rights' => true,
        'unsafeguarded_rights_comments' => true,
        'unmonitored_threshold' => true,
        'unmonitored_threshold_comments' => true,
        'risk_assessment_comments' => true,
        'application_acceptable' => true,
        'application_acceptable_comments' => true,
        'supplementary_required' => true,
        'supplementary_required_comments' => true,
        'overal_assessment_comments' => true,
        'chosen' => true,
        'submitted' => true,
        'deleted' => true,
        'created' => true,
        'assessor_discussion' => true,
        'additional' => true,
        'application' => true,
        'user' => true,
        'clinical' => true,
        'clinical_edits' => true
    ];
}

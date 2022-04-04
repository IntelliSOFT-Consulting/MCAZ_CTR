<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clinical Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $evaluation_id
 * @property int $user_id
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
 * @property string $assessor_discussion
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
 * @property string $adolescents_age_group
 * @property bool $study_elderly
 * @property bool $study_male
 * @property bool $study_female
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
 * @property bool $proposal_insufficient
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
 * @property string $prohibited_concomitant
 * @property string $concomitant_comments
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\Evaluation $evaluation
 * @property \App\Model\Entity\User $user
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
        'evaluation_id' => true,
        'user_id' => true,
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
        'assessor_discussion' => true,
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
        'adolescents_age_group' => true,
        'study_elderly' => true,
        'study_male' => true,
        'study_female' => true,
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
        'application' => true,
        'evaluation' => true,
        'user' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evaluation Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $application_id
 * @property string $vulnerable_population
 * @property string $justification_adequate
 * @property string $adequate_provisions
 * @property string $vulnerable_population_comments
 * @property string $rationale_stated
 * @property string $hypothesis_explained
 * @property string $design_sound
 * @property string $criteria_complete
 * @property string $subject_allocation
 * @property string $procedures_appropriate
 * @property string $drugs_described
 * @property string $appropriate_criteria
 * @property string $clinical_procedures
 * @property string $laboratory_tests
 * @property string $statistical_basis
 * @property string $scientific_issues_comments
 * @property string $information_sheet
 * @property string $proposed_study
 * @property string $explain_study
 * @property string $research_duration
 * @property string $full_description
 * @property string $nature_discomfort
 * @property string $possible_benefits
 * @property string $outline_procedure
 * @property string $conveyed_persons
 * @property string $participation_voluntary
 * @property string $compensation_provided
 * @property string $alternatives_participation
 * @property string $contact_research
 * @property string $subjects_illiterate
 * @property string $conclude_statement
 * @property string $cost_participants
 * @property string $incapable_consent
 * @property string $research_outcome
 * @property string $informed_consent_text
 * @property string $recruitment_material
 * @property string $material_claims
 * @property string $promises_inappropriate
 * @property string $study_questionnaires
 * @property string $attached_proposal
 * @property string $lay_language
 * @property string $relevant_answer
 * @property string $worded_sensitively
 * @property string $consent_information
 * @property string $embarrassing_questions
 * @property string $consent_participant
 * @property string $describe_confidentiality
 * @property string $interview_focus
 * @property string $tapes_stored
 * @property string $other_materials_comments
 * @property string $there_placebo
 * @property string $new_drug
 * @property string $new_medicine
 * @property string $certificate_submitted
 * @property string $medicines_registered
 * @property string $adr_attached
 * @property string $dsmb_established
 * @property string $names_dsmb
 * @property string $clinical_trials_text
 * @property string $biological_materials
 * @property string $consent_volume
 * @property string $consent_procedure
 * @property string $consent_describe
 * @property string $consent_provision
 * @property string $consent_specimens
 * @property string $proposal_specimens
 * @property string $insurance_cover
 * @property string $sponsor_sign
 * @property string $sign_gcp
 * @property string $run_study
 * @property string $cvs_submitted
 * @property string $ethics_letter
 * @property string $biological_materials_comments
 * @property string $recommendations
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Application $application
 */
class Evaluation extends Entity
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

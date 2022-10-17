<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clinicals Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Clinical get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clinical newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Clinical[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clinical|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clinical patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clinical[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clinical findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClinicalsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('clinicals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('sponsor_justification')
            ->maxLength('sponsor_justification', 4294967295)
            ->allowEmpty('sponsor_justification');

        $validator
            ->scalar('sponsor_comment')
            ->maxLength('sponsor_comment', 4294967295)
            ->allowEmpty('sponsor_comment');

        $validator
            ->scalar('low_intervention')
            ->maxLength('low_intervention', 255)
            ->allowEmpty('low_intervention');

        $validator
            ->scalar('evidence_based')
            ->maxLength('evidence_based', 255)
            ->allowEmpty('evidence_based');

        $validator
            ->scalar('products_authorised')
            ->maxLength('products_authorised', 255)
            ->allowEmpty('products_authorised');

        $validator
            ->scalar('poses_risk')
            ->maxLength('poses_risk', 255)
            ->allowEmpty('poses_risk');

        $validator
            ->scalar('posed_risks_comment')
            ->maxLength('posed_risks_comment', 4294967295)
            ->allowEmpty('posed_risks_comment');

        $validator
            ->scalar('trial_phase')
            ->maxLength('trial_phase', 4294967295)
            ->allowEmpty('trial_phase');

        $validator
            ->scalar('therapeutic_condition')
            ->maxLength('therapeutic_condition', 4294967295)
            ->allowEmpty('therapeutic_condition');

        $validator
            ->scalar('action_mechanism')
            ->maxLength('action_mechanism', 4294967295)
            ->allowEmpty('action_mechanism');

        $validator
            ->scalar('development_status')
            ->maxLength('development_status', 4294967295)
            ->allowEmpty('development_status');

        $validator
            ->scalar('rationale_acceptable')
            ->maxLength('rationale_acceptable', 255)
            ->allowEmpty('rationale_acceptable');

        $validator
            ->scalar('objective_acceptable')
            ->maxLength('objective_acceptable', 255)
            ->requirePresence('objective_acceptable', 'create')
            ->notEmpty('objective_acceptable');

        $validator
            ->scalar('endpoint_acceptable')
            ->maxLength('endpoint_acceptable', 255)
            ->allowEmpty('endpoint_acceptable');

        $validator
            ->scalar('objective_comments')
            ->maxLength('objective_comments', 4294967295)
            ->allowEmpty('objective_comments');

        $validator
            ->scalar('secondary_objective_acceptable')
            ->maxLength('secondary_objective_acceptable', 255)
            ->allowEmpty('secondary_objective_acceptable');

        $validator
            ->scalar('secondary_endpoint_acceptable')
            ->maxLength('secondary_endpoint_acceptable', 255)
            ->allowEmpty('secondary_endpoint_acceptable');

        $validator
            ->scalar('secondary_objective_comments')
            ->maxLength('secondary_objective_comments', 4294967295)
            ->allowEmpty('secondary_objective_comments');

        $validator
            ->boolean('study_health_participants')
            ->allowEmpty('study_health_participants');

        $validator
            ->boolean('study_participants')
            ->allowEmpty('study_participants');

        $validator
            ->boolean('study_adults')
            ->allowEmpty('study_adults');

        $validator
            ->boolean('study_adolescent')
            ->allowEmpty('study_adolescent');

        $validator
            ->boolean('study_elderly')
            ->allowEmpty('study_elderly');

        $validator
            ->boolean('study_male')
            ->allowEmpty('study_male');

        $validator
            ->boolean('study_female')
            ->allowEmpty('study_female');

        $validator
            ->scalar('adolescents_age_group')
            ->maxLength('adolescents_age_group', 255)
            ->requirePresence('adolescents_age_group', 'create')
            ->notEmpty('adolescents_age_group');

        $validator
            ->scalar('potential_contraception')
            ->maxLength('potential_contraception', 255)
            ->requirePresence('potential_contraception', 'create')
            ->notEmpty('potential_contraception');

        $validator
            ->scalar('potential_none_contraception')
            ->maxLength('potential_none_contraception', 255)
            ->requirePresence('potential_none_contraception', 'create')
            ->notEmpty('potential_none_contraception');

        $validator
            ->scalar('study_population_comments')
            ->maxLength('study_population_comments', 4294967295)
            ->allowEmpty('study_population_comments');

        $validator
            ->scalar('inclusion_acceptable')
            ->maxLength('inclusion_acceptable', 255)
            ->allowEmpty('inclusion_acceptable');

        $validator
            ->scalar('inclusion_comments')
            ->maxLength('inclusion_comments', 4294967295)
            ->allowEmpty('inclusion_comments');

        $validator
            ->scalar('exclusion_acceptable')
            ->maxLength('exclusion_acceptable', 255)
            ->allowEmpty('exclusion_acceptable');

        $validator
            ->scalar('exclusion_comments')
            ->maxLength('exclusion_comments', 4294967295)
            ->allowEmpty('exclusion_comments');

        $validator
            ->scalar('vulnerable_population')
            ->maxLength('vulnerable_population', 255)
            ->allowEmpty('vulnerable_population');

        $validator
            ->scalar('justifiable_population')
            ->maxLength('justifiable_population', 255)
            ->allowEmpty('justifiable_population');

        $validator
            ->scalar('clinical_benefit')
            ->maxLength('clinical_benefit', 255)
            ->allowEmpty('clinical_benefit');

        $validator
            ->scalar('vulnerable_comments')
            ->maxLength('vulnerable_comments', 4294967295)
            ->allowEmpty('vulnerable_comments');

        $validator
            ->scalar('proposed_study_acceptable')
            ->maxLength('proposed_study_acceptable', 4294967295)
            ->allowEmpty('proposed_study_acceptable');

        $validator
            ->scalar('study_plan_comments')
            ->maxLength('study_plan_comments', 4294967295)
            ->allowEmpty('study_plan_comments');

        $validator
            ->scalar('imp_acceptable')
            ->maxLength('imp_acceptable', 255)
            ->allowEmpty('imp_acceptable');

        $validator
            ->scalar('imp_other')
            ->maxLength('imp_other', 4294967295)
            ->allowEmpty('imp_other');

        $validator
            ->scalar('imp_comments')
            ->maxLength('imp_comments', 4294967295)
            ->allowEmpty('imp_comments');

        $validator
            ->scalar('comparator_usage')
            ->maxLength('comparator_usage', 255)
            ->allowEmpty('comparator_usage');

        $validator
            ->scalar('comparator_comments')
            ->maxLength('comparator_comments', 4294967295)
            ->allowEmpty('comparator_comments');

        $validator
            ->boolean('comparator_smpc')
            ->allowEmpty('comparator_smpc');

        $validator
            ->boolean('comparator_international')
            ->allowEmpty('comparator_international');

        $validator
            ->boolean('comparator_publications')
            ->allowEmpty('comparator_publications');

        $validator
            ->scalar('comparator_acceptable')
            ->maxLength('comparator_acceptable', 255)
            ->allowEmpty('comparator_acceptable');

        $validator
            ->scalar('comparator_workspace_comments')
            ->maxLength('comparator_workspace_comments', 4294967295)
            ->allowEmpty('comparator_workspace_comments');

        $validator
            ->scalar('placebo_usage')
            ->maxLength('placebo_usage', 255)
            ->allowEmpty('placebo_usage');

        $validator
            ->scalar('placebo_justified')
            ->maxLength('placebo_justified', 255)
            ->allowEmpty('placebo_justified');

        $validator
            ->scalar('placebo_comments')
            ->maxLength('placebo_comments', 4294967295)
            ->allowEmpty('placebo_comments');

        $validator
            ->scalar('auxiliary_usage')
            ->maxLength('auxiliary_usage', 255)
            ->allowEmpty('auxiliary_usage');

        $validator
            ->scalar('auxiliary_justified')
            ->maxLength('auxiliary_justified', 255)
            ->allowEmpty('auxiliary_justified');

        $validator
            ->scalar('auxiliary_comments')
            ->maxLength('auxiliary_comments', 4294967295)
            ->allowEmpty('auxiliary_comments');

        $validator
            ->scalar('medical_device_justified')
            ->maxLength('medical_device_justified', 255)
            ->allowEmpty('medical_device_justified');

        $validator
            ->scalar('medical_device_comments')
            ->maxLength('medical_device_comments', 4294967295)
            ->allowEmpty('medical_device_comments');

        $validator
            ->scalar('associated_risks_comments')
            ->maxLength('associated_risks_comments', 4294967295)
            ->allowEmpty('associated_risks_comments');

        $validator
            ->scalar('emergency_procedure_justified')
            ->maxLength('emergency_procedure_justified', 255)
            ->allowEmpty('emergency_procedure_justified');

        $validator
            ->scalar('additional_measures')
            ->maxLength('additional_measures', 255)
            ->allowEmpty('additional_measures');

        $validator
            ->scalar('unbinding_comments')
            ->maxLength('unbinding_comments', 4294967295)
            ->allowEmpty('unbinding_comments');

        $validator
            ->scalar('teratogenicity_risk')
            ->maxLength('teratogenicity_risk', 255)
            ->allowEmpty('teratogenicity_risk');

        $validator
            ->scalar('contraceptive_acceptable')
            ->maxLength('contraceptive_acceptable', 255)
            ->allowEmpty('contraceptive_acceptable');

        $validator
            ->scalar('proposal_insufficient')
            ->maxLength('proposal_insufficient', 255)
            ->allowEmpty('proposal_insufficient');

        $validator
            ->scalar('proposal_comments')
            ->maxLength('proposal_comments', 4294967295)
            ->allowEmpty('proposal_comments');

        $validator
            ->boolean('male_participants')
            ->allowEmpty('male_participants');

        $validator
            ->scalar('male_participants_comments')
            ->maxLength('male_participants_comments', 4294967295)
            ->allowEmpty('male_participants_comments');

        $validator
            ->boolean('contraception_treatment')
            ->allowEmpty('contraception_treatment');

        $validator
            ->scalar('contraception_treatment_comments')
            ->maxLength('contraception_treatment_comments', 4294967295)
            ->allowEmpty('contraception_treatment_comments');

        $validator
            ->scalar('other_issue_comments')
            ->maxLength('other_issue_comments', 4294967295)
            ->allowEmpty('other_issue_comments');

        $validator
            ->boolean('pregnancy_interval')
            ->allowEmpty('pregnancy_interval');

        $validator
            ->scalar('pregnancy_interval_comments')
            ->maxLength('pregnancy_interval_comments', 4294967295)
            ->allowEmpty('pregnancy_interval_comments');

        $validator
            ->boolean('pregnancy_test')
            ->allowEmpty('pregnancy_test');

        $validator
            ->scalar('pregnancy_test_comments')
            ->maxLength('pregnancy_test_comments', 4294967295)
            ->allowEmpty('pregnancy_test_comments');

        $validator
            ->boolean('postmenopausal')
            ->allowEmpty('postmenopausal');

        $validator
            ->scalar('postmenopausal_comments')
            ->maxLength('postmenopausal_comments', 4294967295)
            ->allowEmpty('postmenopausal_comments');

        $validator
            ->boolean('other_issue')
            ->allowEmpty('other_issue');

        $validator
            ->scalar('general_contraception_comments')
            ->maxLength('general_contraception_comments', 4294967295)
            ->allowEmpty('general_contraception_comments');

        $validator
            ->scalar('discontinuation_criteria')
            ->maxLength('discontinuation_criteria', 255)
            ->allowEmpty('discontinuation_criteria');

        $validator
            ->scalar('criteria_acceptable')
            ->maxLength('criteria_acceptable', 255)
            ->allowEmpty('criteria_acceptable');

        $validator
            ->scalar('termination_criteria_acceptable')
            ->maxLength('termination_criteria_acceptable', 4294967295)
            ->allowEmpty('termination_criteria_acceptable');

        $validator
            ->scalar('discontinuation_comments')
            ->maxLength('discontinuation_comments', 4294967295)
            ->allowEmpty('discontinuation_comments');

        $validator
            ->scalar('permitted_concomitant')
            ->maxLength('permitted_concomitant', 255)
            ->allowEmpty('permitted_concomitant');

        $validator
            ->boolean('prohibited_concomitant')
            ->allowEmpty('prohibited_concomitant');

        $validator
            ->scalar('concomitant_comments')
            ->maxLength('concomitant_comments', 4294967295)
            ->allowEmpty('concomitant_comments');

        $validator
            ->boolean('procedures_adequate')
            ->allowEmpty('procedures_adequate');

        $validator
            ->boolean('insufficient_frequency')
            ->allowEmpty('insufficient_frequency');

        $validator
            ->scalar('frequency_comments')
            ->maxLength('frequency_comments', 4294967295)
            ->allowEmpty('frequency_comments');

        $validator
            ->boolean('relevant_targets')
            ->allowEmpty('relevant_targets');

        $validator
            ->scalar('relevant_targets_comments')
            ->maxLength('relevant_targets_comments', 4294967295)
            ->allowEmpty('relevant_targets_comments');

        $validator
            ->boolean('minimization_measures')
            ->allowEmpty('minimization_measures');

        $validator
            ->scalar('minimization_measures_comments')
            ->maxLength('minimization_measures_comments', 4294967295)
            ->allowEmpty('minimization_measures_comments');

        $validator
            ->boolean('risk_unacceptable')
            ->allowEmpty('risk_unacceptable');

        $validator
            ->scalar('risk_unacceptable_comments')
            ->maxLength('risk_unacceptable_comments', 4294967295)
            ->allowEmpty('risk_unacceptable_comments');

        $validator
            ->boolean('insufficient_followup')
            ->allowEmpty('insufficient_followup');

        $validator
            ->scalar('insufficient_followup_comments')
            ->maxLength('insufficient_followup_comments', 4294967295)
            ->allowEmpty('insufficient_followup_comments');

        $validator
            ->boolean('other_safety')
            ->allowEmpty('other_safety');

        $validator
            ->scalar('other_safety_comments')
            ->maxLength('other_safety_comments', 4294967295)
            ->allowEmpty('other_safety_comments');

        $validator
            ->scalar('rsi_included')
            ->maxLength('rsi_included', 255)
            ->allowEmpty('rsi_included');

        $validator
            ->scalar('acceptable_document')
            ->maxLength('acceptable_document', 255)
            ->allowEmpty('acceptable_document');

        $validator
            ->scalar('acceptable_format')
            ->maxLength('acceptable_format', 255)
            ->allowEmpty('acceptable_format');

        $validator
            ->scalar('expected_acceptable')
            ->maxLength('expected_acceptable', 255)
            ->allowEmpty('expected_acceptable');

        $validator
            ->scalar('general_irs_comments')
            ->maxLength('general_irs_comments', 4294967295)
            ->allowEmpty('general_irs_comments');

        $validator
            ->scalar('general_safety_comments')
            ->maxLength('general_safety_comments', 4294967295)
            ->allowEmpty('general_safety_comments');

        $validator
            ->scalar('dsmc_committee')
            ->maxLength('dsmc_committee', 255)
            ->allowEmpty('dsmc_committee');

        $validator
            ->scalar('arrangements_acceptable')
            ->maxLength('arrangements_acceptable', 255)
            ->allowEmpty('arrangements_acceptable');

        $validator
            ->scalar('dsmc_comments')
            ->maxLength('dsmc_comments', 4294967295)
            ->allowEmpty('dsmc_comments');

        $validator
            ->scalar('trial_definition_acceptable')
            ->maxLength('trial_definition_acceptable', 255)
            ->allowEmpty('trial_definition_acceptable');

        $validator
            ->scalar('trial_definition_comments')
            ->maxLength('trial_definition_comments', 4294967295)
            ->allowEmpty('trial_definition_comments');

        $validator
            ->scalar('collection_unacceptable')
            ->maxLength('collection_unacceptable', 255)
            ->allowEmpty('collection_unacceptable');

        $validator
            ->scalar('collection_unacceptable_comments')
            ->maxLength('collection_unacceptable_comments', 4294967295)
            ->allowEmpty('collection_unacceptable_comments');

        $validator
            ->boolean('data_policies_acceptable')
            ->allowEmpty('data_policies_acceptable');

        $validator
            ->scalar('data_policies_acceptable_comments')
            ->maxLength('data_policies_acceptable_comments', 4294967295)
            ->allowEmpty('data_policies_acceptable_comments');

        $validator
            ->boolean('unauthorised_unacceptable')
            ->allowEmpty('unauthorised_unacceptable');

        $validator
            ->scalar('unauthorised_unacceptable_comments')
            ->maxLength('unauthorised_unacceptable_comments', 4294967295)
            ->allowEmpty('unauthorised_unacceptable_comments');

        $validator
            ->boolean('measures_unacceptable')
            ->allowEmpty('measures_unacceptable');

        $validator
            ->scalar('measures_unacceptable_comments')
            ->maxLength('measures_unacceptable_comments', 4294967295)
            ->allowEmpty('measures_unacceptable_comments');

        $validator
            ->boolean('breach_unacceptable')
            ->allowEmpty('breach_unacceptable');

        $validator
            ->scalar('breach_unacceptable_comments')
            ->maxLength('breach_unacceptable_comments', 4294967295)
            ->allowEmpty('breach_unacceptable_comments');

        $validator
            ->boolean('other_protection')
            ->allowEmpty('other_protection');

        $validator
            ->scalar('other_protection_comments')
            ->maxLength('other_protection_comments', 4294967295)
            ->allowEmpty('other_protection_comments');

        $validator
            ->scalar('data_protection_comments')
            ->maxLength('data_protection_comments', 4294967295)
            ->allowEmpty('data_protection_comments');

        $validator
            ->boolean('recruitment_unacceptable')
            ->allowEmpty('recruitment_unacceptable');

        $validator
            ->scalar('recruitment_unacceptable_comments')
            ->maxLength('recruitment_unacceptable_comments', 4294967295)
            ->allowEmpty('recruitment_unacceptable_comments');

        $validator
            ->scalar('recruitment_comments')
            ->maxLength('recruitment_comments', 4294967295)
            ->allowEmpty('recruitment_comments');

        $validator
            ->scalar('risk_evaluation_unacceptable')
            ->maxLength('risk_evaluation_unacceptable', 255)
            ->allowEmpty('risk_evaluation_unacceptable');

        $validator
            ->scalar('participants_protection_acceptable')
            ->maxLength('participants_protection_acceptable', 255)
            ->allowEmpty('participants_protection_acceptable');

        $validator
            ->boolean('condition_unmonitored')
            ->allowEmpty('condition_unmonitored');

        $validator
            ->scalar('condition_unmonitored_comments')
            ->maxLength('condition_unmonitored_comments', 4294967295)
            ->allowEmpty('condition_unmonitored_comments');

        $validator
            ->boolean('unsafeguarded_rights')
            ->allowEmpty('unsafeguarded_rights');

        $validator
            ->scalar('unsafeguarded_rights_comments')
            ->maxLength('unsafeguarded_rights_comments', 4294967295)
            ->allowEmpty('unsafeguarded_rights_comments');

        $validator
            ->boolean('unmonitored_threshold')
            ->allowEmpty('unmonitored_threshold');

        $validator
            ->scalar('unmonitored_threshold_comments')
            ->maxLength('unmonitored_threshold_comments', 4294967295)
            ->allowEmpty('unmonitored_threshold_comments');

        $validator
            ->scalar('risk_assessment_comments')
            ->maxLength('risk_assessment_comments', 4294967295)
            ->allowEmpty('risk_assessment_comments');

        $validator
            ->boolean('application_acceptable')
            ->allowEmpty('application_acceptable');

        $validator
            ->scalar('application_acceptable_comments')
            ->maxLength('application_acceptable_comments', 4294967295)
            ->allowEmpty('application_acceptable_comments');

        $validator
            ->boolean('supplementary_required')
            ->allowEmpty('supplementary_required');

        $validator
            ->scalar('supplementary_required_comments')
            ->maxLength('supplementary_required_comments', 4294967295)
            ->allowEmpty('supplementary_required_comments');

        $validator
            ->scalar('overal_assessment_comments')
            ->maxLength('overal_assessment_comments', 4294967295)
            ->allowEmpty('overal_assessment_comments');

        $validator
            ->integer('chosen')
            ->allowEmpty('chosen');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->scalar('assessor_discussion')
            ->maxLength('assessor_discussion', 4294967295)
            ->allowEmpty('assessor_discussion');

        $validator
            ->scalar('additional')
            ->maxLength('additional', 4294967295)
            ->allowEmpty('additional');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['application_id'], 'Applications'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

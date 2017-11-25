<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Saefis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\SaefiListOfVaccinesTable|\Cake\ORM\Association\HasMany $SaefiListOfVaccines
 *
 * @method \App\Model\Entity\Saefi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Saefi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Saefi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Saefi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Saefi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Saefi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Saefi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SaefisTable extends Table
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

        $this->setTable('saefis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->hasMany('SaefiListOfVaccines', [
            'foreignKey' => 'saefi_id'
        ]);

        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Saefis', 'Attachments.category' => 'attachments'),
        ]);
        $this->hasMany('Reports', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reports.model' => 'Saefis', 'Reports.category' => 'reports'),
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
            ->scalar('basic_details')
            ->allowEmpty('basic_details');

        $validator
            ->scalar('place_vaccination')
            ->allowEmpty('place_vaccination');

        $validator
            ->scalar('place_vaccination_other')
            ->allowEmpty('place_vaccination_other');

        $validator
            ->scalar('site_type')
            ->allowEmpty('site_type');

        $validator
            ->scalar('site_type_other')
            ->allowEmpty('site_type_other');

        $validator
            ->scalar('vaccination_in')
            ->allowEmpty('vaccination_in');

        $validator
            ->scalar('vaccination_in_other')
            ->allowEmpty('vaccination_in_other');

        $validator
            ->scalar('reporter_name')
            ->allowEmpty('reporter_name');

        $validator
            ->date('report_date')
            ->allowEmpty('report_date');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('complete_date')
            ->allowEmpty('complete_date');

        $validator
            ->scalar('telephone')
            ->allowEmpty('telephone');

        $validator
            ->scalar('mobile')
            ->allowEmpty('mobile');

        $validator
            ->scalar('reporter_email')
            ->allowEmpty('reporter_email');

        $validator
            ->scalar('patient_name')
            ->allowEmpty('patient_name');

        $validator
            ->scalar('gender')
            ->allowEmpty('gender');

        $validator
            ->date('hospitalization_date')
            ->allowEmpty('hospitalization_date');

        $validator
            ->scalar('status_on_date')
            ->allowEmpty('status_on_date');

        $validator
            ->dateTime('died_date')
            ->allowEmpty('died_date');

        $validator
            ->scalar('autopsy_done')
            ->allowEmpty('autopsy_done');

        $validator
            ->date('autopsy_done_date')
            ->allowEmpty('autopsy_done_date');

        $validator
            ->scalar('autopsy_planned')
            ->allowEmpty('autopsy_planned');

        $validator
            ->dateTime('autopsy_planned_date')
            ->allowEmpty('autopsy_planned_date');

        $validator
            ->scalar('past_history')
            ->allowEmpty('past_history');

        $validator
            ->scalar('past_history_remarks')
            ->allowEmpty('past_history_remarks');

        $validator
            ->scalar('adverse_event')
            ->allowEmpty('adverse_event');

        $validator
            ->scalar('adverse_event_remarks')
            ->allowEmpty('adverse_event_remarks');

        $validator
            ->scalar('allergy_history')
            ->allowEmpty('allergy_history');

        $validator
            ->scalar('allergy_history_remarks')
            ->allowEmpty('allergy_history_remarks');

        $validator
            ->scalar('existing_illness')
            ->allowEmpty('existing_illness');

        $validator
            ->scalar('existing_illness_remarks')
            ->allowEmpty('existing_illness_remarks');

        $validator
            ->scalar('hospitalization_history')
            ->allowEmpty('hospitalization_history');

        $validator
            ->scalar('hospitalization_history_remarks')
            ->allowEmpty('hospitalization_history_remarks');

        $validator
            ->scalar('medication_vaccination')
            ->allowEmpty('medication_vaccination');

        $validator
            ->scalar('medication_vaccination_remarks')
            ->allowEmpty('medication_vaccination_remarks');

        $validator
            ->scalar('faith_healers')
            ->allowEmpty('faith_healers');

        $validator
            ->scalar('faith_healers_remarks')
            ->allowEmpty('faith_healers_remarks');

        $validator
            ->scalar('family_history')
            ->allowEmpty('family_history');

        $validator
            ->scalar('family_history_remarks')
            ->allowEmpty('family_history_remarks');

        $validator
            ->scalar('pregnant')
            ->allowEmpty('pregnant');

        $validator
            ->scalar('pregnant_weeks')
            ->allowEmpty('pregnant_weeks');

        $validator
            ->scalar('breastfeeding')
            ->allowEmpty('breastfeeding');

        $validator
            ->scalar('infant')
            ->allowEmpty('infant');

        $validator
            ->integer('birth_weight')
            ->allowEmpty('birth_weight');

        $validator
            ->scalar('delivery_procedure')
            ->allowEmpty('delivery_procedure');

        $validator
            ->scalar('delivery_procedure_specify')
            ->allowEmpty('delivery_procedure_specify');

        $validator
            ->boolean('source_examination')
            ->allowEmpty('source_examination');

        $validator
            ->boolean('source_documents')
            ->allowEmpty('source_documents');

        $validator
            ->boolean('source_verbal')
            ->allowEmpty('source_verbal');

        $validator
            ->scalar('verbal_source')
            ->allowEmpty('verbal_source');

        $validator
            ->boolean('source_other')
            ->allowEmpty('source_other');

        $validator
            ->scalar('source_other_specify')
            ->allowEmpty('source_other_specify');

        $validator
            ->scalar('examiner_name')
            ->allowEmpty('examiner_name');

        $validator
            ->scalar('other_sources')
            ->allowEmpty('other_sources');

        $validator
            ->scalar('signs_symptoms')
            ->allowEmpty('signs_symptoms');

        $validator
            ->scalar('person_designation')
            ->allowEmpty('person_designation');

        $validator
            ->dateTime('person_date')
            ->allowEmpty('person_date');

        $validator
            ->scalar('when_vaccinated')
            ->allowEmpty('when_vaccinated');

        $validator
            ->scalar('when_vaccinated_specify')
            ->allowEmpty('when_vaccinated_specify');

        $validator
            ->scalar('prescribing_error')
            ->allowEmpty('prescribing_error');

        $validator
            ->scalar('prescribing_error_specify')
            ->allowEmpty('prescribing_error_specify');

        $validator
            ->scalar('vaccine_unsterile')
            ->allowEmpty('vaccine_unsterile');

        $validator
            ->scalar('vaccine_unsterile_specify')
            ->allowEmpty('vaccine_unsterile_specify');

        $validator
            ->scalar('vaccine_condition')
            ->allowEmpty('vaccine_condition');

        $validator
            ->scalar('vaccine_condition_specify')
            ->allowEmpty('vaccine_condition_specify');

        $validator
            ->scalar('vaccine_reconstitution')
            ->allowEmpty('vaccine_reconstitution');

        $validator
            ->scalar('vaccine_reconstitution_specify')
            ->allowEmpty('vaccine_reconstitution_specify');

        $validator
            ->scalar('vaccine_handling')
            ->allowEmpty('vaccine_handling');

        $validator
            ->scalar('vaccine_handling_specify')
            ->allowEmpty('vaccine_handling_specify');

        $validator
            ->scalar('vaccine_administered')
            ->allowEmpty('vaccine_administered');

        $validator
            ->scalar('vaccine_administered_specify')
            ->allowEmpty('vaccine_administered_specify');

        $validator
            ->integer('vaccinated_vial')
            ->allowEmpty('vaccinated_vial');

        $validator
            ->integer('vaccinated_session')
            ->allowEmpty('vaccinated_session');

        $validator
            ->integer('vaccinated_locations')
            ->allowEmpty('vaccinated_locations');

        $validator
            ->scalar('vaccinated_locations_specify')
            ->allowEmpty('vaccinated_locations_specify');

        $validator
            ->scalar('vaccinated_cluster')
            ->allowEmpty('vaccinated_cluster');

        $validator
            ->integer('vaccinated_cluster_number')
            ->allowEmpty('vaccinated_cluster_number');

        $validator
            ->scalar('vaccinated_cluster_vial')
            ->allowEmpty('vaccinated_cluster_vial');

        $validator
            ->integer('vaccinated_cluster_vial_number')
            ->allowEmpty('vaccinated_cluster_vial_number');

        $validator
            ->scalar('syringes_used')
            ->allowEmpty('syringes_used');

        $validator
            ->scalar('syringes_used_specify')
            ->allowEmpty('syringes_used_specify');

        $validator
            ->scalar('syringes_used_other')
            ->allowEmpty('syringes_used_other');

        $validator
            ->scalar('syringes_used_findings')
            ->allowEmpty('syringes_used_findings');

        $validator
            ->scalar('reconstitution_multiple')
            ->allowEmpty('reconstitution_multiple');

        $validator
            ->scalar('reconstitution_different')
            ->allowEmpty('reconstitution_different');

        $validator
            ->scalar('reconstitution_vial')
            ->allowEmpty('reconstitution_vial');

        $validator
            ->scalar('reconstitution_syringe')
            ->allowEmpty('reconstitution_syringe');

        $validator
            ->scalar('reconstitution_vaccines')
            ->allowEmpty('reconstitution_vaccines');

        $validator
            ->scalar('reconstitution_observations')
            ->allowEmpty('reconstitution_observations');

        $validator
            ->scalar('cold_temperature')
            ->allowEmpty('cold_temperature');

        $validator
            ->scalar('cold_temperature_deviation')
            ->allowEmpty('cold_temperature_deviation');

        $validator
            ->scalar('cold_temperature_specify')
            ->allowEmpty('cold_temperature_specify');

        $validator
            ->scalar('procedure_followed')
            ->allowEmpty('procedure_followed');

        $validator
            ->scalar('other_items')
            ->allowEmpty('other_items');

        $validator
            ->scalar('partial_vaccines')
            ->allowEmpty('partial_vaccines');

        $validator
            ->scalar('unusable_vaccines')
            ->allowEmpty('unusable_vaccines');

        $validator
            ->scalar('unusable_diluents')
            ->allowEmpty('unusable_diluents');

        $validator
            ->scalar('additional_observations')
            ->allowEmpty('additional_observations');

        $validator
            ->scalar('cold_transportation')
            ->allowEmpty('cold_transportation');

        $validator
            ->scalar('vaccine_carrier')
            ->allowEmpty('vaccine_carrier');

        $validator
            ->scalar('coolant_packs')
            ->allowEmpty('coolant_packs');

        $validator
            ->scalar('transport_findings')
            ->allowEmpty('transport_findings');

        $validator
            ->scalar('similar_events')
            ->allowEmpty('similar_events');

        $validator
            ->scalar('similar_events_describe')
            ->allowEmpty('similar_events_describe');

        $validator
            ->integer('similar_events_episodes')
            ->allowEmpty('similar_events_episodes');

        $validator
            ->integer('affected_vaccinated')
            ->allowEmpty('affected_vaccinated');

        $validator
            ->integer('affected_not_vaccinated')
            ->allowEmpty('affected_not_vaccinated');

        $validator
            ->scalar('affected_unknown')
            ->allowEmpty('affected_unknown');

        $validator
            ->scalar('community_comments')
            ->allowEmpty('community_comments');

        $validator
            ->scalar('relevant_findings')
            ->allowEmpty('relevant_findings');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));

        return $rules;
    }
}

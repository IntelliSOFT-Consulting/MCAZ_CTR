<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adrs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\AdrLabTestsTable|\Cake\ORM\Association\HasMany $AdrLabTests
 * @property \App\Model\Table\AdrListOfDrugsTable|\Cake\ORM\Association\HasMany $AdrListOfDrugs
 * @property \App\Model\Table\AdrOtherDrugsTable|\Cake\ORM\Association\HasMany $AdrOtherDrugs
 *
 * @method \App\Model\Entity\Adr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adr newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adr|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adr[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adr findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdrsTable extends Table
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

        $this->setTable('adrs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->hasMany('AdrLabTests', [
            'foreignKey' => 'adr_id'
        ]);
        $this->hasMany('AdrListOfDrugs', [
            'foreignKey' => 'adr_id'
        ]);
        $this->hasMany('AdrOtherDrugs', [
            'foreignKey' => 'adr_id'
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
            ->scalar('mrcz_protocol_number')
            ->allowEmpty('mrcz_protocol_number');

        $validator
            ->scalar('mcaz_protocol_number')
            ->allowEmpty('mcaz_protocol_number');

        $validator
            ->scalar('principal_investigator')
            ->allowEmpty('principal_investigator');

        $validator
            ->scalar('reporter_name')
            ->allowEmpty('reporter_name');

        $validator
            ->scalar('reporter_email')
            ->allowEmpty('reporter_email');

        $validator
            ->scalar('reporter_phone')
            ->allowEmpty('reporter_phone');

        $validator
            ->scalar('name_of_institution')
            ->allowEmpty('name_of_institution');

        $validator
            ->scalar('institution_code')
            ->allowEmpty('institution_code');

        $validator
            ->scalar('study_title')
            ->allowEmpty('study_title');

        $validator
            ->scalar('study_sponsor')
            ->allowEmpty('study_sponsor');

        // $validator
        //     ->date('date_of_adverse_event')
        //     ->allowEmpty('date_of_adverse_event');

        $validator
            ->scalar('participant_number')
            ->allowEmpty('participant_number');

        $validator
            ->scalar('report_type')
            ->allowEmpty('report_type');

        // $validator
        //     ->date('date_of_site_awareness')
        //     ->allowEmpty('date_of_site_awareness');

        $validator
            ->scalar('date_of_birth')
            ->allowEmpty('date_of_birth');

        $validator
            ->scalar('gender')
            ->allowEmpty('gender');

        $validator
            ->scalar('study_week')
            ->allowEmpty('study_week');

        $validator
            ->scalar('visit_number')
            ->allowEmpty('visit_number');

        $validator
            ->scalar('adverse_event_type')
            ->allowEmpty('adverse_event_type');

        $validator
            ->scalar('sae_type')
            ->allowEmpty('sae_type');

        $validator
            ->scalar('sae_description')
            ->allowEmpty('sae_description');

        $validator
            ->scalar('toxicity_grade')
            ->allowEmpty('toxicity_grade');

        $validator
            ->scalar('previous_events')
            ->allowEmpty('previous_events');

        $validator
            ->scalar('previous_events_number')
            ->allowEmpty('previous_events_number');

        $validator
            ->scalar('total_saes')
            ->allowEmpty('total_saes');

        $validator
            ->scalar('location_event')
            ->allowEmpty('location_event');

        $validator
            ->scalar('location_event_specify')
            ->allowEmpty('location_event_specify');

        $validator
            ->scalar('research_involves')
            ->allowEmpty('research_involves');

        $validator
            ->scalar('research_involves_specify')
            ->allowEmpty('research_involves_specify');

        $validator
            ->scalar('name_of_drug')
            ->allowEmpty('name_of_drug');

        $validator
            ->scalar('drug_investigational')
            ->allowEmpty('drug_investigational');

        $validator
            ->scalar('patient_other_drug')
            ->allowEmpty('patient_other_drug');

        $validator
            ->scalar('report_to_mcaz')
            ->allowEmpty('report_to_mcaz');

        // $validator
        //     ->date('report_to_mcaz_date')
        //     ->allowEmpty('report_to_mcaz_date');

        $validator
            ->scalar('report_to_mrcz')
            ->allowEmpty('report_to_mrcz');

        // $validator
        //     ->date('report_to_mrcz_date')
        //     ->allowEmpty('report_to_mrcz_date');

        $validator
            ->scalar('report_to_sponsor')
            ->allowEmpty('report_to_sponsor');

        // $validator
        //     ->date('report_to_sponsor_date')
        //     ->allowEmpty('report_to_sponsor_date');

        $validator
            ->scalar('report_to_irb')
            ->allowEmpty('report_to_irb');

        // $validator
        //     ->date('report_to_irb_date')
        //     ->allowEmpty('report_to_irb_date');

        $validator
            ->scalar('medical_history')
            ->allowEmpty('medical_history');

        $validator
            ->scalar('diagnosis')
            ->allowEmpty('diagnosis');

        $validator
            ->scalar('immediate_cause')
            ->allowEmpty('immediate_cause');

        $validator
            ->scalar('symptoms')
            ->allowEmpty('symptoms');

        $validator
            ->scalar('investigations')
            ->allowEmpty('investigations');

        $validator
            ->scalar('results')
            ->allowEmpty('results');

        $validator
            ->scalar('management')
            ->allowEmpty('management');

        $validator
            ->scalar('outcome')
            ->allowEmpty('outcome');

        $validator
            ->scalar('d1_consent_form')
            ->allowEmpty('d1_consent_form');

        $validator
            ->scalar('d2_brochure')
            ->allowEmpty('d2_brochure');

        $validator
            ->scalar('d3_changes_sae')
            ->allowEmpty('d3_changes_sae');

        $validator
            ->scalar('d4_consent_sae')
            ->allowEmpty('d4_consent_sae');

        $validator
            ->scalar('changes_explain')
            ->allowEmpty('changes_explain');

        $validator
            ->scalar('assess_risk')
            ->allowEmpty('assess_risk');

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

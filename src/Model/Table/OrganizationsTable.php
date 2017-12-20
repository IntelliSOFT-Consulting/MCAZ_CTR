<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organizations Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\Organization get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organization newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Organization[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organization|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organization patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organization[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organization findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationsTable extends Table
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

        $this->setTable('organizations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
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
            ->scalar('organization')
            ->allowEmpty('organization');

        $validator
            ->scalar('contact_person')
            ->allowEmpty('contact_person');

        $validator
            ->scalar('address')
            ->allowEmpty('address');

        $validator
            ->scalar('telephone_number')
            ->allowEmpty('telephone_number');

        $validator
            ->scalar('all_tasks')
            ->allowEmpty('all_tasks');

        $validator
            ->scalar('monitoring')
            ->allowEmpty('monitoring');

        $validator
            ->scalar('regulatory')
            ->allowEmpty('regulatory');

        $validator
            ->scalar('investigator_recruitment')
            ->allowEmpty('investigator_recruitment');

        $validator
            ->scalar('ivrs_treatment_randomisation')
            ->allowEmpty('ivrs_treatment_randomisation');

        $validator
            ->scalar('data_management')
            ->allowEmpty('data_management');

        $validator
            ->scalar('e_data_capture')
            ->allowEmpty('e_data_capture');

        $validator
            ->scalar('susar_reporting')
            ->allowEmpty('susar_reporting');

        $validator
            ->scalar('quality_assurance_auditing')
            ->allowEmpty('quality_assurance_auditing');

        $validator
            ->scalar('statistical_analysis')
            ->allowEmpty('statistical_analysis');

        $validator
            ->scalar('medical_writing')
            ->allowEmpty('medical_writing');

        $validator
            ->scalar('other_duties')
            ->allowEmpty('other_duties');

        $validator
            ->scalar('other_duties_specify')
            ->allowEmpty('other_duties_specify');

        $validator
            ->scalar('misc')
            ->allowEmpty('misc');

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

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aefis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property |\Cake\ORM\Association\HasMany $AefiListOfVaccines
 *
 * @method \App\Model\Entity\Aefi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aefi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aefi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aefi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aefi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aefi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aefi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AefisTable extends Table
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

        $this->setTable('aefis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->hasMany('AefiListOfVaccines', [
            'foreignKey' => 'aefi_id'
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
            ->scalar('report_type')
            ->allowEmpty('report_type');

        $validator
            ->scalar('name_of_institution')
            ->allowEmpty('name_of_institution');

        $validator
            ->scalar('institution_code')
            ->allowEmpty('institution_code');

        $validator
            ->scalar('patient_name')
            ->allowEmpty('patient_name');

        $validator
            ->scalar('ip_no')
            ->allowEmpty('ip_no');

        $validator
            ->scalar('date_of_birth')
            ->allowEmpty('date_of_birth');

        $validator
            ->scalar('age_group')
            ->allowEmpty('age_group');

        $validator
            ->scalar('gender')
            ->allowEmpty('gender');

        $validator
            ->scalar('weight')
            ->allowEmpty('weight');

        $validator
            ->scalar('height')
            ->allowEmpty('height');

        $validator
            ->scalar('date_of_onset_of_reaction')
            ->allowEmpty('date_of_onset_of_reaction');

        $validator
            ->scalar('date_of_end_of_reaction')
            ->allowEmpty('date_of_end_of_reaction');

        $validator
            ->scalar('duration_type')
            ->allowEmpty('duration_type');

        $validator
            ->scalar('duration')
            ->allowEmpty('duration');

        $validator
            ->scalar('description_of_reaction')
            ->allowEmpty('description_of_reaction');

        $validator
            ->scalar('severity')
            ->allowEmpty('severity');

        $validator
            ->scalar('severity_reason')
            ->allowEmpty('severity_reason');

        $validator
            ->scalar('medical_history')
            ->allowEmpty('medical_history');

        $validator
            ->scalar('past_drug_therapy')
            ->allowEmpty('past_drug_therapy');

        $validator
            ->scalar('outcome')
            ->allowEmpty('outcome');

        $validator
            ->scalar('lab_test_results')
            ->allowEmpty('lab_test_results');

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
            ->allowEmpty('submitted');

        $validator
            ->allowEmpty('emails');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('device');

        $validator
            ->allowEmpty('notified');

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

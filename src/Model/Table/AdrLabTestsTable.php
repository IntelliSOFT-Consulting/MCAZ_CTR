<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdrLabTests Model
 *
 * @property \App\Model\Table\AdrsTable|\Cake\ORM\Association\BelongsTo $Adrs
 *
 * @method \App\Model\Entity\AdrLabTest get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdrLabTest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdrLabTest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdrLabTest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdrLabTest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdrLabTest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdrLabTest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdrLabTestsTable extends Table
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

        $this->setTable('adr_lab_tests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Adrs', [
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
            ->scalar('lab_test')
            ->allowEmpty('lab_test');

        $validator
            ->scalar('abnormal_result')
            ->allowEmpty('abnormal_result');

        $validator
            ->scalar('site_normal_range')
            ->allowEmpty('site_normal_range');

        // $validator
        //     ->date('collection_date')
        //     ->allowEmpty('collection_date');

        $validator
            ->scalar('lab_value')
            ->allowEmpty('lab_value');

        // $validator
        //     ->date('lab_value_date')
        //     ->allowEmpty('lab_value_date');

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
        $rules->add($rules->existsIn(['adr_id'], 'Adrs'));

        return $rules;
    }
}

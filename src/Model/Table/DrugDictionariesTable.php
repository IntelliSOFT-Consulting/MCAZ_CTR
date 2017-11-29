<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DrugDictionaries Model
 *
 * @method \App\Model\Entity\DrugDictionary get($primaryKey, $options = [])
 * @method \App\Model\Entity\DrugDictionary newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DrugDictionary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DrugDictionary|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DrugDictionary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DrugDictionary[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DrugDictionary findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DrugDictionariesTable extends Table
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

        $this->setTable('drug_dictionaries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('MedId')
            ->allowEmpty('MedId');

        $validator
            ->scalar('drug_record_number')
            ->allowEmpty('drug_record_number');

        $validator
            ->scalar('sequence_no_1')
            ->allowEmpty('sequence_no_1');

        $validator
            ->scalar('sequence_no_2')
            ->allowEmpty('sequence_no_2');

        $validator
            ->scalar('sequence_no_3')
            ->allowEmpty('sequence_no_3');

        $validator
            ->scalar('sequence_no_4')
            ->allowEmpty('sequence_no_4');

        $validator
            ->scalar('generic')
            ->allowEmpty('generic');

        $validator
            ->scalar('drug_name')
            ->allowEmpty('drug_name');

        $validator
            ->scalar('name_specifier')
            ->allowEmpty('name_specifier');

        $validator
            ->scalar('market_authorization_number')
            ->allowEmpty('market_authorization_number');

        $validator
            ->scalar('market_authorization_date')
            ->allowEmpty('market_authorization_date');

        $validator
            ->scalar('market_authorization_withdrawal_date')
            ->allowEmpty('market_authorization_withdrawal_date');

        $validator
            ->scalar('country')
            ->allowEmpty('country');

        $validator
            ->scalar('company')
            ->allowEmpty('company');

        $validator
            ->scalar('marketing_authorization_holder')
            ->allowEmpty('marketing_authorization_holder');

        $validator
            ->scalar('source_code')
            ->allowEmpty('source_code');

        $validator
            ->scalar('source_country')
            ->allowEmpty('source_country');

        $validator
            ->scalar('source_year')
            ->allowEmpty('source_year');

        $validator
            ->scalar('product_type')
            ->allowEmpty('product_type');

        $validator
            ->scalar('product_group')
            ->allowEmpty('product_group');

        $validator
            ->scalar('create_date')
            ->allowEmpty('create_date');

        $validator
            ->scalar('date_changed')
            ->allowEmpty('date_changed');

        return $validator;
    }
}

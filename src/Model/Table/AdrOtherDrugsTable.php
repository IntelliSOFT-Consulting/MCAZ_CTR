<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdrOtherDrugs Model
 *
 * @property \App\Model\Table\AdrsTable|\Cake\ORM\Association\BelongsTo $Adrs
 *
 * @method \App\Model\Entity\AdrOtherDrug get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdrOtherDrug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdrOtherDrug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdrOtherDrug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdrOtherDrug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdrOtherDrug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdrOtherDrug findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdrOtherDrugsTable extends Table
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

        $this->setTable('adr_other_drugs');
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
            ->scalar('drug_name')
            ->allowEmpty('drug_name');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('stop_date')
            ->allowEmpty('stop_date');

        $validator
            ->scalar('relationship_to_sae')
            ->allowEmpty('relationship_to_sae');

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

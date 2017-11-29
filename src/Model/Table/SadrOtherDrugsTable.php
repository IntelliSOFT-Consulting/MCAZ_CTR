<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SadrOtherDrugs Model
 *
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\BelongsTo $Sadrs
 *
 * @method \App\Model\Entity\SadrOtherDrug get($primaryKey, $options = [])
 * @method \App\Model\Entity\SadrOtherDrug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SadrOtherDrug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SadrOtherDrug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SadrOtherDrug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SadrOtherDrug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SadrOtherDrug findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SadrOtherDrugsTable extends Table
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

        $this->setTable('sadr_other_drugs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sadrs', [
            'foreignKey' => 'sadr_id'
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

        // $validator
        //     ->date('start_date')
        //     ->allowEmpty('start_date');

        // $validator
        //     ->date('stop_date')
        //     ->allowEmpty('stop_date');

        $validator
            ->scalar('suspected_drug')
            ->allowEmpty('suspected_drug');

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
        $rules->add($rules->existsIn(['sadr_id'], 'Sadrs'));

        return $rules;
    }
}

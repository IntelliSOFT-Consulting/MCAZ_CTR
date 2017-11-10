<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AefiListOfVaccines Model
 *
 * @property \App\Model\Table\AefisTable|\Cake\ORM\Association\BelongsTo $Aefis
 *
 * @method \App\Model\Entity\AefiListOfVaccine get($primaryKey, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AefiListOfVaccinesTable extends Table
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

        $this->setTable('aefi_list_of_vaccines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Aefis', [
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
            ->scalar('vaccine_name')
            ->allowEmpty('vaccine_name');

        // $validator
        //     ->dateTime('vaccination_date')
        //     ->allowEmpty('vaccination_date');

        $validator
            ->scalar('dosage')
            ->allowEmpty('dosage');

        $validator
            ->scalar('batch_number')
            ->allowEmpty('batch_number');

        // $validator
        //     ->date('expiry_date')
        //     ->allowEmpty('expiry_date');

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
        $rules->add($rules->existsIn(['aefi_id'], 'Aefis'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SaefiListOfVaccines Model
 *
 * @property \App\Model\Table\SaefisTable|\Cake\ORM\Association\BelongsTo $Saefis
 *
 * @method \App\Model\Entity\SaefiListOfVaccine get($primaryKey, $options = [])
 * @method \App\Model\Entity\SaefiListOfVaccine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SaefiListOfVaccine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SaefiListOfVaccine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaefiListOfVaccine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SaefiListOfVaccine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SaefiListOfVaccine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SaefiListOfVaccinesTable extends Table
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

        $this->setTable('saefi_list_of_vaccines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Saefis', [
            'foreignKey' => 'saefi_id'
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

        $validator
            ->integer('vaccination_doses')
            ->allowEmpty('vaccination_doses');

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
        $rules->add($rules->existsIn(['saefi_id'], 'Saefis'));

        return $rules;
    }
}

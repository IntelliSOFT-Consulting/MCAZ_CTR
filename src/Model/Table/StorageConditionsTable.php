<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StorageConditions Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\SdrugsTable|\Cake\ORM\Association\BelongsTo $Sdrugs
 * @property \App\Model\Table\PdrugsTable|\Cake\ORM\Association\BelongsTo $Pdrugs
 *
 * @method \App\Model\Entity\StorageCondition get($primaryKey, $options = [])
 * @method \App\Model\Entity\StorageCondition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StorageCondition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StorageCondition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StorageCondition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StorageCondition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StorageCondition findOrCreate($search, callable $callback = null, $options = [])
 */
class StorageConditionsTable extends Table
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

        $this->setTable('storage_conditions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('Sdrugs', [
            'foreignKey' => 'sdrug_id'
        ]);
        $this->belongsTo('Pdrugs', [
            'foreignKey' => 'pdrug_id'
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
            ->scalar('batch_details')
            ->maxLength('batch_details', 255)
            ->allowEmpty('batch_details');

        $validator
            ->scalar('manu_process')
            ->maxLength('manu_process', 255)
            ->allowEmpty('manu_process');

        $validator
            ->scalar('neg_seventy')
            ->maxLength('neg_seventy', 255)
            ->allowEmpty('neg_seventy');

        $validator
            ->scalar('neg_twenty')
            ->maxLength('neg_twenty', 255)
            ->allowEmpty('neg_twenty');

        $validator
            ->scalar('pos_five')
            ->maxLength('pos_five', 255)
            ->allowEmpty('pos_five');

        $validator
            ->integer('pos_twenty_five')
            ->allowEmpty('pos_twenty_five');

        $validator
            ->integer('pos_thirty')
            ->allowEmpty('pos_thirty');

        $validator
            ->integer('pos_forty')
            ->allowEmpty('pos_forty');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->allowEmpty('model');

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
        $rules->add($rules->existsIn(['sdrug_id'], 'Sdrugs'));
        $rules->add($rules->existsIn(['pdrug_id'], 'Pdrugs'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Refids Model
 *
 * @method \App\Model\Entity\Refid get($primaryKey, $options = [])
 * @method \App\Model\Entity\Refid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Refid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Refid|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Refid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Refid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Refid findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RefidsTable extends Table
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

        $this->setTable('refids');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('foreign_key')
            ->requirePresence('foreign_key', 'create')
            ->notEmpty('foreign_key');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->allowEmpty('model');

        $validator
            ->integer('refid')
            ->allowEmpty('refid');

        $validator
            ->integer('year')
            ->allowEmpty('year');

        return $validator;
    }
}

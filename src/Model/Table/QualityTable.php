<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quality Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Quality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quality|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quality findOrCreate($search, callable $callback = null, $options = [])
 */
class QualityTable extends Table
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

        $this->setTable('quality');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('submitted')
            ->maxLength('submitted', 255)
            ->requirePresence('submitted', 'create')
            ->allowEmpty('submitted');

        $validator
            ->scalar('quality_workspace')
            ->requirePresence('quality_workspace', 'create')
            ->allowEmpty('quality_workspace');

        $validator
            ->requirePresence('gmp_smpc', 'create')
            ->allowEmpty('gmp_smpc');

        $validator
            ->requirePresence('gmp_included', 'create')
            ->allowEmpty('gmp_included');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

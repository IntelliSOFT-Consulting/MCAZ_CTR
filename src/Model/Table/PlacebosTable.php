<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Placebos Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\Placebo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Placebo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Placebo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Placebo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Placebo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Placebo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Placebo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlacebosTable extends Table
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

        $this->setTable('placebos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
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
            ->scalar('placebo_present')
            ->allowEmpty('placebo_present');

        $validator
            ->scalar('pharmaceutical_form')
            ->allowEmpty('pharmaceutical_form');

        $validator
            ->scalar('route_of_administration')
            ->allowEmpty('route_of_administration');

        $validator
            ->scalar('composition')
            ->allowEmpty('composition');

        $validator
            ->scalar('identical_indp')
            ->allowEmpty('identical_indp');

        $validator
            ->scalar('major_ingredients')
            ->allowEmpty('major_ingredients');

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

        return $rules;
    }
}

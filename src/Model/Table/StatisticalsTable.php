<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Statisticals Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Statistical get($primaryKey, $options = [])
 * @method \App\Model\Entity\Statistical newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Statistical[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Statistical|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Statistical patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Statistical[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Statistical findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatisticalsTable extends Table
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

        $this->setTable('statisticals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->scalar('design_type')
            ->maxLength('design_type', 255)
            ->allowEmpty('design_type');

        $validator
            ->scalar('randomized')
            ->maxLength('randomized', 255)
            ->allowEmpty('randomized');

        $validator
            ->scalar('blinding')
            ->maxLength('blinding', 255)
            ->allowEmpty('blinding');

        $validator
            ->scalar('design_description')
            ->maxLength('design_description', 4294967295)
            ->allowEmpty('design_description');

        $validator
            ->scalar('design_acceptable')
            ->maxLength('design_acceptable', 255)
            ->allowEmpty('design_acceptable');

        $validator
            ->scalar('design_comment')
            ->maxLength('design_comment', 4294967295)
            ->allowEmpty('design_comment');

        $validator
            ->scalar('rand_description')
            ->maxLength('rand_description', 4294967295)
            ->allowEmpty('rand_description');

        $validator
            ->scalar('rand_comment')
            ->maxLength('rand_comment', 4294967295)
            ->allowEmpty('rand_comment');

        $validator
            ->scalar('sample_acceptable')
            ->maxLength('sample_acceptable', 255)
            ->allowEmpty('sample_acceptable');

        $validator
            ->scalar('power_acceptable')
            ->maxLength('power_acceptable', 255)
            ->allowEmpty('power_acceptable');

        $validator
            ->scalar('sample_description')
            ->maxLength('sample_description', 4294967295)
            ->allowEmpty('sample_description');

        $validator
            ->scalar('sample_comment')
            ->maxLength('sample_comment', 4294967295)
            ->allowEmpty('sample_comment');

        $validator
            ->scalar('analysis_description')
            ->maxLength('analysis_description', 4294967295)
            ->allowEmpty('analysis_description');

        $validator
            ->scalar('analysis_objective')
            ->maxLength('analysis_objective', 255)
            ->allowEmpty('analysis_objective');

        $validator
            ->scalar('analysis_objective_comments')
            ->maxLength('analysis_objective_comments', 4294967295)
            ->allowEmpty('analysis_objective_comments');

        $validator
            ->scalar('methods_appropriate')
            ->maxLength('methods_appropriate', 255)
            ->allowEmpty('methods_appropriate');

        $validator
            ->scalar('methods_appropriate_comments')
            ->maxLength('methods_appropriate_comments', 4294967295)
            ->allowEmpty('methods_appropriate_comments');

        $validator
            ->scalar('considerations')
            ->maxLength('considerations', 255)
            ->allowEmpty('considerations');

        $validator
            ->scalar('considerations_comments')
            ->maxLength('considerations_comments', 4294967295)
            ->allowEmpty('considerations_comments');

        $validator
            ->scalar('multiplicity')
            ->maxLength('multiplicity', 255)
            ->allowEmpty('multiplicity');

        $validator
            ->scalar('multiplicity_comments')
            ->maxLength('multiplicity_comments', 4294967295)
            ->allowEmpty('multiplicity_comments');

        $validator
            ->scalar('analyses_acceptable')
            ->maxLength('analyses_acceptable', 255)
            ->allowEmpty('analyses_acceptable');

        $validator
            ->scalar('analysis_comment')
            ->maxLength('analysis_comment', 4294967295)
            ->allowEmpty('analysis_comment');

        $validator
            ->scalar('interim_safety')
            ->maxLength('interim_safety', 255)
            ->allowEmpty('interim_safety');

        $validator
            ->scalar('interim_planning')
            ->maxLength('interim_planning', 255)
            ->allowEmpty('interim_planning');

        $validator
            ->scalar('interim_description')
            ->maxLength('interim_description', 4294967295)
            ->allowEmpty('interim_description');

        $validator
            ->scalar('interim_comment')
            ->maxLength('interim_comment', 4294967295)
            ->allowEmpty('interim_comment');

        $validator
            ->scalar('statistical_acceptable')
            ->maxLength('statistical_acceptable', 255)
            ->allowEmpty('statistical_acceptable');

        $validator
            ->scalar('information_needed')
            ->maxLength('information_needed', 255)
            ->allowEmpty('information_needed');

        $validator
            ->scalar('overall_comment')
            ->maxLength('overall_comment', 4294967295)
            ->allowEmpty('overall_comment');

        $validator
            ->integer('chosen')
            ->allowEmpty('chosen');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->scalar('additional')
            ->maxLength('additional', 4294967295)
            ->allowEmpty('additional');

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

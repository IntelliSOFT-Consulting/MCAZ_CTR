<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Compliance Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\QualityAssessmentsTable|\Cake\ORM\Association\BelongsTo $QualityAssessments
 *
 * @method \App\Model\Entity\Compliance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Compliance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Compliance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Compliance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compliance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Compliance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Compliance findOrCreate($search, callable $callback = null, $options = [])
 */
class ComplianceTable extends Table
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

        $this->setTable('compliance');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('QualityAssessments', [
            'foreignKey' => 'quality_assessment_id'
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
            ->scalar('site_name')
            ->maxLength('site_name', 255)
            ->allowEmpty('site_name');

        $validator
            ->scalar('site_function')
            ->maxLength('site_function', 255)
            ->allowEmpty('site_function');

        $validator
            ->allowEmpty('valid_license');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 255)
            ->allowEmpty('comment');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

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
        $rules->add($rules->existsIn(['quality_assessment_id'], 'QualityAssessments'));

        return $rules;
    }
}

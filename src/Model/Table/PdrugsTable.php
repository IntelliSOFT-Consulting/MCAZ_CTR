<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pdrugs Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\QualityAssessmentsTable|\Cake\ORM\Association\BelongsTo $QualityAssessments
 * @property \App\Model\Table\StorageConditionsTable|\Cake\ORM\Association\HasMany $StorageConditions
 *
 * @method \App\Model\Entity\Pdrug get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pdrug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pdrug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pdrug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pdrug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pdrug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pdrug findOrCreate($search, callable $callback = null, $options = [])
 */
class PdrugsTable extends Table
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

        $this->setTable('pdrugs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('QualityAssessments', [
            'foreignKey' => 'quality_assessment_id'
        ]);
        $this->hasMany('StorageConditions', [
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
            ->allowEmpty('composition');

        $validator
            ->scalar('composition_workspace')
            ->maxLength('composition_workspace', 4294967295)
            ->allowEmpty('composition_workspace');

        $validator
            ->scalar('composition_comment')
            ->maxLength('composition_comment', 4294967295)
            ->allowEmpty('composition_comment');

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

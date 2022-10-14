<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QualityAssessments Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ComplianceTable|\Cake\ORM\Association\HasMany $Compliance
 * @property \App\Model\Table\PdrugsTable|\Cake\ORM\Association\HasMany $Pdrugs
 * @property \App\Model\Table\SdrugsTable|\Cake\ORM\Association\HasMany $Sdrugs
 *
 * @method \App\Model\Entity\QualityAssessment get($primaryKey, $options = [])
 * @method \App\Model\Entity\QualityAssessment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QualityAssessment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QualityAssessment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QualityAssessment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QualityAssessment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QualityAssessment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QualityAssessmentsTable extends Table
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

        $this->setTable('quality_assessments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Compliance', [
            'foreignKey' => 'quality_assessment_id'
        ]);
        $this->hasMany('Pdrugs', [
            'foreignKey' => 'quality_assessment_id'
        ]);
        $this->hasMany('Sdrugs', [
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
            ->scalar('quality_workspace')
            ->maxLength('quality_workspace', 4294967295)
            ->allowEmpty('quality_workspace');

        $validator
            ->allowEmpty('gmp_included');

        $validator
            ->allowEmpty('gmp_smpc');

        $validator
            ->scalar('quality_data')
            ->maxLength('quality_data', 255)
            ->allowEmpty('quality_data');

        $validator
            ->scalar('auxiliary_workspace')
            ->maxLength('auxiliary_workspace', 4294967295)
            ->allowEmpty('auxiliary_workspace');

        $validator
            ->scalar('auxiliary_comments')
            ->maxLength('auxiliary_comments', 4294967295)
            ->allowEmpty('auxiliary_comments');

        $validator
            ->scalar('adventitious_agents')
            ->maxLength('adventitious_agents', 255)
            ->allowEmpty('adventitious_agents');

        $validator
            ->scalar('adventitious_workspace')
            ->maxLength('adventitious_workspace', 4294967295)
            ->allowEmpty('adventitious_workspace');

        $validator
            ->scalar('adventitious_comments')
            ->maxLength('adventitious_comments', 4294967295)
            ->allowEmpty('adventitious_comments');

        $validator
            ->scalar('novel_excipients')
            ->maxLength('novel_excipients', 255)
            ->allowEmpty('novel_excipients');

        $validator
            ->scalar('novel_excipients_workspace')
            ->maxLength('novel_excipients_workspace', 4294967295)
            ->allowEmpty('novel_excipients_workspace');

        $validator
            ->scalar('novel_excipients_comments')
            ->maxLength('novel_excipients_comments', 4294967295)
            ->allowEmpty('novel_excipients_comments');

        $validator
            ->scalar('reconstitution')
            ->maxLength('reconstitution', 255)
            ->allowEmpty('reconstitution');

        $validator
            ->scalar('reconstitution_workspace')
            ->maxLength('reconstitution_workspace', 4294967295)
            ->allowEmpty('reconstitution_workspace');

        $validator
            ->scalar('reconstitution_comments')
            ->maxLength('reconstitution_comments', 4294967295)
            ->allowEmpty('reconstitution_comments');

        $validator
            ->scalar('labelling')
            ->maxLength('labelling', 255)
            ->allowEmpty('labelling');

        $validator
            ->scalar('labelling_comments')
            ->maxLength('labelling_comments', 4294967295)
            ->allowEmpty('labelling_comments');

        $validator
            ->scalar('blinding_workspace')
            ->maxLength('blinding_workspace', 4294967295)
            ->allowEmpty('blinding_workspace');

        $validator
            ->scalar('blinding_comments')
            ->maxLength('blinding_comments', 4294967295)
            ->allowEmpty('blinding_comments');

        $validator
            ->scalar('acceptable')
            ->maxLength('acceptable', 255)
            ->allowEmpty('acceptable');

        $validator
            ->scalar('supplementary_need')
            ->maxLength('supplementary_need', 255)
            ->allowEmpty('supplementary_need');

        $validator
            ->scalar('overall_comments')
            ->maxLength('overall_comments', 4294967295)
            ->allowEmpty('overall_comments');

        $validator
            ->scalar('additional')
            ->maxLength('additional', 4294967295)
            ->allowEmpty('additional');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

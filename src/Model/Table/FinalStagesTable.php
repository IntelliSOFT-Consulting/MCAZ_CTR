<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * FinalStages Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\FinalStage get($primaryKey, $options = [])
 * @method \App\Model\Entity\FinalStage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FinalStage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FinalStage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FinalStage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FinalStage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FinalStage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FinalStagesTable extends Table
{

    use SoftDeleteTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('final_stages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);

        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'FinalStages'),
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
            ->scalar('internal_review_comment')
            ->notEmpty('internal_review_comment', ['message' => 'Internal Review Comment required!']);

        $validator
            ->scalar('applicant_review_comment')
            ->allowEmpty('applicant_review_comment');

        // $validator
        //     ->date('approved_date')
        //     ->notEmpty('approved_date');

        $validator
            ->boolean('authorization_letter')
            ->notEmpty('authorization_letter')
            ->add('authorization_letter', 'final-authorization', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return 'Please upload the authorization letter.';
                }
            ]);

        $validator
            ->boolean('indemnity_forms')
            ->notEmpty('indemnity_forms')
            ->add('indemnity_forms', 'indemnity-forms', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return 'Please upload the indemnity forms.';
                }
            ]);

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['application_id'], 'Applications'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * DgReviews Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\DgReview get($primaryKey, $options = [])
 * @method \App\Model\Entity\DgReview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DgReview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DgReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DgReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DgReview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DgReview findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DgReviewsTable extends Table
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

        $this->setTable('dg_reviews');
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
            'conditions' => array('Attachments.model' => 'DgReviews'),
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
            ->scalar('decision')
            ->allowEmpty('decision');

        $validator
            ->scalar('internal_review_comment')
            ->notEmpty('internal_review_comment', ['message' => 'Internal Review Comment required!']);

        $validator
            ->scalar('applicant_review_comment')
            ->allowEmpty('applicant_review_comment');


        $validator
            ->boolean('authorization_letter')
            ->notEmpty('authorization_letter')
            ->add('authorization_letter', 'final-authorization', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return 'Please upload the authorization certificate.';
                }
            ]);

        /*$validator
            ->boolean('indemnity_forms')
            ->notEmpty('indemnity_forms')
            ->add('indemnity_forms', 'indemnity-forms', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return 'Please upload the indemnity forms.';
                }
            ]);*/

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

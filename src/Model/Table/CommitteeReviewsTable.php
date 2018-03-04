<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * CommitteeReviews Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\CommitteeReview get($primaryKey, $options = [])
 * @method \App\Model\Entity\CommitteeReview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CommitteeReview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CommitteeReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommitteeReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CommitteeReview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CommitteeReview findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommitteeReviewsTable extends Table
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

        $this->setTable('committee_reviews');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'file' => [],
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);

        $this->hasMany('Comments', [
            'className' => 'Comments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Comments.model' => 'CommitteeReviews'),
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
        /*$validator->provider('upload', \Josegonzalez\Upload\Validation\UploadValidation::class);
        $validator->add('file', 'fileUnderPhpSizeLimit', [
            'rule' => 'isUnderPhpSizeLimit',
            'message' => 'This file is too large',
            'provider' => 'upload',
            'on' => function($context) {
                return !empty($context['data']['file']) && $context['data']['file']['error'] == UPLOAD_ERR_OK;
            }
        ]);*/
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('internal_review_comment')
            ->notEmpty('internal_review_comment', ['message' => 'Internal Review Comment mandatory']);

        $validator
            ->scalar('outcome_date')
            ->notEmpty('outcome_date', ['message' => 'Kindly enter the date of the committee decision']);
        
        $validator
            ->allowEmpty('file');

        /*$validator
            ->scalar('file')
            ->allowEmpty('file');

        $validator
            ->scalar('dir')
            ->allowEmpty('dir');

        $validator
            ->scalar('size')
            ->allowEmpty('size');

        $validator
            ->scalar('type')
            ->allowEmpty('type');*/

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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

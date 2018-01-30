<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * GcpInspections Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\GcpInspection get($primaryKey, $options = [])
 * @method \App\Model\Entity\GcpInspection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GcpInspection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GcpInspection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GcpInspection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GcpInspection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GcpInspection findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GcpInspectionsTable extends Table
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

        $this->setTable('gcp_inspections');
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
            ->allowEmpty('internal_review_comment');

        $validator
            ->scalar('applicant_review_comment')
            ->allowEmpty('applicant_review_comment');

        $validator
            ->allowEmpty('file');

        $validator
            ->scalar('dir')
            ->allowEmpty('dir');

        $validator
            ->scalar('size')
            ->allowEmpty('size');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

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

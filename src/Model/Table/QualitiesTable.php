<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Qualities Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SdrugTable|\Cake\ORM\Association\HasMany $Sdrug
 *
 * @method \App\Model\Entity\Quality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quality|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quality findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QualitiesTable extends Table
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

        $this->setTable('qualities');
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
        $this->hasMany('Sdrug', [
            'foreignKey' => 'quality_id'
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
            ->boolean('gmp_smpc')
            ->allowEmpty('gmp_smpc');

        $validator
            ->boolean('gmp_included')
            ->allowEmpty('gmp_included');

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
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->scalar('supplementary_need')
            ->maxLength('supplementary_need', 255)
            ->allowEmpty('supplementary_need');

        $validator
            ->scalar('overall_comments')
            ->maxLength('overall_comments', 4294967295)
            ->allowEmpty('overall_comments');

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

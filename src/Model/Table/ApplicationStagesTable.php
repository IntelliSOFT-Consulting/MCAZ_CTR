<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationStages Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\ApplicationStage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationStage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplicationStage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationStage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationStagesTable extends Table
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

        $this->setTable('application_stages');
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
            ->dateTime('submission')
            ->allowEmpty('submission');

        $validator
            ->dateTime('receipt')
            ->allowEmpty('receipt');

        $validator
            ->dateTime('evaluation')
            ->allowEmpty('evaluation');

        $validator
            ->dateTime('committee_review')
            ->allowEmpty('committee_review');

        $validator
            ->dateTime('correspondence')
            ->allowEmpty('correspondence');

        $validator
            ->dateTime('response')
            ->allowEmpty('response');

        $validator
            ->dateTime('recommendation')
            ->allowEmpty('recommendation');

        $validator
            ->dateTime('authorization')
            ->allowEmpty('authorization');

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
        $rules->add($rules->existsIn(['application_id'], 'Applications'));

        return $rules;
    }
}

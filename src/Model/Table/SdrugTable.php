<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sdrug Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\QualitiesTable|\Cake\ORM\Association\BelongsTo $Qualities
 *
 * @method \App\Model\Entity\Sdrug get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sdrug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sdrug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sdrug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sdrug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sdrug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sdrug findOrCreate($search, callable $callback = null, $options = [])
 */
class SdrugTable extends Table
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

        $this->setTable('sdrug');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Qualities', [
            'foreignKey' => 'quality_id',
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
            ->boolean('drug_eur')
            ->allowEmpty('drug_eur');

        $validator
            ->boolean('drug_usp')
            ->allowEmpty('drug_usp');

        $validator
            ->scalar('drug_authorised')
            ->maxLength('drug_authorised', 255)
            ->allowEmpty('drug_authorised');

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
        $rules->add($rules->existsIn(['quality_id'], 'Qualities'));

        return $rules;
    }
}

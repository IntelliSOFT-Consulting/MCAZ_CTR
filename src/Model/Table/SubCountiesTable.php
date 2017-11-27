<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubCounties Model
 *
 * @property \App\Model\Table\CountiesTable|\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\PqmpsTable|\Cake\ORM\Association\HasMany $Pqmps
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\HasMany $Sadrs
 *
 * @method \App\Model\Entity\SubCounty get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubCounty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubCounty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubCounty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubCounty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubCounty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubCounty findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubCountiesTable extends Table
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

        $this->setTable('sub_counties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Counties', [
            'foreignKey' => 'county_id'
        ]);
        $this->hasMany('Pqmps', [
            'foreignKey' => 'sub_county_id'
        ]);
        $this->hasMany('Sadrs', [
            'foreignKey' => 'sub_county_id'
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
            ->scalar('sub_county_name')
            ->allowEmpty('sub_county_name');

        $validator
            ->scalar('county_name')
            ->allowEmpty('county_name');

        $validator
            ->scalar('Province')
            ->allowEmpty('Province');

        $validator
            ->scalar('Pop_2009')
            ->allowEmpty('Pop_2009');

        $validator
            ->scalar('RegVoters')
            ->allowEmpty('RegVoters');

        $validator
            ->scalar('AreaSqKms')
            ->allowEmpty('AreaSqKms');

        $validator
            ->scalar('CAWards')
            ->allowEmpty('CAWards');

        $validator
            ->scalar('MainEthnicGroup')
            ->allowEmpty('MainEthnicGroup');

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
        $rules->add($rules->existsIn(['county_id'], 'Counties'));

        return $rules;
    }
}

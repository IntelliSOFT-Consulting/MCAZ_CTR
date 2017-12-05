<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SiteDetails Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\SiteDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SiteDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SiteDetailsTable extends Table
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

        $this->setTable('site_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id'
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
            ->scalar('site_name')
            ->allowEmpty('site_name');

        $validator
            ->scalar('physical_address')
            ->allowEmpty('physical_address');

        $validator
            ->scalar('contact_details')
            ->allowEmpty('contact_details');

        $validator
            ->scalar('contact_person')
            ->allowEmpty('contact_person');

        $validator
            ->scalar('site_capacity')
            ->allowEmpty('site_capacity');

        $validator
            ->scalar('misc')
            ->allowEmpty('misc');

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
        $rules->add($rules->existsIn(['province_id'], 'Provinces'));

        return $rules;
    }
}

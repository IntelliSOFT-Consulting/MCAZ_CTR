<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sponsors Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\Sponsor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sponsor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sponsor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sponsor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SponsorsTable extends Table
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

        $this->setTable('sponsors');
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
            ->scalar('sponsor')
            ->allowEmpty('sponsor');

        $validator
            ->scalar('contact_person')
            ->allowEmpty('contact_person');

        $validator
            ->scalar('address')
            ->allowEmpty('address');

        $validator
            ->scalar('telephone_number')
            ->allowEmpty('telephone_number');

        $validator
            ->scalar('fax_number')
            ->allowEmpty('fax_number');

        $validator
            ->scalar('cell_number')
            ->allowEmpty('cell_number');

        $validator
            ->scalar('email_address')
            ->allowEmpty('email_address');

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

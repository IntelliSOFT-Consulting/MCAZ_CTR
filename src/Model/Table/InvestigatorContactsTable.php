<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use SoftDelete\Model\Table\SoftDeleteTrait;
/**
 * InvestigatorContacts Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\InvestigatorContact get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvestigatorContact newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InvestigatorContact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvestigatorContact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvestigatorContact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvestigatorContact[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvestigatorContact findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InvestigatorContactsTable extends Table
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

        $this->setTable('investigator_contacts');
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
            ->scalar('given_name')
            ->notEmpty('given_name', ['message' => '2. Investigator: Full names required']);

        $validator
            ->scalar('middle_name')
            ->allowEmpty('middle_name');

        $validator
            ->scalar('family_name')
            ->allowEmpty('family_name');

        $validator
            ->scalar('qualification')
            ->notEmpty('qualification', ['message' => '2. Investigator: Qualification required']);

        $validator
            ->scalar('professional_address')
            ->notEmpty('professional_address', ['message' => '2. Investigator: Professional address required']);

        $validator
            ->scalar('telephone')
            ->notEmpty('telephone', ['message' => '2. Investigator: Telephone number required']);

        $validator
            //->email('email', ['message' => '2. Investigator: Invalid email format'])
            ->notEmpty('email', ['message' => '2. Investigator: Valid email required'])
            ->add('email', 'email', ['rule' => 'email', 'message' => '2. Investigator: Invalid email format']);

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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['application_id'], 'Applications'));

        return $rules;
    }
}

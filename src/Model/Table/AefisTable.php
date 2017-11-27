<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aefis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property |\Cake\ORM\Association\HasMany $AefiListOfVaccines
 *
 * @method \App\Model\Entity\Aefi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aefi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aefi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aefi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aefi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aefi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aefi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AefisTable extends Table
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

        $this->setTable('aefis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id'
        ]);
        $this->hasMany('AefiListOfVaccines', [
            'foreignKey' => 'aefi_id'
        ]);
        $this->hasMany('AefiListOfDiluents', [
            'foreignKey' => 'aefi_id'
        ]);

        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Aefis', 'Attachments.category' => 'attachments'),
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
            ->scalar('patient_name')
            ->notEmpty('patient_name');

        $validator
            ->scalar('patient_surname')
            ->notEmpty('patient_surname');

        $validator
            ->scalar('patient_address')
            ->notEmpty('patient_address');

        $validator
            ->scalar('gender')
            ->notEmpty('gender');

        // $validator
        //     ->scalar('date_of_birth')
        //     ->notEmpty('date_of_birth')
        //     ->add('date_of_birth', [
        //             'length' => [
        //                 'rule' => ['minLength', 3],
        //                 'message' => 'Please select at least year of birth.',
        //             ]
        //         ]);

        $validator
            ->scalar('reporter_name')
            ->notEmpty('reporter_name');

        $validator
            ->scalar('reporter_email')
            ->notEmpty('reporter_email');


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
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));

        return $rules;
    }
}

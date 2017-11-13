<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\CountiesTable|\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\FeedbacksTable|\Cake\ORM\Association\HasMany $Feedbacks
 * @property \App\Model\Table\PqmpsTable|\Cake\ORM\Association\HasMany $Pqmps
 * @property \App\Model\Table\SadrFollowupsTable|\Cake\ORM\Association\HasMany $SadrFollowups
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\HasMany $Sadrs
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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
        //$this->table('users');
        //$this->displayField('id');
        //$this->primaryKey('id');

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Acl.Acl', ['type' => 'requester']);

        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        // $this->belongsTo('Counties', [
        //     'foreignKey' => 'county_id'
        // ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Feedbacks', [
            'foreignKey' => 'user_id'
        ]);
        // $this->hasMany('Pqmps', [
        //     'foreignKey' => 'user_id'
        // ]);
        $this->hasMany('SadrFollowups', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Sadrs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Adrs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Aefis', [
            'foreignKey' => 'user_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        // $validator
        //     ->requirePresence('username', 'create')
        //     ->notEmpty('username')
        //     ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
        // $validator
        //     ->requirePresence('password', 'create')
        //     ->notEmpty('password');

        // $validator
        //     ->integer('id')
        //     ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('confirm_password')
            ->requirePresence('confirm_password', 'create')
            ->notEmpty('confirm_password');

        $validator
            ->scalar('name')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('name_of_institution')
            ->allowEmpty('name_of_institution');

        $validator
            ->scalar('institution_address')
            ->allowEmpty('institution_address');

        $validator
            ->scalar('institution_code')
            ->allowEmpty('institution_code');

        $validator
            ->scalar('institution_contact')
            ->allowEmpty('institution_contact');

        $validator
            ->scalar('ward')
            ->allowEmpty('ward');

        $validator
            ->scalar('phone_no')
            ->notEmpty('phone_no');

        $validator
            ->allowEmpty('forgot_password');

        $validator
            ->allowEmpty('initial_email');

        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

        $validator
            ->boolean('is_admin')
            ->allowEmpty('is_admin');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));
        //$rules->add($rules->existsIn(['county_id'], 'Counties'));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));

        return $rules;
    }

    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity, 
        \ArrayObject $options)
    {
        $hasher = new DefaultPasswordHasher;
        $entity->password = $hasher->hash($entity->password);
        return true;
    }  
}



    
   
    

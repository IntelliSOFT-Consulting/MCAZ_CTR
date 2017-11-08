<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\BelongsTo $Sadrs
 * @property \App\Model\Table\PqmpsTable|\Cake\ORM\Association\BelongsTo $Pqmps
 * @property \App\Model\Table\SadrFollowupsTable|\Cake\ORM\Association\BelongsTo $SadrFollowups
 *
 * @method \App\Model\Entity\Message get($primaryKey, $options = [])
 * @method \App\Model\Entity\Message newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Message[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Message|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Message[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Message findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MessagesTable extends Table
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

        $this->setTable('messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sadrs', [
            'foreignKey' => 'sadr_id'
        ]);
        $this->belongsTo('Pqmps', [
            'foreignKey' => 'pqmp_id'
        ]);
        $this->belongsTo('SadrFollowups', [
            'foreignKey' => 'sadr_followup_id'
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
            ->scalar('sender')
            ->allowEmpty('sender');

        $validator
            ->scalar('receiver')
            ->allowEmpty('receiver');

        $validator
            ->scalar('subject')
            ->allowEmpty('subject');

        $validator
            ->scalar('message')
            ->allowEmpty('message');

        $validator
            ->allowEmpty('sent');

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
        $rules->add($rules->existsIn(['sadr_id'], 'Sadrs'));
        $rules->add($rules->existsIn(['pqmp_id'], 'Pqmps'));
        $rules->add($rules->existsIn(['sadr_followup_id'], 'SadrFollowups'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sadrs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CountiesTable|\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\SubCountiesTable|\Cake\ORM\Association\BelongsTo $SubCounties
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\VigiflowsTable|\Cake\ORM\Association\BelongsTo $Vigiflows
 * @property \App\Model\Table\AttachmentsTable|\Cake\ORM\Association\HasMany $Attachments
 * @property \App\Model\Table\FeedbacksTable|\Cake\ORM\Association\HasMany $Feedbacks
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\SadrFollowupsTable|\Cake\ORM\Association\HasMany $SadrFollowups
 * @property \App\Model\Table\SadrListOfDrugsTable|\Cake\ORM\Association\HasMany $SadrListOfDrugs
 *
 * @method \App\Model\Entity\Sadr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sadr newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sadr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sadr|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sadr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sadr[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sadr findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SadrsTable extends Table
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

        $this->setTable('sadrs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');        

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Sadrs', 'Attachments.category' => 'attachments'),
        ]);
        // $this->hasMany('Feedbacks', [
        //     'foreignKey' => 'sadr_id'
        // ]);
        // $this->hasMany('Messages', [
        //     'foreignKey' => 'sadr_id'
        // ]);
        // $this->hasMany('SadrFollowups', [
        //     'foreignKey' => 'sadr_id'
        // ]);
        $this->hasMany('SadrListOfDrugs', [
            'foreignKey' => 'sadr_id'
        ]);
        $this->hasMany('SadrOtherDrugs', [
            'foreignKey' => 'sadr_id'
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
            ->scalar('name_of_institution')
            ->allowEmpty('name_of_institution');

        $validator
            ->scalar('patient_name')
            ->notEmpty('patient_name');   

        //We shall revisit!!
        // $validator
        //     ->scalar('date_of_birth')
        //     ->notEmpty('date_of_birth')
        //     ->add('date_of_birth', [
        //             'length' => [
        //                 'rule' => ['minLength', 3],
        //                 'message' => 'Please select at least year of birth.',
        //             ]
        //         ]);

        // $validator
        //     ->scalar('gender')
        //     ->notEmpty('gender');

        // $validator
        //     ->scalar('date_of_onset_of_reaction')
        //     ->notEmpty('date_of_onset_of_reaction')
        //     ->add('date_of_onset_of_reaction', [
        //             'length' => [
        //                 'rule' => ['minLength', 3],
        //                 'message' => 'Please select date of onset of the reaction.',
        //             ]
        //         ]);

        // $validator
        //     ->scalar('description_of_reaction')
        //     ->notEmpty('description_of_reaction');

        // $validator
        //     ->scalar('severity')
        //     ->notEmpty('severity');
        // $validator
        //     ->scalar('outcome')
        //     ->notEmpty('outcome');

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
        //$rules->add($rules->existsIn(['county_id'], 'Counties'));
        //$rules->add($rules->existsIn(['sub_county_id'], 'SubCounties'));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));
        //$rules->add($rules->existsIn(['vigiflow_id'], 'Vigiflows'));

        return $rules;
    }
}

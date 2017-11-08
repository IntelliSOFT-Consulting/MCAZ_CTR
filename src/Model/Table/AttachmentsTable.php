<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attachments Model
 *
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\BelongsTo $Sadrs
 * @property \App\Model\Table\SadrFollowupsTable|\Cake\ORM\Association\BelongsTo $SadrFollowups
 * @property \App\Model\Table\PqmpsTable|\Cake\ORM\Association\BelongsTo $Pqmps
 *
 * @method \App\Model\Entity\Attachment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Attachment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Attachment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Attachment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Attachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Attachment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Attachment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttachmentsTable extends Table
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

        $this->setTable('attachments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'file' => [
                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'dirname', // defaults to `dir`
                    'size' => 'file_size', // defaults to `size`
                    'type' => 'file_type', // defaults to `type`
                ],
            ],
        ]);

        $this->addBehavior('Timestamp');

        // $this->belongsTo('Sadrs', [
        //     'foreignKey' => 'sadr_id'
        // ]);
        // $this->belongsTo('SadrFollowups', [
        //     'foreignKey' => 'sadr_followup_id'
        // ]);
        // $this->belongsTo('Pqmps', [
        //     'foreignKey' => 'pqmp_id'
        // ]);
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
            ->scalar('filename')
            ->allowEmpty('filename');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('mimetype')
            ->allowEmpty('mimetype');

        $validator
            ->integer('filesize')
            ->allowEmpty('filesize');

        $validator
            ->scalar('dir')
            ->allowEmpty('dir');

        $validator
            ->scalar('file')
            ->allowEmpty('file');

        $validator
            ->scalar('basename')
            ->allowEmpty('basename');

        $validator
            ->scalar('dirname')
            ->allowEmpty('dirname');

        $validator
            ->scalar('checksum')
            ->allowEmpty('checksum');

        $validator
            ->scalar('model')
            ->allowEmpty('model');

        $validator
            ->integer('foreign_key')
            ->allowEmpty('foreign_key');

        $validator
            ->scalar('alternative')
            ->allowEmpty('alternative');

        $validator
            ->scalar('group')
            ->allowEmpty('group');

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
        $rules->add($rules->existsIn(['sadr_followup_id'], 'SadrFollowups'));
        $rules->add($rules->existsIn(['pqmp_id'], 'Pqmps'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HelpInfos Model
 *
 * @method \App\Model\Entity\HelpInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\HelpInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HelpInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HelpInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HelpInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HelpInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HelpInfo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HelpInfosTable extends Table
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

        $this->setTable('help_infos');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('field_name')
            ->allowEmpty('field_name');

        $validator
            ->scalar('field_label')
            ->allowEmpty('field_label');

        $validator
            ->scalar('place_holder')
            ->allowEmpty('place_holder');

        $validator
            ->scalar('help_type')
            ->allowEmpty('help_type');

        $validator
            ->scalar('title')
            ->allowEmpty('title');

        $validator
            ->scalar('content')
            ->allowEmpty('content');

        $validator
            ->scalar('help_text')
            ->allowEmpty('help_text');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        return $validator;
    }
}

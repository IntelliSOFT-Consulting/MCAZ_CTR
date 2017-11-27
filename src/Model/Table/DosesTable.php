<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Doses Model
 *
 * @property \App\Model\Table\SadrListOfDrugsTable|\Cake\ORM\Association\HasMany $SadrListOfDrugs
 *
 * @method \App\Model\Entity\Dose get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dose newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dose[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dose|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dose patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dose[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dose findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DosesTable extends Table
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

        $this->setTable('doses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('SadrListOfDrugs', [
            'foreignKey' => 'dose_id'
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
            ->scalar('value')
            ->allowEmpty('value');

        $validator
            ->scalar('icsr_code')
            ->allowEmpty('icsr_code');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        return $validator;
    }
}

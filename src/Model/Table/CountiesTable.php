<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Counties Model
 *
 * @property \App\Model\Table\PqmpsTable|\Cake\ORM\Association\HasMany $Pqmps
 * @property \App\Model\Table\SadrFollowupsTable|\Cake\ORM\Association\HasMany $SadrFollowups
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\HasMany $Sadrs
 * @property \App\Model\Table\SubCountiesTable|\Cake\ORM\Association\HasMany $SubCounties
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\County get($primaryKey, $options = [])
 * @method \App\Model\Entity\County newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\County[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\County|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\County patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\County[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\County findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CountiesTable extends Table
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

        $this->setTable('counties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Pqmps', [
            'foreignKey' => 'county_id'
        ]);
        $this->hasMany('SadrFollowups', [
            'foreignKey' => 'county_id'
        ]);
        $this->hasMany('Sadrs', [
            'foreignKey' => 'county_id'
        ]);
        $this->hasMany('SubCounties', [
            'foreignKey' => 'county_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'county_id'
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
            ->scalar('county_name')
            ->allowEmpty('county_name');

        return $validator;
    }
}

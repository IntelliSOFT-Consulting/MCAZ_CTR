<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdrListOfDrugs Model
 *
 * @property \App\Model\Table\AdrsTable|\Cake\ORM\Association\BelongsTo $Adrs
 * @property \App\Model\Table\DosesTable|\Cake\ORM\Association\BelongsTo $Doses
 * @property \App\Model\Table\RoutesTable|\Cake\ORM\Association\BelongsTo $Routes
 * @property \App\Model\Table\FrequenciesTable|\Cake\ORM\Association\BelongsTo $Frequencies
 *
 * @method \App\Model\Entity\AdrListOfDrug get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdrListOfDrug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdrListOfDrug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdrListOfDrug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdrListOfDrug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdrListOfDrug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdrListOfDrug findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdrListOfDrugsTable extends Table
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

        $this->setTable('adr_list_of_drugs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Adrs', [
            'foreignKey' => 'adr_id'
        ]);
        $this->belongsTo('Doses', [
            'foreignKey' => 'dose_id'
        ]);
        $this->belongsTo('Routes', [
            'foreignKey' => 'route_id'
        ]);
        $this->belongsTo('Frequencies', [
            'foreignKey' => 'frequency_id'
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
            ->scalar('drug_name')
            ->allowEmpty('drug_name');

        $validator
            ->scalar('dosage')
            ->allowEmpty('dosage');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('stop_date')
            ->allowEmpty('stop_date');

        $validator
            ->scalar('taking_drug')
            ->allowEmpty('taking_drug');

        $validator
            ->scalar('relationship_to_sae')
            ->allowEmpty('relationship_to_sae');

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
        $rules->add($rules->existsIn(['adr_id'], 'Adrs'));
        $rules->add($rules->existsIn(['dose_id'], 'Doses'));
        $rules->add($rules->existsIn(['route_id'], 'Routes'));
        $rules->add($rules->existsIn(['frequency_id'], 'Frequencies'));

        return $rules;
    }
}

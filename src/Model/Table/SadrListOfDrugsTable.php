<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SadrListOfDrugs Model
 *
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\BelongsTo $Sadrs
 * @property \App\Model\Table\SadrFollowupsTable|\Cake\ORM\Association\BelongsTo $SadrFollowups
 * @property \App\Model\Table\DosesTable|\Cake\ORM\Association\BelongsTo $Doses
 * @property \App\Model\Table\RoutesTable|\Cake\ORM\Association\BelongsTo $Routes
 * @property \App\Model\Table\FrequenciesTable|\Cake\ORM\Association\BelongsTo $Frequencies
 *
 * @method \App\Model\Entity\SadrListOfDrug get($primaryKey, $options = [])
 * @method \App\Model\Entity\SadrListOfDrug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SadrListOfDrug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SadrListOfDrug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SadrListOfDrug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SadrListOfDrug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SadrListOfDrug findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SadrListOfDrugsTable extends Table
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

        $this->setTable('sadr_list_of_drugs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sadrs', [
            'foreignKey' => 'sadr_id'
        ]);
        $this->belongsTo('SadrFollowups', [
            'foreignKey' => 'sadr_followup_id'
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
            ->scalar('brand_name')
            ->allowEmpty('brand_name');

        $validator
            ->scalar('dose')
            ->allowEmpty('dose');

        /*
            --Enable date validation later
            --Need to confirm how to validate based on changes to locale in bootstrap.php
            E.g
            $validator
            ->add('demo_example_date', 'valid', ['rule' => ['date','dmy']]) //Format valid '30-12-2015' or '30-12-05'
            ->requirePresence('demo_example_date', 'create')
            ->notEmpty('factura_fecha');
        */
        // $validator
        //     ->date('start_date')
        //     ->allowEmpty('start_date');

        // $validator
        //     ->date('stop_date')
        //     ->allowEmpty('stop_date');

        $validator
            ->scalar('indication')
            ->allowEmpty('indication');

        $validator
            ->scalar('suspected_drug')
            ->allowEmpty('suspected_drug');

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
        $rules->add($rules->existsIn(['dose_id'], 'Doses'));
        $rules->add($rules->existsIn(['route_id'], 'Routes'));
        $rules->add($rules->existsIn(['frequency_id'], 'Frequencies'));

        return $rules;
    }
}

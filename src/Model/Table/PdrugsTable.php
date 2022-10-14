<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pdrugs Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\QualityAssessmentsTable|\Cake\ORM\Association\BelongsTo $QualityAssessments
 * @property \App\Model\Table\StorageConditionsTable|\Cake\ORM\Association\HasMany $StorageConditions
 *
 * @method \App\Model\Entity\Pdrug get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pdrug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pdrug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pdrug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pdrug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pdrug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pdrug findOrCreate($search, callable $callback = null, $options = [])
 */
class PdrugsTable extends Table
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

        $this->setTable('pdrugs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('QualityAssessments', [
            'foreignKey' => 'quality_assessment_id'
        ]);
        $this->hasMany('StorageConditions', [
            'foreignKey' => 'pdrug_id'
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
            ->allowEmpty('composition');

        $validator
            ->scalar('composition_workspace')
            ->maxLength('composition_workspace', 4294967295)
            ->allowEmpty('composition_workspace');

        $validator
            ->scalar('composition_comment')
            ->maxLength('composition_comment', 4294967295)
            ->allowEmpty('composition_comment');

        $validator
            ->scalar('pharma_adequate')
            ->maxLength('pharma_adequate', 255)
            ->allowEmpty('pharma_adequate');

        $validator
            ->scalar('pharma_comments')
            ->maxLength('pharma_comments', 4294967295)
            ->allowEmpty('pharma_comments');

        $validator
            ->scalar('manu_identified')
            ->maxLength('manu_identified', 255)
            ->allowEmpty('manu_identified');

        $validator
            ->scalar('manu_workspace')
            ->maxLength('manu_workspace', 4294967295)
            ->allowEmpty('manu_workspace');

        $validator
            ->scalar('manu_comments')
            ->maxLength('manu_comments', 4294967295)
            ->allowEmpty('manu_comments');

        $validator
            ->scalar('batch_described')
            ->maxLength('batch_described', 255)
            ->allowEmpty('batch_described');

        $validator
            ->scalar('batch_workspace')
            ->maxLength('batch_workspace', 4294967295)
            ->allowEmpty('batch_workspace');

        $validator
            ->scalar('batch_comments')
            ->maxLength('batch_comments', 4294967295)
            ->allowEmpty('batch_comments');

        $validator
            ->scalar('control_described')
            ->maxLength('control_described', 255)
            ->allowEmpty('control_described');

        $validator
            ->scalar('control_workspace')
            ->maxLength('control_workspace', 4294967295)
            ->allowEmpty('control_workspace');

        $validator
            ->scalar('control_comments')
            ->maxLength('control_comments', 4294967295)
            ->allowEmpty('control_comments');

        $validator
            ->scalar('control_steps_described')
            ->maxLength('control_steps_described', 255)
            ->allowEmpty('control_steps_described');

        $validator
            ->scalar('control_steps_comments')
            ->maxLength('control_steps_comments', 4294967295)
            ->allowEmpty('control_steps_comments');

        $validator
            ->scalar('validation_described')
            ->maxLength('validation_described', 255)
            ->allowEmpty('validation_described');

        $validator
            ->scalar('validation_workspace')
            ->maxLength('validation_workspace', 4294967295)
            ->allowEmpty('validation_workspace');

        $validator
            ->scalar('validation_comments')
            ->maxLength('validation_comments', 4294967295)
            ->allowEmpty('validation_comments');

        $validator
            ->scalar('specification_criteria')
            ->maxLength('specification_criteria', 255)
            ->allowEmpty('specification_criteria');

        $validator
            ->scalar('specifications_comments')
            ->maxLength('specifications_comments', 4294967295)
            ->allowEmpty('specifications_comments');

        $validator
            ->scalar('analytical_described')
            ->maxLength('analytical_described', 255)
            ->allowEmpty('analytical_described');

        $validator
            ->scalar('analytical_comments')
            ->maxLength('analytical_comments', 4294967295)
            ->allowEmpty('analytical_comments');

        $validator
            ->scalar('procedures_validated')
            ->maxLength('procedures_validated', 255)
            ->allowEmpty('procedures_validated');

        $validator
            ->scalar('procedures_comments')
            ->maxLength('procedures_comments', 4294967295)
            ->allowEmpty('procedures_comments');

        $validator
            ->scalar('justification_satisfactory')
            ->maxLength('justification_satisfactory', 255)
            ->allowEmpty('justification_satisfactory');

        $validator
            ->scalar('justification_comments')
            ->maxLength('justification_comments', 4294967295)
            ->allowEmpty('justification_comments');

        $validator
            ->scalar('justification_workspace')
            ->maxLength('justification_workspace', 4294967295)
            ->allowEmpty('justification_workspace');

        $validator
            ->scalar('animal_origin')
            ->maxLength('animal_origin', 255)
            ->allowEmpty('animal_origin');

        $validator
            ->scalar('tse_satisfactory')
            ->maxLength('tse_satisfactory', 255)
            ->allowEmpty('tse_satisfactory');

        $validator
            ->scalar('tse_comments')
            ->maxLength('tse_comments', 4294967295)
            ->allowEmpty('tse_comments');

        $validator
            ->scalar('excipients_controlled')
            ->maxLength('excipients_controlled', 255)
            ->allowEmpty('excipients_controlled');

        $validator
            ->scalar('excipients_workspace')
            ->maxLength('excipients_workspace', 4294967295)
            ->allowEmpty('excipients_workspace');

        $validator
            ->scalar('excipients_comments')
            ->maxLength('excipients_comments', 4294967295)
            ->allowEmpty('excipients_comments');

        $validator
            ->scalar('appropriate_limits')
            ->maxLength('appropriate_limits', 255)
            ->allowEmpty('appropriate_limits');

        $validator
            ->scalar('appropriate_control_workspace')
            ->maxLength('appropriate_control_workspace', 4294967295)
            ->allowEmpty('appropriate_control_workspace');

        $validator
            ->scalar('appropriate_control_comments')
            ->maxLength('appropriate_control_comments', 4294967295)
            ->allowEmpty('appropriate_control_comments');

        $validator
            ->scalar('analytical_methods')
            ->maxLength('analytical_methods', 255)
            ->allowEmpty('analytical_methods');

        $validator
            ->scalar('analytical_methods_comments')
            ->maxLength('analytical_methods_comments', 4294967295)
            ->allowEmpty('analytical_methods_comments');

        $validator
            ->scalar('validation_procedure')
            ->maxLength('validation_procedure', 255)
            ->allowEmpty('validation_procedure');

        $validator
            ->scalar('validation_results')
            ->maxLength('validation_results', 255)
            ->allowEmpty('validation_results');

        $validator
            ->scalar('validation_second_comments')
            ->maxLength('validation_second_comments', 4294967295)
            ->allowEmpty('validation_second_comments');

        $validator
            ->scalar('batch_analyses')
            ->maxLength('batch_analyses', 255)
            ->allowEmpty('batch_analyses');

        $validator
            ->scalar('batch_described_comments')
            ->maxLength('batch_described_comments', 255)
            ->allowEmpty('batch_described_comments');

        $validator
            ->scalar('impurities_acceptable')
            ->maxLength('impurities_acceptable', 255)
            ->allowEmpty('impurities_acceptable');

        $validator
            ->scalar('impurities_workspace')
            ->maxLength('impurities_workspace', 4294967295)
            ->allowEmpty('impurities_workspace');

        $validator
            ->scalar('impurities_comments')
            ->maxLength('impurities_comments', 4294967295)
            ->allowEmpty('impurities_comments');

        $validator
            ->scalar('product_specifications')
            ->maxLength('product_specifications', 255)
            ->allowEmpty('product_specifications');

        $validator
            ->scalar('justification_satis_comments')
            ->maxLength('justification_satis_comments', 4294967295)
            ->allowEmpty('justification_satis_comments');

        $validator
            ->scalar('justification_specs_comments')
            ->maxLength('justification_specs_comments', 4294967295)
            ->allowEmpty('justification_specs_comments');

        $validator
            ->scalar('justification_specs_workspace')
            ->maxLength('justification_specs_workspace', 4294967295)
            ->allowEmpty('justification_specs_workspace');

        $validator
            ->scalar('reference_standards')
            ->maxLength('reference_standards', 255)
            ->allowEmpty('reference_standards');

        $validator
            ->scalar('reference_standards_comments')
            ->maxLength('reference_standards_comments', 4294967295)
            ->allowEmpty('reference_standards_comments');

        $validator
            ->scalar('closure_system')
            ->maxLength('closure_system', 255)
            ->allowEmpty('closure_system');

        $validator
            ->scalar('closure_system_comments')
            ->maxLength('closure_system_comments', 4294967295)
            ->allowEmpty('closure_system_comments');

        $validator
            ->scalar('stability_tests')
            ->maxLength('stability_tests', 255)
            ->allowEmpty('stability_tests');

        $validator
            ->scalar('stability_tests_workspace')
            ->maxLength('stability_tests_workspace', 4294967295)
            ->allowEmpty('stability_tests_workspace');

        $validator
            ->scalar('substantial_amendment')
            ->maxLength('substantial_amendment', 255)
            ->allowEmpty('substantial_amendment');

        $validator
            ->scalar('registered_protocol')
            ->maxLength('registered_protocol', 255)
            ->allowEmpty('registered_protocol');

        $validator
            ->scalar('pdrug_comments')
            ->maxLength('pdrug_comments', 4294967295)
            ->allowEmpty('pdrug_comments');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

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
        $rules->add($rules->existsIn(['application_id'], 'Applications'));
        $rules->add($rules->existsIn(['quality_assessment_id'], 'QualityAssessments'));

        return $rules;
    }
}

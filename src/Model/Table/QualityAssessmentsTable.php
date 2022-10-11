<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QualityAssessments Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ComplianceTable|\Cake\ORM\Association\HasMany $Compliance
 * @property \App\Model\Table\SdrugsTable|\Cake\ORM\Association\HasMany $Sdrugs
 *
 * @method \App\Model\Entity\QualityAssessment get($primaryKey, $options = [])
 * @method \App\Model\Entity\QualityAssessment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QualityAssessment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QualityAssessment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QualityAssessment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QualityAssessment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QualityAssessment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QualityAssessmentsTable extends Table
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

        $this->setTable('quality_assessments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Compliance', [
            'foreignKey' => 'quality_assessment_id'
        ]);
        $this->hasMany('Sdrugs', [
            'foreignKey' => 'quality_assessment_id'
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
            ->scalar('code')
            ->maxLength('code', 255)
            ->allowEmpty('code');

        $validator
            ->scalar('quality_workspace')
            ->maxLength('quality_workspace', 4294967295)
            ->allowEmpty('quality_workspace');

        $validator
            ->boolean('gmp_smpc')
            ->allowEmpty('gmp_smpc');

        $validator
            ->boolean('gmp_included')
            ->allowEmpty('gmp_included');

        $validator
            ->scalar('labelling')
            ->maxLength('labelling', 255)
            ->allowEmpty('labelling');

        $validator
            ->scalar('labelling_comments')
            ->maxLength('labelling_comments', 4294967295)
            ->allowEmpty('labelling_comments');

        $validator
            ->scalar('blinding_workspace')
            ->maxLength('blinding_workspace', 4294967295)
            ->allowEmpty('blinding_workspace');

        $validator
            ->scalar('blinding_comments')
            ->maxLength('blinding_comments', 4294967295)
            ->allowEmpty('blinding_comments');

        $validator
            ->scalar('acceptable')
            ->maxLength('acceptable', 255)
            ->allowEmpty('acceptable');

        $validator
            ->scalar('supplementary_need')
            ->maxLength('supplementary_need', 255)
            ->allowEmpty('supplementary_need');

        $validator
            ->scalar('overall_comments')
            ->maxLength('overall_comments', 4294967295)
            ->allowEmpty('overall_comments');

        $validator
            ->scalar('submitted')
            ->maxLength('submitted', 255)
            ->allowEmpty('submitted');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->boolean('drug_eur')
            ->allowEmpty('drug_eur');

        $validator
            ->boolean('drug_usp')
            ->allowEmpty('drug_usp');

        $validator
            ->boolean('drug_none')
            ->allowEmpty('drug_none');

        $validator
            ->scalar('drug_authorised')
            ->maxLength('drug_authorised', 255)
            ->allowEmpty('drug_authorised');

        $validator
            ->scalar('drug_ssection')
            ->maxLength('drug_ssection', 4294967295)
            ->allowEmpty('drug_ssection');

        $validator
            ->scalar('nomen_workspace')
            ->maxLength('nomen_workspace', 4294967295)
            ->allowEmpty('nomen_workspace');

        $validator
            ->scalar('noment_comment')
            ->maxLength('noment_comment', 4294967295)
            ->allowEmpty('noment_comment');

        $validator
            ->scalar('str_subsection')
            ->maxLength('str_subsection', 255)
            ->allowEmpty('str_subsection');

        $validator
            ->scalar('str_workspace')
            ->maxLength('str_workspace', 4294967295)
            ->allowEmpty('str_workspace');

        $validator
            ->scalar('str_comment')
            ->maxLength('str_comment', 4294967295)
            ->allowEmpty('str_comment');

        $validator
            ->scalar('gen_prop_adequately')
            ->maxLength('gen_prop_adequately', 255)
            ->allowEmpty('gen_prop_adequately');

        $validator
            ->scalar('gen_prop_workspace')
            ->maxLength('gen_prop_workspace', 4294967295)
            ->allowEmpty('gen_prop_workspace');

        $validator
            ->scalar('gen_prop_comment')
            ->maxLength('gen_prop_comment', 4294967295)
            ->allowEmpty('gen_prop_comment');

        $validator
            ->scalar('manu_identified')
            ->maxLength('manu_identified', 255)
            ->allowEmpty('manu_identified');

        $validator
            ->scalar('process_described')
            ->maxLength('process_described', 255)
            ->allowEmpty('process_described');

        $validator
            ->scalar('gen_manu_comment')
            ->maxLength('gen_manu_comment', 4294967295)
            ->allowEmpty('gen_manu_comment');

        $validator
            ->scalar('process_workspace')
            ->maxLength('process_workspace', 4294967295)
            ->allowEmpty('process_workspace');

        $validator
            ->scalar('workspace_comment')
            ->maxLength('workspace_comment', 4294967295)
            ->allowEmpty('workspace_comment');

        $validator
            ->scalar('control_described')
            ->maxLength('control_described', 255)
            ->allowEmpty('control_described');

        $validator
            ->scalar('control_workspace')
            ->maxLength('control_workspace', 4294967295)
            ->allowEmpty('control_workspace');

        $validator
            ->scalar('control_comment')
            ->maxLength('control_comment', 4294967295)
            ->allowEmpty('control_comment');

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
            ->scalar('validation_comments')
            ->maxLength('validation_comments', 4294967295)
            ->allowEmpty('validation_comments');

        $validator
            ->scalar('manufacturing_described')
            ->maxLength('manufacturing_described', 255)
            ->allowEmpty('manufacturing_described');

        $validator
            ->scalar('manufacturing_workspace')
            ->maxLength('manufacturing_workspace', 4294967295)
            ->allowEmpty('manufacturing_workspace');

        $validator
            ->scalar('manufacturing_comments')
            ->maxLength('manufacturing_comments', 4294967295)
            ->allowEmpty('manufacturing_comments');

        $validator
            ->scalar('substance_described')
            ->maxLength('substance_described', 255)
            ->allowEmpty('substance_described');

        $validator
            ->scalar('substance_workspace')
            ->maxLength('substance_workspace', 4294967295)
            ->allowEmpty('substance_workspace');

        $validator
            ->scalar('substance_comments')
            ->maxLength('substance_comments', 4294967295)
            ->allowEmpty('substance_comments');

        $validator
            ->scalar('impurities_characterised')
            ->maxLength('impurities_characterised', 255)
            ->allowEmpty('impurities_characterised');

        $validator
            ->scalar('impurities_workspace')
            ->maxLength('impurities_workspace', 4294967295)
            ->allowEmpty('impurities_workspace');

        $validator
            ->scalar('impurities_comments')
            ->maxLength('impurities_comments', 4294967295)
            ->allowEmpty('impurities_comments');

        $validator
            ->scalar('specifications_appropriate')
            ->maxLength('specifications_appropriate', 255)
            ->allowEmpty('specifications_appropriate');

        $validator
            ->scalar('specifications_workspace')
            ->maxLength('specifications_workspace', 4294967295)
            ->allowEmpty('specifications_workspace');

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
            ->scalar('acceptance_presented')
            ->maxLength('acceptance_presented', 255)
            ->allowEmpty('acceptance_presented');

        $validator
            ->scalar('suitability_explained')
            ->maxLength('suitability_explained', 255)
            ->allowEmpty('suitability_explained');

        $validator
            ->scalar('validation_procedures_comments')
            ->maxLength('validation_procedures_comments', 4294967295)
            ->allowEmpty('validation_procedures_comments');

        $validator
            ->scalar('batch_provided')
            ->maxLength('batch_provided', 255)
            ->allowEmpty('batch_provided');

        $validator
            ->scalar('batch_workspace')
            ->maxLength('batch_workspace', 4294967295)
            ->allowEmpty('batch_workspace');

        $validator
            ->scalar('batch_comments')
            ->maxLength('batch_comments', 4294967295)
            ->allowEmpty('batch_comments');

        $validator
            ->scalar('justification_acceptable')
            ->maxLength('justification_acceptable', 255)
            ->allowEmpty('justification_acceptable');

        $validator
            ->scalar('justification_workspace')
            ->maxLength('justification_workspace', 4294967295)
            ->allowEmpty('justification_workspace');

        $validator
            ->scalar('justification_comments')
            ->maxLength('justification_comments', 4294967295)
            ->allowEmpty('justification_comments');

        $validator
            ->scalar('reference_described')
            ->maxLength('reference_described', 255)
            ->allowEmpty('reference_described');

        $validator
            ->scalar('reference_comments')
            ->maxLength('reference_comments', 4294967295)
            ->allowEmpty('reference_comments');

        $validator
            ->scalar('container_suitable')
            ->maxLength('container_suitable', 255)
            ->allowEmpty('container_suitable');

        $validator
            ->scalar('container_comments')
            ->maxLength('container_comments', 4294967295)
            ->allowEmpty('container_comments');

        $validator
            ->scalar('stability_satisfactory')
            ->maxLength('stability_satisfactory', 255)
            ->allowEmpty('stability_satisfactory');

        $validator
            ->scalar('stability_workspace')
            ->maxLength('stability_workspace', 4294967295)
            ->allowEmpty('stability_workspace');

        $validator
            ->scalar('medical_product')
            ->maxLength('medical_product', 255)
            ->allowEmpty('medical_product');

        $validator
            ->scalar('medical_product_workspace')
            ->maxLength('medical_product_workspace', 4294967295)
            ->allowEmpty('medical_product_workspace');

        $validator
            ->scalar('medical_product_comments')
            ->maxLength('medical_product_comments', 4294967295)
            ->allowEmpty('medical_product_comments');

        $validator
            ->scalar('agents_adequate')
            ->maxLength('agents_adequate', 255)
            ->allowEmpty('agents_adequate');

        $validator
            ->scalar('agents_workspace')
            ->maxLength('agents_workspace', 4294967295)
            ->allowEmpty('agents_workspace');

        $validator
            ->scalar('agents_comments')
            ->maxLength('agents_comments', 4294967295)
            ->allowEmpty('agents_comments');

        $validator
            ->scalar('novel_excipients')
            ->maxLength('novel_excipients', 255)
            ->allowEmpty('novel_excipients');

        $validator
            ->scalar('novel_workspace')
            ->maxLength('novel_workspace', 4294967295)
            ->allowEmpty('novel_workspace');

        $validator
            ->scalar('novel_comments')
            ->maxLength('novel_comments', 4294967295)
            ->allowEmpty('novel_comments');

        $validator
            ->scalar('solvents_info')
            ->maxLength('solvents_info', 255)
            ->allowEmpty('solvents_info');

        $validator
            ->scalar('solvents_workspace')
            ->maxLength('solvents_workspace', 4294967295)
            ->allowEmpty('solvents_workspace');

        $validator
            ->scalar('solvents_comments')
            ->maxLength('solvents_comments', 4294967295)
            ->allowEmpty('solvents_comments');

        $validator
            ->scalar('placebo')
            ->maxLength('placebo', 255)
            ->allowEmpty('placebo');

        $validator
            ->scalar('placebo_workspace')
            ->maxLength('placebo_workspace', 4294967295)
            ->allowEmpty('placebo_workspace');

        $validator
            ->scalar('placebo_comments')
            ->maxLength('placebo_comments', 4294967295)
            ->allowEmpty('placebo_comments');

        $validator
            ->scalar('auxiliary')
            ->maxLength('auxiliary', 255)
            ->allowEmpty('auxiliary');

        $validator
            ->scalar('auxiliary_workspace')
            ->maxLength('auxiliary_workspace', 4294967295)
            ->allowEmpty('auxiliary_workspace');

        $validator
            ->scalar('auxiliary_comments')
            ->maxLength('auxiliary_comments', 4294967295)
            ->allowEmpty('auxiliary_comments');

        $validator
            ->scalar('additional')
            ->maxLength('additional', 4294967295)
            ->allowEmpty('additional');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

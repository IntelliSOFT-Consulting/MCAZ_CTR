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
 * @property \App\Model\Table\SdrugTable|\Cake\ORM\Association\HasMany $Sdrug
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
        $this->hasMany('Sdrug', [
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
            ->allowEmpty('code');

        $validator
            ->scalar('quality_workspace')
            ->allowEmpty('quality_workspace');

        $validator
            ->boolean('gmp_smpc')
            ->allowEmpty('gmp_smpc');

        $validator
            ->boolean('gmp_included')
            ->allowEmpty('gmp_included');

        $validator
            ->scalar('labelling')
            ->allowEmpty('labelling');

        $validator
            ->scalar('labelling_comments')
            ->allowEmpty('labelling_comments');

        $validator
            ->scalar('blinding_workspace')
            ->allowEmpty('blinding_workspace');

        $validator
            ->scalar('blinding_comments')
            ->allowEmpty('blinding_comments');

        $validator
            ->scalar('acceptable')
            ->allowEmpty('acceptable');

        $validator
            ->scalar('supplementary_need')
            ->allowEmpty('supplementary_need');

        $validator
            ->scalar('overall_comments')
            ->allowEmpty('overall_comments');

        $validator
            ->scalar('submitted')
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
            ->allowEmpty('drug_authorised');

        $validator
            ->scalar('drug_ssection')
            ->allowEmpty('drug_ssection');

        $validator
            ->scalar('nomen_workspace')
            ->allowEmpty('nomen_workspace');

        $validator
            ->scalar('noment_comment')
            ->allowEmpty('noment_comment');

        $validator
            ->scalar('str_subsection')
            ->allowEmpty('str_subsection');

        $validator
            ->scalar('str_workspace')
            ->allowEmpty('str_workspace');

        $validator
            ->scalar('str_comment')
            ->allowEmpty('str_comment');

        $validator
            ->scalar('gen_prop_adequately')
            ->allowEmpty('gen_prop_adequately');

        $validator
            ->scalar('gen_prop_workspace')
            ->allowEmpty('gen_prop_workspace');

        $validator
            ->scalar('gen_prop_comment')
            ->allowEmpty('gen_prop_comment');

        $validator
            ->scalar('manu_identified')
            ->allowEmpty('manu_identified');

        $validator
            ->scalar('process_described')
            ->allowEmpty('process_described');

        $validator
            ->scalar('gen_manu_comment')
            ->allowEmpty('gen_manu_comment');

        $validator
            ->scalar('process_workspace')
            ->allowEmpty('process_workspace');

        $validator
            ->scalar('workspace_comment')
            ->allowEmpty('workspace_comment');

        $validator
            ->scalar('control_described')
            ->allowEmpty('control_described');

        $validator
            ->scalar('control_workspace')
            ->allowEmpty('control_workspace');

        $validator
            ->scalar('control_comment')
            ->allowEmpty('control_comment');

        $validator
            ->scalar('control_steps_described')
            ->allowEmpty('control_steps_described');

        $validator
            ->scalar('control_steps_comments')
            ->allowEmpty('control_steps_comments');

        $validator
            ->scalar('validation_described')
            ->allowEmpty('validation_described');

        $validator
            ->scalar('validation_comments')
            ->allowEmpty('validation_comments');

        $validator
            ->scalar('manufacturing_described')
            ->allowEmpty('manufacturing_described');

        $validator
            ->scalar('manufacturing_workspace')
            ->allowEmpty('manufacturing_workspace');

        $validator
            ->scalar('manufacturing_comments')
            ->allowEmpty('manufacturing_comments');

        $validator
            ->scalar('substance_described')
            ->allowEmpty('substance_described');

        $validator
            ->scalar('substance_workspace')
            ->allowEmpty('substance_workspace');

        $validator
            ->scalar('substance_comments')
            ->allowEmpty('substance_comments');

        $validator
            ->scalar('impurities_characterised')
            ->allowEmpty('impurities_characterised');

        $validator
            ->scalar('impurities_workspace')
            ->allowEmpty('impurities_workspace');

        $validator
            ->scalar('impurities_comments')
            ->allowEmpty('impurities_comments');

        $validator
            ->scalar('specifications_appropriate')
            ->allowEmpty('specifications_appropriate');

        $validator
            ->scalar('specifications_workspace')
            ->allowEmpty('specifications_workspace');

        $validator
            ->scalar('specifications_comments')
            ->allowEmpty('specifications_comments');

        $validator
            ->scalar('analytical_described')
            ->allowEmpty('analytical_described');

        $validator
            ->scalar('analytical_comments')
            ->allowEmpty('analytical_comments');

        $validator
            ->scalar('acceptance_presented')
            ->allowEmpty('acceptance_presented');

        $validator
            ->scalar('suitability_explained')
            ->allowEmpty('suitability_explained');

        $validator
            ->scalar('validation_procedures_comments')
            ->allowEmpty('validation_procedures_comments');

        $validator
            ->scalar('batch_provided')
            ->allowEmpty('batch_provided');

        $validator
            ->scalar('batch_workspace')
            ->allowEmpty('batch_workspace');

        $validator
            ->scalar('batch_comments')
            ->allowEmpty('batch_comments');

        $validator
            ->scalar('justification_acceptable')
            ->allowEmpty('justification_acceptable');

        $validator
            ->scalar('justification_workspace')
            ->allowEmpty('justification_workspace');

        $validator
            ->scalar('justification_comments')
            ->allowEmpty('justification_comments');

        $validator
            ->scalar('reference_described')
            ->allowEmpty('reference_described');

        $validator
            ->scalar('reference_comments')
            ->allowEmpty('reference_comments');

        $validator
            ->scalar('container_suitable')
            ->allowEmpty('container_suitable');

        $validator
            ->scalar('container_comments')
            ->allowEmpty('container_comments');

        $validator
            ->scalar('stability_satisfactory')
            ->allowEmpty('stability_satisfactory');

        $validator
            ->scalar('stability_workspace')
            ->allowEmpty('stability_workspace');

        $validator
            ->scalar('medical_product')
            ->allowEmpty('medical_product');

        $validator
            ->scalar('medical_product_workspace')
            ->allowEmpty('medical_product_workspace');

        $validator
            ->scalar('medical_product_comments')
            ->allowEmpty('medical_product_comments');

        $validator
            ->scalar('agents_adequate')
            ->allowEmpty('agents_adequate');

        $validator
            ->scalar('agents_workspace')
            ->allowEmpty('agents_workspace');

        $validator
            ->scalar('agents_comments')
            ->allowEmpty('agents_comments');

        $validator
            ->scalar('novel_excipients')
            ->allowEmpty('novel_excipients');

        $validator
            ->scalar('novel_workspace')
            ->allowEmpty('novel_workspace');

        $validator
            ->scalar('novel_comments')
            ->allowEmpty('novel_comments');

        $validator
            ->scalar('solvents_info')
            ->allowEmpty('solvents_info');

        $validator
            ->scalar('solvents_workspace')
            ->allowEmpty('solvents_workspace');

        $validator
            ->scalar('solvents_comments')
            ->allowEmpty('solvents_comments');

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

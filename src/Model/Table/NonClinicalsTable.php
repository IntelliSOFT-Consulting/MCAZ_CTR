<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NonClinicals Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\NonClinical get($primaryKey, $options = [])
 * @method \App\Model\Entity\NonClinical newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NonClinical[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NonClinical|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NonClinical patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NonClinical[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NonClinical findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NonClinicalsTable extends Table
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

        $this->setTable('non_clinicals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('basis_provided')
            ->maxLength('basis_provided', 255)
            ->requirePresence('basis_provided', 'create')
            ->notEmpty('basis_provided');

        $validator
            ->scalar('primary_comment')
            ->maxLength('primary_comment', 4294967295)
            ->allowEmpty('primary_comment');

        $validator
            ->scalar('relevant_vitro_vivo')
            ->maxLength('relevant_vitro_vivo', 255)
            ->allowEmpty('relevant_vitro_vivo');

        $validator
            ->scalar('pharmacological_exposure')
            ->maxLength('pharmacological_exposure', 255)
            ->allowEmpty('pharmacological_exposure');

        $validator
            ->scalar('active_metabolites')
            ->maxLength('active_metabolites', 255)
            ->allowEmpty('active_metabolites');

        $validator
            ->scalar('imp_compound')
            ->maxLength('imp_compound', 255)
            ->allowEmpty('imp_compound');

        $validator
            ->scalar('off_target_identified')
            ->maxLength('off_target_identified', 255)
            ->allowEmpty('off_target_identified');

        $validator
            ->scalar('off_target_effects')
            ->maxLength('off_target_effects', 255)
            ->allowEmpty('off_target_effects');

        $validator
            ->scalar('secondary_comment')
            ->maxLength('secondary_comment', 4294967295)
            ->allowEmpty('secondary_comment');

        $validator
            ->scalar('cardiovascular')
            ->maxLength('cardiovascular', 255)
            ->allowEmpty('cardiovascular');

        $validator
            ->scalar('cardiovascular_comments')
            ->maxLength('cardiovascular_comments', 4294967295)
            ->allowEmpty('cardiovascular_comments');

        $validator
            ->scalar('respiratory')
            ->maxLength('respiratory', 255)
            ->allowEmpty('respiratory');

        $validator
            ->scalar('respiratory_comments')
            ->maxLength('respiratory_comments', 4294967295)
            ->allowEmpty('respiratory_comments');

        $validator
            ->scalar('pharmacology_comment')
            ->maxLength('pharmacology_comment', 4294967295)
            ->allowEmpty('pharmacology_comment');

        $validator
            ->scalar('cns')
            ->maxLength('cns', 255)
            ->allowEmpty('cns');

        $validator
            ->scalar('cns_comments')
            ->maxLength('cns_comments', 4294967295)
            ->allowEmpty('cns_comments');

        $validator
            ->scalar('other')
            ->maxLength('other', 255)
            ->allowEmpty('other');

        $validator
            ->scalar('other_comments')
            ->maxLength('other_comments', 4294967295)
            ->allowEmpty('other_comments');

        $validator
            ->scalar('significant_concerns')
            ->maxLength('significant_concerns', 255)
            ->allowEmpty('significant_concerns');

        $validator
            ->scalar('planned_exposure')
            ->maxLength('planned_exposure', 255)
            ->allowEmpty('planned_exposure');

        $validator
            ->scalar('safety_comment')
            ->maxLength('safety_comment', 4294967295)
            ->allowEmpty('safety_comment');

        $validator
            ->scalar('interactions_identified')
            ->maxLength('interactions_identified', 255)
            ->allowEmpty('interactions_identified');

        $validator
            ->scalar('Pharmacodynamic_comment')
            ->maxLength('Pharmacodynamic_comment', 4294967295)
            ->allowEmpty('Pharmacodynamic_comment');

        $validator
            ->scalar('adequate_analysis')
            ->maxLength('adequate_analysis', 255)
            ->allowEmpty('adequate_analysis');

        $validator
            ->scalar('analysis_comment')
            ->maxLength('analysis_comment', 4294967295)
            ->allowEmpty('analysis_comment');

        $validator
            ->scalar('absorption')
            ->maxLength('absorption', 255)
            ->allowEmpty('absorption');

        $validator
            ->scalar('absorption_comments')
            ->maxLength('absorption_comments', 4294967295)
            ->allowEmpty('absorption_comments');

        $validator
            ->scalar('distribution')
            ->maxLength('distribution', 255)
            ->allowEmpty('distribution');

        $validator
            ->scalar('distribution_comments')
            ->maxLength('distribution_comments', 4294967295)
            ->allowEmpty('distribution_comments');

        $validator
            ->scalar('metabolism')
            ->maxLength('metabolism', 255)
            ->allowEmpty('metabolism');

        $validator
            ->scalar('metabolism_comments')
            ->maxLength('metabolism_comments', 4294967295)
            ->allowEmpty('metabolism_comments');

        $validator
            ->scalar('excretion')
            ->maxLength('excretion', 255)
            ->allowEmpty('excretion');

        $validator
            ->scalar('excretion_comments')
            ->maxLength('excretion_comments', 4294967295)
            ->allowEmpty('excretion_comments');

        $validator
            ->scalar('adme_concerns')
            ->maxLength('adme_concerns', 255)
            ->allowEmpty('adme_concerns');

        $validator
            ->scalar('major_metabolites')
            ->maxLength('major_metabolites', 255)
            ->allowEmpty('major_metabolites');

        $validator
            ->scalar('unique_metabolites')
            ->maxLength('unique_metabolites', 255)
            ->allowEmpty('unique_metabolites');

        $validator
            ->scalar('pharmacokinetics_comment')
            ->maxLength('pharmacokinetics_comment', 4294967295)
            ->allowEmpty('pharmacokinetics_comment');

        $validator
            ->scalar('enzyme_inhibition')
            ->maxLength('enzyme_inhibition', 255)
            ->allowEmpty('enzyme_inhibition');

        $validator
            ->scalar('enzyme_inhibition_comments')
            ->maxLength('enzyme_inhibition_comments', 4294967295)
            ->allowEmpty('enzyme_inhibition_comments');

        $validator
            ->scalar('enzyme_induction')
            ->maxLength('enzyme_induction', 255)
            ->allowEmpty('enzyme_induction');

        $validator
            ->scalar('enzyme_induction_comments')
            ->maxLength('enzyme_induction_comments', 4294967295)
            ->allowEmpty('enzyme_induction_comments');

        $validator
            ->scalar('transporter')
            ->maxLength('transporter', 255)
            ->allowEmpty('transporter');

        $validator
            ->scalar('transporter_comments')
            ->maxLength('transporter_comments', 4294967295)
            ->allowEmpty('transporter_comments');

        $validator
            ->scalar('co_pathways')
            ->maxLength('co_pathways', 255)
            ->allowEmpty('co_pathways');

        $validator
            ->scalar('co_pathways_comments')
            ->maxLength('co_pathways_comments', 4294967295)
            ->allowEmpty('co_pathways_comments');

        $validator
            ->scalar('drug_interaction')
            ->maxLength('drug_interaction', 255)
            ->allowEmpty('drug_interaction');

        $validator
            ->scalar('interaction_highlighted')
            ->maxLength('interaction_highlighted', 255)
            ->allowEmpty('interaction_highlighted');

        $validator
            ->scalar('drug_interaction_comment')
            ->maxLength('drug_interaction_comment', 4294967295)
            ->allowEmpty('drug_interaction_comment');

        $validator
            ->scalar('pk_studies')
            ->maxLength('pk_studies', 255)
            ->allowEmpty('pk_studies');

        $validator
            ->scalar('concerns_identified')
            ->maxLength('concerns_identified', 255)
            ->allowEmpty('concerns_identified');

        $validator
            ->scalar('identified_studies_comment')
            ->maxLength('identified_studies_comment', 4294967295)
            ->allowEmpty('identified_studies_comment');

        $validator
            ->scalar('toxicologically_relevant')
            ->maxLength('toxicologically_relevant', 255)
            ->allowEmpty('toxicologically_relevant');

        $validator
            ->scalar('human_pharmacology')
            ->maxLength('human_pharmacology', 255)
            ->allowEmpty('human_pharmacology');

        $validator
            ->scalar('human_pk')
            ->maxLength('human_pk', 255)
            ->allowEmpty('human_pk');

        $validator
            ->scalar('well_designed_studies')
            ->maxLength('well_designed_studies', 255)
            ->allowEmpty('well_designed_studies');

        $validator
            ->scalar('toxicology_comment')
            ->maxLength('toxicology_comment', 4294967295)
            ->allowEmpty('toxicology_comment');

        $validator
            ->scalar('toxicities_identified')
            ->maxLength('toxicities_identified', 255)
            ->allowEmpty('toxicities_identified');

        $validator
            ->scalar('sufficient_margins')
            ->maxLength('sufficient_margins', 255)
            ->allowEmpty('sufficient_margins');

        $validator
            ->scalar('single_dose_comment')
            ->maxLength('single_dose_comment', 4294967295)
            ->allowEmpty('single_dose_comment');

        $validator
            ->scalar('repeat_toxicities_identified')
            ->maxLength('repeat_toxicities_identified', 255)
            ->allowEmpty('repeat_toxicities_identified');

        $validator
            ->scalar('repeat_sufficient_margins')
            ->maxLength('repeat_sufficient_margins', 255)
            ->allowEmpty('repeat_sufficient_margins');

        $validator
            ->scalar('repeat_treatment_duration')
            ->maxLength('repeat_treatment_duration', 255)
            ->allowEmpty('repeat_treatment_duration');

        $validator
            ->scalar('repeat_dose_comment')
            ->maxLength('repeat_dose_comment', 4294967295)
            ->allowEmpty('repeat_dose_comment');

        $validator
            ->scalar('gene_mutations')
            ->maxLength('gene_mutations', 4294967295)
            ->allowEmpty('gene_mutations');

        $validator
            ->scalar('gene_mutation_results')
            ->maxLength('gene_mutation_results', 255)
            ->allowEmpty('gene_mutation_results');

        $validator
            ->scalar('vitro_mammalian')
            ->maxLength('vitro_mammalian', 4294967295)
            ->allowEmpty('vitro_mammalian');

        $validator
            ->scalar('vitro_mammalian_results')
            ->maxLength('vitro_mammalian_results', 255)
            ->allowEmpty('vitro_mammalian_results');

        $validator
            ->scalar('vivo_genotoxicit')
            ->maxLength('vivo_genotoxicit', 4294967295)
            ->allowEmpty('vivo_genotoxicit');

        $validator
            ->scalar('vivo_genotoxicit_results')
            ->maxLength('vivo_genotoxicit_results', 255)
            ->allowEmpty('vivo_genotoxicit_results');

        $validator
            ->scalar('additional_assays')
            ->maxLength('additional_assays', 4294967295)
            ->allowEmpty('additional_assays');

        $validator
            ->scalar('additional_assays_results')
            ->maxLength('additional_assays_results', 255)
            ->allowEmpty('additional_assays_results');

        $validator
            ->scalar('potential_genotoxic')
            ->maxLength('potential_genotoxic', 255)
            ->allowEmpty('potential_genotoxic');

        $validator
            ->scalar('genotoxicity_comment')
            ->maxLength('genotoxicity_comment', 4294967295)
            ->allowEmpty('genotoxicity_comment');

        $validator
            ->scalar('carcinogenicity')
            ->maxLength('carcinogenicity', 255)
            ->allowEmpty('carcinogenicity');

        $validator
            ->scalar('carcinogenicity_exposure')
            ->maxLength('carcinogenicity_exposure', 255)
            ->allowEmpty('carcinogenicity_exposure');

        $validator
            ->scalar('carcinogenicity_comment')
            ->maxLength('carcinogenicity_comment', 4294967295)
            ->allowEmpty('carcinogenicity_comment');

        $validator
            ->scalar('fertility')
            ->maxLength('fertility', 255)
            ->allowEmpty('fertility');

        $validator
            ->scalar('fertility_findings')
            ->maxLength('fertility_findings', 4294967295)
            ->allowEmpty('fertility_findings');

        $validator
            ->scalar('embryo_dev')
            ->maxLength('embryo_dev', 255)
            ->allowEmpty('embryo_dev');

        $validator
            ->scalar('embryo_dev_findings')
            ->maxLength('embryo_dev_findings', 4294967295)
            ->allowEmpty('embryo_dev_findings');

        $validator
            ->scalar('pre_post_natal')
            ->maxLength('pre_post_natal', 255)
            ->allowEmpty('pre_post_natal');

        $validator
            ->scalar('pre_post_natal_findings')
            ->maxLength('pre_post_natal_findings', 4294967295)
            ->allowEmpty('pre_post_natal_findings');

        $validator
            ->scalar('reproductive_margins')
            ->maxLength('reproductive_margins', 255)
            ->allowEmpty('reproductive_margins');

        $validator
            ->scalar('reproductive_comment')
            ->maxLength('reproductive_comment', 4294967295)
            ->allowEmpty('reproductive_comment');

        $validator
            ->scalar('juvenile_age_range')
            ->maxLength('juvenile_age_range', 255)
            ->allowEmpty('juvenile_age_range');

        $validator
            ->scalar('enhanced_juvenile')
            ->maxLength('enhanced_juvenile', 255)
            ->allowEmpty('enhanced_juvenile');

        $validator
            ->scalar('planned_juvenile_exposure')
            ->maxLength('planned_juvenile_exposure', 255)
            ->allowEmpty('planned_juvenile_exposure');

        $validator
            ->scalar('juvenile_comment')
            ->maxLength('juvenile_comment', 4294967295)
            ->allowEmpty('juvenile_comment');

        $validator
            ->scalar('other_potential_toxicities')
            ->maxLength('other_potential_toxicities', 255)
            ->allowEmpty('other_potential_toxicities');

        $validator
            ->scalar('other_potential_exposure')
            ->maxLength('other_potential_exposure', 255)
            ->allowEmpty('other_potential_exposure');

        $validator
            ->scalar('other_potential_comment')
            ->maxLength('other_potential_comment', 4294967295)
            ->allowEmpty('other_potential_comment');

        $validator
            ->boolean('imp_teratogenic')
            ->allowEmpty('imp_teratogenic');

        $validator
            ->boolean('imp_genotoxic')
            ->allowEmpty('imp_genotoxic');

        $validator
            ->boolean('imp_insufficient')
            ->allowEmpty('imp_insufficient');

        $validator
            ->boolean('imp_irelevant')
            ->allowEmpty('imp_irelevant');

        $validator
            ->boolean('imp_nodata')
            ->allowEmpty('imp_nodata');

        $validator
            ->scalar('male_partners_included')
            ->maxLength('male_partners_included', 255)
            ->allowEmpty('male_partners_included');

        $validator
            ->boolean('considered_suspected')
            ->allowEmpty('considered_suspected');

        $validator
            ->boolean('considered_possible')
            ->allowEmpty('considered_possible');

        $validator
            ->boolean('considered_unlikely')
            ->allowEmpty('considered_unlikely');

        $validator
            ->scalar('imp_assessor_comment')
            ->maxLength('imp_assessor_comment', 4294967295)
            ->allowEmpty('imp_assessor_comment');

        $validator
            ->scalar('local_toxicity')
            ->maxLength('local_toxicity', 255)
            ->allowEmpty('local_toxicity');

        $validator
            ->scalar('local_toxicity_comments')
            ->maxLength('local_toxicity_comments', 4294967295)
            ->allowEmpty('local_toxicity_comments');

        $validator
            ->scalar('std_phototoxic')
            ->maxLength('std_phototoxic', 255)
            ->allowEmpty('std_phototoxic');

        $validator
            ->scalar('std_phototoxic_comments')
            ->maxLength('std_phototoxic_comments', 4294967295)
            ->allowEmpty('std_phototoxic_comments');

        $validator
            ->scalar('std_tissue')
            ->maxLength('std_tissue', 255)
            ->allowEmpty('std_tissue');

        $validator
            ->scalar('std_tissue_comments')
            ->maxLength('std_tissue_comments', 4294967295)
            ->allowEmpty('std_tissue_comments');

        $validator
            ->scalar('std_antigenicity')
            ->maxLength('std_antigenicity', 255)
            ->allowEmpty('std_antigenicity');

        $validator
            ->scalar('std_antigenicity_comments')
            ->maxLength('std_antigenicity_comments', 4294967295)
            ->allowEmpty('std_antigenicity_comments');

        $validator
            ->scalar('std_imuno')
            ->maxLength('std_imuno', 255)
            ->allowEmpty('std_imuno');

        $validator
            ->scalar('std_imuno_comments')
            ->maxLength('std_imuno_comments', 4294967295)
            ->allowEmpty('std_imuno_comments');

        $validator
            ->scalar('std_dependence')
            ->maxLength('std_dependence', 255)
            ->allowEmpty('std_dependence');

        $validator
            ->scalar('std_dependence_comments')
            ->maxLength('std_dependence_comments', 4294967295)
            ->allowEmpty('std_dependence_comments');

        $validator
            ->scalar('std_metabolites')
            ->maxLength('std_metabolites', 255)
            ->allowEmpty('std_metabolites');

        $validator
            ->scalar('std_metabolites_comments')
            ->maxLength('std_metabolites_comments', 4294967295)
            ->allowEmpty('std_metabolites_comments');

        $validator
            ->scalar('std_impurities')
            ->maxLength('std_impurities', 255)
            ->allowEmpty('std_impurities');

        $validator
            ->scalar('std_impurities_comments')
            ->maxLength('std_impurities_comments', 4294967295)
            ->allowEmpty('std_impurities_comments');

        $validator
            ->scalar('std_other')
            ->maxLength('std_other', 255)
            ->allowEmpty('std_other');

        $validator
            ->scalar('std_other_comments')
            ->maxLength('std_other_comments', 4294967295)
            ->allowEmpty('std_other_comments');

        $validator
            ->scalar('other_toxicity_comments')
            ->maxLength('other_toxicity_comments', 4294967295)
            ->allowEmpty('other_toxicity_comments');

        $validator
            ->scalar('fih_dose')
            ->maxLength('fih_dose', 255)
            ->allowEmpty('fih_dose');

        $validator
            ->scalar('fih_dose_steps')
            ->maxLength('fih_dose_steps', 255)
            ->allowEmpty('fih_dose_steps');

        $validator
            ->scalar('fih_dose_max')
            ->maxLength('fih_dose_max', 255)
            ->allowEmpty('fih_dose_max');

        $validator
            ->scalar('fih_dose_comments')
            ->maxLength('fih_dose_comments', 4294967295)
            ->allowEmpty('fih_dose_comments');

        $validator
            ->scalar('glp_aspects')
            ->maxLength('glp_aspects', 255)
            ->allowEmpty('glp_aspects');

        $validator
            ->scalar('glp_aspects_comments')
            ->maxLength('glp_aspects_comments', 4294967295)
            ->allowEmpty('glp_aspects_comments');

        $validator
            ->boolean('non_clinical_acceptable')
            ->allowEmpty('non_clinical_acceptable');

        $validator
            ->boolean('supplementary_info_needed')
            ->allowEmpty('supplementary_info_needed');

        $validator
            ->scalar('overall_comments')
            ->maxLength('overall_comments', 4294967295)
            ->allowEmpty('overall_comments');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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

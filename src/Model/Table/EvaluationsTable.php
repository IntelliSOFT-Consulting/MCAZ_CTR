<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;
use Cake\Event\Event;
use ArrayObject;

/**
 * Evaluations Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\Evaluation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evaluation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evaluation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evaluation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evaluation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evaluation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evaluation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EvaluationsTable extends Table
{
    use SoftDeleteTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('evaluations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'file' => [],
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('EvaluationEdits', [
            'className' => 'Evaluations',
            'foreignKey' => 'evaluation_id',
            'dependent' => true,
            'conditions' => array('EvaluationEdits.evaluation_type' => 'Revision'),
        ]);  
    }

    /**
     * Try to convert strings to UTF8 encoding.
     *
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                // $data[$key] = trim($value);
                //Force UTF8 encoding
                $data[$key] = iconv(mb_detect_encoding($value, mb_detect_order(), true), 'utf-8//IGNORE', $value); 
            }
        }
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
            ->allowEmpty('file');
        
        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->scalar('title')
            ->allowEmpty('title');

        $validator
            ->scalar('text')
            ->allowEmpty('text');

        $validator
            ->scalar('vulnerable_population')
            ->allowEmpty('vulnerable_population');

        $validator
            ->scalar('justification_adequate')
            ->allowEmpty('justification_adequate');

        $validator
            ->scalar('adequate_provisions')
            ->allowEmpty('adequate_provisions');

        $validator
            ->scalar('vulnerable_population_comments')
            ->allowEmpty('vulnerable_population_comments');

        $validator
            ->scalar('rationale_stated')
            ->allowEmpty('rationale_stated');

        $validator
            ->scalar('hypothesis_explained')
            ->allowEmpty('hypothesis_explained');

        $validator
            ->scalar('design_sound')
            ->allowEmpty('design_sound');

        $validator
            ->scalar('criteria_complete')
            ->allowEmpty('criteria_complete');

        $validator
            ->scalar('subject_allocation')
            ->allowEmpty('subject_allocation');

        $validator
            ->scalar('procedures_appropriate')
            ->allowEmpty('procedures_appropriate');

        $validator
            ->scalar('drugs_described')
            ->allowEmpty('drugs_described');

        $validator
            ->scalar('appropriate_criteria')
            ->allowEmpty('appropriate_criteria');

        $validator
            ->scalar('clinical_procedures')
            ->allowEmpty('clinical_procedures');

        $validator
            ->scalar('laboratory_tests')
            ->allowEmpty('laboratory_tests');

        $validator
            ->scalar('statistical_basis')
            ->allowEmpty('statistical_basis');

        $validator
            ->scalar('scientific_issues_comments')
            ->allowEmpty('scientific_issues_comments');

        $validator
            ->scalar('information_sheet')
            ->allowEmpty('information_sheet');

        $validator
            ->scalar('proposed_study')
            ->allowEmpty('proposed_study');

        $validator
            ->scalar('explain_study')
            ->allowEmpty('explain_study');

        $validator
            ->scalar('research_duration')
            ->allowEmpty('research_duration');

        $validator
            ->scalar('full_description')
            ->allowEmpty('full_description');

        $validator
            ->scalar('nature_discomfort')
            ->allowEmpty('nature_discomfort');

        $validator
            ->scalar('possible_benefits')
            ->allowEmpty('possible_benefits');

        $validator
            ->scalar('outline_procedure')
            ->allowEmpty('outline_procedure');

        $validator
            ->scalar('conveyed_persons')
            ->allowEmpty('conveyed_persons');

        $validator
            ->scalar('participation_voluntary')
            ->allowEmpty('participation_voluntary');

        $validator
            ->scalar('compensation_provided')
            ->allowEmpty('compensation_provided');

        $validator
            ->scalar('alternatives_participation')
            ->allowEmpty('alternatives_participation');

        $validator
            ->scalar('contact_research')
            ->allowEmpty('contact_research');

        $validator
            ->scalar('subjects_illiterate')
            ->allowEmpty('subjects_illiterate');

        $validator
            ->scalar('conclude_statement')
            ->allowEmpty('conclude_statement');

        $validator
            ->scalar('cost_participants')
            ->allowEmpty('cost_participants');

        $validator
            ->scalar('incapable_consent')
            ->allowEmpty('incapable_consent');

        $validator
            ->scalar('research_outcome')
            ->allowEmpty('research_outcome');

        $validator
            ->scalar('informed_consent_text')
            ->allowEmpty('informed_consent_text');

        $validator
            ->scalar('recruitment_material')
            ->allowEmpty('recruitment_material');

        $validator
            ->scalar('material_claims')
            ->allowEmpty('material_claims');

        $validator
            ->scalar('promises_inappropriate')
            ->allowEmpty('promises_inappropriate');

        $validator
            ->scalar('study_questionnaires')
            ->allowEmpty('study_questionnaires');

        $validator
            ->scalar('attached_proposal')
            ->allowEmpty('attached_proposal');

        $validator
            ->scalar('lay_language')
            ->allowEmpty('lay_language');

        $validator
            ->scalar('relevant_answer')
            ->allowEmpty('relevant_answer');

        $validator
            ->scalar('worded_sensitively')
            ->allowEmpty('worded_sensitively');

        $validator
            ->scalar('consent_information')
            ->allowEmpty('consent_information');

        $validator
            ->scalar('embarrassing_questions')
            ->allowEmpty('embarrassing_questions');

        $validator
            ->scalar('consent_participant')
            ->allowEmpty('consent_participant');

        $validator
            ->scalar('describe_confidentiality')
            ->allowEmpty('describe_confidentiality');

        $validator
            ->scalar('interview_focus')
            ->allowEmpty('interview_focus');

        $validator
            ->scalar('tapes_stored')
            ->allowEmpty('tapes_stored');

        $validator
            ->scalar('other_materials_comments')
            ->allowEmpty('other_materials_comments');

        $validator
            ->scalar('there_placebo')
            ->allowEmpty('there_placebo');

        $validator
            ->scalar('new_drug')
            ->allowEmpty('new_drug');

        $validator
            ->scalar('new_medicine')
            ->allowEmpty('new_medicine');

        $validator
            ->scalar('certificate_submitted')
            ->allowEmpty('certificate_submitted');

        $validator
            ->scalar('medicines_registered')
            ->allowEmpty('medicines_registered');

        $validator
            ->scalar('adr_attached')
            ->allowEmpty('adr_attached');

        $validator
            ->scalar('dsmb_established')
            ->allowEmpty('dsmb_established');

        $validator
            ->scalar('names_dsmb')
            ->allowEmpty('names_dsmb');

        $validator
            ->scalar('clinical_trials_text')
            ->allowEmpty('clinical_trials_text');

        $validator
            ->scalar('biological_materials')
            ->allowEmpty('biological_materials');

        $validator
            ->scalar('consent_volume')
            ->allowEmpty('consent_volume');

        $validator
            ->scalar('consent_procedure')
            ->allowEmpty('consent_procedure');

        $validator
            ->scalar('consent_describe')
            ->allowEmpty('consent_describe');

        $validator
            ->scalar('consent_provision')
            ->allowEmpty('consent_provision');

        $validator
            ->scalar('consent_specimens')
            ->allowEmpty('consent_specimens');

        $validator
            ->scalar('proposal_specimens')
            ->allowEmpty('proposal_specimens');

        $validator
            ->scalar('insurance_cover')
            ->allowEmpty('insurance_cover');

        $validator
            ->scalar('sponsor_sign')
            ->allowEmpty('sponsor_sign');

        $validator
            ->scalar('sign_gcp')
            ->allowEmpty('sign_gcp');

        $validator
            ->scalar('run_study')
            ->allowEmpty('run_study');

        $validator
            ->scalar('cvs_submitted')
            ->allowEmpty('cvs_submitted');

        $validator
            ->scalar('ethics_letter')
            ->allowEmpty('ethics_letter');

        $validator
            ->scalar('biological_materials_comments')
            ->allowEmpty('biological_materials_comments');

        $validator
            ->scalar('recommendations')
            ->allowEmpty('recommendations');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['application_id'], 'Applications'));

        return $rules;
    }
}

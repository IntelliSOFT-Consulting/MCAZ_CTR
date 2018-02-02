<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Applications Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\InvestigatorContactsTable|\Cake\ORM\Association\HasMany $InvestigatorContacts
 * @property \App\Model\Table\PlacebosTable|\Cake\ORM\Association\HasMany $Placebos
 * @property \App\Model\Table\PreviousDatesTable|\Cake\ORM\Association\HasMany $PreviousDates
 * @property \App\Model\Table\ReviewersTable|\Cake\ORM\Association\HasMany $Reviewers
 * @property \App\Model\Table\ReviewsTable|\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\SiteDetailsTable|\Cake\ORM\Association\HasMany $SiteDetails
 * @property \App\Model\Table\SponsorsTable|\Cake\ORM\Association\HasMany $Sponsors
 *
 * @method \App\Model\Entity\Application get($primaryKey, $options = [])
 * @method \App\Model\Entity\Application newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Application[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Application|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Application patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Application[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Application findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationsTable extends Table
{
    use SoftDeleteTrait;
    protected $softDeleteField = 'deleted_date';
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('applications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

        $this->belongsTo('ParentApplications', [
            'className' => 'Applications',
            'foreignKey' => 'application_id',
            'dependent' => true,
            'conditions' => array('ParentApplications.report_type' => 'Initial'),
        ]);
        $this->hasMany('InvestigatorContacts', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('Participants', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('Medicines', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('Placebos', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('PreviousDates', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('Reviewers', [
            'foreignKey' => 'application_id'
        ]);
        // $this->hasMany('Reviews', [
        //     'foreignKey' => 'application_id'
        // ]);
        $this->hasMany('Evaluations', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('SiteDetails', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('Sponsors', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('Committees', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('FinanceApprovals', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('AssignEvaluators', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('CommitteeReviews', [
            'foreignKey' => 'application_id'
        ]); 
        $this->hasMany('RequestInfos', [
            'foreignKey' => 'application_id'
        ]); 
        $this->hasMany('SeventyFives', [
            'foreignKey' => 'application_id'
        ]); 
        $this->hasMany('GcpInspections', [
            'foreignKey' => 'application_id'
        ]); 
        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Applications', 'Attachments.category' => 'attachments'),
        ]);
        $this->hasMany('Registrations', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Registrations.model' => 'Applications', 'Registrations.category' => 'registrations'),
        ]);
        $this->hasMany('Policies', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Policies.model' => 'Applications', 'Policies.category' => 'policies'),
        ]);
        $this->hasMany('Proofs', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Proofs.model' => 'Applications', 'Proofs.category' => 'proofs'),
        ]);
        $this->hasMany('CoverLetters', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('CoverLetters.model' => 'Applications', 'CoverLetters.category' => 'cover_letters'),
        ]);
        $this->hasMany('Protocols', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Protocols.model' => 'Applications', 'Protocols.category' => 'protocols'),
        ]);
        $this->hasMany('Fees', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Fees.model' => 'Applications', 'Fees.category' => 'fees'),
        ]);
        $this->hasMany('Receipts', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Receipts.model' => 'Applications', 'Receipts.category' => 'receipts'),
        ]);
        $this->hasMany('Mc10Forms', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Mc10Forms.model' => 'Applications', 'Mc10Forms.category' => 'mc10_forms'),
        ]);
        $this->hasMany('Leaflets', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Leaflets.model' => 'Applications', 'Leaflets.category' => 'leaflets'),
        ]);
        $this->hasMany('Brochures', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Brochures.model' => 'Applications', 'Brochures.category' => 'brochures'),
        ]);
        $this->hasMany('InvestigatorCvs', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'investigator_cvs'),
        ]);
        $this->hasMany('Declarations', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'declarations'),
        ]);
        $this->hasMany('StudyMonitors', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'study_monitors'),
        ]);
        $this->hasMany('MonitoringPlans', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'monitoring_plans'),
        ]);
        $this->hasMany('PiDeclarations', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'pi_declarations'),
        ]);
        $this->hasMany('StudySponsorships', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'study_sponsorships'),
        ]);
        $this->hasMany('PharmacyPlans', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'pharmacy_plans'),
        ]);
        $this->hasMany('PharmacyLicenses', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'pharmacy_licenses'),
        ]);
        $this->hasMany('StudyMedicines', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'study_medicines'),
        ]);
        $this->hasMany('InsuranceCertificates', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'insurance_certificates'),
        ]);
        $this->hasMany('GenericInsurances', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'generic_insurances'),
        ]);
        $this->hasMany('EthicsApprovals', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'ethics_approvals'),
        ]);
        $this->hasMany('EthicsLetters', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'ethics_letters'),
        ]);
        $this->hasMany('CountryApprovals', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'country_approvals'),
        ]);
        $this->hasMany('Advertisments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'advertisments'),
        ]);
        $this->hasMany('ElectronicVersions', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'electronic_versions'),
        ]);
        $this->hasMany('SafetyMonitors', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'safety_monitors'),
        ]);
        $this->hasMany('BiologicalProducts', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'biological_products'),
        ]);
        $this->hasMany('Dossiers', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('model' => 'Applications', 'category' => 'dossiers'),
        ]);
        $this->hasMany('LegalForms', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('LegalForms.model' => 'Applications', 'LegalForms.category' => 'legal_forms'),
        ]);
        $this->hasMany('Amendments', [
            'className' => 'Applications',
            'foreignKey' => 'application_id',
            'dependent' => true,
            'conditions' => array('Amendments.report_type' => 'Amendment'),
        ]);
    }

    /**
    * @return \Search\Manager
    */
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->value('status')
            ->like('protocol_no')
            ->compare('created_start', ['operator' => '>=', 'field' => ['created']])
            ->compare('created_end', ['operator' => '<=', 'field' => ['created']])
            ;

        return $searchManager;
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
            ->scalar('scientific_title')
            ->notEmpty('scientific_title');

        $validator
            ->email('public_contact_email')
            ->notEmpty('public_contact_email');

        $validator
            ->scalar('public_contact_phone')
            ->notEmpty('public_contact_phone');

        $validator
            ->scalar('public_contact_postal')
            ->notEmpty('public_contact_postal');

        $validator
            ->email('scientific_contact_email')
            ->notEmpty('scientific_contact_email');

        $validator
            ->scalar('scientific_contact_phone')
            ->notEmpty('scientific_contact_phone');

        $validator
            ->scalar('scientific_contact_postal')
            ->notEmpty('scientific_contact_postal');

        $validator
            ->scalar('countries_recruitment')
            ->notEmpty('countries_recruitment');

        $validator
            ->scalar('abstract_of_study')
            ->notEmpty('abstract_of_study');

        $validator
            ->scalar('protocol_version')
            ->notEmpty('protocol_version');

        $validator
            ->scalar('study_drug')
            ->notEmpty('study_drug');
            
        $validator
            ->scalar('sponsor_name')
            ->notEmpty('sponsor_name');
            
        $validator
            ->scalar('sponsor_address')
            ->notEmpty('sponsor_address');
            
        $validator
            ->scalar('sponsor_telephone_number')
            ->notEmpty('sponsor_telephone_number');
            
        $validator
            ->scalar('sponsor_cell_number')
            ->notEmpty('sponsor_cell_number');

        $validator
            ->email('sponsor_email_address')
            ->notEmpty('sponsor_email_address');

        $validator
            ->scalar('participants_description')
            ->notEmpty('participants_description');

        $validator
            ->scalar('number_participants')
            ->notEmpty('number_participants');

        $validator
            ->scalar('total_enrolment_per_site')
            ->notEmpty('total_enrolment_per_site');
            
        $validator
            ->scalar('total_participants_worldwide')
            ->notEmpty('total_participants_worldwide');
            
        $validator
            ->scalar('participants_justification')
            ->notEmpty('participants_justification');
            
        $validator
            ->scalar('gender')
            ->notEmpty('gender');

        $validator
            ->scalar('single_site_member_state')
            ->notEmpty('single_site_member_state');

        $validator
            ->scalar('drug_name')
            ->notEmpty('drug_name');

        $validator
            ->scalar('quantity_excemption')
            ->notEmpty('quantity_excemption');

        $validator
            ->scalar('drug_details')
            ->notEmpty('drug_details');

        $validator
            ->scalar('principal_inclusion_criteria')
            ->notEmpty('principal_inclusion_criteria');

        $validator
            ->scalar('principal_exclusion_criteria')
            ->notEmpty('principal_exclusion_criteria');

        $validator
            ->scalar('primary_end_points')
            ->notEmpty('primary_end_points');

        $validator
            ->scalar('disease_condition')
            ->notEmpty('disease_condition');

        $validator
            ->scalar('design_controlled')
            ->notEmpty('design_controlled');

        $validator
            ->scalar('ethic_considerations')
            ->notEmpty('ethic_considerations');

        $validator
            ->scalar('organisations_transferred_')
            ->notEmpty('organisations_transferred_');

        $validator
            ->scalar('estimated_duration')
            ->notEmpty('estimated_duration');

        $validator
            ->scalar('other_details_explanation')
            ->notEmpty('other_details_explanation');

        $validator
            ->scalar('other_details_regulatory_notapproved')
            ->notEmpty('other_details_regulatory_notapproved');

        $validator
            ->scalar('other_details_regulatory_approved')
            ->notEmpty('other_details_regulatory_approved');

        $validator
            ->scalar('recording_method')
            ->notEmpty('recording_method');

        $validator
            ->scalar('record_keeping')
            ->notEmpty('record_keeping');

        $validator
            ->scalar('trial_storage')
            ->notEmpty('trial_storage');

        $validator
            ->scalar('measures_compliance')
            ->notEmpty('measures_compliance');

        $validator
            ->scalar('evalution_of_results')
            ->notEmpty('evalution_of_results');

        $validator
            ->scalar('inform_persons')
            ->notEmpty('inform_persons');

        $validator
            ->scalar('inform_staff')
            ->notEmpty('inform_staff');

        $validator
            ->boolean('applicant_covering_letter')
            ->notEmpty('applicant_covering_letter')
            ->add('applicant_covering_letter', 'checklist-coverletter', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return 'Please upload the cover letter.';
                }
            ]);

        $validator
            ->add('applicant_fees', 'checklist-practicing-license', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return 'Please upload the practicising license.';
                }
            ]);

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

        return $rules;
    }
}

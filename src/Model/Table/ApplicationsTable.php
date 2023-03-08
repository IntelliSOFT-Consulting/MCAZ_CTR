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
 * Applications Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\InvestigatorContactsTable|\Cake\ORM\Association\HasMany $InvestigatorContacts
 * @property \App\Model\Table\PlacebosTable|\Cake\ORM\Association\HasMany $Placebos
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

        $this->hasMany('EvaluationComments', [
            'className' => 'Comments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('EvaluationComments.model' => 'Applications', 'EvaluationComments.category' => 'evaluation'),
        ]);

        $this->hasMany('NotificationComments', [
            'className' => 'Comments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('NotificationComments.model' => 'Applications', 'NotificationComments.category' => 'notification'),
        ]);

        $this->hasMany('CommitteeComments', [
            'className' => 'Comments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('CommitteeComments.model' => 'Applications', 'CommitteeComments.category' => 'committee'),
        ]);

        $this->hasMany('ApplicationStages', [
            'foreignKey' => 'application_id'
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
        $this->hasOne('EvaluationHeaders', [
            'foreignKey' => 'application_id'
        ]);
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
        $this->hasMany('FinanceAnnualApprovals', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('AssignEvaluators', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('CommitteeReviews', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('DgReviews', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('FinalStages', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('AnnualApprovals', [
            'foreignKey' => 'application_id'
        ]);
        $this->hasMany('Appeals', [
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
        $this->hasMany('Details', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Details.model' => 'Applications', 'Details.category' => 'details'),
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
        $this->hasMany('Comments', [
            'className' => 'Comments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Comments.model' => 'Applications'),
        ]);

        $this->hasMany('Clinicals', [
            'className' => 'Clinicals',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('NonClinicals', [
            'className' => 'NonClinicals',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('Statisticals', [
            'className' => 'Statisticals',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('QualityAssessments', [
            'className' => 'QualityAssessments',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('Quality', [
            'className' => 'Quality',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('Sdrugs', [
            'className' => 'Sdrugs',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('Pdrugs', [
            'className' => 'Pdrugs',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('Compliance', [
            'className' => 'Compliance',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('StorageConditions', [
            'className' => 'StorageConditions',
            'foreignKey' => 'application_id',
        ]);
        $this->hasMany('SdrugsConditions', [
            'className' => 'SdrugsConditions',
            'foreignKey' => 'application_id',
        ]);
        
        $this->hasMany('Refids', [
            'className' => 'Refids',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Refids.model' => 'Applications'),

        ]);
        $this->hasMany('Reminders', [
            'className' => 'Reminders',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reminders.model' => 'Applications'),
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
            ->value('approved')
            ->like('protocol_no')
            ->compare('created_start', ['operator' => '>=', 'field' => ['created']])
            ->compare('created_end', ['operator' => '<=', 'field' => ['created']])
            ->like('public_title')
            ->like('scientific_title')
            ->like('pi', ['field' => ['InvestigatorContacts.given_name', 'InvestigatorContacts.email']])
            ->like('business_name')
            ->like('money_source')
            ->like('sponsor', ['field' => [
                'Applications.sponsor_name', 'Applications.sponsor_email_address', 'Sponsors.sponsor',
                'Sponsors.email_address'
            ]])
            ->like('site', ['field' => ['Applications.location_of_area', 'Applications.single_site_name', 'SiteDetails.site_name',]])
            ->like('medicine', ['field' => ['Applications.drug_name', 'Medicines.medicine_name',]])
            ->like('health', ['field' => ['disease_condition']]);

        return $searchManager;
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
            ->scalar('scientific_title')
            ->notEmpty('scientific_title', ['message' => '1. Abstract: Scientific Title is required']);

        $validator
            ->scalar('public_contact_name')
            ->notEmpty('public_contact_name', ['message' => '1. Abstract: Contact name for public queries required']);

        $validator
            ->scalar('public_contact_designation')
            ->notEmpty('public_contact_designation', ['message' => '1. Abstract: Designation for public queries required']);

        $validator
            // ->email('public_contact_email', ['message' => '1. Abstract: Valid contact email for public queries required'])
            ->notEmpty('public_contact_email', ['message' => '1. Abstract: Contact email for public queries required'])
            ->add('public_contact_email', 'valid-email', ['rule' => 'email', 'message' => '1. Abstract: Valid contact email for public queries required']);

        $validator
            ->scalar('public_contact_phone')
            ->notEmpty('public_contact_phone', ['message' => '1. Abstract: Contact phone for public queries required']);

        $validator
            ->scalar('public_contact_postal')
            ->notEmpty('public_contact_postal', ['message' => '1. Abstract: Contact postal address for public queries required']);

        $validator
            ->scalar('scientific_contact_name')
            ->notEmpty('public_contact_name', ['message' => '1. Abstract: Contact name for scientific queries required']);

        $validator
            ->scalar('scientific_contact_designation')
            ->notEmpty('public_contact_designation', ['message' => '1. Abstract: Designation for scientific queries required']);

        $validator
            // ->email('scientific_contact_email', ['message' => '1. Abstract: Valid contact email for scientific queries required'])
            ->add('scientific_contact_email', 'valid-email', ['rule' => 'email', 'message' => '1. Abstract: Valid contact email for scientific queries required'])
            ->notEmpty('scientific_contact_email', ['message' => '1. Abstract: Contact email for scientific queries required']);

        $validator
            ->scalar('scientific_contact_phone')
            ->notEmpty('scientific_contact_phone', ['message' => '1. Abstract: Contact phone for scientific queries required']);

        $validator
            ->scalar('scientific_contact_postal')
            ->notEmpty('scientific_contact_postal', ['message' => '1. Abstract: Contact postal address for scientific queries required']);

        $validator
            ->scalar('countries_recruitment')
            ->notEmpty('countries_recruitment', ['message' => '1. Abstract: Countries of recruitement required']);

        $validator
            ->scalar('abstract_of_study')
            ->notEmpty('abstract_of_study', ['message' => '1. Abstract: Purpose and reason for trial required']);

        $validator
            ->scalar('protocol_version')
            ->notEmpty('protocol_version', ['message' => '1. Abstract: Protocol Version No. Required']);

        $validator
            ->scalar('study_drug')
            ->notEmpty('study_drug', ['message' => '1. Abstract: Study product required']);

        $validator
            ->scalar('sponsor_name')
            ->notEmpty('sponsor_name', ['message' => '3. Sponsor: Sponsor required']);

        $validator
            ->scalar('sponsor_address')
            ->notEmpty('sponsor_address', ['message' => '3. Sponsor: Address required']);

        $validator
            ->scalar('sponsor_telephone_number')
            ->notEmpty('sponsor_telephone_number', ['message' => '3. Sponsor: Telephone number required']);

        $validator
            ->scalar('sponsor_cell_number')
            ->notEmpty('sponsor_cell_number', ['message' => '3. Sponsor: Mobile phone number required']);

        $validator
            // ->email('sponsor_email_address', ['message' => '3. Sponsor: The provided email is invalid'])
            ->add('sponsor_email_address', 'valid-email', ['rule' => 'email', 'message' => '3. Sponsor: The provided email is invalid'])
            ->notEmpty('sponsor_email_address', ['message' => '3. Sponsor: Email address required']);

        $validator
            ->scalar('participants_description')
            ->notEmpty('participants_description', ['message' => '4. Participants: Description of participants required']);

        $validator
            ->scalar('number_participants')
            ->notEmpty('number_participants', ['message' => '4. Participants: Expected number of participants required']);

        $validator
            ->scalar('total_enrolment_per_site')
            ->notEmpty('total_enrolment_per_site', ['message' => '4. Participants: Total enrolment per site required']);

        $validator
            ->scalar('total_participants_worldwide')
            ->notEmpty('total_participants_worldwide', ['message' => '4. Participants: Total participants woldwide required']);

        $validator
            ->scalar('participants_justification')
            ->notEmpty('participants_justification', ['message' => '4. Participants: Justification required']);

        $validator
            ->scalar('gender')
            ->notEmpty('gender', ['message' => '4. Participants: Gender required']);

        $validator
            ->scalar('single_site_member_state')
            ->notEmpty('single_site_member_state', ['message' => '5. Sites: Single site in Zimbabwe required']);

        $validator
            ->scalar('drug_name')
            ->notEmpty('drug_name', ['message' => '6. Interventions: Medicine name required']);

        $validator
            ->scalar('quantity_excemption')
            ->notEmpty('quantity_excemption', ['message' => '6. Interventions: Quantity of medicine required']);

        $validator
            ->scalar('drug_details')
            ->notEmpty('drug_details', ['message' => '6. Interventions: Chemical composition, graphic and empirical formulae etc. required']);

        $validator
            ->scalar('principal_inclusion_criteria')
            ->notEmpty('principal_inclusion_criteria', ['message' => '7. Criteria: Principal inclusion criteria required']);

        $validator
            ->scalar('principal_exclusion_criteria')
            ->notEmpty('principal_exclusion_criteria', ['message' => '7. Criteria: Principal exclusion criteria required']);

        $validator
            ->scalar('primary_end_points')
            ->notEmpty('primary_end_points', ['message' => '7. Criteria: Primary end points required']);

        $validator
            ->scalar('disease_condition')
            ->notEmpty('disease_condition', ['message' => '8. Scope: Health Condition(s) required']);

        $validator
            ->scalar('design_controlled')
            ->notEmpty('design_controlled', ['message' => '9. Design: Type of trial required']);

        $validator
            ->scalar('ethic_considerations')
            ->minLength('ethic_considerations', 7)
            ->notEmpty('ethic_considerations', ['message' => '10. Ethical Considerations: Ethical considerations required']);

        /*$validator
            ->scalar('organisations_transferred_')
            ->notEmpty('organisations_transferred_');*/

        $validator
            ->scalar('estimated_duration')
            ->notEmpty('estimated_duration', ['message' => '11. Other details: State the time period for the trial']);

        $validator
            ->scalar('other_details_explanation')
            ->notEmpty('other_details_explanation', ['message' => '11. Other details: If the trial is to be conducted in Zimbabwe and not in host country, explain']);

        $validator
            ->scalar('other_details_regulatory_notapproved')
            // ->notEmpty('other_details_regulatory_notapproved', ['message' => '11. Other details: Name the other regulatory authorities to which applications have been submitted but approval has not been granted']);
            ->allowEmpty('other_details_regulatory_notapproved');

        $validator
            ->scalar('other_details_regulatory_approved')
            // ->notEmpty('other_details_regulatory_approved', ['message' => '11. Other details: Name other regulatory authorities which have approved this trial']);
            ->allowEmpty('other_details_regulatory_approved');

        $validator
            ->scalar('recording_method')
            ->notEmpty('recording_method', ['message' => '11. Other details: State the method of recording adverse reactions']);

        $validator
            ->scalar('record_keeping')
            ->notEmpty('record_keeping', ['message' => '11. Other details: State the procedure for keeping participants lists and participants records']);

        $validator
            ->scalar('trial_storage')
            ->notEmpty('trial_storage', ['message' => '11. Other details: State where will trial code be kept']);

        $validator
            ->scalar('measures_compliance')
            ->notEmpty('measures_compliance', ['message' => '11. Other details: State measures to be implemented to ensure the safe handling of medicines']);

        $validator
            ->scalar('evalution_of_results')
            ->notEmpty('evalution_of_results', ['message' => '11. Other details: Evaluation of results required']);

        $validator
            ->scalar('inform_persons')
            ->notEmpty('inform_persons', ['message' => '11. Other details: State how the persons or owners of animals are to be informed about the trial']);

        $validator
            ->scalar('inform_staff')
            ->notEmpty('inform_staff', ['message' => '11. Other details: State how the staff involved are to be informed']);

        $validator
            ->allowEmpty('insurance_company')
            ->add('insurance_company', 'ic-or-other', [
                'rule' => function ($value, $context) {
                    if (!$value && empty($context['data']['other_insurance'])) return false;
                    if ($value && !empty($context['data']['other_insurance'])) return false;
                    return true;
                }, 'message' => '10. Provide the company who will insure the participants OR if no insurance company, provide details'
            ]);

        $validator
            ->boolean('applicant_covering_letter')
            ->notEmpty('applicant_covering_letter')
            ->add('applicant_covering_letter', 'checklist-coverletter', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return '12. Checklist: Please upload the cover letter.';
                }
            ]);

        $validator
            ->add('applicant_fees', 'checklist-practicing-license', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return '12. Checklist: Please upload the practicising license.';
                }
            ]);

        $validator
            ->add('applicant_protocol', 'checklist-protocol', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return '12. Checklist: Please upload the protocol (including relevant questionnaires, etc.).';
                }
            ]);

        $validator
            ->add('applicant_investigators_cv', 'checklist-investigators-cv', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return '12. Checklist: Please upload the Investigator CV(s) in required format.';
                }
            ]);

        $validator
            ->add('applicant_signed_declaration', 'checklist-signed-declaration', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return '12. Checklist: Please upload the Signed declaration(s) by investigator(s) to comply with GCP.';
                }
            ]);

        $validator
            ->add('applicant_monitoring_plans', 'checklist-monitoring-plans', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return '12. Checklist: Please upload the Monitoring plan by sponsor/PI/monitor throughout study.';
                }
            ]);

        $validator
            ->add('applicant_pi_declaration', 'checklist-pi-declaration', [
                'rule' => function ($data, $provider) {
                    if ($data > 0) {
                        return true;
                    }
                    return '12. Checklist: Please upload the Signed Declaration by sponsor and national PI to comply with GCP.';
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

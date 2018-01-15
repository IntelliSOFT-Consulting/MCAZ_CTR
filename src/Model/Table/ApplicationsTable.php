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
 * @property \App\Model\Table\TrialStatusesTable|\Cake\ORM\Association\BelongsTo $TrialStatuses
 * @property \App\Model\Table\InvestigatorContactsTable|\Cake\ORM\Association\HasMany $InvestigatorContacts
 * @property \App\Model\Table\OrganizationsTable|\Cake\ORM\Association\HasMany $Organizations
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

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('TrialStatuses', [
            'foreignKey' => 'trial_status_id'
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
        $this->hasMany('Organizations', [
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
        $this->hasMany('Reviews', [
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
            ->scalar('abstract_of_study')
            ->allowEmpty('abstract_of_study');

        $validator
            ->scalar('study_title')
            ->allowEmpty('study_title');

        $validator
            ->scalar('short_title')
            ->allowEmpty('short_title');

        $validator
            ->scalar('protocol_no')
            ->allowEmpty('protocol_no');

        $validator
            ->scalar('version_no')
            ->allowEmpty('version_no');

        // $validator
        //     ->date('date_of_protocol')
        //     ->allowEmpty('date_of_protocol');

        $validator
            ->scalar('study_drug')
            ->allowEmpty('study_drug');

        $validator
            ->scalar('disease_condition')
            ->allowEmpty('disease_condition');

        $validator
            ->boolean('product_type_biologicals')
            ->allowEmpty('product_type_biologicals');

        $validator
            ->boolean('product_type_proteins')
            ->allowEmpty('product_type_proteins');

        $validator
            ->boolean('product_type_immunologicals')
            ->allowEmpty('product_type_immunologicals');

        $validator
            ->boolean('product_type_vaccines')
            ->allowEmpty('product_type_vaccines');

        $validator
            ->boolean('product_type_hormones')
            ->allowEmpty('product_type_hormones');

        $validator
            ->boolean('product_type_toxoid')
            ->allowEmpty('product_type_toxoid');

        $validator
            ->boolean('product_type_chemical')
            ->allowEmpty('product_type_chemical');

        $validator
            ->boolean('product_type_medical_device')
            ->allowEmpty('product_type_medical_device');

        $validator
            ->scalar('product_type_chemical_name')
            ->allowEmpty('product_type_chemical_name');

        $validator
            ->scalar('product_type_medical_device_name')
            ->allowEmpty('product_type_medical_device_name');

        $validator
            ->boolean('ecct_not_applicable')
            ->allowEmpty('ecct_not_applicable');

        $validator
            ->scalar('ecct_ref_number')
            ->allowEmpty('ecct_ref_number');

        $validator
            ->scalar('email_address')
            ->allowEmpty('email_address');

        $validator
            ->boolean('applicant_covering_letter')
            ->allowEmpty('applicant_covering_letter');

        $validator
            ->boolean('applicant_protocol')
            ->allowEmpty('applicant_protocol');

        $validator
            ->boolean('applicant_patient_information')
            ->allowEmpty('applicant_patient_information');

        $validator
            ->boolean('applicant_investigators_brochure')
            ->allowEmpty('applicant_investigators_brochure');

        $validator
            ->boolean('applicant_investigators_cv')
            ->allowEmpty('applicant_investigators_cv');

        $validator
            ->boolean('applicant_signed_declaration')
            ->allowEmpty('applicant_signed_declaration');

        $validator
            ->boolean('applicant_financial_declaration')
            ->allowEmpty('applicant_financial_declaration');

        $validator
            ->boolean('applicant_gmp_certificate')
            ->allowEmpty('applicant_gmp_certificate');

        $validator
            ->boolean('applicant_indemnity_cover')
            ->allowEmpty('applicant_indemnity_cover');

        $validator
            ->boolean('applicant_opinion_letter')
            ->allowEmpty('applicant_opinion_letter');

        $validator
            ->boolean('applicant_approval_letter')
            ->allowEmpty('applicant_approval_letter');

        $validator
            ->boolean('applicant_statement')
            ->allowEmpty('applicant_statement');

        $validator
            ->boolean('applicant_participating_countries')
            ->allowEmpty('applicant_participating_countries');

        $validator
            ->boolean('applicant_addendum')
            ->allowEmpty('applicant_addendum');

        $validator
            ->boolean('applicant_fees')
            ->allowEmpty('applicant_fees');

        $validator
            ->scalar('declaration_applicant')
            ->allowEmpty('declaration_applicant');

        // $validator
        //     ->date('declaration_date1')
        //     ->allowEmpty('declaration_date1');

        $validator
            ->scalar('declaration_principal_investigator')
            ->allowEmpty('declaration_principal_investigator');

        // $validator
        //     ->date('declaration_date2')
        //     ->allowEmpty('declaration_date2');

        $validator
            ->scalar('placebo_present')
            ->allowEmpty('placebo_present');

        $validator
            ->scalar('principal_inclusion_criteria')
            ->allowEmpty('principal_inclusion_criteria');

        $validator
            ->scalar('principal_exclusion_criteria')
            ->allowEmpty('principal_exclusion_criteria');

        $validator
            ->scalar('primary_end_points')
            ->allowEmpty('primary_end_points');

        $validator
            ->boolean('scope_diagnosis')
            ->allowEmpty('scope_diagnosis');

        $validator
            ->boolean('scope_prophylaxis')
            ->allowEmpty('scope_prophylaxis');

        $validator
            ->boolean('scope_therapy')
            ->allowEmpty('scope_therapy');

        $validator
            ->boolean('scope_safety')
            ->allowEmpty('scope_safety');

        $validator
            ->boolean('scope_efficacy')
            ->allowEmpty('scope_efficacy');

        $validator
            ->boolean('scope_pharmacokinetic')
            ->allowEmpty('scope_pharmacokinetic');

        $validator
            ->boolean('scope_pharmacodynamic')
            ->allowEmpty('scope_pharmacodynamic');

        $validator
            ->boolean('scope_bioequivalence')
            ->allowEmpty('scope_bioequivalence');

        $validator
            ->boolean('scope_dose_response')
            ->allowEmpty('scope_dose_response');

        $validator
            ->boolean('scope_pharmacogenetic')
            ->allowEmpty('scope_pharmacogenetic');

        $validator
            ->boolean('scope_pharmacogenomic')
            ->allowEmpty('scope_pharmacogenomic');

        $validator
            ->boolean('scope_pharmacoecomomic')
            ->allowEmpty('scope_pharmacoecomomic');

        $validator
            ->boolean('scope_others')
            ->allowEmpty('scope_others');

        $validator
            ->scalar('scope_others_specify')
            ->allowEmpty('scope_others_specify');

        $validator
            ->boolean('trial_human_pharmacology')
            ->allowEmpty('trial_human_pharmacology');

        $validator
            ->boolean('trial_administration_humans')
            ->allowEmpty('trial_administration_humans');

        $validator
            ->boolean('trial_bioequivalence_study')
            ->allowEmpty('trial_bioequivalence_study');

        $validator
            ->boolean('trial_other')
            ->allowEmpty('trial_other');

        $validator
            ->scalar('trial_other_specify')
            ->allowEmpty('trial_other_specify');

        $validator
            ->boolean('trial_therapeutic_exploratory')
            ->allowEmpty('trial_therapeutic_exploratory');

        $validator
            ->boolean('trial_therapeutic_confirmatory')
            ->allowEmpty('trial_therapeutic_confirmatory');

        $validator
            ->boolean('trial_therapeutic_use')
            ->allowEmpty('trial_therapeutic_use');

        $validator
            ->scalar('design_controlled')
            ->allowEmpty('design_controlled');

        $validator
            ->scalar('site_capacity')
            ->allowEmpty('site_capacity');

        $validator
            ->scalar('staff_numbers')
            ->allowEmpty('staff_numbers');

        $validator
            ->scalar('other_details_explanation')
            ->allowEmpty('other_details_explanation');

        $validator
            ->scalar('other_details_regulatory_notapproved')
            ->allowEmpty('other_details_regulatory_notapproved');

        $validator
            ->scalar('other_details_regulatory_approved')
            ->allowEmpty('other_details_regulatory_approved');

        $validator
            ->scalar('other_details_regulatory_rejected')
            ->allowEmpty('other_details_regulatory_rejected');

        $validator
            ->scalar('other_details_regulatory_halted')
            ->allowEmpty('other_details_regulatory_halted');

        $validator
            ->scalar('estimated_duration')
            ->allowEmpty('estimated_duration');

        $validator
            ->scalar('design_controlled_randomised')
            ->allowEmpty('design_controlled_randomised');

        $validator
            ->scalar('design_controlled_open')
            ->allowEmpty('design_controlled_open');

        $validator
            ->scalar('design_controlled_single_blind')
            ->allowEmpty('design_controlled_single_blind');

        $validator
            ->scalar('design_controlled_double_blind')
            ->allowEmpty('design_controlled_double_blind');

        $validator
            ->scalar('design_controlled_parallel_group')
            ->allowEmpty('design_controlled_parallel_group');

        $validator
            ->scalar('design_controlled_cross_over')
            ->allowEmpty('design_controlled_cross_over');

        $validator
            ->scalar('design_controlled_other')
            ->allowEmpty('design_controlled_other');

        $validator
            ->scalar('design_controlled_specify')
            ->allowEmpty('design_controlled_specify');

        $validator
            ->scalar('design_controlled_comparator')
            ->allowEmpty('design_controlled_comparator');

        $validator
            ->scalar('design_controlled_other_medicinal')
            ->allowEmpty('design_controlled_other_medicinal');

        $validator
            ->scalar('design_controlled_placebo')
            ->allowEmpty('design_controlled_placebo');

        $validator
            ->scalar('design_controlled_medicinal_other')
            ->allowEmpty('design_controlled_medicinal_other');

        $validator
            ->scalar('design_controlled_medicinal_specify')
            ->allowEmpty('design_controlled_medicinal_specify');

        $validator
            ->scalar('single_site_member_state')
            ->allowEmpty('single_site_member_state');

        $validator
            ->scalar('location_of_area')
            ->allowEmpty('location_of_area');

        $validator
            ->scalar('single_site_physical_address')
            ->allowEmpty('single_site_physical_address');

        $validator
            ->scalar('single_site_contact_person')
            ->allowEmpty('single_site_contact_person');

        $validator
            ->scalar('single_site_telephone')
            ->allowEmpty('single_site_telephone');

        $validator
            ->scalar('multiple_sites_member_state')
            ->allowEmpty('multiple_sites_member_state');

        $validator
            ->scalar('multiple_countries')
            ->allowEmpty('multiple_countries');

        $validator
            ->scalar('multiple_member_states')
            ->allowEmpty('multiple_member_states');

        $validator
            ->scalar('number_of_sites')
            ->allowEmpty('number_of_sites');

        $validator
            ->scalar('multi_country_list')
            ->allowEmpty('multi_country_list');

        $validator
            ->scalar('data_monitoring_committee')
            ->allowEmpty('data_monitoring_committee');

        $validator
            ->scalar('total_enrolment_per_site')
            ->allowEmpty('total_enrolment_per_site');

        $validator
            ->scalar('total_participants_worldwide')
            ->allowEmpty('total_participants_worldwide');

        $validator
            ->scalar('population_less_than_18_years')
            ->allowEmpty('population_less_than_18_years');

        $validator
            ->scalar('population_utero')
            ->allowEmpty('population_utero');

        $validator
            ->scalar('population_preterm_newborn')
            ->allowEmpty('population_preterm_newborn');

        $validator
            ->scalar('population_newborn')
            ->allowEmpty('population_newborn');

        $validator
            ->scalar('population_infant_and_toddler')
            ->allowEmpty('population_infant_and_toddler');

        $validator
            ->scalar('population_children')
            ->allowEmpty('population_children');

        $validator
            ->scalar('population_adolescent')
            ->allowEmpty('population_adolescent');

        $validator
            ->scalar('population_above_18')
            ->allowEmpty('population_above_18');

        $validator
            ->scalar('population_adult')
            ->allowEmpty('population_adult');

        $validator
            ->scalar('population_elderly')
            ->allowEmpty('population_elderly');

        $validator
            ->boolean('gender_female')
            ->allowEmpty('gender_female');

        $validator
            ->boolean('gender_male')
            ->allowEmpty('gender_male');

        $validator
            ->scalar('subjects_healthy')
            ->allowEmpty('subjects_healthy');

        $validator
            ->scalar('subjects_patients')
            ->allowEmpty('subjects_patients');

        $validator
            ->scalar('subjects_vulnerable_populations')
            ->allowEmpty('subjects_vulnerable_populations');

        $validator
            ->scalar('subjects_women_child_bearing')
            ->allowEmpty('subjects_women_child_bearing');

        $validator
            ->scalar('subjects_women_using_contraception')
            ->allowEmpty('subjects_women_using_contraception');

        $validator
            ->scalar('subjects_pregnant_women')
            ->allowEmpty('subjects_pregnant_women');

        $validator
            ->scalar('subjects_nursing_women')
            ->allowEmpty('subjects_nursing_women');

        $validator
            ->scalar('subjects_emergency_situation')
            ->allowEmpty('subjects_emergency_situation');

        $validator
            ->scalar('subjects_incapable_consent')
            ->allowEmpty('subjects_incapable_consent');

        $validator
            ->scalar('subjects_specify')
            ->allowEmpty('subjects_specify');

        $validator
            ->scalar('subjects_others')
            ->allowEmpty('subjects_others');

        $validator
            ->scalar('subjects_others_specify')
            ->allowEmpty('subjects_others_specify');

        $validator
            ->scalar('investigator1_given_name')
            ->allowEmpty('investigator1_given_name');

        $validator
            ->scalar('investigator1_middle_name')
            ->allowEmpty('investigator1_middle_name');

        $validator
            ->scalar('investigator1_family_name')
            ->allowEmpty('investigator1_family_name');

        $validator
            ->scalar('investigator1_qualification')
            ->allowEmpty('investigator1_qualification');

        $validator
            ->scalar('investigator1_professional_address')
            ->allowEmpty('investigator1_professional_address');

        $validator
            ->scalar('investigator1_telephone')
            ->allowEmpty('investigator1_telephone');

        $validator
            ->scalar('investigator1_email')
            ->allowEmpty('investigator1_email');

        $validator
            ->scalar('organisations_transferred_')
            ->allowEmpty('organisations_transferred_');

        $validator
            ->scalar('number_participants')
            ->allowEmpty('number_participants');

        $validator
            ->scalar('notification')
            ->allowEmpty('notification');

        // $validator
        //     ->date('approval_date')
        //     ->allowEmpty('approval_date');

        $validator
            ->boolean('submitted')
            ->requirePresence('submitted', 'create')
            ->notEmpty('submitted');

        $validator
            ->boolean('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        $validator
            ->dateTime('deleted_date')
            ->allowEmpty('deleted_date');

        $validator
            ->boolean('deactivated')
            ->requirePresence('deactivated', 'create')
            ->notEmpty('deactivated');

        $validator
            ->dateTime('date_submitted')
            ->allowEmpty('date_submitted');

        $validator
            ->requirePresence('approved', 'create')
            ->notEmpty('approved');

        $validator
            ->scalar('approved_reason')
            ->allowEmpty('approved_reason');

        $validator
            ->scalar('final_report')
            ->allowEmpty('final_report');

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
        $rules->add($rules->existsIn(['trial_status_id'], 'TrialStatuses'));

        return $rules;
    }
}

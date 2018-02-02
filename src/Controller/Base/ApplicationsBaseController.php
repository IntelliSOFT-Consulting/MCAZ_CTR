<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\View\Helper\HtmlHelper; 
use Cake\Utility\Hash;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[] paginate($object = null, array $settings = [])
 */
class ApplicationsBaseController extends AppController
{
    public function initialize() {
       parent::initialize();
       // $this->Auth->allow(['view']);       
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => $this->_contain
        ];

        // $applications = $this->paginate($this->Applications,['finder' => ['status' => $id]]);
        /*if($this->request->getQuery('status')) {$applications = $this->paginate($this->Applications->find('all')->where(['status' => $this->request->getQuery('status'), 'submitted' => 2, 'report_type' => 'Initial']), ['order' => ['Applications.id' => 'desc']]); }
        else {$applications = $this->paginate($this->Applications->find('all')->where(['submitted' => 2, 'report_type' => 'Initial']), ['order' => ['Applications.id' => 'desc']]);}*/

        $query = $this->Applications
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->query])
            // You can add extra things to the query if you need to
            ->where([['report_type' => 'Initial', 'status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not']]);

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id',   'user_id',   'application_id',   'report_type',   'trial_status_id',   'study_title',   'short_title',   'public_title',   'scientific_title',   'public_contact_email',   'public_contact_name',   'public_contact_designation',   'public_contact_phone',   'public_contact_postal',   'public_contact_affiliation',   'scientific_contact_email',   'scientific_contact_designation',   'scientific_contact_name',   'scientific_contact_phone',   'scientific_contact_postal',   'scientific_contact_affiliation',   'countries_recruitment',   'abstract_of_study',   'protocol_no',   'version_no',   'date_of_protocol',   'protocol_version',   'study_drug',   'drug_name',   'quantity_excemption',   'drug_details',   'medicine_reaction',   'medicine_therapeutic_effects',   'medicine_registered_details',   'trial_origin_details',   'other_country_details',   'safety',   'medicine_registered',   'trials_origin_country',   'registered_other_country',   'registered_other_country_details',   'application_other_country',   'application_other_country_details',   'rejected_other_country',   'rejected_other_country_details',   'administration_route',   'exemption_required',   'state_antidote',   'ethic_considerations',   'insurance_company',   'insurance_address',   'insurance_amount',   'other_insurance',   'ethical_review_status',   'date_of_approval_ethics',   'concomitant_medicine',   'status_medicine',   'given_concomitantly',   'concomitant_name',   'concurrent_medicine',   'disease_condition',   'sponsor_name',   'sponsor_contact_person',   'sponsor_address',   'sponsor_telephone_number',   'sponsor_fax_number',   'sponsor_cell_number',   'sponsor_email_address',   'participants_description',   'product_type_biologicals',   'product_type_proteins',   'product_type_immunologicals',   'product_type_vaccines',   'product_type_hormones',   'product_type_toxoid',   'product_type_chemical',   'product_type_medical_device',   'product_type_chemical_name',   'product_type_medical_device_name',   'participants_justification',   'ecct_not_applicable',   'ecct_ref_number',   'email_address',   'applicant_covering_letter',   'applicant_protocol',   'applicant_patient_information',   'applicant_investigators_brochure',   'applicant_investigators_cv',   'applicant_signed_declaration',   'applicant_financial_declaration',   'applicant_gmp_certificate',   'applicant_indemnity_cover',   'applicant_opinion_letter',   'applicant_approval_letter',   'applicant_statement',   'applicant_participating_countries',   'applicant_addendum',   'applicant_fees',   'applicant_mc10',   'applicant_study_monitors',   'applicant_monitoring_plans',   'applicant_pi_declaration',   'applicant_study_sponsorship',   'applicant_pharmacy_plan',   'applicant_pharmacy_license',   'applicant_study_medicines',   'applicant_insurance_certificate',   'applicant_generic_insurance',   'applicant_ethics_approval',   'applicant_ethics_letter',   'applicant_country_approvals',   'applicant_advertisments',   'applicant_electronic_versions',   'applicant_safety_monitoring',   'applicant_biological_products',   'applicant_dossier',   'placebo_present',   'principal_inclusion_criteria',   'principal_exclusion_criteria',   'primary_end_points',   'scope_diagnosis',   'scope_prophylaxis',   'scope_therapy',   'scope_safety',   'scope_efficacy',   'scope_pharmacokinetic',   'scope_pharmacodynamic',   'scope_bioequivalence',   'scope_dose_response',   'scope_pharmacogenetic',   'scope_pharmacogenomic',   'scope_pharmacoecomomic',   'scope_others',   'scope_others_specify',   'trial_human_pharmacology',   'trial_administration_humans',   'trial_bioequivalence_study',   'trial_other',   'trial_other_specify',   'trial_therapeutic_exploratory',   'trial_therapeutic_confirmatory',   'trial_therapeutic_use',   'design_controlled',   'site_capacity',   'staff_numbers',   'other_details_explanation',   'other_details_regulatory_notapproved',   'other_details_regulatory_approved',   'other_details_regulatory_rejected',   'other_details_regulatory_halted',   'recording_effects',   'tests_done',   'recording_method',   'trial_storage',   'measures_compliance',   'evalution_of_results',   'inform_persons',   'inform_staff',   'record_keeping',   'animal_particulars',   'estimated_duration',   'design_controlled_randomised',   'design_controlled_open',   'design_controlled_single_blind',   'design_controlled_double_blind',   'design_controlled_parallel_group',   'design_controlled_cross_over',   'design_controlled_other',   'design_controlled_specify',   'design_controlled_comparator',   'design_controlled_other_medicinal',   'design_controlled_placebo',   'design_controlled_medicinal_other',   'design_controlled_medicinal_specify',   'single_site_member_state',   'location_of_area',   'single_site_physical_address',   'single_site_contact_person',   'single_site_telephone',   'single_site_name',   'single_site_contact_details',   'single_site_province_id',   'multiple_sites_member_state',   'multiple_countries',   'multiple_member_states',   'number_of_sites',   'multi_country_list',   'data_monitoring_committee',   'total_enrolment_per_site',   'total_participants_worldwide',   'population_less_than_18_years',   'population_utero',   'population_preterm_newborn',   'population_newborn',   'population_infant_and_toddler',   'population_children',   'population_adolescent',   'population_above_18',   'population_adult',   'population_elderly',   'gender_female',   'gender_male',   'subjects_healthy',   'subjects_patients',   'subjects_vulnerable_populations',   'subjects_women_child_bearing',   'subjects_women_using_contraception',   'subjects_pregnant_women',   'subjects_nursing_women',   'subjects_emergency_situation',   'subjects_incapable_consent',   'subjects_specify',   'subjects_others',   'subjects_others_specify',   'investigator1_full_name',   'investigator1_date_of_birth',   'investigator1_qualification',   'investigator1_professional_address',   'investigator1_telephone',   'investigator1_email',   'business_name',   'business_office',   'business_physical_address',   'business_telephone',   'business_position',   'money_source',   'business_field_manufacture',   'organisations_transferred_',   'number_participants',   'notification',   'approval_date',   'submitted',   'deleted',   'deleted_date',   'deactivated',   'date_submitted',   'status',   'approved',   'approved_reason',   'final_report',   'modified',   'created'];

            $_extract = ['id',   'user_id',   'application_id',   'report_type',   'trial_status_id',   'study_title',   'short_title',   'public_title',   'scientific_title',   'public_contact_email',   'public_contact_name',   'public_contact_designation',   'public_contact_phone',   'public_contact_postal',   'public_contact_affiliation',   'scientific_contact_email',   'scientific_contact_designation',   'scientific_contact_name',   'scientific_contact_phone',   'scientific_contact_postal',   'scientific_contact_affiliation',   'countries_recruitment',   'abstract_of_study',   'protocol_no',   'version_no',   'date_of_protocol',   'protocol_version',   'study_drug',   'drug_name',   'quantity_excemption',   'drug_details',   'medicine_reaction',   'medicine_therapeutic_effects',   'medicine_registered_details',   'trial_origin_details',   'other_country_details',   'safety',   'medicine_registered',   'trials_origin_country',   'registered_other_country',   'registered_other_country_details',   'application_other_country',   'application_other_country_details',   'rejected_other_country',   'rejected_other_country_details',   'administration_route',   'exemption_required',   'state_antidote',   'ethic_considerations',   'insurance_company',   'insurance_address',   'insurance_amount',   'other_insurance',   'ethical_review_status',   'date_of_approval_ethics',   'concomitant_medicine',   'status_medicine',   'given_concomitantly',   'concomitant_name',   'concurrent_medicine',   'disease_condition',   'sponsor_name',   'sponsor_contact_person',   'sponsor_address',   'sponsor_telephone_number',   'sponsor_fax_number',   'sponsor_cell_number',   'sponsor_email_address',   'participants_description',   'product_type_biologicals',   'product_type_proteins',   'product_type_immunologicals',   'product_type_vaccines',   'product_type_hormones',   'product_type_toxoid',   'product_type_chemical',   'product_type_medical_device',   'product_type_chemical_name',   'product_type_medical_device_name',   'participants_justification',   'ecct_not_applicable',   'ecct_ref_number',   'email_address',   'applicant_covering_letter',   'applicant_protocol',   'applicant_patient_information',   'applicant_investigators_brochure',   'applicant_investigators_cv',   'applicant_signed_declaration',   'applicant_financial_declaration',   'applicant_gmp_certificate',   'applicant_indemnity_cover',   'applicant_opinion_letter',   'applicant_approval_letter',   'applicant_statement',   'applicant_participating_countries',   'applicant_addendum',   'applicant_fees',   'applicant_mc10',   'applicant_study_monitors',   'applicant_monitoring_plans',   'applicant_pi_declaration',   'applicant_study_sponsorship',   'applicant_pharmacy_plan',   'applicant_pharmacy_license',   'applicant_study_medicines',   'applicant_insurance_certificate',   'applicant_generic_insurance',   'applicant_ethics_approval',   'applicant_ethics_letter',   'applicant_country_approvals',   'applicant_advertisments',   'applicant_electronic_versions',   'applicant_safety_monitoring',   'applicant_biological_products',   'applicant_dossier',   'placebo_present',   'principal_inclusion_criteria',   'principal_exclusion_criteria',   'primary_end_points',   'scope_diagnosis',   'scope_prophylaxis',   'scope_therapy',   'scope_safety',   'scope_efficacy',   'scope_pharmacokinetic',   'scope_pharmacodynamic',   'scope_bioequivalence',   'scope_dose_response',   'scope_pharmacogenetic',   'scope_pharmacogenomic',   'scope_pharmacoecomomic',   'scope_others',   'scope_others_specify',   'trial_human_pharmacology',   'trial_administration_humans',   'trial_bioequivalence_study',   'trial_other',   'trial_other_specify',   'trial_therapeutic_exploratory',   'trial_therapeutic_confirmatory',   'trial_therapeutic_use',   'design_controlled',   'site_capacity',   'staff_numbers',   'other_details_explanation',   'other_details_regulatory_notapproved',   'other_details_regulatory_approved',   'other_details_regulatory_rejected',   'other_details_regulatory_halted',   'recording_effects',   'tests_done',   'recording_method',   'trial_storage',   'measures_compliance',   'evalution_of_results',   'inform_persons',   'inform_staff',   'record_keeping',   'animal_particulars',   'estimated_duration',   'design_controlled_randomised',   'design_controlled_open',   'design_controlled_single_blind',   'design_controlled_double_blind',   'design_controlled_parallel_group',   'design_controlled_cross_over',   'design_controlled_other',   'design_controlled_specify',   'design_controlled_comparator',   'design_controlled_other_medicinal',   'design_controlled_placebo',   'design_controlled_medicinal_other',   'design_controlled_medicinal_specify',   'single_site_member_state',   'location_of_area',   'single_site_physical_address',   'single_site_contact_person',   'single_site_telephone',   'single_site_name',   'single_site_contact_details',   'single_site_province_id',   'multiple_sites_member_state',   'multiple_countries',   'multiple_member_states',   'number_of_sites',   'multi_country_list',   'data_monitoring_committee',   'total_enrolment_per_site',   'total_participants_worldwide',   'population_less_than_18_years',   'population_utero',   'population_preterm_newborn',   'population_newborn',   'population_infant_and_toddler',   'population_children',   'population_adolescent',   'population_above_18',   'population_adult',   'population_elderly',   'gender_female',   'gender_male',   'subjects_healthy',   'subjects_patients',   'subjects_vulnerable_populations',   'subjects_women_child_bearing',   'subjects_women_using_contraception',   'subjects_pregnant_women',   'subjects_nursing_women',   'subjects_emergency_situation',   'subjects_incapable_consent',   'subjects_specify',   'subjects_others',   'subjects_others_specify',   'investigator1_full_name',   'investigator1_date_of_birth',   'investigator1_qualification',   'investigator1_professional_address',   'investigator1_telephone',   'investigator1_email',   'business_name',   'business_office',   'business_physical_address',   'business_telephone',   'business_position',   'money_source',   'business_field_manufacture',   'organisations_transferred_',   'number_participants',   'notification',   'approval_date',   'submitted',   'deleted',   'deleted_date',   'deactivated',   'date_submitted',   'status',   'approved',   'approved_reason',   'final_report',   'modified',   'created'];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }

        //$this->set(compact('applications'));
        //$this->set('_serialize', ['applications']);
        $this->set('applications', $this->paginate($query));
        $this->render('/Base/Applications/index');
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        // $this->viewBuilder()->setLayout('vanilla');
        // => function ($q) { return $q->where(['Amendments.submitted' => 2]);        }
        $contains = $this->_contain;
        //unset($contains[array_search('Amendments', $contains)]);
        $contains['Amendments'] =  function ($q) { return $q->where(['Amendments.submitted' => 2]); };

        $application = $this->Applications->get($id, [
            'contain' => $contains
        ]);

        $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
        array_push($filt, 1);
        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $internal_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 3,
            'id NOT IN' => $filt]);
        $external_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 6,
            'id NOT IN' => $filt]);
        
        $this->set(compact('application', 'internal_evaluators', 'external_evaluators', 'all_evaluators', 'provinces'));
        $this->set('_serialize', ['application']);
        //$this->render('/Base/Applications/view');
    }
    
    public function addReview() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application->status = 'Reviewed';

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                (!empty($application->assign_evaluators)) ? 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2]);
                $this->loadModel('Queue.QueuedJobs');    
                foreach ($managers as $manager) {
                    //Notify managers
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_create_review_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');                
                    $data['vars']['user_message'] = $this->request->getData('evaluations.100.recommendations');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_create_review_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                
                $this->Flash->success('Successful review of Application '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            // debug($application->errors());
            $this->Flash->error(__('Unable to create review. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeReview($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->Evaluations->get($id);
        if ($this->Auth->user('group_id') == $review->user_id && $this->Applications->Evaluations->delete($review)) {
            $this->Flash->success(__('The review has been removed.'));
        } else {
            $this->Flash->error(__('The review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }
    
    public function addSection75Review() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application->status = 'Section75';

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                (!empty($application->assign_evaluators)) ? 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2]);
                $this->loadModel('Queue.QueuedJobs');  
                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_create_section75_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');                
                    $data['vars']['internal_message'] = $this->request->getData('seventy_fives.100.internal_review_comment');
                    $data['vars']['user_message'] = $this->request->getData('seventy_fives.100.applicant_review_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_create_section75_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'manager_applicant_section75_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;                
                $data['vars']['decision'] = $this->request->getData('seventy_fives.100.decision');
                $data['vars']['user_message'] = $this->request->getData('seventy_fives.100.applicant_review_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_applicant_section75_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Successful section 75 review of Application '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create review. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeSection75Review($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->SeventyFives->get($id);
        if ($this->Auth->user('group_id') == $review->user_id && $this->Applications->SeventyFives->delete($review)) {
            $this->Flash->success(__('The section 75 review has been removed.'));
        } else {
            $this->Flash->error(__('The section 75 review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    
    public function requestInfo() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application->status = 'RequestReporter';

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                (!empty($application->assign_evaluators)) ? 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2]);
                $this->loadModel('Queue.QueuedJobs');
                foreach ($managers as $manager) {
                    //Notify managers    
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_create_reporter_request_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');                
                    $data['vars']['internal_message'] = $this->request->getData('request_infos.100.mcaz_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_create_reporter_request_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                // $applicant = $this->Applications->Users->get($application);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_get_request_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['name'] = $manager->name;
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['evaluator_name'] = $this->Auth->user('name');                
                $data['vars']['internal_message'] = $this->request->getData('request_infos.100.mcaz_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_get_request_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Request sent to '.$application->email_address.' for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create review. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeRequest($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->RequestInfos->get($id);
        if ($this->Auth->user('group_id') == $review->user_id && $this->Applications->RequestInfos->delete($review)) {
            $this->Flash->success(__('The request has been removed.'));
        } else {
            $this->Flash->error(__('The request could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }


    public function addGcpInspection() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application->status = 'GCP';

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                (!empty($application->assign_evaluators)) ? 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2]);
                $this->loadModel('Queue.QueuedJobs');  
                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_create_gcp_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');                
                    $data['vars']['internal_message'] = $this->request->getData('gcp_inspections.100.internal_review_comment');
                    $data['vars']['user_message'] = $this->request->getData('gcp_inspections.100.applicant_review_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_create_gcp_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'manager_applicant_gcp_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;                
                $data['vars']['user_message'] = $this->request->getData('gcp_inspections.100.applicant_review_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_applicant_gcp_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Successful GCP Inspection review of Application '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create gcp inspection. Please, try again.')); 
            // debug($application->getErrors());
            // return;
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeGcpInspection($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->GcpInspections->get($id);
        if ($this->Auth->user('group_id') == $review->user_id && $this->Applications->GcpInspections->delete($review)) {
            $this->Flash->success(__('The GCP inspection review has been removed.'));
        } else {
            $this->Flash->error(__('The GCP inspection review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }
    
    public function finance($id = null, $scope = null) {
        if($scope === 'All') {
            $finance_approvals = $this->Applications->FinanceApprovals->findByApplicationId($id);
            $application = $this->Applications->get($id, ['contain' =>  ['InvestigatorContacts', 'Sponsors']]);
        } else {
            $finance = $this->Applications->FinanceApprovals
                ->get($id, ['contain' => ['Applications' => ['InvestigatorContacts', 'Sponsors']]]);            
            $application = $finance->application;
            $finance_approvals[] = $finance;
        }
        $this->set(compact('finance_approvals', 'application'));
        $this->set('_serialize', ['finance_approvals', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_finance_'.$id.'.pdf' : 'application_finance_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/FinanceApprovals/pdf/view');
        }
    }
    public function section75($id = null, $scope = null) {
        if($scope === 'All') {
            $seventy_fives = $this->Applications->SeventyFives->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  ['InvestigatorContacts', 'Sponsors']]);
        } else {
            $section75 = $this->Applications->SeventyFives
                ->get($id, ['contain' => ['Applications' => ['InvestigatorContacts', 'Sponsors'], 'Users']]);            
            $application = $section75->application;
            $seventy_fives[] = $section75;
        }
        $this->set(compact('seventy_fives', 'application'));
        $this->set('_serialize', ['seventy_fives', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_section75_'.$id.'.pdf' : 'application_section75_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/SeventyFives/pdf/view');
        }
    }
    public function evaluator($id = null, $scope = null) {
        if($scope === 'All') {
            $assign_evaluators = $this->Applications->AssignEvaluators->findByApplicationId($id);
            $application = $this->Applications->get($id, ['contain' =>  ['InvestigatorContacts', 'Sponsors']]);
        } else {
            $evaluator = $this->Applications->AssignEvaluators
                ->get($id, ['contain' => ['Applications' => ['InvestigatorContacts', 'Sponsors']]]);            
            $application = $evaluator->application;
            $assign_evaluators[] = $evaluator;
        }
        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $this->set(compact('assign_evaluators', 'application', 'all_evaluators'));
        $this->set('_serialize', ['assign_evaluators', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_evaluator_'.$id.'.pdf' : 'application_evaluator_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/AssignEvaluators/pdf/view');
        }
    }
    public function review($id = null, $scope = null) {
        if($scope === 'All') {
            $evaluations = $this->Applications->Evaluations->findByApplicationId($id);
            $application = $this->Applications->get($id, ['contain' =>  ['InvestigatorContacts', 'Sponsors']]);
        } else {
            $review = $this->Applications->Evaluations
                ->get($id, ['contain' => ['Applications' => ['InvestigatorContacts', 'Sponsors']]]);            
            $application = $review->application;
            $evaluations[] = $review;
        }
        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $this->set(compact('evaluations', 'application', 'all_evaluators'));
        $this->set('_serialize', ['evaluations', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_review_'.$id.'.pdf' : 'application_review_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/Evaluations/pdf/view');
        }
    }
    public function communication($id = null, $scope = null) {
        if($scope === 'All') {
            $request_infos = $this->Applications->RequestInfos->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  ['InvestigatorContacts', 'Sponsors']]);
        } else {
            $request_info = $this->Applications->RequestInfos
                ->get($id, ['contain' => ['Applications' => ['InvestigatorContacts', 'Sponsors'], 'Users']]);            
            $application = $request_info->application;
            $request_infos[] = $request_info;
        }
        $this->set(compact('request_infos', 'application'));
        $this->set('_serialize', ['request_infos', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_communication_'.$id.'.pdf' : 'application_communication_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/RequestInfos/pdf/view');
        }
    }
    public function committee($id = null, $scope = null) {
        if($scope === 'All') {
            $committee_reviews = $this->Applications->CommitteeReviews->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  ['InvestigatorContacts', 'Sponsors']]);
        } else {
            $committee = $this->Applications->CommitteeReviews
                ->get($id, ['contain' => ['Applications' => ['InvestigatorContacts', 'Sponsors'], 'Users']]);            
            $application = $committee->application;
            $committee_reviews[] = $committee;
        }
        $this->set(compact('committee_reviews', 'application'));
        $this->set('_serialize', ['committee_reviews', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_committee_'.$id.'.pdf' : 'application_committee_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/CommitteeReviews/pdf/view');
        }
    }
    public function gcp($id = null, $scope = null) {
        if($scope === 'All') {
            $gcp_inspections = $this->Applications->GcpInspections->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  ['InvestigatorContacts', 'Sponsors']]);
        } else {
            $gcp_inspection = $this->Applications->GcpInspections
                ->get($id, ['contain' => ['Applications' => ['InvestigatorContacts', 'Sponsors'], 'Users']]);            
            $application = $gcp_inspection->application;
            $gcp_inspections[] = $gcp_inspection;
        }
        $this->set(compact('gcp_inspections', 'application'));
        $this->set('_serialize', ['gcp_inspections', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_gcp_'.$id.'.pdf' : 'application_gcp_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/GcpInspections/pdf/view');
        }
    }
}

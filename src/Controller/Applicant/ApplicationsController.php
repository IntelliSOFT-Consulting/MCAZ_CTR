<?php
namespace App\Controller\Applicant;

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
class ApplicationsController extends AppController
{

    public $filt = [1];
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
           // 'contain' => $this->_contain
        ];

        // $applications = $this->paginate($this->Applications,['finder' => ['status' => $id]]);
        /*if($this->request->getQuery('status')) {$applications = $this->paginate($this->Applications->find('all')->where(['status' => $this->request->getQuery('status'), 'submitted' => 2, 'report_type' => 'Initial']), ['order' => ['Applications.id' => 'desc']]); }
        else {$applications = $this->paginate($this->Applications->find('all')->where(['submitted' => 2, 'report_type' => 'Initial']), ['order' => ['Applications.id' => 'desc']]);}*/

        // $query = $this->Orders->find('search', 
        //     $this->Orders->filterParams($this->request->query))->contain(['Users', 'PaymentMethods', 'Industries']
        // )->order(['Orders.created' => 'DESC']);
        // $this->set('orders', $this->paginate($query));

        $query = $this->Applications
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->query])
            ->leftJoinWith('InvestigatorContacts')
            ->leftJoinWith('Sponsors')
            ->leftJoinWith('SiteDetails')
            ->leftJoinWith('Medicines')
            // You can add extra things to the query if you need to
            ->where([['report_type' => 'Initial', 'user_id' => $this->Auth->user('id'),
                      //'status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not'
                     ]])
            ->distinct();

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id',   'user_id',   'application_id',   'report_type',   'trial_status_id',   'study_title',   'short_title',   'public_title',   'scientific_title',   'public_contact_email',   'public_contact_name',   'public_contact_designation',   'public_contact_phone',   'public_contact_postal',   'public_contact_affiliation',   'scientific_contact_email',   'scientific_contact_designation',   'scientific_contact_name',   'scientific_contact_phone',   'scientific_contact_postal',   'scientific_contact_affiliation',   'countries_recruitment',   'abstract_of_study',   'protocol_no',   'version_no',   'date_of_protocol',   'protocol_version',   'study_drug',   'drug_name',   'quantity_excemption',   'drug_details',   'medicine_reaction',   'medicine_therapeutic_effects',   'medicine_registered_details',   'trial_origin_details',   'other_country_details',   'safety',   'medicine_registered',   'trials_origin_country',   'registered_other_country',   'registered_other_country_details',   'application_other_country',   'application_other_country_details',   'rejected_other_country',   'rejected_other_country_details',   'administration_route',   'exemption_required',   'state_antidote',   'ethic_considerations',   'insurance_company',   'insurance_address',   'insurance_amount',   'other_insurance',   'ethical_review_status',   'date_of_approval_ethics',   'concomitant_medicine',   'status_medicine',   'given_concomitantly',   'concomitant_name',   'concurrent_medicine',   'disease_condition',   'sponsor_name',   'sponsor_contact_person',   'sponsor_address',   'sponsor_telephone_number',   'sponsor_fax_number',   'sponsor_cell_number',   'sponsor_email_address',   'participants_description',   'product_type_biologicals',   'product_type_proteins',   'product_type_immunologicals',   'product_type_vaccines',   'product_type_hormones',   'product_type_toxoid',   'product_type_chemical',   'product_type_medical_device',   'product_type_chemical_name',   'product_type_medical_device_name',   'participants_justification',   'ecct_not_applicable',   'ecct_ref_number',   'email_address',   'applicant_covering_letter',   'applicant_protocol',   'applicant_patient_information',   'applicant_investigators_brochure',   'applicant_investigators_cv',   'applicant_signed_declaration',   'applicant_financial_declaration',   'applicant_gmp_certificate',   'applicant_indemnity_cover',   'applicant_opinion_letter',   'applicant_approval_letter',   'applicant_statement',   'applicant_participating_countries',   'applicant_addendum',   'applicant_fees',   'applicant_mc10',   'applicant_study_monitors',   'applicant_monitoring_plans',   'applicant_pi_declaration',   'applicant_study_sponsorship',   'applicant_pharmacy_plan',   'applicant_pharmacy_license',   'applicant_study_medicines',   'applicant_insurance_certificate',   'applicant_generic_insurance',   'applicant_ethics_approval',   'applicant_ethics_letter',   'applicant_country_approvals',   'applicant_advertisments',   'applicant_safety_monitoring',   'applicant_biological_products',   'applicant_dossier',   'placebo_present',   'principal_inclusion_criteria',   'principal_exclusion_criteria',   'primary_end_points',   'scope_diagnosis',   'scope_prophylaxis',   'scope_therapy',   'scope_safety',   'scope_efficacy',   'scope_pharmacokinetic',   'scope_pharmacodynamic',   'scope_bioequivalence',   'scope_dose_response',   'scope_pharmacogenetic',   'scope_pharmacogenomic',   'scope_pharmacoecomomic',   'scope_others',   'scope_others_specify',   'trial_human_pharmacology',   'trial_administration_humans',   'trial_bioequivalence_study',   'trial_other',   'trial_other_specify',   'trial_therapeutic_exploratory',   'trial_therapeutic_confirmatory',   'trial_therapeutic_use',   'design_controlled',   'site_capacity',   'staff_numbers',   'other_details_explanation',   'other_details_regulatory_notapproved',   'other_details_regulatory_approved',   'other_details_regulatory_rejected',   'other_details_regulatory_halted',   'recording_effects',   'tests_done',   'recording_method',   'trial_storage',   'measures_compliance',   'evalution_of_results',   'inform_persons',   'inform_staff',   'record_keeping',   'animal_particulars',   'estimated_duration',   'design_controlled_randomised',   'design_controlled_open',   'design_controlled_single_blind',   'design_controlled_double_blind',   'design_controlled_parallel_group',   'design_controlled_cross_over',   'design_controlled_other',   'design_controlled_specify',   'design_controlled_comparator',   'design_controlled_other_medicinal',   'design_controlled_placebo',   'design_controlled_medicinal_other',   'design_controlled_medicinal_specify',   'single_site_member_state',   'location_of_area',   'single_site_physical_address',   'single_site_contact_person',   'single_site_telephone',   'single_site_name',   'single_site_contact_details',   'single_site_province_id',   'multiple_sites_member_state',   'multiple_countries',   'multiple_member_states',   'number_of_sites',   'multi_country_list',   'data_monitoring_committee',   'total_enrolment_per_site',   'total_participants_worldwide',   'population_less_than_18_years',   'population_utero',   'population_preterm_newborn',   'population_newborn',   'population_infant_and_toddler',   'population_children',   'population_adolescent',   'population_above_18',   'population_adult',   'population_elderly',   'gender_female',   'gender_male',   'subjects_healthy',   'subjects_patients',   'subjects_vulnerable_populations',   'subjects_women_child_bearing',   'subjects_women_using_contraception',   'subjects_pregnant_women',   'subjects_nursing_women',   'subjects_emergency_situation',   'subjects_incapable_consent',   'subjects_specify',   'subjects_others',   'subjects_others_specify',   'investigator1_full_name',   'investigator1_date_of_birth',   'investigator1_qualification',   'investigator1_professional_address',   'investigator1_telephone',   'investigator1_email',   'business_name',   'business_office',   'business_physical_address',   'business_telephone',   'business_position',   'money_source',   'business_field_manufacture',   'organisations_transferred_',   'number_participants',   'notification',   'submitted',   'deleted',   'deleted_date',   'deactivated',   'date_submitted',   'status',   'approved',   'approved_reason',   'final_report',   'modified',   'created'];

            $_extract = ['id',   'user_id',   'application_id',   'report_type',   'trial_status_id',   'study_title',   'short_title',   'public_title',   'scientific_title',   'public_contact_email',   'public_contact_name',   'public_contact_designation',   'public_contact_phone',   'public_contact_postal',   'public_contact_affiliation',   'scientific_contact_email',   'scientific_contact_designation',   'scientific_contact_name',   'scientific_contact_phone',   'scientific_contact_postal',   'scientific_contact_affiliation',   'countries_recruitment',   'abstract_of_study',   'protocol_no',   'version_no',   'date_of_protocol',   'protocol_version',   'study_drug',   'drug_name',   'quantity_excemption',   'drug_details',   'medicine_reaction',   'medicine_therapeutic_effects',   'medicine_registered_details',   'trial_origin_details',   'other_country_details',   'safety',   'medicine_registered',   'trials_origin_country',   'registered_other_country',   'registered_other_country_details',   'application_other_country',   'application_other_country_details',   'rejected_other_country',   'rejected_other_country_details',   'administration_route',   'exemption_required',   'state_antidote',   'ethic_considerations',   'insurance_company',   'insurance_address',   'insurance_amount',   'other_insurance',   'ethical_review_status',   'date_of_approval_ethics',   'concomitant_medicine',   'status_medicine',   'given_concomitantly',   'concomitant_name',   'concurrent_medicine',   'disease_condition',   'sponsor_name',   'sponsor_contact_person',   'sponsor_address',   'sponsor_telephone_number',   'sponsor_fax_number',   'sponsor_cell_number',   'sponsor_email_address',   'participants_description',   'product_type_biologicals',   'product_type_proteins',   'product_type_immunologicals',   'product_type_vaccines',   'product_type_hormones',   'product_type_toxoid',   'product_type_chemical',   'product_type_medical_device',   'product_type_chemical_name',   'product_type_medical_device_name',   'participants_justification',   'ecct_not_applicable',   'ecct_ref_number',   'email_address',   'applicant_covering_letter',   'applicant_protocol',   'applicant_patient_information',   'applicant_investigators_brochure',   'applicant_investigators_cv',   'applicant_signed_declaration',   'applicant_financial_declaration',   'applicant_gmp_certificate',   'applicant_indemnity_cover',   'applicant_opinion_letter',   'applicant_approval_letter',   'applicant_statement',   'applicant_participating_countries',   'applicant_addendum',   'applicant_fees',   'applicant_mc10',   'applicant_study_monitors',   'applicant_monitoring_plans',   'applicant_pi_declaration',   'applicant_study_sponsorship',   'applicant_pharmacy_plan',   'applicant_pharmacy_license',   'applicant_study_medicines',   'applicant_insurance_certificate',   'applicant_generic_insurance',   'applicant_ethics_approval',   'applicant_ethics_letter',   'applicant_country_approvals',   'applicant_advertisments',   'applicant_safety_monitoring',   'applicant_biological_products',   'applicant_dossier',   'placebo_present',   'principal_inclusion_criteria',   'principal_exclusion_criteria',   'primary_end_points',   'scope_diagnosis',   'scope_prophylaxis',   'scope_therapy',   'scope_safety',   'scope_efficacy',   'scope_pharmacokinetic',   'scope_pharmacodynamic',   'scope_bioequivalence',   'scope_dose_response',   'scope_pharmacogenetic',   'scope_pharmacogenomic',   'scope_pharmacoecomomic',   'scope_others',   'scope_others_specify',   'trial_human_pharmacology',   'trial_administration_humans',   'trial_bioequivalence_study',   'trial_other',   'trial_other_specify',   'trial_therapeutic_exploratory',   'trial_therapeutic_confirmatory',   'trial_therapeutic_use',   'design_controlled',   'site_capacity',   'staff_numbers',   'other_details_explanation',   'other_details_regulatory_notapproved',   'other_details_regulatory_approved',   'other_details_regulatory_rejected',   'other_details_regulatory_halted',   'recording_effects',   'tests_done',   'recording_method',   'trial_storage',   'measures_compliance',   'evalution_of_results',   'inform_persons',   'inform_staff',   'record_keeping',   'animal_particulars',   'estimated_duration',   'design_controlled_randomised',   'design_controlled_open',   'design_controlled_single_blind',   'design_controlled_double_blind',   'design_controlled_parallel_group',   'design_controlled_cross_over',   'design_controlled_other',   'design_controlled_specify',   'design_controlled_comparator',   'design_controlled_other_medicinal',   'design_controlled_placebo',   'design_controlled_medicinal_other',   'design_controlled_medicinal_specify',   'single_site_member_state',   'location_of_area',   'single_site_physical_address',   'single_site_contact_person',   'single_site_telephone',   'single_site_name',   'single_site_contact_details',   'single_site_province_id',   'multiple_sites_member_state',   'multiple_countries',   'multiple_member_states',   'number_of_sites',   'multi_country_list',   'data_monitoring_committee',   'total_enrolment_per_site',   'total_participants_worldwide',   'population_less_than_18_years',   'population_utero',   'population_preterm_newborn',   'population_newborn',   'population_infant_and_toddler',   'population_children',   'population_adolescent',   'population_above_18',   'population_adult',   'population_elderly',   'gender_female',   'gender_male',   'subjects_healthy',   'subjects_patients',   'subjects_vulnerable_populations',   'subjects_women_child_bearing',   'subjects_women_using_contraception',   'subjects_pregnant_women',   'subjects_nursing_women',   'subjects_emergency_situation',   'subjects_incapable_consent',   'subjects_specify',   'subjects_others',   'subjects_others_specify',   'investigator1_full_name',   'investigator1_date_of_birth',   'investigator1_qualification',   'investigator1_professional_address',   'investigator1_telephone',   'investigator1_email',   'business_name',   'business_office',   'business_physical_address',   'business_telephone',   'business_position',   'money_source',   'business_field_manufacture',   'organisations_transferred_',   'number_participants',   'notification',   'submitted',   'deleted',   'deleted_date',   'deactivated',   'date_submitted',   'status',   'approved',   'approved_reason',   'final_report',   'modified',   'created'];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }

        //$this->set(compact('applications'));
        //$this->set('_serialize', ['applications']);
        $this->set('applications', $this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $this->viewBuilder()->setLayout('vanilla');
        $application = $this->Applications->get($id, [
            'contain' => $this->_contain,
            'conditions' => ['Applications.user_id' => $this->Auth->user('id'), 'report_type' => 'Initial']
        ]);

        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('application', 'provinces'));
        $this->set('_serialize', ['application']);
    }
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $application = $this->Applications->newEntity();
        if ($this->request->is('post')) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        $users = $this->Applications->Users->find('list', ['limit' => 200]);
        $this->set(compact('application', 'users'));
        $this->set('_serialize', ['application']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*protected function _isApplicant($application) {
        if($application->user_id != $this->Auth->user('id')) {
            $this->Flash->error(__('You don\'t have permission to access this application #'.$application->id.'!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        } elseif ($application->submitted == 2) {
            $this->Flash->error(__('You cannot edit this application because it has been submitted to MCAZ.'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        } elseif ($application->deactivated) {
            $this->Flash->error(__('You cannot view this application because it has been deactivated by MCAZ.'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        }
    }*/

    public function edit($id = null)
    {
        $application = $this->Applications->get($id, [
            'contain' => $this->_contain,
            'conditions' => ['Applications.user_id' => $this->Auth->user('id'), 'report_type' => 'Initial']
        ]);
        if (empty($application)) {
            $this->Flash->error(__('The application does not exists!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        } 
        // $this->_isApplicant($application);  
        if ($application->submitted == 2) {
            $this->Flash->success(__('Application already submitted.'));
            return $this->redirect(['action' => 'view', $application->id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), 
                        ['validate' => ($this->request->getData('submitted') == 2) ? true : false, 
                         'associated' => [
                            'InvestigatorContacts' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                            'Sponsors' => ['validate' => ($this->request->getData('submitted') == 2 && count($application->sponsors) > 0) ? true : false],
                            'Attachments' => ['validate' => true],
                            'Receipts' => ['validate' => true],
                            'Participants' => ['validate' => false],
                            'SiteDetails' => ['validate' => false],
                            'Medicines' => ['validate' => false],
                            'Committees' => ['validate' => false],
                        ]
                     ]);
            //
            if ($application->submitted == 1) {
              //save changes button
              if ($this->Applications->save($application)) {
                $this->Flash->success(__('The changes to the Application  have been saved.'));
                return $this->redirect(['action' => 'edit', $application->id]);
              } else {
                $this->Flash->error(__('Application  could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($application->submitted == 2) {
              //submit to mcaz button
              if (empty($application->mc10_forms)) {                  
                $this->Flash->error(__('13. MC10 Form: Kindly download sign and upload the MC10 form.'));
                return $this->redirect(['action' => 'edit', $application->id]);
              }
              if (empty($application->receipts)) {                  
                $this->Flash->error(__('14. Financials: Kindly upload receipts.'));
                return $this->redirect(['action' => 'edit', $application->id]);
              }
              $application->date_submitted = date("Y-m-d H:i:s");

              //new stage
              $stage1  = $this->Applications->ApplicationStages->newEntity();
              $stage1->stage_id = 1;
              $stage1->stage_date = date("Y-m-d H:i:s");
              $application->application_stages = [$stage1];

              $application->status = 'Submitted';
              //$application->protocol_no = 'CT'.$application->id.'/'.$application->created->i18nFormat('yyyy');
              $application->protocol_no = 'FN'.$application->id.'/'.$application->created->i18nFormat('yyyy');
              if ($this->Applications->save($application)) {
                $this->Flash->success(__('Report '.$application->protocol_no.' has been successfully submitted to MCAZ for review.'));
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $application->email_address, 'user_id' => $this->Auth->user('id'),
                    'type' => 'applicant_submit_application_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    'vars' =>  $application->toArray()
                ]; 
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['name'] = $this->Auth->user('name');
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'applications', 'action' => 'view', $application->id, '_ext' => 'pdf',  
                                          '_full' => true]);
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_submit_application_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers and finance
                $managers = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2, 3, 5]]);
                foreach ($managers as $manager) {
                  $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Applications', 'foreign_key' => $application->id,
                    'vars' =>  $application->toArray()];
                  $data['type'] = 'manager_submit_application_email';
                  $this->QueuedJobs->createJob('GenericEmail', $data);
                  $data['type'] = 'manager_submit_application_notification';
                  $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //
                return $this->redirect(['action' => 'view', $application->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($application->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing the report later'));
                return $this->redirect(['controller' => 'Users','action' => 'dashboard']);

            } else {
              if ($this->Applications->save($application, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Application have been saved.'));
                return $this->redirect(['action' => 'edit', $application->id]);
              } else {
                $this->Flash->error(__('Application could not be saved. Kindly correct the errors and try again.'));
              }
            }
        }

        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('application', 'provinces'));
        $this->set('_serialize', ['application']);

        //start
    }

    public function approvalEdit($id = null) {

        $application = $this->Applications->get($this->request->getData('id'));

        if ($this->request->is('post') and $application->approved == 'Authorize') {
            $application = $this->Applications->patchEntity($application, $this->request->getData());

            if ($this->Applications->save($application)) {
                $this->response->body('Success');
                $this->response->statusCode(200);
                $this->set([
                    'error' => '', 
                    'message' => $this->request->getData(), 
                    'application' => $application,
                    '_serialize' => ['error', 'message', 'application']]);
                return;

            } else {
                $this->response->body('Failure');
                $this->response->statusCode(401);
                $this->set([
                    'message' => 'Unable to save application!!', 
                    '_serialize' => ['message']]);
                return; 
            }
        } else {
            $this->response->body('Failure');
            $this->response->statusCode(404);
            $this->set([
                'error' => 'Only approved protocols', 
                'message' => 'Only approved protocols', 
                '_serialize' => ['error', 'message']]);
            return;
        }
    }


    public function addAmendment($id) {
        $application = $this->Applications->get($id, ['contain' => ['Amendments' => ['conditions' => ['submitted !=' => 2]]]]);
        if (empty($application)) {
            $this->Flash->error(__('The application does not exists!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        } 

        if (!empty($application->amendments)) {            
            $this->Flash->warning(__('An editable amendment is already available. Please submit the amendment before creating a new one'));
            return $this->redirect(['action' => 'amendment', end($application->amendments)['id']]);
        }
        $amendment = $this->Applications->Amendments->newEntity();
        if ($this->request->is('post')) {
            // $amendment = $this->Applications->patchEntity($application, $this->request->getData());
            $amendment->report_type = 'Amendment';
            $amendment->application_id = $application->id;
            $amendment->user_id = $this->Auth->user('id');
            //New amendment to have finance temporary protocol no
            $amendment->protocol_no = $application->protocol_no.' - FN'.(count($application->amendments)+1).'/'.date('Y');

            //new stage
            /*$stage1  = $this->Applications->Amendments->ApplicationStages->newEntity();
            $stage1->stage_id = 1;
            $stage1->stage_date = date("Y-m-d H:i:s");
            $amendment->application_stages = [$stage1];
            $amendment->status = 'Submitted';*/

            if ($this->Applications->Amendments->save($amendment, ['validate' => false])) {

                $this->Flash->success(__('Amendment '.$amendment->protocol_no.' for '.$application->protocol_no.' has been successfully submitted to MCAZ for review.'));
                //send email and notification
                /*$this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $application->email_address, 'user_id' => $this->Auth->user('id'),
                    'type' => 'applicant_submit_amendment_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    'vars' =>  $application->toArray()
                ]; 
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'applications', 'action' => 'view', $application->id, 
                    '_ext' => 'pdf', '_full' => true]);
                $data['vars']['amend_no'] = $amendment->protocol_no;
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_submit_amendment_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers and finance
                $managers = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2, 3, 5]]);
                foreach ($managers as $manager) {
                  $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Applications', 
                            'foreign_key' => $application->id, 'vars' =>  $application->toArray()];
                  $data['vars']['amend_no'] = $amendment->protocol_no;
                  $data['type'] = 'manager_submit_amendment_email';
                  $this->QueuedJobs->createJob('GenericEmail', $data);
                  $data['type'] = 'manager_submit_amendment_notification';
                  $this->QueuedJobs->createJob('GenericNotification', $data);
                }*/
                
                return $this->redirect(['action' => 'amendment', $amendment->id]);
            }
            $this->Flash->error(__('The amendment could not be created. Please, try again.'));
        }
        $this->Flash->error(__('Unable to perform action. Kindly contact MCAZ.'));
        $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
    }

    public function amendment($id = null)
    {

        $amendment = $this->Applications->Amendments->get($id, [
            'contain' => $this->a_contain,
            'conditions' => ['Amendments.user_id' => $this->Auth->user('id'), 'Amendments.report_type' => 'Amendment']
        ]);
        $application = $this->Applications->get($amendment->application_id, [
            'contain' => $this->_contain,
            'conditions' => ['Applications.user_id' => $this->Auth->user('id')]
        ]);
        if (empty($amendment)) {
            $this->Flash->error(__('The amendment does not exists!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        } 
        if ($amendment->submitted == 2) {
            $this->Flash->success(__('Amendment already submitted.'));
            return $this->redirect(['action' => 'view', $application->id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $amendment = $this->Applications->patchEntity($amendment, $this->request->getData(), 
                        ['validate' => false, 
                         'associated' => [
                            'InvestigatorContacts' =>  ['validate' => false],
                            'Sponsors' =>  ['validate' => false],
                            'Attachments' => ['validate' => false],
                            'Receipts' => ['validate' => true],
                            'Participants' => ['validate' => false],
                            'SiteDetails' => ['validate' => false],
                            'Medicines' => ['validate' => false],
                            'Committees' => ['validate' => false],
                        ]
                     ]);
            //
            // debug($this->request->getData());
            // debug($amendment->errors());
            // return;
            if ($amendment->submitted == 1) {
              //save changes button
              if ($this->Applications->Amendments->save($amendment)) {
                $this->Flash->success(__('The changes to the amendment  have been saved.'));
                return $this->redirect(['action' => 'amendment', $amendment->id]);
              } else {
                $this->Flash->error(__('Report  could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($amendment->submitted == 2) {

              if (empty($amendment->receipts)) {                  
                $this->Flash->error(__('14. Financials: Kindly upload receipts before submitting amendment.'));
                return $this->redirect(['action' => 'amendment', $amendment->id]);
              }

              //submit to mcaz button
              $amendment->date_submitted = date("Y-m-d H:i:s");


              //new stage
              $stage1  = $this->Applications->ApplicationStages->newEntity();
              $stage1->stage_id = 1;
              $stage1->stage_date = date("Y-m-d H:i:s");
              $amendment->application_stages = [$stage1];
              $amendment->status = 'Submitted';
              
              if ($this->Applications->Amendments->save($amendment)) {
                $this->Flash->success(__('Amendment '.$amendment->created.' has been successfully submitted to MCAZ for review.'));
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $application->email_address, 'user_id' => $this->Auth->user('id'),
                    'type' => 'applicant_submit_amendment_email', 'model' => 'Amendments', 'foreign_key' => $amendment->id,
                ]; 
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['amend_no'] = $amendment->protocol_no;
                $data['vars']['applicant_name'] = $this->Auth->user('name');
                $data['vars']['date_submitted'] = $amendment->date_submitted;
                $data['vars']['email_address'] = $application->email_address;
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'applications', 'action' => 'view', $amendment->id, '_ext' => 'pdf',  
                                          '_full' => true]);
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_submit_amendment_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers and finance
                $managers = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2, 5]]);
                foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Amendments', 'foreign_key' => $amendment->id];
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['amend_no'] = $amendment->protocol_no;
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['date_submitted'] = $amendment->date_submitted;
                    $data['type'] = 'manager_submit_amendment_email';
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_submit_amendment_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //notify assigned evaluators
                foreach ($application->assign_evaluators as $evaluator) {
                    $manager = $this->Applications->Users->get($evaluator->assigned_to, []);
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Amendments', 'foreign_key' => $amendment->id];
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['amend_no'] = $amendment->protocol_no;
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['date_submitted'] = $amendment->date_submitted;
                    $data['type'] = 'manager_submit_amendment_email';
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_submit_amendment_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //
                return $this->redirect(['action' => 'view', $application->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($amendment->submitted == "-1") {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing the report later'));
                return $this->redirect(['controller' => 'Users','action' => 'dashboard']);

            } 
        }

        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('application', 'amendment', 'provinces'));
        $this->set('_serialize', ['application']);
    }

    public function addAttachments()
    {
        $application = $this->Applications->get($this->request->getData('foreign_key'), ['contain' => [], 'fields' => ['id', 'user_id']]);
        if (empty($application)) {
            $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                        'errors' => 'The application does not exist',
                        'message' => 'Failure', 
                        '_serialize' => ['errors','message']]);
                    return;
        }

        //$category = $this->request->getData();
        if ($this->request->is('post')) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->set([
                        'message' => 'Success', 
                        //'category' => $category,
                        'content' => $application['attachments'],
                        '_serialize' => ['message', 'content', 'category']]);
                    return;
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                        'errors' => $application->errors(),
                        'message' => 'Failure', 
                        '_serialize' => ['errors','message']]);
                    return;
            }
        }
        $this->set(compact('application'));
        $this->set('_serialize', ['application']);
    }


    public function requestInfoResponse() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), 
                        ['validate' => true,
                            'associated' => [
                                'RequestInfos' => ['validate' => true],
                                'RequestInfos.Attachments'
                            ]
                        ]);

            //$application->status = 'ReporterResponse';

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
                        'type' => 'applicant_respond_request_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');                
                    $data['vars']['applicant_message'] = $this->request->getData('request_infos.100.applicant_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_respond_request_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                // $applicant = $this->Applications->Users->get($application);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_send_request_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $this->Auth->user('name');                
                $data['vars']['applicant_message'] = $this->request->getData('request_infos.100.applicant_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_send_request_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Request sent to MCAZ for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create review. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function raiseAppeal() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), 
                        ['validate' => true,
                            'associated' => [
                                'Appeals' => ['validate' => true],
                                'Appeals.Attachments'
                            ]
                        ]);

            /*debug($this->request->getData());
            debug($application);
            return;*/

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
                        'type' => 'manager_appeal_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');                
                    $data['vars']['applicant_message'] = $this->request->getData('appeals.100.comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_appeal_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                // $applicant = $this->Applications->Users->get($application);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_raise_appeal_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $this->Auth->user('name');                
                $data['vars']['applicant_message'] = $this->request->getData('appeals.100.comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_raise_appeal_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Appeal for '.$application->protocol_no.' sent to MCAZ for review');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create appeal. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function addSection75() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            //$application->status = 'Section75';

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
                        'type' => 'applicant_section75_request_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');                
                    $data['vars']['applicant_message'] = $this->request->getData('seventy_fives.100.applicant_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_section75_request_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                // $applicant = $this->Applications->Users->get($application);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_send_section75_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $this->Auth->user('name');                
                $data['vars']['applicant_message'] = $this->request->getData('seventy_fives.100.applicant_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_section75_request_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Section 75 request sent to MCAZ for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create request. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function addNotifications() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            //$application->status = 'Notification';

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
                        'type' => 'applicant_notification_managers_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');                
                    //notify managers
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_notification_managers_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                // $applicant = $this->Applications->Users->get($application);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_send_notification_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $this->Auth->user('name');                
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_send_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Notification sent to MCAZ for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create request. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function addGcpInspection() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            //$application->status = 'GCP';

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
                        'type' => 'applicant_gcp_request_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');                
                    $data['vars']['applicant_message'] = $this->request->getData('gcp_inspections.100.applicant_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_gcp_request_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                // $applicant = $this->Applications->Users->get($application);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_send_gcp_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $this->Auth->user('name');                
                $data['vars']['applicant_message'] = $this->request->getData('gcp_inspections.100.applicant_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_gcp_inspection_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('GCP Inspection feedback sent to MCAZ for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create gcp inspection request. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function addIndemnityForms($id) {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);
        $dg_review = $this->Applications->DgReviews->get($id);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            
            $dg_review = $this->Applications->DgReviews->patchEntity($dg_review, $this->request->getData());

            /**
             * Applicant uploads Indemnity forms then the application moves to Authorize.
             * 
             */

            $application->status = 'Authorize';
            $application->approved = 'Authorize';

            // debug($application);
            // return;
            if ($this->Applications->DgReviews->save($dg_review) && $this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, $application->user_id);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 7]])->orWhere(['id IN' => $filt]);

                //Notify managers, evaluators, director generals and users that indemnity forms have been uploaded
                $this->loadModel('Queue.QueuedJobs');  
                foreach ($managers as $manager) {
                    $data = [
                        'email_address' => ($manager->id == $application->user_id) ? $application->email_address : $manager->email, 
                        'user_id' => $manager->id,
                        'type' => 'indemnity_forms_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');  
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'indemnity_forms_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                
                $this->Flash->success('Successfully uploaded indemnity forms for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            // $this->Flash->error(__('Unable to create dg review. Please, try again.')); 
            $this->Flash->error('Unable to upload indemnity forms. Please, try again. <br>'.implode('<br>', Hash::flatten($application->errors())),
                                ['escape' => false]); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    /*   Add the final Report for the protocol
     *   Adious
    */
    public function addFinalReport($id = null) {
        $application = $this->Applications->get((isset($id)) ? $id : $this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), 
                        ['validate' => true,
                            'associated' => [
                                'FinalStages' => ['validate' => true],
                                'FinalStages.Attachments'
                            ]
                     ]);


            /**
             * Final Report 
             * Ensure Forms are attached before submit
             * 
             */
            if(!in_array("12", Hash::extract($application->application_stages, '{n}.stage_id'))) { 
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 12;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->final_stages[0]->approved_date;
                $application->application_stages = [$stage1];
                $application->status = 'FinalStage';
            }

            // debug($application);
            // return;
            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                $this->loadModel('Queue.QueuedJobs'); 

                //Notify director general(s)
                $secgs = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 7]);
                foreach ($secgs as $secg) {
                    $data = [
                            'email_address' => $secg->email, 'user_id' => $secg->id,
                            'type' => 'director_general_final_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['name'] = $secg->name;                
                    // $data['vars']['internal_message'] = $this->request->getData('final_stages.100.internal_review_comment');
                    $data['vars']['approved_date'] = $this->request->getData('final_stages.100.approved_date');
                    $data['vars']['user_message'] = $this->request->getData('final_stages.100.applicant_review_comment');
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'director_general_final_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
 
                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_final_stage_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');  
                    $data['vars']['internal_message'] = $this->request->getData('final_stages.100.internal_review_comment');
                    $data['vars']['approved_date'] = $this->request->getData('final_stages.100.approved_date');
                    $data['vars']['user_message'] = $this->request->getData('final_stages.100.applicant_review_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_final_stage_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //Notify Applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_final_stage_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;                
                $data['vars']['approved_date'] = $this->request->getData('final_stages.100.approved_date');
                $data['vars']['user_message'] = $this->request->getData('final_stages.100.applicant_review_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_final_stage_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                
                $this->Flash->success('Successful submit final report for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error('Unable to submit final report. Please, try again. <br>'.implode('<br>', Hash::flatten($application->errors())),
                                ['escape' => false]); 
            // debug($application->errors());
            // return;
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    /*   Add the final Report for the protocol
     *   Adious
    */

    public function addAnnualApproval($id = null) {
        $application = $this->Applications->get((isset($id)) ? $id : $this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), 
                        ['validate' => true,
                            'associated' => [
                                'AnnualApprovals' => ['validate' => true],
                                'AnnualApprovals.Attachments'
                            ]
                     ]);


            /**
             * Annual Approvals 
             * Ensure receipts are attached before submit
             * 
             */
            // debug($application);
            // return;
            
            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                $this->loadModel('Queue.QueuedJobs'); 

                //Notify finance user(s)
                $fins = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 5]);
                foreach ($fins as $fin) {
                    $data = [
                            'email_address' => $fin->email, 'user_id' => $fin->id,
                            'type' => 'finance_annual_approval_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['name'] = $fin->name;                
                    $data['vars']['approved_date'] = $this->request->getData('annual_approvals.100.approved_date');
                    $data['vars']['user_message'] = $this->request->getData('annual_approvals.100.applicant_review_comment');
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'finance_annual_approval_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
 
                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_annual_approval_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');  
                    $data['vars']['user_message'] = $this->request->getData('annual_approvals.100.applicant_review_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_annual_approval_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //Notify Applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_annual_approval_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;                
                $data['vars']['approved_date'] = $this->request->getData('annual_approvals.100.approved_date');
                $data['vars']['user_message'] = $this->request->getData('annual_approvals.100.applicant_review_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_annual_approval_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                
                $this->Flash->success('Successful submit annual approval for '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error('Unable to submit annual approval. Please, try again. <br>'.implode('<br>', Hash::flatten($application->errors())),
                                ['escape' => false]); 
            // debug($application->errors());
            // return;
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    /**
     * Delete method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $application = $this->Applications->get($id);
        if($application->submitted != 2) {
            if ($this->Applications->delete($application)) {
                $this->Flash->success(__('The application has been deleted.'));
            } else {
                $this->Flash->error(__('The application could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }


    //PDF views
    public function finance($id = null, $scope = null) {
        if($scope === 'All') {
            $finance_approvals = $this->Applications->FinanceApprovals->findByApplicationId($id)->contain(['Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $finance = $this->Applications->FinanceApprovals
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Attachments']]);            
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
        }
    }
    public function section75($id = null, $scope = null) {
        if($scope === 'All') {
            $seventy_fives = $this->Applications->SeventyFives->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $section75 = $this->Applications->SeventyFives
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users']]);            
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
        }
    }
    public function evaluator($id = null, $scope = null) {
        if($scope === 'All') {
            $assign_evaluators = $this->Applications->AssignEvaluators->findByApplicationId($id);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $evaluator = $this->Applications->AssignEvaluators
                ->get($id, ['contain' => ['Applications' => $this->_contain]]);            
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
        }
    }
    public function communication($id = null, $scope = null) {
        if($scope === 'All') {
            $request_infos = $this->Applications->RequestInfos->findByApplicationId($id)->contain(['Users', 'Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $request_info = $this->Applications->RequestInfos
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users', 'Attachments']]);            
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
        }
    }
    public function committee($id = null, $scope = null) {
        if($scope === 'All') {
            $committee_reviews = $this->Applications->CommitteeReviews->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $committee = $this->Applications->CommitteeReviews
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users']]);            
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
        }
    }
    public function committeeFeedback($id = null, $scope = null) {
        if($scope === 'All') {
            $comments = $this->Applications->Comments->findByApplicationId($id)->contain(['Responses', 'Attachments', 'Responses.Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } 
        $this->set(compact('comments', 'application'));
        $this->set('_serialize', ['comments', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_committee_feedback_'.$id.'.pdf' : 'application_committee_feedback_'.$id.'.pdf'
                ]
            ]);
        }
    }
    public function dg($id = null, $scope = null) {
        if($scope === 'All') {
            $dg_reviews = $this->Applications->DgReviews->findByApplicationId($id)->contain(['Users', 'Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $dg = $this->Applications->DgReviews
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users', 'Attachments']]);            
            $application = $dg->application;
            $dg_reviews[] = $dg;
        }
        $this->set(compact('dg_reviews', 'application'));
        $this->set('_serialize', ['dg_reviews', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_dg_'.$id.'.pdf' : 'application_dg_'.$id.'.pdf'
                ]
            ]);
        }
    }
    public function gcp($id = null, $scope = null) {
        if($scope === 'All') {
            $gcp_inspections = $this->Applications->GcpInspections->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $gcp_inspection = $this->Applications->GcpInspections
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users']]);            
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
        }
    }
    public function appeal($id = null, $scope = null) {
        if($scope === 'All') {
            $appeals = $this->Applications->Appeals->findByApplicationId($id)->contain(['Users', 'Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $appeal = $this->Applications->Appeals
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users', 'Attachments']]);            
            $application = $appeal->application;
            $appeals[] = $appeal;
        }
        $this->set(compact('appeals', 'application'));
        $this->set('_serialize', ['appeals', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_appeal_'.$id.'.pdf' : 'application_appeal_'.$id.'.pdf'
                ]
            ]);
        }
    }
    public function finals($id = null, $scope = null) {
        if($scope === 'All') {
            $final_stages = $this->Applications->FinalStages->findByApplicationId($id)->contain(['Users', 'Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $final_stage = $this->Applications->FinalStages
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users', 'Attachments']]);            
            $application = $final_stage->application;
            $final_stages[] = $final_stage;
        }
        $this->set(compact('final_stages', 'application'));
        $this->set('_serialize', ['final_stages', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_final_stage_'.$id.'.pdf' : 'application_gcp_'.$id.'.pdf'
                ]
            ]);
        }
    }
    public function annualApprovals($id = null, $scope = null) {
        if($scope === 'All') {
            $annual_approvals = $this->Applications->AnnualApprovals->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $annual_approval = $this->Applications->AnnualApprovals
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users']]);            
            $application = $annual_approval->application;
            $annual_approvals[] = $annual_approval;
        }
        $this->set(compact('annual_approvals', 'application'));
        $this->set('_serialize', ['annual_approvals', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_annual_approval_'.$id.'.pdf' : 'application_gcp_'.$id.'.pdf'
                ]
            ]);
        }
    }
    public function stages($id = null) {
        $application = $this->Applications->get($id, ['contain' => $this->_contain]);
        $this->set(compact( 'application'));
        $this->set('_serialize', ['application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_stages_'.$id.'.pdf' : 'application_stages_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/Stages/pdf/application_view');
        }
    }
}

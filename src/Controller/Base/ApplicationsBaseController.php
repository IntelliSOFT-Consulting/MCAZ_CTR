<?php

namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\View\Helper\HtmlHelper;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[] paginate($object = null, array $settings = [])
 */
class ApplicationsBaseController extends AppController
{
    public $filt = [1];
    public function initialize()
    {
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
            ->contain($this->_contain)
            // You can add extra things to the query if you need to
            ->where([['report_type' => 'Initial', 'status !=' => (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not']])
            ->order(['Applications.id' => 'desc'])
            ->distinct();

        // Secretary General only able to view once it has been approved
        if ($this->Auth->user('group_id') == 7) {
            $query->matching('ApplicationStages', function ($q) {
                return $q->where(['ApplicationStages.stage_id' => 9]);
            });
        }

        //Evaluators and External evaluators only to view if assigned
        //    if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {
        //         $query->matching('AssignEvaluators', function ($q) {
        //             return $q->where(['AssignEvaluators.assigned_to' => $this->Auth->user('id')]);
        //         });
        //    }

        //Commented out the above to display all the reports to Evaluators


        // Secretary General only able to view once it has been approved
        if ($this->Auth->user('group_id') == 7) {
            $query->matching('ApplicationStages', function ($q) {
                return $q->where(['ApplicationStages.stage_id' => 9]);
            });
        }


        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $_provinces = $provinces->toArray();
        $users = $this->Applications->Users->find('list', ['limit' => 200]);
        $_users = $users->toArray();

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = [
                'Protocol No', 'PUBLIC TITLE/ACRONYM', 'Scientific Title', 'Contact for Public Queries: Name', 'Contact for Public Queries: Designation', 'Contact for Public Queries: Email', 'Contact for Public Queries: Phone number', 'Contact for Public Queries: Postal Address', 'Contact for Public Queries: Affiliation', 'Contact for Scientific Queries: Name', 'Contact for Scientific Queries: Designation', 'Contact for Scientific Queries: Email', 'Contact for Scientific Queries: Phone number', 'Contact for Scientific Queries: Postal Address', 'Contact for Scientific Queries: Affiliation', 'Countries of Recruitment', 'Purpose and Reason for Trial', 'Trial Indentifying Number', 'Date Of Protocol', 'Study Product', 'Chemical', 'Chemical name', 'Biological', 'Biological name', 'Medical Device', 'Medical Device Name', 'Protocol Version No.', 'PRINCIPAL INVESTIGATOR: Full names', 'PRINCIPAL INVESTIGATOR: Date Of Birth', 'PRINCIPAL INVESTIGATOR: Qualification', 'PRINCIPAL INVESTIGATOR: Professional address', 'PRINCIPAL INVESTIGATOR: Telephone number', 'PRINCIPAL INVESTIGATOR: email address',
                'Name of Company', 'Registered Office', 'Physical address', 'Telephone number', 'Position of applicant', 'Source of Funds', 'Primary Sponsor: Sponsor', 'Primary Sponsor: Contact Person', 'Primary Sponsor: Address', 'Primary Sponsor: Telephone Number', 'Primary Sponsor: Fax Number', 'Primary Sponsor: Mobile phone number', 'Primary Sponsor: Email Address', 'Secondary Sponsor: Sponsor', 'Secondary Sponsor: Contact Person', 'Secondary Sponsor: Address', 'Secondary Sponsor: Telephone Number', 'Secondary Sponsor: Fax Number', 'Secondary Sponsor: Mobile phone number', 'Secondary Sponsor: Email Address',  'Participants', 'Expected Number of participants in Zimbabwe', 'Total enrolment in each site', 'Total participants worldwide', 'Justification', 'Less than 18 years?', 'In Utero', 'Preterm Newborn Infants', 'Newborn', 'Infant and toddler', 'Children', 'Adolescent', '18 Years and over', 'Adult', 'Elderly', 'Healty volunteers', 'Specific vulnerable populations', 'Patients', 'Women of child bearing potential', 'Women of child bearing potential using contraception', 'Pregnant women', 'Nursing Women', 'Emergency situation', 'Participants incapable of giving consent personally?', 'If yes, specify', 'Others?', 'If yes, specify', 'GENDER: Female', 'GENDER: Male', 'Participants: Name', 'Participants: Occupation', 'Participants: Address', 'Participants: Date of Birth', 'Participants: Place of Birth', 'Participants: Consent Letter', 'Single site in Zimbabwe', 'If yes, name of site', 'Physical address', 'Contact person', 'Telephone', 'Multiple sites in Zimbabwe ', 'Number of sites anticipated in Zimbabwe', 'Name of site', 'Site: Physical address', 'Site: Contact details', 'Site: Contact person', 'Site: Province', 'Site: Name of site', 'Site: Physical address', 'Site: Contact details', 'Site: Contact person', 'Site: Province', 'Multiple Countries', 'Number of countries anticipated in the trial', 'If yes above, list the countries', 'Medicine Name', 'Quantity of medicine required', 'Name of medicine', 'Quantity of medicine required',
                'State the chemical composition, graphic and empirical formulae, ', 'Adverse/ possible reactions to the medicine', 'Therapeutic effects of medicine', 'Has the medicine been registered in the country of origin?', 'State details/reason', 'Have clinical trials been conducted in the country of origin?', 'State details/reason', 'Has application for registration been made in any other country?', 'If Yes,State details/reason including the date', 'Has the medicine been registered in any other country?', 'If Yes, State details/reason', 'Has the registration of the medicine been rejected/deferred /cancelled in any country?', 'If Yes,State details/reason', 'Administration route, dosage, dosage interval', 'What is the status of medicine in Zimbabwe?', 'State Antidote', 'State the quantity of the medicine for which exemption is required', 'Will medicine be given concomitantly?', 'If YES, state the name of the other medicines', 'State whether the person already on another medicine will be given the experimential medicine', 'State measures to be implemented to ensure the safe handling of medicines', 'PRINCIPAL INCLUSION CRITERIA', 'PRINCIPAL EXCLUSION CRITERIA', 'PRIMARY END POINTS', 'Health Condition(s) or Problem(s) Studied', 'Diagnosis', 'Prophylaxis', 'Therapy', 'Safety', 'Efficacy', 'Pharmacokinetic', 'Pharmacodynamic', 'Bioequivalence', 'Dose Response', 'Pharmacogenetic', 'Pharmacogenomic', 'Pharmacoecomomic', 'Others', 'If others, specify', 'Human pharmacology (Phase I)', 'First administration to humans', 'Bioequivalence study', 'Other', 'If other, please specify', 'Therapeutic exploratory (Phase II)', 'Therapeutic confirmatory (Phase III)', 'Therapeutic use (Phase IV)', 'Type of trial', 'Randomised', 'Single Blind', 'Double Blind', 'Parallel group', 'Cross over', 'Other', 'If yes to other, specify', 'If controlled, specify the comparator', 'Other medicinal product(s)', 'Placebo', 'Other', 'If yes to other, specify', 'Ethical Considerations', 'Insurance Company Name', 'Insurance Company Address', 'State the amount of insurance in respect of each participant', 'If no insurance company, provide details', 'Ethical Reviews Status', 'Ethical Reviews Date of Approval', 'Ethics Committee Name', 'Postal Address', 'Telephone Number', 'Email Address', 'State the time period for the trial', 'If the trial is to be conducted in Zimbabwe', 'Name other Regulatory Authorities not approved', 'Name other Regulatory Authorities which have approved this trial', 'if applicable, name other Regulatory Authorities or Ethics Committees', 'Details of and reasons for this trial having been halted', 'Recording of effects', 'State the Clinical and laboratory tests', 'State the method of recording adverse reactions', 'State the procedure for keeping participants lists', 'State where will trial code will be kept and how it can it be broken', 'State measures to be implemented', 'Evaluation of results', 'State how the persons or owners of animals are to be informed', 'State how the staff involved are to be informed', 'Particulars of the animals',  'Covering Letter', 'Practicing License for principal investigator', 'Pharmacy License or Certificate', 'Protocol', 'Patient information leaflet', 'Investigators brochure', 'Investigators CV(s)', 'Signed declaration(s)', 'CV(s) and signed declaration(s) by study coordinator', 'Monitoring plan by sponsor', 'Signed Declaration by sponsor GCP', 'Signed Declaration by sponsor study sponsorship', 'Pharmacy plan for local trial site', 'MCAZ Pharmacy license', 'Details of study medicines', 'Proof of participants insurance certificate', 'Letter endorsing generic insurance certificate', 'Ethics approval in country of origin', 'Copy of letter applying for ethics', 'Proof of approval of study by the National Regulatory Authority', 'Copy/ies of recruitment advertisement(s)', 'Proof of Provision of Data Safety Monitoring Board', 'Proof of application to the local Bio Safety Board', 'Pharmaceutical dossier for a new investigational drug (NID)', 'MC10 Forms', 'Financials: receipt', 'Financials: receipt description', 'Application Stage: name', 'Application Stage: date', 'Application Stage: created',
                // not visible on form
                'Assigned by', 'Assigned to', 'Assigned category', 'Assigned message',
                'Report type', 'Creating user', 'approval_date', 'date_submitted', 'approved', 'status', 'approved_date', 'final_report', 'created', 'modified'
            ];

            $_extract = [
                'protocol_no', 'public_title', 'scientific_title', 'public_contact_name', 'public_contact_designation', 'public_contact_email', 'public_contact_phone', 'public_contact_postal', 'public_contact_affiliation', 'scientific_contact_name', 'scientific_contact_designation', 'scientific_contact_email', 'scientific_contact_phone', 'scientific_contact_postal', 'scientific_contact_affiliation', 'countries_recruitment', 'abstract_of_study', 'version_no', 'date_of_protocol', 'study_drug', 'product_type_chemical', 'product_type_chemical_name', 'product_type_biologicals', 'product_type_biologicals_name', 'product_type_medical_device', 'product_type_medical_device_name', 'protocol_version',
                function ($row) {
                    return implode('|', Hash::extract($row['investigator_contacts'], '{n}.given_name'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['investigator_contacts'], '{n}.date_of_birth'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['investigator_contacts'], '{n}.qualification'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['investigator_contacts'], '{n}.professional_address'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['investigator_contacts'], '{n}.telephone'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['investigator_contacts'], '{n}.email'));
                },
                'business_name', 'business_office', 'business_physical_address', 'business_telephone', 'business_position', 'money_source', 'sponsor_name', 'sponsor_contact_person', 'sponsor_address', 'sponsor_telephone_number', 'sponsor_fax_number', 'sponsor_cell_number', 'sponsor_email_address',
                function ($row) {
                    return implode('|', Hash::extract($row['sponsors'], '{n}.sponsor'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['sponsors'], '{n}.contact_person'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['sponsors'], '{n}.address'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['sponsors'], '{n}.telephone_number'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['sponsors'], '{n}.fax_number'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['sponsors'], '{n}.cell_number'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['sponsors'], '{n}.email_address'));
                },
                'participants_description', 'number_participants', 'total_enrolment_per_site', 'total_participants_worldwide', 'participants_justification', 'population_less_than_18_years', 'population_utero', 'population_preterm_newborn', 'population_newborn', 'population_infant_and_toddler', 'population_children', 'population_adolescent', 'population_above_18', 'population_adult', 'population_elderly', 'subjects_healthy', 'subjects_vulnerable_populations', 'subjects_patients', 'subjects_women_child_bearing', 'subjects_women_using_contraception', 'subjects_pregnant_women', 'subjects_nursing_women', 'subjects_emergency_situation', 'subjects_incapable_consent', 'subjects_specify', 'subjects_others', 'subjects_others_specify', 'gender_female', 'gender_male',
                function ($row) {
                    return implode('|', Hash::extract($row['participants'], '{n}.name'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['participants'], '{n}.occupation'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['participants'], '{n}.address'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['participants'], '{n}.date_of_birth'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['participants'], '{n}.place_of_birth'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['participants'], '{n}.file'));
                },
                'single_site_member_state', 'location_of_area', 'single_site_physical_address', 'single_site_contact_person', 'single_site_telephone', 'multiple_sites_member_state', 'number_of_sites', 'single_site_name', 'single_site_physical_address', 'single_site_contact_details', 'single_site_contact_person',
                function ($row) use ($_provinces) {
                    return (!empty($_provinces[$row['single_site_province_id']])) ? $_provinces[$row['single_site_province_id']] : '';
                }, //'single_site_province_id', 
                function ($row) {
                    return implode('|', Hash::extract($row['site_details'], '{n}.site_name'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['site_details'], '{n}.physical_address'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['site_details'], '{n}.contact_details'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['site_details'], '{n}.contact_person'));
                },
                function ($row) use ($_provinces) {
                    return implode('|', Hash::map(
                        $row['site_details'],
                        '{n}.province_id',
                        function ($val) use ($_provinces) {
                            return $_provinces[$val];
                        }
                    ));
                },
                'multiple_countries', 'multiple_member_states', 'multi_country_list', 'drug_name', 'quantity_excemption',
                function ($row) {
                    return implode('|', Hash::extract($row['medicines'], '{n}.medicine_name'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['medicines'], '{n}.quantity_required'));
                },
                'drug_details', 'medicine_reaction', 'medicine_therapeutic_effects', 'medicine_registered', 'medicine_registered_details', 'trials_origin_country', 'trial_origin_details', 'application_other_country', 'application_other_country_details', 'registered_other_country', 'registered_other_country_details', 'rejected_other_country', 'rejected_other_country_details', 'administration_route', 'status_medicine', 'state_antidote', 'exemption_required', 'given_concomitantly', 'concomitant_medicine', 'concurrent_medicine', 'safety', 'principal_inclusion_criteria', 'principal_exclusion_criteria', 'primary_end_points', 'disease_condition', 'scope_diagnosis', 'scope_prophylaxis', 'scope_therapy', 'scope_safety', 'scope_efficacy', 'scope_pharmacokinetic', 'scope_pharmacodynamic', 'scope_bioequivalence', 'scope_dose_response', 'scope_pharmacogenetic', 'scope_pharmacogenomic', 'scope_pharmacoecomomic', 'scope_others', 'scope_others_specify', 'trial_human_pharmacology', 'trial_administration_humans', 'trial_bioequivalence_study', 'trial_other', 'trial_other_specify', 'trial_therapeutic_exploratory', 'trial_therapeutic_confirmatory', 'trial_therapeutic_use', 'design_controlled', 'design_controlled_randomised', 'design_controlled_single_blind', 'design_controlled_double_blind', 'design_controlled_parallel_group', 'design_controlled_cross_over', 'design_controlled_other', 'design_controlled_specify', 'design_controlled_comparator', 'design_controlled_other_medicinal', 'design_controlled_placebo', 'design_controlled_medicinal_other', 'design_controlled_medicinal_specify', 'ethic_considerations', 'insurance_company', 'insurance_address', 'insurance_amount', 'other_insurance', 'ethical_review_status', 'date_of_approval_ethics',
                function ($row) {
                    return implode('|', Hash::extract($row['committees'], '{n}.name'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['committees'], '{n}.address'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['committees'], '{n}.telephone_number'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['committees'], '{n}.email_address'));
                },
                'estimated_duration', 'other_details_explanation', 'other_details_regulatory_notapproved', 'other_details_regulatory_approved', 'other_details_regulatory_rejected', 'other_details_regulatory_halted', 'recording_effects', 'tests_done', 'recording_method', 'record_keeping', 'trial_storage', 'measures_compliance', 'evalution_of_results', 'inform_persons', 'inform_staff', 'animal_particulars', 'applicant_covering_letter', 'applicant_fees', 'applicant_mc10', 'applicant_protocol', 'applicant_patient_information', 'applicant_investigators_brochure', 'applicant_investigators_cv', 'applicant_signed_declaration', 'applicant_study_monitors', 'applicant_monitoring_plans', 'applicant_pi_declaration', 'applicant_study_sponsorship', 'applicant_pharmacy_plan', 'applicant_pharmacy_license', 'applicant_study_medicines', 'applicant_insurance_certificate', 'applicant_generic_insurance', 'applicant_ethics_approval', 'applicant_ethics_letter', 'applicant_country_approvals', 'applicant_advertisments', 'applicant_safety_monitoring', 'applicant_biological_products', 'applicant_dossier',
                function ($row) {
                    return implode('|', Hash::extract($row['mc10_forms'], '{n}.file'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['receipts'], '{n}.file'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['receipts'], '{n}.description'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['application_stages'], '{n}.stage.name'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['application_stages'], '{n}.stage_date'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['application_stages'], '{n}.created'));
                },
                //not visible on form
                function ($row) use ($_users) {
                    return implode('|', Hash::map(
                        $row['assign_evaluators'],
                        '{n}.user_id',
                        function ($val) use ($_users) {
                            return $_users[$val];
                        }
                    ));
                },
                function ($row) use ($_users) {
                    return implode('|', Hash::map(
                        $row['assign_evaluators'],
                        '{n}.assigned_to',
                        function ($val) use ($_users) {
                            return $_users[$val];
                        }
                    ));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['assign_evaluators'], '{n}.category'));
                },
                function ($row) {
                    return implode('|', Hash::extract($row['assign_evaluators'], '{n}.user_message'));
                },
                'report_type',
                function ($row) use ($_users) {
                    return (!empty($_users[$row['user_id']])) ? $_users[$row['user_id']] : '';
                }, //'user_id', 
                'approval_date', 'date_submitted', 'approved', 'status', 'approved_date', 'final_report', 'created', 'modified'
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }

        //$this->set(compact('applications'));
        //$this->set('_serialize', ['applications']);

        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $this->set(compact('all_evaluators'));
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
    public function view($id = null)
    {
        //TODO: Restrict evaluators only assigned
        // $this->viewBuilder()->setLayout('vanilla');
        // => function ($q) { return $q->where(['Amendments.submitted' => 2]);        }
        $contains = $this->_contain;
        //unset($contains[array_search('Amendments', $contains)]);
        $contains['Amendments'] =  function ($q) {
            return $q->where(['Amendments.submitted' => 2]);
        };
        $contains['Evaluations'] = function ($q) {
            return $q->where(['OR' =>
            ['Evaluations.evaluation_type' => 'Initial', 'Evaluations.id' => $this->request->query('ev_id'), 'Evaluations.id' => $this->request->query('cp_fn')]]);
        };

        $application = $this->Applications->get($id, [
            'contain' => $contains,
            'conditions' => ['report_type' => 'Initial']
        ]);

        // dd($application->pdrugs[0]->storage_conditions);

        // //Evaluators and External evaluators only to view if assigned
        // if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {
        //     if(!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
        //         $this->Flash->error(__('You have not been assigned this application.'));
        //         return $this->redirect(['action' => 'index']);
        //     }

        // }
        // // Secretary General only able to view once it has been approved
        // if ($this->Auth->user('group_id') == 7) {
        //     if(!in_array(9, Hash::extract($application->application_stages, '{n}.stage_id'))) {                
        //         $this->Flash->error(__('You have not been assigned this application.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        // }

        $ekey = 100;
        $evaluation_id = $this->request->getData('evaluation_id');
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($application->evaluations as $key => $value) {
                if ($value['id'] == $this->request->getData('evaluation_id')) {
                    $ekey = $key;
                }
            }
        }

        if ($this->request->query('ev_id')) {
            foreach ($application->evaluations as $key => $value) {
                $ev_id = $this->request->query('ev_id');
                if ($value['id'] == $ev_id) {
                    $ekey = $key;
                    $evaluation_id = $this->request->query('ev_id');
                }
            }
        }

        if ($this->request->query('cp_fn')) {
            foreach ($application->evaluations as $key => $value) {
                $cp_fn = $this->request->query('cp_fn');
                if ($value['id'] == $cp_fn) {
                    $ekey = $key;
                    $evaluation_id = $this->request->query('cp_fn');
                }
            }
        }

        $this->filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
        array_push($this->filt, 1);

        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['OR' => [['group_id IN' => [2, 3, 6]], ['id IN' => $this->filt]]]);
        $internal_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where([
            'group_id' => 3,
            'id NOT IN' => $this->filt
        ]);
        $external_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where([
            'group_id' => 6,
            'id NOT IN' => $this->filt
        ]);
        $feedback_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 3, 'id IN' => $this->filt]);
        $this->loadModel('CommitteeDates');
        $committee_dates = $this->CommitteeDates->find('list', ['keyField' => 'meeting_number', 'valueField' => 'meeting_number']);

        $this->set(compact('application', 'internal_evaluators', 'external_evaluators', 'all_evaluators', 'feedback_evaluators', 'provinces', 'ekey', 'evaluation_id', 'committee_dates'));
        $this->set('_serialize', ['application']);

        if ($this->request->params['_ext'] === 'pdf') {
            $this->render('/Base/Applications/pdf/view');
        } else {
            $this->render('/Base/Applications/view');
        }
    }

    public function commonHeader($id = null)
    {
        //
        // debug($this->Applications->get($id, [
        //     'contain' => ['EvaluationHeaders'],
        //     'fields' => ['id', 'protocol_no', 'EvaluationHeaders.id', 'EvaluationHeaders.population']
        // ]));
        // return;

        $application = $this->Applications->get($this->request->getData('id'), [
            'contain' => ['EvaluationHeaders'],
            'fields' => ['id', 'protocol_no', 'EvaluationHeaders.id', 'EvaluationHeaders.population', 'EvaluationHeaders.study_design']
        ]);
        if ($this->request->is('post')) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application->evaluation_header->user_id = $this->Auth->user('id');
            if ($this->Applications->save($application)) {
                $this->response->body('Success');
                $this->response->statusCode(200);
                $this->set([
                    'error' => '',
                    'message' => $this->request->getData(),
                    'application' => $application,
                    '_serialize' => ['error', 'message', 'application']
                ]);
                return;
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(401);
                $this->set([
                    'message' => 'Unable to save user!!',
                    '_serialize' => ['message']
                ]);
                return;
            }
        } else {
            $this->response->body('Failure');
            $this->response->statusCode(404);
            $this->set([
                'error' => 'Only post method allowed',
                'message' => 'Only post method allowed',
                '_serialize' => ['error', 'message']
            ]);
            return;
        }
    }

    public function evaluatorComment($id = null)
    {
        $comment = $this->Applications->Comments->get($this->request->getData('id'));
        if ($this->request->is('post')) {
            $comment = $this->Applications->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Applications->Comments->save($comment)) {
                $this->response->body('Success');
                $this->response->statusCode(200);
                $this->set([
                    'error' => '',
                    'message' => $this->request->getData(),
                    'comment' => $comment,
                    '_serialize' => ['error', 'message', 'comment']
                ]);
                return;
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(401);
                $this->set([
                    'message' => 'Unable to save comment!!',
                    '_serialize' => ['message']
                ]);
                return;
            }
        } else {
            $this->response->body('Failure');
            $this->response->statusCode(404);
            $this->set([
                'error' => 'Only post method allowed',
                'message' => 'Only post method allowed',
                '_serialize' => ['error', 'message']
            ]);
            return;
        }
    }

    public function evaluationComment($id = null)
    {

        $cReview = $this->Applications->Evaluations->get($this->request->getData('id'));
        if ($this->request->is('post')) {
            $cReview = $this->Applications->Evaluations->patchEntity($cReview, $this->request->getData());
            if ($this->Applications->Evaluations->save($cReview)) {
                $this->response->body('Success');
                $this->response->statusCode(200);
                $this->set([
                    'success' => 'saved successful',
                    'message' => $this->request->getData(),
                    'cReview' => $cReview,
                    '_serialize' => ['success', 'message', 'cReview']
                ]);
                return;
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(401);
                $this->set([
                    'message' => 'Unable to save comment!!',
                    '_serialize' => ['message']
                ]);
                return;
            }
        } else {
            $this->response->body('Failure');
            $this->response->statusCode(404);
            $this->set([
                'error' => 'Only post method allowed',
                'message' => 'Only post method allowed',
                '_serialize' => ['error', 'message']
            ]);
            return;
        }
    }

    public function removeQualityAssessment($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $clinical = $this->Applications->QualityAssessments->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $clinical->user_id)
            && $this->Applications->QualityAssessments->delete($clinical)
        ) {
            $this->Flash->success(__('The statistical quality has been removed.'));
        } else {
            $this->Flash->error(__('The quality could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }
    public function removeStatisticalAssessment($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $clinical = $this->Applications->Statisticals->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $clinical->user_id)
            && $this->Applications->Statisticals->delete($clinical)
        ) {
            $this->Flash->success(__('The statistical assessment has been removed.'));
        } else {
            $this->Flash->error(__('The assessment could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    // NonClinical

    public function addNonClinicalReview()

    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());

            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }

            if ($this->Applications->save($application)) {
                if ($this->request->getData('ev_save') !== '1') {
                    //Send email, notification and message to managers and assigned evaluators
                    $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                    array_push($filt, 1);


                    $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                        $orConditions = $exp->or_(['id IN' => $filt])
                            ->eq('group_id', 2);
                        return $exp
                            ->add($orConditions)
                            ->add(['group_id !=' => 6]);
                    });
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
                        $data['vars']['user_message'] = "New nonclinical Assessment has been created";
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_create_review_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }

                    $this->Flash->success('Successful submitted nonclinical review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                } else {
                    $this->Flash->success('Saved changes for nonclinical review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                }
            }
            // debug($application->errors());
            $this->Flash->error(__('Unable to create nonclinical review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function addQualityReview()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());

            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }

            if ($this->Applications->save($application)) {
                if ($this->request->getData('ev_save') !== '1') {
                    //Send email, notification and message to managers and assigned evaluators
                    $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                    array_push($filt, 1);


                    $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                        $orConditions = $exp->or_(['id IN' => $filt])
                            ->eq('group_id', 2);
                        return $exp
                            ->add($orConditions)
                            ->add(['group_id !=' => 6]);
                    });
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
                        $data['vars']['user_message'] = "New quality Assessment has been created";
                        //notify applicant
                        // $this->QueuedJobs->createJob('GenericEmail', $data);
                        // $data['type'] = 'manager_create_review_notification';
                        // $this->QueuedJobs->createJob('GenericNotification', $data);
                    }

                    $this->Flash->success('Successful submitted quality review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                } else {
                    $this->Flash->success('Saved changes for quality review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                }
            }
            debug($application->errors());
            exit;
            $this->Flash->error(__('Unable to create quality review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function addStatisticalReview()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());

            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }

            if ($this->Applications->save($application)) {
                if ($this->request->getData('ev_save') !== '1') {
                    //Send email, notification and message to managers and assigned evaluators
                    $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                    array_push($filt, 1);


                    $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                        $orConditions = $exp->or_(['id IN' => $filt])
                            ->eq('group_id', 2);
                        return $exp
                            ->add($orConditions)
                            ->add(['group_id !=' => 6]);
                    });
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
                        $data['vars']['user_message'] = "New statistical Assessment has been created";
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_create_review_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }

                    $this->Flash->success('Successful submitted statistical review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                } else {
                    $this->Flash->success('Saved changes for statistical review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                }
            }
            // debug($application->errors());
            $this->Flash->error(__('Unable to create statistical review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }
    public function addSdrug()
    {
        $application = $this->Applications->QualityAssessments->get($this->request->getData('quality_assessment_pr_id'));
        // 
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->QualityAssessments->patchEntity($application, $this->request->getData());
            dd($application);
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {


                if ($this->Applications->save($application)) {

                    $this->Flash->success('Successful submitted quality assessment of Application');
                    return $this->redirect(['action' => 'quality', $application->id]);
                }
            }
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }
    public function quality($id = null)
    {
        $qualityAssessment = $this->Applications->QualityAssessments->get($id, [
            'contain' => ['Users', 'Sdrug']
        ]);
        $ekey = 100;
        $this->set('qualityAssessment', $qualityAssessment);
        $this->set('_serialize', ['qualityAssessment', 'ekey']);
        $this->render('/Base/Applications/view_quality');
    }

    public function removeNonclinicalAssessment($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $clinical = $this->Applications->NonClinicals->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $clinical->user_id)
            && $this->Applications->NonClinicals->delete($clinical)
        ) {
            $this->Flash->success(__('The clinical assessment has been removed.'));
        } else {
            $this->Flash->error(__('The assessment could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    // clinical Review Section

    public function addClinicalReview()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());

            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }

            if ($this->Applications->save($application)) {
                if ($this->request->getData('ev_save') !== '1') {
                    //Send email, notification and message to managers and assigned evaluators
                    $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                    array_push($filt, 1);


                    $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                        $orConditions = $exp->or_(['id IN' => $filt])
                            ->eq('group_id', 2);
                        return $exp
                            ->add($orConditions)
                            ->add(['group_id !=' => 6]);
                    });
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
                        $data['vars']['user_message'] = "New Clinical Assessment has been created";
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_create_review_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }

                    $this->Flash->success('Successful submitted clinical review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                } else {
                    $this->Flash->success('Saved changes for clinical review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                }
            }
            // debug($application->errors());
            $this->Flash->error(__('Unable to create clinical review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function removeClinicalAssessment($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $clinical = $this->Applications->Clinicals->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $clinical->user_id)
            && $this->Applications->Clinicals->delete($clinical)
        ) {
            $this->Flash->success(__('The clincal assessment has been removed.'));
        } else {
            $this->Flash->error(__('The assessment could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    public function addReview()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());

            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }

            //new stage only once
            if (!in_array("4", Hash::extract($application->application_stages, '{n}.stage_id'))) {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 4;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $application->application_stages = [$stage1];
                $application->status = 'Evaluated';
            }

            if ($this->Applications->save($application)) {
                if ($this->request->getData('ev_save') !== '1') {
                    //Send email, notification and message to managers and assigned evaluators
                    $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                    array_push($filt, 1);

                    // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                    $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                        $orConditions = $exp->or_(['id IN' => $filt])
                            ->eq('group_id', 2);
                        return $exp
                            ->add($orConditions)
                            ->add(['group_id !=' => 6]);
                    });
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
                        $data['vars']['user_message'] = $this->request->getData('evaluations.' . $this->request->getData('evaluation_pr_id') . '.recommendations');
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_create_review_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }

                    $this->Flash->success('Successful submitted review of Application ' . $application->protocol_no . '.');
                    return $this->redirect(['action' => 'view', $application->id]);
                } else {
                    $this->Flash->success('Saved changes for review of Application ' . $application->protocol_no . '.');
                    // debug($application);
                    return $this->redirect([
                        'action' => 'view', $application->id,
                        '?' => [
                            'ev_id' => $application->evaluations[0]->id,
                        ]
                    ]);
                }
            }
            // debug($application->errors());
            $this->Flash->error(__('Unable to create review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function removeReview($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->Evaluations->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $review->user_id)
            && $this->Applications->Evaluations->delete($review)
        ) {
            $this->Flash->success(__('The review has been removed.'));
        } else {
            $this->Flash->error(__('The review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }


    public function  attachQualitySignature($id = null)
    {
        $quality = $this->Applications->QualityAssessments->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quality = $this->Applications->QualityAssessments->patchEntity($quality, ['chosen' => $this->Auth->user('id')]);
            if ($this->Applications->QualityAssessments->save($quality)) {
                $this->Flash->success('Signature successfully attached to the review');
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to attach signature. Please, try again.'));
                return $this->redirect($this->referer());
            }
        }
    }

    // CLINICAL SIGNATURE
    
    public function  attachClinicalSignature($id = null)
    {
        $clinical = $this->Applications->Clinicals->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clinical = $this->Applications->Clinicals->patchEntity($clinical, ['chosen' => $this->Auth->user('id')]);
            if ($this->Applications->Clinicals->save($clinical)) {
                $this->Flash->success('Signature successfully attached to the review');
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to attach signature. Please, try again.'));
                return $this->redirect($this->referer());
            }
        }
    }
    public function  attachNonClinicalSignature($id = null)
    {
        $nonclinical = $this->Applications->NonClinicals->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nonclinical = $this->Applications->NonClinicals->patchEntity($nonclinical, ['chosen' => $this->Auth->user('id')]);
            if ($this->Applications->NonClinicals->save($nonclinical)) {
                $this->Flash->success('Signature successfully attached to the review');
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to attach signature. Please, try again.'));
                return $this->redirect($this->referer());
            }
        }
    }
    public function  attachStatisticalSignature($id = null)
    {
        $statistical = $this->Applications->Statisticals->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $statistical = $this->Applications->Statisticals->patchEntity($statistical, ['chosen' => $this->Auth->user('id')]);
            if ($this->Applications->Statisticals->save($statistical)) {
                $this->Flash->success('Signature successfully attached to the review');
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to attach signature. Please, try again.'));
                return $this->redirect($this->referer());
            }
        }
    } 

    public function attachSignature($id = null)
    {
        $evaluation = $this->Applications->Evaluations->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evaluation = $this->Applications->Evaluations->patchEntity($evaluation, ['chosen' => $this->Auth->user('id')]);
            if ($this->Applications->Evaluations->save($evaluation)) {
                $this->Flash->success('Signature successfully attached to evaluation');
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to attach signature. Please, try again.'));
                return $this->redirect($this->referer());
            }
        }
    }

    public function addCommitteeReview($id)
    {
        $application = $this->Applications->get((isset($id)) ? $id : $this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity(
                $application,
                $this->request->getData(),
                [
                    'validate' => true,
                    'associated' => [
                        'CommitteeReviews' => ['validate' => true],
                        'CommitteeReviews.Attachments',
                    ]
                ]
            );

            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }
            /**
             * Committee decision 
             * If decision is Approved, the status is set to DirectorGeneral or Stage 9
             * Else Application status is set to Committee. Committee process always visible to PI (except internal comments)
             * 
             */

            // if(in_array("5", Hash::extract($application->application_stages, '{n}.stage_id'))) {      
            $stage  = $this->Applications->ApplicationStages->newEntity();
            $stage->stage_id = 5;
            $stage->stage_date = date("Y-m-d H:i:s");
            $application->application_stages = [$stage];
            // }

            if ($this->request->getData('committee_reviews.100.decision') === 'Approved') {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 9;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->committee_reviews[0]->outcome_date;
                $application->application_stages[] = $stage1;
                $application->status = 'DirectorGeneral';
            } elseif ($this->request->getData('committee_reviews.100.decision') === 'Declined') {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 13;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->committee_reviews[0]->outcome_date;
                $application->approved = $this->request->getData('committee_reviews.100.decision');
                $application->approved_date = date('Y-m-d', strtotime(str_replace('-', '/', $this->request->getData('committee_reviews.100.outcome_date'))));
                $application->application_stages[] = $stage1;
                $application->status = 'CommitteeDeclined';
            } else {
                //If Coming from Stage 7 then stage 5
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->committee_reviews[0]->outcome_date;
                if (in_array("6", Hash::extract($application->application_stages, '{n}.stage_id'))) {
                    $stage1->stage_id = 8;
                    $application->status = 'Presented';
                    $application->application_stages[] = $stage1;
                } else {
                    // $stage1->stage_id = 5;
                    $application->status = 'Committee';
                    // $application->application_stages = [$stage1];
                }
            }

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                    $orConditions = $exp->or_(['id IN' => $filt])
                        ->eq('group_id', 2);
                    return $exp
                        ->add($orConditions)
                        ->add(['group_id !=' => 6]);
                });

                $this->loadModel('Queue.QueuedJobs');

                //If Approved, notify director general
                if ($this->request->getData('committee_reviews.100.decision') === 'Approved') {
                    $secgs = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 7]);
                    foreach ($secgs as $secg) {
                        $data = [
                            'email_address' => $secg->email, 'user_id' => $secg->id,
                            'type' => 'director_general_committee_review_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['name'] = $secg->name;
                        $data['vars']['decision'] = $this->request->getData('committee_reviews.100.decision');
                        $data['vars']['outcome_date'] = $this->request->getData('committee_reviews.100.outcome_date');
                        $data['vars']['user_message'] = $this->request->getData('committee_reviews.100.applicant_review_comment');
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'director_general_committee_review_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }
                }

                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_create_committee_review_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');
                    $data['vars']['decision'] = $this->request->getData('committee_reviews.100.decision');
                    $data['vars']['outcome_date'] = $this->request->getData('committee_reviews.100.outcome_date');
                    $data['vars']['internal_message'] = $this->request->getData('committee_reviews.100.internal_review_comment');
                    $data['vars']['user_message'] = $this->request->getData('committee_reviews.100.applicant_review_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_create_committee_review_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //Notify Applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $data = [
                    'email_address' => $application->email_address, 'user_id' => $application->user_id,
                    'type' => 'applicant_committee_review_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;
                $data['vars']['decision'] = $this->request->getData('committee_reviews.100.decision');
                $data['vars']['outcome_date'] = $this->request->getData('committee_reviews.100.outcome_date');
                $data['vars']['user_message'] = $this->request->getData('committee_reviews.100.applicant_review_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_committee_review_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Successful committee review of Application ' . $application->protocol_no . '.');

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Unable to create committee review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function removeCommitteeReview($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->CommitteeReviews->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $review->user_id)
            && $this->Applications->CommitteeReviews->delete($review)
        ) {
            $this->Flash->success(__('The committee review has been removed.'));
        } else {
            $this->Flash->error(__('The committee review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    public function addSection75Review()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());


            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // (!empty($application->assign_evaluators)) ? 
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                    $orConditions = $exp->or_(['id IN' => $filt])
                        ->eq('group_id', 2);
                    return $exp
                        ->add($orConditions)
                        ->add(['group_id !=' => 6]);
                });

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

                $this->Flash->success('Successful section 75 review of Application ' . $application->protocol_no . '.');

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Unable to create review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function removeSection75Review($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->SeventyFives->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $review->user_id)
            && $this->Applications->SeventyFives->delete($review)
        ) {
            $this->Flash->success(__('The section 75 review has been removed.'));
        } else {
            $this->Flash->error(__('The section 75 review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }


    public function requestInfo()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            //$application->status = 'RequestReporter';

            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol to send a request!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // (!empty($application->assign_evaluators)) ? 
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 

                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                    $orConditions = $exp->or_(['id IN' => $filt])
                        ->eq('group_id', 2);
                    return $exp
                        ->add($orConditions)
                        ->add(['group_id !=' => 6]);
                });

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
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['respond'] = $html->link('RESPOND', [
                    'controller' => 'Applications', 'action' => 'view', $application->id, //$user->activation_key, 
                    '_full' => true, 'prefix' => 'applicant'
                ]);
                $data['vars']['name'] = $manager->name;
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['evaluator_name'] = $this->Auth->user('name');
                $data['vars']['internal_message'] = $this->request->getData('request_infos.100.mcaz_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_get_request_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Request sent to ' . $application->email_address . ' for ' . $application->protocol_no . '.');

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Unable to create review. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function removeRequest($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->RequestInfos->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $review->user_id)
            && $this->Applications->RequestInfos->delete($review)
        ) {
            $this->Flash->success(__('The request has been removed.'));
        } else {
            $this->Flash->error(__('The request could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }


    public function addGcpInspection()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());


            // Check if Evaluator has been assigned | if not block from leaving a review
            if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {

                if (!in_array($this->Auth->user('id'), Hash::extract($application->assign_evaluators, '{n}.assigned_to'))) {
                    $this->Flash->error(__('You have not been assigned the protocol for review!. Kindly contact MCAZ.'));
                    return $this->redirect($this->referer());
                }
            }



            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // (!empty($application->assign_evaluators)) ? 
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                    $orConditions = $exp->or_(['id IN' => $filt])
                        ->eq('group_id', 2);
                    return $exp
                        ->add($orConditions)
                        ->add(['group_id !=' => 6]);
                });
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

                $this->Flash->success('Successful GCP Inspection review of Application ' . $application->protocol_no . '.');

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

    public function removeGcpInspection($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->GcpInspections->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $review->user_id)
            && $this->Applications->GcpInspections->delete($review)
        ) {
            $this->Flash->success(__('The GCP inspection review has been removed.'));
        } else {
            $this->Flash->error(__('The GCP inspection review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }


    public function raiseAppeal()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity(
                $application,
                $this->request->getData(),
                [
                    'validate' => true,
                    'associated' => [
                        'Appeals' => ['validate' => true],
                        'Appeals.Attachments'
                    ]
                ]
            );

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // (!empty($application->assign_evaluators)) ? 
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]) : 
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                    $orConditions = $exp->or_(['id IN' => $filt])
                        ->eq('group_id', 2);
                    return $exp
                        ->add($orConditions)
                        ->add(['group_id !=' => 6]);
                });
                $this->loadModel('Queue.QueuedJobs');
                foreach ($managers as $manager) {
                    //Notify managers    
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_appeal_respond_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['applicant_name'] = $this->Auth->user('name');
                    $data['vars']['applicant_message'] = $this->request->getData('appeals.100.comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_appeal_respond_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Notify applicant 
                // $applicant = $this->Applications->Users->get($application);
                $data = [
                    'email_address' => $application->email_address, 'user_id' => $application->user_id,
                    'type' => 'applicant_appeal_respond_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $this->Auth->user('name');
                $data['vars']['applicant_message'] = $this->request->getData('appeals.100.comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_appeal_respond_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success('Response to appeal for ' . $application->protocol_no . ' sent to applicant');

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Unable to create response to appeal. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    /*   Add the final Review for the protocol
     *   Adious
    */
    public function addFinalStage($id)
    {
        $application = $this->Applications->get((isset($id)) ? $id : $this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity(
                $application,
                $this->request->getData(),
                [
                    'validate' => true,
                    'associated' => [
                        'FinalStages' => ['validate' => true],
                        'FinalStages.Attachments'
                    ]
                ]
            );


            /**
             * Final Stage  
             * Ensure Forms are attached before submit
             * 
             */
            if (!in_array("12", Hash::extract($application->application_stages, '{n}.stage_id'))) {
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
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                    $orConditions = $exp->or_(['id IN' => $filt])
                        ->eq('group_id', 2);
                    return $exp
                        ->add($orConditions)
                        ->add(['group_id !=' => 6]);
                });

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
                    $data['vars']['internal_message'] = $this->request->getData('final_stages.100.internal_review_comment');
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

                $this->Flash->success('Successful final stage review of Application ' . $application->protocol_no . '.');

                return $this->redirect($this->referer());
            }
            $this->Flash->error(
                'Unable to create final stage review. Please, try again. <br>' . implode('<br>', Hash::flatten($application->errors())),
                ['escape' => false]
            );
            // debug($application->errors());
            // return;
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
        return $this->redirect($this->referer());
    }

    public function removeFinalStage($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->FinalStages->get($id);
        if (($this->Auth->user('group_id') == 2 or $this->Auth->user('id') == $review->user_id)
            && $this->Applications->FinalStages->delete($review)
        ) {
            $this->Flash->success(__('The final stage review has been removed.'));
        } else {
            $this->Flash->error(__('The final stage review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    public function removeDgReview($id = null)
    {

        $this->Flash->warning(__('Kindly log in as DG to remove this decision.'));


        return $this->redirect($this->redirect($this->referer()));
    }

    public function finance($id = null, $scope = null)
    {
        if ($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_finance_' . $id . '.pdf' : 'application_finance_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/FinanceApprovals/pdf/view');
        }
    }
    public function section75($id = null, $scope = null)
    {
        if ($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_section75_' . $id . '.pdf' : 'application_section75_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/SeventyFives/pdf/view');
        }
    }
    public function evaluator($id = null, $scope = null)
    {
        if ($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_evaluator_' . $id . '.pdf' : 'application_evaluator_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/AssignEvaluators/pdf/view');
        }
    }
    public function review($id = null, $scope = null)
    {
        if ($scope === 'All') {
            $evaluations = $this->Applications->Evaluations->findByApplicationId($id)->contain(['Users', 'EvaluationEdits'])->where(['Evaluations.evaluation_type' => 'Initial']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $review = $this->Applications->Evaluations
                ->get($id, [
                    'contain' => ['Applications' => $this->_contain, 'Users', 'EvaluationEdits'],
                    'conditions' => ['Evaluations.evaluation_type' => 'Initial']
                ]);
            $application = $review->application;
            $evaluations[] = $review;
        }
        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $this->set(compact('evaluations', 'application', 'all_evaluators'));
        $this->set('_serialize', ['evaluations', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_review_' . $id . '.pdf' : 'application_review_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/Evaluations/pdf/view');
        }
    }

    // Download Statisctical Reviews
    public function statisticalReview($id = null, $scope = null)
    {
        $statistic = $this->Applications->Statisticals->get($id, [
            'contain' => ['Applications' => $this->_contain, 'Users'],

        ]);
        $application = $statistic->application;
        $statisticals[] = $statistic;

        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $this->set(compact('statisticals', 'application', 'all_evaluators'));
        $this->set('_serialize', ['statisticals', 'application']);

        // debug($evaluations);
        // exit;


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_review_' . $id . '.pdf' : 'statistical_review_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/Statisticals/pdf/view');
        }
    }
   // Download Quality Reviews
   public function qualityReview($id = null, $scope = null)
   {
       $data = $this->Applications->QualityAssessments->get($id, [
           'contain' => [
            'Applications' => $this->_contain, 
            'Users','SDrugs','Compliance','PDrugs',
            'Sdrugs.SdrugsConditions','Pdrugs.StorageConditions'
        ],
       ]);
       $application = $data->application;
       $quality[] = $data;

       $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
       $this->set(compact('quality', 'application', 'all_evaluators'));
       $this->set('_serialize', ['quality', 'application']);

       debug($data);
       exit;


       if ($this->request->params['_ext'] === 'pdf') {
           $this->viewBuilder()->options([
               'pdfConfig' => [
                   'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_review_' . $id . '.pdf' : 'quality_review_' . $id . '.pdf'
               ]
           ]);
           $this->render('/Base/Quality/pdf/view');
       }
   }
    public function clinicalReview($id = null, $scope = null)
    {
        $clinical = $this->Applications->Clinicals->get($id, [
            'contain' => ['Applications' => $this->_contain, 'Users'],

        ]);
        $application = $clinical->application;
        $clinicals[] = $clinical;

        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $this->set(compact('clinicals', 'application', 'all_evaluators'));
        $this->set('_serialize', ['clinicals', 'application']);

        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_review_' . $id . '.pdf' : 'clinicals_review_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/clinicals/pdf/view');
        }
    }
    public function nonClinicalReview($id = null, $scope = null)
    {
        $non_clinical = $this->Applications->NonClinicals->get($id, [
            'contain' => ['Applications' => $this->_contain, 'Users'],

        ]);
        $application = $non_clinical->application;
        $non_clinicals[] = $non_clinical;

        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $this->set(compact('non_clinicals', 'application', 'all_evaluators'));
        $this->set('_serialize', ['non_clinicals', 'application']);

        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_review_' . $id . '.pdf' : 'non_clinicals_review_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/non_clinicals/pdf/view');
        }
    }
    

    public function communication($id = null, $scope = null)
    {
        if ($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_communication_' . $id . '.pdf' : 'application_communication_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/RequestInfos/pdf/view');
        }
    }
    public function committee($id = null, $scope = null)
    {
        if ($scope === 'All') {
            $committee_reviews = $this->Applications->CommitteeReviews->findByApplicationId($id)->contain(['Users', 'Comments', 'Comments.Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $committee = $this->Applications->CommitteeReviews
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users', 'Comments', 'Comments.Attachments']]);
            $application = $committee->application;
            $committee_reviews[] = $committee;
        }
        $this->set(compact('committee_reviews', 'application'));
        $this->set('_serialize', ['committee_reviews', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_committee_' . $id . '.pdf' : 'application_committee_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/CommitteeReviews/pdf/view');
        }
    }
    public function committeeFeedback($id = null, $scope = null)
    {
        if ($scope === 'All') {
            $comments = $this->Applications->Comments->findByForeignKeyAndSubmitted($id, 2)->contain(['Responses', 'Attachments', 'Responses.Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $comments = $this->Applications->Comments->findByForeignKeyAndModelIdAndSubmitted($id, $scope, 2)->contain(['Responses', 'Attachments', 'Responses.Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        }

        $this->filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
        array_push($this->filt, 1);
        $feedback_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 3, 'id IN' => $this->filt]);

        $this->set(compact('comments', 'application', 'feedback_evaluators'));
        $this->set('_serialize', ['comments', 'application', 'feedback_evaluators']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_committee_feedback_' . $id . '.pdf' : 'application_committee_feedback_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/Comments/pdf/view');
        }
        $this->render('/Base/Comments/pdf/view');
    }
    public function dg($id = null, $scope = null)
    {
        if ($scope === 'All') {
            $dg_reviews = $this->Applications->DgReviews->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $dg = $this->Applications->DgReviews
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users']]);
            $application = $dg->application;
            $dg_reviews[] = $dg;
        }
        $this->set(compact('dg_reviews', 'application'));
        $this->set('_serialize', ['dg_reviews', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_dg_' . $id . '.pdf' : 'application_dg_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/DgReviews/pdf/view');
        }
    }
    public function gcp($id = null, $scope = null)
    {
        if ($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_gcp_' . $id . '.pdf' : 'application_gcp_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/GcpInspections/pdf/view');
        }
    }
    public function appeal($id = null, $scope = null)
    {
        if ($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_appeal_' . $id . '.pdf' : 'application_appeal_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/Applications/pdf/appeal');
        }
    }
    public function finals($id = null, $scope = null)
    {
        if ($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_final_report_' . $id . '.pdf' : 'application_final_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/Applications/pdf/finals');
        }
    }
    public function annualApprovals($id = null, $scope = null)
    {
        if ($scope === 'All') {
            $annual_approvals = $this->Applications->AnnualApprovals->findByApplicationId($id)->contain(['Attachments']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $annualApprovals = $this->Applications->AnnualApprovals
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Attachments']]);
            $application = $annualApprovals->application;
            $annual_approvals[] = $annualApprovals;
        }
        $this->set(compact('annual_approvals', 'application'));
        $this->set('_serialize', ['annual_approvals', 'application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_annual_approval_' . $id . '.pdf' : 'application_finance_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/AnnualApprovals/pdf/view');
        }
    }

    public function stages($id = null)
    {
        $application = $this->Applications->get($id, ['contain' => $this->_contain]);
        $this->set(compact('application'));
        $this->set('_serialize', ['application']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no . '_stages_' . $id . '.pdf' : 'application_stages_' . $id . '.pdf'
                ]
            ]);
            $this->render('/Base/Stages/pdf/application_view');
        }
    }
    public function suspend($id = null)
    {
        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['AssignEvaluators']]);
        $this->request->allowMethod(['post', 'delete']);
        $query = $this->Applications->query();
        $query->update()
            ->set(['approved' => 'Suspended', 'Status' => 'Suspended', 'approved_date' => date("Y-m-d")])
            ->where(['id' => $application->id])
            ->execute();

        //send message to applicant and managers upon successful suspend
        $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
        $filt[] = $application->user_id; //Add applicant
        // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
        $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
            $orConditions = $exp->or_(['id IN' => $filt])
                ->eq('group_id', 2);
            return $exp
                ->add($orConditions)
                ->add(['group_id !=' => 6]);
        });
        $this->loadModel('Queue.QueuedJobs');
        foreach ($managers as $manager) {
            //Notify managers    
            $data = [
                'email_address' => $manager->email, 'user_id' => $manager->id,
                'type' => 'suspend_email', 'model' => 'Applications', 'foreign_key' => $application->id,
            ];
            $data['vars']['name'] = $manager->name;
            $data['vars']['protocol_no'] = $application->protocol_no;
            $data['vars']['message'] = $this->request->getData('message');
            //notify applicant
            $this->QueuedJobs->createJob('GenericEmail', $data);
            $data['type'] = 'suspend_notification';
            $this->QueuedJobs->createJob('GenericNotification', $data);
        }
        $this->Flash->success('Suspended ' . $application->protocol_no . '. ');
        return $this->redirect($this->referer());
    }
    public function updateReference($id = null)
    {
        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['AssignEvaluators']]);
        $this->request->allowMethod(['post', 'delete']);
        $reference =  $this->request->getData('reference');

        /**
         * Check Report Status if Gone past Finance
         */
        $status = $application->status;
        if ($status == "Submitted") {
            $this->Flash->error('Please wait for Finance Approval ' . $application->protocol_no . '. ');
            return $this->redirect($this->referer());
        }

        /*
         * Check if the provided protocol number exists for another report
         * 
         */


        $applicationsTable = TableRegistry::get('Applications');
        $another = $applicationsTable->exists(['protocol_no' => $reference]);

        if ($another) {
            $this->Flash->error('Error!! There exists another report with the provided reference number ' . $application->protocol_no . '. ');
            return $this->redirect($this->referer());
        } else {

            $query = $this->Applications->query();
            $query->update()
                ->set(['protocol_no' => $reference])
                ->where(['id' => $application->id])
                ->execute();

            //send message to applicant and managers upon successful reference change
            $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
            $filt[] = $application->user_id; //Add applicant
            // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
            $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
                $orConditions = $exp->or_(['id IN' => $filt])
                    ->eq('group_id', 2);
                return $exp
                    ->add($orConditions)
                    ->add(['group_id !=' => 6]);
            });
            $this->loadModel('Queue.QueuedJobs');
            foreach ($managers as $manager) {
                //Notify managers    
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'reference_change_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['name'] = $manager->name;
                $data['vars']['protocol_no'] = $reference;
                $data['vars']['message'] = $this->request->getData('message');
                // //notify applicant if need be:: 
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'reference_change_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
            }
            $this->Flash->success('Reference Updated from ' . $application->protocol_no . ' to ' . $reference);
            return $this->redirect($this->referer());
        }
    }


    public function reinstate($id = null)
    {
        //TODO: Application must have been previously approved by DG
        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['AssignEvaluators']]);
        $this->request->allowMethod(['post', 'delete']);
        $query = $this->Applications->query();
        $query->update()
            ->set(['approved' => 'Authorize', 'Status' => 'DirectorAuthorize', 'approved_date' => date("Y-m-d")])
            ->where(['id' => $application->id])
            ->execute();

        //send message to applicant and managers upon successful suspend
        $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
        $filt[] = $application->user_id; //Add applicant
        // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
        $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use ($filt) {
            $orConditions = $exp->or_(['id IN' => $filt])
                ->eq('group_id', 2);
            return $exp
                ->add($orConditions)
                ->add(['group_id !=' => 6]);
        });
        $this->loadModel('Queue.QueuedJobs');
        foreach ($managers as $manager) {
            //Notify managers    
            $data = [
                'email_address' => $manager->email, 'user_id' => $manager->id,
                'type' => 'reinstate_email', 'model' => 'Applications', 'foreign_key' => $application->id,
            ];
            $data['vars']['name'] = $manager->name;
            $data['vars']['protocol_no'] = $application->protocol_no;
            $data['vars']['message'] = $this->request->getData('message');
            //notify applicant
            $this->QueuedJobs->createJob('GenericEmail', $data);
            $data['type'] = 'reinstate_notification';
            $this->QueuedJobs->createJob('GenericNotification', $data);
        }
        $this->Flash->success('Reinstated ' . $application->protocol_no . '. ');
        return $this->redirect($this->referer());
    }

    public function clear($id = null)
    {

        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['AssignEvaluators']]);
        if (($this->Auth->user('group_id') == 2 && $this->Applications->delete($application))) {
            $this->Flash->success(__('The Unsubmmited report has been deleted.'));
        } else {
            $this->Flash->error(__('Failed to delete the report. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }

    public function timelineReport()
    {
        //load all applications where status is submitted
        $query = $this->Applications
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->query])
            ->leftJoinWith('InvestigatorContacts')
            ->leftJoinWith('Sponsors')
            ->leftJoinWith('SiteDetails')
            ->leftJoinWith('Medicines')
            ->contain($this->_contain)
            // You can add extra things to the query if you need to
            ->where([['report_type' => 'Initial', 'status !=' => (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not']])
            ->order(['Applications.id' => 'desc'])
            ->distinct();

        // Secretary General only able to view once it has been approved
        if ($this->Auth->user('group_id') == 7) {
            $query->matching('ApplicationStages', function ($q) {
                return $q->where(['ApplicationStages.stage_id' => 9]);
            });
        }
        $this->set('applications', $this->paginate($query));
        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => 'Timeline_Report.pdf'
                ]
            ]);
            $this->render('/Base/Applications/pdf/timeline');
        }
    }
}

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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];

        // $applications = $this->paginate($this->Applications,['finder' => ['status' => $id]]);
        if($this->request->getQuery('status')) {$applications = $this->paginate($this->Applications->find('all')->where(['status' => $this->request->getQuery('status'), 'submitted' => 2, 'report_type' => 'Initial']), ['order' => ['Applications.id' => 'desc']]); }
        else {$applications = $this->paginate($this->Applications->find('all')->where(['submitted' => 2, 'report_type' => 'Initial']), ['order' => ['Applications.id' => 'desc']]);}

        //$applications = $this->paginate($this->Applications);

        $this->set(compact('applications'));
        $this->set('_serialize', ['applications']);
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
        $this->render('/Base/Applications/view');
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

<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\View\Helper\HtmlHelper; 
use Cake\Utility\Hash;

/**
 * Amendments Controller
 *
 *
 * @method \App\Model\Entity\Application[] paginate($object = null, array $settings = [])
 */
class AmendmentsBaseController extends AppController
{

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       $this->loadModel('Applications');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentApplications']
        ];

        $amt_query = $this->Applications->find('all')
                        ->contain(['ApplicationStages', 'ApplicationStages.Stages'])
                        ->where(['Applications.submitted' => 2, 'Applications.report_type' => 'Amendment']);

        if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {
            $amt_query->matching('AssignEvaluators', function ($q) {
                return $q->where(['AssignEvaluators.assigned_to' => $this->Auth->user('id')]);
            });
        }

        if($this->request->getQuery('status')) {$amendments = $this->paginate($amt_query->where(['Applications.status' => $this->request->getQuery('status')]), ['order' => ['Applications.id' => 'desc']]); }
        else {$amendments = $this->paginate($amt_query, ['order' => ['Applications.id' => 'desc']]);}


        $this->set(compact('amendments'));
        $this->set('_serialize', ['amendments']);

        $this->render('/Base/Amendments/index');
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $amendment = $this->Applications->get($id, [
            'contain' => $this->a_contain,
            'conditions' => ['Applications.report_type' => 'Amendment'] 
        ]);
        //debug($amendment);
        $contains = $this->_contain;
        $contains['Amendments'] =  function ($q) { return $q->where(['Amendments.submitted' => 2]); };
        $application = $this->Applications->get($amendment->parent_application->id, [
            'contain' => $contains,
        ]);
        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put']) && $this->Auth->user('group_id') == 2) {
            foreach ($application->evaluations as $key => $value) {
                if($value['id'] == $this->request->getData('evaluation_id')) {
                    $ekey = $key;
                }
            } 
        }   
        // $application = $this->Applications->get($amendment->parent_application->id, [
        //     'contain' => $this->a_contains
        // ]);

        $filt = Hash::extract($amendment, 'assign_evaluators.{n}.assigned_to');
        array_push($filt, 1);
        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $internal_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 3,
            'id NOT IN' => $filt]);
        $external_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 6,
            'id NOT IN' => $filt]);
        
        $this->set(compact('application', 'amendment', 'internal_evaluators', 'external_evaluators', 'all_evaluators', 'provinces', 'ekey', 'filt'));
        $this->set('_serialize', ['application']);
        $this->render('/Base/Amendments/view');
    }
    
    public function addReview() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages']]);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());

            //new stage only once
            if(!in_array("4", Hash::extract($application->application_stages, '{n}.stage_id'))) {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 4;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $application->application_stages = [$stage1];
                $application->status = 'Evaluated';
            }

            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
                $this->loadModel('Queue.QueuedJobs');    
                foreach ($managers as $manager) {
                    //Notify managers
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_create_review_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');                
                    $data['vars']['user_message'] = $this->request->getData('evaluations.'.$this->request->getData('evaluation_pr_id').'.recommendations');
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
    

    public function addCommitteeReview() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators', 'ApplicationStages', 'ParentApplications']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
                     
            // $application->approved = $this->request->getData('committee_reviews.100.decision');
            /**
             * Committee decision 
             * If decision is Approved, the status is set to DirectorGeneral or Stage 9
             * Else Application status is set to Committee. Committee process always visible to PI (except internal comments)
             * 
             */
            $stage  = $this->Applications->ApplicationStages->newEntity();
            $stage->stage_id = 5;
            $stage->stage_date = date("Y-m-d H:i:s");
            $application->application_stages[] = $stage;
            if($this->request->getData('committee_reviews.100.decision') === 'Approved') {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 12;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->committee_reviews[0]->outcome_date;
                $application->application_stages[] = $stage1;
                $application->status = 'FinalStage';
            } else {
                //If Coming from Stage 7 then stage 5
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->committee_reviews[0]->outcome_date;
                if(in_array("6", Hash::extract($application->application_stages, '{n}.stage_id'))) {                    
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
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                $this->loadModel('Queue.QueuedJobs');  

                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_create_committee_review_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                $applicant = $this->Applications->Users->get($application->parent_application->user_id);
                $data = [
                        'email_address' => $application->parent_application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_committee_review_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                $this->Flash->success('Successful committee review of Application '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create review. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeCommitteeReview($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->CommitteeReviews->get($id);
        if ($this->Auth->user('group_id') == $review->user_id && $this->Applications->CommitteeReviews->delete($review)) {
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
                        'type' => 'manager_create_section75_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                        'type' => 'manager_applicant_section75_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                        'type' => 'manager_create_reporter_request_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                        'type' => 'applicant_get_request_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                        'type' => 'manager_create_gcp_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                        'type' => 'manager_applicant_gcp_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
            $finance_approvals = $this->Applications->FinanceApprovals->findByApplicationId($id)->contain('Attachments');
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
            $this->render('/Base/FinanceApprovals/pdf/view');
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
            $this->render('/Base/SeventyFives/pdf/view');
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
            $this->render('/Base/AssignEvaluators/pdf/view');
        }
    }
    public function review($id = null, $scope = null) {
        if($scope === 'All') {
            $evaluations = $this->Applications->Evaluations->findByApplicationId($id)->contain(['Users']);
            $application = $this->Applications->get($id, ['contain' =>  $this->_contain]);
        } else {
            $review = $this->Applications->Evaluations
                ->get($id, ['contain' => ['Applications' => $this->_contain, 'Users']]);            
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
            $this->render('/Base/RequestInfos/pdf/view');
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
            $this->render('/Base/CommitteeReviews/pdf/view');
        }
    }
    public function dg($id = null, $scope = null) {
        if($scope === 'All') {
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
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'_dg_'.$id.'.pdf' : 'application_dg_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/DgReviews/pdf/view');
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
            $this->render('/Base/GcpInspections/pdf/view');
        }
    }
    public function stages($id = null) {
        $amendment = $this->Applications->get($id, ['contain' => ['ApplicationStages', 'ApplicationStages.Stages']]);
        $this->set(compact( 'amendment'));
        $this->set('_serialize', ['amendment']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($amendment->protocol_no)) ? $amendment->protocol_no.'_stages_'.$id.'.pdf' : 'amendment_stages_'.$id.'.pdf'
                ]
            ]);
            $this->render('/Base/Stages/pdf/amendment_view');
        }
    }
}

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

        $amt_query = $this->Applications->find('all')->where(['Applications.submitted' => 2, 'Applications.report_type' => 'Amendment']);
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
            'contain' => ['ParentApplications']
        ]);
        //debug($amendment);
        $contains = $this->_contain;
        $contains['Amendments'] =  function ($q) { return $q->where(['Amendments.submitted' => 2]); };
        $application = $this->Applications->get($amendment->parent_application->id, [
            'contain' => $contains
        ]);
        // $application = $this->Applications->get($amendment->parent_application->id, [
        //     'contain' => $this->a_contains
        // ]);

        $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
        array_push($filt, 1);
        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $all_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 3, 6]]);
        $internal_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 3,
            'id NOT IN' => $filt]);
        $external_evaluators = $this->Applications->Users->find('list', ['limit' => 200])->where(['group_id' => 6,
            'id NOT IN' => $filt]);
        
        $this->set(compact('application', 'amendment', 'internal_evaluators', 'external_evaluators', 'all_evaluators', 'provinces'));
        $this->set('_serialize', ['application']);
        $this->render('/Base/Amendments/view');
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

}

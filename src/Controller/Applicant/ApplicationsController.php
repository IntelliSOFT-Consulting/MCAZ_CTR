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

    // public function beforeFilter(Event $event)
    // {
        // parent::beforeFilter($event);
        // if ($this->request->getParam('action') === 'view') {
            
        // }
    // }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $applications = $this->paginate($this->Applications);

        $this->set(compact('applications'));
        $this->set('_serialize', ['applications']);
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
            'conditions' => ['user_id' => $this->Auth->user('id'), 'report_type' => 'Initial']
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
            'conditions' => ['user_id' => $this->Auth->user('id'), 'report_type' => 'Initial']
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
                            'Sponsors' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
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
                $this->Flash->success(__('The changes to the Report  have been saved.'));
                return $this->redirect(['action' => 'edit', $application->id]);
              } else {
                $this->Flash->error(__('Report  could not be saved. Kindly correct the errors and try again.'));
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
              $application->status = 'Submitted';
              $application->protocol_no = 'CT'.$application->id.'/'.$application->created->i18nFormat('yyyy');
              if ($this->Applications->save($application)) {
                $this->Flash->success(__('Report '.$application->protocol_no.' has been successfully submitted to MCAZ for review.'));
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $application->email_address, 'user_id' => $this->Auth->user('id'),
                    'type' => 'applicant_submit_amendment_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    'vars' =>  $application->toArray()
                ]; 
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'applications', 'action' => 'view', $application->id, '_ext' => 'pdf',  
                                          '_full' => true]);
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_submit_application_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers
                $managers = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2, 3]]);
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
                $this->Flash->success(__('The changes to the Report have been saved.'));
                return $this->redirect(['action' => 'edit', $application->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
            }
        }

        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('application', 'provinces'));
        $this->set('_serialize', ['application']);

        //start
    }

    public function addAmendment($id) {
        $application = $this->Applications->get($id, ['contain' => ['Amendments' => ['conditions' => ['submitted !=' => 2]]]]);
        if (empty($application)) {
            $this->Flash->error(__('The application does not exists!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        } 
        //$this->_isApplicant($application);  

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
            if ($this->Applications->Amendments->save($amendment, ['validate' => false])) {
                $this->Flash->success(__('The amendment has been created.'));
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
            'conditions' => ['user_id' => $this->Auth->user('id'), 'report_type' => 'Amendment']
        ]);
        $application = $this->Applications->get($amendment->application_id, [
            'contain' => $this->_contain,
            'conditions' => ['user_id' => $this->Auth->user('id')]
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
              $amendment->status = 'Submitted';
              if ($this->Applications->Amendments->save($amendment)) {
                $this->Flash->success(__('Amendment '.$amendment->created.' has been successfully submitted to MCAZ for review.'));
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $application->email_address, 'user_id' => $this->Auth->user('id'),
                    'type' => 'applicant_submit_amendment_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ]; 
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['applicant_name'] = $this->Auth->user('name');
                $data['vars']['date_submitted'] = $amendment->date_submitted;
                $data['vars']['email_address'] = $application->email_address;
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'applications', 'action' => 'view', $application->id, '_ext' => 'pdf',  
                                          '_full' => true]);
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_submit_amendment_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers 
                $managers = $this->Applications->Users->find('all')->where(['Users.group_id' => 2]);
                foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Applications', 'foreign_key' => $application->id];
                    $data['vars']['protocol_no'] = $application->protocol_no;
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
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Applications', 'foreign_key' => $application->id];
                    $data['vars']['protocol_no'] = $application->protocol_no;
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
            } elseif ($application->submitted == -1) {
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
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application->status = 'ReporterResponse';

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

    public function addSection75() {
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
            $application->status = 'Notification';

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
        if ($this->Applications->delete($application)) {
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    //PDF views
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
        }
    }
}

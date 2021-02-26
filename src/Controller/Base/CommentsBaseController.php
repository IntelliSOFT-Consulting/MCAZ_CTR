<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Utility\Hash;
use Cake\I18n\Number;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[] paginate($object = null, array $settings = [])
 */
class CommentsBaseController extends AppController
{

    public function addFromCommittee($id = null)
    {
        $comment = !empty($this->request->getData('id')) ? $this->Comments->get($this->request->getData('id'), []) : $this->Comments->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());

            if ($this->Comments->save($comment)) {         

                if ($this->request->getData('submitted') == '2') {
                    $this->loadModel('Applications');
                    $this->loadModel('Queue.QueuedJobs'); 
                    $application = $this->Applications->get($this->request->getData('foreign_key'), ['contain' => ['AssignEvaluators', 'ParentApplications']]);                     

                    //Send email, notification and message to managers and assigned evaluators
                    $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                    array_push($filt, 1);
                    // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                    $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
                                $orConditions = $exp->or_(['id IN' => $filt])
                                    ->eq('group_id', 2);
                                return $exp
                                    ->add($orConditions)
                                    ->add(['group_id !=' => 6]);
                            });

                    foreach ($managers as $manager) {
                        //Notify managers  
                        $data = [
                            'email_address' => $manager->email, 'user_id' => $manager->id,
                            'type' => 'manager_new_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['name'] = $manager->name;
                        $data['vars']['evaluator_name'] = $this->Auth->user('name');
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['subject'] = $comment->subject;  
                        $data['vars']['content'] = $comment->content;              
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_new_query_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }
                }

                if($this->request->getData('submitted') == '1') {
                     $this->Flash->info(__('The committee feedback has been successfully saved. Please submit to manager for review.'));
                } elseif ($this->request->getData('submitted') == '2') {
                    $this->Flash->success(__('The committee feedback has been submitted to the managers for review.'));
                } else {
                    $this->Flash->success(__('The comment has been successfully saved.'));
                } 

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        } else {
            $this->Flash->error(__('Invalid method for add from committee.'));
            return $this->redirect($this->referer());
        }
        
    }

    public function addFromEvaluations()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel('Applications');
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $application = $this->Applications->get($this->request->getData('model_id'), ['contain' => ['AssignEvaluators']]);

            /**
             * Evaluator or Manager raises query on evaluation
             * If decision is Approved comments/queries should not appear
             * 
             */

            if ($this->Comments->save($comment)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
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
                        'type' => 'manager_evaluation_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['sender'] = $comment->sender;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['subject'] = $comment->subject;  
                    $data['vars']['content'] = $comment->content;              
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_evaluation_query_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                $this->Flash->success(__('The internal review comment has been successfully raised.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        
    }

    public function addFromNotifications()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel('Applications');
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $application = $this->Applications->get($this->request->getData('model_id'), ['contain' => ['AssignEvaluators']]);

            /**
             * Evaluator or Manager raises query on evaluation
             * If decision is Approved comments/queries should not appear
             * 
             */

            if ($this->Comments->save($comment)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
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
                        'type' => 'manager_notification_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['sender'] = $comment->sender;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['subject'] = $comment->subject;  
                    $data['vars']['content'] = $comment->content;              
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_evaluation_query_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //Notify Applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $email_address = ($application->report_type == 'Amendment') ? $application->parent_application->email_address : $application->email_address ;
                $data = [
                        'email_address' => $email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_notification_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;
                $data['vars']['subject'] = $comment->subject;  
                $data['vars']['content'] = $comment->content;    
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_notification_query_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success(__('The notification query/comment has been successfully submitted.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        
    }

    public function submitAll($cn = null) 
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('Applications');
            $this->loadModel('Queue.QueuedJobs');
            $application = $this->Applications->get($this->request->getData('foreign_key'), ['contain' => ['AssignEvaluators', 'ParentApplications']]); 
            //Send email, notification and message to managers and assigned evaluators
            $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
            array_push($filt, 1);
            $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
                                $orConditions = $exp->or_(['id IN' => $filt])
                                    ->eq('group_id', 2);
                                return $exp
                                    ->add($orConditions)
                                    ->add(['group_id !=' => 6]);
                            });

            //Applicant submits all queries to manager for approval
            if ($this->request->query('cf_sa')) {
                if ($this->Comments->updateAll(['submitted' => $this->request->getData('submitted')], ['model_id' => $this->request->getData('id'), 'id IN' => $this->request->getData('feedbacks')])) { 
                    // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);                  
                    foreach ($managers as $manager) {
                        //Notify managers  
                        $data = [
                            'email_address' => $manager->email, 'user_id' => $manager->id,
                            'type' => 'manager_new_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['name'] = $manager->name;
                        $data['vars']['evaluator_name'] = $this->Auth->user('name');
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['subject'] = 'The application '.$application->protocol_no.' was tabled at the '.Number::ordinal($this->request->getData('id')).' PVCT Committee Meeting and the applicant was requested to address the following issues';
                        $vCon = $this->Comments->find('list', ['keyField' => 'id', 'valueField' => 'content', 'conditions' => ['Comments.id IN' => $this->request->getData('feedbacks')]])->toArray();
                        $content = implode("<br><br>", $vCon);
                        $data['vars']['content'] = $content;
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_new_query_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }
                    
                    $this->Flash->success(__('The committee feedback has been submitted to the managers for review.'));

                    return $this->redirect($this->referer());
                }
                $this->Flash->error(__('The committee feedback could not be shared with the manager. Please, try again.'));
            }

            //Manager Approves all queries for the committee meeting
            if ($this->request->query('cf_ma')) {
                if ($this->Comments->updateAll(['approver' => $this->request->getData('approver')], ['model_id' => $this->request->getData('id'), 'id IN' => $this->request->getData('feedbacks')])) {
                    $stage1  = $this->Applications->ApplicationStages->newEntity();
                    $stage1->stage_id = 6;
                    $stage1->stage_date = date("Y-m-d H:i:s");
                    $application->application_stages = [$stage1];
                    $application->status = 'Correspondence';
                    if ($this->Applications->save($application)) {
                        //Send email, notification and message to managers and assigned evaluators

                        foreach ($managers as $manager) {
                            //Notify managers  
                            $data = [
                                'email_address' => $manager->email, 'user_id' => $manager->id,
                                'type' => 'manager_applicant_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                            ];
                            $data['vars']['name'] = $manager->name;
                            $data['vars']['protocol_no'] = $application->protocol_no;
                            $data['vars']['subject'] = 'The application '.$application->protocol_no.' was tabled at the '.Number::ordinal($this->request->getData('id')).' PVCT Committee Meeting and the applicant was requested to address the following issues';
                            $vCon = $this->Comments->find('list', ['keyField' => 'id', 'valueField' => 'content', 'conditions' => ['Comments.id IN' => $this->request->getData('feedbacks')]])->toArray();
                            $content = implode("<br><br>", $vCon);
                            $data['vars']['content'] = $content; 

                            //notify applicant
                            $this->QueuedJobs->createJob('GenericEmail', $data);
                            $data['type'] = 'manager_applicant_query_notification';
                            $this->QueuedJobs->createJob('GenericNotification', $data);
                        }

                        //Notify Applicant 
                        $applicant = $this->Applications->Users->get($application->user_id);
                        $email_address = ($application->report_type == 'Amendment') ? $application->parent_application->email_address : $application->email_address ;
                        $data = [
                                'email_address' => $email_address, 'user_id' => $application->user_id,
                                'type' => 'applicant_pvct_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['name'] = $applicant->name;
                        $data['vars']['subject'] = 'The application '.$application->protocol_no.' was tabled at the '.Number::ordinal($this->request->getData('id')).' PVCT Committee Meeting and the applicant was requested to address the following issues';
                        $vCon = $this->Comments->find('list', ['keyField' => 'id', 'valueField' => 'content', 'conditions' => ['Comments.id IN' => $this->request->getData('feedbacks')]])->toArray();
                        $content = implode("<br><br>", $vCon);
                        $data['vars']['content'] = $content; 

                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'applicant_pvct_query_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);

                        $this->Flash->success(__('The feedback has been approved and shared with the applicant.'));  

                        return $this->redirect($this->referer());
                    }
                }
                $this->Flash->error(__('The committee feedback could not be approved. Please, try again.'));
            }
            
        } else {
            $this->Flash->error(__('Method not allowed. Please, try again.'));
            return $this->redirect($this->referer());
        }
    }

    public function submit($id = null)
    {
        $comment = $this->Comments->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                // if($this->request->query('cf_sm')) $this->Flash->success(__('The feedback has been submitted to the manager for review.')); //removed as submit logic in add-from...
                //Committee feedback manager approve
                $this->loadModel('Applications');
                $this->loadModel('Queue.QueuedJobs'); 
                $application = $this->Applications->get($comment->foreign_key, ['contain' => ['AssignEvaluators', 'ParentApplications']]);
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
                                $orConditions = $exp->or_(['id IN' => $filt])
                                    ->eq('group_id', 2);
                                return $exp
                                    ->add($orConditions)
                                    ->add(['group_id !=' => 6]);
                            });

                //Manager approves query
                if($this->request->query('cf_ma')) {     
                    $stage1  = $this->Applications->ApplicationStages->newEntity();
                    $stage1->stage_id = 6;
                    $stage1->stage_date = date("Y-m-d H:i:s");
                    $application->application_stages = [$stage1];
                    $application->status = 'Correspondence';
                    if ($this->Applications->save($application)) {
                        //Send email, notification and message to managers and assigned evaluators

                        foreach ($managers as $manager) {
                            //Notify managers  
                            $data = [
                                'email_address' => $manager->email, 'user_id' => $manager->id,
                                'type' => 'manager_applicant_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                            ];
                            $data['vars']['name'] = $manager->name;
                            $data['vars']['protocol_no'] = $application->protocol_no;
                            $data['vars']['subject'] = $comment->subject;  
                            $data['vars']['content'] = $comment->content;              
                            //notify applicant
                            $this->QueuedJobs->createJob('GenericEmail', $data);
                            $data['type'] = 'manager_applicant_query_notification';
                            $this->QueuedJobs->createJob('GenericNotification', $data);
                        }

                        //Notify Applicant 
                        $applicant = $this->Applications->Users->get($application->user_id);
                        $email_address = ($application->report_type == 'Amendment') ? $application->parent_application->email_address : $application->email_address ;
                        $data = [
                                'email_address' => $email_address, 'user_id' => $application->user_id,
                                'type' => 'applicant_pvct_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['name'] = $applicant->name;
                        $data['vars']['subject'] = $comment->subject;  
                        $data['vars']['content'] = $comment->content;    
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'applicant_pvct_query_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);

                        $this->Flash->success(__('The feedback has been approved and shared with the applicant.'));  

                        return $this->redirect($this->referer());
                    }              
                }

                //Manager approves feedback
                if($this->request->query('ef_ma')) {                 
                    $stage1  = $this->Applications->ApplicationStages->newEntity();
                    $stage1->stage_id = 6;
                    $stage1->stage_date = date("Y-m-d H:i:s");
                    $application->application_stages = [$stage1];
                    $application->status = 'Correspondence';
                    if ($this->Applications->save($application)) {
                        //Send email, notification and message to managers and assigned evaluators

                        foreach ($managers as $manager) {
                            //Notify managers  
                            $data = [
                                'email_address' => $manager->email, 'user_id' => $manager->id,
                                'type' => 'manager_applicant_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                            ];
                            $data['vars']['name'] = $manager->name;
                            $data['vars']['protocol_no'] = $application->protocol_no;
                            $data['vars']['subject'] = $comment->subject;  
                            $data['vars']['content'] = $comment->review;              
                            //notify applicant
                            $this->QueuedJobs->createJob('GenericEmail', $data);
                            $data['type'] = 'manager_applicant_query_notification';
                            $this->QueuedJobs->createJob('GenericNotification', $data);
                        }

                        //Notify Applicant 
                        //Removed because applicant should not see evaluator's comments
                        /*$applicant = $this->Applications->Users->get($application->user_id);
                        $email_address = ($application->report_type == 'Amendment') ? $application->parent_application->email_address : $application->email_address ;
                        $data = [
                                'email_address' => $email_address, 'user_id' => $application->user_id,
                                'type' => 'applicant_pvct_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['name'] = $applicant->name;
                        $data['vars']['subject'] = $comment->subject;  
                        $data['vars']['content'] = $comment->review;    
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'applicant_pvct_query_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);*/


                        $this->Flash->success(__('The evaluator\'s feedback has been approved and shared with the applicant.'));  
                        return $this->redirect($this->referer());
                    }              
                }

                //Manager reverts on query
                if($this->request->query('cf_rv')) {
                    foreach ($managers as $manager) {
                        //Notify managers  
                        $data = [
                            'email_address' => $manager->email, 'user_id' => $manager->id,
                            'type' => 'manager_revert_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['name'] = $manager->name;
                        $data['vars']['manager_name'] = $this->Auth->user('name');
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['subject'] = $comment->subject;  
                        $data['vars']['content'] = $comment->manager_feedback;              
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_revert_query_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }
                    $this->Flash->success(__('The internal feedback has been shared with the evaluator for review.'));
                }

                //Evaluator shares query
                if($this->request->query('cf_ef')) {
                    if ($comment->ef_submitted == '2') {                     
                        foreach ($managers as $manager) {
                            //Notify managers  
                            $data = [
                                'email_address' => $manager->email, 'user_id' => $manager->id,
                                'type' => 'manager_new_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                            ];
                            $data['vars']['name'] = $manager->name;
                            $data['vars']['manager_name'] = $this->Auth->user('name');
                            $data['vars']['protocol_no'] = $application->protocol_no;
                            $data['vars']['subject'] = $comment->subject;  
                            $data['vars']['content'] = $comment->review;              
                            //notify applicant
                            $this->QueuedJobs->createJob('GenericEmail', $data);
                            $data['type'] = 'manager_new_query_notification';
                            $this->QueuedJobs->createJob('GenericNotification', $data);
                        }
                        $this->Flash->success(__('The evaluator\'s feedback has been shared with the managers for review.'));
                    } else {
                        $this->Flash->info(__('The evaluator\'s feedback has been saved.'));
                    }
                    
                }

                //Manager assigns evaluator to respond
                if($this->request->query('cf_ae')) {
                    if ($this->request->getData('assigned_to')) {
                        $evaluator = $this->Applications->Users->get($this->request->getData('assigned_to'));

                        foreach ($managers as $manager) {
                            //Notify managers and only the assigned evaluator!! 
                            $data = [
                                'email_address' => $manager->email, 'user_id' => $manager->id,
                                'type' => 'manager_assign_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                            ];
                            $data['vars']['name'] = $manager->name;
                            $data['vars']['manager_name'] = $this->Auth->user('name');
                            $data['vars']['evaluator_name'] = $evaluator->name;
                            $data['vars']['protocol_no'] = $application->protocol_no;
                            $data['vars']['subject'] = 'Applicant response assigned to: '.$evaluator->name;  
                            $data['vars']['assign_message'] = $this->request->getData('assign_message');              
                            //notify applicant
                            $this->QueuedJobs->createJob('GenericEmail', $data);
                            $data['type'] = 'manager_assign_query_notification';
                            $this->QueuedJobs->createJob('GenericNotification', $data);
                        }
                        $this->Flash->success(__('The evaluator has been assigned to review the applicant\'s response.'));    
                    } else {
                        $this->Flash->info(__('Please select an evaluator.'));
                    }                
                }

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment feedback could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('Method not allowed. Please, try again.'));
            return $this->redirect($this->referer());
        }
    }


    /**
     * Delete method
     *
     * @param string|null $id Site Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {

            //Manager deletes evalauator's query
            if($this->request->query('cf_md')) {
                $this->loadModel('Applications');
                $this->loadModel('Queue.QueuedJobs'); 
                $application = $this->Applications->get($this->request->query('cf_md'), ['contain' => ['AssignEvaluators', 'ParentApplications']]);
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
                                $orConditions = $exp->or_(['id IN' => $filt])
                                    ->eq('group_id', 2);
                                return $exp
                                    ->add($orConditions)
                                    ->add(['group_id !=' => 6]);
                            });
                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_delete_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['manager_name'] = $this->Auth->user('name');
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['subject'] = $comment->subject;  
                    $data['vars']['content'] = $comment->manager_feedback;              
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_delete_query_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                $this->Flash->success(__('The comment/query has been successfully deleted.'));
            } else {
                $this->Flash->success(__('The comment has been deleted.'));
            }
            
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}

/*
public function addFromCommittee($id = null)
    {
        $comment = !empty($this->request->getData('id')) ? $this->Comments->get($this->request->getData('id'), []) : $this->Comments->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('Applications');
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $application = $this->Applications->get($this->request->getData('foreign_key'), ['contain' => ['AssignEvaluators', 'ParentApplications']]);


            $stage1  = $this->Applications->ApplicationStages->newEntity();
            $stage1->stage_id = 6;
            $stage1->stage_date = date("Y-m-d H:i:s");
            $application->application_stages = [$stage1];
            $application->status = 'Correspondence';

            if ($this->Comments->save($comment) && $this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
                                $orConditions = $exp->or_(['id IN' => $filt])
                                    ->eq('group_id', 2);
                                return $exp
                                    ->add($orConditions)
                                    ->add(['group_id !=' => 6]);
                            });

                if ($this->request->getData('submitted') == '2') {   
                    $this->loadModel('Queue.QueuedJobs'); 

                    foreach ($managers as $manager) {
                        //Notify managers  
                        $data = [
                            'email_address' => $manager->email, 'user_id' => $manager->id,
                            'type' => 'manager_applicant_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['name'] = $manager->name;
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['subject'] = $comment->subject;  
                        $data['vars']['content'] = $comment->content;              
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_applicant_query_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }

                    //Notify Applicant 
                    $applicant = $this->Applications->Users->get($application->user_id);
                    $email_address = ($application->report_type == 'Amendment') ? $application->parent_application->email_address : $application->email_address ;
                    $data = [
                            'email_address' => $email_address, 'user_id' => $application->user_id,
                            'type' => 'applicant_pvct_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['name'] = $applicant->name;
                    $data['vars']['subject'] = $comment->subject;  
                    $data['vars']['content'] = $comment->content;    
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_pvct_query_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                if($this->request->getData('submitted') == '1') {
                     $this->Flash->info(__('The committee feedback has been successfully saved. Please submit to manager for review.'));
                } elseif ($this->request->getData('submitted') == '2') {
                    $this->Flash->success(__('The committee feedback has been submitted to the managers for review.'));
                } else {
                    $this->Flash->success(__('The comment has been successfully saved.'));
                } 

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        } else {
            $this->Flash->error(__('Invalid method.'));
            return $this->redirect($this->referer());
        }
        
    }
*/
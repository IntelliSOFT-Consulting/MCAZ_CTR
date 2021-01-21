<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Utility\Hash;

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
            $this->loadModel('Applications');
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $application = $this->Applications->get($this->request->getData('foreign_key'), ['contain' => ['AssignEvaluators', 'ParentApplications']]);

            /**
             * Committee raises query to applicant after decision
             * If decision is Approved comments/queries should not appear
             * 
             */
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

    public function submit($id = null)
    {
        $comment = $this->Comments->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                if($this->request->query('cf_sm')) $this->Flash->success(__('The feedback has been submitted to the manager for review.'));
                if($this->request->query('cf_ma')) $this->Flash->success(__('The feedback has been approved.'));
                if($this->request->query('cf_rv')) $this->Flash->success(__('The internal feedback has been shared with the evaluator.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The site detail could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('Method not allowed. Please, try again.'));
            return $this->redirect($this->referer());
        }
    }
}

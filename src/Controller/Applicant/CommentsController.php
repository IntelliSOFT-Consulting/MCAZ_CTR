<?php
namespace App\Controller\Applicant;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[] paginate($object = null, array $settings = [])
 */
class CommentsController extends AppController
{

    public function addFromApplicant()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel('Applications');
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $application = $this->Applications->get($this->request->getData('model_id'), ['contain' => ['AssignEvaluators', 'ParentApplications']]);

            /**
             * Applicant responds to query raised by committee. They can also use this to send a query
             * Condition is there must be a query they are responding to
             * 
             */
            $stage1  = $this->Applications->ApplicationStages->newEntity();
            $stage1->stage_id = 7;
            $stage1->stage_date = date("Y-m-d H:i:s");
            $application->application_stages = [$stage1];
            $application->status = 'ApplicantResponse';

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
                
                if ($this->request->getData('submitChanges') == '2') { 
                    $this->loadModel('Queue.QueuedJobs'); 

                    foreach ($managers as $manager) {
                        //Notify managers  
                        $data = [
                            'email_address' => $manager->email, 'user_id' => $manager->id,
                            'type' => 'manager_applicant_response_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        ];
                        $data['vars']['name'] = $manager->name;
                        $data['vars']['protocol_no'] = $application->protocol_no;
                        $data['vars']['subject'] = $comment->subject;  
                        $data['vars']['content'] = $comment->content;              
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_applicant_response_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }

                    //Notify Applicant 
                    $applicant = $this->Applications->Users->get($application->user_id);
                    $data = [
                            'email_address' => $applicant->email, 'user_id' => $application->user_id,
                            'type' => 'applicant_response_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['name'] = $applicant->name;
                    $data['vars']['subject'] = $comment->subject;  
                    $data['vars']['content'] = $comment->content;    
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_response_query_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                
                $this->Flash->success(__('The feedback has been submitted.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        
    }

    public function addFromNotification()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel('Applications');
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $application = $this->Applications->get($this->request->getData('model_id'), ['contain' => ['AssignEvaluators', 'ParentApplications']]);

            /**
             * Applicant responds to query raised by committee.
             * Condition is there must be a query they are responding to
             * 
             */
            
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
                
                $this->loadModel('Queue.QueuedJobs'); 

                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_applicant_response_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['subject'] = $comment->subject;  
                    $data['vars']['content'] = $comment->content;              
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_applicant_response_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //Notify Applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $data = [
                        'email_address' => $applicant->email, 'user_id' => $application->user_id,
                        'type' => 'applicant_response_query_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;
                $data['vars']['subject'] = $comment->subject;  
                $data['vars']['content'] = $comment->content;    
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_response_query_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        
    }

}

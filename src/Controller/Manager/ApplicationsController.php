<?php
namespace App\Controller\Manager;

use App\Controller\Base\ApplicationsBaseController;
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
class ApplicationsController extends ApplicationsBaseController
{

    //TODO: simply check if a given user has permissions to action before rendering view / displaying action
    public function assignEvaluator() {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => 'ApplicationStages']);
        $evaluator = $this->Applications->Users->get($this->request->getData('assign_evaluators.100.assigned_to'));
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            
            //new stage only once
            if(!in_array("3", Hash::extract($application->application_stages, '{n}.stage_id'))) {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 3;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $application->application_stages = [$stage1];
                $application->status = 'Assigned';
            }

            if ($this->Applications->save($application)) {

                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2]);
                $this->loadModel('Queue.QueuedJobs'); 
                foreach ($managers as $manager) {
                    //Notify managers   
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_assign_evaluator_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $evaluator->name;                
                    $data['vars']['user_message'] = $this->request->getData('assign_evaluators.100.user_message');
                    //notify manager
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_assign_evaluator_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //Send email, notification and message to evaluator
                $data['user_id'] = $evaluator->id;                
                $data['email_address'] = $evaluator->email;
                $data['user_message'] = $this->request->getData('user_message');

                $data['name'] = $this->Auth->user('name');
                $data['type'] = 'manager_assign_evaluator_message';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //email evaluator_assigned_manager_notification
                $data['type'] = 'evaluator_assigned_manager_email';
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'evaluator_assigned_manager_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);                
                
                $this->Flash->success('Evaluator '.$evaluator->name.' assigned Application '.$application->protocol_no.' for review.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to assign evaluator. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeEvaluator($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $evaluator = $this->Applications->AssignEvaluators->get($id);
        if ($this->Auth->user('group_id') == 2 && $this->Applications->AssignEvaluators->delete($evaluator)) {
            $this->Flash->success(__('The evaluator has been removed.'));
        } else {
            $this->Flash->error(__('The evaluator could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    /*   Add the final Review for the protocol
     *   Adious
    */
    public function addFinalStage($id) {
        $application = $this->Applications->get((isset($id)) ? $id : $this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), 
                        ['validate' => true,
                            'associated' => [
                                'FinalStages' => ['validate' => true],
                                'FinalStages.Attachments'
                            ]
                     ]);


            /**
             * Final Stage  
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
                
                $this->Flash->success('Successful final stage review of Application '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            $this->Flash->error(__('Unable to create final stage review. Please, try again.')); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeFinalStage($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->FinalStages->get($id);
        if ($this->Auth->user('group_id') == $review->user_id && $this->Applications->FinalStages->delete($review)) {
            $this->Flash->success(__('The final stage review has been removed.'));
        } else {
            $this->Flash->error(__('The final stage review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }

    public function commonHeader($id = null) {
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
                    '_serialize' => ['error', 'message', 'application']]);
                return;

            } else {
                $this->response->body('Failure');
                $this->response->statusCode(401);
                $this->set([
                    'message' => 'Unable to save user!!', 
                    '_serialize' => ['message']]);
                return; 
            }
        } else {
            $this->response->body('Failure');
            $this->response->statusCode(404);
            $this->set([
                'error' => 'Only post method allowed', 
                'message' => 'Only post method allowed', 
                '_serialize' => ['error', 'message']]);
            return;
        }
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
}

<?php
namespace App\Controller\Manager;

use App\Controller\Base\AmendmentsBaseController;
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
class AmendmentsController extends AmendmentsBaseController
{
    
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
                        'type' => 'manager_assign_evaluator_email', 'model' => 'Amendments', 'foreign_key' => $application->id,
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
                $data['vars']['user_message'] = $this->request->getData('user_message');

                $data['vars']['name'] = $this->Auth->user('name');
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

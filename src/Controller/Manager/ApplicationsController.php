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
    public function processAssignment($application, $evaluator, $message)
    {
        $application = $this->Applications->patchEntity($application, $this->request->getData());

        //new stage only once
        if (!in_array("3", Hash::extract($application->application_stages, '{n}.stage_id'))) {
            $stage1  = $this->Applications->ApplicationStages->newEntity();
            $stage1->stage_id = 3;
            $stage1->stage_date = date("Y-m-d H:i:s");
            $application->application_stages = [$stage1];
            $application->status = 'Assigned';
            $application->action_date= date("Y-m-d H:i:s");
        }

        if ($this->Applications->save($application)) {

            $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2,'deactivated' => 0]);
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
                $data['vars']['user_message'] = $message;
                //notify manager
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_assign_evaluator_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
            }
            //Send email, notification and message to evaluator
            $data['user_id'] = $evaluator->id;
            $data['email_address'] = $evaluator->email;
            $data['vars']['evaluator_name'] = $evaluator->name;
            $data['vars']['user_message'] = $message;

            //remove double notification
            $data['vars']['name'] = $this->Auth->user('name');
            /*
            $data['type'] = 'manager_assign_evaluator_message';
            $this->QueuedJobs->createJob('GenericNotification', $data);*/
            //email evaluator_assigned_manager_notification
            $data['type'] = 'evaluator_assigned_manager_email';
            $this->QueuedJobs->createJob('GenericEmail', $data);
            $data['type'] = 'evaluator_assigned_manager_notification';
            $this->QueuedJobs->createJob('GenericNotification', $data);

            $this->Flash->success('Evaluator ' . $evaluator->name . ' assigned Application ' . $application->protocol_no . ' for review.');

            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Unable to assign evaluator. Please, try again.'));
        return $this->redirect($this->referer());
    }

    public function assignSelf()
    {

        $current_id = $this->Auth->user('id');
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => 'ApplicationStages']);
        $evaluator = $this->Applications->Users->get($current_id);
        $message = $this->request->getData('user_message');

        if (in_array($this->Auth->user('id'), Hash::extract($application, 'assign_evaluators.{n}.assigned_to'))) {

            $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
            return $this->redirect($this->referer());
        }
        $message="Manager ".$evaluator->name." self assigned the application ". $application->protocol_no;
        $this->generate_audit_trail($application->id, $message);
        $this->processAssignment($application, $evaluator, $message);
    }

    //TODO: simply check if a given user has permissions to action before rendering view / displaying action
    public function assignEvaluator()
    {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), ['contain' => 'ApplicationStages']);
        $evaluator = $this->Applications->Users->get($this->request->getData('assign_evaluators.100.assigned_to'));
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $message = $this->request->getData('user_message');
            $message="Evaluator ".$evaluator->name." has been assigned ". $application->protocol_no;
            $this->generate_audit_trail($application->id, $message);
            $this->processAssignment($application, $evaluator, $message);
        } else {
            $this->Flash->error(__('Unknown application. Kindly contact MCAZ.'));
            return $this->redirect($this->referer());
        }
    }

    public function removeEvaluator($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evaluator = $this->Applications->AssignEvaluators->get($id);
        if ($this->Auth->user('group_id') == 2 && $this->Applications->AssignEvaluators->delete($evaluator)) {
            $message="Evaluator ".$evaluator->name." has been removed";
            $this->generate_audit_trail($id, $message);
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
            $message="The application has been deleted";
            $this->generate_audit_trail($id, $message);
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
 

    public function generateReferenceNumber()
    {
        # get all applications where submitted=2
        $applications = $this->Applications->find('all')->where(['submitted' => 2]);
        
        //generate an array of dates 
        foreach ($applications as $application) {

            //get the year when the application was submitted and use it to generate the reference number
            $year = date('Y'); 

            $model='Applications';
            // if ($application->id % 2 == 0) {
            //    $model='Applications2';            }

            $refid = $this->Applications->Refids->newEntity(['foreign_key' => $application->id, 'model' => $model, 'year' => $year]);
            $this->Applications->Refids->save($refid);
            $refid = $this->Applications->Refids->get($refid->id);
            $application->protocol_no = 'CT' . $refid->refid . '/' . $refid->year;
            $this->Applications->save($application);
        }
        $this->Flash->success(__('Reference numbers generated.'));
        return $this->redirect(['action' => 'index']);

    }
 
}
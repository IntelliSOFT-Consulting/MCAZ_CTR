<?php
namespace App\Controller\Finance;

use App\Controller\Base\AmendmentsBaseController;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[] paginate($object = null, array $settings = [])
 */
class AmendmentsController extends AmendmentsBaseController
{
    
    public function view($id = null) {
        parent::view($id);
        $this->render('/Finance/Amendments/view');
    }

    public function financeApproval($id = null) {
        $application = $this->Applications->get($this->request->getData('application_pr_id'), []);
        
        // debug($application);
        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application->status = 'Finance';
            $application->finance_approvals[0]->user_id = $this->Auth->user('id');
            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Applications->save($application)) {
                //Send email and message (if present!!!) 
                $this->loadModel('Queue.QueuedJobs');    
                //notify managers and finance
                $managers = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2, 5]]);
                foreach ($managers as $manager) {
                  $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'applications', 'foreign_key' => $application->id,
                    'vars' =>  $application->toArray()];
                  $data['type'] = 'finance_submit_approval_email';
                  $data['vars']['public_comments'] = $application->finance_approvals[0]->public_comments;
                  $data['vars']['internal_comments'] = $application->finance_approvals[0]->internal_comments;
                  $this->QueuedJobs->createJob('GenericEmail', $data);
                  $data['type'] = 'finance_submit_approval_notification';
                  $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //

                //applicant visible notification and email sent 
                if(!empty($application->finance_approvals[0]->public_comments)) {
                    $reporter = $this->Applications->Users->get($application->user_id);
                    $data = [
                      'email_address' => $application->email_address, 'user_id' => $application->user_id,
                      'type' => 'applicant_finance_comments_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                        'vars' =>  $application->toArray()
                    ];
                    $data['vars']['public_comments'] = $application->finance_approvals[0]->public_comments;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_finance_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);     
                }
                //end 
                
               $this->Flash->success('Review successfully done for Application '.$application->protocol_no);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                debug($application->errors());
                //return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown Application. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }
}

<?php
namespace App\Controller\DirectorGeneral;

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

    public function addDgReview($id) {
        $application = $this->Applications->get((isset($id)) ? $id : $this->request->getData('application_pr_id'), ['contain' => ['AssignEvaluators']]);

        if (isset($application->id) && $this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData(), 
                        ['validate' => true,
                            'associated' => [
                                'DgReviews' => ['validate' => true],
                                'DgReviews.Attachments'
                            ]
                     ]);


            /**
             * Director General decision 
             * If decision is Authorize, the status is set to DirectorAuthorize and description Stage 10: Authorized or Stage 10
             * Elseif decision is Declined, the status is set to DirectorDeclined and description Stage 10: Declined or Stage 10
             * 
             */

            if($this->request->getData('dg_reviews.100.decision') === 'Authorize') {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 10;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->dg_reviews[0]->approved_date;
                $application->application_stages = [$stage1];
                $application->status = 'DirectorAuthorize';
                $application->approved = 'DirectorAuthorize';
                $application->approved_date = date('Y-m-d', strtotime(str_replace('-', '/', $this->request->getData('dg_reviews.100.approved_date'))));
            } elseif($this->request->getData('dg_reviews.100.decision') === 'Declined') {
                $stage1  = $this->Applications->ApplicationStages->newEntity();
                $stage1->stage_id = 11;
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $application->dg_reviews[0]->approved_date;
                $application->application_stages = [$stage1];
                $application->status = 'DirectorDeclined';
                $application->approved = 'DirectorDeclined';
                $application->approved_date = date('Y-m-d', strtotime(str_replace('-', '/', $this->request->getData('dg_reviews.100.approved_date'))));
            } 

            // debug($application);
            // return;
            if ($this->Applications->save($application)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = Hash::extract($application, 'assign_evaluators.{n}.assigned_to');
                array_push($filt, 1);
                // $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);
                $managers = $this->Applications->Users->find('all', ['limit' => 200])->where(function ($exp, $query) use($filt) {
                                $orConditions = $exp->or_(['id IN' => $filt])
                                    ->eq('group_id', 2);
                                return $exp
                                    ->add($orConditions)
                                    ->add(['group_id !=' => 6])
                                    ->add(['deactivated' => 0]); 
                            });
                
                $this->loadModel('Queue.QueuedJobs');  
                //Notify director general(s)
                $secgs = $this->Applications->Users->find('all', ['limit' => 200])->where(['group_id' => 7,'deactivated' => 0]);
                foreach ($secgs as $secg) {
                    $data = [
                            'email_address' => $secg->email, 'user_id' => $secg->id,
                            'type' => 'director_general_decision_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['name'] = $secg->name;                
                    $data['vars']['decision'] = $this->request->getData('dg_reviews.100.decision');
                    $data['vars']['internal_message'] = $this->request->getData('dg_reviews.100.internal_review_comment');
                    $data['vars']['approved_date'] = $this->request->getData('dg_reviews.100.approved_date');
                    $data['vars']['user_message'] = $this->request->getData('dg_reviews.100.applicant_review_comment');
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'director_general_decision_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_director_general_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['protocol_no'] = $application->protocol_no;
                    $data['vars']['evaluator_name'] = $this->Auth->user('name');  
                    $data['vars']['decision'] = $this->request->getData('dg_reviews.100.decision');              
                    $data['vars']['internal_message'] = $this->request->getData('dg_reviews.100.internal_review_comment');
                    $data['vars']['approved_date'] = $this->request->getData('dg_reviews.100.approved_date');
                    $data['vars']['user_message'] = $this->request->getData('dg_reviews.100.applicant_review_comment');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_director_general_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //Notify Applicant 
                $applicant = $this->Applications->Users->get($application->user_id);
                $data = [
                        'email_address' => $application->email_address, 'user_id' => $application->user_id,
                        'type' => 'applicant_director_general_email', 'model' => 'Applications', 'foreign_key' => $application->id,
                ];
                $data['vars']['protocol_no'] = $application->protocol_no;
                $data['vars']['name'] = $applicant->name;                
                $data['vars']['decision'] = $this->request->getData('dg_reviews.100.decision');
                $data['vars']['approved_date'] = $this->request->getData('dg_reviews.100.approved_date');
                $data['vars']['user_message'] = $this->request->getData('dg_reviews.100.applicant_review_comment');
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_director_general_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                
                $this->Flash->success('Successful dg review of Application '.$application->protocol_no.'.');

                return $this->redirect($this->referer());
            } 
            // $this->Flash->error(__('Unable to create dg review. Please, try again.')); 
            $this->Flash->error('Unable to create dg review. Please, try again. <br>'.implode('<br>', Hash::flatten($application->errors())),
                                ['escape' => false]); 
            return $this->redirect($this->referer());
        } 
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }

    public function removeDgReview($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Applications->DgReviews->get($id);
        if ($this->Applications->DgReviews->delete($review)) {
            $this->Flash->success(__('The dg review has been removed.'));
            $app = $this->Applications->get($review->application_id, ['contain' => ['ApplicationStages']]);
            $app->approved = 'DirectorGeneral';
            $this->Applications->save($app);
            /*$stg = Hash::extract($application->application_stages, '{n}.id[stage_id=10]');
            if(!empty($stg[0])) {
                $src = $this->Applications->ApplicationStages->get($stg[0]);
                $this->Applications->ApplicationStages->delete($src);
            }*/
            foreach ($app->application_stages as $stg) {
                if($stg->stage_id == 10 || $stg->stage_id == 11) {
                    $this->Applications->ApplicationStages->delete($stg);
                }
            }
        } else {
            $this->Flash->error(__('The dg review could not be removed. Please, try again.'));
        }

        return $this->redirect($this->redirect($this->referer()));
    }


    public function certificate($id = null)
    {
        // $this->viewBuilder()->setLayout('vanilla');
        $application = $this->Applications->get($id, [
            'contain' => ['InvestigatorContacts']
        ]);

        $this->set('application', $application);
        $this->set('_serialize', ['application']);
        // $this->render('/DirectorGeneral/Applications/pdf/certificate');
    }
}

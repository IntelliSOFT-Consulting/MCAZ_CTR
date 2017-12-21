<?php
namespace App\Controller\Applicant;

use App\Controller\AppController;
use Cake\ORM\Entity;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[] paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'TrialStatuses']
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
        $application = $this->Applications->get($id, [
            'contain' => ['Users', 'TrialStatuses', 'InvestigatorContacts', 'Organizations', 'Placebos', 'PreviousDates', 'Reviewers', 'Reviews', 'SiteDetails', 'Sponsors']
        ]);

        $this->set('application', $application);
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
        $trialStatuses = $this->Applications->TrialStatuses->find('list', ['limit' => 200]);
        $this->set(compact('application', 'users', 'trialStatuses'));
        $this->set('_serialize', ['application']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    protected function _isApplicant(Entity $application) {
        if($application->user_id != $this->Auth->user('id')) {
            $this->Flash->error(__('You don\'t have permission to access this application #'.$application->id.'!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
            return false;
        } elseif ($application->submitted == 2) {
            $this->Flash->error(__('You cannot edit this application because it has been submitted to MCAZ.'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
            return false;
        } elseif ($application->deactivated) {
            $this->Flash->error(__('You cannot view this application because it has been deactivated by MCAZ.'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
            return false;
        }
        return true;
    }

    protected function _fileUploads(Entity $application) {
        // attachments
        if (!empty($this->request->data['attachments'][0]['file'])) {
          for ($i = 0; $i <= count($application->attachments)-1; $i++) { 
            $application->attachments[$i]->model = 'Applications';
            $application->attachments[$i]->category = 'attachments';
          }
        }
        // cover_letters
        if (!empty($this->request->data['cover_letters'][0]['file'])) {
          for ($i = 0; $i <= count($application->cover_letters)-1; $i++) { 
            $application->cover_letters[$i]->model = 'Applications';
            $application->cover_letters[$i]->category = 'cover_letters';
          }
        }
        // protocols
        if (!empty($this->request->data['protocols'][0]['file'])) {
          for ($i = 0; $i <= count($application->protocols)-1; $i++) { 
            $application->protocols[$i]->model = 'Applications';
            $application->protocols[$i]->category = 'protocols';
          }
        }
        // registration certificates
        if (!empty($this->request->data['registrations'][0]['file'])) {
          for ($i = 0; $i <= count($application->registrations)-1; $i++) { 
            $application->registrations[$i]->model = 'Applications';
            $application->registrations[$i]->category = 'registrations';
          }
        }
        // insurance policies
        if (!empty($this->request->data['policies'][0]['file'])) {
          for ($i = 0; $i <= count($application->policies)-1; $i++) { 
            $application->policies[$i]->model = 'Applications';
            $application->policies[$i]->category = 'policies';
          }
        }
        if (!empty($this->request->data['fees'][0]['file'])) {
          for ($i = 0; $i <= count($application->policies)-1; $i++) { 
            $application->policies[$i]->model = 'Applications';
            $application->policies[$i]->category = 'fees';
          }
        }
        if (!empty($this->request->data['fees'][0]['file'])) {
          for ($i = 0; $i <= count($application->policies)-1; $i++) { 
            $application->policies[$i]->model = 'Applications';
            $application->policies[$i]->category = 'mc10_forms';
          }
        }
        if (!empty($this->request->data['legal_forms'][0]['file'])) {
          for ($i = 0; $i <= count($application->policies)-1; $i++) { 
            $application->policies[$i]->model = 'Applications';
            $application->policies[$i]->category = 'legal_forms';
          }
        }
        return $application;
    }

    public function edit($id = null)
    {
        $application = $this->Applications->get($id, [
            'contain' => ['PreviousDates', 'InvestigatorContacts', 'Participants', 'Sponsors', 'SiteDetails', 'Placebos', 'Organizations',
                          'CoverLetters', 'Protocols', 'Attachments', 'Registrations', 'Policies', 'Committees', 'Fees', 'Mc10Forms', 'LegalForms']
        ]);
        if (empty($application)) {
            $this->Flash->error(__('The application does not exists!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        }
        // $this->_isApplicant($application);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            $application = $this->_fileUploads($application);
            // pr($application);
            // debug($this->request->data);
            if (isset($this->request->data['cancelReport'])) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$application->created.' later'));
                return $this->redirect(['controller' => 'Users','action' => 'dashboard', 'prefix' => 'applicant']);
            }

            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'edit', $application->id]);
            }
            // debug($application->errors());
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }

        $trialStatuses = $this->Applications->TrialStatuses->find('list', ['limit' => 200]);
        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('application',  'trialStatuses', 'provinces'));
        $this->set('_serialize', ['application']);

        //start
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

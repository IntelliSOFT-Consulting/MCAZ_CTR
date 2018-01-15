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

    protected $_contain = ['PreviousDates', 'InvestigatorContacts', 'Participants', 'Sponsors', 'SiteDetails', 'Placebos', 'Organizations',
                          'Medicines', 'Protocols', 'Attachments', 'Receipts', 'Registrations', 'Policies', 'Proofs', 'Committees', 'Fees', 'Mc10Forms', 'LegalForms', 'CoverLetters',
        'Leaflets',
        'Brochures',
        'InvestigatorCvs',
        'Declarations',
        'StudyMonitors',
        'MonitoringPlans',
        'PiDeclarations',
        'StudySponsorships',
        'PharmacyPlans',
        'PharmacyLicenses',
        'StudyMedicines',
        'InsuranceCertificates',
        'GenericInsurances',
        'EthicsApprovals',
        'EthicsLetters',
        'CountryApprovals',
        'Advertisments',
        'ElectronicVersions',
        'SafetyMonitors',
        'BiologicalProducts',
        'Dossiers',];
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
        // $this->viewBuilder()->setLayout('vanilla');
        $application = $this->Applications->get($id, [
            'contain' => $this->_contain
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

    public function edit($id = null)
    {
        $application = $this->Applications->get($id, [
            'contain' => $this->_contain
        ]);
        if (empty($application)) {
            $this->Flash->error(__('The application does not exists!!'));
            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant'));
        }
        // $this->_isApplicant($application);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            // $application = $this->_fileUploads($application);
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

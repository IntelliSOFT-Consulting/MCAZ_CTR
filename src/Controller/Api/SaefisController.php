<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;

/**
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[] paginate($object = null, array $settings = [])
 */
class SaefisController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SaefiListOfVaccines', 'Designations', 'Attachments', 'Reports']
        ];
        $saefis = $this->paginate($this->Saefis);

        $this->set(compact('saefis'));
        $this->set('_serialize', ['saefis']);
    }

    /**
     * View method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['SaefiListOfVaccines', 'Attachments', 'Reports']
        ]);

        
        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'designations'));
        $this->set('_serialize', ['saefi', 'designations']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saefi = $this->Saefis->newEntity();
        if ($this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->user_id = $this->Auth->user('id');
            if ($this->Saefis->save($saefi, ['validate' => false])) {
                //update field
                $query = $this->Saefis->query();
                $query->update()
                    ->set(['reference_number' => 'SAEFI'.$saefi->id.'/'.$saefi->created->i18nFormat('yyyy')])
                    ->where(['id' => $saefi->id])
                    ->execute();
                //
                $this->Flash->success(__('The saefi has been saved.'));
            }
            $this->Flash->error(__('The saefi could not be saved. Please, try again.'));
        }
        $users = $this->Saefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'users', 'designations'));
        $this->set('_serialize', ['saefi']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['SaefiListOfVaccines',  'Attachments', 'Reports']
        ]);
        if ($saefi->submitted == 2) {
            $this->set([
                    'errors' => 'report already submitted', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            if (!empty($saefi->attachments)) {
              for ($i = 0; $i <= count($saefi->attachments)-1; $i++) { 
                $saefi->attachments[$i]->model = 'Saefis';
                $saefi->attachments[$i]->category = 'attachments';
              }
            }
            // reports
            if (!empty($saefi->reports)) {
              for ($i = 0; $i <= count($saefi->reports)-1; $i++) { 
                $saefi->reports[$i]->model = 'Saefis';
                $saefi->reports[$i]->category = 'reports';
              }
            }
            
            if ($saefi->submitted == 1) {
              //save changes button
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->set([
                    'success' => 'success', 
                    'message' => 'successfully submitted report', 
                    '_serialize' => ['errors', 'message']]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == 2) {
              //submit to mcaz button
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('Report '.$saefi->reference_number.' has been successfully submitted to MCAZ for review.'));
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$saefi->reference_number.' later'));

           } else {
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$saefi->reference_number.' have been saved.'));
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }

        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'designations'));
        $this->set('_serialize', ['saefi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saefi = $this->Saefis->get($id);
        if ($this->Saefis->delete($saefi)) {
            $this->Flash->success(__('The saefi has been deleted.'));
        } else {
            $this->Flash->error(__('The saefi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

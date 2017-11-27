<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SadrFollowups Controller
 *
 * @property \App\Model\Table\SadrFollowupsTable $SadrFollowups
 *
 * @method \App\Model\Entity\SadrFollowup[] paginate($object = null, array $settings = [])
 */
class SadrFollowupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Counties', 'Sadrs', 'Designations']
        ];
        $sadrFollowups = $this->paginate($this->SadrFollowups);

        $this->set(compact('sadrFollowups'));
        $this->set('_serialize', ['sadrFollowups']);
    }

    /**
     * View method
     *
     * @param string|null $id Sadr Followup id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sadrFollowup = $this->SadrFollowups->get($id, [
            'contain' => ['Users', 'Counties', 'Sadrs', 'Designations', 'Attachments', 'Feedbacks', 'Messages', 'SadrListOfDrugs']
        ]);

        $this->set('sadrFollowup', $sadrFollowup);
        $this->set('_serialize', ['sadrFollowup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sadrFollowup = $this->SadrFollowups->newEntity();
        if ($this->request->is('post')) {
            $sadrFollowup = $this->SadrFollowups->patchEntity($sadrFollowup, $this->request->getData());
            if ($this->SadrFollowups->save($sadrFollowup)) {
                $this->Flash->success(__('The sadr followup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sadr followup could not be saved. Please, try again.'));
        }
        $users = $this->SadrFollowups->Users->find('list', ['limit' => 200]);
        $counties = $this->SadrFollowups->Counties->find('list', ['limit' => 200]);
        $sadrs = $this->SadrFollowups->Sadrs->find('list', ['limit' => 200]);
        $designations = $this->SadrFollowups->Designations->find('list', ['limit' => 200]);
        $this->set(compact('sadrFollowup', 'users', 'counties', 'sadrs', 'designations'));
        $this->set('_serialize', ['sadrFollowup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sadr Followup id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sadrFollowup = $this->SadrFollowups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sadrFollowup = $this->SadrFollowups->patchEntity($sadrFollowup, $this->request->getData());
            if ($this->SadrFollowups->save($sadrFollowup)) {
                $this->Flash->success(__('The sadr followup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sadr followup could not be saved. Please, try again.'));
        }
        $users = $this->SadrFollowups->Users->find('list', ['limit' => 200]);
        $counties = $this->SadrFollowups->Counties->find('list', ['limit' => 200]);
        $sadrs = $this->SadrFollowups->Sadrs->find('list', ['limit' => 200]);
        $designations = $this->SadrFollowups->Designations->find('list', ['limit' => 200]);
        $this->set(compact('sadrFollowup', 'users', 'counties', 'sadrs', 'designations'));
        $this->set('_serialize', ['sadrFollowup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sadr Followup id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sadrFollowup = $this->SadrFollowups->get($id);
        if ($this->SadrFollowups->delete($sadrFollowup)) {
            $this->Flash->success(__('The sadr followup has been deleted.'));
        } else {
            $this->Flash->error(__('The sadr followup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

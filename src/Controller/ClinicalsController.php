<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clinicals Controller
 *
 * @property \App\Model\Table\ClinicalsTable $Clinicals
 *
 * @method \App\Model\Entity\Clinical[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClinicalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications', 'Users', 'Clinicals']
        ];
        $clinicals = $this->paginate($this->Clinicals);

        $this->set(compact('clinicals'));
    }

    /**
     * View method
     *
     * @param string|null $id Clinical id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clinical = $this->Clinicals->get($id, [
            'contain' => ['Applications', 'Users', 'Clinicals', 'ClinicalEdits']
        ]);

        $this->set('clinical', $clinical);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clinical = $this->Clinicals->newEntity();
        if ($this->request->is('post')) {
            $clinical = $this->Clinicals->patchEntity($clinical, $this->request->getData());
            if ($this->Clinicals->save($clinical)) {
                $this->Flash->success(__('The clinical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clinical could not be saved. Please, try again.'));
        }
        $applications = $this->Clinicals->Applications->find('list', ['limit' => 200]);
        $users = $this->Clinicals->Users->find('list', ['limit' => 200]);
        $clinicals = $this->Clinicals->Clinicals->find('list', ['limit' => 200]);
        $this->set(compact('clinical', 'applications', 'users', 'clinicals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Clinical id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clinical = $this->Clinicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clinical = $this->Clinicals->patchEntity($clinical, $this->request->getData());
            if ($this->Clinicals->save($clinical)) {
                $this->Flash->success(__('The clinical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clinical could not be saved. Please, try again.'));
        }
        $applications = $this->Clinicals->Applications->find('list', ['limit' => 200]);
        $users = $this->Clinicals->Users->find('list', ['limit' => 200]);
        $clinicals = $this->Clinicals->Clinicals->find('list', ['limit' => 200]);
        $this->set(compact('clinical', 'applications', 'users', 'clinicals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Clinical id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clinical = $this->Clinicals->get($id);
        if ($this->Clinicals->delete($clinical)) {
            $this->Flash->success(__('The clinical has been deleted.'));
        } else {
            $this->Flash->error(__('The clinical could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

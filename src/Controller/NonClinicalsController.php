<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NonClinicals Controller
 *
 * @property \App\Model\Table\NonClinicalsTable $NonClinicals
 *
 * @method \App\Model\Entity\NonClinical[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NonClinicalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications', 'Users']
        ];
        $nonClinicals = $this->paginate($this->NonClinicals);

        $this->set(compact('nonClinicals'));
    }

    /**
     * View method
     *
     * @param string|null $id Non Clinical id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nonClinical = $this->NonClinicals->get($id, [
            'contain' => ['Applications', 'Users']
        ]);

        $this->set('nonClinical', $nonClinical);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nonClinical = $this->NonClinicals->newEntity();
        if ($this->request->is('post')) {
            $nonClinical = $this->NonClinicals->patchEntity($nonClinical, $this->request->getData());
            if ($this->NonClinicals->save($nonClinical)) {
                $this->Flash->success(__('The non clinical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The non clinical could not be saved. Please, try again.'));
        }
        $applications = $this->NonClinicals->Applications->find('list', ['limit' => 200]);
        $users = $this->NonClinicals->Users->find('list', ['limit' => 200]);
        $this->set(compact('nonClinical', 'applications', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Non Clinical id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nonClinical = $this->NonClinicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nonClinical = $this->NonClinicals->patchEntity($nonClinical, $this->request->getData());
            if ($this->NonClinicals->save($nonClinical)) {
                $this->Flash->success(__('The non clinical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The non clinical could not be saved. Please, try again.'));
        }
        $applications = $this->NonClinicals->Applications->find('list', ['limit' => 200]);
        $users = $this->NonClinicals->Users->find('list', ['limit' => 200]);
        $this->set(compact('nonClinical', 'applications', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Non Clinical id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nonClinical = $this->NonClinicals->get($id);
        if ($this->NonClinicals->delete($nonClinical)) {
            $this->Flash->success(__('The non clinical has been deleted.'));
        } else {
            $this->Flash->error(__('The non clinical could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

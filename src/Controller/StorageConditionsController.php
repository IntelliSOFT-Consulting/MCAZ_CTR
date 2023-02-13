<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StorageConditions Controller
 *
 * @property \App\Model\Table\StorageConditionsTable $StorageConditions
 *
 * @method \App\Model\Entity\StorageCondition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StorageConditionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications', 'Sdrugs', 'Pdrugs']
        ];
        $storageConditions = $this->paginate($this->StorageConditions);

        $this->set(compact('storageConditions'));
    }

    /**
     * View method
     *
     * @param string|null $id Storage Condition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storageCondition = $this->StorageConditions->get($id, [
            'contain' => ['Applications', 'Sdrugs', 'Pdrugs']
        ]);

        $this->set('storageCondition', $storageCondition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storageCondition = $this->StorageConditions->newEntity();
        if ($this->request->is('post')) {
            $storageCondition = $this->StorageConditions->patchEntity($storageCondition, $this->request->getData());
            if ($this->StorageConditions->save($storageCondition)) {
                $this->Flash->success(__('The storage condition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storage condition could not be saved. Please, try again.'));
        }
        $applications = $this->StorageConditions->Applications->find('list', ['limit' => 200]);
        $sdrugs = $this->StorageConditions->Sdrugs->find('list', ['limit' => 200]);
        $pdrugs = $this->StorageConditions->Pdrugs->find('list', ['limit' => 200]);
        $this->set(compact('storageCondition', 'applications', 'sdrugs', 'pdrugs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Storage Condition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storageCondition = $this->StorageConditions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storageCondition = $this->StorageConditions->patchEntity($storageCondition, $this->request->getData());
            if ($this->StorageConditions->save($storageCondition)) {
                $this->Flash->success(__('The storage condition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storage condition could not be saved. Please, try again.'));
        }
        $applications = $this->StorageConditions->Applications->find('list', ['limit' => 200]);
        $sdrugs = $this->StorageConditions->Sdrugs->find('list', ['limit' => 200]);
        $pdrugs = $this->StorageConditions->Pdrugs->find('list', ['limit' => 200]);
        $this->set(compact('storageCondition', 'applications', 'sdrugs', 'pdrugs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Storage Condition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storageCondition = $this->StorageConditions->get($id);
        if ($this->StorageConditions->delete($storageCondition)) {
            $this->Flash->success(__('The storage condition has been deleted.'));
        } else {
            $this->Flash->error(__('The storage condition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

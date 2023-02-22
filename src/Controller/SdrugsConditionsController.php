<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdrugsConditions Controller
 *
 * @property \App\Model\Table\SdrugsConditionsTable $SdrugsConditions
 *
 * @method \App\Model\Entity\SdrugsCondition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdrugsConditionsController extends AppController
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
        $sdrugsConditions = $this->paginate($this->SdrugsConditions);

        $this->set(compact('sdrugsConditions'));
    }

    /**
     * View method
     *
     * @param string|null $id Sdrugs Condition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdrugsCondition = $this->SdrugsConditions->get($id, [
            'contain' => ['Applications', 'Sdrugs', 'Pdrugs']
        ]);

        $this->set('sdrugsCondition', $sdrugsCondition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdrugsCondition = $this->SdrugsConditions->newEntity();
        if ($this->request->is('post')) {
            $sdrugsCondition = $this->SdrugsConditions->patchEntity($sdrugsCondition, $this->request->getData());
            if ($this->SdrugsConditions->save($sdrugsCondition)) {
                $this->Flash->success(__('The sdrugs condition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sdrugs condition could not be saved. Please, try again.'));
        }
        $applications = $this->SdrugsConditions->Applications->find('list', ['limit' => 200]);
        $sdrugs = $this->SdrugsConditions->Sdrugs->find('list', ['limit' => 200]);
        $pdrugs = $this->SdrugsConditions->Pdrugs->find('list', ['limit' => 200]);
        $this->set(compact('sdrugsCondition', 'applications', 'sdrugs', 'pdrugs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sdrugs Condition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdrugsCondition = $this->SdrugsConditions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdrugsCondition = $this->SdrugsConditions->patchEntity($sdrugsCondition, $this->request->getData());
            if ($this->SdrugsConditions->save($sdrugsCondition)) {
                $this->Flash->success(__('The sdrugs condition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sdrugs condition could not be saved. Please, try again.'));
        }
        $applications = $this->SdrugsConditions->Applications->find('list', ['limit' => 200]);
        $sdrugs = $this->SdrugsConditions->Sdrugs->find('list', ['limit' => 200]);
        $pdrugs = $this->SdrugsConditions->Pdrugs->find('list', ['limit' => 200]);
        $this->set(compact('sdrugsCondition', 'applications', 'sdrugs', 'pdrugs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sdrugs Condition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdrugsCondition = $this->SdrugsConditions->get($id);
        if ($this->SdrugsConditions->delete($sdrugsCondition)) {
            $this->Flash->success(__('The sdrugs condition has been deleted.'));
        } else {
            $this->Flash->error(__('The sdrugs condition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

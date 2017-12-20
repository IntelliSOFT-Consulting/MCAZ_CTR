<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TrialStatuses Controller
 *
 * @property \App\Model\Table\TrialStatusesTable $TrialStatuses
 *
 * @method \App\Model\Entity\TrialStatus[] paginate($object = null, array $settings = [])
 */
class TrialStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $trialStatuses = $this->paginate($this->TrialStatuses);

        $this->set(compact('trialStatuses'));
        $this->set('_serialize', ['trialStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Trial Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trialStatus = $this->TrialStatuses->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('trialStatus', $trialStatus);
        $this->set('_serialize', ['trialStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trialStatus = $this->TrialStatuses->newEntity();
        if ($this->request->is('post')) {
            $trialStatus = $this->TrialStatuses->patchEntity($trialStatus, $this->request->getData());
            if ($this->TrialStatuses->save($trialStatus)) {
                $this->Flash->success(__('The trial status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trial status could not be saved. Please, try again.'));
        }
        $this->set(compact('trialStatus'));
        $this->set('_serialize', ['trialStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trial Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trialStatus = $this->TrialStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trialStatus = $this->TrialStatuses->patchEntity($trialStatus, $this->request->getData());
            if ($this->TrialStatuses->save($trialStatus)) {
                $this->Flash->success(__('The trial status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trial status could not be saved. Please, try again.'));
        }
        $this->set(compact('trialStatus'));
        $this->set('_serialize', ['trialStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trial Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trialStatus = $this->TrialStatuses->get($id);
        if ($this->TrialStatuses->delete($trialStatus)) {
            $this->Flash->success(__('The trial status has been deleted.'));
        } else {
            $this->Flash->error(__('The trial status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

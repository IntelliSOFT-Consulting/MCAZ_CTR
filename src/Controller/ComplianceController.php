<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Compliance Controller
 *
 * @property \App\Model\Table\ComplianceTable $Compliance
 *
 * @method \App\Model\Entity\Compliance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComplianceController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications', 'QualityAssessments']
        ];
        $compliance = $this->paginate($this->Compliance);

        $this->set(compact('compliance'));
    }

    /**
     * View method
     *
     * @param string|null $id Compliance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compliance = $this->Compliance->get($id, [
            'contain' => ['Applications', 'QualityAssessments']
        ]);

        $this->set('compliance', $compliance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compliance = $this->Compliance->newEntity();
        if ($this->request->is('post')) {
            $compliance = $this->Compliance->patchEntity($compliance, $this->request->getData());
            if ($this->Compliance->save($compliance)) {
                $this->Flash->success(__('The compliance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The compliance could not be saved. Please, try again.'));
        }
        $applications = $this->Compliance->Applications->find('list', ['limit' => 200]);
        $qualityAssessments = $this->Compliance->QualityAssessments->find('list', ['limit' => 200]);
        $this->set(compact('compliance', 'applications', 'qualityAssessments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Compliance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compliance = $this->Compliance->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compliance = $this->Compliance->patchEntity($compliance, $this->request->getData());
            if ($this->Compliance->save($compliance)) {
                $this->Flash->success(__('The compliance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The compliance could not be saved. Please, try again.'));
        }
        $applications = $this->Compliance->Applications->find('list', ['limit' => 200]);
        $qualityAssessments = $this->Compliance->QualityAssessments->find('list', ['limit' => 200]);
        $this->set(compact('compliance', 'applications', 'qualityAssessments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Compliance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compliance = $this->Compliance->get($id);
        if ($this->Compliance->delete($compliance)) {
            $this->Flash->success(__('The compliance has been deleted.'));
        } else {
            $this->Flash->error(__('The compliance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

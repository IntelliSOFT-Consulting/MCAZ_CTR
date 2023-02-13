<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pdrugs Controller
 *
 * @property \App\Model\Table\PdrugsTable $Pdrugs
 *
 * @method \App\Model\Entity\Pdrug[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PdrugsController extends AppController
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
        $pdrugs = $this->paginate($this->Pdrugs);

        $this->set(compact('pdrugs'));
    }

    /**
     * View method
     *
     * @param string|null $id Pdrug id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pdrug = $this->Pdrugs->get($id, [
            'contain' => ['Applications', 'QualityAssessments', 'StorageConditions']
        ]);

        $this->set('pdrug', $pdrug);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pdrug = $this->Pdrugs->newEntity();
        if ($this->request->is('post')) {
            $pdrug = $this->Pdrugs->patchEntity($pdrug, $this->request->getData());
            if ($this->Pdrugs->save($pdrug)) {
                $this->Flash->success(__('The pdrug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pdrug could not be saved. Please, try again.'));
        }
        $applications = $this->Pdrugs->Applications->find('list', ['limit' => 200]);
        $qualityAssessments = $this->Pdrugs->QualityAssessments->find('list', ['limit' => 200]);
        $this->set(compact('pdrug', 'applications', 'qualityAssessments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pdrug id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pdrug = $this->Pdrugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pdrug = $this->Pdrugs->patchEntity($pdrug, $this->request->getData());
            if ($this->Pdrugs->save($pdrug)) {
                $this->Flash->success(__('The pdrug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pdrug could not be saved. Please, try again.'));
        }
        $applications = $this->Pdrugs->Applications->find('list', ['limit' => 200]);
        $qualityAssessments = $this->Pdrugs->QualityAssessments->find('list', ['limit' => 200]);
        $this->set(compact('pdrug', 'applications', 'qualityAssessments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pdrug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pdrug = $this->Pdrugs->get($id);
        if ($this->Pdrugs->delete($pdrug)) {
            $this->Flash->success(__('The pdrug has been deleted.'));
        } else {
            $this->Flash->error(__('The pdrug could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

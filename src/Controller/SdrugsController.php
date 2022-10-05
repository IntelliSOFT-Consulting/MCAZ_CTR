<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sdrugs Controller
 *
 * @property \App\Model\Table\SdrugsTable $Sdrugs
 *
 * @method \App\Model\Entity\Sdrug[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdrugsController extends AppController
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
        $sdrugs = $this->paginate($this->Sdrugs);

        $this->set(compact('sdrugs'));
    }

    /**
     * View method
     *
     * @param string|null $id Sdrug id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdrug = $this->Sdrugs->get($id, [
            'contain' => ['Applications', 'QualityAssessments']
        ]);

        $this->set('sdrug', $sdrug);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdrug = $this->Sdrugs->newEntity();
        if ($this->request->is('post')) {
            $sdrug = $this->Sdrugs->patchEntity($sdrug, $this->request->getData());
            if ($this->Sdrugs->save($sdrug)) {
                $this->Flash->success(__('The sdrug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sdrug could not be saved. Please, try again.'));
        }
        $applications = $this->Sdrugs->Applications->find('list', ['limit' => 200]);
        $qualityAssessments = $this->Sdrugs->QualityAssessments->find('list', ['limit' => 200]);
        $this->set(compact('sdrug', 'applications', 'qualityAssessments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sdrug id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdrug = $this->Sdrugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdrug = $this->Sdrugs->patchEntity($sdrug, $this->request->getData());
            if ($this->Sdrugs->save($sdrug)) {
                $this->Flash->success(__('The sdrug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sdrug could not be saved. Please, try again.'));
        }
        $applications = $this->Sdrugs->Applications->find('list', ['limit' => 200]);
        $qualityAssessments = $this->Sdrugs->QualityAssessments->find('list', ['limit' => 200]);
        $this->set(compact('sdrug', 'applications', 'qualityAssessments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sdrug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdrug = $this->Sdrugs->get($id);
        if ($this->Sdrugs->delete($sdrug)) {
            $this->Flash->success(__('The sdrug has been deleted.'));
        } else {
            $this->Flash->error(__('The sdrug could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QualityAssessments Controller
 *
 * @property \App\Model\Table\QualityAssessmentsTable $QualityAssessments
 *
 * @method \App\Model\Entity\QualityAssessment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QualityAssessmentsController extends AppController
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
        $qualityAssessments = $this->paginate($this->QualityAssessments);

        $this->set(compact('qualityAssessments'));
    }

    /**
     * View method
     *
     * @param string|null $id Quality Assessment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qualityAssessment = $this->QualityAssessments->get($id, [
            'contain' => ['Applications', 'Users', 'QualityAssessments', 'Compliance', 'Pdrugs', 'Sdrugs']
        ]);

        $this->set('qualityAssessment', $qualityAssessment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qualityAssessment = $this->QualityAssessments->newEntity();
        if ($this->request->is('post')) {
            $qualityAssessment = $this->QualityAssessments->patchEntity($qualityAssessment, $this->request->getData());
            if ($this->QualityAssessments->save($qualityAssessment)) {
                $this->Flash->success(__('The quality assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quality assessment could not be saved. Please, try again.'));
        }
        $applications = $this->QualityAssessments->Applications->find('list', ['limit' => 200]);
        $users = $this->QualityAssessments->Users->find('list', ['limit' => 200]);
        $this->set(compact('qualityAssessment', 'applications', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quality Assessment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qualityAssessment = $this->QualityAssessments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qualityAssessment = $this->QualityAssessments->patchEntity($qualityAssessment, $this->request->getData());
            if ($this->QualityAssessments->save($qualityAssessment)) {
                $this->Flash->success(__('The quality assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quality assessment could not be saved. Please, try again.'));
        }
        $applications = $this->QualityAssessments->Applications->find('list', ['limit' => 200]);
        $users = $this->QualityAssessments->Users->find('list', ['limit' => 200]);
        $this->set(compact('qualityAssessment', 'applications', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quality Assessment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qualityAssessment = $this->QualityAssessments->get($id);
        if ($this->QualityAssessments->delete($qualityAssessment)) {
            $this->Flash->success(__('The quality assessment has been deleted.'));
        } else {
            $this->Flash->error(__('The quality assessment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

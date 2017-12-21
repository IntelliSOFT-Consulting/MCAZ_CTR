<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Committees Controller
 *
 * @property \App\Model\Table\CommitteesTable $Committees
 *
 * @method \App\Model\Entity\Committee[] paginate($object = null, array $settings = [])
 */
class CommitteesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications']
        ];
        $committees = $this->paginate($this->Committees);

        $this->set(compact('committees'));
        $this->set('_serialize', ['committees']);
    }

    /**
     * View method
     *
     * @param string|null $id Committee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $committee = $this->Committees->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('committee', $committee);
        $this->set('_serialize', ['committee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $committee = $this->Committees->newEntity();
        if ($this->request->is('post')) {
            $committee = $this->Committees->patchEntity($committee, $this->request->getData());
            if ($this->Committees->save($committee)) {
                $this->Flash->success(__('The committee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The committee could not be saved. Please, try again.'));
        }
        $applications = $this->Committees->Applications->find('list', ['limit' => 200]);
        $this->set(compact('committee', 'applications'));
        $this->set('_serialize', ['committee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Committee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $committee = $this->Committees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $committee = $this->Committees->patchEntity($committee, $this->request->getData());
            if ($this->Committees->save($committee)) {
                $this->Flash->success(__('The committee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The committee could not be saved. Please, try again.'));
        }
        $applications = $this->Committees->Applications->find('list', ['limit' => 200]);
        $this->set(compact('committee', 'applications'));
        $this->set('_serialize', ['committee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Committee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $committee = $this->Committees->get($id);
        if ($this->Committees->delete($committee)) {
            $this->Flash->success(__('The committee has been deleted.'));
        } else {
            $this->Flash->error(__('The committee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

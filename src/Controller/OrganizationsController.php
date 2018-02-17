<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organizations Controller
 *
 * @property \App\Model\Table\OrganizationsTable $Organizations
 *
 * @method \App\Model\Entity\Organization[] paginate($object = null, array $settings = [])
 */
class OrganizationsController extends AppController
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
        $organizations = $this->paginate($this->Organizations);

        $this->set(compact('organizations'));
        $this->set('_serialize', ['organizations']);
    }

    /**
     * View method
     *
     * @param string|null $id Organization id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organization = $this->Organizations->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('organization', $organization);
        $this->set('_serialize', ['organization']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organization = $this->Organizations->newEntity();
        if ($this->request->is('post')) {
            $organization = $this->Organizations->patchEntity($organization, $this->request->getData());
            if ($this->Organizations->save($organization)) {
                $this->Flash->success(__('The organization has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organization could not be saved. Please, try again.'));
        }
        $applications = $this->Organizations->Applications->find('list', ['limit' => 200]);
        $this->set(compact('organization', 'applications'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Organization id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organization = $this->Organizations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organization = $this->Organizations->patchEntity($organization, $this->request->getData());
            if ($this->Organizations->save($organization)) {
                $this->Flash->success(__('The organization has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organization could not be saved. Please, try again.'));
        }
        $applications = $this->Organizations->Applications->find('list', ['limit' => 200]);
        $this->set(compact('organization', 'applications'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Organization id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organization = $this->Organizations->get($id);
        if ($this->Organizations->delete($organization)) {
            $this->Flash->success(__('The organization has been deleted.'));
        } else {
            $this->Flash->error(__('The organization could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

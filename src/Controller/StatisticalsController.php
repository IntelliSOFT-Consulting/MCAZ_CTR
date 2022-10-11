<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Statisticals Controller
 *
 * @property \App\Model\Table\StatisticalsTable $Statisticals
 *
 * @method \App\Model\Entity\Statistical[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatisticalsController extends AppController
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
        $statisticals = $this->paginate($this->Statisticals);

        $this->set(compact('statisticals'));
    }

    /**
     * View method
     *
     * @param string|null $id Statistical id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $statistical = $this->Statisticals->get($id, [
            'contain' => ['Applications', 'Users']
        ]);

        $this->set('statistical', $statistical);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $statistical = $this->Statisticals->newEntity();
        if ($this->request->is('post')) {
            $statistical = $this->Statisticals->patchEntity($statistical, $this->request->getData());
            if ($this->Statisticals->save($statistical)) {
                $this->Flash->success(__('The statistical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The statistical could not be saved. Please, try again.'));
        }
        $applications = $this->Statisticals->Applications->find('list', ['limit' => 200]);
        $users = $this->Statisticals->Users->find('list', ['limit' => 200]);
        $this->set(compact('statistical', 'applications', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Statistical id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $statistical = $this->Statisticals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $statistical = $this->Statisticals->patchEntity($statistical, $this->request->getData());
            if ($this->Statisticals->save($statistical)) {
                $this->Flash->success(__('The statistical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The statistical could not be saved. Please, try again.'));
        }
        $applications = $this->Statisticals->Applications->find('list', ['limit' => 200]);
        $users = $this->Statisticals->Users->find('list', ['limit' => 200]);
        $this->set(compact('statistical', 'applications', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Statistical id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $statistical = $this->Statisticals->get($id);
        if ($this->Statisticals->delete($statistical)) {
            $this->Flash->success(__('The statistical has been deleted.'));
        } else {
            $this->Flash->error(__('The statistical could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Quality Controller
 *
 * @property \App\Model\Table\QualityTable $Quality
 *
 * @method \App\Model\Entity\Quality[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QualityController extends AppController
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
        $quality = $this->paginate($this->Quality);

        $this->set(compact('quality'));
    }

    /**
     * View method
     *
     * @param string|null $id Quality id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quality = $this->Quality->get($id, [
            'contain' => ['Applications', 'Users']
        ]);

        $this->set('quality', $quality);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quality = $this->Quality->newEntity();
        if ($this->request->is('post')) {
            $quality = $this->Quality->patchEntity($quality, $this->request->getData());
            if ($this->Quality->save($quality)) {
                $this->Flash->success(__('The quality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quality could not be saved. Please, try again.'));
        }
        $applications = $this->Quality->Applications->find('list', ['limit' => 200]);
        $users = $this->Quality->Users->find('list', ['limit' => 200]);
        $this->set(compact('quality', 'applications', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quality id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quality = $this->Quality->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quality = $this->Quality->patchEntity($quality, $this->request->getData());
            if ($this->Quality->save($quality)) {
                $this->Flash->success(__('The quality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quality could not be saved. Please, try again.'));
        }
        $applications = $this->Quality->Applications->find('list', ['limit' => 200]);
        $users = $this->Quality->Users->find('list', ['limit' => 200]);
        $this->set(compact('quality', 'applications', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quality id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quality = $this->Quality->get($id);
        if ($this->Quality->delete($quality)) {
            $this->Flash->success(__('The quality has been deleted.'));
        } else {
            $this->Flash->error(__('The quality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

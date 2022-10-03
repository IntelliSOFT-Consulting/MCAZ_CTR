<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Refids Controller
 *
 * @property \App\Model\Table\RefidsTable $Refids
 *
 * @method \App\Model\Entity\Refid[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefidsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $refids = $this->paginate($this->Refids);

        $this->set(compact('refids'));
    }

    /**
     * View method
     *
     * @param string|null $id Refid id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refid = $this->Refids->get($id, [
            'contain' => []
        ]);

        $this->set('refid', $refid);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refid = $this->Refids->newEntity();
        if ($this->request->is('post')) {
            $refid = $this->Refids->patchEntity($refid, $this->request->getData());
            if ($this->Refids->save($refid)) {
                $this->Flash->success(__('The refid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refid could not be saved. Please, try again.'));
        }
        $this->set(compact('refid'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Refid id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refid = $this->Refids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refid = $this->Refids->patchEntity($refid, $this->request->getData());
            if ($this->Refids->save($refid)) {
                $this->Flash->success(__('The refid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refid could not be saved. Please, try again.'));
        }
        $this->set(compact('refid'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Refid id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refid = $this->Refids->get($id);
        if ($this->Refids->delete($refid)) {
            $this->Flash->success(__('The refid has been deleted.'));
        } else {
            $this->Flash->error(__('The refid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

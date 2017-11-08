<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HelpInfos Controller
 *
 * @property \App\Model\Table\HelpInfosTable $HelpInfos
 *
 * @method \App\Model\Entity\HelpInfo[] paginate($object = null, array $settings = [])
 */
class HelpInfosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $helpInfos = $this->paginate($this->HelpInfos);

        $this->set(compact('helpInfos'));
        $this->set('_serialize', ['helpInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Help Info id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $helpInfo = $this->HelpInfos->get($id, [
            'contain' => []
        ]);

        $this->set('helpInfo', $helpInfo);
        $this->set('_serialize', ['helpInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $helpInfo = $this->HelpInfos->newEntity();
        if ($this->request->is('post')) {
            $helpInfo = $this->HelpInfos->patchEntity($helpInfo, $this->request->getData());
            if ($this->HelpInfos->save($helpInfo)) {
                $this->Flash->success(__('The help info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The help info could not be saved. Please, try again.'));
        }
        $this->set(compact('helpInfo'));
        $this->set('_serialize', ['helpInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Help Info id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $helpInfo = $this->HelpInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $helpInfo = $this->HelpInfos->patchEntity($helpInfo, $this->request->getData());
            if ($this->HelpInfos->save($helpInfo)) {
                $this->Flash->success(__('The help info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The help info could not be saved. Please, try again.'));
        }
        $this->set(compact('helpInfo'));
        $this->set('_serialize', ['helpInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Help Info id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $helpInfo = $this->HelpInfos->get($id);
        if ($this->HelpInfos->delete($helpInfo)) {
            $this->Flash->success(__('The help info has been deleted.'));
        } else {
            $this->Flash->error(__('The help info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

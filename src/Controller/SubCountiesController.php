<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SubCounties Controller
 *
 * @property \App\Model\Table\SubCountiesTable $SubCounties
 *
 * @method \App\Model\Entity\SubCounty[] paginate($object = null, array $settings = [])
 */
class SubCountiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Counties']
        ];
        $subCounties = $this->paginate($this->SubCounties);

        $this->set(compact('subCounties'));
        $this->set('_serialize', ['subCounties']);
    }

    /**
     * View method
     *
     * @param string|null $id Sub County id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subCounty = $this->SubCounties->get($id, [
            'contain' => ['Counties', 'Pqmps', 'Sadrs']
        ]);

        $this->set('subCounty', $subCounty);
        $this->set('_serialize', ['subCounty']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subCounty = $this->SubCounties->newEntity();
        if ($this->request->is('post')) {
            $subCounty = $this->SubCounties->patchEntity($subCounty, $this->request->getData());
            if ($this->SubCounties->save($subCounty)) {
                $this->Flash->success(__('The sub county has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sub county could not be saved. Please, try again.'));
        }
        $counties = $this->SubCounties->Counties->find('list', ['limit' => 200]);
        $this->set(compact('subCounty', 'counties'));
        $this->set('_serialize', ['subCounty']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sub County id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subCounty = $this->SubCounties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subCounty = $this->SubCounties->patchEntity($subCounty, $this->request->getData());
            if ($this->SubCounties->save($subCounty)) {
                $this->Flash->success(__('The sub county has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sub county could not be saved. Please, try again.'));
        }
        $counties = $this->SubCounties->Counties->find('list', ['limit' => 200]);
        $this->set(compact('subCounty', 'counties'));
        $this->set('_serialize', ['subCounty']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sub County id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subCounty = $this->SubCounties->get($id);
        if ($this->SubCounties->delete($subCounty)) {
            $this->Flash->success(__('The sub county has been deleted.'));
        } else {
            $this->Flash->error(__('The sub county could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

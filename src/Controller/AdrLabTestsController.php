<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdrLabTests Controller
 *
 * @property \App\Model\Table\AdrLabTestsTable $AdrLabTests
 *
 * @method \App\Model\Entity\AdrLabTest[] paginate($object = null, array $settings = [])
 */
class AdrLabTestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Adrs']
        ];
        $adrLabTests = $this->paginate($this->AdrLabTests);

        $this->set(compact('adrLabTests'));
        $this->set('_serialize', ['adrLabTests']);
    }

    /**
     * View method
     *
     * @param string|null $id Adr Lab Test id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adrLabTest = $this->AdrLabTests->get($id, [
            'contain' => ['Adrs']
        ]);

        $this->set('adrLabTest', $adrLabTest);
        $this->set('_serialize', ['adrLabTest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adrLabTest = $this->AdrLabTests->newEntity();
        if ($this->request->is('post')) {
            $adrLabTest = $this->AdrLabTests->patchEntity($adrLabTest, $this->request->getData());
            if ($this->AdrLabTests->save($adrLabTest)) {
                $this->Flash->success(__('The adr lab test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adr lab test could not be saved. Please, try again.'));
        }
        $adrs = $this->AdrLabTests->Adrs->find('list', ['limit' => 200]);
        $this->set(compact('adrLabTest', 'adrs'));
        $this->set('_serialize', ['adrLabTest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adr Lab Test id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adrLabTest = $this->AdrLabTests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adrLabTest = $this->AdrLabTests->patchEntity($adrLabTest, $this->request->getData());
            if ($this->AdrLabTests->save($adrLabTest)) {
                $this->Flash->success(__('The adr lab test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adr lab test could not be saved. Please, try again.'));
        }
        $adrs = $this->AdrLabTests->Adrs->find('list', ['limit' => 200]);
        $this->set(compact('adrLabTest', 'adrs'));
        $this->set('_serialize', ['adrLabTest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adr Lab Test id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $adrLabTest = $this->AdrLabTests->get($this->request->data['id']);
        if ($this->AdrLabTests->delete($adrLabTest)) {
            $this->Flash->success(__('The adr lab test has been deleted.'));
        } else {
            $this->Flash->error(__('The adr lab test could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

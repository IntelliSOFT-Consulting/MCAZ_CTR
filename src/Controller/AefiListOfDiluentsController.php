<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AefiListOfDiluents Controller
 *
 * @property \App\Model\Table\AefiListOfDiluentsTable $AefiListOfDiluents
 *
 * @method \App\Model\Entity\AefiListOfDiluent[] paginate($object = null, array $settings = [])
 */
class AefiListOfDiluentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Aefis']
        ];
        $aefiListOfDiluents = $this->paginate($this->AefiListOfDiluents);

        $this->set(compact('aefiListOfDiluents'));
        $this->set('_serialize', ['aefiListOfDiluents']);
    }

    /**
     * View method
     *
     * @param string|null $id Aefi List Of Diluent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aefiListOfDiluent = $this->AefiListOfDiluents->get($id, [
            'contain' => ['Aefis']
        ]);

        $this->set('aefiListOfDiluent', $aefiListOfDiluent);
        $this->set('_serialize', ['aefiListOfDiluent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aefiListOfDiluent = $this->AefiListOfDiluents->newEntity();
        if ($this->request->is('post')) {
            $aefiListOfDiluent = $this->AefiListOfDiluents->patchEntity($aefiListOfDiluent, $this->request->getData());
            if ($this->AefiListOfDiluents->save($aefiListOfDiluent)) {
                $this->Flash->success(__('The aefi list of diluent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aefi list of diluent could not be saved. Please, try again.'));
        }
        $aefis = $this->AefiListOfDiluents->Aefis->find('list', ['limit' => 200]);
        $this->set(compact('aefiListOfDiluent', 'aefis'));
        $this->set('_serialize', ['aefiListOfDiluent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Aefi List Of Diluent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aefiListOfDiluent = $this->AefiListOfDiluents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefiListOfDiluent = $this->AefiListOfDiluents->patchEntity($aefiListOfDiluent, $this->request->getData());
            if ($this->AefiListOfDiluents->save($aefiListOfDiluent)) {
                $this->Flash->success(__('The aefi list of diluent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aefi list of diluent could not be saved. Please, try again.'));
        }
        $aefis = $this->AefiListOfDiluents->Aefis->find('list', ['limit' => 200]);
        $this->set(compact('aefiListOfDiluent', 'aefis'));
        $this->set('_serialize', ['aefiListOfDiluent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aefi List Of Diluent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $aefiListOfDiluent = $this->AefiListOfDiluents->get($this->request->data['id']);
        if ($this->AefiListOfDiluents->delete($aefiListOfDiluent)) {
            $this->Flash->success(__('The aefi list of diluent has been deleted.'));
        } else {
            $this->Flash->error(__('The aefi list of diluent could not be deleted. Please, try again.'));
        }

    }
}

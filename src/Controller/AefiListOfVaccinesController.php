<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AefiListOfVaccines Controller
 *
 * @property \App\Model\Table\AefiListOfVaccinesTable $AefiListOfVaccines
 *
 * @method \App\Model\Entity\AefiListOfVaccine[] paginate($object = null, array $settings = [])
 */
class AefiListOfVaccinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Aefis', 'Doses']
        ];
        $aefiListOfVaccines = $this->paginate($this->AefiListOfVaccines);

        $this->set(compact('aefiListOfVaccines'));
        $this->set('_serialize', ['aefiListOfVaccines']);
    }

    /**
     * View method
     *
     * @param string|null $id Aefi List Of Vaccine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aefiListOfVaccine = $this->AefiListOfVaccines->get($id, [
            'contain' => ['Aefis', 'Doses']
        ]);

        $this->set('aefiListOfVaccine', $aefiListOfVaccine);
        $this->set('_serialize', ['aefiListOfVaccine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aefiListOfVaccine = $this->AefiListOfVaccines->newEntity();
        if ($this->request->is('post')) {
            $aefiListOfVaccine = $this->AefiListOfVaccines->patchEntity($aefiListOfVaccine, $this->request->getData());
            if ($this->AefiListOfVaccines->save($aefiListOfVaccine)) {
                $this->Flash->success(__('The aefi list of vaccine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aefi list of vaccine could not be saved. Please, try again.'));
        }
        $aefis = $this->AefiListOfVaccines->Aefis->find('list', ['limit' => 200]);
        $doses = $this->AefiListOfVaccines->Doses->find('list', ['limit' => 200]);
        $this->set(compact('aefiListOfVaccine', 'aefis', 'doses'));
        $this->set('_serialize', ['aefiListOfVaccine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Aefi List Of Vaccine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aefiListOfVaccine = $this->AefiListOfVaccines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefiListOfVaccine = $this->AefiListOfVaccines->patchEntity($aefiListOfVaccine, $this->request->getData());
            if ($this->AefiListOfVaccines->save($aefiListOfVaccine)) {
                $this->Flash->success(__('The aefi list of vaccine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aefi list of vaccine could not be saved. Please, try again.'));
        }
        $aefis = $this->AefiListOfVaccines->Aefis->find('list', ['limit' => 200]);
        $doses = $this->AefiListOfVaccines->Doses->find('list', ['limit' => 200]);
        $this->set(compact('aefiListOfVaccine', 'aefis', 'doses'));
        $this->set('_serialize', ['aefiListOfVaccine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aefi List Of Vaccine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $aefiListOfVaccine = $this->AefiListOfVaccines->get($this->request->data['id']);
        if ($this->AefiListOfVaccines->delete($aefiListOfVaccine)) {
            // $this->Flash->success(__('The aefi list of vaccine has been deleted.'));
            $aefiListOfVaccine['message'] = 'success';
            $this->set('aefiListOfVaccine', $aefiListOfVaccine);
            $this->set('_serialize', ['aefiListOfVaccine']);
        } else {
            // $this->Flash->error(__('The aefi list of vaccine could not be deleted. Please, try again.'));
            $aefiListOfVaccine['message'] = 'fail';
            $this->set('aefiListOfVaccine', $aefiListOfVaccine);
            $this->set('_serialize', ['aefiListOfVaccine']);
        }

    }
}

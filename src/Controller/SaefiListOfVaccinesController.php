<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SaefiListOfVaccines Controller
 *
 * @property \App\Model\Table\SaefiListOfVaccinesTable $SaefiListOfVaccines
 *
 * @method \App\Model\Entity\SaefiListOfVaccine[] paginate($object = null, array $settings = [])
 */
class SaefiListOfVaccinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Saefis']
        ];
        $saefiListOfVaccines = $this->paginate($this->SaefiListOfVaccines);

        $this->set(compact('saefiListOfVaccines'));
        $this->set('_serialize', ['saefiListOfVaccines']);
    }

    /**
     * View method
     *
     * @param string|null $id Saefi List Of Vaccine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saefiListOfVaccine = $this->SaefiListOfVaccines->get($id, [
            'contain' => ['Saefis']
        ]);

        $this->set('saefiListOfVaccine', $saefiListOfVaccine);
        $this->set('_serialize', ['saefiListOfVaccine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saefiListOfVaccine = $this->SaefiListOfVaccines->newEntity();
        if ($this->request->is('post')) {
            $saefiListOfVaccine = $this->SaefiListOfVaccines->patchEntity($saefiListOfVaccine, $this->request->getData());
            if ($this->SaefiListOfVaccines->save($saefiListOfVaccine)) {
                $this->Flash->success(__('The saefi list of vaccine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saefi list of vaccine could not be saved. Please, try again.'));
        }
        $saefis = $this->SaefiListOfVaccines->Saefis->find('list', ['limit' => 200]);
        $this->set(compact('saefiListOfVaccine', 'saefis'));
        $this->set('_serialize', ['saefiListOfVaccine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Saefi List Of Vaccine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saefiListOfVaccine = $this->SaefiListOfVaccines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saefiListOfVaccine = $this->SaefiListOfVaccines->patchEntity($saefiListOfVaccine, $this->request->getData());
            if ($this->SaefiListOfVaccines->save($saefiListOfVaccine)) {
                $this->Flash->success(__('The saefi list of vaccine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saefi list of vaccine could not be saved. Please, try again.'));
        }
        $saefis = $this->SaefiListOfVaccines->Saefis->find('list', ['limit' => 200]);
        $this->set(compact('saefiListOfVaccine', 'saefis'));
        $this->set('_serialize', ['saefiListOfVaccine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Saefi List Of Vaccine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saefiListOfVaccine = $this->SaefiListOfVaccines->get($id);
        if ($this->SaefiListOfVaccines->delete($saefiListOfVaccine)) {
            $this->Flash->success(__('The saefi list of vaccine has been deleted.'));
        } else {
            $this->Flash->error(__('The saefi list of vaccine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

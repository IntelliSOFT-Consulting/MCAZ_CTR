<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Medicines Controller
 *
 * @property \App\Model\Table\MedicinesTable $Medicines
 *
 * @method \App\Model\Entity\Medicine[] paginate($object = null, array $settings = [])
 */
class MedicinesController extends AppController
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
        $medicines = $this->paginate($this->Medicines);

        $this->set(compact('medicines'));
        $this->set('_serialize', ['medicines']);
    }

    /**
     * View method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicine = $this->Medicines->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('medicine', $medicine);
        $this->set('_serialize', ['medicine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicine = $this->Medicines->newEntity();
        if ($this->request->is('post')) {
            $medicine = $this->Medicines->patchEntity($medicine, $this->request->getData());
            if ($this->Medicines->save($medicine)) {
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $applications = $this->Medicines->Applications->find('list', ['limit' => 200]);
        $this->set(compact('medicine', 'applications'));
        $this->set('_serialize', ['medicine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicine = $this->Medicines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicine = $this->Medicines->patchEntity($medicine, $this->request->getData());
            if ($this->Medicines->save($medicine)) {
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $applications = $this->Medicines->Applications->find('list', ['limit' => 200]);
        $this->set(compact('medicine', 'applications'));
        $this->set('_serialize', ['medicine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicine = $this->Medicines->get($id);
        if ($this->Medicines->delete($medicine)) {
            $this->Flash->success(__('The medicine has been deleted.'));
        } else {
            $this->Flash->error(__('The medicine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

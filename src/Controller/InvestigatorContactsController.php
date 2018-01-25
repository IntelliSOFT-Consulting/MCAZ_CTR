<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InvestigatorContacts Controller
 *
 * @property \App\Model\Table\InvestigatorContactsTable $InvestigatorContacts
 *
 * @method \App\Model\Entity\InvestigatorContact[] paginate($object = null, array $settings = [])
 */
class InvestigatorContactsController extends AppController
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
        $investigatorContacts = $this->paginate($this->InvestigatorContacts);

        $this->set(compact('investigatorContacts'));
        $this->set('_serialize', ['investigatorContacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Investigator Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $investigatorContact = $this->InvestigatorContacts->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('investigatorContact', $investigatorContact);
        $this->set('_serialize', ['investigatorContact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $investigatorContact = $this->InvestigatorContacts->newEntity();
        if ($this->request->is('post')) {
            $investigatorContact = $this->InvestigatorContacts->patchEntity($investigatorContact, $this->request->getData());
            if ($this->InvestigatorContacts->save($investigatorContact)) {
                $this->Flash->success(__('The investigator contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The investigator contact could not be saved. Please, try again.'));
        }
        $applications = $this->InvestigatorContacts->Applications->find('list', ['limit' => 200]);
        $this->set(compact('investigatorContact', 'applications'));
        $this->set('_serialize', ['investigatorContact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Investigator Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $investigatorContact = $this->InvestigatorContacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $investigatorContact = $this->InvestigatorContacts->patchEntity($investigatorContact, $this->request->getData());
            if ($this->InvestigatorContacts->save($investigatorContact)) {
                $this->Flash->success(__('The investigator contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The investigator contact could not be saved. Please, try again.'));
        }
        $applications = $this->InvestigatorContacts->Applications->find('list', ['limit' => 200]);
        $this->set(compact('investigatorContact', 'applications'));
        $this->set('_serialize', ['investigatorContact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Investigator Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $investigatorContact = $this->InvestigatorContacts->get($id);
        if ($this->InvestigatorContacts->delete($investigatorContact)) {
            $this->Flash->success(__('The investigator contact has been deleted.'));
        } else {
            $this->Flash->error(__('The investigator contact could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
    }
}

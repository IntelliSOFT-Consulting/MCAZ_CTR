<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SadrOtherDrugs Controller
 *
 * @property \App\Model\Table\SadrOtherDrugsTable $SadrOtherDrugs
 *
 * @method \App\Model\Entity\SadrOtherDrug[] paginate($object = null, array $settings = [])
 */
class SadrOtherDrugsController extends AppController
{
    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['delete']);       
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sadrs']
        ];
        $sadrOtherDrugs = $this->paginate($this->SadrOtherDrugs);

        $this->set(compact('sadrOtherDrugs'));
        $this->set('_serialize', ['sadrOtherDrugs']);
    }

    /**
     * View method
     *
     * @param string|null $id Sadr Other Drug id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sadrOtherDrug = $this->SadrOtherDrugs->get($id, [
            'contain' => ['Sadrs']
        ]);

        $this->set('sadrOtherDrug', $sadrOtherDrug);
        $this->set('_serialize', ['sadrOtherDrug']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sadrOtherDrug = $this->SadrOtherDrugs->newEntity();
        if ($this->request->is('post')) {
            $sadrOtherDrug = $this->SadrOtherDrugs->patchEntity($sadrOtherDrug, $this->request->getData());
            if ($this->SadrOtherDrugs->save($sadrOtherDrug)) {
                $this->Flash->success(__('The sadr other drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sadr other drug could not be saved. Please, try again.'));
        }
        $sadrs = $this->SadrOtherDrugs->Sadrs->find('list', ['limit' => 200]);
        $this->set(compact('sadrOtherDrug', 'sadrs'));
        $this->set('_serialize', ['sadrOtherDrug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sadr Other Drug id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sadrOtherDrug = $this->SadrOtherDrugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sadrOtherDrug = $this->SadrOtherDrugs->patchEntity($sadrOtherDrug, $this->request->getData());
            if ($this->SadrOtherDrugs->save($sadrOtherDrug)) {
                $this->Flash->success(__('The sadr other drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sadr other drug could not be saved. Please, try again.'));
        }
        $sadrs = $this->SadrOtherDrugs->Sadrs->find('list', ['limit' => 200]);
        $this->set(compact('sadrOtherDrug', 'sadrs'));
        $this->set('_serialize', ['sadrOtherDrug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sadr Other Drug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    //TODO: Write code to ensure $this->request->data['sadr_id'] belongs to user and is not submitted and also belongs to sadr being edited
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $sadrOtherDrug = $this->SadrOtherDrugs->get($this->request->data['id']);
        if ($this->SadrOtherDrugs->delete($sadrOtherDrug)) {
            $this->set('_serialize', ['sadrOtherDrug']);
        } else {
            $this->set('_serialize', ['sadrOtherDrug']);
        }
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SadrListOfDrugs Controller
 *
 * @property \App\Model\Table\SadrListOfDrugsTable $SadrListOfDrugs
 *
 * @method \App\Model\Entity\SadrListOfDrug[] paginate($object = null, array $settings = [])
 */
class SadrListOfDrugsController extends AppController
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
            'contain' => ['Sadrs', 'SadrFollowups', 'Doses', 'Routes', 'Frequencies']
        ];
        $sadrListOfDrugs = $this->paginate($this->SadrListOfDrugs);

        $this->set(compact('sadrListOfDrugs'));
        $this->set('_serialize', ['sadrListOfDrugs']);
    }

    /**
     * View method
     *
     * @param string|null $id Sadr List Of Drug id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sadrListOfDrug = $this->SadrListOfDrugs->get($id, [
            'contain' => ['Sadrs', 'SadrFollowups', 'Doses', 'Routes', 'Frequencies']
        ]);

        $this->set('sadrListOfDrug', $sadrListOfDrug);
        $this->set('_serialize', ['sadrListOfDrug']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sadrListOfDrug = $this->SadrListOfDrugs->newEntity();
        if ($this->request->is('post')) {
            $sadrListOfDrug = $this->SadrListOfDrugs->patchEntity($sadrListOfDrug, $this->request->getData());
            if ($this->SadrListOfDrugs->save($sadrListOfDrug)) {
                $this->Flash->success(__('The sadr list of drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sadr list of drug could not be saved. Please, try again.'));
        }
        $sadrs = $this->SadrListOfDrugs->Sadrs->find('list', ['limit' => 200]);
        $sadrFollowups = $this->SadrListOfDrugs->SadrFollowups->find('list', ['limit' => 200]);
        $doses = $this->SadrListOfDrugs->Doses->find('list', ['limit' => 200]);
        $routes = $this->SadrListOfDrugs->Routes->find('list', ['limit' => 200]);
        $frequencies = $this->SadrListOfDrugs->Frequencies->find('list', ['limit' => 200]);
        $this->set(compact('sadrListOfDrug', 'sadrs', 'sadrFollowups', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadrListOfDrug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sadr List Of Drug id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sadrListOfDrug = $this->SadrListOfDrugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sadrListOfDrug = $this->SadrListOfDrugs->patchEntity($sadrListOfDrug, $this->request->getData());
            if ($this->SadrListOfDrugs->save($sadrListOfDrug)) {
                $this->Flash->success(__('The sadr list of drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sadr list of drug could not be saved. Please, try again.'));
        }
        $sadrs = $this->SadrListOfDrugs->Sadrs->find('list', ['limit' => 200]);
        $sadrFollowups = $this->SadrListOfDrugs->SadrFollowups->find('list', ['limit' => 200]);
        $doses = $this->SadrListOfDrugs->Doses->find('list', ['limit' => 200]);
        $routes = $this->SadrListOfDrugs->Routes->find('list', ['limit' => 200]);
        $frequencies = $this->SadrListOfDrugs->Frequencies->find('list', ['limit' => 200]);
        $this->set(compact('sadrListOfDrug', 'sadrs', 'sadrFollowups', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadrListOfDrug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sadr List Of Drug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        //TODO: Write code to ensure $this->request->data['sadr_id'] belongs to user and is not submitted and also belongs to sadr being edited
        $this->request->allowMethod(['post', 'delete']);
        $sadrListOfDrug = $this->SadrListOfDrugs->get($this->request->data['id']);
        if ($this->SadrListOfDrugs->delete($sadrListOfDrug)) {
            //$this->Flash->success(__('The sadr list of drug has been deleted.'));
            $sadrListOfDrug['message'] = 'success';
            $this->set('sadrListOfDrug', $sadrListOfDrug);
            $this->set('_serialize', ['sadrListOfDrug']);
        } else {
            $sadrListOfDrug['message'] = 'fail';
            $this->set('sadrListOfDrug', $sadrListOfDrug);
            $this->set('_serialize', ['sadrListOfDrug']);
        }
    }
}

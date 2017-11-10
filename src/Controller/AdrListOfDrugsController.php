<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdrListOfDrugs Controller
 *
 * @property \App\Model\Table\AdrListOfDrugsTable $AdrListOfDrugs
 *
 * @method \App\Model\Entity\AdrListOfDrug[] paginate($object = null, array $settings = [])
 */
class AdrListOfDrugsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Adrs', 'Doses', 'Routes', 'Frequencies']
        ];
        $adrListOfDrugs = $this->paginate($this->AdrListOfDrugs);

        $this->set(compact('adrListOfDrugs'));
        $this->set('_serialize', ['adrListOfDrugs']);
    }

    /**
     * View method
     *
     * @param string|null $id Adr List Of Drug id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adrListOfDrug = $this->AdrListOfDrugs->get($id, [
            'contain' => ['Adrs', 'Doses', 'Routes', 'Frequencies']
        ]);

        $this->set('adrListOfDrug', $adrListOfDrug);
        $this->set('_serialize', ['adrListOfDrug']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adrListOfDrug = $this->AdrListOfDrugs->newEntity();
        if ($this->request->is('post')) {
            $adrListOfDrug = $this->AdrListOfDrugs->patchEntity($adrListOfDrug, $this->request->getData());
            if ($this->AdrListOfDrugs->save($adrListOfDrug)) {
                $this->Flash->success(__('The adr list of drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adr list of drug could not be saved. Please, try again.'));
        }
        $adrs = $this->AdrListOfDrugs->Adrs->find('list', ['limit' => 200]);
        $doses = $this->AdrListOfDrugs->Doses->find('list', ['limit' => 200]);
        $routes = $this->AdrListOfDrugs->Routes->find('list', ['limit' => 200]);
        $frequencies = $this->AdrListOfDrugs->Frequencies->find('list', ['limit' => 200]);
        $this->set(compact('adrListOfDrug', 'adrs', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['adrListOfDrug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adr List Of Drug id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adrListOfDrug = $this->AdrListOfDrugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adrListOfDrug = $this->AdrListOfDrugs->patchEntity($adrListOfDrug, $this->request->getData());
            if ($this->AdrListOfDrugs->save($adrListOfDrug)) {
                $this->Flash->success(__('The adr list of drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adr list of drug could not be saved. Please, try again.'));
        }
        $adrs = $this->AdrListOfDrugs->Adrs->find('list', ['limit' => 200]);
        $doses = $this->AdrListOfDrugs->Doses->find('list', ['limit' => 200]);
        $routes = $this->AdrListOfDrugs->Routes->find('list', ['limit' => 200]);
        $frequencies = $this->AdrListOfDrugs->Frequencies->find('list', ['limit' => 200]);
        $this->set(compact('adrListOfDrug', 'adrs', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['adrListOfDrug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adr List Of Drug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $adrListOfDrug = $this->AdrListOfDrugs->get($this->request->data['id']);
        if ($this->AdrListOfDrugs->delete($adrListOfDrug)) {
            $this->Flash->success(__('The adr list of drug has been deleted.'));
        } else {
            $this->Flash->error(__('The adr list of drug could not be deleted. Please, try again.'));
        }

    }
}

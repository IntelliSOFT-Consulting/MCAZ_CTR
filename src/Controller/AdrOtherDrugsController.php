<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdrOtherDrugs Controller
 *
 * @property \App\Model\Table\AdrOtherDrugsTable $AdrOtherDrugs
 *
 * @method \App\Model\Entity\AdrOtherDrug[] paginate($object = null, array $settings = [])
 */
class AdrOtherDrugsController extends AppController
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
        $adrOtherDrugs = $this->paginate($this->AdrOtherDrugs);

        $this->set(compact('adrOtherDrugs'));
        $this->set('_serialize', ['adrOtherDrugs']);
    }

    /**
     * View method
     *
     * @param string|null $id Adr Other Drug id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adrOtherDrug = $this->AdrOtherDrugs->get($id, [
            'contain' => ['Adrs']
        ]);

        $this->set('adrOtherDrug', $adrOtherDrug);
        $this->set('_serialize', ['adrOtherDrug']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adrOtherDrug = $this->AdrOtherDrugs->newEntity();
        if ($this->request->is('post')) {
            $adrOtherDrug = $this->AdrOtherDrugs->patchEntity($adrOtherDrug, $this->request->getData());
            if ($this->AdrOtherDrugs->save($adrOtherDrug)) {
                $this->Flash->success(__('The adr other drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adr other drug could not be saved. Please, try again.'));
        }
        $adrs = $this->AdrOtherDrugs->Adrs->find('list', ['limit' => 200]);
        $this->set(compact('adrOtherDrug', 'adrs'));
        $this->set('_serialize', ['adrOtherDrug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adr Other Drug id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adrOtherDrug = $this->AdrOtherDrugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adrOtherDrug = $this->AdrOtherDrugs->patchEntity($adrOtherDrug, $this->request->getData());
            if ($this->AdrOtherDrugs->save($adrOtherDrug)) {
                $this->Flash->success(__('The adr other drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adr other drug could not be saved. Please, try again.'));
        }
        $adrs = $this->AdrOtherDrugs->Adrs->find('list', ['limit' => 200]);
        $this->set(compact('adrOtherDrug', 'adrs'));
        $this->set('_serialize', ['adrOtherDrug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adr Other Drug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $adrOtherDrug = $this->AdrOtherDrugs->get($this->request->data['id']);
        if ($this->AdrOtherDrugs->delete($adrOtherDrug)) {
            $this->Flash->success(__('The adr other drug has been deleted.'));
        } else {
            $this->Flash->error(__('The adr other drug could not be deleted. Please, try again.'));
        }

    }
}

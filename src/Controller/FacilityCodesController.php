<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FacilityCodes Controller
 *
 * @property \App\Model\Table\FacilityCodesTable $FacilityCodes
 *
 * @method \App\Model\Entity\FacilityCode[] paginate($object = null, array $settings = [])
 */
class FacilityCodesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $facilityCodes = $this->paginate($this->FacilityCodes);

        $this->set(compact('facilityCodes'));
        $this->set('_serialize', ['facilityCodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Facility Code id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $facilityCode = $this->FacilityCodes->get($id, [
            'contain' => []
        ]);

        $this->set('facilityCode', $facilityCode);
        $this->set('_serialize', ['facilityCode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $facilityCode = $this->FacilityCodes->newEntity();
        if ($this->request->is('post')) {
            $facilityCode = $this->FacilityCodes->patchEntity($facilityCode, $this->request->getData());
            if ($this->FacilityCodes->save($facilityCode)) {
                $this->Flash->success(__('The facility code has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The facility code could not be saved. Please, try again.'));
        }
        $this->set(compact('facilityCode'));
        $this->set('_serialize', ['facilityCode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Facility Code id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $facilityCode = $this->FacilityCodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facilityCode = $this->FacilityCodes->patchEntity($facilityCode, $this->request->getData());
            if ($this->FacilityCodes->save($facilityCode)) {
                $this->Flash->success(__('The facility code has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The facility code could not be saved. Please, try again.'));
        }
        $this->set(compact('facilityCode'));
        $this->set('_serialize', ['facilityCode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Facility Code id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facilityCode = $this->FacilityCodes->get($id);
        if ($this->FacilityCodes->delete($facilityCode)) {
            $this->Flash->success(__('The facility code has been deleted.'));
        } else {
            $this->Flash->error(__('The facility code could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

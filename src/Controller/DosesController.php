<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Doses Controller
 *
 * @property \App\Model\Table\DosesTable $Doses
 *
 * @method \App\Model\Entity\Dose[] paginate($object = null, array $settings = [])
 */
class DosesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $doses = $this->paginate($this->Doses);

        $this->set(compact('doses'));
        $this->set('_serialize', ['doses']);
    }

    /**
     * View method
     *
     * @param string|null $id Dose id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dose = $this->Doses->get($id, [
            'contain' => ['SadrListOfDrugs']
        ]);

        $this->set('dose', $dose);
        $this->set('_serialize', ['dose']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dose = $this->Doses->newEntity();
        if ($this->request->is('post')) {
            $dose = $this->Doses->patchEntity($dose, $this->request->getData());
            if ($this->Doses->save($dose)) {
                $this->Flash->success(__('The dose has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dose could not be saved. Please, try again.'));
        }
        $this->set(compact('dose'));
        $this->set('_serialize', ['dose']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dose id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dose = $this->Doses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dose = $this->Doses->patchEntity($dose, $this->request->getData());
            if ($this->Doses->save($dose)) {
                $this->Flash->success(__('The dose has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dose could not be saved. Please, try again.'));
        }
        $this->set(compact('dose'));
        $this->set('_serialize', ['dose']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dose id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dose = $this->Doses->get($id);
        if ($this->Doses->delete($dose)) {
            $this->Flash->success(__('The dose has been deleted.'));
        } else {
            $this->Flash->error(__('The dose could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

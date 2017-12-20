<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Placebos Controller
 *
 * @property \App\Model\Table\PlacebosTable $Placebos
 *
 * @method \App\Model\Entity\Placebo[] paginate($object = null, array $settings = [])
 */
class PlacebosController extends AppController
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
        $placebos = $this->paginate($this->Placebos);

        $this->set(compact('placebos'));
        $this->set('_serialize', ['placebos']);
    }

    /**
     * View method
     *
     * @param string|null $id Placebo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $placebo = $this->Placebos->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('placebo', $placebo);
        $this->set('_serialize', ['placebo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $placebo = $this->Placebos->newEntity();
        if ($this->request->is('post')) {
            $placebo = $this->Placebos->patchEntity($placebo, $this->request->getData());
            if ($this->Placebos->save($placebo)) {
                $this->Flash->success(__('The placebo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The placebo could not be saved. Please, try again.'));
        }
        $applications = $this->Placebos->Applications->find('list', ['limit' => 200]);
        $this->set(compact('placebo', 'applications'));
        $this->set('_serialize', ['placebo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Placebo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $placebo = $this->Placebos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $placebo = $this->Placebos->patchEntity($placebo, $this->request->getData());
            if ($this->Placebos->save($placebo)) {
                $this->Flash->success(__('The placebo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The placebo could not be saved. Please, try again.'));
        }
        $applications = $this->Placebos->Applications->find('list', ['limit' => 200]);
        $this->set(compact('placebo', 'applications'));
        $this->set('_serialize', ['placebo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Placebo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $placebo = $this->Placebos->get($id);
        if ($this->Placebos->delete($placebo)) {
            $this->Flash->success(__('The placebo has been deleted.'));
        } else {
            $this->Flash->error(__('The placebo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

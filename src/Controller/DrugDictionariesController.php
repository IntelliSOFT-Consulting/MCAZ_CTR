<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DrugDictionaries Controller
 *
 * @property \App\Model\Table\DrugDictionariesTable $DrugDictionaries
 *
 * @method \App\Model\Entity\DrugDictionary[] paginate($object = null, array $settings = [])
 */
class DrugDictionariesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $drugDictionaries = $this->paginate($this->DrugDictionaries);

        $this->set(compact('drugDictionaries'));
        $this->set('_serialize', ['drugDictionaries']);
    }

    /**
     * View method
     *
     * @param string|null $id Drug Dictionary id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $drugDictionary = $this->DrugDictionaries->get($id, [
            'contain' => []
        ]);

        $this->set('drugDictionary', $drugDictionary);
        $this->set('_serialize', ['drugDictionary']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $drugDictionary = $this->DrugDictionaries->newEntity();
        if ($this->request->is('post')) {
            $drugDictionary = $this->DrugDictionaries->patchEntity($drugDictionary, $this->request->getData());
            if ($this->DrugDictionaries->save($drugDictionary)) {
                $this->Flash->success(__('The drug dictionary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drug dictionary could not be saved. Please, try again.'));
        }
        $this->set(compact('drugDictionary'));
        $this->set('_serialize', ['drugDictionary']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Drug Dictionary id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $drugDictionary = $this->DrugDictionaries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $drugDictionary = $this->DrugDictionaries->patchEntity($drugDictionary, $this->request->getData());
            if ($this->DrugDictionaries->save($drugDictionary)) {
                $this->Flash->success(__('The drug dictionary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drug dictionary could not be saved. Please, try again.'));
        }
        $this->set(compact('drugDictionary'));
        $this->set('_serialize', ['drugDictionary']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Drug Dictionary id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $drugDictionary = $this->DrugDictionaries->get($id);
        if ($this->DrugDictionaries->delete($drugDictionary)) {
            $this->Flash->success(__('The drug dictionary has been deleted.'));
        } else {
            $this->Flash->error(__('The drug dictionary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

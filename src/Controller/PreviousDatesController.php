<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PreviousDates Controller
 *
 * @property \App\Model\Table\PreviousDatesTable $PreviousDates
 *
 * @method \App\Model\Entity\PreviousDate[] paginate($object = null, array $settings = [])
 */
class PreviousDatesController extends AppController
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
        $previousDates = $this->paginate($this->PreviousDates);

        $this->set(compact('previousDates'));
        $this->set('_serialize', ['previousDates']);
    }

    /**
     * View method
     *
     * @param string|null $id Previous Date id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $previousDate = $this->PreviousDates->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('previousDate', $previousDate);
        $this->set('_serialize', ['previousDate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $previousDate = $this->PreviousDates->newEntity();
        if ($this->request->is('post')) {
            $previousDate = $this->PreviousDates->patchEntity($previousDate, $this->request->getData());
            if ($this->PreviousDates->save($previousDate)) {
                $this->Flash->success(__('The previous date has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The previous date could not be saved. Please, try again.'));
        }
        $applications = $this->PreviousDates->Applications->find('list', ['limit' => 200]);
        $this->set(compact('previousDate', 'applications'));
        $this->set('_serialize', ['previousDate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Previous Date id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $previousDate = $this->PreviousDates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $previousDate = $this->PreviousDates->patchEntity($previousDate, $this->request->getData());
            if ($this->PreviousDates->save($previousDate)) {
                $this->Flash->success(__('The previous date has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The previous date could not be saved. Please, try again.'));
        }
        $applications = $this->PreviousDates->Applications->find('list', ['limit' => 200]);
        $this->set(compact('previousDate', 'applications'));
        $this->set('_serialize', ['previousDate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Previous Date id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $previousDate = $this->PreviousDates->get($id);
        if ($this->PreviousDates->delete($previousDate)) {
            $this->Flash->success(__('The previous date has been deleted.'));
        } else {
            $this->Flash->error(__('The previous date could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 *
 * @method \App\Model\Entity\Notification[] paginate($object = null, array $settings = [])
 */
class NotificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $notifications = $this->paginate($this->Notifications);

        $this->set(compact('notifications'));
        $this->set('_serialize', ['notifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('notification', $notification);
        $this->set('_serialize', ['notification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notification = $this->Notifications->newEntity();
        if ($this->request->is('post')) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->getData());
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users'));
        $this->set('_serialize', ['notification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->getData());
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users'));
        $this->set('_serialize', ['notification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //TODO: Use session AUTH to ensure the user is assigned notification before soft delete
        $this->request->allowMethod(['post', 'delete']);
        if($this->request->is('json')) {
            $notification = $this->Notifications->get($this->request->data['id']);
            if ($this->Notifications->delete($notification)) {
                $this->set([
                        'message' => 'Notification successfully deleted', 
                        '_serialize' => ['message']]);
                return;
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'message' => 'Unable to delete!!', 
                    '_serialize' => ['message']]);
                return;
            }

        }
    }
}

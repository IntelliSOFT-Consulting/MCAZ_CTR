<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 *
 * @method \App\Model\Entity\Notification[] paginate($object = null, array $settings = [])
 */
class NotificationsBaseController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
       $this->loadModel('Notifications'); 
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Messages'],
            'order' => ['Notifications.created' => 'DESC']
        ];
        $withDeleted = ($this->request->getQuery('deleted')) ? 'withDeleted' : '';
        $query = $this->Notifications
            ->find('search', ['search' => $this->request->query, $withDeleted ])
            ->where(['user_id' => $this->request->session()->read('Auth.User.id')]);

        $this->set('notifications', $this->paginate($query));
        $this->render('/Base/Notifications/index');
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
        $this->render('/Base/Notifications/view');
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
        $this->request->allowMethod(['post', 'delete', 'get']);
        $notification = $this->Notifications->get($id);
        if ($notification->user_id == $this->Auth->user('id')) {
            if ($this->Notifications->delete($notification)) {
                $this->Flash->success(__('The notification has been deleted.'));
            } else {
                $this->Flash->error(__('The notification could not be deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('You do not have permission to delete the notification'));
        }        

        return $this->redirect(['action' => 'index']);
    }
}

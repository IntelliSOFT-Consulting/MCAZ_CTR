<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $paginate = [
            // 'limit' => 2,
            'Sadrs' => ['scope' => 'sadr'],
            'Adrs' => ['scope' => 'adr'],
            'Aefis' => ['scope' => 'aefi'],
            'Saefis' => ['scope' => 'saefi']
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);       
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'login', 'logout', 'activate']);
    }

    
    public function dashboard() {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->paginate = [
            'limit' => 5,
        ];

        $this->loadModel('Feedbacks');
        $feedbacks = $this->paginate($this->Feedbacks->find('all'), ['scope' => 'feedback', 'order' => ['Feedbacks.id' => 'desc']]);

        $this->set(compact('user', 'feedbacks'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];

        $query = $this->Users
            ->find('search', ['search' => $this->request->query, 'withDeleted']);

        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('groups'));
        $this->set('users', $this->paginate($query));

        $_groups = $groups->toArray();
        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id', 'name', 'username', 'email', 'Group'];
            $_extract = ['id', 'name', 'username', 'email', 
                    function ($row) use ($_groups) { return $_groups[$row['group_id']] ?? ''; } //'Group'
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['groups']
        ]);

        //
                // $this->loadModel('Queue.QueuedJobs');
                // $user->activation_key = (new DefaultPasswordHasher)->hash($user->email);
                // $data = [
                //     'vars' => [
                //         'user' => $user->toArray()
                //     ]
                // ];
                // $this->QueuedJobs->createJob('RegisterEmail', $data);
                //end
        //
        // debug((new DefaultPasswordHasher)->hash($user->email));

        //send email test --- remove
        /** @var \Queue\Model\Table\QueuedJobsTable $QueuedJobs */
        // Log::write('debug', 'Start queue manenos');
        // $this->loadModel('Queue.QueuedJobs');
        // $data = [
        //     'settings' => [
        //         'subject' => __('Test fired from Queue {0}', $user->name)
        //     ],
        //     'vars' => [
        //         'user' => $user->toArray()
        //     ]
        // ];
        // $this->QueuedJobs->createJob('TestEmail', $data);
        // Log::write('debug', 'End queue manenos');
        //end

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Groups']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fieldList = ['Users.id', 'Users.name', 'Users.email', 'Users.username', 'Users.group_id', 'Users.phone_no',                      
                      'Users.is_active', 'Users.deactivated', 'Users.is_admin'];

        $user = $this->Users->get($id, [
            'fields' => $fieldList,
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {   
            if (empty($this->request->data['password'])) {
                unset($this->request->data['password']);
                unset($this->request->data['confirm_password']);
            }         
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user\'s details have been updated.'));

                return $this->redirect(['action' => 'edit', $user->id]);
            }
            $this->Flash->error(__('The user\'s details could not be saved. Please, try again.'));
        }

        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }


    public function deactivate($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['deactivated' => 1])
                    ->where(['id' => $user->id])
                    ->execute();
                $this->set([
                        'message' => 'Deactivation successful.', 
                        '_serialize' => ['message']]);
            } else {             
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to get user', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
            }
        }
    }
    public function activate($id = null)
    {
        $user = $this->Users->get($id, ['withDeleted']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['deactivated' => 0, 'deleted' => null])
                    ->where(['id' => $user->id])
                    ->execute();
                $this->set([
                        'message' => 'Reactivation successful.', 
                        '_serialize' => ['message']]);
            } else {             
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to get user', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
            }
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $restore = false)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id, ['withDeleted']);
        if (!$restore) {
            $query = $this->Users->query();
            $query->update()
                    ->set(['deleted' => date('Y-m-d H:i:s')])
                    ->where(['id' => $user->id])
                    ->execute();
            $this->Flash->success(__('The user has been deleted.'));
        } elseif ($restore && $this->Users->restore($user)) {
            $this->Flash->success(__('The user has been restored.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}

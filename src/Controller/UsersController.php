<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
            'Adrs' => ['scope' => 'adr']
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       $this->Auth->allow('logout');       
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // $this->Auth->allow('*');
        $this->Auth->allow('register', 'login');
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password was incorrect.'));
        }
    }
 
    public function logout() {
        //Leave empty for now.
        $this->Flash->success(__('Good-Bye'));
        $this->redirect($this->Auth->logout());
    }

    public function register() {
        //new
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->group_id = 3;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration successful.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                //return $this->redirect('/');
            }
            $this->Flash->error(__('The user could not be registered. Please, try again.'));
        }
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
        //$groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'designations'));
        $this->set('_serialize', ['user']);
    }

    public function home() {
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->paginate = [
            'limit' => 5,
            // 'Sadrs' => ['scope' => 'sadr'],
            // 'Adrs' => ['scope' => 'adr']
        ];

        // pr($user);

        $sadrs = $this->paginate($this->Sadrs->findByUserId($this->Auth->user('id')), ['scope' => 'sadr', 'order' => ['Sadrs.id' => 'desc'],
                                    'fields' => ['Sadrs.id', 'Sadrs.created']]);
        $adrs = $this->paginate($this->Adrs->findByUserId($this->Auth->user('id')), ['scope' => 'adr', 'order' => ['Adrs.id' => 'desc'],
                                    'fields' => ['Adrs.id', 'Adrs.created']]);
        $aefis = $this->paginate($this->Users->Aefis->findByUserId($this->Auth->user('id')), ['scope' => 'aefi', 'order' => ['Aefis.id' => 'desc'],
                                    'fields' => ['Aefis.id', 'Aefis.created']]);

        $this->set(compact('sadrs', 'adrs', 'aefis'));
        // $this->set('_serialize', ['sadrs', 'adrs', 'aefis']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Designations', 'Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
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
            'contain' => ['Designations', 'Groups', 'Feedbacks', 'Pqmps', 'SadrFollowups', 'Sadrs']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Designations', 'Groups']
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
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'designations', 'groups'));
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'designations', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

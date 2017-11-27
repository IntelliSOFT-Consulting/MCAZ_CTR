<?php
namespace App\Controller;

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
       // $this->Auth->allow('logout', 'activate', 'view');       
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // $this->Auth->allow();
        $this->Auth->allow(['register', 'login', 'logout', 'activate']);
    }

    // public function login() {
    //     if ($this->request->is('post')) {
    //         $user = $this->Auth->identify();
    //         if ($user) {
    //             $this->Auth->setUser($user);
    //             return $this->redirect($this->Auth->redirectUrl());
    //         }
    //         $this->Flash->error(__('Your username or password was incorrect.'));
    //     }
    // }

    //Login with username or password
    public function login()
    {
        if ($this->request->is('post')) {

            if (Validation::email($this->request->data['username'])) {
                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'email']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
                $this->request->data['email'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
 
    public function logout() {
        //Leave empty for now.
        $this->Flash->success(__('Good-Bye'));
        $this->redirect($this->Auth->logout());
    }

    public function register() {
        //newa
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($user->errors()) {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $user->errors(), 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
                return;
            }

            // if($user->errors()) {
            //     $this->response->statusCode(500);
            //     $this->set([
            //         // 'errors' => $user->errors(), 
            //         'code' => 500, 'message' => 'yntax error, unexpected \u0027$user\u0027 (T_VARIABLE)', 'success' => false,
            //         '_serialize' => ['code', 'message']]);
            //     return;
            // }

            $user->group_id = 3;
            // $user->activation_key = (new DefaultPasswordHasher)->hash($user->email);            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration successful.'));

                $user->activation_key = $this->Util->generateXOR($user->id);
                $query = $this->Users->query();
                $query->update()
                    ->set(['activation_key' => $this->Util->generateXOR($user->id)])
                    ->where(['id' => $user->id])
                    ->execute();

                //Send registration confirm email
                $this->loadModel('Queue.QueuedJobs');                
                $data = [
                    'vars' => [
                        'user' => $user->toArray()
                    ]
                ];
                $this->QueuedJobs->createJob('RegisterEmail', $data);
                //end

                $this->Flash->success(__('You have successfully registered. Please click on the link sent to your email address to
                    activate your account. Check your spam folder if you
                    don\'t see it in your inbox.'));
                
                
                if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Registration successfull. Click on link sent on email to complete registration', 
                        '_serialize' => ['message']]);
                    return;
                }

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);

                //return $this->redirect('/');
            } else {
                $this->Flash->error(__('The user could not be registered. Please, try again.'));     
                // $user->success = false;
                // $user->message =            
            }
        }
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
        //$groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'designations'));
        $this->set('_serialize', ['user']);
    }

    public function activate($id = null) {
        if($id) {
            $user = $this->Users->findByActivationKey($id)->first();
            // pr($id);
            // pr($this->Util->reverseXOR($id));
            // pr($this->Util->generateXOR(8));
            // $user = $this->Users->get($this->Util->reverseXOR($id), [
            //     'contain' => []
            // ]);
            if ($user) {
                // debug($user);
                $query = $this->Users->query();
                $query->update()
                    ->set(['is_active' => 1])
                    ->where(['id' => $user->id])
                    ->execute();

                $this->Flash->success(__('You have successfully activated your account.'));
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());

            } else {
                $this->Flash->error(__('Invalid activation token.'));
                $this->redirect('/');
            }
        } else {
            $this->Flash->error(__('Invalid activation token.'));
            $this->redirect('/');
        }
    }

    public function home() {
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
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
                                    'fields' => ['Sadrs.id', 'Sadrs.created', 'Sadrs.reference_number', 'Sadrs.submitted']]);
        $adrs = $this->paginate($this->Adrs->findByUserId($this->Auth->user('id')), ['scope' => 'adr', 'order' => ['Adrs.id' => 'desc'],
                                    'fields' => ['Adrs.id', 'Adrs.created', 'Adrs.reference_number']]);
        $aefis = $this->paginate($this->Aefis->findByUserId($this->Auth->user('id')), ['scope' => 'aefi', 'order' => ['Aefis.id' => 'desc'],
                                    'fields' => ['Aefis.id', 'Aefis.created', 'Aefis.reference_number']]);
        $saefis = $this->paginate($this->Saefis->findByUserId($this->Auth->user('id')), ['scope' => 'saefi', 'order' => ['Saefis.id' => 'desc'],
                                    'fields' => ['Saefis.id', 'Saefis.created', 'Saefis.reference_number']]);

        $this->set(compact('sadrs', 'adrs', 'aefis', 'saeifs'));
        $this->set(compact('saefis'));
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
            'contain' => []
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

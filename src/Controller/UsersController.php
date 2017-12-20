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

                if($user['is_active'] == 0) {
                $this->Flash->error('Your account is not activated! If you have just registered, please click the activation link sent to your email. Remember to check you spam folder too!');
                    $this->redirect($this->Auth->logout());
                } elseif ($user['deactivated'] == 1) {
                    $this->Flash->error('Your account has been deactivated! Please contact MCAZ.');
                    $this->redirect($this->Auth->logout());
                }

                if ($user['group_id'] == 1) {
                    return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'admin']);
                } elseif ($user['group_id'] == 2) {
                    return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'manager']);
                } elseif ($user['group_id'] == 3) {
                    return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
                } elseif ($user['group_id'] == 4) {
                    return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant']);
                } 
                
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

            $user->group_id = 4;
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

            } else {
                $this->Flash->error(__('The user could not be registered. Please, try again.'));     
    
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function activate($id = null) {
        if($id) {
            $user = $this->Users->findByActivationKey($id)->first();
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
        $this->paginate = [
            'contain' => [ 'Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
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
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
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
            'contain' => [ 'Groups', 'Applications', 'Feedbacks', 'Notifications', 'Reviewers', 'Reviews']
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

        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user',  'groups'));
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
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user',  'groups'));
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

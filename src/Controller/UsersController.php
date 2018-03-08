<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;
use Cake\View\Helper\HtmlHelper; 

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
            'Notifications' => ['scope' => 'notification'],
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');       
       $this->loadComponent('Util');
       // $this->Auth->allow('logout', 'activate', 'view');       
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // $this->Auth->allow();
        $this->Auth->allow(['register', 'login', 'logout', 'activate', 'forgotPassword', 'resetPassword']);
    }

    public function dashboard() {
        if ($this->request->session()->read('Auth.User.group_id') == 1) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'admin']);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 2) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'manager']);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 3) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 4) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant']);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 5) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'finance']);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 6) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'external_evaluator']);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 7) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'director_general']);
        }
    }

    //Login with username or password
    public function login()
    {   
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl()); 
        }

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

                if(strlen($this->Auth->redirectUrl()) > 12) {
                    return $this->redirect($this->Auth->redirectUrl());           
                } else {
                    if ($user['group_id'] == 1) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'admin']);
                    } elseif ($user['group_id'] == 2) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'manager']);
                    } elseif ($user['group_id'] == 3) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
                    } elseif ($user['group_id'] == 4) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'applicant']);
                    } elseif ($user['group_id'] == 5) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'finance']);
                    } elseif ($user['group_id'] == 6) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'external_evaluator']);
                    } 
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
        $this->Users->addBehavior('Captcha.Captcha');
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl()); 
        }
        
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
            }

            $user->group_id = 4;
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
                    'email_address' => $user->email, 'user_id' => $user->id, 'type' => 'registration_email', 'model' => 'Users', 
                    'foreign_key' => $user->id, 'vars' =>  $user->toArray()                
                ]; 
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['name'] = (isset($user->name)) ? $user->name : 'Sir/Madam' ;
                $data['vars']['ctr_site'] = $html->link('MCAZ CTR website', ['controller' => 'Pages', 'action' => 'home', '_full' => true]);
                $data['vars']['activation_link'] = $html->link('ACTIVATE', ['controller' => 'Users', 'action' => 'activate', $user->activation_key, 
                                          '_full' => true]);
                $this->QueuedJobs->createJob('GenericEmail', $data);
                //Send registration notification
                $data['type'] = 'registration_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //

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
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    //TODO: Add forgot password functionality
    
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


    public function forgotPassword() {
        if ($this->Auth->user()) {
            $this->Flash->success('You are logged in!');
            $this->redirect('/', null, false);
        }
        if ($this->request->is('post')) {
            $user = $this->Users->findByEmail($this->request->getData('email'))->first();
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['forgot_password' => 1])
                    ->where(['id' => $user->id])
                    ->execute();

                //Send registration confirm email
                $this->loadModel('Queue.QueuedJobs'); 
                $data = [
                    'email_address' => $user->email, 'user_id' => $user->id, 'type' => 'forgot_password_email', 'model' => 'Users', 
                    'foreign_key' => $user->id, 'vars' =>  $user->toArray()                
                ]; 
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['name'] = (isset($user->name)) ? $user->name : 'Sir/Madam' ;
                $data['vars']['new_password'] = date('smiYhd', strtotime($user->created));
                $data['vars']['pv_site'] = $html->link('MCAZ PV website', ['controller' => 'Pages', 'action' => 'home', '_full' => true]);
                $data['vars']['reset_password_link'] = $html->link('Reset Password', ['controller' => 'Users', 'action' => 'resetPassword', $user->activation_key, 
                                          '_full' => true]);
                $this->QueuedJobs->createJob('GenericEmail', $data);
                
                $this->Flash->success(__('A new password has been sent to the requested email address.'));
                $this->redirect('/');
            } else {
                $this->Flash->error(__('Could not verify your email address.'));
            }
        }
    }


    public function resetPassword($id = null) {
        //confirm user id hash for authenticity
        $check = $this->Users->find('all')->where(['activation_key' => $id, 'is_active' => 1])->first();
        if (!$check) {
            $this->Flash->error(__('Could not verify the user. Kindly contact MCAZ.'));
            $this->redirect('/');
        } else {
            if ($check->forgot_password != 1) {
                $this->Flash->error(__('The password has not been reset.'));
                $this->redirect('/');
            }
            $user = $this->Users->patchEntity($check, $this->request->getData());
            $user->password = date('smiYhd', strtotime($check->created));
            $user->confirm_password = date('smiYhd', strtotime($check->created));
            $user->forgot_password = 0;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The password has been reset. You may login using your new password.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The password could not be reset. Kindly contact MCAZ.'));
            $this->redirect('/');
        }
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

        //Send registration confirm email
        $this->loadModel('Queue.QueuedJobs'); 
        $data = [
            'email_address' => $user->email, 'user_id' => $user->id, 'type' => 'registration_email', 'model' => 'Users', 
            'foreign_key' => $user->id, 'vars' =>  $user->toArray()                
        ]; 
        $html = new HtmlHelper(new \Cake\View\View());
        $data['vars']['pv_site'] = $html->link('MCAZ PV website', ['controller' => 'Pages', 'action' => 'home', '_full' => true]);
        $data['vars']['activation_link'] = $html->link('ACTIVATE', ['controller' => 'Users', 'action' => 'activate', $user->activation_key, 
                                  '_full' => true]);
        $this->QueuedJobs->createJob('GenericEmail', $data);

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

        if ($this->request->is(['patch', 'post', 'put'])) {
            /*$old_password = (new DefaultPasswordHasher)->hash($this->request->getData('old_password'));
            debug($old_password);
            debug($user->password);
            debug($this->request->getData('old_password'));
            debug($this->request->getData('password'));*/
            if ((new DefaultPasswordHasher)->check($this->request->getData('old_password'), $user->password)) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                // debug($user);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your password has been updated.'));
                    return $this->redirect(['action' => 'profile']);
                }
                $this->Flash->error(__('The details could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('Your old password does not match.'));
            }            
            
        }

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
        $user = $this->Users->get($id, [
            'contain' => [],
            'fields' => ['id'  , 'username' , 'name' , 'email' , 'phone_no', 'group_id', 'file', 'dir',
                                ]
        ]);
        if ($this->Auth->user('group_id') != 1 && $this->Auth->user('id') != $id) {
            $this->Flash->error(__('You can only edit your profile.'));
            return $this->redirect(['action' => 'profile']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            // debug($this->request->getData())
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                'fieldList' => ['id'  , 'username' , 'name' , 'email' ,  'file',  'phone_no' ]
            ]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The details have been updated.'));
                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The details could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
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

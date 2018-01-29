<?php
namespace App\Controller\Manager;

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
            'Applications' => ['scope' => 'application'],
            'Amendments' => ['scope' => 'amendment'],
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

    
    public function dashboard() {
        $this->loadModel('Applications');
        $this->paginate = [
            'limit' => 15,
        ];

        $applications = $this->paginate($this->Applications->find('all')->where(['submitted' => 2, 'report_type' => 'Initial']), ['scope' => 'application', 'order' => ['Applications.status' => 'asc', 'Applications.id' => 'desc'],
                                    'fields' => ['Applications.id', 'Applications.created', 'Applications.protocol_no', 'Applications.submitted']]);

        $amendments = $this->paginate($this->Users->Amendments->find('all', array(
            //'fields' => array('id','user_id', 'created', 'protocol_no', 'public_title', 'submitted'),
            'order' => array('Amendments.created' => 'desc'),
            'contain' => ['ParentApplications'],
            'conditions' => ['Amendments.submitted' => 2, 'Amendments.report_type' => 'Amendment'],
        )), 
            ['scope' => 'amendment']);

        $this->set(compact('applications', 'amendments'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => ['Designations', 'Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);*/
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

        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
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

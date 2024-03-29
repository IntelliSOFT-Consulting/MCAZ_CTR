<?php
namespace App\Controller\Applicant;

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
        'Applications' => ['scope' => 'application'],
        'Amendments' => ['scope' => 'amendment'],
    ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
    }
    public function generate_audit_trail($id, $message)
    {
        $logsTable = \Cake\ORM\TableRegistry::getTableLocator()->get('AuditTrails');
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $name = $this->Auth->user('email');
        $time = date('Y-m-d H:i:s');
        $message = $message . " at {$time} by {$name}";
        $logsTable->createLogEntry($id, 'Application', $message, $ipAddress);
    }

    public function dashboard() {
        $this->paginate = ['limit' => 5];
        $applications = $this->paginate($this->Users->Applications->find('all', array(
            'fields' => array('id','user_id', 'created', 'protocol_no', 'public_title', 'submitted', 'status', 'approved'),
            'order' => array('Applications.protocol_no' => 'desc', 'Applications.created' => 'desc'),
            'conditions' => ['Applications.user_id' => $this->Auth->User('id'), 'Applications.report_type' => 'Initial'],
        )), 
            ['scope' => 'application']);

        $amendments = $this->paginate($this->Users->Amendments->find('all', array(
            //'fields' => array('id','user_id', 'created', 'protocol_no', 'public_title', 'submitted'),
            'order' => array('Amendments.protocol_no' => 'desc', 'Amendments.created' => 'desc'),
            'contain' => ['ParentApplications'],
            'conditions' => ['Amendments.user_id' => $this->Auth->User('id'), 'Amendments.report_type' => 'Amendment'],
        )), 
            ['scope' => 'amendment']);

        if ($this->request->is('post')) {
            $application = $this->Users->Applications->newEntity();
            $application = $this->Users->Applications->patchEntity($application, $this->request->getData(), ['validate' => false, 'fieldList' => 
                ['user_id', 'email_address']]);

            $application->user_id = $this->Auth->User('id');
            if ($this->Users->Applications->save($application)) {
                $message="The application has been created";
                $this->generate_audit_trail($application->id, $message);
                $this->Flash->success(__('The application has been created'));
                $this->redirect(array('controller' => 'applications', 'action' => 'edit', $application->id));
            } else {
                $this->Flash->error(__('The application could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        }

        $this->set(compact('applications', 'amendments'));
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);

    }
}

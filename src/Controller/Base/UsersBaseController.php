<?php
namespace App\Controller\Base;

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
class UsersBaseController extends AppController
{
    public $paginate = [
            // 'limit' => 2,
            'Applications' => ['scope' => 'application'],
            'Amendments' => ['scope' => 'amendment'],
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       $this->loadModel('Users');      
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
        $this->render('/Base/Users/dashboard');
    }
}

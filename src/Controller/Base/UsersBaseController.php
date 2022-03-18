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
        $this->loadModel('SeventyFives');
        $this->loadModel('Attachments');
        $this->paginate = [
            'limit' => 10,
        ];

        $app_query = $this->Applications->find('all')->where(
            ['submitted' => 2, 'report_type' => 'Initial', //'ifnull(approved, "N") NOT IN' => ['Authorize', 'DirectorAuthorize', 'Declined']
        ], 
            ['order' => ['Applications.id' => 'desc']]);


        //Evaluators and External evaluators only to view if assigned
        // if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {
        //     $app_query->matching('AssignEvaluators', function ($q) {
        //         return $q->where(['AssignEvaluators.assigned_to' => $this->Auth->user('id')]);
        //     });
        // }

        //Above lines commented to allow evaluators view a report


        //Finance only able to see FN
        if ($this->Auth->user('group_id') == 5) {
            $app_query->andWhere(['Applications.protocol_no LIKE' => '%FN%']);
        }
        // Secretary General only able to view once it has been approved
        if ($this->Auth->user('group_id') == 7) {
            $app_query->andWhere(['Applications.status IN' => ['DirectorGeneral', 'DirectorAuthorize']]);
            // $app_query->matching('ApplicationStages', function ($q) {
            //     return $q->where(['ApplicationStages.stage_id' => 9]);
            // });
        }

        $applications = $this->paginate($app_query, ['scope' => 'application', 'order' => ['Applications.protocol_no' => 'desc', 'Applications.status' => 'asc', 'Applications.id' => 'desc'],
                                    'fields' => ['Applications.id', 'Applications.created', 'Applications.protocol_no', 'Applications.submitted', 'Applications.status']]);
        $amt_query = $this->Users->Amendments->find('all', array(
            //'fields' => array('id','user_id', 'created', 'protocol_no', 'public_title', 'submitted'),
            'order' => array('Amendments.protocol_no' => 'desc', 'Amendments.created' => 'desc'),
            'contain' => ['ParentApplications'],
            'conditions' => ['Amendments.submitted' => 2, 'Amendments.report_type' => 'Amendment'],
        ));
        $s75_query = $this->SeventyFives->find('all', array(
            'order' => array('SeventyFives.created' => 'desc'),
            'contain' => ['Applications' => ['AssignEvaluators']]
        ));
        //Evaluators and External evaluators only to view if assigned
        if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {
            $s75_query->matching('Applications.AssignEvaluators', function ($q) {
                return $q->where(['AssignEvaluators.assigned_to' => $this->Auth->user('id')]);
            });
        }
        $attachment_query = $this->Attachments->find('all', array(
            'order' => array('Attachments.created' => 'desc'),
        ))
        ->where(['model' => 'Applications', 'Attachments.category' => 'attachments'])
        ;
        //Evaluators and External evaluators only to view if assigned
        if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {
            $attachment_query->join([
                    'c' => [
                        'table' => 'applications',
                        'type' => 'INNER',
                        'conditions' => 'c.id = Attachments.foreign_key',
                    ],
                    'u' => [
                        'table' => 'assign_evaluators',
                        'type' => 'INNER',
                        'conditions' => 'u.application_id = c.id',
                    ]
                ]);
        }
        //Finance only able to see FN
        if ($this->Auth->user('group_id') == 5) {
            $amt_query->andWhere(['Amendments.protocol_no LIKE' => '%FN%']);
        }
        if ($this->Auth->user('group_id') == 3 or $this->Auth->user('group_id') == '6') {
            $amt_query->matching('AssignEvaluators', function ($q) {
                return $q->where(['AssignEvaluators.assigned_to' => $this->Auth->user('id')]);
            });
        }
        // Secretary General only able to view once it has been approved
        /*if ($this->Auth->user('group_id') == 7) {
            $amt_query->matching('ApplicationStages', function ($q) {
                return $q->where(['ApplicationStages.stage_id' => 9]);
            });
        }*/
        
        $amendments = $this->paginate($amt_query, 
            ['scope' => 'amendment']);
        $seventy_fives = $this->paginate($s75_query, 
            ['scope' => 'seventy']);
        $attachments = $this->paginate($attachment_query, 
            ['scope' => 'attachment']);

        $this->set(compact('applications', 'amendments', 'seventy_fives', 'attachments'));
        $this->render('/Base/Users/dashboard');
    }
}

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
    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
    }


    public function dashboard() {
        // $this->paginate = [
        //     'contain' => [ 'Groups']
        // ];
        // $users = $this->paginate($this->Users);

        // $this->set(compact('users'));
        // $this->set('_serialize', ['users']);

        //
        $applications = $this->Users->Applications->find('all', array(
            'limit' => 10,
            'fields' => array('id','user_id', 'created', 'protocol_no',
                'study_drug', 'submitted', 'trial_status_id'),
            'order' => array('created' => 'desc'),
            'contain' => array(),
            'conditions' => ['user_id' => $this->Auth->User('id'), 'report_type' => 'Initial'],
        ));

        $trial_statuses = $this->Users->Applications->TrialStatuses->find('list');
        $notifications = $this->Users->Notifications->find('all', array(
            'conditions' => array('user_id' => $this->Auth->User('id')), 'order' => 'created DESC'
            ));

        if ($this->request->is('post')) {
            $application = $this->Users->Applications->newEntity();
            $application = $this->Users->Applications->patchEntity($application, $this->request->getData(), ['validate' => false, 'fieldList' => 
                ['user_id', 'email_address']]);

            $application->user_id = $this->Auth->User('id');
            if ($this->Users->Applications->save($application)) {
                $this->Flash->success(__('The application has been created'));
                $this->redirect(array('controller' => 'applications', 'action' => 'edit', $application->id));
            } else {
                $this->Flash->error(__('The application could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        }

        $this->set(compact('applications', 'notifications', 'trial_statuses'));
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

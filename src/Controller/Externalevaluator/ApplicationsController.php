<?php
namespace App\Controller\Externalevaluator;

use App\Controller\Base\ApplicationsBaseController;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[] paginate($object = null, array $settings = [])
 */
class ApplicationsController extends ApplicationsBaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];

        // $applications = $this->paginate($this->Applications,['finder' => ['status' => $id]]);
        if($this->request->getQuery('status')) {$applications = $this->paginate($this->Applications->find('all')->where(['status' => $this->request->getQuery('status'), 'submitted' => 2, 'report_type' => 'Initial'])->matching('AssignEvaluators', function ($q) {
                return $q->where(['AssignEvaluators.assigned_to' => $this->Auth->user('id')]);
            }), ['order' => ['Applications.id' => 'desc']]); }
        else {$applications = $this->paginate($this->Applications->find('all')->where(['submitted' => 2, 'report_type' => 'Initial'])->matching('AssignEvaluators', function ($q) {
                return $q->where(['AssignEvaluators.assigned_to' => $this->Auth->user('id')]);
            }), ['order' => ['Applications.id' => 'desc']]);}

        //$applications = $this->paginate($this->Applications);

        $this->set(compact('applications'));
        $this->set('_serialize', ['applications']);
    }
}

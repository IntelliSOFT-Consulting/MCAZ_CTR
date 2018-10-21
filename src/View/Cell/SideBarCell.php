<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SideBar cell
 */
class SideBarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $prefix = null;
        if($this->request->session()->read('Auth.User.group_id') == 1) {$prefix = 'admin';} 
        if ($this->request->session()->read('Auth.User.group_id') == 2) { $prefix = 'manager'; }
        if ($this->request->session()->read('Auth.User.group_id') == 3) { $prefix = 'evaluator'; }
        if ($this->request->session()->read('Auth.User.group_id') == 6) { $prefix = 'external_evaluator'; }
        if ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'applicant'; }
        if ($this->request->session()->read('Auth.User.group_id') == 5) { $prefix = 'finance'; }
        

        $this->loadModel('Applications');
        $this->loadModel('Notifications');

        $application_stats = $this->Applications->find('all')->select([ 
            'status' => 'case when approved in ("Authorize", "DirectorAuthorize") then approved else status end',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['report_type' => 'Initial'])
                             ->group('case when approved in ("Authorize", "DirectorAuthorize") then approved else status end');

        //Evaluators and External evaluators only to view if assigned
        if ($this->request->session()->read('Auth.User.group_id') == 3 or $this->request->session()->read('Auth.User.group_id') == '6') {
            $application_stats->matching('AssignEvaluators', function ($q) {
                return $q->where(['AssignEvaluators.assigned_to' => $this->request->session()->read('Auth.User.group_id')]);
            });
        }
        
        $amendment_stats = $this->Applications->find('all')
                                    ->select(['status',
                                              'count' => $this->Applications->find('all')->func()->count('distinct Applications.id')
                                             ])
                                            ->where(['Applications.report_type' => 'Amendment'])
                                            ->group(['status']);
        //Evaluators and External evaluators only to view if assigned
        if ($this->request->session()->read('Auth.User.group_id') == 3 or $this->request->session()->read('Auth.User.group_id') == '6') {
            $amendment_stats->matching('AssignEvaluators', function ($q) {
                return $q->where(['AssignEvaluators.assigned_to' => $this->request->session()->read('Auth.User.group_id')]);
            });
        }
        /*$amendment_stats = $this->Applications->find('all')
                                    ->innerJoinWith('ApplicationStages.Stages')
                                    ->select(['status' => 'Stages.name',
                                              'count' => $this->Applications->find('all')->func()->count('distinct Applications.id')
                                             ])
                                            ->where(['Applications.report_type' => 'Amendment'])
                                            ->group(['Stages.name']);*/
        $ncount = $this->Notifications->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id')])->count();
        $this->set(['prefix'=> $prefix, 'application_stats' => $application_stats, 'amendment_stats' => $amendment_stats, 'ncount' => $ncount]);
    }

}

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
        if ($this->request->session()->read('Auth.User.group_id') == 3) { $prefix = 'internal_evaluator'; }
        if ($this->request->session()->read('Auth.User.group_id') == 6) { $prefix = 'external_evaluator'; }
        if ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'applicant'; }
        if ($this->request->session()->read('Auth.User.group_id') == 5) { $prefix = 'finance'; }
        

        $this->loadModel('Applications');
        $this->loadModel('Notifications');

        $application_stats = $this->Applications->find('all')->select([ 'status',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['report_type' => 'Initial'])
                                                 ->group('status');
        $amendment_stats = $this->Applications->find('all')->select([ 'status',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['report_type' => 'Amendment'])
                                                 ->group('status');
        $ncount = $this->Notifications->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id')])->count();
        $this->set(['prefix'=> $prefix, 'application_stats' => $application_stats, 'amendment_stats' => $amendment_stats, 'ncount' => $ncount]);
    }

}

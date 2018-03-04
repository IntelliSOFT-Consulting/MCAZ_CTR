<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Site cell
 */
class SiteCell extends Cell
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
    }
    public function home()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(1, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function news()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(2, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function faqs()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(3, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function contactus()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(4, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function fees()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(5, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function calendar()
    {
        $this->loadModel('Sites');
        $this->loadModel('CommitteeDates');
        $committee_dates = $this->paginate($this->CommitteeDates->find('all', ['order' => ['CommitteeDates.created' => 'desc']]));

        $site = $this->Sites->get(6, [ 'contain' => []]);


        $prefix = null;
        if($this->request->session()->read('Auth.User.group_id') == 1) {$prefix = 'admin';} 
        elseif ($this->request->session()->read('Auth.User.group_id') == 2) { $prefix = 'manager'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 3) { $prefix = 'evaluator';  }
        elseif ($this->request->session()->read('Auth.User.group_id') == 6) { $prefix = 'external_evaluator'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 7) { $prefix = 'director_general'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 5) { $prefix = 'finance'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'applicant'; }

        $this->set(compact('site', 'prefix', 'committee_dates'));
    }
}

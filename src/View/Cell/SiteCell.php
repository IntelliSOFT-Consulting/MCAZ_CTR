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
}

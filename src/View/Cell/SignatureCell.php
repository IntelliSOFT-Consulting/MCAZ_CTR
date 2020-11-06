<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Signature cell
 */
class SignatureCell extends Cell
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
    public function render($template = null)
    {
        if ($this->viewBuilder()->className() == 'CakePdf\View\PdfView') {
            $this->viewBuilder()->className('Cake\View\View');
        }
        return parent::render($template);
    }

    public function display($id)
    {        
        $this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);

    }

    public function manager($id)
    {    
        // In a controller or table method.
        $this->loadModel('Users');
        $query = $this->Users->find('all', [
            'conditions' => ['Users.id' => $id, 'Users.group_id' => 2],
            'contain' => []
        ]);
        $user = $query->first();

        // $user = $this->Users->get($id, [
        //     'contain' => []
        // ]);

        $this->set('user', $user);

    }

    public function evaluator($id)
    {        
        $this->loadModel('Users');
        $query = $this->Users->find('all', [
            'conditions' => ['Users.id' => $id, 'Users.group_id' => 3],
            'contain' => []
        ]);
        $user = $query->first();

        $this->set('user', $user);

    }

    public function index($id)
    {        
        $this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);

    }
}

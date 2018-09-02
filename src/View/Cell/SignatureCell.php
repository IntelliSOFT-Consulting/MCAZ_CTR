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
    public function display($id)
    {        
        $this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

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

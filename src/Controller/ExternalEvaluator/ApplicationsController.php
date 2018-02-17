<?php
namespace App\Controller\ExternalEvaluator;

use App\Controller\Base\ApplicationsBaseController;
use Cake\ORM\Entity;
use Cake\View\Helper\HtmlHelper; 
use Cake\Utility\Hash;

class ApplicationsController extends ApplicationsBaseController
{
    public function view($id = null) {
        parent::view($id);
        if(!in_array($this->Auth->user('id'), $this->filt)) {
            $this->Flash->error('You have not been assigned the protocol for review! Kindly contact MCAZ.');
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
        }
    }
}

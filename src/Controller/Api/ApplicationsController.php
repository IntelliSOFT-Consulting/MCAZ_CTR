<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Sadrs Controller
 *
 * @property \App\Model\Table\SadrsTable $Sadrs
 *
 * @method \App\Model\Entity\Sadr[] paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        //$this->Auth->allow(['index', 'protocols']);
    }

    public function index($query = null) {
        $applications = $this->Applications->find('all')
                ->where(['protocol_no LIKE' => '%'.$this->request->getQuery('term').'%', 'report_type' => 'Initial', 'approved' => 'Approved', 
                         'submitted' => 2])
                ->contain(['InvestigatorContacts'])
                ->limit(10); 
        
        $codes = array();
        foreach ($applications as $key => $value) {
            $codes[] = array('value' => $value['protocol_no'], 'label' => $value['public_title'], 'sponsor' => $value['sponsor_name'], 'dist' => $value['InvestigatorContacts'][0]['given_name']);
        }
        $this->set('codes', $codes);
        $this->set('_serialize', 'codes');
    }

    public function protocols($query = null) {
        $applications = $this->Applications->find('all')
                ->where(['protocol_no LIKE' => '%'.$this->request->getQuery('term').'%', 'report_type' => 'Initial', 'approved' => 'Approved', 
                         'submitted' => 2])
                ->contain(['InvestigatorContacts'])
                ->limit(10); 
        
        $codes = array();
        foreach ($applications as $key => $value) {
            $codes[] = array('value' => $value['protocol_no'], 'label' => $value['public_title'], 'sponsor' => $value['sponsor_name'], 'dist' => $value['InvestigatorContacts'][0]['given_name']);
        }
        $this->set('codes', $codes);
        $this->set('_serialize', 'codes');
    }

}

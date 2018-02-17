<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    public function initialize() {
       parent::initialize();
       $this->loadModel('Applications');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //Just render page for now...
        /*$this->loadModel('Applications');
        $application_stats = $this->Applications->find('all')->select([ 'Provinces.province_name',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['province_id IS NOT' => null])
                                                 ->group('Provinces.province_name')
                                                 ->contain(['Provinces'])
                                                 ->hydrate(false);
        $this->set('application_stats', $application_stats);
        $this->set('_serialize', ['application_stats']);*/
        

    }

    public function protocolsPerYear()
    {
        $application_stats = $this->Applications->find('all')->select([ 'year' => 'date_format(created,"%Y")',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 // ->where(['province_id IS NOT' => null])
                                                 ->group('year')
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Protocols per year',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function protocolsPerMonth()
    {
        $application_stats = $this->Applications->find('all')->select([ 'mnth' => 'date_format(created,"%b")',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 // ->where(['province_id IS NOT' => null])
                                                 ->group('mnth')
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['mnth'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Protocols by month',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

}

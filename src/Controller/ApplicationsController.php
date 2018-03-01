<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[] paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{
    public function initialize() {
       parent::initialize();
       $this->Auth->allow(['index', 'view', 'protocols']);       
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);
    }

    public function protocols($query = null) {
        $applications = $this->Applications->find('all')
                ->where(['protocol_no LIKE' => '%'.$this->request->getQuery('term').'%', 'report_type' => 'Initial', 'approved' => 'Authorized', 
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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
           // 'contain' => $this->_contain
        ];

        $query = $this->Applications
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->query])
            ->leftJoinWith('InvestigatorContacts')
            ->leftJoinWith('Sponsors')
            ->leftJoinWith('SiteDetails')
            ->leftJoinWith('Medicines')
            // You can add extra things to the query if you need to
            ->where([['report_type' => 'Initial', 'approved' => 'Authorized', 'status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not']])
            ->distinct();

        //$this->set(compact('applications'));
        $this->set('applications', $this->paginate($query));
    }

    public function view($id = null) {
        //TODO: Restrict evaluators only assigned
        // $this->viewBuilder()->setLayout('vanilla');
        // => function ($q) { return $q->where(['Amendments.submitted' => 2]);        }
        $contains = $this->_contain;
        //unset($contains[array_search('Amendments', $contains)]);
        $contains['Amendments'] =  function ($q) { return $q->where(['Amendments.submitted' => 2]); };

        $application = $this->Applications->get($id, [
            'contain' => $contains,
            'conditions' => (['report_type' => 'Initial', 'submitted' => 2, 'approved' => 'Authorized'])
        ]);
        if ($this->request->params['_ext'] === 'pdf') {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => (isset($application->protocol_no)) ? $application->protocol_no.'.pdf' : 'CT_'.$id.'.pdf'
                ]
            ]);
        }

        $provinces = $this->Applications->SiteDetails->Provinces->find('list', ['limit' => 200]);
                
        $this->set(compact('application', 'provinces'));
        $this->set('_serialize', ['application']);
    }


    
}

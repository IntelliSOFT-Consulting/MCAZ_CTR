<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    use \Crud\Controller\ControllerTrait;

    protected $_contain;

    protected $a_contain = ['PreviousDates', 'InvestigatorContacts', 'Participants', 'Sponsors', 'SiteDetails', 'Placebos',    'Medicines', 'Protocols', 'Attachments', 'Receipts', 'Registrations', 'Policies', 'Proofs', 'Committees', 'Fees', 'Mc10Forms', 'LegalForms', 'CoverLetters', 'Leaflets', 'Brochures', 'InvestigatorCvs', 'Declarations', 'StudyMonitors', 'MonitoringPlans', 'PiDeclarations', 'StudySponsorships', 'PharmacyPlans', 'PharmacyLicenses', 'StudyMedicines', 'InsuranceCertificates', 'GenericInsurances', 'EthicsApprovals', 'EthicsLetters', 'CountryApprovals', 'Advertisments', 'SafetyMonitors', 'BiologicalProducts', 'Dossiers', 'FinanceApprovals', 'FinanceApprovals.Attachments', 'AssignEvaluators', 'Evaluations', 
    'CommitteeReviews', 'CommitteeReviews.Comments', 'CommitteeReviews.Comments.Attachments', 'Appeals', 'Appeals.Attachments', 'Appeals.Users',
    'EvaluationComments', 'EvaluationComments.Attachments', 
    'DgReviews', 'DgReviews.Users', 'DgReviews.Attachments', 'FinalStages', 'FinalStages.Users', 'FinalStages.Attachments', 'AnnualApprovals', 'AnnualApprovals.Users', 'AnnualApprovals.Attachments', 'EvaluationHeaders', 'RequestInfos', 'RequestInfos.Users', 'RequestInfos.Attachments', 'SeventyFives', 'GcpInspections', 'ParentApplications', 'ApplicationStages', 'ApplicationStages.Stages'];

    public $components = [
        'Acl' => [
            'className' => 'Acl.Acl'
        ],
        'RequestHandler',
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog'
            ]
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->_contain = ['PreviousDates', 'InvestigatorContacts', 'Participants', 'Sponsors', 'SiteDetails', 'Placebos', 'Medicines', 'Protocols', 'Attachments', 'Receipts', 'Registrations', 'Policies', 'Proofs', 'Committees', 'Fees', 'Mc10Forms', 'LegalForms', 'CoverLetters', 'Leaflets', 'Brochures', 'InvestigatorCvs', 'Declarations', 'StudyMonitors', 'MonitoringPlans', 'PiDeclarations', 'StudySponsorships', 'PharmacyPlans', 'PharmacyLicenses', 'StudyMedicines', 'InsuranceCertificates', 'GenericInsurances', 'EthicsApprovals', 'EthicsLetters', 'CountryApprovals', 'Advertisments', 'SafetyMonitors', 'BiologicalProducts', 'Dossiers', 'FinanceApprovals', 'FinanceApprovals.Attachments', 'AssignEvaluators', 'ApplicationStages', 'ApplicationStages.Stages', 'Amendments', 'Amendments.InvestigatorContacts', 'Amendments.Participants', 'Amendments.SiteDetails', 'Amendments.Medicines', 'Amendments.Registrations', 'Amendments.Policies',  'Amendments.Proofs', 'Amendments.Committees', 'Amendments.CoverLetters', 'Amendments.Fees', 'Amendments.LegalForms', 'Amendments.Protocols', 'Amendments.Leaflets', 'Amendments.Brochures', 'Amendments.InvestigatorCvs', 'Amendments.Declarations', 'Amendments.StudyMonitors', 'Amendments.MonitoringPlans', 'Amendments.PiDeclarations', 'Amendments.PharmacyPlans', 'Amendments.StudySponsorships', 'Amendments.PharmacyLicenses', 'Amendments.StudyMedicines', 'Amendments.InsuranceCertificates', 'Amendments.GenericInsurances', 'Amendments.EthicsApprovals', 'Amendments.EthicsLetters', 'Amendments.CountryApprovals', 'Amendments.Advertisments', 'Amendments.SafetyMonitors', 'Amendments.BiologicalProducts', 'Amendments.Dossiers', 'Amendments.Mc10Forms', 'Amendments.Receipts', 'Amendments.Attachments', 'Amendments.ApplicationStages', 'Amendments.ApplicationStages.Stages', 'Evaluations', 'CommitteeReviews', 'CommitteeReviews.Comments', 'CommitteeReviews.Comments.Attachments', 'Appeals', 'Appeals.Attachments', 'Appeals.Users',
        'EvaluationComments', 'EvaluationComments.Attachments', 
        'DgReviews', 'DgReviews.Users', 'DgReviews.Attachments', 'FinalStages', 'FinalStages.Users', 'FinalStages.Attachments', 'AnnualApprovals', 'AnnualApprovals.Users', 'AnnualApprovals.Attachments', 'EvaluationHeaders', 'RequestInfos', 'RequestInfos.Users', 'RequestInfos.Attachments', 'SeventyFives', 'SeventyFives.Users', 'GcpInspections', 'GcpInspections.Users',];

        $this->loadComponent('RequestHandler', ['viewClassMap' => ['csv' => 'CsvView.Csv']]);

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $prefix = null;
        if($this->request->session()->read('Auth.User.group_id') == 1) {$prefix = 'admin';} 
        elseif ($this->request->session()->read('Auth.User.group_id') == 2) { $prefix = 'manager';  }
        elseif ($this->request->session()->read('Auth.User.group_id') == 3) { $prefix = 'evaluator'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'applicant'; }

        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'loginAction' => [
                'plugin' => false,
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'plugin' => false,
                'prefix' => 'applicant',
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'plugin' => false,
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'pages',
                'action' => 'home',
                'prefix' => false,
                'plugin' => false
            ],
            'authError' => 'You are not authorized to access that location.',
            'loginError' => 'You are not authorized to access that location.',
            'flash' => [
                'element' => 'error'
            ]
        ]);
        // $this->Auth->allow(); 
    }

    /*1. Ported from 1.2*/
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow('display'); 
        //if admin prefix, redirect to admin
        // $this->viewBuilder()->setLayout('admin');
        // if($this->Auth->user('group_id')!= 'applicant') {
        //     $this->viewBuilder()->setLayout('admin');
        // }
    }    
    /*end 1*/


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        //pass prefix to all controllers
        $prefix = null;
        if($this->request->session()->read('Auth.User.group_id') == 1) {$prefix = 'admin'; $this->viewBuilder()->setLayout('admin');} 
        elseif ($this->request->session()->read('Auth.User.group_id') == 2) { $prefix = 'manager';  $this->viewBuilder()->setLayout('admin');}
        elseif ($this->request->session()->read('Auth.User.group_id') == 3) { $prefix = 'evaluator'; $this->viewBuilder()->setLayout('admin'); }
        elseif ($this->request->session()->read('Auth.User.group_id') == 6) { $prefix = 'external_evaluator'; $this->viewBuilder()->setLayout('admin'); }
        elseif ($this->request->session()->read('Auth.User.group_id') == 7) { $prefix = 'director_general'; $this->viewBuilder()->setLayout('admin'); }
        elseif ($this->request->session()->read('Auth.User.group_id') == 5) { $prefix = 'finance'; $this->viewBuilder()->setLayout('admin'); }
        elseif ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'applicant'; }
        $this->set(['prefix'=> $prefix]);
    }
}

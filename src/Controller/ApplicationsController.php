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
    
    public function mc10($id = null)
    {
        // $this->viewBuilder()->setLayout('vanilla');
        $application = $this->Applications->get($id, [
            'contain' => ['InvestigatorContacts', 'Participants', 'Sponsors', 'SiteDetails', 'Placebos',
                          'CoverLetters', 'Protocols', 'Attachments', 'Registrations', 'Policies', 'Details', 'Committees', 'Fees', 'Mc10Forms', 'LegalForms']
        ]);

        $this->set('application', $application);
        $this->set('_serialize', ['application']);
    }

    
}

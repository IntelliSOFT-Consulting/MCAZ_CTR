<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Utility\Text;

/**
 * Certificate cell
 */
class CertificateCell extends Cell
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
        $this->loadModel('Messages');
        $this->loadModel('Applications');
        $message = $this->Messages->findByName('authorization_certificate')->first();
        $application = $this->Applications->get($id, [
            'contain' => ['InvestigatorContacts']
        ]);

        $data['vars']['protocol_no'] = $application->protocol_no;
        $data['vars']['scientific_title'] = $application->scientific_title;
        $data['vars']['principal_investigator'] = (!empty($application->investigator_contacts[0]['given_name'])) ? $application->investigator_contacts[0]['given_name'].' '.$application->investigator_contacts[0]['middle_name'].' '.$application->investigator_contacts[0]['family_name'] : '';
        $data['vars']['business_name'] = $application->business_name;
        $data['vars']['protocol_version'] = $application->protocol_version;
        $data['vars']['date_of_protocol'] = $application->date_of_protocol;

        $ofela = Text::insert($message['content'], $data['vars']);
        $this->set('ofela', $ofela);
    }
}

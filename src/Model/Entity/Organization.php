<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organization Entity
 *
 * @property int $id
 * @property int $application_id
 * @property string $organization
 * @property string $contact_person
 * @property string $address
 * @property string $telephone_number
 * @property string $all_tasks
 * @property string $monitoring
 * @property string $regulatory
 * @property string $investigator_recruitment
 * @property string $ivrs_treatment_randomisation
 * @property string $data_management
 * @property string $e_data_capture
 * @property string $susar_reporting
 * @property string $quality_assurance_auditing
 * @property string $statistical_analysis
 * @property string $medical_writing
 * @property string $other_duties
 * @property string $other_duties_specify
 * @property string $misc
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 */
class Organization extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'application_id' => true,
        'organization' => true,
        'contact_person' => true,
        'address' => true,
        'telephone_number' => true,
        'all_tasks' => true,
        'monitoring' => true,
        'regulatory' => true,
        'investigator_recruitment' => true,
        'ivrs_treatment_randomisation' => true,
        'data_management' => true,
        'e_data_capture' => true,
        'susar_reporting' => true,
        'quality_assurance_auditing' => true,
        'statistical_analysis' => true,
        'medical_writing' => true,
        'other_duties' => true,
        'other_duties_specify' => true,
        'misc' => true,
        'created' => true,
        'modified' => true,
        'application' => true
    ];
}

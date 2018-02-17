<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sponsor Entity
 *
 * @property int $id
 * @property int $application_id
 * @property string $sponsor
 * @property string $contact_person
 * @property string $address
 * @property string $telephone_number
 * @property string $fax_number
 * @property string $cell_number
 * @property string $email_address
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 */
class Sponsor extends Entity
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
        'sponsor' => true,
        'contact_person' => true,
        'address' => true,
        'telephone_number' => true,
        'fax_number' => true,
        'cell_number' => true,
        'email_address' => true,
        'created' => true,
        'modified' => true,
        'application' => true
    ];
}

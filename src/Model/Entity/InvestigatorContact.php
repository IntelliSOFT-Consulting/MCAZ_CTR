<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvestigatorContact Entity
 *
 * @property int $id
 * @property int $application_id
 * @property string $given_name
 * @property string $middle_name
 * @property string $family_name
 * @property string $qualification
 * @property string $professional_address
 * @property string $telephone
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 */
class InvestigatorContact extends Entity
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
        '*' => true,
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SiteDetail Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $county_id
 * @property string $site_name
 * @property string $physical_address
 * @property string $contact_details
 * @property string $contact_person
 * @property string $site_capacity
 * @property string $misc
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\County $county
 */
class SiteDetail extends Entity
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

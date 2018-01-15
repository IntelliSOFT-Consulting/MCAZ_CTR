<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participant Entity
 *
 * @property int $id
 * @property int $application_id
 * @property string $name
 * @property string $occupation
 * @property string $address
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $place_of_birth
 * @property string $file
 * @property string $dir
 * @property string $size
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 */
class Participant extends Entity
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
        'name' => true,
        'occupation' => true,
        'address' => true,
        'date_of_birth' => true,
        'place_of_birth' => true,
        'file' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'application' => true
    ];
}

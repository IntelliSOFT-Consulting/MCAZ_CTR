<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaefiListOfVaccine Entity
 *
 * @property int $id
 * @property int $saefi_id
 * @property string $vaccine_name
 * @property int $vaccination_doses
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Saefi $saefi
 */
class SaefiListOfVaccine extends Entity
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
        'saefi_id' => true,
        'vaccine_name' => true,
        'vaccination_doses' => true,
        'created' => true,
        'modified' => true,
        'saefi' => true
    ];
}

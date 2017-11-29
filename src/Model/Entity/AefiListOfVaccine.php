<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AefiListOfVaccine Entity
 *
 * @property int $id
 * @property int $aefi_id
 * @property string $vaccine_name
 * @property \Cake\I18n\FrozenTime $vaccination_date
 * @property string $dosage
 * @property string $batch_number
 * @property \Cake\I18n\FrozenDate $expiry_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Aefi $aefi
 * @property \App\Model\Entity\Dose $dose
 */
class AefiListOfVaccine extends Entity
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
        'aefi_id' => true,
        'vaccine_name' => true,
        'vaccination_date' => true,
        'dosage' => true,
        'batch_number' => true,
        'expiry_date' => true,
        'created' => true,
        'modified' => true,
        'aefi' => true,
        'dose' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AefiListOfDiluent Entity
 *
 * @property int $id
 * @property int $aefi_id
 * @property string $diluent_name
 * @property \Cake\I18n\FrozenTime $diluent_date
 * @property string $batch_number
 * @property \Cake\I18n\FrozenDate $expiry_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Aefi $aefi
 */
class AefiListOfDiluent extends Entity
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
        'diluent_name' => true,
        'diluent_date' => true,
        'batch_number' => true,
        'expiry_date' => true,
        'created' => true,
        'modified' => true,
        'aefi' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SadrOtherDrug Entity
 *
 * @property int $id
 * @property int $sadr_id
 * @property string $drug_name
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $stop_date
 * @property string $suspected_drug
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Sadr $sadr
 */
class SadrOtherDrug extends Entity
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

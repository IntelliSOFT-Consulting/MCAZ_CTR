<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdrOtherDrug Entity
 *
 * @property int $id
 * @property int $adr_id
 * @property string $drug_name
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $stop_date
 * @property string $relationship_to_sae
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Adr $adr
 */
class AdrOtherDrug extends Entity
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
        'adr_id' => true,
        'drug_name' => true,
        'start_date' => true,
        'stop_date' => true,
        'relationship_to_sae' => true,
        'created' => true,
        'modified' => true,
        'adr' => true
    ];
}

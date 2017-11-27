<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdrListOfDrug Entity
 *
 * @property int $id
 * @property int $adr_id
 * @property string $drug_name
 * @property string $dosage
 * @property int $dose_id
 * @property int $route_id
 * @property int $frequency_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $stop_date
 * @property string $taking_drug
 * @property string $relationship_to_sae
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Adr $adr
 * @property \App\Model\Entity\Dose $dose
 * @property \App\Model\Entity\Route $route
 * @property \App\Model\Entity\Frequency $frequency
 */
class AdrListOfDrug extends Entity
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
        'dosage' => true,
        'dose_id' => true,
        'route_id' => true,
        'frequency_id' => true,
        'start_date' => true,
        'stop_date' => true,
        'taking_drug' => true,
        'relationship_to_sae' => true,
        'created' => true,
        'modified' => true,
        'adr' => true,
        'dose' => true,
        'route' => true,
        'frequency' => true
    ];
}

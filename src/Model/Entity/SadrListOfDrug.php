<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SadrListOfDrug Entity
 *
 * @property int $id
 * @property int $sadr_id
 * @property int $sadr_followup_id
 * @property int $dose_id
 * @property int $route_id
 * @property int $frequency_id
 * @property string $drug_name
 * @property string $brand_name
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $stop_date
 * @property string $indication
 * @property string $suspected_drug
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Dose $dose
 * @property \App\Model\Entity\Sadr $sadr
 * @property \App\Model\Entity\SadrFollowup $sadr_followup
 * @property \App\Model\Entity\Route $route
 * @property \App\Model\Entity\Frequency $frequency
 */
class SadrListOfDrug extends Entity
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
        // 'dose' => true,
    ];
}

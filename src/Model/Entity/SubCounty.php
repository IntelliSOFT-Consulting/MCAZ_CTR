<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubCounty Entity
 *
 * @property int $id
 * @property int $county_id
 * @property string $sub_county_name
 * @property string $county_name
 * @property string $Province
 * @property string $Pop_2009
 * @property string $RegVoters
 * @property string $AreaSqKms
 * @property string $CAWards
 * @property string $MainEthnicGroup
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\Pqmp[] $pqmps
 * @property \App\Model\Entity\Sadr[] $sadrs
 */
class SubCounty extends Entity
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
        'county_id' => true,
        'sub_county_name' => true,
        'county_name' => true,
        'Province' => true,
        'Pop_2009' => true,
        'RegVoters' => true,
        'AreaSqKms' => true,
        'CAWards' => true,
        'MainEthnicGroup' => true,
        'created' => true,
        'modified' => true,
        'county' => true,
        'pqmps' => true,
        'sadrs' => true
    ];
}

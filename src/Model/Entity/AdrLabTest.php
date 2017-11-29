<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdrLabTest Entity
 *
 * @property int $id
 * @property int $adr_id
 * @property string $lab_test
 * @property string $abnormal_result
 * @property string $site_normal_range
 * @property \Cake\I18n\FrozenDate $collection_date
 * @property string $lab_value
 * @property \Cake\I18n\FrozenDate $lab_value_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Adr $adr
 */
class AdrLabTest extends Entity
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
        'lab_test' => true,
        'abnormal_result' => true,
        'site_normal_range' => true,
        'collection_date' => true,
        'lab_value' => true,
        'lab_value_date' => true,
        'created' => true,
        'modified' => true,
        'adr' => true
    ];
}

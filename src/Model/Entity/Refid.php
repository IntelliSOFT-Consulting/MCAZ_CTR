<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Refid Entity
 *
 * @property int $id
 * @property int $foreign_key
 * @property string $model
 * @property int $refid
 * @property int $year
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Refid extends Entity
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
        'foreign_key' => true,
        'model' => true,
        'refid' => true,
        'year' => true,
        'created' => true,
        'modified' => true
    ];
}

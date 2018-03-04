<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CommitteeDate Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $meeting_date
 * @property string $start_time
 * @property string $end_time
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class CommitteeDate extends Entity
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
        'user_id' => true,
        'meeting_date' => true,
        'start_time' => true,
        'end_time' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}

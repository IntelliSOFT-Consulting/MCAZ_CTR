<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reminder Entity
 *
 * @property int $id
 * @property int $foreign_key
 * @property string $model
 * @property int $user_id
 * @property string $reminder_type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Reminder extends Entity
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
        'user_id' => true,
        'reminder_type' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}

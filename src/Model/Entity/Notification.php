<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $model
 * @property int $foreign_key
 * @property string $title
 * @property string $url
 * @property string $system_message
 * @property string $user_message
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $deleted_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Notification extends Entity
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
        'type' => true,
        'model' => true,
        'foreign_key' => true,
        'title' => true,
        'url' => true,
        'system_message' => true,
        'user_message' => true,
        'deleted' => true,
        'deleted_date' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}

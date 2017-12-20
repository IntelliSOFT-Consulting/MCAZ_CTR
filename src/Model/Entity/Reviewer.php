<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reviewer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $application_id
 * @property string $description
 * @property bool $notified
 * @property string $accepted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Application $application
 */
class Reviewer extends Entity
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
        'application_id' => true,
        'description' => true,
        'notified' => true,
        'accepted' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'application' => true
    ];
}

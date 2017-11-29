<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feedback Entity
 *
 * @property int $id
 * @property string $email
 * @property int $user_id
 * @property int $sadr_id
 * @property int $sadr_followup_id
 * @property int $pqmp_id
 * @property string $feedback
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Sadr $sadr
 * @property \App\Model\Entity\SadrFollowup $sadr_followup
 * @property \App\Model\Entity\Pqmp $pqmp
 */
class Feedback extends Entity
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
        'email' => true,
        'user_id' => true,
        'sadr_id' => true,
        'sadr_followup_id' => true,
        'pqmp_id' => true,
        'feedback' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'sadr' => true,
        'sadr_followup' => true,
        'pqmp' => true
    ];
}

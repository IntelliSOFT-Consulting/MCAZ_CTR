<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $sadr_id
 * @property int $pqmp_id
 * @property int $sadr_followup_id
 * @property string $sender
 * @property string $receiver
 * @property string $subject
 * @property string $message
 * @property int $sent
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Sadr $sadr
 * @property \App\Model\Entity\Pqmp $pqmp
 * @property \App\Model\Entity\SadrFollowup $sadr_followup
 */
class Message extends Entity
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
        'sadr_id' => true,
        'pqmp_id' => true,
        'sadr_followup_id' => true,
        'sender' => true,
        'receiver' => true,
        'subject' => true,
        'message' => true,
        'sent' => true,
        'created' => true,
        'modified' => true,
        'sadr' => true,
        'pqmp' => true,
        'sadr_followup' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sadr Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $emails
 * @property bool $active
 * @property int $device
 * @property int $notified
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\SubCounty $sub_county
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\Vigiflow $vigiflow
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\SadrFollowup[] $sadr_followups
 * @property \App\Model\Entity\SadrListOfDrug[] $sadr_list_of_drugs
 */
class Sadr extends Entity
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
    ];
}

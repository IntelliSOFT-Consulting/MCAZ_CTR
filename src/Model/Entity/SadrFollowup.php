<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SadrFollowup Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $county_id
 * @property int $sadr_id
 * @property int $designation_id
 * @property string $description_of_reaction
 * @property string $outcome
 * @property string $reporter_email
 * @property string $reporter_phone
 * @property int $submitted
 * @property int $emails
 * @property bool $active
 * @property int $device
 * @property int $notified
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\Sadr $sadr
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\SadrListOfDrug[] $sadr_list_of_drugs
 */
class SadrFollowup extends Entity
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
        'county_id' => true,
        'sadr_id' => true,
        'designation_id' => true,
        'description_of_reaction' => true,
        'outcome' => true,
        'reporter_email' => true,
        'reporter_phone' => true,
        'submitted' => true,
        'emails' => true,
        'active' => true,
        'device' => true,
        'notified' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'county' => true,
        'sadr' => true,
        'designation' => true,
        'attachments' => true,
        'feedbacks' => true,
        'messages' => true,
        'sadr_list_of_drugs' => true
    ];
}

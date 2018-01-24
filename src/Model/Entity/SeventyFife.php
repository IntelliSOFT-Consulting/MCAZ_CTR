<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SeventyFife Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $application_id
 * @property string $decision
 * @property string $internal_review_comment
 * @property string $applicant_review_comment
 * @property string $file
 * @property string $dir
 * @property string $size
 * @property string $type
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Application $application
 */
class SeventyFife extends Entity
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
        'decision' => true,
        'internal_review_comment' => true,
        'applicant_review_comment' => true,
        'file' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'application' => true
    ];
}

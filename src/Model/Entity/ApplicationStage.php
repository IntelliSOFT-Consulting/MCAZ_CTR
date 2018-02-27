<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicationStage Entity
 *
 * @property int $id
 * @property int $application_id
 * @property \Cake\I18n\FrozenTime $submission
 * @property \Cake\I18n\FrozenTime $receipt
 * @property \Cake\I18n\FrozenTime $evaluation
 * @property \Cake\I18n\FrozenTime $committee_review
 * @property \Cake\I18n\FrozenTime $correspondence
 * @property \Cake\I18n\FrozenTime $response
 * @property \Cake\I18n\FrozenTime $recommendation
 * @property \Cake\I18n\FrozenTime $authorization
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 */
class ApplicationStage extends Entity
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
        'application_id' => true,
        'submission' => true,
        'receipt' => true,
        'evaluation' => true,
        'committee_review' => true,
        'correspondence' => true,
        'response' => true,
        'recommendation' => true,
        'authorization' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'application' => true
    ];
}

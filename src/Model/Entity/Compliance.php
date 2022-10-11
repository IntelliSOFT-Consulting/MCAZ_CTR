<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Compliance Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $quality_assessment_id
 * @property string $site_name
 * @property string $site_function
 * @property int $valid_license
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\QualityAssessment $quality_assessment
 */
class Compliance extends Entity
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
        'quality_assessment_id' => true,
        'site_name' => true,
        'site_function' => true,
        'valid_license' => true,
        'comment' => true,
        'created_at' => true,
        'updated_at' => true,
        'application' => true,
        'quality_assessment' => true
    ];
}

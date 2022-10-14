<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pdrug Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $quality_assessment_id
 * @property int $composition
 * @property string $composition_workspace
 * @property string $composition_comment
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\QualityAssessment $quality_assessment
 * @property \App\Model\Entity\StorageCondition[] $storage_conditions
 */
class Pdrug extends Entity
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
        'composition' => true,
        'composition_workspace' => true,
        'composition_comment' => true,
        'application' => true,
        'quality_assessment' => true,
        'storage_conditions' => true
    ];
}

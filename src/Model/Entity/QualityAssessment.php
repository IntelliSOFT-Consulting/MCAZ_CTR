<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QualityAssessment Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $user_id
 * @property int $quality_assessment_id
 * @property string $evaluation_type
 * @property string $quality_workspace
 * @property int $gmp_included
 * @property int $gmp_smpc
 * @property string $quality_data
 * @property string $auxiliary_workspace
 * @property string $auxiliary_comments
 * @property string $adventitious_agents
 * @property string $adventitious_workspace
 * @property string $adventitious_comments
 * @property string $novel_excipients
 * @property string $novel_excipients_workspace
 * @property string $novel_excipients_comments
 * @property string $reconstitution
 * @property string $reconstitution_workspace
 * @property string $reconstitution_comments
 * @property string $labelling
 * @property string $labelling_comments
 * @property string $blinding_workspace
 * @property string $blinding_comments
 * @property string $acceptable
 * @property string $supplementary_need
 * @property string $overall_comments
 * @property $file
 * @property string $dir
 * @property string $size
 * @property string $type
 * @property string $additional
 * @property int $chosen
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\QualityAssessment $quality_assessment
 * @property \App\Model\Entity\Compliance[] $compliance
 * @property \App\Model\Entity\Pdrug[] $pdrugs
 * @property \App\Model\Entity\QualityAssessment[] $quality_assessment_edits
 * @property \App\Model\Entity\Sdrug[] $sdrugs
 */
class QualityAssessment extends Entity
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

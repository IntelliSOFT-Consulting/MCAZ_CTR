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
 * @property string $additional
 * @property int $chosen
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\QualityAssessment[] $quality_assessments
 * @property \App\Model\Entity\Compliance[] $compliance
 * @property \App\Model\Entity\Pdrug[] $pdrugs
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
        'application_id' => true,
        'user_id' => true,
        'quality_assessment_id' => true,
        'evaluation_type' => true,
        'quality_workspace' => true,
        'gmp_included' => true,
        'gmp_smpc' => true,
        'quality_data' => true,
        'auxiliary_workspace' => true,
        'auxiliary_comments' => true,
        'adventitious_agents' => true,
        'adventitious_workspace' => true,
        'adventitious_comments' => true,
        'novel_excipients' => true,
        'novel_excipients_workspace' => true,
        'novel_excipients_comments' => true,
        'reconstitution' => true,
        'reconstitution_workspace' => true,
        'reconstitution_comments' => true,
        'labelling' => true,
        'labelling_comments' => true,
        'blinding_workspace' => true,
        'blinding_comments' => true,
        'acceptable' => true,
        'supplementary_need' => true,
        'overall_comments' => true,
        'additional' => true,
        'chosen' => true,
        'created' => true,
        'updated_at' => true,
        'application' => true,
        'user' => true,
        'quality_assessments' => true,
        'compliance' => true,
        'pdrugs' => true,
        'sdrugs' => true
    ];
}

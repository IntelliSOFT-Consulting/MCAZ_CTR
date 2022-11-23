<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Statistical Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $user_id
 * @property int $statistical_id
 * @property string $evaluation_type
 * @property string $design_type
 * @property string $randomized
 * @property string $blinding
 * @property string $design_description
 * @property string $design_acceptable
 * @property string $design_comment
 * @property string $rand_description
 * @property string $rand_comment
 * @property string $sample_acceptable
 * @property string $power_acceptable
 * @property string $sample_description
 * @property string $sample_comment
 * @property string $analysis_description
 * @property string $analysis_objective
 * @property string $analysis_objective_comments
 * @property string $methods_appropriate
 * @property string $methods_appropriate_comments
 * @property string $considerations
 * @property string $considerations_comments
 * @property string $multiplicity
 * @property string $multiplicity_comments
 * @property string $analyses_acceptable
 * @property string $analysis_comment
 * @property string $interim_safety
 * @property string $interim_planning
 * @property string $interim_description
 * @property string $interim_comment
 * @property string $statistical_acceptable
 * @property string $information_needed
 * @property string $overall_comment
 * @property $file
 * @property string $dir
 * @property string $size
 * @property string $type
 * @property int $signature
 * @property int $chosen
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $additional
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Statistical $statistical
 * @property \App\Model\Entity\Statistical[] $statistical_edits
 */
class Statistical extends Entity
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
        'statistical_id' => true,
        'evaluation_type' => true,
        'design_type' => true,
        'randomized' => true,
        'blinding' => true,
        'design_description' => true,
        'design_acceptable' => true,
        'design_comment' => true,
        'rand_description' => true,
        'rand_comment' => true,
        'sample_acceptable' => true,
        'power_acceptable' => true,
        'sample_description' => true,
        'sample_comment' => true,
        'analysis_description' => true,
        'analysis_objective' => true,
        'analysis_objective_comments' => true,
        'methods_appropriate' => true,
        'methods_appropriate_comments' => true,
        'considerations' => true,
        'considerations_comments' => true,
        'multiplicity' => true,
        'multiplicity_comments' => true,
        'analyses_acceptable' => true,
        'analysis_comment' => true,
        'interim_safety' => true,
        'interim_planning' => true,
        'interim_description' => true,
        'interim_comment' => true,
        'statistical_acceptable' => true,
        'information_needed' => true,
        'overall_comment' => true,
        'file' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'signature' => true,
        'chosen' => true,
        'created' => true,
        'deleted' => true,
        'additional' => true,
        'application' => true,
        'user' => true,
        'statistical' => true,
        'statistical_edits' => true
    ];
}

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
 * @property string $pharma_adequate
 * @property string $pharma_comments
 * @property string $manu_identified
 * @property string $manu_workspace
 * @property string $manu_comments
 * @property string $batch_described
 * @property string $batch_workspace
 * @property string $batch_comments
 * @property string $control_described
 * @property string $control_workspace
 * @property string $control_comments
 * @property string $control_steps_described
 * @property string $control_steps_comments
 * @property string $validation_described
 * @property string $validation_workspace
 * @property string $validation_comments
 * @property string $specification_criteria
 * @property string $specifications_comments
 * @property string $analytical_described
 * @property string $analytical_comments
 * @property string $procedures_validated
 * @property string $procedures_comments
 * @property string $justification_satisfactory
 * @property string $justification_comments
 * @property string $justification_workspace
 * @property string $animal_origin
 * @property string $tse_satisfactory
 * @property string $tse_comments
 * @property string $excipients_controlled
 * @property string $excipients_workspace
 * @property string $excipients_comments
 * @property string $appropriate_limits
 * @property string $appropriate_control_workspace
 * @property string $appropriate_control_comments
 * @property string $analytical_methods
 * @property string $analytical_methods_comments
 * @property string $validation_procedure
 * @property string $validation_results
 * @property string $validation_second_comments
 * @property string $batch_analyses
 * @property string $batch_described_comments
 * @property string $impurities_acceptable
 * @property string $impurities_workspace
 * @property string $impurities_comments
 * @property string $product_specifications
 * @property string $justification_satis_comments
 * @property string $justification_specs_comments
 * @property string $justification_specs_workspace
 * @property string $reference_standards
 * @property string $reference_standards_comments
 * @property string $closure_system
 * @property string $closure_system_comments
 * @property string $stability_tests
 * @property string $stability_tests_workspace
 * @property string $substantial_amendment
 * @property string $registered_protocol
 * @property string $pdrug_comments
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
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
        'pharma_adequate' => true,
        'pharma_comments' => true,
        'manu_identified' => true,
        'manu_workspace' => true,
        'manu_comments' => true,
        'batch_described' => true,
        'batch_workspace' => true,
        'batch_comments' => true,
        'control_described' => true,
        'control_workspace' => true,
        'control_comments' => true,
        'control_steps_described' => true,
        'control_steps_comments' => true,
        'validation_described' => true,
        'validation_workspace' => true,
        'validation_comments' => true,
        'specification_criteria' => true,
        'specifications_comments' => true,
        'analytical_described' => true,
        'analytical_comments' => true,
        'procedures_validated' => true,
        'procedures_comments' => true,
        'justification_satisfactory' => true,
        'justification_comments' => true,
        'justification_workspace' => true,
        'animal_origin' => true,
        'tse_satisfactory' => true,
        'tse_comments' => true,
        'excipients_controlled' => true,
        'excipients_workspace' => true,
        'excipients_comments' => true,
        'appropriate_limits' => true,
        'appropriate_control_workspace' => true,
        'appropriate_control_comments' => true,
        'analytical_methods' => true,
        'analytical_methods_comments' => true,
        'validation_procedure' => true,
        'validation_results' => true,
        'validation_second_comments' => true,
        'batch_analyses' => true,
        'batch_described_comments' => true,
        'impurities_acceptable' => true,
        'impurities_workspace' => true,
        'impurities_comments' => true,
        'product_specifications' => true,
        'justification_satis_comments' => true,
        'justification_specs_comments' => true,
        'justification_specs_workspace' => true,
        'reference_standards' => true,
        'reference_standards_comments' => true,
        'closure_system' => true,
        'closure_system_comments' => true,
        'stability_tests' => true,
        'stability_tests_workspace' => true,
        'substantial_amendment' => true,
        'registered_protocol' => true,
        'pdrug_comments' => true,
        'created_at' => true,
        'updated_at' => true,
        'application' => true,
        'quality_assessment' => true,
        'storage_conditions' => true
    ];
}

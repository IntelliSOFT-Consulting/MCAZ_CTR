<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sdrug Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $quality_assessment_id
 * @property bool $mono_ph
 * @property bool $mono_japan
 * @property bool $mono_other
 * @property bool $mono_no
 * @property string $quality_workspace
 * @property bool $gmp_smpc
 * @property bool $gmp_included
 * @property string $labelling
 * @property string $labelling_comments
 * @property string $blinding_workspace
 * @property string $blinding_comments
 * @property string $acceptable
 * @property string $supplementary_need
 * @property string $overall_comments
 * @property string $submitted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $deleted
 * @property bool $drug_eur
 * @property bool $drug_usp
 * @property bool $drug_none
 * @property string $drug_authorised
 * @property string $drug_ssection
 * @property string $nomen_workspace
 * @property string $noment_comment
 * @property string $str_subsection
 * @property string $str_workspace
 * @property string $str_comment
 * @property string $gen_prop_adequately
 * @property string $gen_prop_workspace
 * @property string $gen_prop_comment
 * @property string $manu_identified
 * @property string $process_described
 * @property string $gen_manu_comment
 * @property string $process_workspace
 * @property string $workspace_comment
 * @property string $control_described
 * @property string $control_workspace
 * @property string $control_comment
 * @property string $control_steps_described
 * @property string $control_steps_comments
 * @property string $validation_described
 * @property string $validation_comments
 * @property string $manufacturing_described
 * @property string $manufacturing_workspace
 * @property string $manufacturing_comments
 * @property string $substance_described
 * @property string $substance_workspace
 * @property string $substance_comments
 * @property string $impurities_characterised
 * @property string $impurities_workspace
 * @property string $impurities_comments
 * @property string $specifications_appropriate
 * @property string $specifications_workspace
 * @property string $specifications_comments
 * @property string $analytical_described
 * @property string $analytical_comments
 * @property string $acceptance_presented
 * @property string $suitability_explained
 * @property string $validation_procedures_comments
 * @property string $batch_provided
 * @property string $batch_workspace
 * @property string $batch_comments
 * @property string $justification_acceptable
 * @property string $justification_workspace
 * @property string $justification_comments
 * @property string $reference_described
 * @property string $reference_comments
 * @property string $container_suitable
 * @property string $container_comments
 * @property string $stability_satisfactory
 * @property string $stability_workspace
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $update_at
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\QualityAssessment $quality_assessment
 */
class Sdrug extends Entity
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
        'mono_ph' => true,
        'mono_japan' => true,
        'mono_other' => true,
        'mono_no' => true,
        'quality_workspace' => true,
        'gmp_smpc' => true,
        'gmp_included' => true,
        'labelling' => true,
        'labelling_comments' => true,
        'blinding_workspace' => true,
        'blinding_comments' => true,
        'acceptable' => true,
        'supplementary_need' => true,
        'overall_comments' => true,
        'submitted' => true,
        'created' => true,
        'deleted' => true,
        'drug_eur' => true,
        'drug_usp' => true,
        'drug_none' => true,
        'drug_authorised' => true,
        'drug_ssection' => true,
        'nomen_workspace' => true,
        'noment_comment' => true,
        'str_subsection' => true,
        'str_workspace' => true,
        'str_comment' => true,
        'gen_prop_adequately' => true,
        'gen_prop_workspace' => true,
        'gen_prop_comment' => true,
        'manu_identified' => true,
        'process_described' => true,
        'gen_manu_comment' => true,
        'process_workspace' => true,
        'workspace_comment' => true,
        'control_described' => true,
        'control_workspace' => true,
        'control_comment' => true,
        'control_steps_described' => true,
        'control_steps_comments' => true,
        'validation_described' => true,
        'validation_comments' => true,
        'manufacturing_described' => true,
        'manufacturing_workspace' => true,
        'manufacturing_comments' => true,
        'substance_described' => true,
        'substance_workspace' => true,
        'substance_comments' => true,
        'impurities_characterised' => true,
        'impurities_workspace' => true,
        'impurities_comments' => true,
        'specifications_appropriate' => true,
        'specifications_workspace' => true,
        'specifications_comments' => true,
        'analytical_described' => true,
        'analytical_comments' => true,
        'acceptance_presented' => true,
        'suitability_explained' => true,
        'validation_procedures_comments' => true,
        'batch_provided' => true,
        'batch_workspace' => true,
        'batch_comments' => true,
        'justification_acceptable' => true,
        'justification_workspace' => true,
        'justification_comments' => true,
        'reference_described' => true,
        'reference_comments' => true,
        'container_suitable' => true,
        'container_comments' => true,
        'stability_satisfactory' => true,
        'stability_workspace' => true,
        'created_at' => true,
        'update_at' => true,
        'application' => true,
        'quality_assessment' => true,
        'storage_conditions' => true
    ];
}

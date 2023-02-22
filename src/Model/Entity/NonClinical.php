<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NonClinical Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $user_id
 * @property int $non_clinical_id
 * @property string $evaluation_type
 * @property string $basis_provided
 * @property string $primary_comment
 * @property string $relevant_vitro_vivo
 * @property string $pharmacological_exposure
 * @property string $active_metabolites
 * @property string $imp_compound
 * @property string $off_target_identified
 * @property string $off_target_effects
 * @property string $secondary_comment
 * @property string $cardiovascular
 * @property string $cardiovascular_comments
 * @property string $respiratory
 * @property string $respiratory_comments
 * @property string $pharmacology_comment
 * @property string $cns
 * @property string $cns_comments
 * @property string $other
 * @property string $other_comments
 * @property string $significant_concerns
 * @property string $planned_exposure
 * @property string $safety_comment
 * @property string $interactions_identified
 * @property string $Pharmacodynamic_comment
 * @property string $adequate_analysis
 * @property string $analysis_comment
 * @property string $absorption
 * @property string $absorption_comments
 * @property string $distribution
 * @property string $distribution_comments
 * @property string $metabolism
 * @property string $metabolism_comments
 * @property string $excretion
 * @property string $excretion_comments
 * @property string $adme_concerns
 * @property string $major_metabolites
 * @property string $unique_metabolites
 * @property string $pharmacokinetics_comment
 * @property string $enzyme_inhibition
 * @property string $enzyme_inhibition_comments
 * @property string $enzyme_induction
 * @property string $enzyme_induction_comments
 * @property string $transporter
 * @property string $transporter_comments
 * @property string $co_pathways
 * @property string $co_pathways_comments
 * @property string $drug_interaction
 * @property string $interaction_highlighted
 * @property string $drug_interaction_comment
 * @property string $pk_studies
 * @property string $concerns_identified
 * @property string $identified_studies_comment
 * @property string $toxicologically_relevant
 * @property string $human_pharmacology
 * @property string $human_pk
 * @property string $well_designed_studies
 * @property string $toxicology_comment
 * @property string $toxicities_identified
 * @property string $sufficient_margins
 * @property string $single_dose_comment
 * @property string $repeat_toxicities_identified
 * @property string $repeat_sufficient_margins
 * @property string $repeat_treatment_duration
 * @property string $repeat_dose_comment
 * @property string $gene_mutations
 * @property string $gene_mutation_results
 * @property string $vitro_mammalian
 * @property string $vitro_mammalian_results
 * @property string $vivo_genotoxicit
 * @property string $vivo_genotoxicit_results
 * @property string $additional_assays
 * @property string $additional_assays_results
 * @property string $potential_genotoxic
 * @property string $genotoxicity_comment
 * @property string $carcinogenicity
 * @property string $carcinogenicity_exposure
 * @property string $carcinogenicity_comment
 * @property string $fertility
 * @property string $fertility_findings
 * @property string $embryo_dev
 * @property string $embryo_dev_findings
 * @property string $pre_post_natal
 * @property string $pre_post_natal_findings
 * @property string $reproductive_margins
 * @property string $reproductive_comment
 * @property string $juvenile_age_range
 * @property string $enhanced_juvenile
 * @property string $planned_juvenile_exposure
 * @property string $juvenile_comment
 * @property string $other_potential_toxicities
 * @property string $other_potential_exposure
 * @property string $other_potential_comment
 * @property bool $imp_teratogenic
 * @property bool $imp_genotoxic
 * @property bool $imp_insufficient
 * @property bool $imp_irelevant
 * @property bool $imp_nodata
 * @property string $male_partners_included
 * @property bool $considered_suspected
 * @property bool $considered_possible
 * @property bool $considered_unlikely
 * @property string $imp_assessor_comment
 * @property string $local_toxicity
 * @property string $local_toxicity_comments
 * @property string $std_phototoxic
 * @property string $std_phototoxic_comments
 * @property string $std_tissue
 * @property string $std_tissue_comments
 * @property string $std_antigenicity
 * @property string $std_antigenicity_comments
 * @property string $std_imuno
 * @property string $std_imuno_comments
 * @property string $std_dependence
 * @property string $std_dependence_comments
 * @property string $std_metabolites
 * @property string $std_metabolites_comments
 * @property string $std_impurities
 * @property string $std_impurities_comments
 * @property string $std_other
 * @property string $std_other_comments
 * @property string $other_toxicity_comments
 * @property string $fih_dose
 * @property string $fih_dose_steps
 * @property string $fih_dose_max
 * @property string $fih_dose_comments
 * @property string $glp_aspects
 * @property string $glp_aspects_comments
 * @property bool $non_clinical_acceptable
 * @property bool $supplementary_info_needed
 * @property string $overall_comments
 * @property $file
 * @property string $dir
 * @property string $size
 * @property string $type
 * @property int $chosen
 * @property int $submitted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $additional
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\NonClinical $non_clinical
 * @property \App\Model\Entity\NonClinical[] $non_clinical_edits
 */
class NonClinical extends Entity
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

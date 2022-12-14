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
        'application_id' => true,
        'user_id' => true,
        'non_clinical_id' => true,
        'evaluation_type' => true,
        'basis_provided' => true,
        'primary_comment' => true,
        'relevant_vitro_vivo' => true,
        'pharmacological_exposure' => true,
        'active_metabolites' => true,
        'imp_compound' => true,
        'off_target_identified' => true,
        'off_target_effects' => true,
        'secondary_comment' => true,
        'cardiovascular' => true,
        'cardiovascular_comments' => true,
        'respiratory' => true,
        'respiratory_comments' => true,
        'pharmacology_comment' => true,
        'cns' => true,
        'cns_comments' => true,
        'other' => true,
        'other_comments' => true,
        'significant_concerns' => true,
        'planned_exposure' => true,
        'safety_comment' => true,
        'interactions_identified' => true,
        'Pharmacodynamic_comment' => true,
        'adequate_analysis' => true,
        'analysis_comment' => true,
        'absorption' => true,
        'absorption_comments' => true,
        'distribution' => true,
        'distribution_comments' => true,
        'metabolism' => true,
        'metabolism_comments' => true,
        'excretion' => true,
        'excretion_comments' => true,
        'adme_concerns' => true,
        'major_metabolites' => true,
        'unique_metabolites' => true,
        'pharmacokinetics_comment' => true,
        'enzyme_inhibition' => true,
        'enzyme_inhibition_comments' => true,
        'enzyme_induction' => true,
        'enzyme_induction_comments' => true,
        'transporter' => true,
        'transporter_comments' => true,
        'co_pathways' => true,
        'co_pathways_comments' => true,
        'drug_interaction' => true,
        'interaction_highlighted' => true,
        'drug_interaction_comment' => true,
        'pk_studies' => true,
        'concerns_identified' => true,
        'identified_studies_comment' => true,
        'toxicologically_relevant' => true,
        'human_pharmacology' => true,
        'human_pk' => true,
        'well_designed_studies' => true,
        'toxicology_comment' => true,
        'toxicities_identified' => true,
        'sufficient_margins' => true,
        'single_dose_comment' => true,
        'repeat_toxicities_identified' => true,
        'repeat_sufficient_margins' => true,
        'repeat_treatment_duration' => true,
        'repeat_dose_comment' => true,
        'gene_mutations' => true,
        'gene_mutation_results' => true,
        'vitro_mammalian' => true,
        'vitro_mammalian_results' => true,
        'vivo_genotoxicit' => true,
        'vivo_genotoxicit_results' => true,
        'additional_assays' => true,
        'additional_assays_results' => true,
        'potential_genotoxic' => true,
        'genotoxicity_comment' => true,
        'carcinogenicity' => true,
        'carcinogenicity_exposure' => true,
        'carcinogenicity_comment' => true,
        'fertility' => true,
        'fertility_findings' => true,
        'embryo_dev' => true,
        'embryo_dev_findings' => true,
        'pre_post_natal' => true,
        'pre_post_natal_findings' => true,
        'reproductive_margins' => true,
        'reproductive_comment' => true,
        'juvenile_age_range' => true,
        'enhanced_juvenile' => true,
        'planned_juvenile_exposure' => true,
        'juvenile_comment' => true,
        'other_potential_toxicities' => true,
        'other_potential_exposure' => true,
        'other_potential_comment' => true,
        'imp_teratogenic' => true,
        'imp_genotoxic' => true,
        'imp_insufficient' => true,
        'imp_irelevant' => true,
        'imp_nodata' => true,
        'male_partners_included' => true,
        'considered_suspected' => true,
        'considered_possible' => true,
        'considered_unlikely' => true,
        'imp_assessor_comment' => true,
        'local_toxicity' => true,
        'local_toxicity_comments' => true,
        'std_phototoxic' => true,
        'std_phototoxic_comments' => true,
        'std_tissue' => true,
        'std_tissue_comments' => true,
        'std_antigenicity' => true,
        'std_antigenicity_comments' => true,
        'std_imuno' => true,
        'std_imuno_comments' => true,
        'std_dependence' => true,
        'std_dependence_comments' => true,
        'std_metabolites' => true,
        'std_metabolites_comments' => true,
        'std_impurities' => true,
        'std_impurities_comments' => true,
        'std_other' => true,
        'std_other_comments' => true,
        'other_toxicity_comments' => true,
        'fih_dose' => true,
        'fih_dose_steps' => true,
        'fih_dose_max' => true,
        'fih_dose_comments' => true,
        'glp_aspects' => true,
        'glp_aspects_comments' => true,
        'non_clinical_acceptable' => true,
        'supplementary_info_needed' => true,
        'overall_comments' => true,
        'file' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'chosen' => true,
        'submitted' => true,
        'created' => true,
        'deleted' => true,
        'additional' => true,
        'application' => true,
        'user' => true,
        'non_clinical' => true,
        'non_clinical_edits' => true
    ];
}

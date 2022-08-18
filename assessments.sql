-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 03:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcazctr_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinicals`
--

CREATE TABLE `clinicals` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor_justification` longtext,
  `sponsor_comment` longtext,
  `low_intervention` varchar(255) DEFAULT NULL,
  `evidence_based` varchar(255) DEFAULT NULL,
  `products_authorised` varchar(255) DEFAULT NULL,
  `poses_risk` varchar(255) DEFAULT NULL,
  `posed_risks_comment` longtext,
  `trial_phase` longtext,
  `therapeutic_condition` longtext,
  `action_mechanism` varchar(255) DEFAULT NULL,
  `development_status` varchar(255) DEFAULT NULL,
  `rationale_acceptable` varchar(255) DEFAULT NULL,
  `objective_acceptable` varchar(255) NOT NULL,
  `endpoint_acceptable` varchar(255) DEFAULT NULL,
  `objective_comments` longtext,
  `secondary_objective_acceptable` varchar(255) DEFAULT NULL,
  `secondary_endpoint_acceptable` varchar(255) DEFAULT NULL,
  `secondary_objective_comments` longtext,
  `study_health_participants` tinyint(1) DEFAULT NULL,
  `study_participants` tinyint(1) DEFAULT NULL,
  `study_adults` tinyint(1) DEFAULT NULL,
  `study_adolescent` tinyint(1) DEFAULT NULL,
  `adolescents_age_group` varchar(255) DEFAULT NULL,
  `study_elderly` tinyint(1) DEFAULT NULL,
  `study_male` tinyint(1) DEFAULT NULL,
  `study_female` tinyint(1) DEFAULT NULL,
  `potential_contraception` varchar(255) DEFAULT NULL,
  `potential_none_contraception` varchar(255) DEFAULT NULL,
  `study_population_comments` longtext,
  `inclusion_acceptable` varchar(255) DEFAULT NULL,
  `inclusion_comments` longtext,
  `exclusion_acceptable` varchar(255) DEFAULT NULL,
  `exclusion_comments` longtext,
  `vulnerable_population` varchar(255) DEFAULT NULL,
  `justifiable_population` varchar(255) DEFAULT NULL,
  `clinical_benefit` varchar(255) DEFAULT NULL,
  `vulnerable_comments` longtext,
  `proposed_study_acceptable` longtext,
  `study_plan_comments` longtext,
  `imp_acceptable` varchar(255) DEFAULT NULL,
  `imp_other` longtext,
  `imp_comments` longtext,
  `comparator_usage` varchar(255) DEFAULT NULL,
  `comparator_comments` longtext,
  `comparator_smpc` tinyint(1) DEFAULT NULL,
  `comparator_international` tinyint(1) DEFAULT NULL,
  `comparator_publications` tinyint(1) DEFAULT NULL,
  `comparator_acceptable` varchar(255) DEFAULT NULL,
  `comparator_workspace_comments` longtext,
  `placebo_usage` varchar(255) DEFAULT NULL,
  `placebo_justified` varchar(255) DEFAULT NULL,
  `placebo_comments` longtext,
  `auxiliary_usage` varchar(255) DEFAULT NULL,
  `auxiliary_justified` varchar(255) DEFAULT NULL,
  `auxiliary_comments` longtext,
  `medical_device_justified` varchar(255) DEFAULT NULL,
  `medical_device_comments` longtext,
  `associated_risks_comments` longtext,
  `emergency_procedure_justified` varchar(255) DEFAULT NULL,
  `additional_measures` varchar(255) DEFAULT NULL,
  `unbinding_comments` longtext,
  `teratogenicity_risk` varchar(255) DEFAULT NULL,
  `contraceptive_acceptable` varchar(255) DEFAULT NULL,
  `proposal_insufficient` varchar(255) DEFAULT NULL,
  `proposal_comments` longtext,
  `male_participants` tinyint(1) DEFAULT NULL,
  `male_participants_comments` longtext,
  `contraception_treatment` tinyint(1) DEFAULT NULL,
  `contraception_treatment_comments` longtext,
  `other_issue_comments` longtext,
  `pregnancy_interval` tinyint(1) DEFAULT NULL,
  `pregnancy_interval_comments` longtext,
  `pregnancy_test` tinyint(1) DEFAULT NULL,
  `pregnancy_test_comments` longtext,
  `postmenopausal` tinyint(1) DEFAULT NULL,
  `postmenopausal_comments` longtext,
  `other_issue` tinyint(1) DEFAULT NULL,
  `general_contraception_comments` longtext,
  `discontinuation_criteria` varchar(255) DEFAULT NULL,
  `criteria_acceptable` varchar(255) DEFAULT NULL,
  `termination_criteria_acceptable` longtext,
  `discontinuation_comments` longtext,
  `permitted_concomitant` varchar(255) DEFAULT NULL,
  `prohibited_concomitant` tinyint(1) DEFAULT NULL,
  `concomitant_comments` longtext,
  `procedures_adequate` tinyint(1) DEFAULT NULL,
  `insufficient_frequency` tinyint(1) DEFAULT NULL,
  `frequency_comments` longtext,
  `relevant_targets` tinyint(1) DEFAULT NULL,
  `relevant_targets_comments` longtext,
  `minimization_measures` tinyint(1) DEFAULT NULL,
  `minimization_measures_comments` longtext,
  `risk_unacceptable` tinyint(1) DEFAULT NULL,
  `risk_unacceptable_comments` longtext,
  `insufficient_followup` tinyint(1) DEFAULT NULL,
  `insufficient_followup_comments` longtext,
  `other_safety` tinyint(1) DEFAULT NULL,
  `other_safety_comments` longtext,
  `rsi_included` varchar(255) DEFAULT NULL,
  `acceptable_document` varchar(255) DEFAULT NULL,
  `acceptable_format` varchar(255) DEFAULT NULL,
  `expected_acceptable` varchar(255) DEFAULT NULL,
  `general_irs_comments` longtext,
  `general_safety_comments` longtext,
  `dsmc_committee` varchar(255) DEFAULT NULL,
  `arrangements_acceptable` varchar(255) DEFAULT NULL,
  `dsmc_comments` longtext,
  `trial_definition_acceptable` varchar(255) DEFAULT NULL,
  `trial_definition_comments` longtext,
  `collection_unacceptable` varchar(255) DEFAULT NULL,
  `collection_unacceptable_comments` longtext,
  `data_policies_acceptable` tinyint(1) DEFAULT NULL,
  `data_policies_acceptable_comments` longtext,
  `unauthorised_unacceptable` tinyint(1) DEFAULT NULL,
  `unauthorised_unacceptable_comments` longtext,
  `measures_unacceptable` tinyint(1) DEFAULT NULL,
  `measures_unacceptable_comments` longtext,
  `breach_unacceptable` tinyint(1) DEFAULT NULL,
  `breach_unacceptable_comments` longtext,
  `other_protection` tinyint(1) DEFAULT NULL,
  `other_protection_comments` longtext,
  `data_protection_comments` longtext,
  `recruitment_unacceptable` tinyint(1) DEFAULT NULL,
  `recruitment_unacceptable_comments` longtext,
  `recruitment_comments` longtext,
  `risk_evaluation_unacceptable` varchar(255) DEFAULT NULL,
  `participants_protection_acceptable` varchar(255) DEFAULT NULL,
  `condition_unmonitored` tinyint(1) DEFAULT NULL,
  `condition_unmonitored_comments` longtext,
  `unsafeguarded_rights` tinyint(1) DEFAULT NULL,
  `unsafeguarded_rights_comments` longtext,
  `unmonitored_threshold` tinyint(1) DEFAULT NULL,
  `unmonitored_threshold_comments` longtext,
  `risk_assessment_comments` longtext,
  `application_acceptable` tinyint(1) DEFAULT NULL,
  `application_acceptable_comments` longtext,
  `supplementary_required` tinyint(1) DEFAULT NULL,
  `supplementary_required_comments` longtext,
  `overal_assessment_comments` longtext,
  `deleted` datetime DEFAULT CURRENT_TIMESTAMP,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `assessor_discussion` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `non_clinicals`
--

CREATE TABLE `non_clinicals` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `basis_provided` varchar(255) NOT NULL,
  `primary_comment` longtext,
  `relevant_vitro_vivo` varchar(255) DEFAULT NULL,
  `pharmacological_exposure` varchar(255) DEFAULT NULL,
  `active_metabolites` varchar(255) DEFAULT NULL,
  `imp_compound` varchar(255) DEFAULT NULL,
  `off_target_identified` varchar(255) DEFAULT NULL,
  `off_target_effects` varchar(255) DEFAULT NULL,
  `secondary_comment` longtext,
  `cardiovascular` varchar(255) DEFAULT NULL,
  `cardiovascular_comments` longtext,
  `respiratory` varchar(255) DEFAULT NULL,
  `respiratory_comments` longtext,
  `pharmacology_comment` longtext,
  `cns` varchar(255) DEFAULT NULL,
  `cns_comments` longtext,
  `other` varchar(255) DEFAULT NULL,
  `other_comments` longtext,
  `significant_concerns` varchar(255) DEFAULT NULL,
  `planned_exposure` varchar(255) DEFAULT NULL,
  `safety_comment` longtext,
  `interactions_identified` varchar(255) DEFAULT NULL,
  `Pharmacodynamic_comment` longtext,
  `adequate_analysis` varchar(255) DEFAULT NULL,
  `analysis_comment` longtext,
  `absorption` varchar(255) DEFAULT NULL,
  `absorption_comments` longtext,
  `distribution` varchar(255) DEFAULT NULL,
  `distribution_comments` longtext,
  `metabolism` varchar(255) DEFAULT NULL,
  `metabolism_comments` longtext,
  `excretion` varchar(255) DEFAULT NULL,
  `excretion_comments` longtext,
  `adme_concerns` varchar(255) DEFAULT NULL,
  `major_metabolites` varchar(255) DEFAULT NULL,
  `unique_metabolites` varchar(255) DEFAULT NULL,
  `pharmacokinetics_comment` longtext,
  `enzyme_inhibition` varchar(255) DEFAULT NULL,
  `enzyme_inhibition_comments` longtext,
  `enzyme_induction` varchar(255) DEFAULT NULL,
  `enzyme_induction_comments` longtext,
  `transporter` varchar(255) DEFAULT NULL,
  `transporter_comments` longtext,
  `co_pathways` varchar(255) DEFAULT NULL,
  `co_pathways_comments` longtext,
  `drug_interaction` varchar(255) DEFAULT NULL,
  `interaction_highlighted` varchar(255) DEFAULT NULL,
  `drug_interaction_comment` longtext,
  `pk_studies` varchar(255) DEFAULT NULL,
  `concerns_identified` varchar(255) DEFAULT NULL,
  `identified_studies_comment` longtext,
  `toxicologically_relevant` varchar(255) DEFAULT NULL,
  `human_pharmacology` varchar(255) DEFAULT NULL,
  `human_pk` varchar(255) DEFAULT NULL,
  `well_designed_studies` varchar(255) DEFAULT NULL,
  `toxicology_comment` longtext,
  `toxicities_identified` varchar(255) DEFAULT NULL,
  `sufficient_margins` varchar(255) DEFAULT NULL,
  `single_dose_comment` longtext,
  `repeat_toxicities_identified` varchar(255) DEFAULT NULL,
  `repeat_sufficient_margins` varchar(255) DEFAULT NULL,
  `repeat_treatment_duration` varchar(255) DEFAULT NULL,
  `repeat_dose_comment` longtext,
  `gene_mutations` longtext,
  `gene_mutation_results` varchar(255) DEFAULT NULL,
  `vitro_mammalian` longtext,
  `vitro_mammalian_results` varchar(255) DEFAULT NULL,
  `vivo_genotoxicit` longtext,
  `vivo_genotoxicit_results` varchar(255) DEFAULT NULL,
  `additional_assays` longtext,
  `additional_assays_results` varchar(255) DEFAULT NULL,
  `potential_genotoxic` varchar(255) DEFAULT NULL,
  `genotoxicity_comment` longtext,
  `carcinogenicity` varchar(255) DEFAULT NULL,
  `carcinogenicity_exposure` varchar(255) DEFAULT NULL,
  `carcinogenicity_comment` longtext,
  `fertility` varchar(255) DEFAULT NULL,
  `fertility_findings` longtext,
  `embryo_dev` varchar(255) DEFAULT NULL,
  `embryo_dev_findings` longtext,
  `pre_post_natal` varchar(255) DEFAULT NULL,
  `pre_post_natal_findings` longtext,
  `reproductive_margins` varchar(255) DEFAULT NULL,
  `reproductive_comment` longtext,
  `juvenile_age_range` varchar(255) DEFAULT NULL,
  `enhanced_juvenile` varchar(255) DEFAULT NULL,
  `planned_juvenile_exposure` varchar(255) DEFAULT NULL,
  `juvenile_comment` longtext,
  `other_potential_toxicities` varchar(255) DEFAULT NULL,
  `other_potential_exposure` varchar(255) DEFAULT NULL,
  `other_potential_comment` longtext,
  `imp_teratogenic` tinyint(1) DEFAULT NULL,
  `imp_genotoxic` tinyint(1) DEFAULT NULL,
  `imp_insufficient` tinyint(1) DEFAULT NULL,
  `imp_irelevant` tinyint(1) DEFAULT NULL,
  `imp_nodata` tinyint(1) DEFAULT NULL,
  `male_partners_included` varchar(255) DEFAULT NULL,
  `considered_suspected` tinyint(1) DEFAULT NULL,
  `considered_possible` tinyint(1) DEFAULT NULL,
  `considered_unlikely` tinyint(1) DEFAULT NULL,
  `imp_assessor_comment` longtext,
  `local_toxicity` varchar(255) DEFAULT NULL,
  `local_toxicity_comments` longtext,
  `std_phototoxic` varchar(255) DEFAULT NULL,
  `std_phototoxic_comments` longtext,
  `std_tissue` varchar(255) DEFAULT NULL,
  `std_tissue_comments` longtext,
  `std_antigenicity` varchar(255) DEFAULT NULL,
  `std_antigenicity_comments` longtext,
  `std_imuno` varchar(255) DEFAULT NULL,
  `std_imuno_comments` longtext,
  `std_dependence` varchar(255) DEFAULT NULL,
  `std_dependence_comments` longtext,
  `std_metabolites` varchar(255) DEFAULT NULL,
  `std_metabolites_comments` longtext,
  `std_impurities` varchar(255) DEFAULT NULL,
  `std_impurities_comments` longtext,
  `std_other` varchar(255) DEFAULT NULL,
  `std_other_comments` longtext,
  `other_toxicity_comments` longtext,
  `fih_dose` varchar(255) DEFAULT NULL,
  `fih_dose_steps` varchar(255) DEFAULT NULL,
  `fih_dose_max` varchar(255) DEFAULT NULL,
  `fih_dose_comments` longtext,
  `glp_aspects` varchar(255) DEFAULT NULL,
  `glp_aspects_comments` longtext,
  `non_clinical_acceptable` tinyint(1) DEFAULT NULL,
  `supplementary_info_needed` tinyint(1) DEFAULT NULL,
  `overall_comments` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinicals`
--
ALTER TABLE `clinicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_clinicals`
--
ALTER TABLE `non_clinicals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinicals`
--
ALTER TABLE `clinicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_clinicals`
--
ALTER TABLE `non_clinicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2017 at 03:15 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcazctr`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `trial_status_id` int(11) DEFAULT NULL,
  `abstract_of_study` text,
  `study_title` text,
  `short_title` varchar(255) DEFAULT NULL,
  `protocol_no` varchar(255) DEFAULT NULL,
  `version_no` varchar(255) DEFAULT NULL,
  `date_of_protocol` date DEFAULT NULL,
  `study_drug` varchar(255) DEFAULT NULL,
  `disease_condition` varchar(255) DEFAULT NULL,
  `product_type_biologicals` tinyint(1) DEFAULT NULL,
  `product_type_proteins` tinyint(1) DEFAULT NULL,
  `product_type_immunologicals` tinyint(1) DEFAULT NULL,
  `product_type_vaccines` tinyint(1) DEFAULT NULL,
  `product_type_hormones` tinyint(1) DEFAULT NULL,
  `product_type_toxoid` tinyint(1) DEFAULT NULL,
  `product_type_chemical` tinyint(1) DEFAULT NULL,
  `product_type_medical_device` tinyint(1) DEFAULT NULL,
  `product_type_chemical_name` varchar(255) DEFAULT NULL,
  `product_type_medical_device_name` varchar(255) DEFAULT NULL,
  `ecct_not_applicable` tinyint(1) DEFAULT '0',
  `ecct_ref_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `applicant_covering_letter` tinyint(1) DEFAULT NULL,
  `applicant_protocol` tinyint(1) DEFAULT NULL,
  `applicant_patient_information` tinyint(1) DEFAULT NULL,
  `applicant_investigators_brochure` tinyint(1) DEFAULT NULL,
  `applicant_investigators_cv` tinyint(1) DEFAULT NULL,
  `applicant_signed_declaration` tinyint(1) DEFAULT NULL,
  `applicant_financial_declaration` tinyint(1) DEFAULT NULL,
  `applicant_gmp_certificate` tinyint(1) DEFAULT NULL,
  `applicant_indemnity_cover` tinyint(1) DEFAULT NULL,
  `applicant_opinion_letter` tinyint(1) DEFAULT NULL,
  `applicant_approval_letter` tinyint(1) DEFAULT NULL,
  `applicant_statement` tinyint(1) DEFAULT NULL,
  `applicant_participating_countries` tinyint(1) DEFAULT NULL,
  `applicant_addendum` tinyint(1) DEFAULT NULL,
  `applicant_fees` tinyint(1) DEFAULT NULL,
  `declaration_applicant` varchar(255) DEFAULT NULL,
  `declaration_date1` date DEFAULT NULL,
  `declaration_principal_investigator` varchar(255) DEFAULT NULL,
  `declaration_date2` date DEFAULT NULL,
  `placebo_present` varchar(255) DEFAULT NULL,
  `principal_inclusion_criteria` text,
  `principal_exclusion_criteria` text,
  `primary_end_points` text,
  `scope_diagnosis` tinyint(1) DEFAULT NULL,
  `scope_prophylaxis` tinyint(1) DEFAULT NULL,
  `scope_therapy` tinyint(1) DEFAULT NULL,
  `scope_safety` tinyint(1) DEFAULT NULL,
  `scope_efficacy` tinyint(1) DEFAULT NULL,
  `scope_pharmacokinetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacodynamic` tinyint(1) DEFAULT NULL,
  `scope_bioequivalence` tinyint(1) DEFAULT NULL,
  `scope_dose_response` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenomic` tinyint(1) DEFAULT NULL,
  `scope_pharmacoecomomic` tinyint(1) DEFAULT NULL,
  `scope_others` tinyint(1) DEFAULT NULL,
  `scope_others_specify` text,
  `trial_human_pharmacology` tinyint(1) DEFAULT NULL,
  `trial_administration_humans` tinyint(1) DEFAULT NULL,
  `trial_bioequivalence_study` tinyint(1) DEFAULT NULL,
  `trial_other` tinyint(1) DEFAULT NULL,
  `trial_other_specify` text,
  `trial_therapeutic_exploratory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_confirmatory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_use` tinyint(1) DEFAULT NULL,
  `design_controlled` varchar(255) DEFAULT NULL,
  `site_capacity` varchar(100) DEFAULT NULL,
  `staff_numbers` text,
  `other_details_explanation` text,
  `other_details_regulatory_notapproved` text,
  `other_details_regulatory_approved` text,
  `other_details_regulatory_rejected` text,
  `other_details_regulatory_halted` text,
  `estimated_duration` varchar(255) DEFAULT NULL,
  `design_controlled_randomised` varchar(255) DEFAULT NULL,
  `design_controlled_open` varchar(255) DEFAULT NULL,
  `design_controlled_single_blind` varchar(255) DEFAULT NULL,
  `design_controlled_double_blind` varchar(255) DEFAULT NULL,
  `design_controlled_parallel_group` varchar(255) DEFAULT NULL,
  `design_controlled_cross_over` varchar(255) DEFAULT NULL,
  `design_controlled_other` varchar(255) DEFAULT NULL,
  `design_controlled_specify` varchar(255) DEFAULT NULL,
  `design_controlled_comparator` varchar(255) DEFAULT NULL,
  `design_controlled_other_medicinal` varchar(255) DEFAULT NULL,
  `design_controlled_placebo` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_other` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_specify` varchar(255) DEFAULT NULL,
  `single_site_member_state` varchar(255) DEFAULT NULL,
  `location_of_area` varchar(255) DEFAULT NULL,
  `single_site_physical_address` varchar(255) DEFAULT NULL,
  `single_site_contact_person` varchar(255) DEFAULT NULL,
  `single_site_telephone` varchar(255) DEFAULT NULL,
  `multiple_sites_member_state` varchar(255) DEFAULT NULL,
  `multiple_countries` char(30) DEFAULT NULL,
  `multiple_member_states` varchar(255) DEFAULT NULL,
  `number_of_sites` varchar(255) DEFAULT NULL,
  `multi_country_list` text,
  `data_monitoring_committee` varchar(255) DEFAULT NULL,
  `total_enrolment_per_site` text,
  `total_participants_worldwide` varchar(255) DEFAULT '',
  `population_less_than_18_years` varchar(255) DEFAULT NULL,
  `population_utero` varchar(255) DEFAULT NULL,
  `population_preterm_newborn` varchar(255) DEFAULT NULL,
  `population_newborn` varchar(255) DEFAULT NULL,
  `population_infant_and_toddler` varchar(255) DEFAULT NULL,
  `population_children` varchar(255) DEFAULT NULL,
  `population_adolescent` varchar(255) DEFAULT NULL,
  `population_above_18` char(30) DEFAULT NULL,
  `population_adult` varchar(255) DEFAULT NULL,
  `population_elderly` varchar(255) DEFAULT NULL,
  `gender_female` tinyint(1) DEFAULT NULL,
  `gender_male` tinyint(1) DEFAULT NULL,
  `subjects_healthy` varchar(255) DEFAULT NULL,
  `subjects_patients` varchar(255) DEFAULT NULL,
  `subjects_vulnerable_populations` varchar(255) DEFAULT NULL,
  `subjects_women_child_bearing` varchar(255) DEFAULT NULL,
  `subjects_women_using_contraception` varchar(255) DEFAULT NULL,
  `subjects_pregnant_women` varchar(255) DEFAULT NULL,
  `subjects_nursing_women` varchar(255) DEFAULT NULL,
  `subjects_emergency_situation` varchar(255) DEFAULT NULL,
  `subjects_incapable_consent` varchar(255) DEFAULT NULL,
  `subjects_specify` text,
  `subjects_others` varchar(255) DEFAULT NULL,
  `subjects_others_specify` text,
  `investigator1_given_name` varchar(255) DEFAULT NULL,
  `investigator1_middle_name` varchar(255) DEFAULT NULL,
  `investigator1_family_name` varchar(255) DEFAULT NULL,
  `investigator1_qualification` varchar(255) DEFAULT NULL,
  `investigator1_professional_address` varchar(255) DEFAULT NULL,
  `investigator1_telephone` varchar(255) DEFAULT NULL,
  `investigator1_email` varchar(255) DEFAULT NULL,
  `organisations_transferred_` varchar(255) DEFAULT NULL,
  `number_participants` text,
  `notification` text,
  `approval_date` date DEFAULT NULL,
  `submitted` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  `deactivated` tinyint(1) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `approved` tinyint(2) NOT NULL DEFAULT '0',
  `approved_reason` text,
  `final_report` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `trial_status_id`, `abstract_of_study`, `study_title`, `short_title`, `protocol_no`, `version_no`, `date_of_protocol`, `study_drug`, `disease_condition`, `product_type_biologicals`, `product_type_proteins`, `product_type_immunologicals`, `product_type_vaccines`, `product_type_hormones`, `product_type_toxoid`, `product_type_chemical`, `product_type_medical_device`, `product_type_chemical_name`, `product_type_medical_device_name`, `ecct_not_applicable`, `ecct_ref_number`, `email_address`, `applicant_covering_letter`, `applicant_protocol`, `applicant_patient_information`, `applicant_investigators_brochure`, `applicant_investigators_cv`, `applicant_signed_declaration`, `applicant_financial_declaration`, `applicant_gmp_certificate`, `applicant_indemnity_cover`, `applicant_opinion_letter`, `applicant_approval_letter`, `applicant_statement`, `applicant_participating_countries`, `applicant_addendum`, `applicant_fees`, `declaration_applicant`, `declaration_date1`, `declaration_principal_investigator`, `declaration_date2`, `placebo_present`, `principal_inclusion_criteria`, `principal_exclusion_criteria`, `primary_end_points`, `scope_diagnosis`, `scope_prophylaxis`, `scope_therapy`, `scope_safety`, `scope_efficacy`, `scope_pharmacokinetic`, `scope_pharmacodynamic`, `scope_bioequivalence`, `scope_dose_response`, `scope_pharmacogenetic`, `scope_pharmacogenomic`, `scope_pharmacoecomomic`, `scope_others`, `scope_others_specify`, `trial_human_pharmacology`, `trial_administration_humans`, `trial_bioequivalence_study`, `trial_other`, `trial_other_specify`, `trial_therapeutic_exploratory`, `trial_therapeutic_confirmatory`, `trial_therapeutic_use`, `design_controlled`, `site_capacity`, `staff_numbers`, `other_details_explanation`, `other_details_regulatory_notapproved`, `other_details_regulatory_approved`, `other_details_regulatory_rejected`, `other_details_regulatory_halted`, `estimated_duration`, `design_controlled_randomised`, `design_controlled_open`, `design_controlled_single_blind`, `design_controlled_double_blind`, `design_controlled_parallel_group`, `design_controlled_cross_over`, `design_controlled_other`, `design_controlled_specify`, `design_controlled_comparator`, `design_controlled_other_medicinal`, `design_controlled_placebo`, `design_controlled_medicinal_other`, `design_controlled_medicinal_specify`, `single_site_member_state`, `location_of_area`, `single_site_physical_address`, `single_site_contact_person`, `single_site_telephone`, `multiple_sites_member_state`, `multiple_countries`, `multiple_member_states`, `number_of_sites`, `multi_country_list`, `data_monitoring_committee`, `total_enrolment_per_site`, `total_participants_worldwide`, `population_less_than_18_years`, `population_utero`, `population_preterm_newborn`, `population_newborn`, `population_infant_and_toddler`, `population_children`, `population_adolescent`, `population_above_18`, `population_adult`, `population_elderly`, `gender_female`, `gender_male`, `subjects_healthy`, `subjects_patients`, `subjects_vulnerable_populations`, `subjects_women_child_bearing`, `subjects_women_using_contraception`, `subjects_pregnant_women`, `subjects_nursing_women`, `subjects_emergency_situation`, `subjects_incapable_consent`, `subjects_specify`, `subjects_others`, `subjects_others_specify`, `investigator1_given_name`, `investigator1_middle_name`, `investigator1_family_name`, `investigator1_qualification`, `investigator1_professional_address`, `investigator1_telephone`, `investigator1_email`, `organisations_transferred_`, `number_participants`, `notification`, `approval_date`, `submitted`, `deleted`, `deleted_date`, `deactivated`, `date_submitted`, `approved`, `approved_reason`, `final_report`, `modified`, `created`) VALUES
(1, 4, NULL, '', '', '', NULL, '', NULL, '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, NULL, 'eddieokemwa@gmail.com', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '0', 0, 0, 0, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2017-12-04 01:02:50', '2017-12-02 14:56:21'),
(2, 4, NULL, '<p>Abstract ....</p>\r\n', '<p>My title</p>\r\n', 'short appropriate title', NULL, '3', '2017-12-01', 'Kerosene', 'tb', 1, 1, 1, 1, 1, 1, 1, 1, 'asdfad', 'asdfasd', 0, NULL, 'eddieokemwa@gmail.com', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asfdasdf', '2017-03-21', 'asfasfda', '2009-12-17', 'Yes', '<p>inclusion criteri</p>\r\n', '<p><br />\r\nExclusion criteria</p>\r\n', '<p><br />\r\nend poitns</p>\r\n', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'asfasfd', 1, 1, 1, 1, '1', 1, 1, 1, 'Yes', NULL, 'big', '<p>something special here</p>\r\n', 'ug', 'asfda', 'sijui', 'ndee', '1 2 days', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'asfda', 'asfd', 'Yes', 'No', 'Yes', 'asdfsaf', 'Yes', 'name 1', 'address 2 ', 'okemwa', '--1-0-asfp', '', 'Yes', 'just the one', '', 'kenya burundi', NULL, 'asdfasdf', 'asfas', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 1, 1, 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', 'Unclear', 'No', 'Yes', 'safsfd', 'Yes', 'Specified here', 'name 1', 'mname', 'sname', 'doctor', 'kariobangi', '2341', 'eddyokemwa@gmail.com', 'Yes', '2rfsdaf', 'No other commentos', '2008-12-11', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, '2017-12-04 00:59:43', '2017-12-02 14:57:33'),
(3, 5, NULL, '', '<p>Stone one</p>\r\n', '', NULL, '', NULL, '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, NULL, 'eddieokemwa@gmail.com', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '0', 0, 0, 0, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, '2017-12-04 00:22:27', '2017-12-04 00:22:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

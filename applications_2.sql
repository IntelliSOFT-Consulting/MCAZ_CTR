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
CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  created datetime default null,
  modified datetime default null
);

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  application_id int(11) default null,
  `trial_status_id` int(11) DEFAULT NULL,
  `study_title` text default null,
  `short_title` varchar(255) DEFAULT NULL,
  `public_title` varchar(255) DEFAULT NULL,
  `scientific_title` varchar(255) DEFAULT NULL,
  `public_contact_email` varchar(255) DEFAULT NULL,
  `public_contact_phone` varchar(255) DEFAULT NULL,
  `public_contact_postal` varchar(255) DEFAULT NULL,
  `public_contact_affiliation` varchar(255) DEFAULT NULL,
  `scientific_contact_email` varchar(255) DEFAULT NULL,
  `scientific_contact_phone` varchar(255) DEFAULT NULL,
  `scientific_contact_postal` varchar(255) DEFAULT NULL,
  `scientific_contact_affiliation` varchar(255) DEFAULT NULL,
  `countries_recruitment` text DEFAULT NULL,
  `abstract_of_study` text default null,
  `protocol_no` varchar(255) DEFAULT NULL,
  `version_no` varchar(255) DEFAULT NULL,
  `date_of_protocol` date DEFAULT NULL,
  `study_drug` varchar(255) DEFAULT NULL,
  `drug_name` varchar(255) DEFAULT NULL,
  `quantity_excemption` varchar(255) DEFAULT NULL,
  drug_details text default null,
  medicine_reaction text default null,
  Therapeutic_effects text default null,
  medicine_registered_details text default null,
  trial_origin_details text default null,
  other_country_details text default null,
  safety text default null,
  `medicine_registered` varchar(255) DEFAULT NULL,
  `trials_origin_country` varchar(255) DEFAULT NULL,
  `registered_other_country` varchar(255) DEFAULT NULL,
  `status_medicine` varchar(255) DEFAULT NULL,
  `given_concomitantly` varchar(255) DEFAULT NULL,
  `concomitant_name` varchar(255) DEFAULT NULL,
  `concurrent_medicine` varchar(255) DEFAULT NULL,
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
   participants_justification text default null,
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
  `investigator1_full_name` varchar(255) DEFAULT NULL,
  investigator1_date_of_birth date default null,
  `investigator1_qualification` varchar(255) DEFAULT NULL,
  `investigator1_professional_address` varchar(255) DEFAULT NULL,
  `investigator1_telephone` varchar(255) DEFAULT NULL,
  `investigator1_email` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_office` varchar(255) DEFAULT NULL,
  `business_physical_address` varchar(255) DEFAULT NULL,
  `business_telephone` varchar(255) DEFAULT NULL,
  `business_position` varchar(255) DEFAULT NULL,
  `money_source` varchar(255) DEFAULT NULL,
  `business_field_manufacture` varchar(255) DEFAULT NULL,
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
--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

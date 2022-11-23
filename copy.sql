ALTER TABLE `quality_assessments` ADD `quality_assessment_id` INT(11) NULL AFTER `user_id`;
ALTER TABLE `quality_assessments` ADD `evaluation_type` VARCHAR(255) NULL AFTER `quality_assessment_id`;
ALTER TABLE `statisticals` ADD `statistical_id` INT(11) NULL AFTER `user_id`, ADD `evaluation_type` VARCHAR(255) NULL AFTER `statistical_id`;

ALTER TABLE `statisticals` ADD `file` VARCHAR(255) NULL AFTER `overall_comment`, ADD `dir` VARCHAR(255) NULL AFTER `file`, ADD `size` VARCHAR(255) NULL AFTER `dir`, ADD `type` VARCHAR(255) NULL AFTER `size`, ADD `signature` TINYINT NULL DEFAULT '0' AFTER `type`;
ALTER TABLE `statisticals` CHANGE `file` `file` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
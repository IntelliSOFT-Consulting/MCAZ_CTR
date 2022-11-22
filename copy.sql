ALTER TABLE `quality_assessments` ADD `quality_assessment_id` INT(11) NULL AFTER `user_id`;
ALTER TABLE `quality_assessments` ADD `evaluation_type` VARCHAR(255) NULL AFTER `quality_assessment_id`;
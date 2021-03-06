ALTER TABLE `user`
	ADD COLUMN `phone` VARCHAR(50) NULL DEFAULT NULL AFTER `last_name`,
	ADD COLUMN `address_one` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`,
	ADD COLUMN `address_two` VARCHAR(255) NULL DEFAULT NULL AFTER `address_one`,
	ADD COLUMN `city` VARCHAR(50) NULL DEFAULT NULL AFTER `address_two`,
	ADD COLUMN `state` VARCHAR(50) NULL DEFAULT NULL AFTER `city`,
	ADD COLUMN `country` VARCHAR(50) NULL DEFAULT NULL AFTER `state`,
	ADD COLUMN `zip` INT NULL DEFAULT NULL AFTER `country`;

	ALTER TABLE `quiz`
	ADD COLUMN `quiz_code` VARCHAR(50) NULL AFTER `description`;
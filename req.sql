ALTER TABLE `article` ADD `lieu` VARCHAR(50) NOT NULL AFTER `likes`, ADD `date_evenement` DATE NOT NULL AFTER `lieu`;

ALTER TABLE `type_article` CHANGE `statut` `statut` INT(11) NOT NULL DEFAULT '0';


ALTER TABLE `article` CHANGE `lieu` `lieu` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `date_evenement` `date_evenement` DATE NULL;
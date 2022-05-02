CREATE TABLE `agenda_participativa` (
	`id` SMALLINT(6) NOT NULL AUTO_INCREMENT,
	`titulo` VARCHAR(1000) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`data_inicio` DATE NULL DEFAULT NULL,
	`data_termino` DATE NULL DEFAULT NULL,
	`horario` TIME NULL DEFAULT NULL,
	`local` VARCHAR(100) NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`link` VARCHAR(1000) NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`link_texto` VARCHAR(100) NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;
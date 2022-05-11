CREATE TABLE `noticias` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`tipo` VARCHAR(8) NOT NULL DEFAULT 'noticia' COLLATE 'utf8mb4_general_ci',
	`titulo` VARCHAR(250) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`imagem` VARCHAR(1000) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`link` VARCHAR(1000) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

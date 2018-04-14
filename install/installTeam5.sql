SET AUTOCOMMIT = 0;

START TRANSACTION;

DROP DATABASE IF EXISTS `taskmanager`;
CREATE DATABASE IF NOT EXISTS `taskmanager`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;

CREATE USER IF NOT EXISTS 'taskManager'@'localhost'
  IDENTIFIED BY 'taskManager';
GRANT ALL PRIVILEGES ON `taskManager`.* TO 'taskManager'@'localhost';
USE taskmanager;
DROP TABLE IF EXISTS `tbl_day`;
CREATE TABLE IF NOT EXISTS `tbl_day` (
  `id`   TINYINT(4) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(10)         DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 8
  DEFAULT CHARSET = utf8;

INSERT INTO `tbl_day` (`id`, `name`)
VALUES (1, 'monday'), (2, 'tuesday'), (3, 'wednesday'), (4, 'thursday'), (5, 'friday'), (6, 'saturday'), (7, 'sunday');

DROP TABLE IF EXISTS
`tbl_member`;
CREATE TABLE IF NOT EXISTS `tbl_member` (
  `id`         SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `mail`       VARCHAR(100)         DEFAULT NULL,
  `login`      VARCHAR(100)         DEFAULT NULL,
  `teamleader` TINYINT(1)           DEFAULT NULL,
  `idTeam`     SMALLINT(6)          DEFAULT NULL,
  `password`   VARCHAR(50)          DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idTeam`(`idTeam`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;

INSERT INTO `tbl_member` (
  `id`,
  `mail`,
  `login`,
  `teamleader`,
  `idTeam`,
  `password`
)
VALUES (1, NULL, 'alain', NULL, 4, NULL), (2, NULL, 'maxime', NULL, 4, NULL), (
  3,
  NULL,
  'valentin',
  NULL,
  4,
  NULL
), (4, NULL, 'jeremy', NULL, 4, NULL), (5, NULL, 'adrien', NULL, 4, NULL),

(6, NULL, 'sebastien', NULL, 5, NULL),
(7, NULL, 'sami', NULL, 5, NULL),
(8, NULL, 'maxence', NULL, 5, NULL),
(9, NULL, 'alan', NULL, 5, NULL),
(10, NULL, 'Edwin ', NULL, 5, NULL);

DROP TABLE IF EXISTS
`tbl_member_team`;
CREATE TABLE IF NOT EXISTS `tbl_member_team` (
  `fk_member_id` SMALLINT(6) NOT NULL,
  `fk_team_id`   SMALLINT(6) NOT NULL,
  KEY `tbl_member_team_fk_team_id_fk_member_id_index`(`fk_team_id`, `fk_member_id`),
  KEY `tbl_member_team_tbl_member_id_fk`(`fk_member_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
INSERT INTO `tbl_member_team` (`fk_member_id`, `fk_team_id`)
VALUES (1, 4), (2, 4), (3, 4), (4, 4), (5, 4);
DROP TABLE IF EXISTS
`tbl_task`;
CREATE TABLE IF NOT EXISTS `tbl_task` (
  `id`          SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(100)         DEFAULT NULL,
  `priority`    TINYINT(4)           DEFAULT NULL,
  `description` TEXT,
  `status`      VARCHAR(20)          DEFAULT NULL,
  `subtasks`    TINYINT(4)           DEFAULT NULL,
  `day`         TINYINT(4)           DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id`(`id`),
  KEY `day`(`day`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8;
INSERT INTO `tbl_task` (
  `id`,
  `name`,
  `priority`,
  `description`,
  `status`,
  `subtasks`,
  `day`
)
VALUES (
  1,
  'Dormir',
  1,
  NULL,
  NULL,
  NULL,
  1
), (
  2,
  'Gogo',
  1,
  NULL,
  NULL,
  NULL,
  1
), (
  3,
  'Manger',
  1,
  NULL,
  NULL,
  NULL,
  5
), (
  4,
  'Faire le menage',
  1,
  NULL,
  NULL,
  NULL,
  7
), (
  5,
  'Test42',
  42,
  NULL,
  NULL,
  NULL,
  7
), (
  6,
  'Testsync',
  127,
  NULL,
  NULL,
  NULL,
  7
);
DROP TABLE IF EXISTS
`tbl_task_team`;
CREATE TABLE IF NOT EXISTS `tbl_task_team` (
  `fk_task_id` SMALLINT(6) NOT NULL,
  `fk_team_id` SMALLINT(6) NOT NULL,
  UNIQUE KEY `tbl_task_team_fk_task_id_fk_team_id_pk`(`fk_team_id`, `fk_task_id`),
  KEY `tbl_task_team_tbl_task_id_fk`(`fk_task_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
INSERT INTO `tbl_task_team` (`fk_task_id`, `fk_team_id`)
VALUES (1, 4), (2, 4), (6, 4);

DROP TABLE IF EXISTS
`tbl_task_member`;
CREATE TABLE IF NOT EXISTS `tbl_task_member` (
  `fk_task_id` SMALLINT(6) NOT NULL,
  `fk_member_id` SMALLINT(6) NOT NULL,
  UNIQUE KEY `tbl_task_member_fk_task_id_fk_member_id_pk`(`fk_member_id`, `fk_task_id`),
  KEY `tbl_task_member_tbl_task_id_fk`(`fk_task_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
INSERT INTO `tbl_task_member` (`fk_task_id`, `fk_member_id`)
VALUES (1, 6),(2, 7),(3, 8),(4,9),(5,10);

DROP TABLE IF EXISTS
`tbl_team`;
CREATE TABLE IF NOT EXISTS `tbl_team` (
  `id`     SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `name`   VARCHAR(100)         DEFAULT NULL,
  `leader` SMALLINT(6)          DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_team_tbl_member_id_fk`(`leader`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;
INSERT INTO `tbl_team` (`id`, `name`, `leader`)
VALUES (1, 'team1', NULL), (2, 'team2', NULL), (3, 'team3', NULL), (4, 'team4', NULL), (5, 'team5', NULL);
ALTER TABLE
`tbl_member_team`
  ADD CONSTRAINT `tbl_member_team_tbl_member_id_fk` FOREIGN KEY (`fk_member_id`) REFERENCES `tbl_member` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_member_team_tbl_team_id_fk` FOREIGN KEY (`fk_team_id`) REFERENCES `tbl_team` (`id`);
ALTER TABLE
`tbl_task`
  ADD CONSTRAINT `tbl_task_ibfk_1` FOREIGN KEY (`day`) REFERENCES `tbl_day` (`id`);
ALTER TABLE
`tbl_task_team`
  ADD CONSTRAINT `tbl_task_team_tbl_task_id_fk` FOREIGN KEY (`fk_task_id`) REFERENCES `tbl_task` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_task_team_tbl_team_id_fk` FOREIGN KEY (`fk_team_id`) REFERENCES `tbl_team` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE
`tbl_team`
  ADD CONSTRAINT `tbl_team_tbl_member_id_fk` FOREIGN KEY (`leader`) REFERENCES `tbl_member` (`id`);
COMMIT;
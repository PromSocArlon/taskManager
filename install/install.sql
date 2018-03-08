DROP DATABASE IF EXISTS taskManager;
CREATE DATABASE taskManager
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;


USE taskManager;

--
-- Table creation
--
CREATE TABLE tbl_day (
  id   TINYINT NOT NULL UNIQUE AUTO_INCREMENT,
  name VARCHAR(10),
  PRIMARY KEY (id)
)
  ENGINE = INNODB;


CREATE TABLE tbl_task (
  id          SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  name        VARCHAR(100),
  priority    TINYINT,
  description TEXT,
  status      VARCHAR(20),
  subtasks    TINYINT,
  day         TINYINT,
  PRIMARY KEY (id),
  KEY `day` (`day`)
)
  ENGINE = INNODB;


CREATE TABLE `tbl_member` (
  `id`         SMALLINT(6) NOT NULL UNIQUE AUTO_INCREMENT,
  `mail`       VARCHAR(100)                DEFAULT NULL,
  `login`      VARCHAR(100)                DEFAULT NULL,
  `teamleader` BOOLEAN                     DEFAULT NULL,
  `team`       SMALLINT(6)                 DEFAULT NULL,
  `password`   VARCHAR(50)                 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idTeam` (`team`)
)
  ENGINE = InnoDB;


CREATE TABLE `tbl_team` (
  `id`   SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100)         DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB;


CREATE TABLE `tbl_interTaskMember` (
  `idTask`   SMALLINT(6) NOT NULL,
  `idMember` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`idTask`, `idMember`)
)
  ENGINE = InnoDB;

#TODO: Ajout support table externe (lié a la gestion array dans StorageMysql.php
#ALTER TABLE tbl_member
#  ADD CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`team`) REFERENCES `tbl_team` (`id`);
#ALTER TABLE tbl_task
#  ADD CONSTRAINT `tbl_task_ibfk_1` FOREIGN KEY (`day`) REFERENCES `tbl_day` (`id`);


GRANT ALL ON taskManager.* TO 'taskManager'@'localhost'
IDENTIFIED BY 'taskManager';
FLUSH PRIVILEGES;

--
-- Default Data
--
INSERT INTO tbl_day (`id`, `name`) VALUES
  (1, 'monday'),
  (2, 'tuesday'),
  (3, 'wednesday'),
  (4, 'thursday'),
  (5, 'friday'),
  (6, 'saturday'),
  (7, 'sunday');

INSERT INTO tbl_task (`id`, `name`, `priority`, `day`) VALUES
  (1, 'Dormir', 1, 1),
  (2, 'Gogo', 1, 1),
  (3, 'Manger', 1, 5),
  (4, 'Faire le menage', 1, 7),
  (5, 'Test', 42, 7),
  (6, 'Test2', 127, 7);

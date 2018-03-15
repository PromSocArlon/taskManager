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
  idTask      SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  id          SMALLINT,
  name        VARCHAR(100),
  priority    TINYINT,
  description TEXT,
  status      VARCHAR(20),
  subtasks    TINYINT,
  day         TINYINT,
  PRIMARY KEY (id),
  KEY day (day)
)
  ENGINE = INNODB;


CREATE TABLE tbl_member (
  idMember   SMALLINT(6) NOT NULL UNIQUE AUTO_INCREMENT,
  id         SMALLINT,
  mail       VARCHAR(100),
  login      VARCHAR(100),
  teamleader BOOLEAN,
  team       SMALLINT(6),
  password   VARCHAR(50),
  PRIMARY KEY (id),
  KEY idTeam (team)
)
  ENGINE = INNODB;


CREATE TABLE tbl_team (
  id   SMALLINT(6) NOT NULL AUTO_INCREMENT,
  name VARCHAR(100),
  PRIMARY KEY (id)
)
  ENGINE = INNODB;


CREATE TABLE tbl_interTaskMember (
  idTask   SMALLINT(6) NOT NULL,
  idMember SMALLINT(6) NOT NULL,
  PRIMARY KEY (idTask, idMember)
)
  ENGINE = INNODB;

#TODO: Ajout support table externe (lié a la gestion array dans StorageMysql.php
#ALTER TABLE tbl_member
#  ADD CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`team`) REFERENCES `tbl_team` (`id`);
#ALTER TABLE tbl_task
#  ADD CONSTRAINT `tbl_task_ibfk_1` FOREIGN KEY (`day`) REFERENCES `tbl_day` (`id`);


GRANT ALL ON taskManager.* TO 'taskManager'@'localhost'
IDENTIFIED BY 'taskManager';
FLUSH PRIVILEGES;

# Default data set
INSERT INTO `tbl_task`
VALUES
  (1, 6, 'Dormir', 1, NULL, NULL, NULL, 1),
  (2, 5, 'Gogo', 1, NULL, NULL, NULL, 1),
  (3, 4, 'Manger', 1, NULL, NULL, NULL, 5),
  (4, 3, 'Faire le menage', 1, NULL, NULL, NULL, 7),
  (5, 2, 'Test', 127, NULL, NULL, NULL, 7),
  (6, 1, '42', 42, NULL, NULL, NULL, 7);
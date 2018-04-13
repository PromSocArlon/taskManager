DROP DATABASE IF EXISTS taskManager;
CREATE DATABASE taskManager
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;


USE taskManager;

--
-- Table creation
--
CREATE TABLE tbl_day (
  id   TINYINT UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT,
  name VARCHAR(10),
  PRIMARY KEY (id)
)
  ENGINE = INNODB;


CREATE TABLE tbl_task (
  idTask      SMALLINT UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT,
  id          SMALLINT UNSIGNED,
  name        VARCHAR(100),
  priority    TINYINT,
  description TEXT,
  status      VARCHAR(20),
  day         TINYINT UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY day (day) REFERENCES tbl_day (id)
)
  ENGINE = INNODB;


CREATE TABLE tbl_member (
  idMember   SMALLINT(6) UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT,
  id         SMALLINT UNSIGNED,
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
  id   SMALLINT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100),
  PRIMARY KEY (id)
)
  ENGINE = INNODB;


CREATE TABLE tbl_member_task (
  idMember SMALLINT(6) UNSIGNED NOT NULL,
  idTask   SMALLINT(6) UNSIGNED NOT NULL,
  PRIMARY KEY (idMember, idTask),
  FOREIGN KEY day (idMember) REFERENCES tbl_member (id),
  FOREIGN KEY day (idTask) REFERENCES tbl_task (id)
)
  ENGINE = INNODB;

CREATE TABLE tbl_task_team (
  idTask   SMALLINT(6) UNSIGNED NOT NULL,
  idTeam SMALLINT(6) UNSIGNED NOT NULL,
  PRIMARY KEY (idTask, idTeam),
  FOREIGN KEY day (idTask) REFERENCES tbl_task (id),
  FOREIGN KEY day (idTeam) REFERENCES tbl_team (id)
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
INSERT INTO `tbl_day`
VALUES
  (1, 'monday'),
  (2, 'tuesday'),
  (3, 'wednesday'),
  (4, 'thursday'),
  (5, 'friday'),
  (6, 'saturday'),
  (7, 'sunday');

INSERT INTO `tbl_task`
VALUES
  (1, 6, 'Dormir', 1, NULL, NULL, 1),
  (2, 5, 'Gogo', 1, NULL, NULL, 1),
  (3, 4, 'Manger', 1, NULL, NULL, 5),
  (4, 3, 'Faire le menage', 1, NULL, NULL, 7),
  (5, 2, 'Test', 127, NULL, NULL, 7),
  (6, 1, '42', 42, NULL, NULL, 7);

INSERT INTO `tbl_member`
VALUES
  (1, 6, 'mail1@mail.com', 'login1', 1, 1, ''),
  (2, 5, 'mail2@mail.com', 'login2', 1, 1, ''),
  (3, 4, 'mail3@mail.com', 'login3', 1, 2, ''),
  (4, 3, 'mail4@mail.com', 'login4', 1, 5, ''),
  (5, 2, 'mail5@mail.com', 'login5', 1, 2, ''),
  (6, 1, 'mail6@mail.com', 'login6', 1, 2, '');

INSERT INTO `tbl_team`
VALUES
  (1, 'Team 1'),
  (2, 'Team 2'),
  (3, 'Team 3'),
  (4, 'Team 4'),
  (5, 'Team 5');

INSERT INTO `tbl_member_task`
VALUES
  (1, 1),
  (1, 2),
  (1, 3),
  (2, 4),
  (3, 5),
  (4, 6);

INSERT INTO `tbl_task_team`
VALUES
  (1, 1),
  (2, 1),
  (3, 3),
  (4, 4),
  (5, 5),
  (6, 5);
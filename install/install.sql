DROP DATABASE IF EXISTS taskManager;
CREATE DATABASE taskManager DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE taskManager;

CREATE TABLE tbl_days(
  id TINYINT NOT NULL UNIQUE AUTO_INCREMENT,
  name VARCHAR(10),
  PRIMARY KEY(id)
) ENGINE=INNODB;

CREATE TABLE tbl_tasks(
  id SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  name VARCHAR(100),
  priority TINYINT,
  description TEXT,
  status VARCHAR(20),
  subtasks TINYINT,
  day TINYINT,
  PRIMARY KEY(id),
  FOREIGN KEY(day) REFERENCES tbl_days(id)
) ENGINE=INNODB;

GRANT ALL ON taskManager . * TO 'taskManager'@'localhost' IDENTIFIED BY 'taskManager';
FLUSH PRIVILEGES;

INSERT INTO tbl_days (`id`, `name`) VALUES
(1, 'monday'),
(2, 'tuesday'),
(3, 'wednesday'),
(4, 'thursday'),
(5, 'friday'),
(6, 'saturday'),
(7, 'sunday');

INSERT INTO tbl_tasks (`id`, `name`, `priority`, `day`) VALUES
(1, 'Dormir', 1, 1),
(2, 'Gogo', 1, 1),
(3, 'Manger', 1, 5),
(4, 'Faire le menage', 1, 7),
(5, 'Test42', 42, 7),
(6, 'Testsync', 127, 7);

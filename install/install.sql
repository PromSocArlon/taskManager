DROP DATABASE IF EXISTS taskManager;
CREATE DATABASE taskManager DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE taskManager;

CREATE TABLE tbl_days(
  Id TINYINT NOT NULL UNIQUE AUTO_INCREMENT,
  Name VARCHAR(10),
  PRIMARY KEY(Id)
) ENGINE=INNODB;

CREATE TABLE tbl_tasks(
  Id SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  Name VARCHAR(100),
  Priority TINYINT,
  Description TEXT,
  Status VARCHAR(20),
  Subtasks TINYINT,
  Day TINYINT,
  PRIMARY KEY(Id),
  FOREIGN KEY(Day) REFERENCES tbl_days(Id)
) ENGINE=INNODB;

GRANT ALL ON taskManager . * TO 'taskManager'@'localhost' IDENTIFIED BY 'taskManager';
FLUSH PRIVILEGES;

INSERT INTO tbl_days (`Id`, `Name`) VALUES
(1, 'monday'),
(2, 'tuesday'),
(3, 'wednesday'),
(4, 'thursday'),
(5, 'friday'),
(6, 'saturday'),
(7, 'sunday');

INSERT INTO tbl_tasks (`Id`, `Name`, `Priority`, `Day`) VALUES
(1, 'Dormir', 1, 1),
(2, 'Gogo', 1, 1),
(3, 'Manger', 1, 5),
(4, 'Faire le menage', 1, 7),
(5, 'Test42', 42, 7),
(6, 'Testsync', 127, 7);

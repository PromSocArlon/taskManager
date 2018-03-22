CREATE TABLE tbl_team
(
  id     SMALLINT(6) AUTO_INCREMENT
    PRIMARY KEY,
  name   VARCHAR(100) NULL,
  leader SMALLINT(6)  NULL,
  CONSTRAINT tbl_team_tbl_member_id_fk
  FOREIGN KEY (leader) REFERENCES tbl_member (id)
)
  ENGINE = InnoDB
  CHARSET = utf8;

CREATE INDEX tbl_team_tbl_member_id_fk
  ON tbl_team (leader);



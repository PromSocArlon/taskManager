USE taskManager;

# Default data set
INSERT INTO `tbl_entity`
VALUES
  ('1', '1'),
  ('2', '1'),
  ('3', '1'),
  ('4', '1'),
  ('5', '1'),
  ('6', '1');

INSERT INTO `tbl_task`
VALUES
  ('1', 'Dormir', 1, NULL, NULL),
  ('2', 'Gogo', 1, NULL, NULL),
  ('3', 'Manger', 1, NULL, NULL),
  ('4', 'Faire le menage', 1, NULL, NULL),
  ('5', 'Test', 127, NULL, NULL),
  ('6', '42', 42, NULL, NULL);

INSERT INTO `tbl_member`
VALUES
  ('7', 6, 'mail1@mail.com', 'login1', 1, 1, ''),
  ('8', 5, 'mail2@mail.com', 'login2', 1, 1, ''),
  ('9', 4, 'mail3@mail.com', 'login3', 1, 2, ''),
  ('10', 3, 'mail4@mail.com', 'login4', 1, 5, ''),
  ('11', 2, 'mail5@mail.com', 'login5', 1, 2, ''),
  ('12', 1, 'mail6@mail.com', 'login6', 1, 2, '');

INSERT INTO `tbl_team`
VALUES
  ('13', 'Team 1'),
  ('14', 'Team 2'),
  ('15', 'Team 3'),
  ('16', 'Team 4'),
  ('17', 'Team 5');
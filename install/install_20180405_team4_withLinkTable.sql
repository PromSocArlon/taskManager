create table tbl_day
(
  id   tinyint auto_increment
    primary key,
  name varchar(10) null
)
  engine = InnoDB;

create table tbl_member
(
  id         smallint(6) auto_increment
    primary key,
  mail       varchar(100) null,
  login      varchar(100) null,
  teamleader tinyint(1)   null,
  idTeam     smallint(6)  null,
  password   varchar(50)  null
)
  engine = InnoDB;

create index idTeam
  on tbl_member (idTeam);

create table tbl_task
(
  id          smallint(6) auto_increment
    primary key,
  name        varchar(100) null,
  priority    tinyint      null,
  description text         null,
  status      varchar(20)  null,
  subtasks    tinyint      null,
  day         tinyint      null,
  constraint id
  unique (id),
  constraint tbl_task_ibfk_1
  foreign key (day) references tbl_day (id)
)
  engine = InnoDB;

create index day
  on tbl_task (day);

create table tbl_team
(
  id     smallint(6) auto_increment
    primary key,
  name   varchar(100) null,
  leader smallint(6)  null,
  constraint tbl_team_tbl_member_id_fk
  foreign key (leader) references tbl_member (id)
)
  engine = InnoDB;

create table tbl_member_team
(
  fk_member_id smallint(6) not null,
  fk_team_id   smallint(6) not null,
  constraint tbl_member_team_tbl_member_id_fk
  foreign key (fk_member_id) references tbl_member (id)
    on update cascade
    on delete cascade,
  constraint tbl_member_team_tbl_team_id_fk
  foreign key (fk_team_id) references tbl_team (id)
)
  engine = InnoDB;

create index tbl_member_team_fk_team_id_fk_member_id_index
  on tbl_member_team (fk_team_id, fk_member_id);

create index tbl_member_team_tbl_member_id_fk
  on tbl_member_team (fk_member_id);

create table tbl_task_team
(
  fk_task_id smallint(6) not null,
  fk_team_id smallint(6) not null,
  constraint tbl_task_team_fk_task_id_fk_team_id_pk
  unique (fk_team_id, fk_task_id),
  constraint tbl_task_team_tbl_task_id_fk
  foreign key (fk_task_id) references tbl_task (id)
    on update cascade
    on delete cascade,
  constraint tbl_task_team_tbl_team_id_fk
  foreign key (fk_team_id) references tbl_team (id)
    on update cascade
    on delete cascade
)
  engine = InnoDB;

create index tbl_task_team_tbl_task_id_fk
  on tbl_task_team (fk_task_id);

create index tbl_team_tbl_member_id_fk
  on tbl_team (leader);


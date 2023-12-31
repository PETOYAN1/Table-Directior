-- Create DB

DROP DATABASE IF EXISTS `to-do`;

CREATE DATABASE `to-do`;


-- Create Tables

USE `to-do`;

-- Directors

DROP TABLE IF EXISTS `directors`;

CREATE TABLE `directors` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `surname` varchar(50) default NULL,
  `phone` int(50) default NULL,
  `email` varchar(50) default NULL,
  `date` varchar(50),
  `password` varchar(50),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `directors` (`name`,`surname`,`phone`,`email`,`date`,`password`)
VALUES
  ("Ishmael","Lambert","093758281","eu.nulla.at@protonmail.com","2011-05-04","SHR61PPP0FN"),
  ("Stacy","Cardenas","095108512","lobortis.tellus@icloud.edu","1996-49-05","ZCR75JTU4BG"),
  ("Tanisha","Leon","098644324","bibendum@aol.ca","1997-02-05","CEF87QUL3VN"),
  ("Thane","Evans","098663741","per@protonmail.couk","2020-50-20","BIY51UQG9DA"),
  ("Whitney","Rutledge","093628641","pretium@hotmail.ca","2018-38-28","QTU56SYV1GT"),
  ("Veda","Jarvis","098286079","cursus@google.couk","23-27-04","XTN70JOD1AX"),
  ("Gisela","Rowland","095460257","justo.faucibus.lectus@google.net","24-02-08","HJZ20WCO4HS"),
  ("Daria","Greene","096857738","placerat@yahoo.ca","24-46-13","TGK67MYK1BH"),
  ("Hayley","Sherman","090367994","aliquet.diam@aol.edu","23-23-11","TPF49HMS3JX"),
  ("Zelenia","Foster","092770322","sit@google.org","24-48-31","SDP25JWJ5PM");

-- Employees

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `surname` varchar(50) default NULL,
  `phone` int(50) default NULL,
  `email` varchar(50) default NULL,
  `date` varchar(50),
  `password` varchar(50),
  `employ_id` int default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `employees` (`name`,`surname`,`phone`,`email`,`date`,`password`,`employ_id`)
VALUES
  ("Sylvia","Berger","096347244","faucibus.orci@hotmail.couk","2004-30-11","OUJ13QHV0PU",3),
  ("Lucy","Cooley","097823351","ut.nisi@outlook.ca","2014-20-10","PLY85YDD5TW",8),
  ("Guy","Swanson","098431452","vitae.aliquam.eros@icloud.net","1994-37-26","SZO16LCJ1XD",3),
  ("Emily","Frank","099286261","egestas.aliquam@icloud.ca","1994-49-25","DKR13RAX4HR",6),
  ("Wynter","Zamora","091638994","arcu.iaculis.enim@protonmail.org","1996-01-21","CYL16SXL4PZ",5),
  ("Gareth","Nieves","093255374","faucibus.morbi@icloud.org","23-45-05","KML48CEM4DH",2),
  ("Helen","Baker","098782392","semper.auctor@protonmail.com","24-05-23","QZX52UTI6JM",4),
  ("Lewis","Doyle","095838831","vestibulum.massa@hotmail.edu","24-34-13","CTH74YYJ5DK",7),
  ("Leah","Schultz","098374313","tempor.est@protonmail.couk","23-01-02","CTL88KCQ0XJ",9),
  ("Ursula","Acosta","092443464","non@yahoo.ca","23-07-07","VRS97UNK8FR",1);


-- create Company

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `company` varchar(55),
  `department_id` mediumint default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `company` (`company`,`department_id`)
VALUES
  ("Fusce Diam LLP",7),
  ("Urna PC",10),
  ("Turpis Consulting",5),
  ("Bibendum Ullamcorper LLC",3),
  ("Risus Duis Corp.",7),
  ("Penatibus Et PC",7),
  ("Nascetur Ridiculus Mus Foundation",4),
  ("Ut Erat Sed Corporation",5),
  ("Nunc Quisque Ornare Limited",5),
  ("Nunc Inc.",7);

-- create Department

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `department` varchar(50) default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `department` (`department`)
VALUES
  ("Panama"),
  ("Chicago"),
  ("Oregon"),
  ("Oklahoma"),
  ("Nebraska"),
  ("Oregon"),
  ("Wyoming"),
  ("Georgia"),
  ("California"),
  ("Minnesota");


  -- create position

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `position` varchar(20) default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `position` (`position`)
VALUES
  ("director"),
  ("employer"),
  ("user"),
  ("manager"),
  ("Vice president");

  -- create Salary

DROP TABLE IF EXISTS `salary`;

CREATE TABLE `salary` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `salary` varchar(50) default NULL,
  `date` varchar(50),
  `position_id` mediumint default NULL,
  `receiver_id` mediumint default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `salary` (`salary`,`date`,`position_id`,`receiver_id`)
VALUES
  ("$1,247.87","2007-43-02",5,6),
  ("$2,507.86","2001-37-20",3,9),
  ("$1,916.25","2021-03-06",8,3),
  ("$1,791.96","2001-35-09",4,7),
  ("$1,728.19","2013-36-27",2,5),
  ("$2,101.87","1994-52-16",3,4),
  ("$2,668.10","2018-52-06",2,3),
  ("$1,313.96","2000-58-18",4,3),
  ("$2,345.69","2021-36-12",8,1),
  ("$2,073.13","2007-52-17",7,5);


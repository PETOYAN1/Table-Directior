-- Create DB

DROP DATABASE IF EXISTS `to-do`;

CREATE DATABASE `to-do`;


-- Create Tables

USE `to-do`;

-- Directors

DROP TABLE IF EXISTS `directors`;

CREATE TABLE `directors` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(55) default NULL,
  `surname` varchar(55) default NULL,
  `phone` varchar(55) default NULL,
  `email` varchar(55) default NULL,
  `date` varchar(55),
  `password` varchar(55),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `directors` (`name`,`surname`,`phone`,`email`,`date`,`password`)
VALUES
  ("Keely","Dyer","1-176-731-5428","euismod.et@icloud.edu","Feb 21, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Orson","Mcintyre","1-901-572-6422","interdum@outlook.org","Oct 14, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Stone","Huffman","1-467-352-8188","eget.mollis.lectus@google.couk","Nov 11, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Ashely","Pennington","(181) 856-1786","phasellus.nulla@outlook.couk","Mar 27, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Thaddeus","Reilly","1-246-792-2822","arcu.vel.quam@aol.org","Feb 21, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Driscoll","Pate","1-775-781-4668","imperdiet.dictum@icloud.net","Sep 28, 2023","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Odysseus","Gates","(521) 286-8488","malesuada@hotmail.couk","May 14, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Denton","Burch","1-390-390-2108","cras.pellentesque@yahoo.org","Jan 11, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Quail","Harmon","1-222-864-5648","gravida.nunc@yahoo.com","Aug 16, 2024","81dc9bdb52d04dc20036dbd8313ed055"),
  ("Aileen","Wheeler","1-391-326-9691","luctus.et@yahoo.ca","Oct 13, 2024","81dc9bdb52d04dc20036dbd8313ed055");

-- Employees

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(55) default NULL,
  `surname` varchar(55) default NULL,
  `phone` varchar(20) default NULL,
  `email` varchar(55) default NULL,
  `date` varchar(55),
  `password` varchar(100),
  `directior_id` mediumint default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `employees` (`name`,`surname`,`phone`,`email`,`date`,`password`,`directior_id`)
VALUES
  ("Emery","Harris","1-649-278-1611","mi.lacinia@icloud.edu","Nov 9, 2024","81dc9bdb52d04dc20036dbd8313ed055",8),
  ("Ivan","Copeland","(394) 382-4409","purus.in.molestie@google.org","Apr 13, 2023","81dc9bdb52d04dc20036dbd8313ed055",1),
  ("Kalia","Levy","1-286-247-2162","nunc@icloud.ca","Sep 22, 2024","81dc9bdb52d04dc20036dbd8313ed055",2),
  ("Serena","Yates","1-682-332-1513","curabitur.massa.vestibulum@google.edu","Jan 24, 2023","81dc9bdb52d04dc20036dbd8313ed055",4),
  ("Jessica","Tate","1-443-876-4282","et.magna@outlook.net","Jan 16, 2023","81dc9bdb52d04dc20036dbd8313ed055",4),
  ("Logan","Dillard","(486) 533-8590","posuere.at.velit@protonmail.couk","Dec 26, 2022","81dc9bdb52d04dc20036dbd8313ed055",9),
  ("Robert","Kramer","(455) 663-6353","consectetuer.euismod@aol.ca","Jan 23, 2024","81dc9bdb52d04dc20036dbd8313ed055",8),
  ("Wing","Schultz","1-462-703-3157","a.purus@outlook.net","Apr 12, 2024","81dc9bdb52d04dc20036dbd8313ed055",5),
  ("Blaze","Rodriguez","(832) 477-5384","dis.parturient@hotmail.org","Jul 1, 2024","81dc9bdb52d04dc20036dbd8313ed055",6),
  ("Cedric","Hernandez","(694) 857-1407","ac@outlook.net","Jan 20, 2024","81dc9bdb52d04dc20036dbd8313ed055",9);


-- create Company

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `company` varchar(255),
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
  `salary` varchar(20) default NULL,
  `date` varchar(55),
  `position_id` int(10) default NULL,
  `receiver_id` mediumint default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `salary` (`salary`,`date`,`position_id`,`receiver_id`)
VALUES
  ("2,518.45$","Oct 28, 2023",2,9),
  ("1,087.30$","Jan 1, 2023",1,9),
  ("538.11$","Jul 16, 2023",1,2),
  ("2,334.97$","Sep 27, 2023",2,8),
  ("782.45$","Dec 5, 2024",2,3),
  ("1,360.64$","Oct 11, 2024",1,5),
  ("2,959.12$","Sep 26, 2024",1,5),
  ("2,259.34$","Oct 31, 2024",1,2),
  ("1,254.60$","Nov 28, 2024",1,6),
  ("599.85$","Jul 8, 2024",2,7);


-- Create DB

DROP DATABASE IF EXISTS `to-do`;

CREATE DATABASE `to-do`;

--Create Tables

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

DROP TABLE IF EXISTS `sallary`;

CREATE TABLE `sallary` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `sallary` varchar(100) default NULL,
  `employer_id` mediumint default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `sallary` (`sallary`,`employer_id`)
VALUES
  ("5,780$",3),
  ("7,308$",2),
  ("5,042$",5),
  ("8,889$",8),
  ("5,979$",8),
  ("9,268$",2),
  ("7,572$",9),
  ("8,841$",2),
  ("6,061$",8),
  ("5,001$",4);

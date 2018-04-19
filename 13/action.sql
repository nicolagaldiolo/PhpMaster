/* COMANDO MYSQL PER ESEGUIRE IL FILE: */
/* source ~/Projects/Httpdocs/Corsi/phpmaster/13/action.sql */

USE test;

CREATE TABLE IF NOT EXISTS `survey` (
  `projectId` bigint(20) NOT NULL,
  `surveyId` bigint(20) NOT NULL,
  `views` bigint(20) NOT NULL,
  `dateTime` datetime NOT NULL
);

LOAD DATA INFILE '~/Projects/Httpdocs/Corsi/phpmaster/13/simple_data.csv'
INTO TABLE survey
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES;
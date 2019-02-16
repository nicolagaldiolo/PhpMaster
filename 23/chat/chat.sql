CREATE DATABASE IF NOT EXISTS phpmaster;

USE phpmaster;

DROP TABLE IF EXISTS chatlog;

CREATE TABLE chatlog (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  message TEXT,
  sent_by VARCHAR(50),
  date_created decimal(16, 6)
);
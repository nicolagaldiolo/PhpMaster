CREATE DATABASE user;

USE user;

CREATE TABLE users (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255),
  password VARCHAR(255)
);

INSERT INTO users (username, password) VALUES
  ('galdiolo.nicola@gmail.com', SHA1('password')),
  ('user@example.com', SHA1('password')),
  ('user2@example.com', SHA1('password'))
;
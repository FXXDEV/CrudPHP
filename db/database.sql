CREATE DATABASE  IF NOT EXISTS CrudPHP /*!40100 DEFAULT CHARACTER SET utf8 */;
USE CrudPHP;

CREATE TABLE IF NOT EXISTS customers (
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name char(45) NOT NULL,
  email varchar(50) NOT NULL,
  cpf char(11) NOT NULL,
  phone char(13) DEFAULT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL
);


CREATE TABLE IF NOT EXISTS logs (
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  log_message text NOT NULL,
  name char(45) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  cpf char(11)  DEFAULT NULL,
  phone char(13) DEFAULT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL
);

 
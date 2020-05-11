-- CREATE DATABASE testHello;

  use testHello;

  CREATE TABLE users (
    
    UserID int NOT Null,
    Real_name VARCHAR(30) NOT NULL,
    First_name VARCHAR(30) NOT NULL,
    Last_name VARCHAR(30) NOT NULL,
    Email VARCHAR(30) NOT Null,
    centerID int NOT NULL,
    Privilege int NOT NULL,
    PSCPI ENUM('Y','N') NOT NULL,
    Active ENUM('Y','N') NOT NULL,
    Password_hash CHAR(32) NOT Null,
    Password_expiry date
  );
  
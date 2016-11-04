CREATE DATABASE IF NOT EXISTS neubox;
USE neubox;

CREATE TABLE user (
  Id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Name VARCHAR(100) NOT NULL,
  Email VARCHAR(100) NOT NULL,   
  Password VARCHAR(15) NOT NULL,
  PhoneNumber VARCHAR(20) NOT NULL,
  Company VARCHAR(50) NULL,      
  BirthDate DATE NOT NULL,                                         
  UNIQUE(Email)
); 
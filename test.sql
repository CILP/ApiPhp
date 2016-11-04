create table Duplicados (
  Id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Name VARCHAR(30) NOT NULL,
  Email VARCHAR(50) NOT NULL,                                                  
  UNIQUE(Email)
); 
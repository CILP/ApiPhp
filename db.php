<?php

  class DB extends PDO {

    #make a connection
    public function __construct($dns, $username, $password)
    {
        parent::__construct($dns, $username, $password);

        try 
        { 
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
        catch (PDOException $ex) 
        {
            die($ex->getMessage());
        }
    }

    public function addUser($name, $email){

      $query = "INSERT INTO Duplicados (Name, Email) VALUES (:name, :email)";

      $statement = $this->prepare($query);
      $statement->bindParam(':name', $name);
      $statement->bindParam(':email', $email);

      $this->executeStatement($statement);
    }

    private function executeStatement($s){
      try {
        $s->execute();
      } catch(PDOException $ex){
        
        if ($ex->errorInfo[1] == 1062){
          echo "Registro duplicado!!!\n";
        }
      }
    }
  }
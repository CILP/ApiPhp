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

    public function addUser($name, $email, $pass, $phone, $company){

      $query = "INSERT INTO person (
        Name, 
        Email, 
        Password,
        PhoneNumber,
        Company
      ) VALUES (
        :name, 
        :email,
        :pass,
        :phone,
        :company
      )";

      if (!isset($company)){
        $company = "NULL";
      }

      $statement = $this->prepare($query);
      $statement->bindParam(':name', $name);
      $statement->bindParam(':email', $email);
      $statement->bindParam(':pass', $pass);
      $statement->bindParam(':phone', $phone);
      $statement->bindParam(':company', $company);

      return $this->executeStatement($statement);
    }

    private function executeStatement($s){

      $msg = "";

      try {
        $s->execute();
        $msg = "User added successfully";
      } catch(PDOException $ex){
        
        if ($ex->errorInfo[1] == 1062){
          $msg = "Can't add user, Duplicated Email";
        }
      }

      return $msg;
    }
  }
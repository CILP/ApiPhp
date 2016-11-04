<?php

  class DB extends PDO {

    #make a connection
    /*public function __construct($dns, $username, $password)
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
    }*/

    private function loadConfiguartion($environment){

      $config = parse_ini_file('config.ini', true);
      return $config[$environment];
    }

    public function __construct($environment)
    {   
      $config = $this->loadConfiguartion($environment);
      $host = $config['host'];
      $dbname = $config['database'];
      $user = $config['user'];
      $pass = $config['password'];

      print_r($config);

      parent::__construct("mysql:host=$host;dbname=$dbname", $user, $pass);

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

    public function executeStatement($s){

      $msg = "";

      try {
        $s->execute();
        $msg = "Success";
      } catch(PDOException $ex){
        
        if ($ex->errorInfo[1] == 1062){
          $msg = "Error Duplicated";
        } else {
          $msg = "Error";
        }
      }

      return $msg;
    }
  }
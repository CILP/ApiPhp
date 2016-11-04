<?php

  require('ICrud.php');
  require('db.php');

  class UserHandler implements ICrud {

    private $db; 

    function __construct(){

      $this->db = new DB('development');
    }

    public function Create($user){

       $query = "INSERT INTO user (
        Name, 
        Email, 
        Password,
        PhoneNumber,
        Company,
        BirthDate
      ) VALUES (
        :name, 
        :email,
        :pass,
        :phone,
        :company,
        :birthdate
      )";

      $name = $user->getName();
      $email = $user->getEmail();
      $pass = $user->getPassword();
      $phone = $user->getPhoneNumber();
      $company = $user->getCompany();
      $birth = $user->getBirthDate();

      $statement = $this->db->prepare($query);
      $statement->bindParam(':name', $name);
      $statement->bindParam(':email', $email);
      $statement->bindParam(':pass', $pass);
      $statement->bindParam(':phone', $phone);
      $statement->bindParam(':company', $company);
      $statement->bindParam(':birthdate', $birth);

      return $this->db->executeStatement($statement);
    }

    public function ReadOne($user){

      $query = "SELECT * FROM user WHERE Email = ':email'"; 
      $statement = $this->db->prepare($query);

      $statement->bindParam(':email', $user->getEmail());

      return $this->db->executeStatement($statement);
    }

    public function ReadAll(){

      $query = 'SELECT * FROM user';
      $statement = $this->db->prepare($query);

      return $this->db->executeStatement($statement);
    }

    public function Update($user){

      $query = 'UPDATE * FROM user'; 
      $statement = $this->db->prepare($query);

      return $this->db->executeStatement($statement);
    }

    public function Delete($user){

    }
  } 
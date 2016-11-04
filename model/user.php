<?php

  class User {

    private $name;
    private $email;
    private $password;
    private $phoneNumber;
    private $company;
    private $birthdate;

    public function __construct($name, $email, $password, $phoneNumber, $company, $birthdate){

      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->phoneNumber = $phoneNumber;
      $this->company = isset($company) ? $company : 'NULL';

      $this->setBirthDate($birthdate);
    }

    # Getters
    public function getName(){
      return $this->name;
    }

    public function getEmail(){
      return $this->email;
    }

    public function getPassword(){
      return $this->password;
    }

    public function getPhoneNumber(){
      return $this->phoneNumber;
    }

    public function getCompany(){
      return $this->company;
    }

    public function getBirthDate(){
      return $this->birthdate;
    }

    # Setters
    public function setName($name){
      $this->name = $name;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function setPassword($password){
      $this->password = $password;
    }

    public function setPhoneNumber($phoneNumber){
      $this->phoneNumber = $phoneNumber;
    }

    public function setCompany($company){
      $this->company = $company;
    }

    public function setBirthDate($birthdate){

      $birthpart = explode("/", $birthdate);
      $this->birthdate = $birthdate ? $birthpart[2] . '-' . $birthpart[0] . '-' . $birthpart[1] : 'NULL';
    }
  }
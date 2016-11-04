<?php

  class User {

    private $name;
    private $email;
    private $password;
    private $phoneNumber;
    private $company;

    public function __construct($name, $email, $password, $phoneNumber, $company){

      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->phoneNumber = $phoneNumber;
      $this->company = isset($company) ? $company : 'NULL'; 
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
  }